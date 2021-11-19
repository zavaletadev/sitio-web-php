<?php 
//Invocamos a la conexión de base de datos
require 'conexion.php';

/*
Generamos un arreglo de apellidos
 */
$apellidos = ['HERNANDEZ','PEREZ','MARTINEZ','GOMEZ','LUNA','RUIZ','ZAVALETA','RIOS','AGUILAR','VILLANUEVA','ALARCON','JUAREZ','ASUETA','RASO','SUAREZ','MENDIETA','ALAMO','MORENO','RAMIREZ','ZEA','PARDO','MENDOZA','ROBLES','FERNANDEZ','TORRES','TAPIA','CORTEZ','PAREDES','COTA','PERDUOMO'];

/*
Generamos un arreglo de nombres
 */
$nombres = ['RAUL','ALONDRA','ALEJANDRA','MARIANA','MARIANO','KAREN','KRISTAL','ADRIANA','ANAI','STEPHANY','CAROLINA','MARINA','ANDREA','YOLANDA','GRECIA','LILIANA','JONATHAN','ISRAEL','JUAN','CARLOS','ANDRES','DANIELA','GEORGINA','ALFREDO','RAFAEL','DAVID','HUMBERTO','GAEL','ISAAC','EDGAR',];

//Matricula de inicio
$matricula = 105022;

//creamos un ciclo que de mil iteraciones
for ($i = 0; $i < 1000; $i++) {

    //Tomamos un nombre aleatorio del arreglo
    $nombre = $nombres[rand(0, sizeof($nombres) - 1)];
    //Tomamos un apellido aleatorio del arreglo
    $apellido1 = $apellidos[rand(0, sizeof($apellidos) - 1)];
    //Tomamos un apellido aleatorio del arreglo
    $apellido2 = $apellidos[rand(0, sizeof($apellidos) - 1)];

    //Insertamos en la base de datos
    $conexion->query("INSERT INTO alumno (matricula, apellido1, apellido2, nombres) VALUES ($matricula, '$apellido1', '$apellido2', '$nombre')");    

    //Indicamos la matrícula que acabamos de insertar
    echo "Alumno $matricula insertado<br>";

    //Incrementamos la matrícula
    $matricula ++;
}
