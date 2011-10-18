<?php

class JsonPagerHelper extends AppHelper
{

    public $helpers = array( "Paginator" );

    public function params()
    {
        $params = $this->Paginator->params();
        unset($params[ "defaults" ]);
        unset($params[ "options" ]);
        return $params;
    }

}