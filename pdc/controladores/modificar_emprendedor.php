<?php 
// añadir esto una vez que compruebe su necesidad: and !empty($_POST['foto']) acordarse que falta programacion para poder agregar fotos a la base de datos

if(!empty($_POST["btnregistrar"])){
    if(!empty($_POST['id']) and !empty($_POST['apellido']) and !empty($_POST['nombre']) and !empty($_POST['localidad']) and !empty($_POST['dni']) and !empty($_POST['cuil']) and !empty($_POST['fechaN']) and !empty($_POST['domicilio']) and !empty($_POST['celular']) and !empty($_POST['celularO']) and !empty($_POST['email']) and !empty($_POST['carnet'])){
        $idd = $_POST['idd'];
        $id = $_POST['id'];
        $apellido = $_POST['apellido'];
        $nombre = $_POST['nombre'];
        $localidad = $_POST['localidad'];
        $dni = $_POST['dni'];
        $cuil = $_POST['cuil'];
        $fechaN = $_POST['fechaN'];
        $domicilio = $_POST['domicilio'];
        $celular = $_POST['celular'];
        $celularO = $_POST['celularO'];
        $email = $_POST['email'];
        $carnet = $_POST['carnet'];
       
       $sql = $conex ->query("update emprendedores set id=$id, apellido='$apellido',nombre='$nombre',idlocalidad='$localidad',dni=$dni,cuil=$cuil,fechanac='$fechaN',domicilio='$domicilio',celular1=$celular,celular2=$celularO,mail='$email',vautorizacion='$carnet' where id = $idd");
       if($sql ==1){
        header('location: emprendedores.php');
       }else{
        echo '<div class="alert alert-danger">Error al modificar emprendedor</div>';
       }

    }else{
        echo '<div class="alert alert-warning">Falta completar algun campo</div>';
    }
}

?>