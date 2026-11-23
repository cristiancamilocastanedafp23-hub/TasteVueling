<?php 
// Creamos la clase categoria, pero en este caso no es
// abstract ya que ninguna clase más heredará
class Categoria {

    // Los nombres deben coincidir con las columnas de la tabla (Categorias)
    protected $id;
    protected $nombre;
    protected $descripcion;
    protected $precio;
    protected $imagen;
    protected $activa;

    /*
     * fetch_object() rellena las propiedades ANTES de llamar al constructor.
     * Por eso no hay que pisarlas con valores vacíos cuando se instancia sin argumentos.
    */

    /* Constructor */
    public function __construct($id = null, $nombre = null, $descripcion = null, $precio = null, $imagen = null, $activa = null)
    {
        if ($id !== null) {
            $this->id = $id;
        }
        if ($nombre !== null) {
            $this->nombre = $nombre;
        }
        if ($descripcion !== null) {
            $this->descripcion = $descripcion;
        }
        if ($precio !== null) {
            $this->precio = $precio;
        }
        if ($imagen !== null) {
            $this->imagen = $imagen;
        }
        if ($activa !== null) {
            $this->activa = $activa;
        }
    }

    /*Id*/
    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /*Nombre*/
    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
        return $this;
    }

    /*Descripcion*/
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
        return $this;
    }

    /*Precio*/
    public function getPrecio()
    {
        return $this->precio;
    }

    public function setPrecio($precio)
    {
        $this->precio = $precio;
        return $this;
    }

    /*Imagen*/
    public function getImagen()
    {
        return $this->imagen;
    }

    public function setImagen($imagen)
    {
        $this->imagen = $imagen;
        return $this;
    }

    /*Activa*/
    public function getActiva()
    {
        return $this->activa;
    }

    public function setActiva($activa)
    {
        $this->activa = $activa;
        return $this;
    }
}