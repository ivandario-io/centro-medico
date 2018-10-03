<?php
require("conexionBaseDatos.php");
session_start();
$_SESSION=array();

if ($_POST["login"]){
	$con_bd = mysqli_connect($host,$user,$password) or die("Error en la conexión a la base de datos");
	mysqli_select_db($baseDatos, $con_bd);
	$pass = md5($_POST["pass"]);
	$sql="SELECT * FROM usuarios WHERE usuLogin='".($_POST["login"])."' and usuPassword='".$pass."'";
	$result = mysqli_query($sql,$con_bd);
	if (mysqli_num_rows($result)==1){
		$_SESSION["login"]=mysqli_result($result,0,"login");
		$_SESSION["pass"]=mysqli_result($result,0,"pass");
	
		header("Location:..principal.html");
	}else
	{
		?>
        <script type="text/javascript">
		alert("\tUsuario o Password incorrecto \n \t Favor de verificar los datos");
		window.location = "../login.html";
		</script>
		<?php 
    }
}
?>		
		<script type="text/javascript">
		window.location = "../centromedico/login.html";
		</script>