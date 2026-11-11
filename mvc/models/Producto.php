<?php

abstract class Producto
{
    // Los nombres deben coincidir con las columnas de la tabla (Productos)
    protected $id;
    protected $categoria_id;
    protected $nombre;
    protected $descripcion;
    protected $precio;
    protected $tipo_id;
    protected $imagen;
    protected $activo;

    /*
     * fetch_object() rellena las propiedades ANTES de llamar al constructor.
     * Por eso no hay que pisarlas con valores vacíos cuando se instancia sin argumentos.
    */

    /* Constructor */
    public function __construct($id = null, $categoria_id = null, $nombre = null
    , $descripcion = null, $precio = null, $tipo_id = null, $imagen = null, $activo = null)
    {
        if ($id !== null){
            $this->id = $id;
        }
        if ($categoria_id !== null){
            $this->categoria_id = $categoria_id;
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
        if ($tipo_id !== null) {
            $this->tipo_id = $tipo_id;
        }
        if($imagen !== null){
            $this->imagen = $imagen;
        }
        if($activo !== null){
            $this->activo = $activo;
        }   
    }

    //GETTERS Y SETTERS    

    //Id
    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    //Categoria_id
    public function getCategoriaId()
    {
        return $this->categoria_id;
    }

    public function setCategoriaId($categoria_id)
    {
        $this->categoria_id = $categoria_id;
        return $this;
    }

    //Nombre
    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
        return $this;
    }

    //Descripcion
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
        return $this;
    }

    //Precio
    public function getPrecio()
    {
        return $this->precio;
    }

    public function setPrecio($precio)
    {
        $this->precio = $precio;
        return $this;
    }

    //Tipo
    public function getTipoId()
    {
        return $this->tipo_id;
    }

    public function setTipoId($tipo_id)
    {
        $this->tipo_id = $tipo_id;
        return $this;
    }

    //Imagen
    public function getImagen()
    {
        return $this->imagen;
    }

    public function setImagen($imagen)
    {
        $this->imagen = $imagen;
        return $this;
    }

    //Activo
    public function getActivo()
    {
        return $this->activo;
    }

    public function setActivo($activo)
    {
        $this->activo = $activo;
        return $this;
    }
}
