<?php 
include 'controladores/pdcdb.php';

$id = $_GET['id'];

$sql = $conex -> query("select * from emprendimientos where idemprendimiento= $id");

?>
    <input type="hidden" name="idd" value="<?=$_GET['id']?>">
        <?php 
        include 'controladores/modificar_emprendimientos.php';
        while($datos = $sql ->fetch_object()){ 
        require('controladores/pdcdb.php');
           
                $resultado = mysqli_query($conex, "SELECT * FROM emprendimientos");
                $con = mysqli_fetch_array($resultado);
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
                $id = $_GET['id'];
                $seleccion = "SELECT * FROM emprendimientos p  INNER JOIN emprendedores e ON p.idemprendedor = e.id where idemprendimiento= $id";
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
    
}
?>