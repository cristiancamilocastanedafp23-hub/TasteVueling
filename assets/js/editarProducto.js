// Funcion para ir cambiando el precio al añadir ingredientes extra
function recalcularSubtotalProducto(cb, precioExtraSeleccionado){   

  // Obtiene el botón de añadir al carrito
  const boton = document.querySelector("#botonAnadir");

  // Obtenemos el texto de los puntos
  const spanPuntos = document.querySelector("#puntosObtenidos");

  // Recuperamos el texto actual del botón
  const textoBotonAnadir = boton.textContent;

  // Extraemos la parte del precio
  const importe = textoBotonAnadir.match(/[\d.,]+/);

  //Convertimos a un . la , para poder sumar
  const importeBoton = importe ? parseFloat(importe[0].replace(",", ".")) : 0;
    
  // Variable del precio final
  let suma = importeBoton;
    
  // Si el checkbox está marcado
  if (cb.checked) {
    // Suma el importe del producto con extra chequeado
    suma = precioExtraSeleccionado + importeBoton;
  } else {
    // Resta el importe del producto con extra chequeado
   suma = importeBoton - precioExtraSeleccionado;
  }
  
  // Convierte el resultado a dos decimales y sustituye el punto por una coma
  const sumaconComa =  suma.toFixed(2).replace(".", ",");

  // Mensaje completo que ha de aparecer
  boton.textContent = "Añadir al carrito por " + sumaconComa + " €";

  // Calculamos los nuevos puntos 
  const nuevosPuntos = Math.floor(suma * 10);

  // Actualizamos el texto de los puntos
  if (spanPuntos) {
    spanPuntos.textContent = "+ " + nuevosPuntos + " PUNTOS OBTENIDOS";
  }

}
