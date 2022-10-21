<?php 
session_start();
include 'database.php';

if(!empty($_POST['ingresar'])){
    if(!empty($_POST['usuario']) and !empty($_POST['password'])){
        $usuario = $_POST['usuario'];
        $password = $_POST['password'];
        $consulta = "SELECT* FROM users where usuario = '$usuario' and clave ='$password' ";
        $resultado= mysqli_query($con, $consulta);

        $filas=mysqli_num_rows($resultado);
        $datos= $resultado -> fetch_object();
        if($filas){

            $_SESSION['id'] = $datos->id;
            $_SESSION['usuario'] = $datos->usuario;
            header("location:index.php");
           
        
        }else{
           echo '<div class="alert">Acceso Denegado</div>';
            
        }
        mysqli_free_result($resultado);
        mysqli_close($con);
       
}
}

?>