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
    <title>Registrarse</title>
</head>
<body>
<main>
        <div class="portada">
            <img src="img/portada.svg" alt="">
        </div>
        <div class="form">
            <form action="signup.php" method="post" >
                <img src="img/icono-login.png" alt="">
                <h3>Registrarse</h3>
                <div class="input-wrapper">
                    <input type="text" name="usuario" placeholder="Usuario">
                    <i class="fa-solid fa-user input-icon"></i>
                </div>
                <div class="input-wrapper">
                    <input type="password" name="password" placeholder="Contraseña">
                    <i class="fa-light fa-lock input-icon"></i>
                </div>
                <div class="input-wrapper">  
                <input type="password" name="confirm_contraseña" placeholder="Confirmar contraseña">
                <i class="fa-light fa-lock input-icon"></i>
                </div>
                <input type="submit" value="Ingresar" name="register">
            </form>
            <span id="regis"><a href="login.php">Ingresa</a></span>
            <?php include('registrar.php');?>
        </div>
</main>
</body>
</html>