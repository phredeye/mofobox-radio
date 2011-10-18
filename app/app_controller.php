<?php

class AppController extends Controller
{

    public $helpers = array( "Session", "Html", "Form", "Text","Javascript", "Time", "JsonPager");
    public $components = array( "RequestHandler", "Session", "Auth" );

    protected function isJson() 
	{
        return ($this->RequestHandler->ext == 'json');
    }

}