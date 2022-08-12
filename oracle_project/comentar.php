<?php
	
	$comentario = $_GET["comment"];
	$conn = mysqli_connect("localhost","root","","bdweb");
	if(!$conn){
		echo "ERROR";
	}else{
		mysqli_set_charset($conn, "utf8");
		session_start();
		$insertar = "INSERT INTO comentarios(usuario, Comentario) VALUES ('".$_SESSION["usuarioActivoID"]."','$comentario')";

		
		$resultado = mysqli_query($conn, $insertar);
		if($resultado == true){
			echo "OK";
		}else{
			echo "ERROR";
		}
	}
?>