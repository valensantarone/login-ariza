<?php 
//Conexion con la base
include ("dbconn.php");
$email = $_GET['e'];
$token = $_GET['t'];

$c = "SELECT CLAVE_NUEVA FROM recuperar WHERE EMAIL='$email' AND TOKEN='$token' LIMIT 1 ";
$f = mysqli_query( $conn, $c );
$a = mysqli_fetch_assoc($f);
if( ! $a ){
	echo $_SESSION['error'] = 'Solicitud no encontrada';
	//header("Location: ../);
	die( );
}

//OBTENEMOS LA CLAVE Y ACTUALIZAMOS AL USUARIO
$clave = $a['CLAVE_NUEVA'];
//$clave_=sha1($clave);
$clave_ = password_hash($clave,PASSWORD_DEFAULT, array("cost"=>10));
$c2 = "UPDATE users SET password='$clave_' WHERE email='$email' LIMIT 1";
mysqli_query($conn, $c2);

//ELIMINAR ESTA SOLICITUD DE RECUPERO

$c3 = "DELETE FROM recuperar WHERE EMAIL='$email' LIMIT 1";
mysqli_query($conn, $c3);


echo $_SESSION['rta'] = 'Contraseña actualizada satisfactoriamente, ya se puede loguear';
//header("Location: ../9.5/index.php");


?>