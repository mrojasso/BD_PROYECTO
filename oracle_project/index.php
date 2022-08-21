<?php
session_start();


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title style="font-size">ACME TECH</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
        integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


    <style>

    </style>

</head>

<body>


    <div class="jumbotron text-center" style="margin-bottom:0; background-color:#fff;">
        <img src="imagenes/logo2.jpg" alt="" width="250px" height="250px" class="float-left">
        <h1 style="font-size:105px; font-family:Sans-serif; text-align:left;">ACME TECH...</h1>
        <p style="color:black; font-family:Sans-serif; font-size: 65px; text-align:center;">¡Diseñando tus
            sueños!</p>
    </div>

    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <a class="navbar-brand" href="index.php" style="font-family:Sans-serif; font-size:20px;">Sobre
            nosotros</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav">
             <a class="navbar-brand" href="compu_gamer.php" style="font-family:Sans-serif; font-size:20px;">Computadoras Gaming</a>
                
                 <a class="navbar-brand" href="perifericos.php" style="font-family:Sans-serif; font-size:20px;">Perifericos</a>
                
                <li class="nav-item">
                    <div class="dropdown">
                        <button type="button" class="btn btn-dark dropdown-toggle" data-toggle="dropdown"
                            style="font-family:Sans-serif; font-size:20px;">
                            Servicios
                        </button>
                        <div class="dropdown-menu">
                            
                            <a class="dropdown-item" href="laptop_alquiler.php" style="font-family:Sans-serif; font-size:16px;">Alquiler de Equipos de Segunda</a>
                            <a class="dropdown-item" href="comentario.php"
                                style="font-family:Sans-serif; font-size:16px;">Comentarios</a>
                        </div>
                        <!-- <img src="imagenes/iconoInicio.png" alt="" width="35px" height="35px" class="float-right"> -->
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
                      //  if(isset($_SESSION["usuario"])){
                      //      if($_SESSION["rol"]==1){
                   ?>
                         <a class="navbar-brand" href="lista_carrito.php" style="font-family:Sans-serif; font-size:20px;">Carrito</a>
                   <?php
                         //   }
                      // } 
                   ?>

                   

                       
                        <!-- <img src="imagenes/iconoInicio.png" alt="" width="35px" height="35px" class="float-right"> -->
                    </div>
                </li>


               <?php
               //rol = 2, es administrador
                    if(isset($_SESSION["usuario"])){
                            if($_SESSION["rol"]==2){
                   ?>

                            <li class="nav-item">
                                <div class="dropdown">
                                    <button type="button" class="btn btn-dark dropdown-toggle" data-toggle="dropdown"
                                        style="font-family:Sans-serif; font-size:20px;">
                                        Reportes
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="Reporte_ventas.php" style="font-family:Sans-serif; font-size:16px;">Ventas</a>
                                        <a class="dropdown-item" href="Reporte_cliente_reg.php" style="font-family:Sans-serif; font-size:16px;">Clientes registrados</a>
                                        <a class="dropdown-item" href="Reporte_comentarios.php" style="font-family:Sans-serif; font-size:16px;">Comentarios ingresados</a>
                                        <a class="dropdown-item" href="Reporte_errores.php" style="font-family:Sans-serif; font-size:16px;">Errores</a>
                                    </div>
                                    <!-- <img src="imagenes/iconoInicio.png" alt="" width="35px" height="35px" class="float-right"> -->
                                </div>
                            </li>
                    <?php
                         }  }
                     ?>



            </ul>
        </div>
    </nav>

    <div class="container">
        <?php
        if(isset($_REQUEST['msg'])){
        ?>
            <div class="img-index col-lg img-fluid">
                  <h3><?=$_REQUEST['msg'];?></h3>
            </div>
        <?php
        }
        ?>
        <br>
        <div class="img-index col-lg img-fluid">
            <img src="imagenes/i.jpg" style="border-radius: 10px;" alt="">
        </div>
        <div class="row">
            <div class="col-lg-12">
                <br>
                <h4 style="font-size:30px; font-family:Sans-serif;">¿Quiénes somos?</h4>
                <p style="font-family:Sans-serif; font-size:20px;">
                    Somos una empresa costarricense joven, sin embargo, contamos con profesionales de
                    amplia experiencia para asesorar en la compra de componentes de computadora de las 
                    mejores marcas del mercado, y en las mejores condiciones.
                    <br>
                    Ponemos nuestro empeño en cumplir con las preferencias de cada cliente,
                    para hacer de su vida cotidiana mucho mas facil
                    entre las diferentes opciones de nuestro catálogo.
                </p>

            </div>
        </div>
    </div>

    <div class="jumbotron text-center" style="margin-bottom:0">
        <p style="font-size: 24px; font-family:Sans-serif;">¿Deseas agregar un comentario?</p>
        <a href="comentario.php" class="btn btn-success ">Agregar</a>

    </div>

</body>

</html>