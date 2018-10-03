<meta charset="utf-8">
<?php
$usuario = $_POST['usuario']; 
$contraseña = $_POST['clave']; 

//conectar a la base de datos 

$conexion = mysqli_connect("localhost", "root", "","centromedico"); 
$consulta = "SELECT * FROM usuarios WHERE usuario='$usuario' and contraseña='$contraseña'"; 
$resultado = mysqli_query($conexion, $consulta); 

$filas = mysqli_num_rows($resultado); 

if ($filas > 0) { 
	header("location:bienvenidos.html"); 
}
else {
	echo "error en la autentificacion"; 
}
mysqli_free_result($resultado); 
mysqli_close($conexion); 

?>