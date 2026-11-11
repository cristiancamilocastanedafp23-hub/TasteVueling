<?php

//Incluimos la clase padre Producto
include_once __DIR__ . '/../Producto.php';

//Indicamos que la clase hereda de producto
class Plato extends Producto
{
    public function __construct($id = null, $categoria_id = null, $nombre = null, $descripcion = null, $precio = null, $tipo_id = null, $imagen = null, $activo = null)
    {
        return parent::__construct($id, $categoria_id, $nombre, $descripcion, $precio, $tipo_id, $imagen, $activo);
    }
}

