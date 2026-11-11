<?php 
// Incluimos el archivo de configuracion de la BBDD
include_once("config/dataBase.php");

//Incluimos la clase Padre
include_once __DIR__ . '/Categoria.php';

class CategoriaDAO {
    public static function getAll()
    {
        //Abrimos conexión
        $conexion = DataBase::connect();

        //Definimos consulta
        $statement = $conexion->prepare("SELECT * FROM categorias");

        //Ejecutamos consulta
        $statement->execute();

        //Obtenemos resultado
        $resultado = $statement->get_result();

        //Creamos un array para guardar posteriormente los resultados
        $categorias = [];

        //Guardamos lo que la consulta obtenga en el array
        while ($categoria = $resultado->fetch_object("Categoria")) {
            $categorias[] = $categoria;
        }

        //Cerramos la consulta
        $statement->close();

        //Cerramos conexión
        $conexion->close();

        //Devolvemos el array
        return $categorias;
    }
}