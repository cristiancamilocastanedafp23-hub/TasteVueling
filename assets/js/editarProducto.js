//Funcion para rec
function recalcularSubtotalProducto(cb, precioExtraSeleccionado){
    const boton = document.querySelector("#botonAnadir");
    textoBotonAnadir=boton.textContent;
    const importe = textoBotonAnadir.match(/[\d.,]+/);
    const importeBoton = importe ? parseFloat(importe[0].replace(",", ".")) : 0;
    
    let suma=importeBoton;
    
    if (cb.checked) {
       suma = precioExtraSeleccionado + importeBoton;
      // sumo el importe del producto con extra chequeado
    } else {
       suma= importeBoton - precioExtraSeleccionado;
      // resto el importe del producto con extra chequeado
    }
    
    const sumaconComa =  suma.toFixed(2).replace(".", ",");
    boton.textContent="Añadir al carrito por " + sumaconComa + " €";
}
