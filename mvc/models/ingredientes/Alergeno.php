<?php 
// Creamos la clase Alergeno
class Alergeno {

    // Los nombres deben coincidir con las columnas de la tabla (alergenos)
    protected $id;
    protected $nombre;
    protected $icono;

    /*
    - fetch_object() rellena las propiedades ANTES de llamar al constructor.
    - Por eso no hay que pisarlas con valores vacíos cuando se instancia sin argumentos.
    */

    /* Constructor */
    public function __construct($id = null, $nombre = null, $icono = null)
    {
        if ($id !== null) {
            $this->id = $id;
        }
        if ($nombre !== null) {
            $this->nombre = $nombre;
        }
        if ($icono !== null) {
            $this->icono = $icono;
        }
    }

    /* Id */
    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /* Nombre */
    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
        return $this;
    }

    /* Icono */
    public function getIcono()
    {
        return $this->icono;
    }

    public function setIcono($icono)
    {
        $this->icono = $icono;
        return $this;
    }
}