<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/12d88bfecd.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="css/estilos.css">
  <link rel="icon" href="../img/iconR.png">
  <title>Emprendedores</title>
</head>

<body class="bg-light bg-gradient">
  <script>
    function eliminar() {
      var respuesta = confirm("Estas seguro/a que deseas eliminar a este emprendedor?");
      return respuesta;
    }
  </script>
  <h2 class="text-center p-3 bg-success bg-gradient vw-100">Emprendedores</h2>
  <div class="flex">
    <p href="" class="bor imgs"><img src="../img/flechaA.svg" class="img"></p>
    <a href="consulta.php" class="bor imgr"><img src="../img/consulta_icon.svg" class="imgd"></a>
    <p href="" class="bor imgz"><img src="../img/flechaS.svg" class="imgc"></p>
  </div>
  <?php
  include 'controladores/pdcdb.php';
  include 'controladores/eliminar_emprendedor.php';
  ?>
   
 
  <div class="container-fluid row">
  <?php
      include 'controladores/pdcdb.php';
      include 'controladores/registro_emprendedor.php';
      ?>
    <form class="col-12 p-2" method="POST" id="form">
    
      <h3 class="text-center bg-info p-3 rounded-1">Registro de emprendedores</h3>
     
      <div class="mb-3" >
        <label for="exampleInputEmail1" class="form-label">N°Emprendedor</label>
        <input type="text" class="form-control" name="id">
        <label for="exampleInputEmail1" class="form-label">Apellido</label>
        <input type="text" class="form-control" name="apellido">
        <label for="exampleInputEmail1" class="form-label">Nombre</label>
        <input type="text" class="form-control" name="nombre">
        <label for="exampleInputEmail1" class="form-label">Localidad</label>
        <input type="text" class="form-control" name="localidad">
        <label for="exampleInputEmail1" class="form-label">DNI</label>
        <input type="number" class="form-control" name="dni">
        <label for="exampleInputEmail1" class="form-label">CUIL</label>
        <input type="number" class="form-control" name="cuil">
        <label for="exampleInputEmail1" class="form-label">Fecha de nacimiento</label>
        <input type="date" class="form-control" name="fechaN">
        <label for="exampleInputEmail1" class="form-label">Domicilio</label>
        <input type="text" class="form-control" name="domicilio">
        <label for="exampleInputEmail1" class="form-label">Celular</label>
        <input type="number" class="form-control" name="celular">
        <label for="exampleInputEmail1" class="form-label">Otro Celular</label>
        <input type="number" class="form-control" name="celularO">
        <label for="exampleInputEmail1" class="form-label">Correo</label>
        <input type="email" class="form-control" name="email">
        <label for="exampleInputEmail1" class="form-label">Vencimiento de Carnet</label>
        <input type="date" class="form-control" name="carnet">
      </div>
      <button type="submit" class="btn btn-primary" name="btnregistrar" value="ok" id="on">Registrar emprendedor</button>
    </form>
    <div class="col-12 p-2" id="rest">
      <table class="table rounded-1">
        <thead class="bg-info">
          <tr>
            <th scope="col">N° Emprendedor</th>
            <th scope="col">Apellido</th>
            <th scope="col">Nombre</th>
            <th scope="col">Localidad</th>
            <th scope="col">DNI</th>
            <th scope="col">CUIL</th>
            <th scope="col">Fecha de nacimiento</th>
            <th scope="col">Domicilio</th>
            <th scope="col">Celular</th>
            <th scope="col">Otro Celular</th>
            <th scope="col">Correo</th>
            <th scope="col">Vencimiento de Carnet</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
          <?php
          include 'controladores/pdcdb.php';
          $sql = $conex->query('select * from emprendedores');
          while ($datos = $sql->fetch_object()) { ?>
            <tr>
              <td><?= $datos->id ?></td>
              <td><?= $datos->apellido ?></td>
              <td><?= $datos->nombre ?></td>
              <td><?= $datos->idlocalidad ?></td>
              <td><?= $datos->dni ?></td>
              <td><?= $datos->cuil ?></td>
              <td><?= $datos->fechanac ?></td>
              <td><?= $datos->domicilio ?></td>
              <td><?= $datos->celular1 ?></td>
              <td><?= $datos->celular2 ?></td>
              <td><?= $datos->mail ?></td>
              <td><?= $datos->vautorizacion ?></td>
              <td class="d-flex gap-1">
                <a href="modificar_emprendedor.php?id=<?= $datos->id ?>" class="btn btn-small btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                <a onclick="return eliminar()" href="emprendedores.php?id=<?= $datos->id ?>" class="btn btn-small btn-danger"><i class="fa-solid fa-trash"></i></a>
                <a href="carnet_emprendedor.php?id=<?= $datos ->id ?>" class="btn btn-primary"><i class="fa-solid fa-print"></i></a>
              </td>
            </tr>
          <?php }

          ?>

        </tbody>
      </table>
    </div>
  </div>




  <!-- JavaScript Bundle with Popper -->
<script src="css/main.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>

</html>