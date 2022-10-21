<?php 
// añadir esto una vez que compruebe su necesidad: and !empty($_POST['foto']) acordarse que falta programacion para poder agregar fotos a la base de datos
if(!empty($_POST['btnregistrar'])){
    if(!empty($_POST['id']) and !empty($_POST['idE']) and !empty($_POST['nombreF']) and !empty($_POST['direccion'])  and !empty($_POST['localidad']) and !empty($_POST['telefono']) and !empty($_POST['mail']) and !empty($_POST['descripcion'])  and !empty($_POST['rubro'])  and !empty($_POST['cuit']) and !empty($_POST['formacion']) and !empty($_POST['fechaI'])){
        
        $id = $_POST['id'];
        $idE = $_POST['idE'];
        $nombreF = $_POST['nombreF'];
        $direccion = $_POST['direccion'];
        $localidad = $_POST['localidad'];
        $telefono = $_POST['telefono'];
        $mail = $_POST['mail'];
        $descripcion = $_POST['descripcion'];
        $red = $_POST['red'];
        $ored = $_POST['ored'];
        $oreds = $_POST['oreds'];
        $pagina = $_POST['pagina'];
        $rubro = $_POST['rubro'];
        $cuit = $_POST['cuit'];
        $formacion = $_POST['formacion'];
        $carnet = $_POST['carnet'];
        $fechaI = $_POST['fechaI'];
        $fechF = $_POST['fechF'];
        $seleccion = "SELECT * FROM emprendimientos";
        $res = mysqli_query($conex, $seleccion);
        $consulta = mysqli_fetch_array($res);
        if($id != $consulta['idemprendimiento']){
        $sql = $conex ->query("insert into emprendimientos(idemprendimiento,idemprendedor,nfantasia,direccion,idlocalidad,telefono,mail,descripcion,rsocial1,rsocial2,rsocial3,blog,idrubro,cuit,fimpositiva,carnetssal,finicioemp,finemp)values('$id','$idE','$nombreF','$direccion','$localidad','$telefono','$mail','$descripcion','$red','$ored','$oreds','$pagina','$rubro','$cuit','$formacion','$carnet','$fechaI','$fechF')");
        if($sql==1){
            echo '<div class="alert alert-success">Emprendimientos registrado correctamente</div>';
        }else{
            echo '<div class="alert alert-danger">Error al registrar emprendimiento</div>';
        } 
    }else{
         echo '<div class="alert alert-danger">"El id del emprendedor que intenta ingresar ya se encuentra registrado"</div>';
        }
    }else{
        echo '<div class="alert alert-warning">Algunos de los campos estan vacios</div>';
    }
}
