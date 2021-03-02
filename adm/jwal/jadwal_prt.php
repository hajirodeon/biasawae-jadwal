<?php
///////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////
/////// SISFOKOL_SMP_v5.0_(PernahJaya)                          ///////
/////// (Sistem Informasi Sekolah untuk SMP)                    ///////
///////////////////////////////////////////////////////////////////////
/////// Dibuat oleh :                                           ///////
/////// Agus Muhajir, S.Kom                                     ///////
/////// URL 	:                                               ///////
///////     * http://omahbiasawae.com/                          ///////
///////     * http://sisfokol.wordpress.com/                    ///////
///////     * http://hajirodeon.wordpress.com/                  ///////
///////     * http://yahoogroup.com/groups/sisfokol/            ///////
///////     * http://yahoogroup.com/groups/linuxbiasawae/       ///////
/////// E-Mail	:                                               ///////
///////     * hajirodeon@yahoo.com                              ///////
///////     * hajirodeon@gmail.com                              ///////
/////// HP/SMS/WA : 081-829-88-54                               ///////
///////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////



//ambil nilai
require("../../inc/config.php");
require("../../inc/fungsi.php");
require("../../inc/koneksi.php");
$tpl = LoadTpl("../../template/print.html");



nocache;

//nilai
$filenya = "jadwal_prt.php";
$judul = "Jadwal Pelajaran per Kelas";
$judulku = $judul;
$tapelkd = nosql($_REQUEST['tapelkd']);
$smtkd = nosql($_REQUEST['smtkd']);
$kelkd = nosql($_REQUEST['kelkd']);
$s = nosql($_REQUEST['s']);



//PROSES ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//re-direct print...
$ke = "pel.php?tapelkd=$tapelkd&smtkd=$smtkd&kelkd=$kelkd";
$diload = "window.print();location.href='$ke'";
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



//isi *START
ob_start();



//view //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
xheadline($judul);

echo '<table width="1000" bgcolor="'.$warnaover.'" cellspacing="0" cellpadding="3">
<tr valign="top">
<td>
Tahun Pelajaran : ';
//terpilih
$qtpx = mysqli_query($koneksi, "SELECT * FROM m_tapel ".
						"WHERE kd = '$tapelkd'");
$rowtpx = mysqli_fetch_assoc($qtpx);
$tpx_kd = nosql($rowtpx['kd']);
$tpx_thn1 = nosql($rowtpx['tahun1']);
$tpx_thn2 = nosql($rowtpx['tahun2']);

echo '<strong>'.$tpx_thn1.'/'.$tpx_thn2.'</strong>,


Semester : ';
//terpilih
$qsmtx = mysqli_query($koneksi, "SELECT * FROM m_smt ".
						"WHERE kd = '$smtkd'");
$rowsmtx = mysqli_fetch_assoc($qsmtx);
$smtx_kd = nosql($rowsmtx['kd']);
$smtx_smt = nosql($rowsmtx['smt']);

echo '<strong>'.$smtx_smt.'</strong>
</td>
</tr>
</table>

<table bgcolor="'.$warna02.'" width="100%" border="0" cellspacing="0" cellpadding="3">
<tr>
<td>
Kelas : ';
//terpilih
$qbtx = mysqli_query($koneksi, "SELECT * FROM m_kelas ".
						"WHERE kd = '$kelkd'");
$rowbtx = mysqli_fetch_assoc($qbtx);
$btxkd = nosql($rowbtx['kd']);
$btxkelas = balikin($rowbtx['kelas']);
$btxruang = balikin($rowbtx['ruang']);

echo '<strong>'.$btxkelas.'-'.$btxruang.'</strong>
</td>
</tr>
</table>
<br>


<table width="100%" border="1" cellspacing="0" cellpadding="3">
<tr valign="top" bgcolor="'.$warnaheader.'">
<td width="3%">&nbsp;</td>';

//hari
$qhri = mysqli_query($koneksi, "SELECT * FROM m_hari ".
						"ORDER BY round(no) ASC");
$rhri = mysqli_fetch_assoc($qhri);

do
	{
	$hri_kd = nosql($rhri['kd']);
	$hri_hr = balikin($rhri['hari']);

	echo '<td><strong>'.$hri_hr.'</strong></td>';
	}
while ($rhri = mysqli_fetch_assoc($qhri));

echo '</tr>';


//jam
$qjm = mysqli_query($koneksi, "SELECT * FROM m_jam ".
						"ORDER BY round(jam) ASC");
$rjm = mysqli_fetch_assoc($qjm);

do
	{
	//nilai
	if ($warna_set ==0)
		{
		$warna = $warna01;
		$warna_set = 1;
		}
	else
		{
		$warna = $warna02;
		$warna_set = 0;
		}

	$jm_kd = nosql($rjm['kd']);
	$jm_jam = nosql($rjm['jam']);


	//hari
	$qhri = mysqli_query($koneksi, "SELECT * FROM m_hari ".
							"ORDER BY round(no) ASC");
	$rhri = mysqli_fetch_assoc($qhri);


	echo "<tr valign=\"top\" bgcolor=\"$warna\" onmouseover=\"this.bgColor='$warnaover';\" onmouseout=\"this.bgColor='$warna';\">";
	echo '<td width="3%"><strong>'.$jm_jam.'.</strong></td>';

	do
		{
		$hri_kd = nosql($rhri['kd']);
		$hri_hr = balikin($rhri['hari']);


		//datane...
		$qdte = mysqli_query($koneksi, "SELECT jadwal.kd AS jdkd, jadwal.kd_guru_mapel AS gpkd ".
								"FROM jadwal ".
								"WHERE jadwal.kd_tapel = '$tapelkd' ".
								"AND jadwal.kd_smt = '$smtkd' ".
								"AND jadwal.kd_kelas = '$kelkd' ".
								"AND jadwal.kd_jam = '$jm_kd' ".
								"AND jadwal.kd_hari = '$hri_kd'");
		$rdte = mysqli_fetch_assoc($qdte);
		$tdte = mysqli_num_rows($qdte);


		echo '<td width="16%">';

		do
			{
			$dte_kd = nosql($rdte['jdkd']);
			$dte_gpkd = nosql($rdte['gpkd']);




			//guru ne
			$qku1 = mysqli_query($koneksi, "SELECT * FROM m_guru_mapel ".
									"WHERE kd = '$dte_gpkd'");
			$rku1 = mysqli_fetch_assoc($qku1);
			$ku1_gurkd = nosql($rku1['kd_guru']);
			$ku1_progkd = nosql($rku1['kd_mapel']);


			//guru ne
			$qku2 = mysqli_query($koneksi, "SELECT * FROM m_guru ".
									"WHERE kd = '$ku1_gurkd'");
			$rku2 = mysqli_fetch_assoc($qku2);
			$dte_nip = nosql($rku2['kode']);
			$dte_nm = balikin($rku2['nama']);





			//pddkn
			$qcc2 = mysqli_query($koneksi, "SELECT mapel FROM m_mapel ".
									"WHERE kd = '$ku1_progkd'");
			$rcc2 = mysqli_fetch_assoc($qcc2);
			$dte_pel = balikin($rcc2['mapel']);



			//nek ada
			if ($tdte != 0)
				{
				echo '<strong>'.$dte_pel.'</strong>
				<br>
				<em>['.$dte_nip.']. '.$dte_nm.'.</em>
				<br>';
				}
			else
				{
				echo '-';
				}
			}
		while ($rdte = mysqli_fetch_assoc($qdte));

		echo '</td>';
		}
	while ($rhri = mysqli_fetch_assoc($qhri));

	echo '</tr>';
	}
while ($rjm = mysqli_fetch_assoc($qjm));

echo '</table>
</form>
<br>
<br>
<br>';
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


//isi
$isi = ob_get_contents();
ob_end_clean();


require("../../inc/niltpl.php");


//diskonek
xclose($koneksi);
exit();
?>