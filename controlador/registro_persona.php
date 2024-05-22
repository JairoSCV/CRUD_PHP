<?php

/*se especifica en el condicional si los campos ".."(que son el name de los atributos de la hoja index.php) están llenos*/

if(isset($_POST["btnRegistrar"])){ 
    if(!empty($_POST["nombre"]) and 
    (!empty($_POST["apellido"])) and 
    (!empty($_POST["dni"])) and 
    (!empty($_POST["fecha"])) and 
    (!empty($_POST["email"]))){
        
        /*Almacenamos los datos*/
        /*trim() -> agarra todo los datos desde el principio de la cadena, ignorando espacios */
        $nombre=trim($_POST["nombre"]);
        $apellido=$_POST["apellido"];
        $dni=$_POST["dni"];
        $fecha=$_POST["fecha"];
        $email=$_POST["email"];

        /*Se almacena la consulta en la variable $sql, tener en cuenta que valores string se colocan entre ' ' y números sin comillas*/
        $sql=$conexion->query("INSERT INTO PERSONA(nombre,apellido,dni,fecha_nac,correo) VALUES('$nombre','$apellido',$dni,'$fecha','$email')");

        if($sql==1){
            ?>
            <div class="alert alert-success">Persona registrada correctamente</div>
            <?php
        }else{
            ?>
            <div class="alert alert-danger">Error al registrar</div>
            <?php
        }
    }else{
        ?>
        <div class="alert alert-warning">Alguno de los campos está vacío</div>
        <?php
    }
}

?>