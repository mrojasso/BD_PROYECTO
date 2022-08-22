<?php
session_start();
include './conn/conexionBD.php';
include 'usuario.php';
include 'articulo.php';



$factura = $_REQUEST['id_fac'];

$bdAbierta = AbrirBD();


/*
$query     = "call  prd_get_factura_final(".$factura.");";

if (!($sentencia = $bdAbierta->prepare($query))) {
echo "Falló la preparación: (" . $bdAbierta->errno . ") " . $bdAbierta->error;
}

if (!$sentencia->execute()) {
echo "Falló la ejecución: (" . $sentencia->errno . ") " . $sentencia->error;
}


$resultado = $sentencia->get_result();
*/


	//Request does not change
	$sql = 'BEGIN prd_get_factura_final(:PFACTURA,:DATOS); END;';     

	//Statement does not change
	$stmt = oci_parse($bdAbierta,$sql);                     
	oci_bind_by_name($stmt,':PFACTURA',$factura);           
        
	//But BEFORE statement, Create your cursor
	$cursor = oci_new_cursor($bdAbierta);

	// On your code add the latest parameter to bind the cursor resource to the Oracle argument
	oci_bind_by_name($stmt,":DATOS", $cursor,-1,OCI_B_CURSOR);

	// Execute the statement as in your first try
	oci_execute($stmt);

	// and now, execute the cursor
	oci_execute($cursor);
	
	
	
	
	
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

    <div class="container">

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
                                          <i class="fa fa-globe"></i> Factura.<br>
                                          <small class="pull-right">Fecha: <?php echo date('d-m-Y');?></small>
                                      </h1>
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- info row -->
                      <div class="row invoice-info">
                       
                        <!-- /.col -->
                        <div class="col-sm-4 invoice-col">
                          Cliente
                                 <?php
                            $cliente = unserialize($_SESSION['usuario']);

                            ?>
                                          <strong><?=$cliente->getNombre()." ".$cliente->getApell1()." ".$cliente->getApell2();?></strong>
                                         
                                          <br><?=$cliente->getDir();?>
                                          <br>Telefono: <?=$cliente->getTel();?>
                                          <br>Email: <?=$cliente->getCorreo();?>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4 invoice-col">
                          <b>Factura #<?=$_REQUEST['id_fac'];?></b>
                          <br>
                          <br>
                         
                          <br>
                           
                          <br>
                           
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.row -->

                      <!-- Table row -->
                      <div class="row">
                        <div class="  table">
                          <table class="table table-striped">
                            <thead>
                              <tr>
                                
                              
                                <th>Codigo #</th>
                                <th>Product</th>
                                <th>Qty</th>
                                <th>Precio Unit</th>
                                <th>Impuestos</th>
                                <th>Subtotal</th>
                              </tr>
                            </thead>
                            <tbody>


                              <?php 

                                $totalGeneral = 0;
                                $totalImp = 0;
                               while (($fila = oci_fetch_array($cursor, OCI_ASSOC + OCI_RETURN_NULLS)) != false) {
                                

                                
                                
                                
                                $id_articulo        = $fila['ID_ARTICULO'];
                                $descripcion        =$fila['DESCRIPCION'];
                                $cantidad_articulos =$fila['CANTIDAD_ARTICULOS'];
                                $costo_unit         =$fila['COSTO_UNIT'];
                                //$imp                =$fila['IMP'];
                                $imp      =  str_replace(",",".",$fila['IMP']);
                                //$total              =$fila['TOTAL'];
                                $total    =  str_replace(",",".",$fila['TOTAL']);
                                    
                                
                                $totalGeneral = $totalGeneral + $total;
                                $totalImp = $totalImp +  $imp;
                              ?>





                              <tr>
                                <td><?=$id_articulo;?></td>
                                <td><?=$descripcion;?></td>
                                <td><?=$cantidad_articulos;?></td>
                                <td>$<?=$costo_unit;?></td>
                                <td>$<?=$imp;?></td>
                                <td>$<?=$total;?></td>

                              </tr>

                              <?php

                                }

                                CerrarBD($bdAbierta);

                              ?>


                               
                            </tbody>
                          </table>
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.row -->

                      <div class="row">
                        <!-- accepted payments column -->
                        <div class="col-md-6">
                          <p class="lead">Metodo de pago:</p>

                          <?php 
                            $tipopago = $_REQUEST['tipop'];
                            switch ($tipopago) {
                                case 1:
                                    echo "<img src='images/visa.png' alt='Visa'>";
                                    break;
                                case 2:
                                    echo "<img src='images/mastercard.png' alt='Mastercard'>";
                                    break;
                                case 3:
                                    echo "<img src='images/american-express.png' alt='American Express'>";
                                    break;
                            }



                          ?>
                          
                          
                          
                        
                          
                        </div>
                        <!-- /.col -->
                        <div class="col-md-6">
                         
                          <div class="table-responsive">
                            <table class="table">
                              <tbody>
                                <tr>
                                  <th style="width:50%">Subtotal:</th>
                                  <td>$<?=$totalGeneral;?></td>
                                </tr>
                                <tr>
                                  <th>Imp (13%)</th>
                                  <td>$<?=$totalImp;?></td>
                                </tr>

                                <tr>
                                  <th>Total:</th>
                                  <td>$<?=($totalGeneral+$totalImp);?></td>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.row -->

                      <!-- this row will not appear when printing -->
                      <div class="row no-print">
                        <div class=" ">
                          <button class="btn btn-default" onclick="window.print();"><i class="fa fa-print"></i> Print</button>
                          <button class="btn btn-success pull-right" onclick="regresar();"><i class="fa fa-credit-card"></i> Realizar Nueva Compra</button>
                          
                        </div>
                      </div>
                    </section>
                  </div>
                </div>
              </div>
        </div>
    </div>

    <div class="jumbotron text-center" style="margin-bottom:0">
        <p style="font-size: 24px; font-family:Sans-serif;">¿Deseas agregar un comentario?</p>
        <a href="comentario.php " class="btn btn-success ">Agregar</a>

    </div>



 
    <!-- Bootstrap -->
   <script src="vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="vendors/nprogress/nprogress.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="build/js/custom.min.js"></script>

    <script>
      function regresar(){
        window.location.href = "index.php";

      }
    </script>
</body>

</html>

<?php

unset($_SESSION['articulos']);

?>