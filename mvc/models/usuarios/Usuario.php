<?php
// Creamos la clase usuario, pero en este caso no es
// abstract ya que ninguna clase más heredará
class Usuario
{
    //  Los nombres deben coincidir con las columnas de la tabla (usuarios)
    protected $id;
    protected $nombre;
    protected $email;
    protected $password;
    protected $telefono;
    protected $direccion;
    protected $fecha_nacimiento;
    protected $rol = "Cliente";
    protected $fecha_registro;

    /*
    - fetch_object() rellena las propiedades ANTES de llamar al constructor.
    - Por eso no hay que pisarlas con valores vacíos cuando se instancia sin argumentos.
    */

    /* Constructor */
    public function __construct($id = null, $nombre = null, $email = null, $password = null, $telefono = null,
        $direccion = null, $fecha_nacimiento = null, $rol = null,$fecha_registro = null) 
    {
        if ($id !== null) {
            $this->id = $id;
        }
        if ($nombre !== null) {
            $this->nombre = $nombre;
        }
        if ($email !== null) {
            $this->email = $email;
        }
        if ($password !== null) {
            $this->password = $password;
        }
        if ($telefono !== null) {
            $this->telefono = $telefono;
        }
        if ($direccion !== null) {
            $this->direccion = $direccion;
        }
        if ($fecha_nacimiento !== null) {
            $this->fecha_nacimiento = $fecha_nacimiento;
        }
        if ($rol !== null) {
            $this->rol = $rol;
        }
        if ($fecha_registro !== null) {
            $this->fecha_registro = $fecha_registro;
        }
    }

    // GETTERS Y SETTERS    

    // Id
    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    // Nombre
    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
        return $this;
    }

    // Email
    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    // Password
    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
        return $this;
    }

    // Teléfono
    public function getTelefono()
    {
        return $this->telefono;
    }

    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;
        return $this;
    }

    // Direccion
    public function getDireccion()
    {
        return $this->direccion;
    }

    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;
        return $this;
    }

    // Fecha_nacimiento
    public function getFechaNacimiento()
    {
        return $this->fecha_nacimiento;
    }

    public function setFechaNacimiento($fecha_nacimiento)
    {
        $this->fecha_nacimiento = $fecha_nacimiento;
        return $this;
    }

    // Rol
    public function getRol()
    {
        return $this->rol;
    }

    public function setRol($rol)
    {
        $this->rol = $rol;
        return $this;
    }

    // Fecha_registro
    public function getFechaRegistro()
    {
        return $this->fecha_registro;
    }

    public function setFechaRegistro($fecha_registro)
    {
        $this->fecha_registro = $fecha_registro;
        return $this;
    }
}