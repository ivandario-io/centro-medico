<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
	<title>Registrar Paciente</title>
	<link rel="stylesheet" type="text/css" href="theme/css/estilo_registro.css">
<link rel="stylesheet" type="text/css" href="theme/css/style.css" media="all"/>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
	<meta name="keywords" content="Signer Register Form Responsive,Login form web template, Sign up Web Templates, Flat Web Templates, Login signup Responsive web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
	<!--Google Fonts-->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
</head>
<body>

<header>
	<ul>
		<li><a href="index.html">Inicio<i class="material-icons">home</i></a></li>
		<li><a href="">Citas <i class="fa fa-angle-down" aria-hidden="true"></i> </a>	
	<ul>
		<li><a href="#">Asignar Citas </a></li>
		<li><a href="#">Listar Citas</a></li>
		<li><a href="#">Citas Por atender</a></li>
		<li><a href="#">Editar Citas</a></li>
	</ul>			
		</li>
		<li><a href="">Consultorios <i class="fa fa-angle-down" aria-hidden="true"></i></a>
	<ul>
		<li><a href="#">Listar Consultorios</a></li>
	</ul>
		</li>
		<li><a href="">Medicos <i class="fa fa-angle-down" aria-hidden="true"></i></a>
	<ul>
		<li><a href="registrar_medico.html">Registrar Medicos</a></li>
		<li><a href="listar_medicos.php">Listar Medicos</a></li>
		<li><a href="actualizar_medico.html">Actualizar Medicos</a></li>
		<li><a href="borrar_medico.html">Borrar Medicos</a></li>
	</ul>
		</li>
		<li><a href="">Pacientes <i class="fa fa-angle-down" aria-hidden="true"></i></a>
	<ul>
		<li><a href="registrar_paciente.html">Registrar pacientes</a></li>
		<li><a href="listar_pacientes.php">Listar pacientes</a></li>
		<li><a href="actualizar_paciente.html">Actualizar pacientes</a></li>
		<li><a href="borrar_paciente.html">Borrar pacientes</a></li>
	</ul>
		</li>
	</ul>
	</header>
	<div style="margin-top:30px !important"></div>
<h1 align="center">Registro Paciente</h1>
<?php
extract($_REQUEST); //recoger todas las variables que pasan por el metodo GET O POST

/*hacemos el llamado al archivo que contiene los valores parametros conexion a la base de datos*/ 
require "configuracion/conexionBaseDatos.php" ;

//creamos el objeto conexion utilizando la extension mysqli 
$objConexion = new mysqli($host, $user, $password, $baseDatos); 
//verificamos la conexion 
if ($objConexion->connect_error)
{
	echo "error de conexion a la base de datos ".$objConexion->connect_error; 
	exit(); 
}
//vamos a realizar el proceso de insertar paciente

//guardamos en una variable la sentencia sql 
$sql="INSERT INTO pacientes(pacIdentificacion,pacNombres,pacApellidos,pacFechaNacimiento,pacSexo) VALUES('$_REQUEST[identificacion]','$_REQUEST[nombres]','$_REQUEST[apellidos]','$_REQUEST[fechaNacimiento]','$_REQUEST[sexo]')"; 

//ejecutamos la consulta llamando al metodo query del objeto conexion y pasando la sentencia sql 
$resultado=$objConexion->query($sql); 
if ($resultado)
{
	echo '<script>alert("Se Registro Paciente de Forma correcta")</script>'; 
	?>
	<meta http-equiv="refresh" content="0.1;url=listar_pacientes.php"/>  
	<?php 
}
else 
{
	echo '<script>alert("Error! no se pudo Registar paciente")</script>'; 
}

	?> 

?>