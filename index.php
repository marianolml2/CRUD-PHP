<?php 

session_start();

if(empty($_SESSION['id'])){
    header('location: login.php');
}

?> 
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
    <link rel="icon" href="img/iconH.png">
    <title>Bienvenido</title>
</head>
<body>
  
 <nav class="menu">
     <?php print "<p class='user'>Hola {$_SESSION['usuario']}</p>";?>
        <a href="controlador/logout.php">Cerrar sesion</a>
</nav> 
    <h2 class="pnc">Bienvenido</h2>
    <section class="trabajo">
        <div><a href="pdc/consulta.php" target="_blank" ><img src="img/consulta.svg" alt=""></a>Consulta rubro, listado de emprendedores y emprendimientos</div>
        <div><a href="pdc/emprendedores.php" target="_blank" ><img src="img/emprendedor.svg" alt=""></a>Registra, observa, edita, elimina emprendedores e imprime carnet</div>
        <div><a href="pdc/emprendimientos.php" target="_blank" ><img src="img/portadaE.svg" alt=""></a>Registra, observa, edita y elimina emprendimientos</div>
    </section>

</body>
</html>
