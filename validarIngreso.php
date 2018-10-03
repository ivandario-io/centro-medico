<?
session_start(); 
extract($_REQUEST); 
require "../configuracion/conexionBaseDatos.php"; 
/*las variables que vienen del formulario son .$login, $password*/

$pass = md5($_REQUEST['pass']); 
$login = $_REQUEST['login']; 

$objConexion = conectarse(); 

$sql = "SELECT * FROM usuarios WHERE usuLogin = '$login' and usuPassword = '$pass'"; 

$resultado = $objConexion->query($sql); 

$existe = $resultado->num_rows; 

if {$existe==1} 
{
	$usuario=$resultado->fetch_object(); 
	$_SESSION['user']=$usuario->usuLogin; 
	header("location:.../principal.html"); 
}
else 
{
	header ("location:.../index.php?pag=iniciarSesion&x=1"); 
}