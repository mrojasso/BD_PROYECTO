function enviarRegistro(){

var usuario = document.getElementById("campoUsuario").value;
var pass = document.getElementById("campoClave").value;


if(verificar(usuario,pass)){
	}else{
		 return;
	}


var correo = document.getElementById("campoCorreo").value;
if(validarEmail(correo)){
	}else{
		 return;
	}



 
var nombre = document.getElementById("campoNombre").value;

	if(nombre.length > 1 ){

		 
	}else{
		alert("Debe Ingresar un nombre valido");
		 return;
	}



var apell1 = document.getElementById("campoPrimerApellido").value;


	if(apell1.length > 1 ){

		 
	}else{
		alert("Debe Ingresar un apellido valido");
		 return;
	}

var apell2 = document.getElementById("campoSegundoApellido").value;


	if(apell2.length > 1 ){

		 
	}else{
		alert("Debe Ingresar un apellido 2, valido");
		 return;
	}


var dir    = document.getElementById("campoDireccion").value;

	if(dir.length > 1 ){

		 
	}else{
		alert("Debe Ingresar una direccion valida");
		 return;
	}


   var tel    = document.getElementById("campoTelefono").value;

	if(tel.length > 1 ){

		 
	}else{
		alert("Debe Ingresar un telefono valido");
		 return;
	}


	 document.getElementById("frm_registro").submit();
}


function validarEmail(valor) {
	//funcion landa....

	
  if (/^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i.test(valor)){
   //alert("La dirección de email " + valor + " es correcta!.");
   return true;
  } else {
   alert("La dirección de email es incorrecta!.");
   return false;
  }
}

function registrar(){

	var usuario = document.getElementById("campoUsuario").value;
	var pass = document.getElementById("campoClave").value;
	
	if(verificar()){
		enviarDatos(usuario,pass);
	}
}

function verificar(usu,pass){
	var usuario = usu;
	var pass = pass;
	
	document.getElementById("parrafoInfo6").innerHTML = "";
	
	if(usuario.length > 7 && pass.length>0){
		return true;
	}else{
		if(usuario.length <= 7){
			document.getElementById("parrafoInfo6").innerHTML += "El usuario debe medir más de 8 carácteres."
		}
		if(pass.length==0){
			document.getElementById("parrafoInfo7").innerHTML += "Debe ingresar una clave."
		}
		return false;
	}
}
function enviarDatos(usuario,pass){

	var dato = new XMLHttpRequest();
	dato.open("POST","registrar.php",true);
	dato.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	dato.send("un="+usuario+"&up="+pass);

	dato.onreadystatechange = function() {
		if(dato.readyState == 4 && dato.status == 200){
			var respuesta = dato.responseText;
			console.log(respuesta);
			if(respuesta == "ERROR"){
				alert("ERROR Base de Datos");
			}else if(respuesta == "OK"){
				window.location.href = "login.html";
			}
		}
	}
}

