<?php 
include 'controladores/pdcdb.php';

$id = $_GET['id'];

$sql = $conex -> query("select * from emprendedores where id= $id");

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
                        $this->SetFont('Arial', 'B', 11);
                        // Movernos a la derecha
                        $this->Cell(80);
                        // Título
                        $this->Cell(28, 10, 'Carnet habilitante Municipalidad de Recreo', 0, 0, 'C');
                        $this->Ln(10);
                        $this->Cell(38, 10, utf8_decode('N° Reg Emprendedor'), 0, 0, 'C', 0);
                        // Salto de línea
                        $this->Ln(10);
                        //Titulo de celda
                        $this->Cell(38, 10, utf8_decode('Apellido'), 0, 0, 'C', 0);
                        $this->Ln(10);
                        $this->Cell(38, 10, utf8_decode('Nombre'), 0, 0, 'C', 0);
                        $this->Ln(10);
                        $this->Cell(38, 10, utf8_decode('Localidad'), 0, 0, 'C', 0);
                        $this->Ln(10);
                        $this->Cell(38, 10, utf8_decode('DNI'), 0, 1, 'C', 0);
                        $this->Ln(1);
                        $this->Cell(38, 8, utf8_decode('Venc.Carnet'), 0, 0, 'C', 0);
                        $this->Ln(8);
                        $this->Cell(230, -106, utf8_decode('N° Emprendimiento'), 0, 0, 'C', 0);
                        $this->Ln(10);
                        $this->Cell(230, -106, utf8_decode('Nombre EMP'), 0, 0, 'C', 0);
                        $this->Ln(10);
                        $this->Cell(230, -106, utf8_decode('Rubro'), 0, 0, 'C', 0);
                        $this->Ln(10);
                        $this->Cell(230, -106, utf8_decode('Descripción'), 0, 0, 'C', 0);
                    }

                    // Pie de página
                  
                }
                //Solucion de error
                error_reporting(E_ALL & ~E_NOTICE);
                ini_set('display_errors', 0);
                ini_set('log_errors', 1);
                ob_end_clean();


                //Rubros
                $rubro = $_POST['buscar'];
                $id = $_GET['id'];
                $seleccion = "SELECT * FROM emprendimientos p  INNER JOIN emprendedores e ON p.idemprendedor = e.id where idemprendedor= $id";
                $res = mysqli_query($conex, $seleccion);
                // Creación del objeto de la clase heredada
                $pdf = new PDF();
                $pdf->AliasNbPages();
                $pdf->AddPage();
                $pdf->SetFont('Arial', '', 10);
                $pdf ->Image('controladores/pdf/firma.PNG', 130, 60, 43);
                $pdf->Ln(0);

                while ($consulta = mysqli_fetch_array($res)) {
                    $pdf->Cell(86, -167, utf8_decode($consulta['idemprendedor']), 0, 0, 'C', 0);
                    $pdf->Ln(10);
                    $pdf->Cell(86, -167, utf8_decode($consulta['apellido']), 0, 0, 'C', 0);
                    $pdf->Ln(10);
                    $pdf->Cell(86, -167, utf8_decode($consulta['nombre']), 0, 0, 'C', 0);
                    $pdf->Ln(10);
                    $pdf->Cell(86, -167, utf8_decode($consulta['idlocalidad']), 0, 0, 'C', 0);
                    $pdf->Ln(10);
                    $pdf->Cell(86, -167, utf8_decode($consulta['dni']), 0, 0, 'C', 0);
                    $pdf->Ln(10);
                    $pdf->Cell(86, -167, utf8_decode($consulta['vautorizacion']), 0, 0, 'C', 0);
                    $pdf->Ln(1);
                    $pdf->Cell(290, -267, utf8_decode($consulta['idemprendimiento']), 0, 0, 'C', 0);
                    $pdf->Ln(10);
                    $pdf->Cell(290, -267, utf8_decode($consulta['nfantasia']), 0, 0, 'C', 0);
                    $pdf->Ln(10);
                    $pdf->Cell(290, -267, utf8_decode($consulta['idrubro']), 0, 0, 'C', 0);
                    $pdf->Ln(10);
                    $pdf->Cell(290, -267, utf8_decode($consulta['descripcion']), 0, 0, 'C', 0);
                }
                $pdf->Output();
    
}
?>