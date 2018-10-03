<?php 
//conexion a la base de datos 
/*hacemos el llamado al archivo que contiene los valores 
parametros para conectarnos a la base de datos*/

require "conexionBaseDatos.php"; 

//creamos el objeto conexion utilizando la extension mysqli 
$objConexion = new mysqli($host,$user,$password,$baseDatos); 

//verificamos la conexion
if ($objConexion->connect_error)
{
	echo "error de conexion a la base de datos".$objConexion->connect_error; 
	exit(); 
}
else 
{
	echo "conectados al servidor y listos para utilizar la base de datos ".$baseDatos; 
}

?> 