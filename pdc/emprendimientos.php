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
  <title>Emprendimientos</title>
</head>

<body class="bg-light bg-gradient">
  <script>
    function eliminar() {
      var respuesta = confirm("Estas seguro/a que deseas eliminar a este emprendimiento?");
      return respuesta;
    }
  </script>
  <h2 class="text-center p-3 text-bg-primary vw-100">Emprendimientos</h2>
  <div class="flex">
    <p href="#" class="bor imgs"><img src="../img/flechaA.svg" class="img"></p>
    <a href="consulta.php" class="bor imgr"><img src="../img/consulta_icon.svg" class="imgd"></a>
    <p href="#" class="bor imgz"><img src="../img/flechaS.svg" class="imgc"></p>
    
  </div>
  <?php
  include 'controladores/pdcdb.php';
  include 'controladores/eliminar_emprendimientos.php';
  ?>
  <div class="container-fluid row">
  <?php
      include 'controladores/pdcdb.php';
      include 'controladores/registro_emprendimientos.php';
      ?>
    <form class="col-12 p-3" method="POST" id="form">
      <h3 class="text-center text-bg-dark p-3 rounded-1">Registro de emprendimientos</h3>
    
     
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">N° Emprendimiento</label>
        <input type="number" class="form-control" name="id">
        <label for="exampleInputEmail1" class="form-label">N° Emprendedor</label>
        <input type="number" class="form-control" name="idE">
        <label for="exampleInputEmail1" class="form-label">Nombre fantasia</label>
        <input type="text" class="form-control" name="nombreF">
        <label for="exampleInputEmail1" class="form-label">Dirección</label>
        <input type="text" class="form-control" name="direccion">
        <label for="exampleInputEmail1" class="form-label">Localidad</label>
        <input type="text" class="form-control" name="localidad">
        <label for="exampleInputEmail1" class="form-label">Telefono</label>
        <input type="number" class="form-control" name="telefono">
        <label for="exampleInputEmail1" class="form-label">Correo Electronico</label>
        <input type="text" class="form-control" name="mail">
        <label for="exampleInputEmail1" class="form-label">Descripción Producto</label>
        <input type="text" class="form-control" name="descripcion">
        <label for="exampleInputEmail1" class="form-label">Red Social</label>
        <input type="text" class="form-control" name="red">
        <label for="exampleInputEmail1" class="form-label">Otra red social</label>
        <input type="text" class="form-control" name="ored">
        <label for="exampleInputEmail1" class="form-label">Otra red social</label>
        <input type="text" class="form-control" name="oreds">
        <label for="exampleInputEmail1" class="form-label">Pagina Web</label>
        <input type="text" class="form-control" name="pagina">
        <label for="exampleInputEmail1" class="form-label">Rubro</label>
        <input type="text" class="form-control" name="rubro">
        <label for="exampleInputEmail1" class="form-label">CUIT</label>
        <input type="number" class="form-control" name="cuit">
        <label for="exampleInputEmail1" class="form-label">Formacion Impositiva</label>
        <input type="text" class="form-control" name="formacion">
        <label for="exampleInputEmail1" class="form-label">Carnet ASSAL</label>
        <input type="text" class="form-control" name="carnet">
        <label for="exampleInputEmail1" class="form-label">Fecha inicio EMP</label>
        <input type="date" class="form-control" name="fechaI">
        <label for="exampleInputEmail1" class="form-label">Fecha fin EMP</label>
        <input type="date" class="form-control" name="fechF">
      </div>
      <button type="submit" class="btn btn-dark" name="btnregistrar" value="ok">Registar emprendimiento</button>
    </form>
    <div class="col-12 p-2" id="rest">
      <table class="table rounded-1">
        <thead class="text-bg-dark">
          <tr>
            <th scope="col">N° Emprendimiento</th>
            <th scope="col">N° Emprendedor</th>
            <th scope="col">Nombre fantasia</th>
            <th scope="col">Dirección</th>
            <th scope="col">Localidad</th>
            <th scope="col">Telefono</th>
            <th scope="col">Correo Electronico</th>
            <th scope="col">Descripción Producto</th>
            <th scope="col">Red Social</th>
            <th scope="col">Otra red social</th>
            <th scope="col">Otra red social</th>
            <th scope="col">Pagina Web</th>
            <th scope="col">Rubro</th>
            <th scope="col">CUIT</th>
            <th scope="col">Formacion Impositiva</th>
            <th scope="col">Carnet ASSAL</th>
            <th scope="col">Fecha inicio EMP</th>
            <th scope="col">Fecha fin EMP</th>
          </tr>
        </thead>
        <tbody>
          <?php
          include 'controladores/pdcdb.php';
          $sql = $conex->query('select * from emprendimientos');
          while ($datos = $sql->fetch_object()) { ?>
            <tr>
              <td><?= $datos->idemprendimiento ?></td>
              <td><?= $datos->idemprendedor ?></td>
              <td><?= $datos->nfantasia ?></td>
              <td><?= $datos->direccion ?></td>
              <td><?= $datos->idlocalidad ?></td>
              <td><?= $datos->telefono ?></td>
              <td><?= $datos->mail ?></td>
              <td><?= $datos->descripcion ?></td>
              <td><?= $datos->rsocial1 ?></td>
              <td><?= $datos->rsocial2 ?></td>
              <td><?= $datos->rsocial3 ?></td>
              <td><?= $datos->blog ?></td>
              <td><?= $datos->idrubro ?></td>
              <td><?= $datos->cuit ?></td>
              <td><?= $datos->fimpositiva ?></td>
              <td><?= $datos->carnetssal ?></td>
              <td><?= $datos->finicioemp ?></td>
              <td><?= $datos->finemp ?></td>
              <td class="d-flex gap-1">
                <a href="modificar_emprendimiento.php?id=<?= $datos->idemprendimiento ?>" class="btn btn-small btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                <a onclick="return eliminar()" href="emprendimientos.php?id=<?= $datos->idemprendimiento ?>" class="btn btn-small btn-danger"><i class="fa-solid fa-trash"></i></a>
                <a href="imprimir_emprendimiento.php?id=<?= $datos->idemprendimiento?>" class="btn btn-primary" name="pdf"><i class="fa-solid fa-print"></i></a>

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