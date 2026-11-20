<?php 

class ProductoIngrediente {

    // Los nombres deben coincidir con las columnas de la tabla (producto_ingrediente)
    protected $producto_id;
    protected $ingrediente_id;
    protected $tipo;
    protected $cantidad;

    /*
    - fetch_object() rellena las propiedades ANTES de llamar al constructor.
    - Por eso no hay que pisarlas con valores vacíos cuando se instancia sin argumentos.
    */

    /* Constructor */
    public function __construct($producto_id = null, $ingrediente_id = null, $tipo = null, $cantidad = null)
    {
        if ($producto_id !== null) {
            $this->producto_id = $producto_id;
        }
        if ($ingrediente_id !== null) {
            $this->ingrediente_id = $ingrediente_id;
        }
        if ($tipo !== null) {
            $this->tipo = $tipo;
        }
        if ($cantidad !== null) {
            $this->cantidad = $cantidad;
        }
    }

    /*Producto Id*/
    public function getProductoId()
    {
        return $this->producto_id;
    }

    public function setProductoId($producto_id)
    {
        $this->producto_id = $producto_id;
        return $this;
    }

    /*Ingrediente Id*/
    public function getIngredienteId()
    {
        return $this->ingrediente_id;
    }

    public function setIngredienteId($ingrediente_id)
    {
        $this->ingrediente_id = $ingrediente_id;
        return $this;
    }

    /*Tipo*/
    public function getTipo()
    {
        return $this->tipo;
    }

    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
        return $this;
    }

    /*Cantidad*/
    public function getCantidad()
    {
        return $this->cantidad;
    }

    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;
        return $this;
    }
}