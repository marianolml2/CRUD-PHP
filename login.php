<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://kit.fontawesome.com/12d88bfecd.js" crossorigin="anonymous"></script>
    <link rel="icon" href="img/iconL.png">
    <title>Login</title>
</head>
<body>
<?php
include ('database.php');
include ('controlador/controlador_login.php'); 
?>
    <!--Portada-->
    <main>
        <div class="portada">
            <img src="img/portada.svg" alt="">
        </div>
        <!--Login-->
        <div class="form">
            <img src="img/login.png" alt="" id="in">
            <h3>Iniciar sesión</h3>  
            <form action="" method="post">
                <div class="input-wrapper">
                    <input type="text" name="usuario" placeholder="Usuario">
                    <i class="fa-solid fa-user input-icon"></i>

                </div>
                <div class="input-wrapper">
                    <input type="password" name="password" placeholder="Contraseña">
                    <i class="fa-light fa-lock input-icon"></i>
                </div>

                <input type="submit" value="Ingresar" name="ingresar">
            </form>
          <span id="regis"><a href="signup.php" >Registrate</a></span> 
        </div>
        <!--Login-fin-->
    </main>
    </body>
    </html>