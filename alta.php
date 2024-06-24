<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Olvido de Password</title>
</head>
<body>
	<form action="alta.php" method="post">
		EMAIL<input type="email" name="email" placeholder="Ingrese Email">
		<br><input type="submit" value="Enviar">
	</form>

	<?php 

    include ("dbconn.php");
	if (isset($_POST['email']) && !empty($_POST['email'])) {
		//Conexion con la base
		//$conex = mysqli_connect("localhost", "root", "", "nusuario");

		$email = mysqli_real_escape_string($conn, $_POST['email']);
		$c = "SELECT *, IFNULL(email, 'users') as email FROM users WHERE email='$email' LIMIT 1";
		$f = mysqli_query($conn, $c);
		$a = mysqli_fetch_assoc($f);
		if (!$a) {
			$_SESSION['error'] = 'Usuario inexistente';
			//header( "Location: ../" );
			die();
		}
		//generar una clave aleatoria y el token

		$token = md5($a['email'] . time() . rand(1000, 9999));
		$clave_nueva = rand(10000000, 99999999);
		$idusuario = $a['email'];
		$c2 = "INSERT INTO recuperar SET email='$email', TOKEN='$token', FECHA_ALTA=NOW(), CLAVE_NUEVA='$clave_nueva' ON DUPLICATE KEY UPDATE TOKEN='$token', CLAVE_NUEVA='$clave_nueva'";
		mysqli_query($conn, $c2);

		$link = "http://localhost/google/recuperar_clave_confirmar.php?e=$email&t=$token";

		//envío de mail
		$mensaje = <<<EMAIL
		<p>Hola {$a['email']}</p>
		<p>Has solicitado recuperar tu contraseña. El sistema te ha generado una nueva clave que es: <code style='background: lightyellow; color: darkred; padding: 1px 2px;'>$clave_nueva</code></p>
		<p>Pero antes de poder usarla, deberás hacer <a href='$link'>clic en este vínculo</a> o copiar este código en la URL de tu navegador</p>
		<code style='background: black; color: white; padding: 4px;'>$link</code>
		<p>Si tú no has hecho esta solicitud, ignora el presente mensaje</p>
		EMAIL;

		echo $mensaje;

		//enviar ese mail 
		//redireccionar al formulario....
	}
	?>
</body>
</html>
