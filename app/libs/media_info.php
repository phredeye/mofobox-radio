<?php

App::import("Vendor", "getid3/getid3");

class MediaInfo {
      
    public static function getTag(SplFileInfo $fileInfo) {
		$id3 = new getid3();
		
        if(!file_exists($fileInfo->getRealPath())) {
            throw new RuntimeException($fileInfo->getFileName(). " not found.");
        }
        
        $info = $id3->analyze($fileInfo->getRealPath());
        $tag = self::parseTag($info);

        return $tag;
    }
  

  
    private static function normalizeTag(array $tag) 
	{
		$tag = (object)$tag;
		
        if(empty($tag->track_number)) {
            $tag->trackNo = 0;
        }
        
        if(empty($tag->artist)) {
            $tag->artist = "Unknown";
        }
        
        if(empty($tag->album)) {
            $tag->album = "Unknown";
        }
        
        if(empty($tag->title)) {
            $tag->title = "Unknown";
        }
        
        if(empty($tag->genre)) {
            $tag->genre = null;
        }
        if(empty($tag->year)) {
            $tag->year = null;
        }
        return $tag;
        
    }
    
    
    private static function parseTag($info) {
        $tag = array();
        
        $data = array();
        if(isset($info["tags"]["id3v2"])) {
            $data = $info["tags"]["id3v2"];
        } else if(isset($info["tags"]["id3v1"])) {
            $data = $info["tags"]["id3v1"];
        }
        
        foreach($data as $key => $value) {
            $tag[$key] = implode("", $value);
        }
        
        $tag["duration"] = $info["playtime_seconds"];

        return self::normalizeTag($tag);
        
    }
    
}
