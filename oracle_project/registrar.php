<?php

if(isset($_REQUEST['botonRegistrar']))
{

    include './conn/conexionBD.php';

    $bdAbierta = AbrirBD();





	$pusu    = $_REQUEST['campoUsuario'];
	$ppass   = $_REQUEST['campoClave'];
	$pnombre = $_REQUEST['campoNombre']; 
	$papell1 = $_REQUEST['campoPrimerApellido']; 
	$papell2 = $_REQUEST['campoSegundoApellido'];
	$pcorreo = $_REQUEST['campoCorreo'];
	$ptel    = $_REQUEST['campoTelefono'];
	$pdir    = $_REQUEST['campoDireccion'];



		 
		$sql = "BEGIN prd_registrar_cliente('$pusu','$ppass','$pnombre','$papell1','$papell2','$pcorreo','$ptel','$pdir'); END;";            
		$flagError = 0;

		if (!($stmt = oci_parse($bdAbierta,$sql))) {
			echo "Falló la preparación: (" . $bdAbierta->errno . ") " . $bdAbierta->error;
		$flagError = 1;
		}


		if (!oci_execute($stmt)) {
			echo "Falló la ejecución: (" . $sentencia->errno . ") " . $sentencia->error;
			$flagError = 1;
		}	         


    CerrarBD($bdAbierta);


    if($flagError == 1){// registro del error en db

    //******************************************
        $bdAbierta = AbrirBD();

 
		$er = "Error! Registrando usuarios".$pusu;
		$sql = "BEGIN prd_registrar_error('$er'); END;";            

		//Statement does not change
		$stmt = oci_parse($bdAbierta,$sql);                     
		         
		// Execute the statement as in your first try
		oci_execute($stmt);

		CerrarBD($bdAbierta);
		 
		 
	 
    //******************************************

    }

header("Location: index.php?msg='Usuario creado correctamente'");
exit;


}


 
?>

 


<!DOCTYPE html>
<html lang="en">

<head>
    <title style="font-size">ACME TECH</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link href="css/simple-sidebar.css" rel="stylesheet">
</head>

<body>


    <div class="jumbotron text-center" style="margin-bottom:0; background-color:#fff;">
        <img src="imagenes/logo2.jpg" alt="" width="250px" height="250px" class="float-left">
        <h1 style="font-size:105px; font-family:Sans-serif; text-align:left;">ACME TECH...</h1>
        <p style="color:black; font-family:Sans-serif; font-size: 65px; text-align:center;">¡Tu Mejor Aliado En Teconologia!
        </p>
    </div>

    <div class="container">

       
        <h1>Registrar Usuario</h1>
        <br/>
        <form action="registrar.php" method="post" id="frm_registro">
        <div class="row">
            <div class="col-sm-12">
                <label for="campoUsuario">Nombre:</label>
                <input type="text" size="40 px" name="campoNombre" id="campoNombre" class="col-sm-auto " placeholder="Escriba su nombre " required="true">
            </div>
            <p id="parrafoInfo1"></p>
            <div class="col-sm-12 ">
                <label for="campoUsuario ">Primer Apellido:</label>
                <input type="text" size="33 px" name="campoPrimerApellido" id="campoPrimerApellido" class="col-sm-auto " placeholder="Escriba primer apellido "  required="true">
            </div>
            <p id="parrafoInfo2"></p>
            <div class="col-sm-12 ">
                <label for="campoUsuario ">Segundo Apellido:</label>
                <input type="text " size="30 px" name="campoSegundoApellido" id="campoSegundoApellido" class="col-sm-auto" placeholder="Escriba su segundo apellido "   required="true">
            </div>
            <p id="parrafoInfo3"></p>
            <div class="col-sm-12 ">
                <label for="campoUsuario ">Correo:</label>
                <input type="text " size="41 px" name="campoCorreo" id="campoCorreo" class="col-sm-auto " placeholder="@example "  required="true">
            </div>
            <p id="parrafoInfo4"></p>
            <div class="col-sm-12 ">
                <label for="campoUsuario ">Dirección:</label>
                <input type="text " size="39 px" name="campoDireccion"  id="campoDireccion" class="col-sm-auto " placeholder="Digite su dirección "  required="true">
            </div>
            <p id="parrafoInfo5"></p>
            <div class="col-sm-12 ">
                <label for="campoUsuario ">Teléfono:</label>
                <input type="text " size="40 px" name="campoTelefono"  id="campoTelefono" class="col-sm-auto " placeholder="Digite su #teléfono "  required="true">
            </div>
            <p id="parrafoInfo6"></p>
            <div class="col-sm-12 ">
                <label for="campoClave ">Usuario:</label>
                <input type="text " size="32 px" name="campoUsuario"  id="campoUsuario" class="col-sm-auto " placeholder="Usuario "  required="true">
            </div>
            <p id="parrafoInfo7"></p>
            <div class="col-sm-12 ">
                <label for="campoClave ">Clave de usuario:</label>
                <input type="password " size="32 px" name="campoClave" id="campoClave" class="col-sm-auto " placeholder="Password "  required="true">
            </div>
            <br>
            <input type="button " id="botonRegistrar" name="botonRegistrar" value="Registrar Usuario " class="btn btn-primary " onclick="enviarRegistro();">
            <a href="index.php " class="btn btn-success ">Volver a Inicio</a>
        </div>
</form>


        <div id="hLow " class="dHijo ">
            <div id="hLowh " class="dHijo "></div>
        </div>
    </div>

    </div>

    <div class="jumbotron text-center " style="margin-bottom:0 ">

    </div>

</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js "></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js "></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js "></script>
<script src="js/registrar.js"></script>

</html>