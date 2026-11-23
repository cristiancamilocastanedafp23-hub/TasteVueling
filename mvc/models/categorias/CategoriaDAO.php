<?php 
// Incluimos el archivo de configuracion de la BBDD
include_once("config/dataBase.php");

//Incluimos la clase Categoria
include_once __DIR__ . '/Categoria.php';

//Creamos el DAO de categoria
class CategoriaDAO {

    //Funcion de obtener todos
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

    //Funcion de obtener el nombre por ID
    public static function getNombreById($id)
    {
        //Abrimos conexión
        $conexion = DataBase::connect();

        //Definimos consulta
        $statement = $conexion->prepare("SELECT nombre FROM categorias WHERE id = ?");

        //Rellenamos la consulta
        $statement -> bind_param("i",$id);

        //Ejecutamos consulta
        $statement->execute();

        //Obtenemos resultado
        $resultado = $statement->get_result();

        //Hacemos fetch
        $nombreCategoria = $resultado->fetch_object("Categoria");

        //Cerramos la consulta
        $statement->close();

        //Cerramos conexión
        $conexion->close();

        return $nombreCategoria -> getNombre();
    }
}