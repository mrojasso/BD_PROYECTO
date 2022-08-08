<?php
session_start();

 
include 'articulo.php';



if(isset($_SESSION['articulos'])){


	$articulo = $_REQUEST['idArticulo'];
	sacarArticulos($articulo);

} 


function sacarArticulos($id_articulo) {



   $arrArticulos = $_SESSION['articulos'];
   $contador = 0;

   if($arrArticulos[0]==null){

      unset($_SESSION['articulos']);
      unset($arrArticulos);

   	// $_SESSION['articulos'] = null;
   	   $arrArticulos  = null;

   }else{



   for($x=0;$x<sizeof($arrArticulos);$x++){
   	$ar  = unserialize($arrArticulos[$x]);

   	 if($ar->getId_articulo()==$id_articulo){

   	 	 if($ar->getCantidad()>1){
   	 	 	$ar->sacarcantidad();
   	 		$arrArticulos[$x] = serialize($ar);
   	 		$_SESSION['articulos'] =$arrArticulos;
   	 	 }else{
            unset($arrArticulos[$x]);// borra el articulo del arreglo
            //var_export ($arrArticulos);
			   //	$arrArticulos[$x] = null;

				$_SESSION['articulos'] =$arrArticulos;
   	 	 }
 
   	 }
   }

}




//--------------------

//----------verificar y borrar todos los campos nullos

$arrArticulos = $_SESSION['articulos'];


foreach($arrArticulos as $clave=>$valor){
if(empty($valor)) unset($arrArticulos[$clave]);
}

 
$arrArticulos = array_merge($arrArticulos);
$_SESSION['articulos'] =$arrArticulos;




exit;
    
}


?>