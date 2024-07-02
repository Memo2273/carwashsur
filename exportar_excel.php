<?php
// Importar la librería PHPExcel
require_once 'Classes/PHPExcel.php';

// Obtener el totalValor enviado desde el formulario anterior
$totalValor = $_POST['totalValor'];

// Crear un nuevo objeto de la clase PHPExcel
$objPHPExcel = new PHPExcel();

// Establecer propiedades del archivo Excel
$objPHPExcel->getProperties()->setTitle("Arqueo de Caja");
$objPHPExcel->getProperties()->setSubject("Arqueo de Caja");
$objPHPExcel->getProperties()->setDescription("Arqueo de Caja");

// Crear una hoja de cálculo
$objPHPExcel->setActiveSheetIndex(0);
$sheet = $objPHPExcel->getActiveSheet();

// Establecer los encabezados de las columnas
$sheet->setCellValue('A1', 'Total Valor');
$sheet->setCellValue('B1', $totalValor);

// Establecer estilo para los encabezados
$sheet->getStyle('A1:B1')->getFont()->setBold(true);

// Ajustar el ancho de las columnas
$sheet->getColumnDimension('A')->setWidth(20);
$sheet->getColumnDimension('B')->setWidth(15);

// Guardar el archivo Excel
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('arqueo_caja.xlsx');

// Descargar el archivo Excel
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="arqueo_caja.xlsx"');
header('Cache-Control: max-age=0');

$objWriter->save('php://output');
?>
