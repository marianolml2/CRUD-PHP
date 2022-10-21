<?php
 include 'database.php';

 if (isset($_POST['register'])) {
    if (strlen($_POST['usuario']) >= 1 && strlen($_POST['password']) >= 1) {
	$usuario = trim($_POST['usuario']);
	$contra = trim($_POST['password']);
    $consulta = "INSERT INTO users(usuario, clave) VALUES ('$usuario','$contra')";
	$res=mysqli_query($con,$consulta);
    if ($res) {
        ?> 
        <h3 class="ok">¡Usuario añadido correctamente!</h3>
       <?php
    } else {
        ?> 
        <h3 class="bad">¡Ups ha ocurrido un error!</h3>
       <?php
    }
    }   else {
        ?> 
        <h3 class="bad">¡Por favor complete los campos!</h3>
       <?php
        }
}


	   
	    

?>