<?php
session_start();
include './conn/conexionBD.php';
include 'usuario.php';

if(isset($_SESSION["usuario"])){
 
    $usuarioLog =  unserialize($_SESSION["usuario"]);
    $rol = $usuarioLog->getRol();

    switch ($rol) {
       case 1: //clientes
           header("Location: index.php?msg=Puede continuar con sus comprar, a ingresado correctamente!!");
           break;
       case 2://administradir
           echo "i es igual a 2";
           break;

    }


    exit;
}

$msg="";
if(isset($_REQUEST['botonLogin'])){

	$usuario = $_REQUEST["campoUsuario"];
	$pass    = $_REQUEST["campoClave"];
	$objusuario = "";
	$bdAbierta = AbrirBD();


	//Request does not change
	$sql = 'BEGIN prd_login(:pusuario, :ppass,:DATOS); END;';            

	//Statement does not change
	$stmt = oci_parse($bdAbierta,$sql);                     
	oci_bind_by_name($stmt,':pusuario',$usuario);           
	oci_bind_by_name($stmt,':ppass',$pass);           
	   

	//But BEFORE statement, Create your cursor
	$cursor = oci_new_cursor($bdAbierta);

	// On your code add the latest parameter to bind the cursor resource to the Oracle argument
	oci_bind_by_name($stmt,":DATOS", $cursor,-1,OCI_B_CURSOR);

	// Execute the statement as in your first try
	oci_execute($stmt);

	// and now, execute the cursor
	oci_execute($cursor);

    while (($fila = oci_fetch_array($cursor, OCI_ASSOC + OCI_RETURN_NULLS)) != false) {
        //$this->ruta = $row['id_usuario'];
      

       $objusuario = new usuario($fila['ID_USUARIO'],$fila['USU'],$fila['NOMBRE'],$fila['APELL1'],$fila['APELL2'],$fila['CORREO'],$fila['TELEFONO'],$fila['DIRECCION'],$fila['ROL']);
       $rol = $fila['ROL'];

   }
   CerrarBD($bdAbierta);


   if(is_a($objusuario, 'usuario')){
       $_SESSION["usuario"] = serialize($objusuario);
       $_SESSION["rol"] = $rol;
       
       header("Location: index.php?msg=Puede continuar con sus comprar, a ingresado correctamente!!");
       exit;
   }else{

       $msg="Error! usuario o pass incorrecto!";
       $bdAbierta = AbrirBD();
       $er = "Error, login incorrecto, usuario = ".$usuario;
       $sql = "BEGIN prd_registrar_error('$er'); END;";            

       //Statement does not change
       $stmt = oci_parse($bdAbierta,$sql);                     
                
       // Execute the statement as in your first try
       oci_execute($stmt);

        CerrarBD($bdAbierta);


   }
   
   ?>

   <!DOCTYPE html>
   <html>
   
   <head>
   
       <title>Login</title>
       <meta charset="utf-8">
       <link rel="stylesheet" type="text/css" href="HojasEstilo/estiloBase.css">
       
       <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
       <link href="css/simple-sidebar.css" rel="stylesheet">
       <script src="js/login.js"></script>
       <style>
           #particles-js {
               position: absolute;
               top: 0;
               left: 0;
               width: 100%;
               height: 100%;
           }
           </style>
           
   </head>
   
   <body>
   
       <form action="login.php" method="post" id="frm_login">
       <div id="dPadre" class="form-group">
           <div id="hTop" class="dHijo"></div>
   
           <div class="header-logo">
               <a href="#" class="logo">
                   <img src="imagenes/logo2.jpg" alt="" width="350 px">
               </a>
           </div>
           
           <h1 style="font-family:Sans-serif; ">Inicio de sesión</h1>
           <label for=" campoUsuario " style="font-family:Sans-serif; ">Nombre de usuario:</label>
           <input type="text " id="campoUsuario" name="campoUsuario" placeholder="Escriba su nombre ">
           <p id="parrafoInfo"><?=$msg;?></p>
           <label for="campoClave " style="font-family:Sans-serif; ">Clave de usuario:</label>
           <input type="password " id="campoClave" name="campoClave" placeholder="Password ">
           <br>
           <input type="button " id="botonLogin"  name="botonLogin" value="Ingresar " class="btn btn-primary " onclick="ingresar();">
        
           <br/>
           <a href="registrar.php" class="btn btn-success ">Registrarse</a>
       </div>
       <div id="hLow " class="dHijo ">
           <div id="hLowh " class="dHijo "></div>
       </div>
       </div>
   </form>
   
   <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
   <script>
       /* particlesJS.load(@dom-id, @path-json, @callback (optional)); */
       particlesJS.load('particles-js', 'js/particlesjs-config.json', function() {
           console.log('callback - particles.js config loaded');
       });
       </script>
   </body>
   
   </html>

   



}

?>

