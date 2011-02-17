<?php

class AmazonTask extends Shell {
	
	public $uses = array("Artist", "Album", "Track");
	
	private $amazon;
	
	public function execute() 
	{
		Zend_Loader::loadClass("Zend_Text_Figlet");
		Zend_Loader::loadClass("Zend_Service_Amazon");

		$figlet = new Zend_Text_Figlet(Configure::read("Mofobox.Figlet"));
		
		$this->nl();
		$this->out($figlet->render("MofoBox Radio"));
		$this->nl();
		$this->out("Fetching Amazon Album Data:");
		$this->hr(3);
		
		try {
			$this->amazon = new Zend_Service_Amazon(
				Configure::read("Amazon.ApiKey"), 'US', Configure::read("Amazon.SecretKey")
				);
		} catch(Exception $e) {
			$this->error($e->getStackTrace());
		}
		
		$this->iterateAlbums();
	}
	
	public function iterateAlbums() {
		$albums = $this->Album->query(
			"SELECT distinct(Album.title), Album.id, Artist.name " .
			"FROM tracks Track, albums Album, artists Artist " .
			"WHERE Album.id = Track.album_id " .
			"AND Artist.id = Track.artist_id " .
			"AND Album.title <> 'Unknown'"
			);
		
		foreach($albums as $albumInfo) {

			$data = $this->getAmazonData($albumInfo);
			
			$album = $this->Album->read(null, $albumInfo["Album"]["id"]);
			$album["Album"] = am($album["Album"], $data);
			
			$this->Album->save($album);
			
			$this->out(sprintf("Artist:\t%s", $albumInfo["Artist"]["name"]));
			$this->out(sprintf("Album:\t%s", $albumInfo["Album"]["title"]));
			$this->hr();
		}
	}
	
	public function getAmazonData($album) 
    {
		$data = array();
		
        $this->log("Getting Amazon data for " . $album["Album"]["title"]);
        try {
            $search_results = $this->amazon->itemSearch(array(
                        'SearchIndex' => 'Music',
                        'Artist' => $album["Artist"]["name"],// artist name?
                        'Keywords' => $album["Album"]["title"],
                        'ResponseGroup' => 'Small, Medium, Large,Images,SalesRank,Reviews'));

            if($search_results->totalResults() > 0) 
            {
                $result = $search_results->current();
				
				print_r($result);
				
				$data["amazon_asin"] = $result->ASIN;
				$data["amazon_detail_page_url"] = $result->DetailPageURL;

                if(!is_null($result->SmallImage)) { $data["small_image"] = $result->SmallImage->Url->getUri(); }
                if(!is_null($result->MediumImage)) { $data["medium_image"] = $result->MediumImage->Url->getUri(); }
                if(!is_null($result->LargeImage)) { $data["large_image"] = $result->LargeImage->Url->getUri();}    
            }    
        } catch(Exception $ex) {
            $this->err($ex->getStackTrace());
        }
		
		return $data;
    }
}