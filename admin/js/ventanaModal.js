//funcion para mostrar la ventana modal
function mostrarModal(){
    document.getElementById('modal1').style.display='flex';
}

//funcion para cerrar la ventana modal en este caso para cerrar modal tenemos que afectar al mismo id de la ventana modal
function CerrarModal(){
    document.getElementById('modal1').style.display='none';
}

// metodo para calcular los años en meses y colocarlos en el input
function CalcularMeses(){
    var anio = document.getElementById('anios').value;
    
    anio = parseInt(anio);

    var calcularMeses = anio * 12;
    //var interes = anio * 0.08;
   
    document.enviar.aniosMinimoCredito.value = calcularMeses;
   //document.getElementById('interes').innerHTML="Interes "+interes+"%";

}

// metodo calcular interesa por los años
function Calcular(){
    // calculamos el interes por los años
    var anio = document.getElementById('anios').value;
    var precio = document.getElementById('precio').value;
    var meses = document.getElementById('aniosMinimoCredito').value;

    precio = parseInt(precio);
    anio = parseInt(anio);


    //calculamos el interese segun los años
    var interes = anio * 0.08;
    document.getElementById('interes').innerHTML="Porcentaje: "+interes+"%";

    //calculamos el interes del precio del vehiculo
    var interesPrecioVehiculo = precio * interes;
    document.getElementById('interesVehiculo').innerHTML="---------- Interes Q."+interesPrecioVehiculo;

    //suma del precio del interes + precio del vehiculo
    var precioFinal = precio + interesPrecioVehiculo;

   document.getElementById('sumaTotal').innerHTML="-------------Total a Pagar Q."+precioFinal;
   document.enviar.precio.value=precioFinal;


    // mensualidad recomendada
    var mensualidad = precioFinal / meses;
    document.enviar.mensualidadAprox.value = mensualidad.toFixed(2);
 
}