<?php 

class Categoria {

    // Los nombres deben coincidir con las columnas de la tabla (Categorias)
    protected $id;
    protected $nombre;
    protected $descripcion;
    protected $activa;

    /*
     * fetch_object() rellena las propiedades ANTES de llamar al constructor.
     * Por eso no hay que pisarlas con valores vacíos cuando se instancia sin argumentos.
    */

    /* Constructor */
    public function __construct($id = null, $nombre = null, $descripcion = null, $activa = null)
    {
        if ($id !== null){
            $this->id = $id;
        }
        if ($nombre !== null) {
            $this->nombre = $nombre;
        }
        if ($descripcion !== null) {
            $this->descripcion = $descripcion;
        }
        if($activa !== null){
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