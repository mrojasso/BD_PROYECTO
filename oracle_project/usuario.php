<?php

class usuario
{
    // Declaración de una propiedad
    private $id_usu;
	private $usuario;
	private $nombre;
	private $apell1;
	private $apell2;        
	private $correo;
	private $tel;
	private $dir;
	private $rol;


   function __construct($id_usu,$usuario,$nombre,$apell1,$apell2,$correo,$tel,$dir,$rol) {
   	    $this->id_usu = $id_usu;
		$this->usuario = $usuario;
		$this->nombre = $nombre;
		$this->apell1 = $apell1;
		$this->apell2 = $apell2;
		$this->correo = $correo;
		$this->tel = $tel;
		$this->dir = $dir;
		$this->rol = $rol;
   }



    // Declaración de un método

    public function getId_usu() {
        return $this->id_usu;
    }
    public function getUsuario() {
        return $this->usuario;
    }
    public function setUsuario($usu) {
        $this->usuario = $usu;
    }


    public function getNombre() {
        return $this->nombre;
    }
    public function setNombre($nomb) {
        $this->nombre = $nomb;
    }

    public function getApell1() {
        return $this->apell1;
    }
    public function setApell1($apel) {
        $this->apell1 = $apel;
    }

    public function getApell2() {
        return $this->apell2;
    }
    public function setApell2($apel) {
        $this->apell2 = $apel;
    }


    public function getCorreo() {
        return $this->correo;
    }
    public function setCorreo($cor) {
        $this->correo = $cor;
    }


    public function getTel() {
        return $this->tel;
    }
    public function setTel($tel) {
        $this->tel = $tel;
    }  

    public function getDir() {
        return $this->dir;
    }
    public function setDir($dir) {
        $this->dir = $dir;
    }   

    public function getRol() {
        return $this->rol;
    }
    public function setRol($rol) {
        $this->rol = $rol;
    } 


}


?>