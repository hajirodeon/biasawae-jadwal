<?php
//ambil nilai
require("../../inc/config.php");
require("../../inc/fungsi.php");
require("../../inc/koneksi.php");
require("../../inc/class/PHPExcel.php");


nocache;



//nilai
$tapelkd = nosql($_REQUEST['tapelkd']);



//terpilih
$qtpx = mysqli_query($koneksi, "SELECT * FROM m_tapel ".
						"WHERE kd = '$tapelkd'");
$rowtpx = mysqli_fetch_assoc($qtpx);
$tpx_thn1 = nosql($rowtpx['tahun1']);
$tpx_thn2 = nosql($rowtpx['tahun2']);
$tapelnya = "$tpx_thn1/$tpx_thn2";




//nama file
$i_filename = "guru-mengajar-$tapelnya.xls";






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
$sheet->getColumnDimension('B')->setWidth(5);
$sheet->getColumnDimension('C')->setWidth(30);
$sheet->getColumnDimension('D')->setWidth(8);
$sheet->getColumnDimension('E')->setWidth(8);
$sheet->getColumnDimension('F')->setWidth(30);

 
 //atur lebar baris
$sheet->getRowDimension('1')->setRowHeight(20);
$sheet->getRowDimension('2')->setRowHeight(20);
 
 
//header
$sheet->setCellValue('A1', 'PENEMPATAN GURU MENGAJAR');
$sheet->setCellValue('A2', 'Tahun Pelajaran '.$tapelnya.'');
$sheet->mergeCells('A1:F1');
$sheet->getStyle("A1:F1")->getFont()->setSize(16)->setBold(true)->setName('Arial Narrow');
$sheet->getStyle('A1:F1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$sheet->mergeCells('A2:F2');
$sheet->getStyle("A2:F2")->getFont()->setSize(16)->setBold(true)->setName('Arial Narrow');
$sheet->getStyle('A2:F2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);





//header 
$sheet->setCellValue('A4', 'NO');
$sheet->setCellValue('B4', 'KODE');
$sheet->setCellValue('C4', 'GURU');
$sheet->setCellValue('D4', 'SMT');
$sheet->setCellValue('E4', 'KELAS');
$sheet->setCellValue('F4', 'MATA PELAJARAN');
$sheet->getStyle('A4')->applyFromArray( $style_header );
$sheet->getStyle('B4')->applyFromArray( $style_header );
$sheet->getStyle('C4')->applyFromArray( $style_header );
$sheet->getStyle('D4')->applyFromArray( $style_header );
$sheet->getStyle('E4')->applyFromArray( $style_header );
$sheet->getStyle('F4')->applyFromArray( $style_header );








//datanya /////////////////////////////////////////////////////////////////////////////////////////////////
//pel-nya
$quru = mysqli_query($koneksi, "SELECT m_guru.kode AS gkode, ".
						"m_guru.nama AS gnama, ".
						"m_guru_mapel.* ".
						"FROM m_guru, m_guru_mapel ".
						"WHERE m_guru_mapel.kd_guru = m_guru.kd ".
						"AND m_guru_mapel.kd_tapel = '$tapelkd' ".
						"ORDER BY m_guru.kode ASC");
$ruru = mysqli_fetch_assoc($quru);


do
	{
	$i_no = $i_no + 1;
	$i_nox = $i_no + 4; 

	$ku2_kode = nosql($ruru['gkode']);
	$ku2_nama = balikin($ruru['gnama']);
		
	$gkd = nosql($ruru['kd']);
	$gkd_smt = nosql($ruru['kd_smt']);
	$gkd_kelas = nosql($ruru['kd_kelas']);
	$gkd_mapel = nosql($ruru['kd_mapel']);

	//smt
	$qku = mysqli_query($koneksi, "SELECT * FROM m_smt ".
						"WHERE kd = '$gkd_smt'");
	$rku = mysqli_fetch_assoc($qku);
	$gsmt = balikin($rku['smt']);

	//mapel
	$q1 = mysqli_query($koneksi, "SELECT * FROM m_mapel ".
						"WHERE kd = '$gkd_mapel'");
	$r1 = mysqli_fetch_assoc($q1);
	$gpel = balikin($r1['mapel']);


	//kelas
	$q2 = mysqli_query($koneksi, "SELECT * FROM m_kelas ".
						"WHERE kd = '$gkd_kelas'");
	$r2 = mysqli_fetch_assoc($q2);
	$gkelas = balikin($r2['kelas']);
	$gruang = balikin($r2['ruang']);


	$sheet->setCellValue('A'.$i_nox.'', ''.$i_no.'');
	$sheet->getStyle('A'.$i_nox.'')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);
	$sheet->getStyle('A'.$i_nox.'')->applyFromArray( $style_data );
	$sheet->setCellValue('B'.$i_nox.'', ''.$ku2_kode.'');
	$sheet->getStyle('B'.$i_nox.'')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);
	$sheet->getStyle('B'.$i_nox.'')->applyFromArray( $style_data );
	$sheet->setCellValue('C'.$i_nox.'', ''.$ku2_nama.'');
	$sheet->getStyle('C'.$i_nox.'')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);
	$sheet->getStyle('C'.$i_nox.'')->applyFromArray( $style_data );
	
	$sheet->setCellValue('D'.$i_nox.'', ''.$gsmt.'');
	$sheet->getStyle('D'.$i_nox.'')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);
	$sheet->getStyle('D'.$i_nox.'')->applyFromArray( $style_data );
	
	$sheet->setCellValue('E'.$i_nox.'', ''.$gkelas.'/'.$gruang.'');
	$sheet->getStyle('E'.$i_nox.'')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);
	$sheet->getStyle('E'.$i_nox.'')->applyFromArray( $style_data );
	
	$sheet->setCellValue('F'.$i_nox.'', ''.$gpel.'');
	$sheet->getStyle('F'.$i_nox.'')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);
	$sheet->getStyle('F'.$i_nox.'')->applyFromArray( $style_data );
	}
while ($ruru = mysqli_fetch_assoc($quru));
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