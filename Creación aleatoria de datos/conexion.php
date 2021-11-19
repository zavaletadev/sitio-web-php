<?php 
/*
Generamos una conexión a base de datos y la almacenamos 
en una variable que invocaremos de manera global
 */
$conexion = new mysqli(
    //Servidor
    '204.44.192.59',
    //Usuario
    'zaval846_usconfdb', 
    //Contraseña
    'uPG3WUAd',
    //Base de datos 
    'zaval846_confdb',
    //Puerto
    3306
);
