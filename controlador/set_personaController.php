<?php

if(!empty($_POST["btnModificar"])){
    if((!empty($_POST["nombre"])) and
    (!empty($_POST["apellido"])) and
    (!empty($_POST["dni"])) and
    (!empty($_POST["fecha"])) and
    (!empty($_POST["email"]))){

        $nombre=$_POST["nombre"];
        $apellido=$_POST["apellido"];
        $dni=$_POST["dni"];
        $fecha=$_POST["fecha"];
        $email=$_POST["email"];

        $id=$_POST["id"];

        $sql=$conexion->query("UPDATE persona set nombre='$nombre', apellido='$apellido', dni=$dni, fecha_nac='$fecha', correo='$email' WHERE id_persona = $id");

        if($sql==1){
            header("location:index.php");
        }else{
            ?> 
            <div class="alert alert-danger">Error al modificar</div> 
            <?php
        }
    }else{
        ?> <div class="alert alert-warning">Campos vacíos!</div> <?php
    }
}

?>