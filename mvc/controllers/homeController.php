<?php

class homeController
{
    public function index()
    {
        $view = "mvc/views/home/index.php";
        include_once "mvc/views/main.php";
    }
}