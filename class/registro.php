<?php

require_once('modelo.php');

class registro extends modeloCredencialesBD{

    public function __construct(){
        parent::__construct();
    }

public function crear_registro($nombre, $usuario, $contra){
    
    $instruccion = "CALL sp_registro('".$nombre."','".$usuario."','".$contra."')";

    $consulta=$this->_db->query($instruccion);
    }
}

?>