<?php 
// Incluimos el archivo de configuracion de la BBDD
include_once("config/dataBase.php");

// Incluimos la clase Bebida
include_once __DIR__ . '/Bebida.php';

//Creamos el DAO de Bebida
class BebidaDAO {

    // Funcion que recoge todas las bebidas
    public static function getAll()
    {
        // Abrimos conexión
        $conexion = DataBase::connect();

        // Definimos consulta
        $statement = $conexion->prepare("SELECT * FROM productos WHERE tipo_id = 3");

        // Ejecutamos consulta
        $statement->execute();

        // Obtenemos resultado
        $resultado = $statement->get_result();

        // Creamos un array para guardar posteriormente los resultados
        $productos = [];

        // Guardamos lo que la consulta obtenga en el array
        while ($producto = $resultado->fetch_object("Bebida")) {
            $productos[] = $producto;
        }

        // Cerramos la consulta
        $statement->close();

        // Cerramos conexión
        $conexion->close();

        // Devolvemos el array
        return $productos;
    }

    // Funcion que recupera la bebida por el ID
    public static function getId($id) 
    {
        // Abrimos conexión
        $conexion = DataBase::connect();

        // Preparamos consulta
        $statement = $conexion->prepare("SELECT * FROM productos WHERE id = ? AND tipo_id = 3");
        $statement->bind_param("i", $id);

        // Ejecutamos consulta
        $statement->execute();

        // Obtenemos resultado
        $resultado = $statement->get_result();
        
        $bebida = $resultado->fetch_object("Bebida");

        // Cerramos la consulta
        $statement->close();

        // Cerramos conexión
        $conexion->close();

        // Devolvemos la bebida
        return $bebida;
    }
}