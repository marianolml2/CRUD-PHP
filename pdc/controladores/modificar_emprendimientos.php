<?php 
// añadir esto una vez que compruebe su necesidad: and !empty($_POST['foto']) acordarse que falta programacion para poder agregar fotos a la base de datos

if(!empty($_POST["btnregistrar"])){
    if(!empty($_POST['id']) and !empty($_POST['idE']) and !empty($_POST['nombreF']) and !empty($_POST['direccion'])  and !empty($_POST['localidad']) and !empty($_POST['telefono']) and !empty($_POST['mail']) and !empty($_POST['descripcion'])  and !empty($_POST['rubro'])  and !empty($_POST['cuit']) and !empty($_POST['formacion']) and !empty($_POST['fechaI'])){
        $idd = $_POST['idd'];
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
        $dproducto = $_POST['dproducto'];
        
        $sql = $conex ->query("update emprendimientos set idemprendimiento=$id, idemprendedor=$idE,nfantasia='$nombreF',direccion='$direccion',idlocalidad='$localidad',telefono=$telefono,mail='$mail',descripcion='$descripcion',rsocial1='$red',rsocial2='$ored',rsocial3='$oreds',blog='$pagina',idrubro='$rubro',cuit=$cuit,fimpositiva='$formacion',carnetssal='$carnet',finicioemp='$fechaI',finemp='$fechF' where idemprendimiento = $idd");

       if($sql ==1){
        header('location: emprendimientos.php');
       }else{
        echo '<div class="alert alert-danger">Error al modificar Emprendimiento</div>';
       }

    }else{
        echo '<div class="alert alert-warning">Falta completar algun campo</div>';
    }
}

?>