<?php

//Incluimos el archivo DAO de las categorias de la carta
include_once("mvc/models/categorias/CategoriaDAO.php");

//Creamos la clase controller del home
class homeController
{
    public function index()
    {
        //Obtenemos las categorias, en mi caso, son los continentes
        $continentes = CategoriaDAO::getAll();

        //Definimos la variable con la ruta
        $view = "mvc/views/home/home.php";

        //La incluimos en el main.php
        include_once "mvc/views/main.php";
    }
}