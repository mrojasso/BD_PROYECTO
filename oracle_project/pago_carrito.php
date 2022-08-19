<?php
session_start();


include 'conn/conexionBD.php';
include 'usuario.php';
include 'articulo.php';


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


    <script src="js/carrito.js"></script>

 
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
 
    <!-- Custom styling plus plugins -->
    <link href="build/css/custom.min.css" rel="stylesheet">



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
                            <a class="dropdown-item" href="#"
                                style="font-family:Sans-serif; font-size:16px;">Lavanderia</a>
                            <a class="dropdown-item" href="#" style="font-family:Sans-serif; font-size:16px;">Alquiler</a>
                            <a class="dropdown-item" href="#" style="font-family:Sans-serif; font-size:16px;">Asesoramiento</a>
                            <a class="dropdown-item" href="comentario.html"
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
                    //    if(isset($_SESSION["usuario"])){
                     //       if($_SESSION["rol"]==1){
                   ?>
                         <a class="navbar-brand" href="lista_carrito.php" style="font-family:Sans-serif; font-size:20px;">Carrito</a>
                   <?php
                    //        }
                    //   } 
                   ?>

                       
                    </div>
                </li>




            </ul>
        </div>
    </nav>

    <div class="container">

<?php 

 if(isset($_SESSION['usuario'])){



?>



        <div class="row">

            <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Noiva</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Settings 1</a>
                            <a class="dropdown-item" href="#">Settings 2</a>
                          </div>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <section class="content invoice">
                      <!-- title row -->
                      <div class="row">
                        <div class="  invoice-header">
                          <h1>
                                          <i class="fa fa-globe"></i>Pago de Articulos<br>
                                          
                                      </h1>
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- info row -->
                      <div class="row invoice-info">
                         
                        <!-- /.col -->
                        <div class="col-sm-4 invoice-col">
                          Cliente
                          <address>

                          <?php
                            $cliente = unserialize($_SESSION['usuario']);

                            ?>
                                          <strong><?=$cliente->getNombre()." ".$cliente->getApell1()." ".$cliente->getApell2();?></strong>
                                         
                                          <br><?=$cliente->getDir();?>
                                          <br>Phone: <?=$cliente->getTel();?>
                                          <br>Email: <?=$cliente->getCorreo();?>
                        </address>
                        </div>
            
                        <!-- /.col -->
                      </div>
                      <!-- /.row -->

                      <!-- Table row -->
                      <div class="row">
                        <div class="  table">
                          <table class="table table-striped">
 

                            <tbody>

 

                                <?php 







                                if(isset($_SESSION['articulos'])){

                                  $arrArticulos = $_SESSION['articulos'];

                                  if($arrArticulos[0] == null){ 

                                     
                                      $_SESSION['articulos'] = null;
                                      $arrArticulos  = null;
                                      echo "<center><h1>El carrito esta vacio!</h1></center>";

                                    }
 
        

                                 $contador = 0;
                                 $subTotal = 0;


 
           if(is_countable($arrArticulos)){
                                 for($x=0;$x<sizeof($arrArticulos);$x++){
               if($arrArticulos[$x]!= null) {                  
                                  $precioUnit = 0;
                                  $desc = "";
                                  
                                  $ar  = unserialize($arrArticulos[$x]);
                                  //-----------------buscar el precio y descripcion del articulo

                                  $bdAbierta = AbrirBD();
								  
								$sql = 'BEGIN prd_get_detalle_precio_articulo('.$ar->getId_articulo().',:DATOS); END;';            

								//Statement does not change
								$stmt = oci_parse($bdAbierta,$sql);                     
								//oci_bind_by_name($stmt,':PIDARTICULO',$ar->getId_articulo());           
								   
								   

								//But BEFORE statement, Create your cursor
								$cursor = oci_new_cursor($bdAbierta);

								// On your code add the latest parameter to bind the cursor resource to the Oracle argument
								oci_bind_by_name($stmt,":DATOS", $cursor,-1,OCI_B_CURSOR);

								// Execute the statement as in your first try
								oci_execute($stmt);

								// and now, execute the cursor
								oci_execute($cursor);



								while (($fila = oci_fetch_array($cursor, OCI_ASSOC + OCI_RETURN_NULLS)) != false) {


                                    //$precioUnit =  $fila['PRECIO_UNIT']*$ar->getCantidad();
                                    $precioUnit =  str_replace(",",".",$fila['PRECIO_UNIT'])*$ar->getCantidad();
                                    
                                    $desc       =  $fila['DESCRIPCION'];


                                    $subTotal += $precioUnit;
                                  }
                                 
                                  CerrarBD($bdAbierta);

                             
                                  }   
                                }
 
     
				}else{


				}
                                    ?>



 
                            </tbody>
                          </table>
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.row -->

                      <div class="row">
                        <!-- accepted payments column -->
                        
                        <!-- /.col -->
                        <div class="col-md-6">
                          <p class="lead">Totales</p>
                          <div class="table-responsive">
                            <table class="table">
                              <tbody>
                                <tr>
                                  <th style="width:50%">Subtotal:</th>
                                  <td>$<?=$subTotal;?></td>
                                </tr>
                                <tr>
                                  <th>Tax (13%)</th>
                                  <td>$<?= ($subTotal/100)*13;?></td>
                                </tr>
                        
                                <tr>
                                  <th>Total:</th>
                                  <td>$<?= (($subTotal/100)*13)+$subTotal;?></td>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                        </div>



                        <?php
                      }else{

                        echo "<center><h1>El carrito esta vacio!</h1></center>";
                      }
                        ?>
                        <!-- /.col -->
                      </div>
                      <!-- /.row -->

                      <!-- this row will not appear when printing -->
                      <div class="row no-print">
                        <div class=" ">
                         
                         <?php

                         if($subTotal>0){

                         ?>


                         <form action="generarPago.php" method="post">

                         <table>

                         <tr>
                                <td>Seleccione el tipo de tarjeta</td>
                                <td>
                                     <select name="tipo_tarjeta">
                                        <option value="1">Visa</option>
                                        <option value="2">MasterCard</option>
                                        <option value="3">american-express</option>
                                     </select>

                                </td>
                         </tr>
                         <tr>
                                <td> Ingrese numero de tarjeta </td>
                                <td><input type="text" name="numTarjeta" id="" maxlength="16" minlength="16"><br></td>
                         </tr>                         
                         </table>  
                          


                        
                         <br>
                          <button class="btn btn-success pull-right"><i class="fa fa-credit-card"></i>Pagar</button>
                      </form>
                          <?php

                         }

                         ?>
                        </div>
                      </div>

                    </section>
                  </div>
                </div>
              </div>
        </div>

        <?php
             }else{
                echo "<h1>Debe estar logeado para realizar el pago</h1>";
             }

        ?>
    </div>

 



 
    <!-- Bootstrap -->
   <script src="vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="vendors/nprogress/nprogress.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="build/js/custom.min.js"></script>


</body>

</html>