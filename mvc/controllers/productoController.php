<?php

// Incluimos el archivo DAO de las categorias
include_once("mvc/models/categorias/CategoriaDAO.php");

// Incluimos el archivo DAO de los platos de la carta
include_once("mvc/models/platos/PlatoDAO.php");

// Incluimos el archivo DAO de los postres de la carta
include_once("mvc/models/postres/PostreDAO.php");

// Incluimos el archivo DAO de los bebidas de la carta
include_once("mvc/models/bebidas/BebidaDAO.php");

// Incluimos el archivo DAO de los ingredientes de los productos
include_once("mvc/models/ingredientes/Ingrediente_ProductoDAO.php");

// Creamos la clase controller de producto
class productoController
{
    // Muestra la página de edición de un plato o postre
    public function detalle()
    {
        // Validamos que el id y el tipo lleguen bien por la URL
        // y sino redirigimos a la carta
        if (!isset($_GET['id']) || !ctype_digit($_GET['id']) || !isset($_GET['tipo'])) {
            header("Location: " . url . "?controller=carta");
            exit;
        }

        // Convertimos el id y el tipo en enteros
        $id = (int) $_GET['id'];
        $tipo = (int) $_GET['tipo'];

        // Elegimos el DAO según el tipo (1 = plato, 2 = postre)
        if ($tipo === 1) {
            $producto = PlatoDAO::getId($id);
        } elseif ($tipo === 2) {
            $producto = PostreDAO::getId($id);
        } else {
            $producto = null;
        }

        // Si no existe el producto, mostramos el error
        if (!$producto) {
            showError(404, "No existe el producto");
        }

        // Nombre de la categoría del producto
        $nombreCategoria = CategoriaDAO::getNombreById($producto->getCategoriaId());
        
        // Obtenemos los ingredientes del producto (base, incluido y extra)
        $ingredientes = Ingrediente_ProductoDAO::getIngredientesProductoById($id);

        // Listas vacias para recoger ingredientes y alérgenos
        $ingredientesBase = [];
        $alergenos = [];

        // Bucle para recorrer los ingredientes
        foreach ($ingredientes as $ingrediente) {
            // Guardamos el nombre de los ingredientes base
            if ($ingrediente->getTipo() === "base") {
                $ingredientesBase[] = $ingrediente->getNombre();
            }

            // Separamos "Gluten, Lactosa" en elementos sueltos y los añadimos
            if (!empty($ingrediente->getAlergenos())) {
                foreach (explode(",", $ingrediente->getAlergenos()) as $alergeno) {
                    $alergenos[] = trim($alergeno);
                }
            }
        }

        // Quitamos los repetidos
        $alergenos = array_unique($alergenos);

        // Hacemos una lista de los ingredientes marcados
        $marcados = [];

        // Abrimos el form, donde nos llegaran los ingredientes enviados
        if ($_SERVER['REQUEST_METHOD'] === 'POST') { 
            // El usuario ha enviado el formulario: cogemos lo que ha marcado
            $enviados = $_POST['ingredientes'] ?? [];

            // Solo aceptamos ids que realmente pertenecen a este producto
            foreach ($ingredientes as $ingrediente) {
                if ($ingrediente->getTipo() === 'base' || in_array($ingrediente->getIngredienteId(), $enviados)) {
                    $marcados[] = $ingrediente->getIngredienteId();
                }
            }

        } else {
            // Primera vez: base e incluidos marcados, extras sin marcar
            foreach ($ingredientes as $ingrediente) {
                if ($ingrediente->getTipo() === 'base' || $ingrediente->getTipo() === 'incluido') {
                    $marcados[] = $ingrediente->getIngredienteId();
                }
            }
        }

        // Precio total: precio del producto + extras marcados
        $precioTotal = (float) $producto->getPrecio();
        foreach ($ingredientes as $ing) {
            if ($ing->getTipo() === 'extra' && in_array($ing->getIngredienteId(), $marcados)) {
                $precioTotal += (float) $ing->getPrecioExtra();
            }
        }

        // Botón "Añadir al carrito"
        if (isset($_POST['accion']) && $_POST['accion'] === 'anadir') {
            $_SESSION['carrito'][] = [
                'id'           => $producto->getId(),
                'nombre'       => $producto->getNombre(),
                'ingredientes' => $marcados,
                'precio'       => $precioTotal
            ];

            // De momento volvemos a la carta (cuando exista el carrito, redirigir allí)
            header("Location: " . url . "?controller=carta");
            exit;
        }

        // Cargamos la vista dentro del main.php
        $view = "mvc/views/producto/detalle.php";
        include_once 'mvc/views/main.php';
    }
}