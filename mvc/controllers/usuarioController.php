<?php

//Incluimos el archivo DAO de los usuarios
include_once("mvc/models/usuarios/UsuarioDAO.php");

//Creamos la clase controller del home
class usuarioController
{

    //Registro del usuario
    public function register()
    {
        if($_SERVER['REQUEST_METHOD'] == "POST"){

            //Obtenemos los datos y los limpiamos
            $nombre = trim($_POST["nombre"] ?? '');
            $fechaNacimiento = trim($_POST["fecha-nacimiento"] ?? '');
            $email = trim($_POST["email"] ?? '');
            $password = trim($_POST["password"] ?? '');

            //Comprobamos que no falte ningún campo
            if ($nombre === '' || $email === '' || $fechaNacimiento === '' || $password === '') {
                $_SESSION['error_registro'] = "Rellena todos los campos.";
            }
            //Comprobamos que el email no exista ya
            elseif (UsuarioDAO::getEmail($email) !== null) {
                $_SESSION['error_registro'] = "Ya existe una cuenta con ese correo.";
            }
            else {
                UsuarioDAO::createUser($nombre, $email, $fechaNacimiento, $password);
                $_SESSION['registro_valido'] = "Cuenta creada. Ya puedes acceder.";
            }
        }

        //Redirigimos siempre, sea POST O no
        header("Location:" .url);
        exit;
    }

    //Login del usuario
    public function login()
    {
        //Comprobamos que el servidor recibe por post
        if ($_SERVER['REQUEST_METHOD'] == "POST") {

            //Obtenemos email y password, limpiamos los datos
            $email = trim($_POST["email"] ?? '');
            $password = trim($_POST["password"] ?? '');

            //Buscamos el usuario por su email
            $usuario = UsuarioDAO::getEmail($email);

            //Hacemos la verificacion
            if ($usuario === null || $password !== $usuario->getPassword()) {
                $_SESSION['error_login'] = "Datos incorrectos";
            } else {
                //Si la sesión es correcta, guardamos los datos
                $_SESSION['usuario'] = [
                    'id'     => $usuario->getId(),
                    'nombre' => $usuario->getNombre(),
                    'email'  => $usuario->getEmail(),
                    'rol'    => $usuario->getRol()
                ];
            }
        }

        //Redirigimos siempre, sea POST o no
        header("Location: " . url);
        exit;
    }

    
}