<?php
                if (isset($_POST['informe'])) {

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
                            $this->Cell(-100, 10, 'Lista Emprendedores', 0, 0, 'C');
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
                        $pdf->Cell(160, -72, utf8_decode($consulta['idemprendedor']), 0, 0, 'C', 0);
                        $pdf->Ln(1);
                        $pdf->Cell(28, -10, utf8_decode($consulta['apellido']), 0, 0, 'C', 0);
                        $pdf->Cell(28, -10, utf8_decode($consulta['nombre']), 0, 0, 'C', 0);
                        $pdf->Cell(49, -10, utf8_decode($consulta['dni']), 0, 0, 'C', 0);
                        $pdf->Ln(0);
                        $pdf->Cell(240, -10, utf8_decode($consulta['vautorizacion']), 0, 0, 'C', 0);
                        $pdf->Ln(0);
                        $pdf->Cell(310, -10, utf8_decode($consulta['celular1']), 0, 0, 'C', 0);
                        $pdf->Ln(0);
                    }
                    $pdf->Output();
                }

                ?>
