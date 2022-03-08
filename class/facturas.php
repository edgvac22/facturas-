<?php

require_once('modelo.php');

class facturas extends modeloCredencialesBD{

    public function __construct(){
        parent::__construct();
    }

public function ver_archivos(){
    
    $instruccion = "CALL sp_ver_facturas()";

    $consulta=$this->_db->query($instruccion);
}

}

?>