<?php

class AppController extends Controller
{

    public $helpers = array( "Session", "Html", "Form", "Text", "Time", "Theme" );
    public $components = array( "RequestHandler", "Session", "Auth" );

    public function beforeFilter()
    {
        if($this->isJson())
        {
            $this->view = 'Json';
        }
    }

    public function afterFilter()
    {
        if($this->isJson())
        {
            $this->set('json', array_keys($this->viewVars));
        }
    }
    
    protected function isJson() {
        return ($this->RequestHandler->ext == 'json');
    }

}