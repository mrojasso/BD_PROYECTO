<?php
session_start();
include 'conn/conexionBD.php';




$msg = "";
$flag = 2;


if(isset($_SESSION["usuario"])){


    if(isset($_REQUEST['campoComentario'])){

        $bdAbierta = AbrirBD();
		
	 
		$sql = "BEGIN  prd_almacenar_comentarios('".$_REQUEST['campoComentario']."'); END;";


		if (!($stmt = oci_parse($bdAbierta,$sql))) {
			echo "Falló la preparación: (" . $bdAbierta->errno . ") " . $bdAbierta->error;
		$flag = 1;
		}


		if (!oci_execute($stmt)) {
			echo "Falló la ejecución: (" . $sentencia->errno . ") " . $sentencia->error;
			$flag = 1;
		}	         



        if($flag ==2){

          $flag = 0;  
        }

        CerrarBD($bdAbierta);

    }
}else{
    $flag = 3;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>ACME TECH</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/comentario.js">


    </script>

    <style>

    </style>

</head>

<body>


    <div class="jumbotron text-center" style="margin-bottom:0; background-color:#fff;">
        <img src="imagenes/logo2.jpg" alt="" width="250px" height="250px" class="float-left">
        <h1 style="font-size:105px; font-family:Sans-serif; text-align:left;">ACME TECH...</h1>
        <p style="color:black; font-family:Sans-serif; font-size: 65px; text-align:center;">¡Tu Mejor Aliado En Teconologia!
        </p>
    </div>

    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <a class="navbar-brand" href="index.php" style="font-family:Sans-serif; font-size:20px;">Sobre nosotros</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav">
                <a class="navbar-brand" href="compu_gamer.php" style="font-family:Sans-serif; font-size:20px;">Computadoras Gaming</a>
                 <a class="navbar-brand" href="perifericos.php" style="font-family:Sans-serif; font-size:20px;">Perifericos</a>
                
                <li class="nav-item">
                    <div class="dropdown">
                        <button type="button" class="btn btn-dark dropdown-toggle" data-toggle="dropdown" style="font-family:Sans-serif; font-size:20px;">
                            Servicios
                        </button>
                        <div class="dropdown-menu">
                           <a class="dropdown-item" href="laptop_alquiler.php" style="font-family:Sans-serif; font-size:16px;">Alquiler</a>
                       
                        </div>
                    </div>
                </li>

                                 <li class="nav-item">
                    <div class="dropdown">
                        <button type="button" class="btn btn-dark dropdown-toggle" data-toggle="dropdown"
                            style="font-family:Sans-serif; font-size:20px;">
                            Entrar
                        </button>
                        <div class="dropdown-menu">
                   
                   <?php
                        if(isset($_SESSION["usuario"])){
                   ?>
                        <a class="dropdown-item" href="logout.php" style="font-family:Sans-serif; font-size:16px;">Salir</a>
                   <?php
                       }else{
                   ?>

                            <a class="dropdown-item" href="login.php" style="font-family:Sans-serif; font-size:16px;">Login</a>
                            <a class="dropdown-item" href="registrar.php" style="font-family:Sans-serif; font-size:16px;">Registro</a>
                   <?php
                       } 
                   ?>
                            
                        </div>

                   <?php
                        if(isset($_SESSION["usuario"])){
                            if($_SESSION["rol"]==1){
                   ?>
                         <a class="navbar-brand" href="lista_carrito.php" style="font-family:Sans-serif; font-size:20px;">Carrito</a>
                   <?php
                            }
                       } 
                   ?>                        
                        <!-- <img src="imagenes/iconoInicio.png" alt="" width="35px" height="35px" class="float-right"> -->
                    </div>
                </li>


            </ul>
        </div>
    </nav>

<form action="comentario.php" id="frm_comentarios" method="post">

     <?php
                
                    if($flag==0){
                            echo "<h2><font color='#000000'><center>Gracias por su comentario, se registro correctamente</center></font></h2>";
                    }
                    if($flag==3){
                            echo "<h3><font color='#000000'><center>Debes estar logeado para ingresar un comentario</center></font></h3>";
                    }


                ?>

        <div class="container p-3 my-3 bg-dark">

            <p class="text-white" style="font-family:Sans-serif; font-size: 20px;">
                Tus comentarios son muy importantes para nosotros, con ellos podremos mejorar para ofrecerte un mejor servicio que se ajuste a tus necesidades
            </p>
            <label for="campoUsuario" class="text-white" style="font-family:Sans-serif;">Opinión:</label>
            <br>
            <textarea id="campoComentario" name="campoComentario" cols="150" rows="3" style="resize: both;"></textarea>
            <br>
            <input type="submit " id="botonLogin " value="Publicar Comentario" class="btn btn-success"  onclick="enviarComentario();">
            
        </div>
   
</form>
</html>