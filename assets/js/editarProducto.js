//Funcion para ir cambiando el precio al añadir ingredientes extra
function recalcularSubtotalProducto(cb, precioExtraSeleccionado){
    const boton = document.querySelector("#botonAnadir");
    textoBotonAnadir=boton.textContent;
    const importe = textoBotonAnadir.match(/[\d.,]+/);
    const importeBoton = importe ? parseFloat(importe[0].replace(",", ".")) : 0;
    
    let suma=importeBoton;
    
    if (cb.checked) {
      // Suma el importe del producto con extra chequeado
      suma = precioExtraSeleccionado + importeBoton;
    } else {
      // Resta el importe del producto con extra chequeado
     suma= importeBoton - precioExtraSeleccionado;
    }
    
    const sumaconComa =  suma.toFixed(2).replace(".", ",");
    boton.textContent="Añadir al carrito por " + sumaconComa + " €";
}
