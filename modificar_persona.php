<?php
include 'modelo/conexion.php';

/*Almacenar en una variable el ID de la fila a editar*/
$id=$_GET["id"];

$sql=$conexion->query("SELECT (nombre,apellido,dni,fecha_nac,correo) FROM persona WHERE id_persona = $id ");

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<form class="col-4 p-4" method="POST">
            <h3 class="text-center text-secondary" >Modificar persona</h3>
            <!--PHP puede ser colocado en cualquier parte del código, 
                haciendo referencia a lo que se necesita-->
            <?php

            while($datos=$sql->fetch_object()){ ?>
                <div class="mb-3">
                <label class="form-label">Nombres: </label>
                <input type="text" class="form-control" name="nombre"> <?=$datos->nombre;?>
                </div>
                <br>
                <div class="mb-3">
                    <label class="form-label">Apellidos: </label>
                    <input type="text" class="form-control" name="apellido"> <?=$datos->apellido;?>
                </div>
                <br>
                <div class="mb-3">
                    <label class="form-label">DNI: </label>
                    <input type="text" class="form-control" name="dni"> <?=$datos->dni;?>
                </div>
                <br>
                <div class="mb-3">
                    <label class="form-label">Fecha de nacimiento: </label>
                    <input type="date" class="form-control" name="fecha"> <?=$datos->fecha;?>
                </div>
                <br>
                <div class="mb-3">
                    <label class="form-label">Email: </label>
                    <input type="email" class="form-control" name="email"> <?=$datos->email;?>
                </div>
            <?php
            }
            ?>


            
            <button type="submit" name="btnRegistrar" value="ok" class="btn btn-primary">Modificar persona</button>
        </form>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>