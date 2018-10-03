<!DOCTYPE HTML>
<html>
<head>
<title> </title>
<!-- Custom Theme files Styles -->
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
		<li><a href="registrar_medicos.html">Registrar Medicos</a></li>
		<li><a href="#">Listar Medicos</a></li>
		<li><a href="#">Actualizar Medicos</a></li>
		<li><a href="#">Borrar Medicos</a></li>
	</ul>
		</li>
		<li><a href="">Pacientes <i class="fa fa-angle-down" aria-hidden="true"></i></a>
	<ul>
		<li><a href="registrar_pacientes.html">Registrar Pacientes</a></li>
		<li><a href="consulta.php">Listar Pacientes</a></li>
		<li><a href="actualizar.php">Actualizar Pacientes</a></li>
		<li><a href="borrar.php">Borrar Pacientes</a></li>
	</ul>
		</li>
	</ul>
	</header>
	<div style="margin-top:20px !important"></div>
<!--sign up form start here-->
</body>
</html>
<?php 
$id=$_POST['identificacion']; 
$n=$_POST['nombres']; 
$a=$_POST['apellidos']; 
$esp=$_POST['especialidad']; 
$tel=$_POST['telefono']; 
$mail=$_POST['correo']; 


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

//guardamos en una variable la sentencia sql que permite actualizar la fecha de nacimiento 


$sql="UPDATE medicos SET medIdentificacion='$id', medNombres='$n', medApellidos='$a', medEspecialidad='$esp', medTelefono='$tel', medCorreo='$mail' WHERE medIdentificacion='".$id."' ";
//ejecutamos la consulta llamando al metodo query del objeto conexion y pasando la sentencia sql 
$resultado=$objConexion->query($sql); 

if ($resultado)
{
	echo '<script>alert("Se Actualizo Medico de Forma correcta")</script>'; 
	?>
	<meta http-equiv="refresh" content="0.1;url=listar_medicos.php"/>  
	<?php 
}
else 
{
	echo '<script>alert("Error! no se pudo actualizar medico")</script>'; 
}

?> 
?>