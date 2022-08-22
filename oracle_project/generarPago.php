<?php
session_start();
include './conn/conexionBD.php';
include 'usuario.php';
include 'articulo.php';

$tipo_tarjeta = $_REQUEST['tipo_tarjeta'];
$numTarjeta   = $_REQUEST['numTarjeta'];

//-- generacion de sesion 
$permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
$keySession = substr(str_shuffle($permitted_chars), 0, 33);
//--------------------------

/echo $keySession;

$cliente = unserialize($_SESSION['usuario']);
$id = $cliente->getId_usu();

//insertar encabesado de factura
$bdAbierta = AbrirBD();


$sql = "BEGIN prd_insertar_enc_fac(".$id.",'".$keySession."'); END;";   

//Statement does not change
$stmt = oci_parse($bdAbierta,$sql);                     
		 
// Execute the statement as in your first try
oci_execute($stmt);

CerrarBD($bdAbierta);
 
		 




//---------------------------------
// buscar el numero de factura


    $bdAbierta = AbrirBD();


	//Request does not change
	$sql = 'BEGIN :ID := FN_BUSCA_ID_FACTURA(:PSESION); END;';     
	$idFactura = "";
	//Statement does not change
	$stmt = oci_parse($bdAbierta,$sql);                     
	oci_bind_by_name($stmt,':PSESION',$keySession);    
	oci_bind_by_name($stmt,":ID", $idFactura, 100);
	oci_execute($stmt);
 
	CerrarBD($bdAbierta);
 
	
	/*


    //$query     = "call  prdBuscarIdFactura('".$keySession."');";

	//Request does not change
	$sql = "BEGIN prdBuscarIdFactura('".$keySession."',:DATOS); END;";            
 
	//Statement does not change
	$stmt = oci_parse($bdAbierta,$sql);                     


	//But BEFORE statement, Create your cursor
	$cursor = oci_new_cursor($bdAbierta);

	// On your code add the latest parameter to bind the cursor resource to the Oracle argument
	oci_bind_by_name($stmt,":DATOS", $cursor,-1,OCI_B_CURSOR);

	// Execute the statement as in your first try
	oci_execute($stmt);

	// and now, execute the cursor
	oci_execute($cursor);



while (($fila = oci_fetch_array($cursor, OCI_ASSOC + OCI_RETURN_NULLS)) != false) {
   $idFactura =  $fila['ID_FAC'];
   
}

 
CerrarBD($bdAbierta);
*/

//--------------------------------------------
// insertar el detalle de la factura





$bdAbierta = AbrirBD();

   $arrArticulos = $_SESSION['articulos'];

   $contador = 0;

   for($x=0;$x<sizeof($arrArticulos);$x++){
     if($arrArticulos[$x] !=null){ // excluye los articulos borrados del carrito
        $ar  = unserialize($arrArticulos[$x]);

            //$queryI     = "call  Prd_insertar_det_fact(".$ar->getId_articulo().",".$idFactura.",".$ar->getCantidad().");";
			
			
		$sql = "BEGIN Prd_insertar_det_fact(".$ar->getId_articulo().",".$idFactura.",".$ar->getCantidad()."); END;";       

		//Statement does not change
		$stmt = oci_parse($bdAbierta,$sql);                     

		// Execute the statement as in your first try
		oci_execute($stmt);
 
    }
   }

 CerrarBD($bdAbierta);

header('Location: factura_carrito.php?id_fac='.$idFactura."&tipop=".$tipo_tarjeta);
exit;





?>

