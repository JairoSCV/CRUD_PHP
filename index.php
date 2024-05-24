<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    
  <!--javascript-->
  <script>
        function eliminar(){
            var respuesta=confirm("¿Estas seguro de eliminar el registro?")
                if( respuesta == true ){
                alert("OK, SE ELIMINÓ EL REGISTRO!");
                return true;
                }else{
                    alert("NO SE REALIZÓ");
                    return false;
                }
        }
    </script>


    <h1 class="text-center">Hello, world!</h1>

    <?php
        include "controlador/eliminar_persona.php";
    ?>

    <div class="container-fluid row">


        <form class="col-4 p-4" method="POST">
            <h3 class="text-center text-secondary" >Registro de personas</h3>
            <!--PHP puede ser colocado en cualquier parte del código, 
                haciendo referencia a lo que se necesita-->
            <?php
                /*Llamamos a conexion para conectarse a la bbdd*/
                include "modelo/conexion.php";
                /*Llamamos a registro_persona para validar los campos*/
                include "controlador/registro_persona.php";
            ?>


            <div class="mb-3">
                <label class="form-label">Nombres: </label>
                <input type="text" class="form-control" name="nombre">
            </div>
            <br>
            <div class="mb-3">
                <label class="form-label">Apellidos: </label>
                <input type="text" class="form-control" name="apellido">
            </div>
            <br>
            <div class="mb-3">
                <label class="form-label">DNI: </label>
                <input type="text" class="form-control" name="dni">
            </div>
            <br>
            <div class="mb-3">
                <label class="form-label">Fecha de nacimiento: </label>
                <input type="date" class="form-control" name="fecha">
            </div>
            <br>
            <div class="mb-3">
                <label class="form-label">Email: </label>
                <input type="email" class="form-control" name="email">
            </div>
            <button type="submit" name="btnRegistrar" value="ok" class="btn btn-primary">Registrar</button>
        </form>


        <div class="col-8 p-4">
            <table class="table">
                <thead class="bg-info">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">NOMBRE</th>
                        <th scope="col">APELLIDO</th>
                        <th scope="col">DNI</th>
                        <th scope="col">FECHA NACIMIENTO</th>
                        <th scope="col">CORREO</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        /**Establecemos la conexion con la bbdd */
                        include "modelo/conexion.php";
                        /**creamos la variable $sql donde se realiza la consulta select * from */
                        $sql=$conexion->query("select * from persona");
                        while($datos=$sql->fetch_object()){ ?>  <!--fetch_object: recorre los datos-->
                            <!--cerré php y regresó html-->
                            <tr>
                                <td><?= $datos->id_persona?></td>
                                <td><?= $datos->nombre?></td>
                                <td><?= $datos->apellido?></td>
                                <td><?= $datos->dni?></td>
                                <td><?= $datos->fecha_nac?></td>
                                <td><?= $datos->correo?></td>
                                <td>
                                    <!--Enviar id de la fila(hoja.php?id=[valor del id mediante php])-->
                                    <a href="modificar_persona.php?id=<?= $datos->id_persona ?>">Editar</a>
                                </td>
                                <td>
                                    <a onclick="return eliminar()" href="index.php?id=<?=$datos->id_persona?>">Eliminar</a>
                                </td>
                            </tr>
                            <!--abro nuevamente php-->
                            <?php
                        }
                    ?>
                </tbody>
            </table>
        </div>

    </div>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
  </body>
</html>