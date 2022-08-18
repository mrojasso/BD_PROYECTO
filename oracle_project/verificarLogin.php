<?php	
	session_start();
	
	if(isset($_SESSION["usuarioActivoID"])){

		echo $_SESSION["usuarioActivoNombre"];	
	}else{
		echo "NoExiste";
	}
?>