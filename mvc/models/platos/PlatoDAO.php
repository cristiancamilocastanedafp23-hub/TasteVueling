<?php 
// Incluimos el archivo de configuracion de la BBDD
include_once("config/dataBase.php");

// Incluimos la clase Plato
include_once __DIR__ . '/Plato.php';

// Creamos el DAO de plato
class PlatoDAO {

    // Funcion que recupera todos los platos
    public static function getAll()
    {
        // Abrimos conexión
        $conexion = DataBase::connect();

        // Definimos consulta
        $statement = $conexion->prepare("SELECT * FROM productos WHERE tipo_id = 1");

        // Ejecutamos consulta
        $statement->execute();

        // Obtenemos resultado
        $resultado = $statement->get_result();

        // Creamos un array para guardar posteriormente los resultados
        $productos = [];

        // Guardamos lo que la consulta obtenga en el array
        while ($producto = $resultado->fetch_object("Plato")) {
            $productos[] = $producto;
        }

        // Cerramos la consulta
        $statement->close();

        // Cerramos conexión
        $conexion->close();

        // Devolvemos el array
        return $productos;
    }

    // Funcion que recupera el plato por el ID
    public static function getId($id) 
    {
        // Abrimos conexión
        $conexion = DataBase::connect();

        // Preparamos consulta
        $statement = $conexion->prepare("SELECT * FROM productos WHERE id = ? AND tipo_id = 1");
        $statement->bind_param("i", $id);

        // Ejecutamos consulta
        $statement->execute();

        // Obtenemos resultado
        $resultado = $statement->get_result();
        $plato = $resultado->fetch_object("Plato");

        // Cerramos la consulta
        $statement->close();

        // Cerramos conexión
        $conexion->close();

        // Devolvemos el plato
        return $plato;
    }

}