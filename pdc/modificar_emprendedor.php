<?php 
include 'controladores/pdcdb.php';

$id = $_GET['id'];

$sql = $conex -> query("select * from emprendedores where id= $id");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/12d88bfecd.js" crossorigin="anonymous"></script>
    <title>Modificar</title>
</head>
<body>
<form class="col-8 p-3 m-auto" method="POST">
        <h3 class="text-center alert alert-secondary">Modificar emprendedor</h3>
        <input type="hidden" name="idd" value="<?=$_GET['id'] ?>">
        <?php 
        include 'controladores/modificar_emprendedor.php';
        while($datos = $sql ->fetch_object()){ ?>
<div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">N° Emprendedores</label>
    <input type="text" class="form-control" name="id" value="<?=$datos -> id ?>">
    <label for="exampleInputEmail1" class="form-label">Apellido</label>
    <input type="text" class="form-control" name="apellido" value="<?=$datos -> apellido ?>">
    <label for="exampleInputEmail1" class="form-label">Nombre</label>
    <input type="text" class="form-control" name="nombre" value="<?=$datos -> nombre ?>">
    <label for="exampleInputEmail1" class="form-label">Localidad</label>
    <input type="text" class="form-control" name="localidad" value="<?=$datos -> idlocalidad ?>">
    <label for="exampleInputEmail1" class="form-label">DNI</label>
    <input type="number" class="form-control" name="dni" value="<?=$datos -> dni ?>">
    <label for="exampleInputEmail1" class="form-label">CUIL</label>
    <input type="number" class="form-control" name="cuil" value="<?=$datos -> cuil ?>">
    <label for="exampleInputEmail1" class="form-label">Fecha de nacimiento</label>
    <input type="date" class="form-control" name="fechaN" value="<?=$datos -> fechanac ?>">
    <label for="exampleInputEmail1" class="form-label">Domicilio</label>
    <input type="text" class="form-control" name="domicilio" value="<?=$datos -> domicilio ?>">
    <label for="exampleInputEmail1" class="form-label">Celular</label>
    <input type="number" class="form-control" name="celular" value="<?=$datos -> celular1 ?>">
    <label for="exampleInputEmail1" class="form-label">Otro Celular</label>
    <input type="number" class="form-control" name="celularO" value="<?=$datos -> celular2 ?>">
    <label for="exampleInputEmail1" class="form-label">Correo</label>
    <input type="email" class="form-control" name="email" value="<?=$datos -> mail ?>">
    <label for="exampleInputEmail1" class="form-label">Vencimiento de Carnet</label>
    <input type="date" class="form-control" name="carnet" value="<?=$datos -> vautorizacion ?>">
</div>
       <?php }
        ?>
    
  <button type="submit" class="btn btn-primary" name="btnregistrar" value="ok">Modificar emprendedor</button>
   </form>  

   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>
</html>