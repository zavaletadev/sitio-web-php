<?php 
//Invocamos a la conexión de base de datos
require 'conexion.php';

//Arreglo de grupos disponibles
$grupos = ['DRD-2021', 'DRD-2022', 'DRD-2023', 'DSM-7128', 'DSM-7129', 'DSM-7130'];

//Arreglo de calificaciones
$calificaciones = [5, 6, 7, 8, 9, 10];

//Arreglo de materias específicas por carrera
$materias_drd = ['MAT-004', 'MAT-002', 'MAT-003'];
$materias_dsm = ['MAT-001', 'MAT-002', 'MAT-003'];

//Tomamos un grupo aleatorio
$grupo = $grupos[rand(0, sizeof($grupos) - 1)];

//Seleccionamos a todos los alumnos
$consulta = $conexion->query("SELECT * FROM alumno");

//Recorremos a todos los alumnos en la base de datos
while ($row = $consulta->fetch_array(MYSQLI_ASSOC)) {

    //Tomamos la matrícula de cada alumno
    $matricula = $row['matricula'];       

    //Preparamos la consulta de base de datos
    $sentencia = $conexion->prepare("INSERT INTO calificacion 
        (matricula, cve_materia, cve_grupo, calificacion) 
        VALUES 
        (?, ?, ?, ?)");

    //Indicamos los parámetros que cambiarán en cada iteración 
    //del ciclo    
    $sentencia->bind_param("ssss", $p1, $p2, $p3, $p4);

    
    //Si el grupo pertenece a redes
    if (substr($grupo, 0, 3) == 'DRD') {

        //Agregamos calificaciones aleatorias a las materias de redes
        $p1 = $matricula;
        $p2 = 'MAT-004';
        $p3 = $grupo;
        $p4 = $calificaciones[rand(0, sizeof($calificaciones) - 1)];
        //Ejecutamos la consulta 
        $sentencia->execute();

        //Agregamos calificaciones aleatorias a las materias de redes
        $p1 = $matricula;
        $p2 = 'MAT-002';
        $p3 = $grupo;
        $p4 = $calificaciones[rand(0, sizeof($calificaciones) - 1)];
        //Ejecutamos la consulta 
        $sentencia->execute();

        //Agregamos calificaciones aleatorias a las materias de redes
        $p1 = $matricula;
        $p2 = 'MAT-003';
        $p3 = $grupo;
        $p4 = $calificaciones[rand(0, sizeof($calificaciones) - 1)];
        //Ejecutamos la consulta 
        $sentencia->execute();
    }

    //Si el grupo pertenece a sistemas
    else {

        //Agregamos calificaciones aleatorias a las materias de sistemas
        $p1 = $matricula;
        $p2 = 'MAT-001';
        $p3 = $grupo;
        $p4 = $calificaciones[rand(0, sizeof($calificaciones) - 1)];
        //Ejecutamos la consulta 
        $sentencia->execute();

        //Agregamos calificaciones aleatorias a las materias de sistemas
        $p1 = $matricula;
        $p2 = 'MAT-002';
        $p3 = $grupo;
        $p4 = $calificaciones[rand(0, sizeof($calificaciones) - 1)];
        //Ejecutamos la consulta 
        $sentencia->execute();

        //Agregamos calificaciones aleatorias a las materias de sistemas
        $p1 = $matricula;
        $p2 = 'MAT-003';
        $p3 = $grupo;
        $p4 = $calificaciones[rand(0, sizeof($calificaciones) - 1)];
        //Ejecutamos la consulta 
        $sentencia->execute();
    }

}
