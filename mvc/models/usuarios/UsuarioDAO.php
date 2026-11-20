<?php 
// Incluimos el archivo de configuracion de la BBDD
include_once("config/dataBase.php");

//Incluimos la clase Padre
include_once __DIR__ . '/Usuario.php';

//Creamos UsuarioDAO
class UsuarioDAO {

    //Registrar usuario
    public static function createUser($nombre, $email, $fechaNacimiento, $password)
    {
        //Abrimos conexión
        $conexion = DataBase::connect();

        //Definimos consulta 
        $statement = $conexion->prepare(
            "INSERT INTO usuarios (nombre, email, fecha_nacimiento, password, fecha_registro)
             VALUES (?, ?, ?, ?, NOW())"
        );

        //Preparamos la consulta
        $statement->bind_param("ssss", $nombre, $email, $fechaNacimiento, $password);

        //Ejecutamos la consulta 
        $correcto = $statement->execute();

        //Cerramos la consulta
        $statement->close();

        //Cerramos conexión
        $conexion->close();

        //Devolvemos si ha ido bien
        return $correcto;
    }


    // Buscar usuario por Email 
    public static function getEmail($email)
    {
        //Abrimos conexión
        $conexion = DataBase::connect();

        //Definimos consulta
        $statement = $conexion->prepare("SELECT * FROM usuarios WHERE email = ?");

        //Preparamos la consulta
        $statement->bind_param("s", $email); 

        //Ejecutamos la consulta
        $statement->execute();

        //Obtenemos resultado
        $resultado = $statement->get_result();

        $usuario = $resultado->fetch_object("Usuario");

        //Cerramos la consulta
        $statement->close();

        //Cerramos conexión
        $conexion->close();

        //Devolvemos el objeto o null
        return $usuario ?: null;
    }
}