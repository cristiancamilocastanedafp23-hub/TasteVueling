<?php

//Incluimos el archivo DAO de los productos de la carta
include_once("mvc/models/ProductoDAO.php");

//Creamos la clase del controller
class cartaController
{

    public function index()
    {
        //Definimos los productos previamente obtenidos en el DAO
        $listaProductos = ProductoDAO::getAll();

        //Array para los productos
        $cartaProductos = [];

        //Array para las bebidas
        $bebidas = [];

        //Bucle
        foreach($listaProductos as $producto){
            if($producto -> getTipo() === "bebida"){
                $bebidas[] = $producto;
            }else{
                $continente = $producto-> getCategoriaNombre();
                $tipo = $producto -> getTipo();
                $cartaProductos[$continente][$tipo][] = $producto;
            }
        }

        //Incluimos la vista
        $view = "mvc/views/carta/index.php";
        
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
