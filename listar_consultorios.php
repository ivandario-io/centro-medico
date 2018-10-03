<?php 
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

//vamos a realizar el proceso para consultar pacientes 

//guardamos en una variable la sentencia sql 
$sql="SELECT * FROM consultorios"; 
$resultado=$objConexion->query($sql); 
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
	<title>lista de Consultorios</title>
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
	<form id="form1" name="form1" method="post" action="validarInsertarMedico.php">
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
		<li><a href="listar.php">Listar Medicos</a></li>
		<li><a href="#">Actualizar Medicos</a></li>
		<li><a href="#">Borrar Medicos</a></li>
	</ul>
		</li>
		<li><a href="">Pacientes <i class="fa fa-angle-down" aria-hidden="true"></i></a>
	<ul>
		<li><a href="registrar_pacientes.html">Registrar pacientes</a></li>
		<li><a href="consulta.php">Consultar pacientes</a></li>
		<li><a href="actualizar.php">Actualizar pacientes</a></li>
		<li><a href="#">Borrar pacientes</a></li>
	</ul>
		</li>
	</ul>
	</header>
	<div style="margin-top:30px !important"></div>
<h1 align="center">Listado De Medicos Registrados</h1>
<div style="margin-top:20px !important"></div>
<table width="70%" border="1" align="center" >
	<tr align="center" bgcolor="#99FF66">
		<td >Identificacion</td>
		<td>Nombres</td>
		<td>Apellidos</td>
		<td>Espcecialidad</td>
		<td>Telefono</td>
		<td>Correo Electronico</td>
	</tr>
	<?php 
	while ($datos=$resultado->fetch_array())
	{
		?> 
		<tr>
			<td><?php echo $datos['medIdentificacion']?></td>
			<td><?php echo $datos['medNombres']?></td>
			<td><?php echo $datos['medApellidos']?></td>
			<td><?php echo $datos['medEspecialidad']?></td>
			<td><?php echo $datos['medTelefono']?></td>
			<td><?php echo $datos['medCorreo']?></td>
		</tr>
		<?php 
	}//cerrando el ciclo while 
	?> 
</table>
</body>
</html>