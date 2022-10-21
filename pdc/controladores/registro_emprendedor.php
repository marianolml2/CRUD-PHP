<?php 
// añadir esto una vez que compruebe su necesidad: and !empty($_POST['foto']) acordarse que falta programacion para poder agregar fotos a la base de datos
if(!empty($_POST['btnregistrar'])){
    if(!empty($_POST['id']) and !empty($_POST['apellido']) and !empty($_POST['nombre']) and !empty($_POST['localidad']) and !empty($_POST['dni']) and !empty($_POST['cuil']) and !empty($_POST['fechaN']) and !empty($_POST['domicilio']) and !empty($_POST['celular'])  and !empty($_POST['email']) and !empty($_POST['carnet'])){
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
        $seleccion = "SELECT * FROM emprendedores";
        $res = mysqli_query($conex, $seleccion);
        $consulta = mysqli_fetch_array($res);
        if($id != $consulta['id']){
            $sql = $conex ->query("insert into emprendedores(id,apellido,nombre,idlocalidad,dni,cuil,fechanac,domicilio,celular1,celular2,mail,vautorizacion)values('$id','$apellido','$nombre','$localidad','$dni','$cuil','$fechaN','$domicilio','$celular','$celularO','$email','$carnet')");
            if($sql==1){
                echo '<div class="alert alert-success">Emprendedor registrado correctamente</div>';
            }else{
                echo '<div class="alert alert-danger">Error al registrar emprendedor</div>';
            }
        }else{
            echo '<div class="alert alert-danger">"El id del emprendedor que intenta ingresar ya se encuentra registrado"</div>';
        }
        
    }else{
        echo '<div class="alert alert-warning">Algunos de los campos estan vacios</div>';
    }
}

?>