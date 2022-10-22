<?php

namespace plusweb;

use plusweb\View;
use plusweb\Service;

class Controller
{

    private Service $service;
    private View $view;

    public function __construct()
    {
        $this->service = new Service();
        $this->view = new View();
    }

    public function mainAction()
    {
        return $this->view->getMain();
    }

    public function partialAction()
    {
        $jsonFlag = filter_input(INPUT_GET, 'json');
        $url = filter_input(INPUT_GET, 'url', FILTER_VALIDATE_URL);
        $data = (!empty($url)) ? $this->service->getTagsCount($url) : ['result' => false, 'error' => 'wrong url'];

        return ($jsonFlag != 1) ? $this->view->getPartial($data) : $this->view->getJson($data);
    }

}
