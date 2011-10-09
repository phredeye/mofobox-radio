<?php

/**
 * Class of view for JSON  
 *  
 * @author Juan Basso  
 * @url http://blog.cakephp-brasil.org/2008/09/11/trabalhando-com-json-no-cakephp-12/  
 * @licence MIT  
 */
class JsonView extends View
{

    function render($action = null, $layout = null, $file = null)
    {
        $vars = array_keys($this->viewVars);
        if(is_array($vars))
        {
            $jsonVars = array( );
            foreach($vars as $var)
            {
                if(isset($this->viewVars[ $var ]))
                {
                    $jsonVars[ $var ] = $this->viewVars[ $var ];
                }
                else
                {
                    $jsonVars[ $var ] = null;
                }
            }
            return $this->renderJson($jsonVars);
        }

        return 'null';
    }

    function renderJson($content)
    {
        header('Content-type: application/json');
        $out = json_encode($content);
        Configure::write('debug', 0); // Omit time in end of view  
        return $out;
    }

}