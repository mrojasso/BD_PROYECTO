<?php

class articulo
{
    // Declaración de una propiedad
    private $id_articulo;
	private $cantidad;


   function __construct($id_articulo) {
   	    $this->id_articulo = $id_articulo;
 		$this->cantidad = 1;
  }


	public function getId_articulo() {
        return $this->id_articulo;
    }


    public function setcantidad() {
         $this->cantidad+=1;
    }
    public function sacarcantidad() {
        if($this->cantidad>0){
            $this->cantidad = $this->cantidad - 1;
        }
  
    }
	public function getCantidad() {
        return $this->cantidad;
    }

}

?>