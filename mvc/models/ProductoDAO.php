<?php
//Incluimos el archvo de la conexión a la BBDD
include_once __DIR__ . '/../../config/dataBase.php';

//Incluimos la clase Producto
include_once __DIR__ . '/Producto.php';

//Creamos la clase ProductoDAO
class ProductoDAO
{
    //Metodo para recuperar todos los productos de la lista
    public static function getAll()
    {
        //Establecemos la conexión
        $conexion = DataBase::connect();

        //Preparamos la consulta para realizarla en la BBDD
        $sql = "SELECT p.*, c.nombre AS categoria_nombre 
                FROM productos p 
                INNER JOIN categorias c ON p.categoria_id = c.id 
                WHERE p.activo = TRUE AND c.activa = TRUE 
                ORDER BY c.id ASC, FIELD(p.tipo, 'plato' , 'postre') ASC, p.nombre ASC";

        //Preparamos la variable statement para enviarla al servidor de la BBDD
        //y que compile
        $stmt = $conexion->prepare($sql);
        //Ejecutamos
        $stmt->execute();
        //Obtenemos el resultado de la consulta
        $resultado = $stmt->get_result();

        //Creamos un array vacio donde guardaremos el resultado de la consulta
        $productos = [];

        //Bucle donde guardamos los productos en el array vacio
        while ($producto = $resultado->fetch_object("Producto")) {
            $productos[] = $producto;
        }

        //Cerramos la consulta para que no se quede ejecutandose después de 
        //devolver el resultado
        $stmt->close();
        //Cerramos conexión
        $conexion->close();

        //Devolvemos la lista
        return $productos;
    }

    // public static function getById($id)
    // {
    //     $con = DataBase::connect();
    //     $stmt = $con->prepare("SELECT * FROM camisetas WHERE id = ?");
    //     $stmt->bind_param("i", $id);
    //     $stmt->execute();
    //     $result = $stmt->get_result();

    //     $producto = $result->fetch_object("Camiseta");

    //     $stmt->close();
    //     $con->close();

    //     return $producto ?: null;
    // }

    // public static function store($producto)
    // {
    //     $con = DataBase::connect();
    //     $stmt = $con->prepare("INSERT INTO camisetas (nombre, talla, precio) VALUES (?, ?, ?)");

    //     $nombre = $producto->getNombre();
    //     $talla = $producto->getTalla();
    //     $precio = $producto->getPrecio();

    //     $stmt->bind_param("ssd", $nombre, $talla, $precio);
    //     $stmt->execute();

    //     $stmt->close();
    //     $con->close();
    // }

    // public static function destroy($id)
    // {
    //     $con = DataBase::connect();
    //     $stmt = $con->prepare("DELETE FROM camisetas WHERE id = ?");
    //     $stmt->bind_param("i", $id);
    //     $stmt->execute();

    //     $stmt->close();
    //     $con->close();
    // }
}
