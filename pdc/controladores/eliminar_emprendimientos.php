<?php 

if(!empty($_GET['id'])){
    $id = $_GET['id'];
    $sql = $conex -> query("delete from emprendimientos where idemprendimiento=$id ");
    if($sql ==1){
        echo '<div class ="alert alert-success">Emprendimiento eliminado correctamente</div>';
    }else{
        echo '<div class ="alert alert-danger">Error al eliminar</div>';
    }
}


?>