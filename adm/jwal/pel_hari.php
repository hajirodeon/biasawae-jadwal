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



session_start();

require("../../inc/config.php");
require("../../inc/fungsi.php");
require("../../inc/koneksi.php");
require("../../inc/cek/adm.php");
$tpl = LoadTpl("../../template/index.html");

nocache;

//nilai
$filenya = "pel_hari.php";
$judul = "Jadwal Pelajaran per Hari";
$judulku = "[$adm_session] ==> $judul";
$judulx = $judul;
$tapelkd = nosql($_REQUEST['tapelkd']);
$smtkd = nosql($_REQUEST['smtkd']);
$hrkd = nosql($_REQUEST['hrkd']);
$s = nosql($_REQUEST['s']);






//focus
if (empty($tapelkd))
	{
	$diload = "document.formx.tapel.focus();";
	}
else if (empty($smtkd))
	{
	$diload = "document.formx.smt.focus();";
	}
else if (empty($hrkd))
	{
	$diload = "document.formx.hari.focus();";
	}




//PROSES ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//nek baru
if ($_POST['btnBR'])
	{
	//nilai
	$tapelkd = nosql($_POST['tapelkd']);
	$smtkd = nosql($_POST['smtkd']);
	$hrkd = nosql($_POST['hrkd']);

	//diskonek
	xfree($qbw);
	xclose($koneksi);

	//re-direct
	$ke = "pel_hari_entry.php?tapelkd=$tapelkd&smtkd=$smtkd&hrkd=$hrkd";
	xloc($ke);
	exit();
	}




//nek null-kan
if ($_POST['btnNUL'])
	{
	//nilai
	$tapelkd = nosql($_POST['tapelkd']);
	$smtkd = nosql($_POST['smtkd']);
	$hrkd = nosql($_POST['hrkd']);

	//query
	mysqli_query($koneksi, "DELETE FROM jadwal ".
					"WHERE kd_tapel = '$tapelkd' ".
					"AND kd_smt = '$smtkd' ".
					"AND kd_hari = '$hrkd'");

	//diskonek
	xfree($qbw);
	xclose($koneksi);

	//re-direct
	$ke = "$filenya?tapelkd=$tapelkd&smtkd=$smtkd&hrkd=$hrkd";
	xloc($ke);
	exit();
	}





//nek hapus
if ($s == "hapus")
	{
	//nilai
	$tapelkd = nosql($_REQUEST['tapelkd']);
	$smtkd = nosql($_REQUEST['smtkd']);
	$hrkd = nosql($_REQUEST['hrkd']);
	$kd = nosql($_REQUEST['kd']);

	//query
	mysqli_query($koneksi, "DELETE FROM jadwal ".
			"WHERE kd = '$kd'");

	//diskonek
	xfree($qbw);
	xclose($koneksi);

	//re-direct
	$ke = "$filenya?tapelkd=$tapelkd&smtkd=$smtkd&hrkd=$hrkd";
	xloc($ke);
	exit();
	}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



//isi *START
ob_start();

//menu
require("../../inc/menu/adm.php");

//isi_menu
$isi_menu = ob_get_contents();
ob_end_clean();





//isi *START
ob_start();

//js
require("../../inc/js/jumpmenu.js");
require("../../inc/js/swap.js");
xheadline($judul);

//view //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
echo '<form action="'.$filenya.'" method="post" name="formx">
<table width="100%" bgcolor="'.$warnaover.'" cellspacing="0" cellpadding="3">
<tr valign="top">
<td>
Tahun Pelajaran : ';
echo "<select name=\"tapel\" onChange=\"MM_jumpMenu('self',this,0)\">";

//terpilih
$qtpx = mysqli_query($koneksi, "SELECT * FROM m_tapel ".
						"WHERE kd = '$tapelkd'");
$rowtpx = mysqli_fetch_assoc($qtpx);
$tpx_kd = nosql($rowtpx['kd']);
$tpx_thn1 = nosql($rowtpx['tahun1']);
$tpx_thn2 = nosql($rowtpx['tahun2']);

echo '<option value="'.$tpx_kd.'">'.$tpx_thn1.'/'.$tpx_thn2.'</option>';

$qtp = mysqli_query($koneksi, "SELECT * FROM m_tapel ".
						"WHERE kd <> '$tapelkd' ".
						"ORDER BY tahun1 ASC");
$rowtp = mysqli_fetch_assoc($qtp);

do
	{
	$tpkd = nosql($rowtp['kd']);
	$tpth1 = nosql($rowtp['tahun1']);
	$tpth2 = nosql($rowtp['tahun2']);

	echo '<option value="'.$filenya.'?tapelkd='.$tpkd.'">'.$tpth1.'/'.$tpth2.'</option>';
	}
while ($rowtp = mysqli_fetch_assoc($qtp));

echo '</select>,

Semester : ';
echo "<select name=\"smt\" onChange=\"MM_jumpMenu('self',this,0)\">";

//terpilih
$qsmtx = mysqli_query($koneksi, "SELECT * FROM m_smt ".
						"WHERE kd = '$smtkd'");
$rowsmtx = mysqli_fetch_assoc($qsmtx);
$smtx_kd = nosql($rowsmtx['kd']);
$smtx_smt = nosql($rowsmtx['smt']);

echo '<option value="'.$smtx_kd.'">'.$smtx_smt.'</option>';

$qsmt = mysqli_query($koneksi, "SELECT * FROM m_smt ".
						"WHERE kd <> '$smtkd' ".
						"ORDER BY smt ASC");
$rowsmt = mysqli_fetch_assoc($qsmt);

do
	{
	$smt_kd = nosql($rowsmt['kd']);
	$smt_smt = nosql($rowsmt['smt']);

	echo '<option value="'.$filenya.'?tapelkd='.$tapelkd.'&smtkd='.$smt_kd.'">'.$smt_smt.'</option>';
	}
while ($rowsmt = mysqli_fetch_assoc($qsmt));

echo '</select>,


Hari : ';
echo "<select name=\"hari\" onChange=\"MM_jumpMenu('self',this,0)\">";

//terpilih
$qbtx = mysqli_query($koneksi, "SELECT * FROM m_hari ".
			"WHERE kd = '$hrkd'");
$rowbtx = mysqli_fetch_assoc($qbtx);
$btxkd = nosql($rowbtx['kd']);
$btxkelas = balikin($rowbtx['hari']);

echo '<option value="'.$btxkd.'">'.$btxkelas.'</option>';

$qbt = mysqli_query($koneksi, "SELECT * FROM m_hari ".
			"WHERE kd <> '$hrkd'");
$rowbt = mysqli_fetch_assoc($qbt);

do
	{
	$btkd = nosql($rowbt['kd']);
	$btkelas = balikin($rowbt['hari']);

	echo '<option value="'.$filenya.'?tapelkd='.$tapelkd.'&smtkd='.$smtkd.'&hrkd='.$btkd.'">'.$btkelas.'</option>';
	}
while ($rowbt = mysqli_fetch_assoc($qbt));

echo '</select>

<input name="tapelkd" type="hidden" value="'.$tapelkd.'">
<input name="smtkd" type="hidden" value="'.$smtkd.'">
<input name="hrkd" type="hidden" value="'.$hrkd.'">
</td>
</tr>
</table>
<br>';

//cek
if (empty($tapelkd))
	{
	echo '<p>
	<strong><font color="#FF0000">TAHUN PELAJARAN Belum Dipilih...!</font></strong>
	</p>';
	}
else if (empty($smtkd))
	{
	echo '<p>
	<strong><font color="#FF0000">SEMESTER Belum Dipilih...!</font></strong>
	</p>';
	}

else if (empty($hrkd))
	{
	echo '<p>
	<strong><font color="#FF0000">HARI Belum Dipilih...!</font></strong>
	</p>';
	}
else
	{
	echo '<input name="tapelkd" type="hidden" value="'.$tapelkd.'">
	<input name="smtkd" type="hidden" value="'.$smtkd.'">

	<input name="hrkd" type="hidden" value="'.$hrkd.'">
	<input name="btnBR" type="submit" value="BARU">
	<input name="btnNUL" type="submit" value="KOSONGKAN">

	[<a href="pel_hari_xls.php?tapelkd='.$tapelkd.'&smtkd='.$smtkd.'&hrkd='.$hrkd.'" title="Print . . ."><img src="'.$sumber.'/img/xls.gif" width="16" height="16" border="0"></a>].

	<table width="100%" border="1" cellspacing="0" cellpadding="3">
	<tr valign="top" bgcolor="'.$warnaheader.'">
	<td width="3%">&nbsp;</td>';

	//kelas
	$qhri = mysqli_query($koneksi, "SELECT * FROM m_kelas ".
							"ORDER BY no ASC, ".
							"kelas ASC, ".
							"ruang ASC");
	$rhri = mysqli_fetch_assoc($qhri);

	do
		{
		$hri_kd = nosql($rhri['kd']);
		$hri_hr = balikin($rhri['kelas']);
		$hri_ru = balikin($rhri['ruang']);

		echo '<td><strong>'.$hri_hr.'-'.$hri_ru.'</strong></td>';
		}
	while ($rhri = mysqli_fetch_assoc($qhri));

	echo '</tr>';


	for ($k=1;$k<=12;$k++)
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


		//hari
		$qhri = mysqli_query($koneksi, "SELECT * FROM m_hari ".
								"ORDER BY round(no) ASC");
		$rhri = mysqli_fetch_assoc($qhri);


		echo "<tr valign=\"top\" bgcolor=\"$warna\" onmouseover=\"this.bgColor='$warnaover';\" onmouseout=\"this.bgColor='$warna';\">";
		echo '<td><strong>'.$k.'.</strong></td>';

		do
			{
			$hri_kd = nosql($rhri['kd']);
			$hri_hr = balikin($rhri['hari']);




			//datane waktu
			$qdte = mysqli_query($koneksi, "SELECT * FROM m_waktu ".
									"WHERE no_urut = '$k' ".
									"AND kd_hari = '$hri_kd'");
			$rdte = mysqli_fetch_assoc($qdte);
			$tdte = mysqli_num_rows($qdte);
			$dte_jkd = balikin($rdte['kd_jam']);
			$dte_waktu = balikin($rdte['waktu']);
			$dte_ket = balikin($rdte['ket']);



			
			//jika ada, ket
			if (!empty($dte_ket))
				{
				echo '<td bgcolor="red">
				<b>'.$dte_waktu.'</b>
				<br>
				'.$dte_ket.'
				</td>';
				}
			else
				{
				//munculkan mapel gurunya...
				//datane...
				$qdte2 = mysqli_query($koneksi, "SELECT jadwal.kd AS jdkd, jadwal.kd_guru_mapel AS gpkd ".
										"FROM jadwal ".
										"WHERE jadwal.kd_tapel = '$tapelkd' ".
										"AND jadwal.kd_smt = '$smtkd' ".
										"AND jadwal.kd_kelas = '$kelkd' ".
										"AND jadwal.kd_jam = '$dte_jkd' ".
										"AND jadwal.kd_hari = '$hri_kd'");
				$rdte2 = mysqli_fetch_assoc($qdte2);
				$tdte2 = mysqli_num_rows($qdte2);
				$dte_kd = nosql($rdte2['jdkd']);
				$dte_gpkd = nosql($rdte2['gpkd']);



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
				$ku2_kode = nosql($rku2['kode']);
				$ku2_nip = balikin($rku2['nip']);
				$ku2_nama = balikin($rku2['nama']);
				


				//jam ke-
				$qcc3 = mysqli_query($koneksi, "SELECT * FROM m_jam ".
										"WHERE kd = '$dte_jkd'");
				$rcc3 = mysqli_fetch_assoc($qcc3);
				$dte3_jam = nosql($rcc3['jam']);

			
			
			

				//pddkn
				$qcc2 = mysqli_query($koneksi, "SELECT mapel FROM m_mapel ".
										"WHERE kd = '$ku1_progkd'");
				$rcc2 = mysqli_fetch_assoc($qcc2);
				$dte_pel = balikin($rcc2['mapel']);

				
				echo '<td>
				<b>Jam ke-'.$dte3_jam.' ['.$dte_waktu.'].</b>
				<br>
				
				<strong>'.$dte_pel.'</strong>
				<br>
				<em>['.$ku2_kode.']. '.$ku2_nama.'.</em>
				<br>
				[<a href="pel_hari_entry.php?s=edit&kd='.$dte_kd.'&tapelkd='.$tapelkd.'&smtkd='.$smtkd.'&kelkd='.$kelkd.'"><img src="'.$sumber.'/img/edit.gif" width="16" height="16" border="0"></a>].
				-
				[<a href="'.$filenya.'?s=hapus&kd='.$dte_kd.'&tapelkd='.$tapelkd.'&smtkd='.$smtkd.'&kelkd='.$kelkd.'"><img src="'.$sumber.'/img/delete.gif" width="16" height="16" border="0"></a>].
				<br>
				</td>';
				}

/*

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

			do
				{
				$dte_kd = nosql($rdte['jdkd']);
				$dte_rukd = nosql($rdte['rukd1']);
				$dte_rukd2 = nosql($rdte['rukd2']);
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
				$ku2_kode = nosql($rku2['kode']);
				$ku2_nip = balikin($rku2['nip']);
				$ku2_nama = balikin($rku2['nama']);
				




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
					<em>['.$ku2_kode.']. '.$ku2_nama.'.</em>
					<br>
					[<a href="pel_hari_entry.php?s=edit&kd='.$dte_kd.'&tapelkd='.$tapelkd.'&smtkd='.$smtkd.'&kelkd='.$kelkd.'"><img src="'.$sumber.'/img/edit.gif" width="16" height="16" border="0"></a>].
					-
					[<a href="'.$filenya.'?s=hapus&kd='.$dte_kd.'&tapelkd='.$tapelkd.'&smtkd='.$smtkd.'&kelkd='.$kelkd.'"><img src="'.$sumber.'/img/delete.gif" width="16" height="16" border="0"></a>].
					<br>';
					}
				else
					{
					echo '-';
					}
				}
			while ($rdte = mysqli_fetch_assoc($qdte));
*/



//			echo '</td>';
			}
		while ($rhri = mysqli_fetch_assoc($qhri));

		echo '</tr>';
		}

	echo '</table>';

	}

echo '</form>
<br>
<br>
<br>';
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


//isi
$isi = ob_get_contents();
ob_end_clean();

require("../../inc/niltpl.php");


//diskonek
xfree($qbw);
xclose($koneksi);
exit();
?>