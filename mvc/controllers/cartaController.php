<?php

//Incluimos el archivo DAO de las categorias de la carta
include_once("mvc/models/categorias/CategoriaDAO.php");

//Incluimos el archivo Producto.php
include_once("mvc/models/Producto.php");

//Incluimos el archivo DAO de los platos de la carta
include_once("mvc/models/platos/PlatoDAO.php");

//Incluimos el archivo DAO de los postres de la carta
include_once("mvc/models/postres/PostreDAO.php");

//Incluimos el archivo DAO de los bebidas de la carta
include_once("mvc/models/bebidas/BebidaDAO.php");

//Creamos la clase del controller
class cartaController
{

    public function index()
    {
        //Obtenemos las categorias, en mi caso, son los continentes
        $continentes = CategoriaDAO::getAll();

        //Obtenemos los platos
        $platos = PlatoDAO::getAll();

        //Obtenemos los postres
        $postres = PostreDAO::getAll();

        //Obtenemos las bebidas
        $bebidas = BebidaDAO::getAll();

        //Ahora en un array pondremos nuestros tipos en un array
        $tipos = [
    'Platos'  => $platos,
    'Postres' => $postres,
    'Bebidas' => $bebidas,
];

        //Definimos la variable con la ruta
        $view = "mvc/views/carta/carta.php";
        
        //La incluimos en el main.php
        include_once 'mvc/views/main.php';
    }

    // public function create()
    // {
    //     $view = "mvc/views/productos/create.php";
    //     include_once 'mvc/views/main.php';
    // }

    // public function store()
    // {
    //     $nombre = isset($_POST['nombre']) ? trim($_POST['nombre']) : '';
    //     $talla = isset($_POST['talla']) ? $_POST['talla'] : '';
    //     $precio = isset($_POST['precio']) ? $_POST['precio'] : '';

    //     if ($nombre === '' || !in_array($talla, self::TALLAS_VALIDAS, true) || !is_numeric($precio) || $precio < 0) {
    //         header('Location:?controller=producto&action=create');
    //         exit;
    //     }

    //     $producto = new Camiseta($nombre, $talla, (float) $precio);
    //     CamisetaDAO::store($producto);

    //     header('Location:?controller=producto');
    //     exit;
    // }

    // public function destroy()
    // {
    //     if (!isset($_GET['id']) || !ctype_digit((string) $_GET['id'])) {
    //         header('Location:?controller=producto');
    //         exit;
    //     }

    //     CamisetaDAO::destroy((int) $_GET['id']);
    //     header('Location:?controller=producto');
    //     exit;
    // }

    // public function show()
    // {
    //     if (!isset($_GET['id']) || !ctype_digit((string) $_GET['id'])) {
    //         header('Location:?controller=producto');
    //         exit;
    //     }

    //     $producto = CamisetaDAO::getById((int) $_GET['id']);
    //     if ($producto === null) {
    //         header('Location:?controller=producto');
    //         exit;
    //     }

    //     $view = "mvc/views/productos/show.php";
    //     include_once 'mvc/views/main.php';
    // }
}
