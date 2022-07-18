<?php
	$conn = mysqli_connect("localhost","root","","bdweb");
	if(!$conn){	
		echo "ERROR";
	}else{		
		mysqli_set_charset($conn, "utf8");	
		$select = "SELECT * FROM `comentarios`";
		$resultado = mysqli_query($conn, $select);

		if (mysqli_num_rows($resultado) > 0) {

			$arregloMayor = array();
			while($arregloMenor=mysqli_fetch_assoc($resultado)){
				$arregloMayor[] = $arregloMenor;
			}
			header('Content-Type: application/json');
			echo json_encode($arregloMayor);
		}else{
			$select = "SELECT * FROM usuarios WHERE nombre=$usuario";
			$resultado = mysqli_query($conn, $select);
			if (mysqli_num_rows($resultado) > 0) {
				echo "NOCLAVE";
			}else{
				//No encontró nombre
				echo "NOUSUARIO";
			}
		}
	}

?>