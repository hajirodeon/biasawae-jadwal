<?php
session_start();

require("../../inc/config.php");
require("../../inc/fungsi.php");
require("../../inc/koneksi.php");
require("../../inc/cek/member.php");
$tpl = LoadTpl("../../template/index.html");

nocache;

//nilai
$filenya = "guru_mapel_kelas.php";
$judul = "Guru per Mapel";
$judulku = "[$member_session] ==> $judul";
$judulx = $judul;
$tapelkd = nosql($_REQUEST['tapelkd']);
$kelkd = nosql($_REQUEST['kelkd']);
$smtkd = nosql($_REQUEST['smtkd']);
$s = nosql($_REQUEST['s']);
$ke = "$filenya?tapelkd=$tapelkd&kelkd=$kelkd&smtkd=$smtkd";



//focus...
if (empty($tapelkd))
	{
	$diload = "document.formx.tapel.focus();";
	}
else if (empty($kelkd))
	{
	$diload = "document.formx.kelas.focus();";
	}
else if (empty($smtkd))
	{
	$diload = "document.formx.smt.focus();";
	}






//PROSES ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//jika simpan
if ($_POST['btnSMP'])
	{
	//nilai
	$tapelkd = nosql($_POST['tapelkd']);
	$kelkd = nosql($_POST['kelkd']);
	$smtkd = nosql($_POST['smtkd']);
	$pelkd = nosql($_POST['pelkd']);
	$gurkd = nosql($_POST['gurkd']);

	//nek null
	if ((empty($pelkd)) OR (empty($gurkd)))
		{
		//re-direct
		$pesan = "Input Tidak Lengkap. Harap Diulangi...!!";
		pekem($pesan,$ke);
		exit();
		}
	else
		{
		//cek
		$qc = mysql_query("SELECT * FROM m_guru_mapel ".
								"WHERE kd_tapel = '$tapelkd' ".
								"AND kd_kelas = '$kelkd' ".
								"AND kd_smt = '$smtkd' ".
								"AND kd_mapel = '$pelkd' ".
								"AND kd_guru = '$gurkd' ".
								"AND kd_member = '$kd9_session'");
		$rc = mysql_fetch_assoc($qc);
		$tc = mysql_num_rows($qc);
		$c_nip = nosql($rc['nip']);
		$c_nama = balikin2($rc['nama']);


		//nek ada, msg
		if ($tc != 0)
			{
			//re-direct
			$pesan = "SUDAH ADA. SILAHKAN GANTI...!";
			pekem($pesan,$ke);
			exit();
			}
		else
			{
			//query
			mysql_query("INSERT INTO m_guru_mapel(kd, kd_member, kd_tapel, kd_kelas, kd_smt, kd_guru, kd_mapel, postdate) VALUES ".
							"('$x', '$kd9_session', '$tapelkd', '$kelkd', '$smtkd', '$gurkd', '$pelkd', '$today')");

			//re-direct
			xloc($ke);
			exit();
			}
		}
	}



//jika hapus
if ($_POST['btnHPS'])
	{
	//ambil nilai
	$jml = nosql($_POST['jml']);
	$tapelkd = nosql($_POST['tapelkd']);
	$kelkd = nosql($_POST['kelkd']);
	$smtkd = nosql($_POST['smtkd']);

	
	//ambil semua
	for ($i=1; $i<=$jml;$i++)
		{
		//ambil nilai
		$yuk = "item";
		$yuhu = "$yuk$i";
		$kd = nosql($_POST["$yuhu"]);

		//del
		mysql_query("DELETE FROM m_guru_mapel ".
						"WHERE kd_member = '$kd9_session' ".
						"AND kd = '$kd'");
		}



	//auto-kembali
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
require("../../inc/js/checkall.js");
require("../../inc/js/swap.js");
xheadline($judul);

//VIEW //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
echo '<form name="formx" method="post" action="'.$ke.'">
<table bgcolor="'.$warnaover.'" width="100%" border="0" cellspacing="0" cellpadding="3">
<tr>
<td>
Tahun Pelajaran : ';
echo "<select name=\"tapel\" onChange=\"MM_jumpMenu('self',this,0)\">";

//terpilih
$qtpx = mysql_query("SELECT * FROM m_tapel ".
						"WHERE kd_member = '$kd9_session' ".
						"AND kd = '$tapelkd'");
$rowtpx = mysql_fetch_assoc($qtpx);
$tpx_kd = nosql($rowtpx['kd']);
$tpx_thn1 = nosql($rowtpx['tahun1']);
$tpx_thn2 = nosql($rowtpx['tahun2']);

echo '<option value="'.$tpx_kd.'">'.$tpx_thn1.'/'.$tpx_thn2.'</option>';

$qtp = mysql_query("SELECT * FROM m_tapel ".
						"WHERE kd_member = '$kd9_session' ".
						"AND kd <> '$tapelkd' ".
						"ORDER BY tahun1 ASC");
$rowtp = mysql_fetch_assoc($qtp);

do
	{
	$tpkd = nosql($rowtp['kd']);
	$tpth1 = nosql($rowtp['tahun1']);
	$tpth2 = nosql($rowtp['tahun2']);

	echo '<option value="'.$filenya.'?tapelkd='.$tpkd.'">'.$tpth1.'/'.$tpth2.'</option>';
	}
while ($rowtp = mysql_fetch_assoc($qtp));

echo '</select>,

Kelas : ';
echo "<select name=\"kelas\" onChange=\"MM_jumpMenu('self',this,0)\">";

//terpilih
$qbtx = mysql_query("SELECT * FROM m_kelas ".
						"WHERE kd_member = '$kd9_session' ".
						"AND kd = '$kelkd'");
$rowbtx = mysql_fetch_assoc($qbtx);
$btxkd = nosql($rowbtx['kd']);
$btxkelas = balikin($rowbtx['kelas']);
$btxruang = balikin($rowbtx['ruang']);

echo '<option value="'.$btxkd.'">'.$btxkelas.'-'.$btxruang.'</option>';

$qbt = mysql_query("SELECT * FROM m_kelas ".
						"WHERE kd_member = '$kd9_session' ".
						"ORDER BY round(no) ASC, ".
						"kelas ASC, ".
						"ruang ASC");
$rowbt = mysql_fetch_assoc($qbt);

do
	{
	$btkd = nosql($rowbt['kd']);
	$btkelas = balikin($rowbt['kelas']);
	$btruang = balikin($rowbt['ruang']);

	echo '<option value="'.$filenya.'?tapelkd='.$tapelkd.'&kelkd='.$btkd.'">'.$btkelas.'-'.$btruang.'</option>';
	}
while ($rowbt = mysql_fetch_assoc($qbt));

echo '</select>, 




Semester : ';
echo "<select name=\"smt\" onChange=\"MM_jumpMenu('self',this,0)\">";

//terpilih
$qbtx = mysql_query("SELECT * FROM m_smt ".
						"WHERE kd = '$smtkd'");
$rowbtx = mysql_fetch_assoc($qbtx);
$btxkd = nosql($rowbtx['kd']);
$btxno = nosql($rowbtx['no']);
$btxsmt = balikin($rowbtx['smt']);

echo '<option value="'.$btxkd.'">'.$btxsmt.'</option>';

$qbt = mysql_query("SELECT * FROM m_smt ".
						"ORDER BY round(no) ASC, ".
						"smt ASC");
$rowbt = mysql_fetch_assoc($qbt);

do
	{
	$btkd = nosql($rowbt['kd']);
	$btno = nosql($rowbt['no']);
	$btsmt = balikin($rowbt['smt']);

	echo '<option value="'.$filenya.'?tapelkd='.$tapelkd.'&kelkd='.$kelkd.'&smtkd='.$btkd.'">'.$btsmt.'</option>';
	}
while ($rowbt = mysql_fetch_assoc($qbt));

echo '</select>


<input name="tapelkd" type="hidden" value="'.$tapelkd.'">
<input name="kelkd" type="hidden" value="'.$kelkd.'">
<input name="smtkd" type="hidden" value="'.$smtkd.'">

</td>
</tr>
</table>
<br>';



//nek blm
if (empty($tapelkd))
	{
	echo '<h4>
	<strong><font color="#FF0000">TAHUN PELAJARAN Belum Dipilih...!</font></strong>
	</h4>';
	}

else if (empty($kelkd))
	{
	echo '<h4>
	<strong><font color="#FF0000">KELAS Belum Dipilih...!</font></strong>
	</h4>';
	}
else if (empty($smtkd))
	{
	echo '<h4>
	<strong><font color="#FF0000">SEMESTER Belum Dipilih...!</font></strong>
	</h4>';
	}
else
	{
	echo '<select name="pelkd">
	<option value="" selected>-MATA PELAJARAN-</option>';
	
	//daftar mapel
	$qbs = mysql_query("SELECT * FROM m_mapel ".
							"WHERE kd_member = '$kd9_session' ".
							"ORDER BY round(kode) ASC");
	$rbs = mysql_fetch_assoc($qbs);

	do
		{
		$bskd = nosql($rbs['kd']);
		$bskode = balikin($rbs['kode']);
		$bspel = balikin($rbs['mapel']);

		echo '<option value="'.$bskd.'">'.$bskode.'. '.$bspel.'</option>';
		}
	while ($rbs = mysql_fetch_assoc($qbs));

	echo '</select>';


	echo '<select name="gurkd">
	<option value="" selected>-GURU-</option>';

	//daftar guru
	$qg = mysql_query("SELECT * FROM m_guru ".
							"WHERE kd_member = '$kd9_session' ".
							"ORDER BY round(kode) ASC");
	$rg = mysql_fetch_assoc($qg);

	do
		{
		$gkd = nosql($rg['kd']);
		$gkode = balikin($rg['kode']);
		$gnip = balikin($rg['nip']);
		$gnama = balikin($rg['nama']);

		echo '<option value="'.$gkd.'">'.$gkode.'. '.$gnip.'. '.$gnama.'</option>';
		}
	while ($rg = mysql_fetch_assoc($qg));

	echo '</select>
	<input name="btnSMP" type="submit" value="SIMPAN >>">
	</p>';

	//query
	$q = mysql_query("SELECT m_guru_mapel.*, m_mapel.kode AS kkode ".
						"FROM m_guru_mapel, m_mapel ".
						"WHERE m_guru_mapel.kd_mapel = m_mapel.kd ".
						"AND m_guru_mapel.kd_tapel = '$tapelkd' ".
						"AND m_guru_mapel.kd_kelas = '$kelkd' ".
						"AND m_guru_mapel.kd_smt = '$smtkd' ".
						"AND m_guru_mapel.kd_member = '$kd9_session' ".
						"ORDER BY m_mapel.kode ASC");
	$row = mysql_fetch_assoc($q);
	$total = mysql_num_rows($q);

	if ($total != 0)
		{
		echo '[<a href="guru_mapel_kelas_xls.php?swkd='.$kd9_session.'&tapelkd='.$tapelkd.'&kelkd='.$kelkd.'&smtkd='.$smtkd.'" title="Print . . ."><img src="'.$sumber.'/img/xls.gif" width="16" height="16" border="0"></a>].
		<table width="600" border="1" cellpadding="3" cellspacing="0">
    	<tr bgcolor="'.$warnaheader.'">
		<td width="5" valign="top">&nbsp;</td>
		<td width="5" valign="top"><strong>Kode</strong></td>
    	<td valign="top"><strong><font color="'.$warnatext.'">Nama Mata Pelajaran</font></strong></td>
    	<td width="300" valign="top"><strong><font color="'.$warnatext.'">Guru</font></strong></td>
    	</tr>';

		do {
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

			$nomer = $nomer + 1;
			$i_kd = nosql($row['kd']);
			$i_kkode = nosql($row['kkode']);
			$i_gurkd = nosql($row['kd_guru']);
			$i_mapelkd = nosql($row['kd_mapel']);

			
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
			
			
			
			
			echo "<tr bgcolor=\"$warna\" onmouseover=\"this.bgColor='$warnaover';\" onmouseout=\"this.bgColor='$warna';\">";
			echo '<td>
			<INPUT type="hidden" name="i_kd'.$nomer.'" value="'.$i_kd.'">
			<input type="checkbox" name="item'.$nomer.'" value="'.$i_kd.'">
			</td>
			<td>'.$i_kkode.'</td>
			<td>'.$ku_mapel.'</td>
			<td>'.$ku2_nama.'</td>
   			</tr>';
			}
		while ($row = mysql_fetch_assoc($q));

		echo '</table>
		<table width="500" border="0" cellspacing="0" cellpadding="3">
		<tr>
		<td>
		<input name="btnALL" type="button" value="SEMUA" onClick="checkAll('.$total.')">
		<input name="btnBTL" type="reset" value="BATAL">
		<input name="btnHPS" type="submit" value="HAPUS">
		<input name="jml" type="hidden" value="'.$total.'">

		Total : <strong><font color="#FF0000">'.$total.'</font></strong> Data.
		</td>
		</tr>
		</table>';
		}
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
?>