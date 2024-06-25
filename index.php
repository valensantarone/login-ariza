<?php
    include('config.php');
    include('dbconn.php');

    $login_button = '';

    if (isset($_GET["code"])) {
        $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);
        if (!isset($token['error'])) {
            $google_client->setAccessToken($token['access_token']);
            $_SESSION['access_token'] = $token['access_token'];
            $google_service = new Google_Service_Oauth2($google_client);
            $data = $google_service->userinfo->get();
            if (!empty($data['given_name'])) {
                $_SESSION['user_first_name'] = $data['given_name'];
            }
            if (!empty($data['family_name'])) {
                $_SESSION['user_last_name'] = $data['family_name'];
            }
            if (!empty($data['email'])) {
                $_SESSION['user_email_address'] = $data['email'];
            }
            if (!empty($data['gender'])) {
                $_SESSION['user_gender'] = $data['gender'];
            }
            if (!empty($data['picture'])) {
                $_SESSION['user_image'] = $data['picture'];
            }
        }
    }

    if (!isset($_SESSION['access_token'])) {
        $login_button = '<a href="' . $google_client->createAuthUrl() . '" class="btn btn-secondary bx bxl-google inputs">Iniciar sesión con Google</a>';
    }



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="styles.css" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="gonza.js?1" defer></script>
    <script src="JavaScriptL.js?34" defer></script>
   
    <title>Log in</title>
</head> 

<body>
    
    <div class="container">
    <h1 class='titulo'>Log In</h1>
        <div class="row">
            <div class="col-sm-12 col-12">
                <form action="ingreso.php" method='post'>
                    <label for="" class='titulos'>Usuario</label>
                    <input class="form-control ema" type="text" id="nom" name='username' placeholder="Introduce su usuario" required />
                    <div class="cont-pass">
                        <label for="" class='titulos'>Password</label>
                        <input type="password" class="form-control" id="pass" name='password' placeholder="Introduce su contraseña" required />
                        <i class="bx bxs-show show"></i>
                    </div>
                    <div class="cont-sub">
                        <button type="submit" class="btn btn-primary inputs_ingresar">Ingresar</button>
                        <button type="submit" class="btn btn-secondary inputs">
                        <!-- <a href="https://bomberosalerta.com.ar/gonza/ServicioLogin-Singup/Sing-up.php">Registrarse</a> -->
                            <a href="signup.php">Registrarse</a>
                        </button>
                        <button type='button' class="btn btn-primary inputs">
                        <a href="alta.php">¿Olvidó su contraseña?</a>
                        </button>
                        <?php echo $login_button; ?>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>