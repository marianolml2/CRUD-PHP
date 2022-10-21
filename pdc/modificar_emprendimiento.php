<?php 
include 'controladores/pdcdb.php';

$id = $_GET['id'];

$sql = $conex -> query("select * from emprendimientos where idemprendimiento= $id");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/12d88bfecd.js" crossorigin="anonymous"></script>
    <title>Modificar Emprendimientos</title>
</head>
<body>
    
  <h3 class="text-center text-bg-dark p-4 rounded-1 vw-80">Modificar emprendimientos</h3>
<form class="col-4 p-3 m-auto" method="POST">
        <input type="hidden" name="idd" value="<?=$_GET['id']?>">
        <?php 
        include 'controladores/modificar_emprendimientos.php';
        while($datos = $sql ->fetch_object()){ ?>
<div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">N° Emprendimiento</label>
    <input type="number" class="form-control" name="id" value="<?=$datos -> idemprendimiento ?>">
    <label for="exampleInputEmail1" class="form-label">N° Emprendedor</label>
    <input type="number" class="form-control" name="idE" value="<?=$datos -> idemprendedor ?>">
    <label for="exampleInputEmail1" class="form-label">Nombre fantasia</label>
    <input type="text" class="form-control" name="nombreF" value="<?=$datos -> nfantasia ?>">
    <label for="exampleInputEmail1" class="form-label">Direccion</label>
    <input type="text" class="form-control" name="direccion" value="<?=$datos -> direccion ?>">
    <label for="exampleInputEmail1" class="form-label">Localidad</label>
    <input type="text" class="form-control" name="localidad" value="<?=$datos -> idlocalidad ?>">
    <label for="exampleInputEmail1" class="form-label">Telefono</label>
    <input type="number" class="form-control" name="telefono" value="<?=$datos -> telefono ?>">
    <label for="exampleInputEmail1" class="form-label">Correo Electronico</label>
    <input type="mail" class="form-control" name="mail" value="<?=$datos -> mail ?>">
    <label for="exampleInputEmail1" class="form-label" >Descripcion Producto</label> 
    <input type="text" class="form-control" name="descripcion" value="<?=$datos -> descripcion ?>">
    <label for="exampleInputEmail1" class="form-label">Red Social</label>
    <input type="text" class="form-control" name="red" value="<?=$datos -> rsocial1 ?>">
    <label for="exampleInputEmail1" class="form-label">Otra red social</label>
    <input type="text" class="form-control" name="ored" value="<?=$datos -> rsocial2 ?>">
    <label for="exampleInputEmail1" class="form-label">Otra red social</label>
    <input type="text" class="form-control" name="oreds" value="<?=$datos -> rsocial3 ?>">
    <label for="exampleInputEmail1" class="form-label">Pagina Web</label>
    <input type="text" class="form-control" name="pagina" value="<?=$datos -> blog ?>">
    <label for="exampleInputEmail1" class="form-label">Rubro</label>
    <input type="text" class="form-control" name="rubro" value="<?=$datos -> idrubro ?>">
    <label for="exampleInputEmail1" class="form-label">CUIT</label>
    <input type="number" class="form-control" name="cuit" value="<?=$datos -> cuit ?>">
    <label for="exampleInputEmail1" class="form-label">Formacion Impositiva</label>
    <input type="text" class="form-control" name="formacion" value="<?=$datos -> fimpositiva ?>">
    <label for="exampleInputEmail1" class="form-label">Carnet ASSAL</label>
    <input type="text" class="form-control" name="carnet" value="<?=$datos -> carnetssal ?>">
    <label for="exampleInputEmail1" class="form-label">Fecha inicio EMP</label>
    <input type="date" class="form-control" name="fechaI" value="<?=$datos -> finicioemp ?>">
    <label for="exampleInputEmail1" class="form-label">Fecha fin EMP</label>
    <input type="date" class="form-control" name="fechF" value="<?=$datos -> finemp ?>">
</div>
   <?php }
    ?>
  <button type="submit" class="btn btn-dark" name="btnregistrar" value="ok">Modificar emprendimiento</button>
</form> 

 <!-- JavaScript Bundle with Popper -->
 
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>
</html>


