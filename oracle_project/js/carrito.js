function agregarAlcarrito(id){


//agrega articulos
	    

        var request = new XMLHttpRequest();
        request.open('POST', 'carrito.php?idArticulo='+id);
        request.send();

        request.onload = function() {
            //Respuesta al request
            if (request.status >= 200 && request.status < 400) {

                alert("Agregado al carrito");
                location.reload();

            } else {
                alert("Se presentó un error");
            }
        }

}


function sacarAlcarrito(id){
    //sacar articulos

        var request = new XMLHttpRequest();
        request.open('POST', 'SacarDeCarrito.php?idArticulo='+id);
        request.send();

        request.onload = function() {
            //Respuesta al request
            if (request.status >= 200 && request.status < 400) {

                alert("Sacado del carrito");
                location.reload();

            } else {
                alert("Se presentó un error");
            }
        }

}

function AreaPago(){
    window.location.href = "pago_carrito.php";
  }
 