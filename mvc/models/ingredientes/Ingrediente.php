<?php 
// Creamos la clase categoria, pero en este caso no es
// abstract ya que ninguna clase más heredará
class Ingrediente {

    // Los nombres deben coincidir con las columnas de la tabla (ingredientes)
    protected $id;
    protected $nombre;
    protected $precio_extra;
    protected $alergenos;
    protected $activo;

    /*
    - fetch_object() rellena las propiedades ANTES de llamar al constructor.
    - Por eso no hay que pisarlas con valores vacíos cuando se instancia sin argumentos.
    */

    /* Constructor */
    public function __construct($id = null, $nombre = null, $precio_extra = null, $alergenos = null, $activo = null)
    {
        if ($id !== null) {
            $this->id = $id;
        }
        if ($nombre !== null) {
            $this->nombre = $nombre;
        }
        if ($precio_extra !== null) {
            $this->precio_extra = $precio_extra;
        }
        if ($alergenos !== null) {
            $this->alergenos = $alergenos;
        }
        if ($activo !== null) {
            $this->activo = $activo;
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

    /*Precio Extra*/
    public function getPrecioExtra()
    {
        return $this->precio_extra;
    }

    public function setPrecioExtra($precio_extra)
    {
        $this->precio_extra = $precio_extra;
        return $this;
    }

    /*Precio Extra*/
    public function getAlergenos()
    {
        return $this->alergenos;
    }

    public function setAlergenos($alergenos)
    {
        $this->alergenos = $alergenos;
        return $this;
    }

    /*Activo*/
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