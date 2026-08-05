<?php

class HomeController
{
    public function index(): void
    {
        $site = require APP_PATH . '/config/site.php';
        $title = $site['meta']['title'];
        $description = $site['meta']['description'];
        $view = APP_PATH . '/views/home/index.php';

        require APP_PATH . '/views/layouts/main.php';
    }
}
