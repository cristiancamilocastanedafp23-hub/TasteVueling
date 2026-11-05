<?php

class Producto
{
    // Los nombres deben coincidir con las columnas de la tabla (camisetas)
    protected $id;
    protected $categoria_id;
    protected $nombre;
    protected $descripcion;
    protected $precio;
    protected $tipo;
    protected $imagen;
    protected $activo;

    // Creamos este atributo para que podamos obtener el nombre de la categoria 
    // (en mi caso continente) del join
    protected $categoria_nombre;

    /**
     * fetch_object() rellena las propiedades ANTES de llamar al constructor.
     * Por eso no hay que pisarlas con valores vacíos cuando se instancia sin argumentos.
     */

    /* Constructor */
    public function __construct($id = null, $categoria_id = null, $nombre = null
    , $descripcion = null, $precio = null, $tipo = null, $imagen = null, $activo = null, 
    $categoria_nombre = null)
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
        if ($tipo !== null) {
            $this->tipo = $tipo;
        }
        if($imagen !== null){
            $this->imagen = $imagen;
        }
        if($activo !== null){
            $this->activo = $activo;
        }
        if($categoria_nombre !== null){
            $this->categoria_nombre = $categoria_nombre;
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
    public function getTipo()
    {
        return $this->tipo;
    }

    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
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
    
    //Categoria Nombre
    public function getCategoriaNombre()
    {
        return $this->categoria_nombre;
    }

    public function setCategoriaNombre($categoria_nombre)
    {
        $this->categoria_nombre = $categoria_nombre;
        return $this;
    }
}
