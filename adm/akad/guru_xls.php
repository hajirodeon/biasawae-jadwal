<?php
//ambil nilai
require("../../inc/config.php");
require("../../inc/fungsi.php");
require("../../inc/koneksi.php");
require("../../inc/class/PHPExcel.php");


nocache;





//nama file
$i_filename = "guru.xls";






date_default_timezone_set("Asia/Jakarta");

$objPHPExcel = new PHPExcel();

// Set properties
$objPHPExcel->getProperties()->setCreator("$sek_nama")->setLastModifiedBy("$sek_nama");





//Mengeset Syle nya
$headerStylenya = new PHPExcel_Style();
$bodyStylenya = new PHPExcel_Style();

$headerStylenya->applyFromArray(
array('fill' => array(
'type' => PHPExcel_Style_Fill::FILL_SOLID,
'color' => array('argb' => 'FFEEEEEE')),
'borders' => array('bottom'=> array('style' => PHPExcel_Style_Border::BORDER_THIN),
'right' => array('style' => PHPExcel_Style_Border::BORDER_MEDIUM),
'left' => array('style' => PHPExcel_Style_Border::BORDER_THIN),
'top' => array('style' => PHPExcel_Style_Border::BORDER_THIN)
)
));

$bodyStylenya->applyFromArray(
array('fill' => array(
'type' => PHPExcel_Style_Fill::FILL_SOLID,
'color' => array('argb' => 'FFFFFFFF')),
'borders' => array(
'bottom' => array('style' => PHPExcel_Style_Border::BORDER_THIN),
'right' => array('style' => PHPExcel_Style_Border::BORDER_MEDIUM),
'left' => array('style' => PHPExcel_Style_Border::BORDER_THIN),
'top' => array('style' => PHPExcel_Style_Border::BORDER_THIN)
)
));




$default_border = array(
    'style' => PHPExcel_Style_Border::BORDER_THIN,
    'color' => array('rgb'=>'000000')
);
$style_header = array(
    'borders' => array(
        'bottom' => $default_border,
        'left' => $default_border,
        'top' => $default_border,
        'right' => $default_border,
    ),
    'fill' => array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'color' => array('rgb'=>'c9c9c9'),
    ),
    'font' => array(
        'bold' => true,
    )
);

$style_data = array(
    'borders' => array(
        'bottom' => $default_border,
        'left' => $default_border,
        'top' => $default_border,
        'right' => $default_border,
    ),
    'fill' => array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'color' => array('rgb'=>'fffff1'),
    ),
    'font' => array(
        'bold' => false,
    )
);


$sheet = $objPHPExcel->setActiveSheetIndex(0)->setTitle('DataGuru');



///////////////////////////////////////////////////////// HALAMAN I //////////////////////////////////////////////////////////////////////
//atur lebar kolom
$sheet->getColumnDimension('A')->setWidth(5);
$sheet->getColumnDimension('B')->setWidth(20);
$sheet->getColumnDimension('C')->setWidth(40);

 
 //atur lebar baris
$sheet->getRowDimension('1')->setRowHeight(20);
$sheet->getRowDimension('2')->setRowHeight(20);
 
 
//header
$sheet->setCellValue('A1', 'DAFTAR GURU DAN KODE');
$sheet->setCellValue('A2', ''.$sek_nama.'');
$sheet->mergeCells('A1:C1');
$sheet->getStyle("A1:C1")->getFont()->setSize(16)->setBold(true)->setName('Arial Narrow');
$sheet->getStyle('A1:C1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$sheet->mergeCells('A2:C2');
$sheet->getStyle("A2:C2")->getFont()->setSize(16)->setBold(true)->setName('Arial Narrow');
$sheet->getStyle('A2:C2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);



//header raport
$sheet->setCellValue('A5', 'KODE');
$sheet->setCellValue('B5', 'NIP');
$sheet->setCellValue('C5', 'NAMA');
$sheet->getStyle('A5')->applyFromArray( $style_header );
$sheet->getStyle('B5')->applyFromArray( $style_header );
$sheet->getStyle('C5')->applyFromArray( $style_header );








//datanya /////////////////////////////////////////////////////////////////////////////////////////////////
//data 
$qpel = mysqli_query($koneksi, "SELECT * FROM m_guru  ".
						"ORDER BY round(kode) ASC");
$rpel = mysqli_fetch_assoc($qpel);
$tpel = mysqli_num_rows($qpel);


//netralkan dahulu
$jk = 0;


do
	{
	$i_no = $i_no + 1;
	$i_kd = nosql($rpel['kd']);
	$i_kode = nosql($rpel['kode']);
	$i_nip = nosql($rpel['nip']);
	$i_nama = balikin($rpel['nama']);
			
	$i_nox = $i_no + 4; 

	$sheet->setCellValue('A'.$i_nox.'', ''.$i_kode.'');
	$sheet->getStyle('A'.$i_nox.'')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);
	$sheet->getStyle('A'.$i_nox.'')->applyFromArray( $style_data );
	$sheet->setCellValue('B'.$i_nox.'', ''.$i_nip.'');
	$sheet->getStyle('B'.$i_nox.'')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);
	$sheet->getStyle('B'.$i_nox.'')->applyFromArray( $style_data );
	$sheet->setCellValue('C'.$i_nox.'', ''.$i_nama.'');
	$sheet->getStyle('C'.$i_nox.'')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);
	$sheet->getStyle('C'.$i_nox.'')->applyFromArray( $style_data );
	}
while ($rpel = mysqli_fetch_assoc($qpel));




////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////





 

// Redirect output to a client’s web browser (Excel5)
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="'.$i_filename.'"');
header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed
header('Cache-Control: max-age=1');

// If you're serving to IE over SSL, then the following may be needed
header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
header ('Pragma: public'); // HTTP/1.0





$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->save('php://output');
exit;









//diskonek
xclose($koneksi);
exit();
?>