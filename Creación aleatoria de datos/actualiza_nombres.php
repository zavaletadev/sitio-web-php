<?php 
//Invocamos a la conexión de base de datos
require 'conexion.php';

/*
Generamos un arreglo de nombres
 */
$nombres = ['RAUL','ALONDRA','ALEJANDRA','MARIANA','MARIANO','KAREN','KRISTAL','ADRIANA','ANAI','STEPHANY','CAROLINA','MARINA','ANDREA','YOLANDA','GRECIA','LILIANA','JONATHAN','ISRAEL','JUAN','CARLOS','ANDRES','DANIELA','GEORGINA','ALFREDO','RAFAEL','DAVID','HUMBERTO','GAEL','ISAAC','EDGAR',];

//Seleccionamos a todos los alumnos con nombre Array
$consulta = $conexion->query("SELECT * FROM alumno WHERE nombres LIKE '%Array%'");

//Recorremos a todos los alumnos de la consulta
while ($row = $consulta->fetch_array(MYSQLI_ASSOC)) {

    //Tomamos la matrícula de cada alumno
    $matricula = $row['matricula'];       

    //Preparamos la consulta de base de datos
    $sentencia = $conexion->prepare("UPDATE alumno set nombres = ? WHERE matricula = ?");

    //Indicamos los parámetros que cambiarán en cada iteración 
    //del ciclo    
    $sentencia->bind_param("ss", $p1, $p2);

    $p1 = $nombres[rand(0, sizeof($nombres) - 1)];
    $p2 = $matricula;        
    //Ejecutamos la consulta 
    $sentencia->execute();

}
