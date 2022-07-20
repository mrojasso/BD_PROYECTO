function enviarComentario(){

var comentario = document.getElementById("campoComentario").value;
if(comentario.length > 10){
            document.getElementById("frm_comentarios").submit();
 }else{
    alert('Debe ingresar un comentario mas extenso!');
 }





}


function verificarLogin() {
    var carta = new XMLHttpRequest();
    carta.open("GET", "verificarLogin.php", true);
    carta.send(null);
    carta.onreadystatechange = function() {
        if (carta.readyState == 4 && carta.status == 200) {

            if (carta.responseText == "NoExiste") {

                alert("Debe identificarse antes de poder publicar.");
                window.location.href = "login.html";
            } else {
                document.getElementById("hTop").innerHTML = "Bienvenido a nuestra sección de comentarios, puede dejarnos sus sugerencias, consultas o quejas, " + carta.responseText + "!";
            }
        }
    }
}

function comentar() {
    var comentario = document.getElementById("campoComentario").value;


    var carta = new XMLHttpRequest();
    carta.open("GET", "comentar.php?comment=" + comentario, true);
    carta.send(null);
    carta.onreadystatechange = function() {
        if (carta.readyState == 4 && carta.status == 200) {
            switch (carta.responseText) {
                case "OK":
                    document.getElementById("campoComentario").value = "";
                    alert("Comentario Publicado")
                    break;
                case "ERROR":
                    alert("ERROR Comentario No Publicado")
                    break;
            }
        }
    }
}


function cargar() {
    var carta = new XMLHttpRequest();
    carta.open("GET", "cargar.php", true);
    carta.send(null);
    carta.onreadystatechange = function() {
        if (carta.readyState == 4 && carta.status == 200) {

            var div = document.getElementById("hContenido");
            var data = JSON.parse(carta.responseText);
            for (var fila in data) {
                var node = document.createElement("p");

                var textnode = document.createTextNode(
                    data[fila].usuario + ": " + data[fila].Comentario);
                node.appendChild(textnode);
                div.appendChild(node);
            }
        }
    }
}