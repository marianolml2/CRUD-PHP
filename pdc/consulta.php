<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="icon" href="../img/iconP.png">
    <title>Consulta</title>
</head>

<body>
    <h2 id="title">Consulta</h2>
    <main>
        <form id="formulario" method="POST">
            <div id="rubro">
                <label for="buscar">Nombre del rubro</label>
                <input type="text" name="buscar">
                <input type="submit" value="Exportar" name="btnconsulta">
            </div>
            <div id="informe">
                <label for="informe">Informe de emprendedor</label>
                <input type="submit" value="Listado" name="informe">
                
            </div>
            <div id="informeE">
                <label for="informeE">Informe de emprendimiento</label>
                <input type="submit" value="Listado" name="informeE">
            </div>
            <?php
            require('controladores/pdcdb.php');
            if (isset($_POST['btnconsulta'])) {
                $buscar = $_POST['buscar'];
                $resultado = mysqli_query($conex, "SELECT * FROM emprendimientos");
                $con = mysqli_fetch_array($resultado);
                //  if ($buscar == $con['idrubro']) {
                require('controladores/pdf/fpdf.php');

                class PDF extends FPDF
                {
                    // Cabecera de página
                    function Header()
                    {
                        // Logo
                        $this->Image('controladores/pdf/recreoL.png', 180, 4, 20);
                        // Arial bold 15
                        $this->SetFont('Arial', 'B', 10);
                        // Movernos a la derecha
                        $this->Cell(80);
                        // Título
                        $this->Cell(-100, 10, 'INFORME POR RUBRO', 0, 0, 'C');
                        // Salto de línea
                        $this->Ln(20);
                        //Titulo de celda
                        $this->Cell(28, 10, utf8_decode('N° EMP'), 0, 0, 'C', 0);
                        $this->Cell(28, 10, utf8_decode('Nombre empresa'), 0, 0, 'C', 0);
                        $this->Cell(50, 10, utf8_decode('Producto'), 0, 0, 'C', 0);
                        $this->Cell(28, 10, utf8_decode('Localidad'), 0, 1, 'C', 0);
                        $this->Cell(310, -10, utf8_decode('N° REG'), 0, 0, 'C', 0);
                        $this->Ln(1);
                        $this->Cell(360, -12, utf8_decode('Apellido'), 0, 0, 'C', 0);
                    }

                    // Pie de página
                    function Footer()
                    {
                        // Posición: a 1,5 cm del final
                        $this->SetY(-15);
                        // Arial italic 8
                        $this->SetFont('Arial', 'I', 8);
                        // Número de página
                        $timestamp = date_default_timezone_set("America/Argentina/Jujuy");
                            $format = "j-m-Y";
                            $this ->Cell (0,10,date($format, $timestamp = time()));
                        $this->Cell(0, 10, utf8_decode('Página ') . $this->PageNo() . '/{nb}', 0, 0, 'C');
                    }
                }
                //Solucion de error
                error_reporting(E_ALL & ~E_NOTICE);
                ini_set('display_errors', 0);
                ini_set('log_errors', 1);
                ob_end_clean();


                //Rubros
                $rubro = $_POST['buscar'];
                $seleccion = "SELECT * FROM emprendimientos p  INNER JOIN emprendedores e ON p.idemprendedor = e.id WHERE idrubro like '%$rubro%'";
                $res = mysqli_query($conex, $seleccion);
                // Creación del objeto de la clase heredada
                $pdf = new PDF();
                $pdf->AliasNbPages();
                $pdf->AddPage();
                $pdf->SetFont('Arial', '', 10);
                $pdf->Ln(10);

                while ($consulta = mysqli_fetch_array($res)) {
                    $pdf->Cell(160, -72, utf8_decode($consulta['idrubro']), 0, 0, 'C', 0);
                    $pdf->Ln(1);
                    $pdf->Cell(28, -10, utf8_decode($consulta['idemprendimiento']), 0, 0, 'C', 0);
                    $pdf->Cell(28, -10, utf8_decode($consulta['nfantasia']), 0, 0, 'C', 0);
                    $pdf->Cell(49, -10, utf8_decode($consulta['descripcion']), 0, 0, 'C', 0);
                    $pdf->Ln(0);
                    $pdf->Cell(240, -10, utf8_decode($consulta['idlocalidad']), 0, 0, 'C', 0);
                    $pdf->Ln(0);
                    $pdf->Cell(310, -10, utf8_decode($consulta['idemprendedor']), 0, 0, 'C', 0);
                    $pdf->Ln(0);
                    $pdf->Cell(360, -10, utf8_decode($consulta['apellido']), 0, 0, 'C', 0);
                }
                $pdf->Output();
            } else if(isset($_POST['informe'])){
                    require('controladores/pdf/fpdf.php');

                    class PDF extends FPDF
                    {
                        // Cabecera de página
                        function Header()
                        {
                            // Logo
                            $this->Image('controladores/pdf/recreoL.png', 180, 4, 20);
                            // Arial bold 15
                            $this->SetFont('Arial', 'B', 10);
                            // Movernos a la derecha
                            $this->Cell(80);
                            // Título
                            $this->Cell(30, 10, 'Lista Emprendedores', 0, 0, 'C');
                            // Salto de línea
                            $this->Ln(20);
                            //Titulo de celda
                            $this->Cell(28, 10, utf8_decode('N° REG'), 0, 0, 'C', 0);
                            $this->Cell(28, 10, utf8_decode('Nombres'), 0, 0, 'C', 0);
                            $this->Cell(50, 10, utf8_decode('Apellidos'), 0, 0, 'C', 0);
                            $this->Cell(28, 10, utf8_decode('DNI'), 0, 1, 'C', 0);
                            $this->Cell(310, -10, utf8_decode('Vec.Carnet'), 0, 0, 'C', 0);
                            $this->Ln(1);
                            $this->Cell(360, -12, utf8_decode('Celular'), 0, 0, 'C', 0);
                        }

                        // Pie de página
                        function Footer()
                        {
                            // Posición: a 1,5 cm del final
                            $this->SetY(-15);
                            // Arial italic 8
                            $this->SetFont('Arial', 'I', 8);
                            // Número de página
                            $timestamp = date_default_timezone_set("America/Argentina/Jujuy");
                            $format = "j-m-Y";
                            $this ->Cell (0,10,date($format, $timestamp = time()));
                            $this->Cell(0, 10, utf8_decode('Página ') . $this->PageNo() . '/{nb}', 0, 0, 'C');
                        }
                    }
                    //Solucion de error
                    error_reporting(E_ALL & ~E_NOTICE);
                    ini_set('display_errors', 0);
                    ini_set('log_errors', 1);
                    ob_end_clean();


                    //Rubros
                    $seleccion = "SELECT * FROM emprendedores";
                    $res = mysqli_query($conex, $seleccion);
                    // Creación del objeto de la clase heredada
                    $pdf = new PDF();
                    $pdf->AliasNbPages();
                    $pdf->AddPage();
                    $pdf->SetFont('Times', '', 10);
                    $pdf->Ln(10);

                    while ($consulta = mysqli_fetch_array($res)) {
                        $pdf->Cell(28, -10, utf8_decode($consulta['id']), 0, 0, 'C', 0);
            
                        $pdf->Cell(28, -10, utf8_decode($consulta['nombre']), 0, 0, 'C', 0);
                        $pdf->Cell(52, -10, utf8_decode($consulta['apellido']), 0, 0, 'C', 0);
                        $pdf->Cell(20, -10, utf8_decode($consulta['dni']), 0, 0, 'C', 0);
                        $pdf->Ln(0);
                        $pdf->Cell(310, -10, utf8_decode($consulta['vautorizacion']), 0, 0, 'C', 0);
                        $pdf->Ln(0);
                        $pdf->Cell(360, -10, utf8_decode($consulta['celular1']), 0, 0, 'C', 0);
                        $pdf->Ln(10);
                    }
                    $pdf->Output();
                } else if(isset($_POST['informeE'])){
                    require('controladores/pdf/fpdf.php');

                    class PDF extends FPDF
                    {
                        // Cabecera de página
                        function Header()
                        {
                            // Logo
                            $this->Image('controladores/pdf/recreoL.png', 180, 4, 20);
                            // Arial bold 15
                            $this->SetFont('Arial', 'B', 10);
                            // Movernos a la derecha
                            $this->Cell(80);
                            // Título
                            $this->Cell(30, 10, 'Lista Emprendimientos', 0, 0, 'C');
                            // Salto de línea
                            $this->Ln(20);
                            //Titulo de celda
                            $this->Cell(28, 10, utf8_decode('N° EMP'), 0, 0, 'C', 0);
                            $this->Cell(28, 10, utf8_decode('Nombre Empresa'), 0, 0, 'C', 0);
                            $this->Cell(50, 10, utf8_decode('Producto'), 0, 0, 'C', 0);
                            $this->Cell(28, 10, utf8_decode('Rubro'), 0, 1, 'C', 0);
                            $this->Cell(310, -10, utf8_decode('Localidad'), 0, 0, 'C', 0);
                            $this->Ln(1);
                            $this->Cell(360, -12, utf8_decode('N° REG'), 0, 0, 'C', 0);
                        }

                        // Pie de página
                        function Footer()
                        {
                            // Posición: a 1,5 cm del final
                            $this->SetY(-15);
                            // Arial italic 8
                            $this->SetFont('Arial', 'I', 8);
                            // Número de página
                            $timestamp = date_default_timezone_set("America/Argentina/Jujuy");
                            $format = "j-m-Y";
                            $this ->Cell (0,10,date($format, $timestamp = time()));
                            $this->Cell(0, 10, utf8_decode('Página ') . $this->PageNo() . '/{nb}', 0, 0, 'C');
                            
                            
                        }
                    }
                    //Solucion de error
                    error_reporting(E_ALL & ~E_NOTICE);
                    ini_set('display_errors', 0);
                    ini_set('log_errors', 1);
                    ob_end_clean();


                    //Rubros
                    $seleccion = "SELECT * FROM emprendimientos";
                    $res = mysqli_query($conex, $seleccion);
                    // Creación del objeto de la clase heredada
                    $pdf = new PDF();
                    $pdf->AliasNbPages();
                    $pdf->AddPage();
                    $pdf->SetFont('Times', '', 10);
                    $pdf->Ln(10);

                    while ($consulta = mysqli_fetch_array($res)) {
                        $pdf->Cell(28, -10, utf8_decode($consulta['idemprendimiento']), 0, 0, 'C', 0);
            
                        $pdf->Cell(28, -10, utf8_decode($consulta['nfantasia']), 0, 0, 'C', 0);
                        $pdf->Cell(52, -10, utf8_decode($consulta['descripcion']), 0, 0, 'C', 0);
                        $pdf->Cell(24, -10, utf8_decode($consulta['idrubro']), 0, 0, 'C', 0);
                        $pdf->Ln(0);
                        $pdf->Cell(310, -10, utf8_decode($consulta['idlocalidad']), 0, 0, 'C', 0);
                        $pdf->Ln(0);
                        $pdf->Cell(360, -10, utf8_decode($consulta['idemprendedor']), 0, 0, 'C', 0);
                        $pdf->Ln(10);
                    }
                    $pdf->Output();
                    
                }

            // }
            ?>
        </form>

    </main>
</body>

</html>