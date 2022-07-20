 

function ingresar(){
	var usuario = document.getElementById("campoUsuario").value;
	var clave = document.getElementById("campoClave").value;

if(verificar(usuario,clave)){
	}else{
		 return;
	}


		 document.getElementById("frm_login").submit();

}



function verificar(usu,pass){
	var usuario = usu;
	var pass = pass;
	
	document.getElementById("parrafoInfo").innerHTML = "";
	
	if(usuario.length > 3 && pass.length>0){
		return true;
	}else{
		if(usuario.length <= 3){
			document.getElementById("parrafoInfo").innerHTML += "El usuario debe medir más de 8 carácteres."
		}
		if(pass.length==0){
			document.getElementById("parrafoInfo").innerHTML += "Debe ingresar una clave."
		}
		return false;
	}
}


 

function mostrarLegal(){
	console.log("MOSTRALEGAL");
	if(document.getElementById("labelLegal") == null){
		var labelLegal = document.createElement("label");
		var textoLegal = document.createTextNode("Al ingresar a nuestra página le da usted todos los derechos de su identidad y contenido a un conglomerado internacional.");
		labelLegal.setAttribute("id","labelLegal");
		labelLegal.style.display = "block";
		document.getElementById("hMed").appendChild(labelLegal);
		labelLegal.appendChild(textoLegal);
	}
}
