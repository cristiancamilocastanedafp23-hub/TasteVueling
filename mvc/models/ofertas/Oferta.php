<?php
// Indicamos que sea abstracta, ya que haremos clases hijas que hereden ellas
abstract class Oferta
{
    // Los nombres deben coincidir con las columnas de la tabla (ofertas)
    protected $id;
    protected $nombre;
    protected $descripcion;
    protected $tipo;
    protected $valor;
    protected $codigo;
    protected $fecha_inicio;
    protected $fecha_fin;
    protected $activa;
    protected $puntos_necesarios;

    /*
    - fetch_object() rellena las propiedades ANTES de llamar al constructor.
    - Por eso no hay que pisarlas con valores vacíos cuando se instancia sin argumentos.
    */

    /* Constructor */
    public function __construct(
        $id = null,
        $nombre = null,
        $descripcion = null,
        $tipo = null,
        $valor = null,
        $codigo = null,
        $fecha_inicio = null,
        $fecha_fin = null,
        $activa = null,
        $puntos_necesarios = null
    ) {
        if ($id !== null) {
            $this->id = $id;
        }
        if ($nombre !== null) {
            $this->nombre = $nombre;
        }
        if ($descripcion !== null) {
            $this->descripcion = $descripcion;
        }
        if ($tipo !== null) {
            $this->tipo = $tipo;
        }
        if ($valor !== null) {
            $this->valor = $valor;
        }
        if ($codigo !== null) {
            $this->codigo = $codigo;
        }
        if ($fecha_inicio !== null) {
            $this->fecha_inicio = $fecha_inicio;
        }
        if ($fecha_fin !== null) {
            $this->fecha_fin = $fecha_fin;
        }
        if ($activa !== null) {
            $this->activa = $activa;
        }
        if ($puntos_necesarios !== null) {
            $this->puntos_necesarios = $puntos_necesarios;
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

    // Descripcion
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
        return $this;
    }

    // Tipo
    public function getTipo()
    {
        return $this->tipo;
    }

    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
        return $this;
    }

    // Valor
    public function getValor()
    {
        return $this->valor;
    }

    public function setValor($valor)
    {
        $this->valor = $valor;
        return $this;
    }

    // Codigo
    public function getCodigo()
    {
        return $this->codigo;
    }

    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;
        return $this;
    }

    // Fecha_inicio
    public function getFechaInicio()
    {
        return $this->fecha_inicio;
    }

    public function setFechaInicio($fecha_inicio)
    {
        $this->fecha_inicio = $fecha_inicio;
        return $this;
    }

    // Fecha_fin
    public function getFechaFin()
    {
        return $this->fecha_fin;
    }

    public function setFechaFin($fecha_fin)
    {
        $this->fecha_fin = $fecha_fin;
        return $this;
    }

    // Activa
    public function getActiva()
    {
        return $this->activa;
    }

    public function setActiva($activa)
    {
        $this->activa = $activa;
        return $this;
    }

    // Puntos_necesarios
    public function getPuntosNecesarios()
    {
        return $this->puntos_necesarios;
    }

    public function setPuntosNecesarios($puntos_necesarios)
    {
        $this->puntos_necesarios = $puntos_necesarios;
        return $this;
    }
}