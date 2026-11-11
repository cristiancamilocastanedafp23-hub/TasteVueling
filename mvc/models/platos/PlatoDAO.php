<?php 
// Incluimos el archivo de configuracion de la BBDD
include_once("config/dataBase.php");

//Incluimos la clase Padre
include_once __DIR__ . '/Plato.php';

class PlatoDAO {
    public static function getAll()
    {
        //Abrimos conexión
        $conexion = DataBase::connect();

        //Definimos consulta
        $statement = $conexion->prepare("SELECT * FROM productos WHERE tipo_id = 1");

        //Ejecutamos consulta
        $statement->execute();

        //Obtenemos resultado
        $resultado = $statement->get_result();

        //Creamos un array para guardar posteriormente los resultados
        $productos = [];

        //Guardamos lo que la consulta obtenga en el array
        while ($producto = $resultado->fetch_object("Plato")) {
            $productos[] = $producto;
        }

        //Cerramos la consulta
        $statement->close();

        //Cerramos conexión
        $conexion->close();

        //Devolvemos el array
        return $productos;
    }
}