<?php 
// Incluimos el archivo de configuracion de la BBDD
include_once("config/dataBase.php");

//Incluimos la clase Padre
include_once __DIR__ . '/Bebida.php';

class BebidaDAO {
    public static function getAll()
    {
        //Abrimos conexión
        $conexion = DataBase::connect();

        //Definimos consulta
        $statement = $conexion->prepare("SELECT * FROM productos WHERE tipo_id = 3");

        //Ejecutamos consulta
        $statement->execute();

        //Obtenemos resultado
        $resultado = $statement->get_result();

        //Creamos un array para guardar posteriormente los resultados
        $productos = [];

        //Guardamos lo que la consulta obtenga en el array
        while ($producto = $resultado->fetch_object("Bebida")) {
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