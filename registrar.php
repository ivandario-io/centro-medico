<?php
//recibir datos y almacenarlos en variables
include 'configuracion/cn.php'; 
$identificacion = $_POST["identificacion"];
$nombres = $_POST["nombres"];
$apellidos = $_POST["apellidos"];
$fechaNacimiento = $_POST["fechaNacimiento];
$sexo = $_POST["sexo"]; 

//insertar datos 
$insertar = "INSER INTO pacientes (pacIdentificacion, pacNombres, pacApellidos, pacFechaNacimiento, pacSexo) VALUES ('$identificacion','$nombres', '$apellidos', '$fechaNacimiento', '$sexo')"; 
//ejecutar consulta 

$resultado = mysqli_query($conexion, $insertar);
if (!$resultado)
{
	echo 'error al registrar paciente'; 

}	else 

{
	echo 'Paciente Registrado correctamente'; 
}
//cerrar conexion 
mysqli_close($conexion); 