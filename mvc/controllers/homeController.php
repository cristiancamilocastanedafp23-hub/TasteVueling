<?php

//Creamos la clase controller del home
class homeController
{
    public function index()
    {
        //Definimos la variable con la ruta
        $view = "mvc/views/home/home.php";

        //La incluimos en el main.php
        include_once "mvc/views/main.php";
    }
}