<?php

require_once('modelo.php');

class subir extends modeloCredencialesBD{

    public function __construct(){
        parent::__construct();
    }

public function subir_archivo($numFact, $nombre, $fecha, $monto, $nombre_archivo){
    
    $instruccion = "CALL sp_subir_factura('".$numFact."','".$nombre."','".$fecha."','".$monto."','".$nombre_archivo."')";

    $consulta=$this->_db->query($instruccion);
        echo "<script type='text/javascript'>alert('Factura #$numFact subida!');</script>";
}

}

?>