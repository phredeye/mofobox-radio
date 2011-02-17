<?php

class AppController extends Controller {
	public $helpers = array("Session", "Html", "Form","Text","Time", "Theme");
	
	public $components = array("RequestHandler", "Session", "Auth");
	
	public function beforeFilter() {
		if($this->RequestHandler->isAjax()) {
			$this->layout = false;
		}
	}
	
	
}