<?php
$id=$_POST['identificacion'];  
/* hacemos el llamado al archivo que contiene los valores parametros conexion a la base de datos */
require "configuracion/conexionBaseDatos.php";
//creamos el objeto conexion utilizando la extension mysqli 
$objConexion = new mysqli($host, $user, $password, $baseDatos); 
//verificamos la conexion 
if ($objConexion->connect_error)
{
	echo "error de conexion a la base de datos " .$objConexion->connect_error; 
	exit();
}
//guardamos en una variable la sentencia sql que permite borrar 
$sql=("DELETE FROM medicos WHERE medIdentificacion='".$id."'");
//agregamos la sentencia sql al metodo prepare 
$resultado=$objConexion->prepare($sql); 
//creamos variables con los valores de los parametros 

/* 
agregamos los parametros, el primer parametro hace referencia al tipo de datos de los parametros s: para string.*/ 

//ejecutamos el metodo execute en la variable que tiene el resultado 
$result=$resultado->execute(); 
if ($result)
{
	echo '<script>alert("Se elimino medico de Forma correcta")</script>'; 
	?>
	<meta http-equiv="refresh" content="0.1;url=listar_medicos.php"/>  
	<?php 
}
else 
{
	echo "Error! no se pudo eliminar medico"; 
}

?> 