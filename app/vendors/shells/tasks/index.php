<?php

App::import("Lib", "MediaInfo");
App::import("Lib", "StringUtil");

class IndexTask extends Shell 
{
	
	public $uses = array("Artist","Album","Track");
	
	private $verbose;
	private $mediaDir;
	
	public function execute() 
	{
		$this->initMediaDir();
		$this->printHeader();		
		$this->traverseDir($this->mediaDir);
	}
	

	private function initMediaDir() {
		$this->mediaDir = Configure::read("Mofobox.MediaDir");
		if(!file_exists($this->mediaDir)) {
			$this->error("COULD NOT LOAD MEDIA DIR: " . $this->mediaDir);
			
		}
	}
	
	private function printHeader() 
	{
		Zend_Loader::loadClass("Zend_Text_Figlet");
		$figlet = new Zend_Text_Figlet(Configure::read("Mofobox.Figlet"));
		$this->nl();
		$this->out($figlet->render("Mofobox Radio"));
		$this->nl();
		$this->log("Indexing dir: %s", $this->mediaDir);
		$this->hr(2);
	}
	
	public function traverseDir($dir) 
	{
        $iterator = new RecursiveDirectoryIterator($dir);

        foreach (new RecursiveIteratorIterator($iterator) as $filename => $cur) 
		{
            $fname = new StringUtil($filename);
            
			if($fname->endsWith('mp3')) 
			{
                $this->processFile($cur);
            }

        }   
    }
	
	public function processFile(SplFileInfo $fileInfo) 
	{
		$this->log("Processing file: %s", $fileInfo->getFileName());
		try {
			$tag = MediaInfo::getTag($fileInfo);
			$this->parseTrack($tag, $fileInfo);
		} catch (Exception $e) {
			$this->error($e->getStackTrace());
			$this->log($e->getStackTrace());
		}
		
	}

	public function parseTrack($tag,$fileInfo) {
		
		$artist = $this->parseArtist($tag->artist);
		
		$album = $this->parseAlbum($tag->album, $artist);
				
		$this->Track->contain();
		
		// TODO:  index by relative path
		$track = $this->Track->findByFilename($fileInfo->getRealPath());
		
		if(!$track) {
			$track = $this->Track->create(array("filename" => $fileInfo->getRealPath()));
		}
		
		$data = array(
			"title" => ucwords($tag->title),
			"year" => $tag->year,
			"genre" => $tag->genre,
			"duration" => $tag->duration,
			"artist_id" => $artist["Artist"]["id"],
			"album_id" => $album["Album"]["id"]
		);
		
		$track["Track"] = am($track["Track"], $data);

		if(!$this->Track->save($track)) {
			$this->err("Error Saving Track...");
			$this->err("Track: " . print_r($track, true));
		}

	}

	public function parseAlbum($title, $artist) {
		
		if($title == "Unknown") {
			$title = sprintf("Untitled (artist_id: %d)", $artist["Artist"]["id"]);
		}
		
		$this->Album->contain();
		$album = $this->Album->findByTitle($title); 
		if(!$album) {
			$this->log("Found new ALBUM: %s", $title);
			$album = $this->Album->create(array("title" => $title));
			$this->Album->save($album);
			$album = $this->Album->read();
		}
		
		return $album;
	}
	
	public function parseArtist($name) {
		$this->Artist->contain();
		$artist = $this->Artist->findByName($name);
		
		if(!$artist) {
			$this->log("Found new ARTIST: %s", $name);
			$artist = $this->Artist->create(array("name" => $name));
			$this->Artist->save($artist);
			$artist = $this->Artist->read();
		}
		
		return $artist;
	}
	

	
	public function log() 
	{ 
		$args = func_get_args();
		
		$fmt = array_shift($args);
		
		$message = vsprintf($fmt, $args);
		
		if(isset($this->params["verbose"])) {
			$this->out($message);
		}
		parent::log($message, "indexer");
	}

}