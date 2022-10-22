<?php

namespace plusweb;

class View
{

    
            
    public function getMain()
    {
        $title = 'Example. Main page';
        include  __DIR__ . '/view/main.phtml';
        exit;
    }

    public function getPartial($data = [])
    {

        echo 'html';
        echo '<pre>'.print_r($data,true);
        exit;
    }

    public function getJson($data = [])
    {
        echo 'json';
        echo '<pre>'. json_encode($data);
        exit;
        
    }

}
