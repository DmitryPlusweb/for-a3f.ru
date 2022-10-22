<?php

namespace plusweb;

class Application
{

    public Router $router;

    public function __construct()
    {
        $this->router = new Router();
    }

    public function run()
    {
        return $this->router->resolve();
    }

}
