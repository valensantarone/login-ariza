<?php
    include('dbconn.php');

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST["username"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $phone = $_POST["phone"];
    
        // Verificar si el nombre de usuario o el correo electrónico ya existen
        $check_query = "SELECT * FROM users WHERE username='$username' OR email='$email'";
        $result = $conn->query($check_query);
    
        if ($result->num_rows > 0) {
            echo "El nombre de usuario o correo electrónico ya están registrados.";
        } else {
            // Si no existen, agregar el nuevo registro
            $pass_cifrada = PASSWORD_HASH($password, PASSWORD_DEFAULT, array('cost'=>10));
    
            $sql = "INSERT INTO users (username, email, password, phone)
                    VALUES ('$username', '$email', '$pass_cifrada', '$phone')";
    
            if ($conn->query($sql) === TRUE) {
                echo "Usuario registrado correctamente.";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    }
    
        $conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario</title>
    <link rel="stylesheet" href="./styles.css" />
</head>
<body>
    <div class="container">
        <h2 class="titulo">Registro de Usuario</h2>
        <div class="contenedor_form-signup">
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <label for="username" class="titulos">Usuario:</label><br>
                <input type="text" id="username" name="username" required><br><br>
                
                <label for="email" class="titulos">Email:</label><br>
                <input type="email" id="email" name="email" required><br><br>
                
                <label for="password" class="titulos">Contraseña:</label><br>
                <input type="password" id="password" name="password" required><br><br>
                
                <label for="phone" class="titulos">Teléfono:</label><br>
                <input type="text" id="phone" name="phone" required><br><br>

                <div class="cont-sub">
                    <input class="inputs" type="submit" value="Registrarse">
                    <button class="inputs"><a href="index.php">Iniciar Sesión</a></button>
                </div>
            </form>
        </div>
    </div>

</body>
</html>
