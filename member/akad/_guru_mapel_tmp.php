<?php
session_start();

require("../../inc/config.php");
require("../../inc/fungsi.php");
require("../../inc/koneksi.php");
require("../../inc/cek/member.php");
$tpl = LoadTpl("../../template/index.html");

nocache;

//nilai
$filenya = "guru_mapel_tmp.php";
$judul = "Penempatan Guru Mengajar";
$judulku = "[$member_session] ==> $judul";
$judulx = $judul;
$tapelkd = nosql($_REQUEST['tapelkd']);
$s = nosql($_REQUEST['s']);
$ke = "$filenya?tapelkd=$tapelkd";




//focus...
if (empty($tapelkd))
	{
	$diload = "document.formx.tapel.focus();";
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
							"AND kd_mapel = '$pelkd' ".
							"AND kd_guru = '$gurkd' ".
							"AND kd_member = '$kd9_session' ".
							"AND kd_smt = '$smtkd'");
		$rc = mysql_fetch_assoc($qc);
		$tc = mysql_num_rows($qc);
		$guru = balikin2($rx['nama']);

		//nek ada, msg
		if ($tc != 0)
			{
			//re-direct
			$pesan = "Guru Tersebut Telah Mengajar Mata Pelajaran Tersebut. Silahkan Ganti...!";
			pekem($pesan,$ke);
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
if ($s == "hapus")
	{
	//nilai
	$tapelkd = nosql($_REQUEST['tapelkd']);
	$kelkd = nosql($_REQUEST['kelkd']);
	$smtkd = nosql($_REQUEST['smtkd']);
	$pelkd = nosql($_REQUEST['pelkd']);
	$gurkd = nosql($_REQUEST['gurkd']);
	$gkd = nosql($_REQUEST['gkd']);

	//query
	mysql_query("DELETE FROM m_guru_mapel ".
					"WHERE kd_member = '$kd9_session' ".
					"AND kd = '$gkd'");

	//re-direct
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

echo '</select>

<input name="tapelkd" type="hidden" value="'.$tapelkd.'">
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

else
	{
	echo '<select name="gurkd">
	<option value="" selected>-GURU-</option>';

	//daftar guru
	$qg = mysql_query("SELECT * FROM m_guru ".
						"WHERE kd_member = '$kd9_session' ".
						"ORDER BY kode ASC");
	$rg = mysql_fetch_assoc($qg);



	do
		{
		$i_kd = nosql($rg['kd']);
		$i_kode = nosql($rg['kode']);
		$i_nama = nosql($rg['nama']);


		echo '<option value="'.$i_kd.'">'.$i_kode.'. '.$i_nama.'.</option>';
		}
	while ($rg = mysql_fetch_assoc($qg));

	echo '</select>
	<br>

	<select name="pelkd">
	<option value="" selected>-MATA PELAJARAN-</option>';
	
	//daftar mapel
	$qbs = mysql_query("SELECT * FROM m_mapel ".
							"WHERE kd_member = '$kd9_session' ".
							"ORDER BY round(kode) ASC");
	$rbs = mysql_fetch_assoc($qbs);

	do
		{
		$bskd = nosql($rbs['kd']);
		$bskode = nosql($rbs['kode']);
		$bsmapel = balikin($rbs['mapel']);


		echo '<option value="'.$bskd.'">'.$bskode.'. '.$bsmapel.'</option>';
		}
	while ($rbs = mysql_fetch_assoc($qbs));

	echo '</select>
	<br>

	<select name="kelkd">
	<option value="" selected>-KELAS-</option>';
	//kelas
	$qrua = mysql_query("SELECT * FROM m_kelas ".
							"WHERE kd_member = '$kd9_session' ".
							"ORDER BY round(no) ASC, ".
							"kelas ASC, ".
							"ruang ASC");
	$rrua = mysql_fetch_assoc($qrua);

	do
		{
		$ruakd = nosql($rrua['kd']);
		$rukelas = balikin($rrua['kelas']);
		$ruruang = balikin($rrua['ruang']);

		echo '<option value="'.$ruakd.'">'.$rukelas.'-'.$ruruang.'</option>';
		}
	while ($rrua = mysql_fetch_assoc($qrua));

	echo '</select>
	<br>


	<select name="smtkd">
	<option value="" selected>-SEMESTER-</option>';
	//kelas
	$qrua = mysql_query("SELECT * FROM m_smt ".
							"ORDER BY round(no) ASC");
	$rrua = mysql_fetch_assoc($qrua);

	do
		{
		$ruakd = nosql($rrua['kd']);
		$rusmt = balikin($rrua['smt']);

		echo '<option value="'.$ruakd.'">'.$rusmt.'</option>';
		}
	while ($rrua = mysql_fetch_assoc($qrua));

	echo '</select>
	<br>

	<input name="btnSMP" type="submit" value="TAMBAH >>">
	</p>';

	//query
	$q = mysql_query("SELECT * FROM m_guru ".
						"WHERE kd_member = '$kd9_session' ".
						"ORDER BY round(kode) ASC");
	$row = mysql_fetch_assoc($q);
	$total = mysql_num_rows($q);

	if ($total != 0)
		{
		echo '[<a href="guru_mapel_tmp_xls.php?swkd='.$kd9_session.'&tapelkd='.$tapelkd.'" title="Print . . ."><img src="'.$sumber.'/img/xls.gif" width="16" height="16" border="0"></a>].
		<table width="1000" border="1" cellpadding="3" cellspacing="0">
    	<tr bgcolor="'.$warnaheader.'">
		<td width="5" valign="top"><strong>No.</strong></td>
		<td width="5" valign="top"><strong>Kode</strong></td>
		<td width="5" valign="top"><strong>NIP</strong></td>
    	<td valign="top"><strong><font color="'.$warnatext.'">Guru</font></strong></td>
    	<td width="400" valign="top"><strong><font color="'.$warnatext.'">Semester/Kelas/Mata Pelajaran</font></strong></td>
    	</tr>';

		do
			{
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
			$i_kode = nosql($row['kode']);
			$i_nip = nosql($row['nip']);
			$i_nama = nosql($row['nama']);


			echo "<tr bgcolor=\"$warna\" onmouseover=\"this.bgColor='$warnaover';\" onmouseout=\"this.bgColor='$warna';\">";
			echo '<td valign="top">'.$nomer.'. </td>
   			<td valign="top">'.$i_kode.'</td>
   			<td valign="top">'.$i_nip.'</td>
   			<td valign="top">'.$i_nama.'</td>
			<td valign="top">';

			//pel-nya
			$quru = mysql_query("SELECT * FROM m_guru_mapel ".
									"WHERE kd_member = '$kd9_session' ".
									"AND kd_tapel = '$tapelkd' ".
									"AND kd_guru = '$i_kd'");
			$ruru = mysql_fetch_assoc($quru);


			do
				{
				$gkd = nosql($ruru['kd']);
				$gkd_smt = nosql($ruru['kd_smt']);
				$gkd_kelas = nosql($ruru['kd_kelas']);
				$gkd_mapel = nosql($ruru['kd_mapel']);

				//smt
				$qku = mysql_query("SELECT * FROM m_smt ".
									"WHERE kd = '$gkd_smt'");
				$rku = mysql_fetch_assoc($qku);
				$gsmt = balikin($rku['smt']);

				//mapel
				$q1 = mysql_query("SELECT * FROM m_mapel ".
									"WHERE kd_member = '$kd9_session' ".
									"AND kd = '$gkd_mapel'");
				$r1 = mysql_fetch_assoc($q1);
				$gpel = balikin($r1['mapel']);


				//kelas
				$q2 = mysql_query("SELECT * FROM m_kelas ".
									"WHERE kd_member = '$kd9_session' ".
									"AND kd = '$gkd_kelas'");
				$r2 = mysql_fetch_assoc($q2);
				$gkelas = balikin($r2['kelas']);
				$gruang = balikin($r2['ruang']);


				//nek null
				if (empty($gkd))
					{
					echo "-";
					}
				else
					{
					echo '<strong>*</strong>['.$gsmt.']. ('.$gkelas.'-'.$gruang.') '.$gpel.'
					[<a href="'.$ke.'&s=hapus&gkd='.$gkd.'" title="HAPUS --> '.$gpel.'"><img src="'.$sumber.'/img/delete.gif" width="16" height="16" border="0"></a>]. <br>';
					}
				}
			while ($ruru = mysql_fetch_assoc($quru));



			echo '</td>
    			</tr>';
			}
		while ($row = mysql_fetch_assoc($q));

		echo '</table>
		<table width="700" border="0" cellspacing="0" cellpadding="3">
    	<tr>
    	<td align="right">Total : <strong><font color="#FF0000">'.$total.'</font></strong> Data.</td>
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