
<?php
//Invocamos la conexion a la base de datos
require 'conexion.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Conexión PHP / MySQL</title>
    <!-- 
        Agregamos la referencia a Boostrap5 desde un recurso en la nube (CDN)
    -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- 
        Agregamos las referencias a FontAwesome
    -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
</head>
<body>

    <!-- Contenedor principal -->
    <div class="container">
        <!-- Fila dinámica -->
        <div class="row">
            <!-- Columna -->
            <div class="col-12">
                <h1 class="text-center">Lista de carreras</h1>
                <hr />
            </div>
        </div>

        <div class="row">            
            <?php
            //Ejecutamos la consulta
            $consulta = $conexion->query("SELECT * FROM carrera");
            /*
            Si al consulta contiene registros
            */
            if ($consulta->num_rows > 0) : ?>
                <?php 
                /*
                Por cada elemento que encontremos en la tabla creamos 
                un arreglo que almacena la información de cada registro
                */
                while ($fila = $consulta->fetch_array(MYSQLI_ASSOC)) : ?>
                    <div class="col-sm-6 col-md-4 col-lg-3" style="cursor: pointer" onclick="window.location.href='listagrupos.php?cve_carrera=<?=$fila["cve_carrera"]?>'">
                        <div class="card mb-3">
                            <div class="card-header text-light bg-primary">
                                <h3 class="card-title">
                                    <?=utf8_encode($fila['nombre_carrera'])?>
                                </h3>
                            </div>
                            <div class="card-body">
                                <p class="card-text text-center">
                                    <a href="listagrupos.php?cve_carrera=<?=$fila["cve_carrera"]?>" class="btn btn-link">
                                        <i class="fas fa-info-circle"></i>
                                        Ver grupos                                   
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>           
                <?php endwhile; ?>

            <?php else: ?>

            <?php endif; ?>
        </div>
    <!-- 
        Agregamos la referencia a Boostrap5 desde un recurso en la nube (CDN)
    -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
