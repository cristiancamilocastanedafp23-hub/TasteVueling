<?php

// Incluimos el archivo de configuracion de la BBDD
include_once("config/dataBase.php");

// Incluimos la clase Alergeno
include_once __DIR__ . '/Alergeno.php';

// Creamos el DAO de alergenos
class AlergenoDAO {

    // Funcion para obtener los alergenos por el ID del producto
    public static function getAlergenosByProductoId($productoId)
    {
        // Abrimos conexión
        $conexion = DataBase::connect();

        // Definimos consulta
        $consulta = "SELECT a.id, a.nombre, a.icono
                     FROM producto_alergeno pa
                     INNER JOIN alergenos a ON pa.alergeno_id = a.id
                     WHERE pa.producto_id = ?
                     ORDER BY a.id";

        // Preparamos consulta
        $statement = $conexion->prepare($consulta);
        $statement->bind_param("i", $productoId);

        // Ejecutamos consulta
        $statement->execute();

        // Obtenemos resultado
        $resultado = $statement->get_result();

        // Creamos un array para guardar posteriormente los resultados
        $alergenos = [];

        // Guardamos lo que la consulta obtenga en el array
        while ($alergeno = $resultado->fetch_object("Alergeno")) {
            $alergenos[] = $alergeno;
        }

        // Cerramos la consulta
        $statement->close();

        // Cerramos conexión
        $conexion->close();

        // Devolvemos el array
        return $alergenos;
    }
}