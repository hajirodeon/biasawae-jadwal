<?php
//ambil nilai
require("../../inc/config.php");
require("../../inc/fungsi.php");
require("../../inc/koneksi.php");
require("../../inc/class/PHPExcel.php");


nocache;





//nilai
$tapelkd = nosql($_REQUEST['tapelkd']);
$smtkd = nosql($_REQUEST['smtkd']);
$gurkd = nosql($_REQUEST['gurkd']);



//terpilih
$qtpx = mysql_query("SELECT * FROM m_tapel ".
						"WHERE kd = '$tapelkd'");
$rowtpx = mysql_fetch_assoc($qtpx);
$tpx_thn1 = nosql($rowtpx['tahun1']);
$tpx_thn2 = nosql($rowtpx['tahun2']);
$tapelnya = "$tpx_thn1/$tpx_thn2";


//terpilih
$qbtx = mysql_query("SELECT * FROM m_guru ".
						"WHERE kd = '$gurkd'");
$rowbtx = mysql_fetch_assoc($qbtx);
$btxkode = balikin($rowbtx['kode']);
$btxnama = balikin($rowbtx['nama']);




//terpilih
$qbtx = mysql_query("SELECT * FROM m_smt ".
						"WHERE kd = '$smtkd'");
$rowbtx = mysql_fetch_assoc($qbtx);
$btxkd = nosql($rowbtx['kd']);
$btxno = nosql($rowbtx['no']);
$btxsmt = balikin($rowbtx['smt']);
$smtnya = $btxsmt;





//nama file
$i_filename = "guru-$tapelnya-$smtnya.xls";





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





//bikin sheet lagi, jika dua mapel
$qjw = mysql_query("SELECT DISTINCT(m_mapel.kd) AS progkd ".
						"FROM jadwal, m_guru_mapel, m_guru, m_mapel, m_kelas ".
						"WHERE jadwal.kd_kelas = m_kelas.kd ".
						"AND jadwal.kd_guru_mapel = m_guru_mapel.kd ".
						"AND m_guru_mapel.kd_guru = m_guru.kd ".
						"AND m_guru_mapel.kd_mapel = m_mapel.kd ".
						"AND m_guru.kd = '$gurkd' ".
						"AND jadwal.kd_tapel = '$tapelkd' ".
						"AND jadwal.kd_smt = '$smtkd' ".
						"ORDER BY m_kelas.no ASC, ".
						"round(m_mapel.kode) ASC");
$rjw = mysql_fetch_assoc($qjw);
$tjw = mysql_num_rows($qjw);



$sheet = $objPHPExcel->getActiveSheet();

do
	{
	//nilai
	$i_no = $i_no + 1;
	$i_progkd = nosql($rjw['progkd']);
	
	//detail e
	$qku = mysql_query("SELECT * FROM m_mapel ".
							"WHERE kd = '$i_progkd'");
	$rku = mysql_fetch_assoc($qku);
	$ku_kode = nosql($rku['kode']);
	
	
	// Add new sheet
	$objWorkSheet = $objPHPExcel->createSheet($ku_kode);	
    $objWorkSheet->setTitle($ku_kode);
	
	
	$sheet = $objPHPExcel->setActiveSheetIndex($i_no);

	
	///////////////////////////////////////////////////////// HALAMAN I //////////////////////////////////////////////////////////////////////
	//atur lebar kolom
	$sheet->getColumnDimension('A')->setWidth(15);
	 
	 //atur lebar baris
	$sheet->getRowDimension('1')->setRowHeight(20);
	
	
	 
	 
	//header
	$sheet->setCellValue('A1', 'JADWAL MENGAJAR SEMESTER : '.$smtnya.', TAHUN PELAJARAN : '.$tapelnya.'');
	$sheet->mergeCells('A1:D1');
	$sheet->getStyle("A1:D1")->getFont()->setSize(12)->setBold(true)->setName('Arial Narrow');
	$sheet->getStyle('A1:D1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
	
	
	
	//header 
	$sheet->setCellValue('A2', 'NAMA');
	$sheet->setCellValue('A3', 'KODE MAPEL');
	$sheet->setCellValue('A4', 'KODE GURU');
	$sheet->setCellValue('A5', 'JUMLAH JAM');
	
	$sheet->setCellValue('B2', ': ');
	$sheet->setCellValue('B3', ': ');
	$sheet->setCellValue('B4', ': ');
	$sheet->setCellValue('B5', ': ');
	
	
	$sheet->setCellValue('A6', 'HARI');
	$sheet->setCellValue('B6', 'JAM');
	$sheet->setCellValue('C6', 'WAKTU');
	$sheet->setCellValue('D6', 'KELAS');
	$sheet->getStyle('A6:D6')->applyFromArray( $style_header );
	
	
	
	
	//hari
	$qhri = mysql_query("SELECT * FROM m_hari ".
							"ORDER BY round(no) ASC");
	$rhri = mysql_fetch_assoc($qhri);
	$thri = mysql_num_rows($qhri);
	
	do
		{
		//nilai
		$hri_no = $hri_no + 1;
		$hri_kd = nosql($rhri['kd']);
		$hri_hr = balikin($rhri['hari']);
		
		$hri_nox = $hri_no + 6;
		
		$hri_nox2 = $arrrkoloma[$hri_nox];
	
		for ($k=1;$k<=12;$k++)
			{
//			$barisku = ($thri * ($k)) + (6 + $k) - $thri;
			$barisku = ($hri_no * 12) - 5;
			$barisku2 = $barisku + 11;
	
			$sheet->setCellValue('A'.$barisku.'', ''.$hri_hr.'');	
			$sheet->mergeCells('A'.$barisku.':A'.$barisku2.'');
			$sheet->getStyle('A'.$barisku.':A'.$barisku2.'')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);
			$sheet->getStyle('A'.$barisku.':A'.$barisku2.'')->applyFromArray( $style_data );
			}	


/*		
		
		for ($k=1;$k<=12;$k++)
			{
			$barisku = 6 + $k;
		
			
			//datane waktu
			$qdte = mysql_query("SELECT * FROM m_waktu ".
									"WHERE no_urut = '$k' ".
									"AND kd_hari = '$hri_kd'");
			$rdte = mysql_fetch_assoc($qdte);
			$tdte = mysql_num_rows($qdte);
			$dte_jkd = balikin($rdte['kd_jam']);
			$dte_waktu = balikin($rdte['waktu']);
			$dte_ket = balikin($rdte['ket']);
	
	
	
			
			//jika ada, ket
			if (!empty($dte_ket))
				{
				$sheet->setCellValue(''.$hri_nox2.''.$barisku.'', ''.$dte_waktu.' '.$dte_ket.'');
				$sheet->getStyle(''.$hri_nox2.''.$barisku.'')->getAlignment()->setWrapText(true);
				$sheet->getStyle(''.$hri_nox2.''.$barisku.'')->applyFromArray( $style_header );
				$sheet->getStyle(''.$hri_nox2.''.$barisku.'')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);
				}
			else
				{
				//munculkan mapel gurunya...
				//datane...
				$qdte2 = mysql_query("SELECT jadwal.kd AS jdkd, jadwal.kd_guru_mapel AS gpkd ".
										"FROM jadwal ".
										"WHERE jadwal.kd_tapel = '$tapelkd' ".
										"AND jadwal.kd_smt = '$smtkd' ".
	//									"AND jadwal.kd_kelas = '$kelkd' ".
										"AND jadwal.kd_jam = '$dte_jkd' ".
										"AND jadwal.kd_hari = '$hri_kd'");
				$rdte2 = mysql_fetch_assoc($qdte2);
				$tdte2 = mysql_num_rows($qdte2);
				$dte_kd = nosql($rdte2['jdkd']);
				$dte_gpkd = nosql($rdte2['gpkd']);
	
	
	
				//guru ne
				$qku1 = mysql_query("SELECT * FROM m_guru_mapel ".
										"WHERE kd = '$dte_gpkd'");
				$rku1 = mysql_fetch_assoc($qku1);
				$ku1_gurkd = nosql($rku1['kd_guru']);
				$ku1_progkd = nosql($rku1['kd_mapel']);
	
	
				//guru ne
				$qku2 = mysql_query("SELECT * FROM m_guru ".
										"WHERE kd = '$ku1_gurkd'");
				$rku2 = mysql_fetch_assoc($qku2);
				$ku2_kode = nosql($rku2['kode']);
				$ku2_nip = balikin($rku2['nip']);
				$ku2_nama = balikin($rku2['nama']);
				
	
	
				//jam ke-
				$qcc3 = mysql_query("SELECT * FROM m_jam ".
										"WHERE kd = '$dte_jkd'");
				$rcc3 = mysql_fetch_assoc($qcc3);
				$dte3_jam = nosql($rcc3['jam']);
	
			
			
			
	
				//pddkn
				$qcc2 = mysql_query("SELECT * FROM m_mapel ".
										"WHERE kd = '$ku1_progkd'");
				$rcc2 = mysql_fetch_assoc($qcc2);
				$dte_kode = nosql($rcc2['kode']);
				$dte_pel = balikin($rcc2['mapel']);
	
				
				
				//jika gak null
				if (!empty($dte3_jam))
					{
					$nilho = "Jam ke-$dte3_jam [$dte_waktu]. $dte_kode $ku2_kode";				
					$sheet->setCellValue(''.$hri_nox2.''.$barisku.'', ''.$nilho.'');
					$sheet->getStyle(''.$hri_nox2.''.$barisku.'')->getAlignment()->setWrapText(true);
					$sheet->getStyle(''.$hri_nox2.''.$barisku.'')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);
					$sheet->getStyle(''.$hri_nox2.''.$barisku.'')->applyFromArray( $style_data );
					
	//				$sheet->setCellValue('A'.$hri_nox.'', ''.$hri_hr.'');
	//				$sheet->getStyle('A'.$hri_nox.'')->applyFromArray( $style_header );				
					}
				}
			}
	*/
	
	
		}
	while ($rhri = mysql_fetch_assoc($qhri));
	
	
	//netralkan
	$hri_no = "";
	
	
	
	}
while ($rjw = mysql_fetch_assoc($qjw)); 





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