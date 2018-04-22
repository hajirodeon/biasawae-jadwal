<?php
//ambil nilai
require("../../inc/config.php");
require("../../inc/fungsi.php");
require("../../inc/koneksi.php");
require("../../inc/class/PHPExcel.php");


nocache;



//nilai
$swkd = nosql($_REQUEST['swkd']);
$tapelkd = nosql($_REQUEST['tapelkd']);
$kelkd = nosql($_REQUEST['kelkd']);
$smtkd = nosql($_REQUEST['smtkd']);



//terpilih
$qtpx = mysql_query("SELECT * FROM m_tapel ".
						"WHERE kd = '$tapelkd'");
$rowtpx = mysql_fetch_assoc($qtpx);
$tpx_thn1 = nosql($rowtpx['tahun1']);
$tpx_thn2 = nosql($rowtpx['tahun2']);
$tapelnya = "$tpx_thn1/$tpx_thn2";


//terpilih
$qbtx = mysql_query("SELECT * FROM m_kelas ".
						"WHERE kd = '$kelkd'");
$rowbtx = mysql_fetch_assoc($qbtx);
$btxkd = nosql($rowbtx['kd']);
$btxkelas = balikin($rowbtx['kelas']);
$btxruang = balikin($rowbtx['ruang']);
$kelasnya = "$btxkelas-$btxruang";




//terpilih
$qbtx = mysql_query("SELECT * FROM m_smt ".
						"WHERE kd = '$smtkd'");
$rowbtx = mysql_fetch_assoc($qbtx);
$btxkd = nosql($rowbtx['kd']);
$btxno = nosql($rowbtx['no']);
$btxsmt = balikin($rowbtx['smt']);
$smtnya = $btxsmt;





//nama file
$i_filename = "guru_mapel_kelas-$tapelnya-$kelasnya-$smtnya.xls";






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


$sheet = $objPHPExcel->setActiveSheetIndex(0)->setTitle('DataGuruMapelKelas');



///////////////////////////////////////////////////////// HALAMAN I //////////////////////////////////////////////////////////////////////
//atur lebar kolom
$sheet->getColumnDimension('A')->setWidth(5);
$sheet->getColumnDimension('B')->setWidth(30);
$sheet->getColumnDimension('C')->setWidth(40);

 
 //atur lebar baris
$sheet->getRowDimension('1')->setRowHeight(20);
$sheet->getRowDimension('2')->setRowHeight(20);
 
 
//header
$sheet->setCellValue('A1', 'DAFTAR GURU MAPEL KELAS');
$sheet->setCellValue('A2', 'Tahun Pelajaran '.$tapelnya.'. Kelas '.$kelasnya.'. Semester '.$smtnya.'.');
$sheet->mergeCells('A1:C1');
$sheet->getStyle("A1:C1")->getFont()->setSize(16)->setBold(true)->setName('Arial Narrow');
$sheet->getStyle('A1:C1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$sheet->mergeCells('A2:C2');
$sheet->getStyle("A2:C2")->getFont()->setSize(16)->setBold(true)->setName('Arial Narrow');
$sheet->getStyle('A2:C2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);





//header 
$sheet->setCellValue('A4', 'NO');
$sheet->setCellValue('B4', 'MATA PELAJARAN');
$sheet->setCellValue('C4', 'GURU');
$sheet->getStyle('A4')->applyFromArray( $style_header );
$sheet->getStyle('B4')->applyFromArray( $style_header );
$sheet->getStyle('C4')->applyFromArray( $style_header );








//datanya /////////////////////////////////////////////////////////////////////////////////////////////////
//data 
$qpel = mysql_query("SELECT m_guru_mapel.*, m_mapel.kode AS kkode ".
						"FROM m_guru_mapel, m_mapel ".
						"WHERE m_guru_mapel.kd_mapel = m_mapel.kd ".
						"AND m_guru_mapel.kd_tapel = '$tapelkd' ".
						"AND m_guru_mapel.kd_kelas = '$kelkd' ".
						"AND m_guru_mapel.kd_smt = '$smtkd' ".
						"AND m_guru_mapel.kd_member = '$swkd' ".
						"ORDER BY m_mapel.kode ASC");
$rpel = mysql_fetch_assoc($qpel);
$tpel = mysql_num_rows($qpel);



do
	{
	$i_no = $i_no + 1;
	$i_kd = nosql($rpel['kd']);
	$i_kkode = nosql($rpel['kkode']);
	$i_gurkd = nosql($rpel['kd_guru']);
	$i_mapelkd = nosql($rpel['kd_mapel']);

	
	//gurunya
	$qku2 = mysql_query("SELECT * FROM m_guru ".
						"WHERE kd = '$i_gurkd'");
	$rku2 = mysql_fetch_assoc($qku2);
	$ku2_kode = nosql($rku2['kode']);
	$ku2_nama = balikin($rku2['nama']);
	
	
	
	
	//mapelnya
	$qku = mysql_query("SELECT * FROM m_mapel ".
						"WHERE kd = '$i_mapelkd'");
	$rku = mysql_fetch_assoc($qku);
	$ku_mapel = balikin($rku['mapel']);
	

	$i_nox = $i_no + 4; 

	$sheet->setCellValue('A'.$i_nox.'', ''.$i_no.'');
	$sheet->getStyle('A'.$i_nox.'')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);
	$sheet->getStyle('A'.$i_nox.'')->applyFromArray( $style_data );
	$sheet->setCellValue('B'.$i_nox.'', ''.$ku_mapel.'');
	$sheet->getStyle('B'.$i_nox.'')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);
	$sheet->getStyle('B'.$i_nox.'')->applyFromArray( $style_data );
	$sheet->setCellValue('C'.$i_nox.'', ''.$ku2_kode.'. '.$ku2_nama.'');
	$sheet->getStyle('C'.$i_nox.'')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);
	$sheet->getStyle('C'.$i_nox.'')->applyFromArray( $style_data );
	}
while ($rpel = mysql_fetch_assoc($qpel));




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