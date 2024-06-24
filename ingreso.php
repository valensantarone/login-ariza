<?php

    include('dbconn.php');

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = $_POST["username"];
            $password = $_POST["password"];

            $sql = "SELECT * FROM users WHERE username = '$username'";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) == 1){
                $row = mysqli_fetch_assoc($result);
                $hashedPassword = $row["password"];

                if (password_verify($password, $hashedPassword)){
                    session_start();
                    $_SESSION["username"] = $username;
                    header("Location: accesocorrecto.php");
                } else {
                    echo "Contraseña incorrecta";
                }
            } else {
                echo "El usuario no existe";
            }
        }

    mysqli_close($conn);

    ?>