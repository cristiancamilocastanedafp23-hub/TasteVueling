<?php

// Incluimos el archivo de configuracion de la BBDD
include_once("config/dataBase.php");

//Incluimos la clase Ingrediente_Producto
include_once __DIR__ . '/Ingrediente_Producto.php';

//Creamos el DAO de ingredientes del producto
class Ingrediente_ProductoDAO {

    //Funcion de obtener los ingredientes por el ID del producto
    public static function getIngredientesProductoById($productoId)
    {
        //Abrimos conexión
        $conexion = DataBase::connect();

        //Definimos consulta
        $consulta = "SELECT pi.producto_id, pi.ingrediente_id, pi.tipo, pi.cantidad,
                            i.nombre, i.precio_extra, i.alergenos
                            FROM producto_ingrediente pi
                            INNER JOIN ingredientes i ON pi.ingrediente_id = i.id
                            WHERE pi.producto_id = ? 
                            ORDER BY pi.tipo desc, i.precio_extra";

        //Preparamos consulta
        $statement = $conexion->prepare($consulta);
        $statement->bind_param("i", $productoId);

        //Ejecutamos consulta
        $statement->execute();

        //Obtenemos resultado
        $resultado = $statement->get_result();

        //Creamos un array para guardar posteriormente los resultados
        $ingredientesProducto = [];

        //Guardamos lo que la consulta obtenga en el array
        while ($ingrediente = $resultado->fetch_object("Ingrediente_Producto")) {
            $ingredientesProducto[] = $ingrediente;
        }

        //Cerramos la consulta
        $statement->close();

        //Cerramos conexión
        $conexion->close();

        //Devolvemos el array
        return $ingredientesProducto;
    }
    
}