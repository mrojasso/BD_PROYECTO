<?php
session_start();


//unset($_SESSION['articulos']);
//exit;
include 'articulo.php';

if(isset($_SESSION['articulos'])){


	$articulo = $_REQUEST['idArticulo'];
	insertarArticulos($articulo);

}else{
	// es cuando 
	$arrArticulos = array();
	$id_articulo = $_REQUEST['idArticulo'];
	$ar = new articulo($id_articulo);
	$arrArticulos[] = serialize($ar);
	$_SESSION['articulos'] = $arrArticulos; 

}



function insertarArticulos($id_articulo) {


   $arrArticulos = $_SESSION['articulos'];
   $contador = 0;

   for($x=0;$x<sizeof($arrArticulos);$x++){
   	$ar  = unserialize($arrArticulos[$x]);

   	 if($ar->getId_articulo()==$id_articulo){
   	 		$ar->setcantidad();
   	 		$arrArticulos[$x] = serialize($ar);
   	 		$contador ++;
   	 }
   }

   if($contador>0){
   		 $_SESSION['articulos'] =$arrArticulos;
   }else{

		$art = new articulo($id_articulo);
		$arrArticulos[] = serialize($art);
		$_SESSION['articulos'] =$arrArticulos;

   }


exit;
    
}


?>