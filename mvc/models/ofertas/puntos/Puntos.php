<?php

// Incluimos la clase padre Oferta
include_once __DIR__ . '/../Oferta.php';

// Indicamos que la clase hereda de Oferta
class Puntos extends Oferta
{
    // Hereda del constructor
    public function __construct($id = null,$nombre = null,$descripcion = null,$tipo = null,$valor = null,$codigo = null,$fecha_inicio = null,$fecha_fin = null,$activa = null,$puntos_necesarios = null) 
    {
        return parent::__construct($id,$nombre,$descripcion,$tipo,$valor,$codigo,$fecha_inicio,$fecha_fin,$activa,$puntos_necesarios);
    }

    // Funcion para definir cuantos puntos gana el usuario
    // al comprar un producto
    public static function puntosObtener ($importe){
        return (int) floor($importe * 10);
    }
}