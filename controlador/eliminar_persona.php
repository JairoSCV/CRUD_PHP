<?php
include "modelo/conexion.php";
if(!empty($_GET["id"])){
    $id=$_GET["id"];
    $sql=$conexion->query("DELETE FROM persona where id_persona=$id");
    if($sql!=1){
        ?> 
        <div class="alert alert-warning">Ocurrió un problema</div> <?php
    }
}

?>