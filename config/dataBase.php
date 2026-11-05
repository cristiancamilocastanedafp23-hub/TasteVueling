<?php
//Archivo de conexión a la base de datos
class DataBase
{
    //Host, puerto y base
    private const DB_HOST = '127.0.0.1';
    private const DB_PORT = 3307;
    private const DB_NAME = 'mysql-tastevueling';
    
    //Usuario y contraseña
    private const DB_USER = 'root';
    private const DB_PASS = 'admin'; 
    
    //Funcion que nos conecta a la BBDD
    public static function connect(
        $host = self::DB_HOST,
        $user = self::DB_USER,
        $password = self::DB_PASS,
        $name = self::DB_NAME,
        $port = self::DB_PORT
    ) {
        //Realizamos  la conexión
        $conexion = new mysqli($host, $user, $password, $name, $port);

        //Si da error, indicamos el error con un mensaje
        if ($conexion->connect_error) {
            die("ERROR!!: No te puedes conectar: " . $conexion->connect_error);
        }

        //Codificacion de caracteres
        $conexion->set_charset("utf8mb4");

        //Devolvemos la conexión
        return $conexion;
    }
}
