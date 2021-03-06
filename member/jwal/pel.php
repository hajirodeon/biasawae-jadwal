<?php
session_start();

require("../../inc/config.php");
require("../../inc/fungsi.php");
require("../../inc/koneksi.php");
require("../../inc/cek/member.php");
$tpl = LoadTpl("../../template/index.html");

nocache;

//nilai
$filenya = "pel.php";
$judul = "Jadwal Pelajaran per Kelas";
$judulku = "[$member_session] ==> $judul";
$judulx = $judul;
$tapelkd = nosql($_REQUEST['tapelkd']);
$smtkd = nosql($_REQUEST['smtkd']);
$kelkd = nosql($_REQUEST['kelkd']);
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




//PROSES ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//nek baru
if ($_POST['btnBR'])
	{
	//nilai
	$tapelkd = nosql($_POST['tapelkd']);
	$smtkd = nosql($_POST['smtkd']);
	$kelkd = nosql($_POST['kelkd']);

	//diskonek
	xfree($qbw);
	xclose($koneksi);

	//re-direct
	$ke = "pel_entry.php?tapelkd=$tapelkd&smtkd=$smtkd&kelkd=$kelkd";
	xloc($ke);
	exit();
	}




//nek null-kan
if ($_POST['btnNUL'])
	{
	//nilai
	$tapelkd = nosql($_POST['tapelkd']);
	$smtkd = nosql($_POST['smtkd']);
	$kelkd = nosql($_POST['kelkd']);

	//query
	mysqli_query($koneksi, "DELETE FROM jadwal ".
					"WHERE kd_tapel = '$tapelkd' ".
					"AND kd_smt = '$smtkd' ".
					"AND kd_kelas = '$kelkd' ".
					"AND kd_member = '$kd9_session'");

	//diskonek
	xfree($qbw);
	xclose($koneksi);

	//re-direct
	$ke = "$filenya?tapelkd=$tapelkd&smtkd=$smtkd&kelkd=$kelkd";
	xloc($ke);
	exit();
	}





//nek hapus
if ($s == "hapus")
	{
	//nilai
	$tapelkd = nosql($_REQUEST['tapelkd']);
	$smtkd = nosql($_REQUEST['smtkd']);
	$kelkd = nosql($_REQUEST['kelkd']);
	$kd = nosql($_REQUEST['kd']);

	//query
	mysqli_query($koneksi, "DELETE FROM jadwal ".
					"WHERE kd_member = '$kd9_session' ".
					"AND kd = '$kd'");

	//diskonek
	xfree($qbw);
	xclose($koneksi);

	//re-direct
	$ke = "$filenya?tapelkd=$tapelkd&smtkd=$smtkd&kelkd=$kelkd";
	xloc($ke);
	exit();
	}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



//isi *START
ob_start();

//menu
require("../../inc/menu/member.php");

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



Kelas : ';
echo "<select name=\"kelas\" onChange=\"MM_jumpMenu('self',this,0)\">";

//terpilih
$qbtx = mysqli_query($koneksi, "SELECT * FROM m_kelas ".
						"WHERE kd_member = '$kd9_session' ".
						"AND kd = '$kelkd'");
$rowbtx = mysqli_fetch_assoc($qbtx);
$btxkd = nosql($rowbtx['kd']);
$btxkelas = balikin($rowbtx['kelas']);
$btxruang = balikin($rowbtx['ruang']);

echo '<option value="'.$btxkd.'">'.$btxkelas.'-'.$btxruang.'</option>';

$qbt = mysqli_query($koneksi, "SELECT * FROM m_kelas ".
						"WHERE kd_member = '$kd9_session' ".
						"ORDER BY no ASC, ".
						"kelas ASC, ".
						"ruang ASC");
$rowbt = mysqli_fetch_assoc($qbt);

do
	{
	$btkd = nosql($rowbt['kd']);
	$btkelas = balikin($rowbt['kelas']);
	$btruang = balikin($rowbt['ruang']);

	echo '<option value="'.$filenya.'?tapelkd='.$tapelkd.'&smtkd='.$smtkd.'&kelkd='.$btkd.'">'.$btkelas.'-'.$btruang.'</option>';
	}
while ($rowbt = mysqli_fetch_assoc($qbt));

echo '</select>

<input name="tapelkd" type="hidden" value="'.$tapelkd.'">
<input name="smtkd" type="hidden" value="'.$smtkd.'">
<input name="kelkd" type="hidden" value="'.$kelkd.'">
</td>
</tr>
</table>
<br>';

//cek
if (empty($tapelkd))
	{
	echo '<h4>
	<strong><font color="#FF0000">TAHUN PELAJARAN Belum Dipilih...!</font></strong>
	</h4>';
	}
else if (empty($smtkd))
	{
	echo '<h4>
	<strong><font color="#FF0000">SEMESTER Belum Dipilih...!</font></strong>
	</h4>';
	}
else if (empty($kelkd))
	{
	echo '<h4>
	<strong><font color="#FF0000">KELAS Belum Dipilih...!</font></strong>
	</h4>';
	}
else
	{
	echo '<input name="tapelkd" type="hidden" value="'.$tapelkd.'">
	<input name="smtkd" type="hidden" value="'.$smtkd.'">
	<input name="kelkd" type="hidden" value="'.$kelkd.'">
	<input name="btnBR" type="submit" value="BARU">
	<input name="btnBR2" type="submit" value="BUAT BARU OTOMATIS">
	<input name="btnNUL" type="submit" value="KOSONGKAN">

	[<a href="pel_xls.php?swkd='.$kd9_session.'&tapelkd='.$tapelkd.'&smtkd='.$smtkd.'&kelkd='.$kelkd.'" title="Print . . ."><img src="'.$sumber.'/img/xls.gif" width="16" height="16" border="0"></a>].

	<table width="100%" border="1" cellspacing="0" cellpadding="3">
	<tr valign="top" bgcolor="'.$warnaheader.'">
	<td width="10">
	<b>No. Urut</b>
	</td>';

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
									"AND kd_hari = '$hri_kd' ".
									"AND kd_member = '$kd9_session'");
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
										"AND jadwal.kd_hari = '$hri_kd' ".
										"AND jadwal.kd_member = '$kd9_session'");
				$rdte2 = mysqli_fetch_assoc($qdte2);
				$tdte2 = mysqli_num_rows($qdte2);
				$dte_kd = nosql($rdte2['jdkd']);
				$dte_gpkd = nosql($rdte2['gpkd']);



				//guru ne
				$qku1 = mysqli_query($koneksi, "SELECT * FROM m_guru_mapel ".
										"WHERE kd_member = '$kd9_session' ".
										"AND kd = '$dte_gpkd'");
				$rku1 = mysqli_fetch_assoc($qku1);
				$ku1_gurkd = nosql($rku1['kd_guru']);
				$ku1_progkd = nosql($rku1['kd_mapel']);


				//guru ne
				$qku2 = mysqli_query($koneksi, "SELECT * FROM m_guru ".
										"WHERE kd_member = '$kd9_session' ".
										"AND kd = '$ku1_gurkd'");
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
										"WHERE kd_member = '$kd9_session' ".
										"AND kd = '$ku1_progkd'");
				$rcc2 = mysqli_fetch_assoc($qcc2);
				$dte_pel = balikin($rcc2['mapel']);

				
				echo '<td>
				<b>Jam ke-'.$dte3_jam.' ['.$dte_waktu.'].</b>
				<br>
				
				<strong>'.$dte_pel.'</strong>
				<br>
				<em>['.$ku2_kode.']. '.$ku2_nama.'.</em>
				<br>
				[<a href="pel_entry.php?s=edit&kd='.$dte_kd.'&tapelkd='.$tapelkd.'&smtkd='.$smtkd.'&kelkd='.$kelkd.'"><img src="'.$sumber.'/img/edit.gif" width="16" height="16" border="0"></a>].
				-
				[<a href="'.$filenya.'?s=hapus&kd='.$dte_kd.'&tapelkd='.$tapelkd.'&smtkd='.$smtkd.'&kelkd='.$kelkd.'"><img src="'.$sumber.'/img/delete.gif" width="16" height="16" border="0"></a>].
				<br>
				</td>';
				}

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