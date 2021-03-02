<?php
session_start();

require("../../inc/config.php");
require("../../inc/fungsi.php");
require("../../inc/koneksi.php");
require("../../inc/cek/member.php");
$tpl = LoadTpl("../../template/index.html");

nocache;

//nilai
$filenya = "guru_entry.php";
$judul = "Entry Guru Mengajar";
$judulku = "[$member_session] ==> $judul";
$judulx = $judul;
$tapelkd = nosql($_REQUEST['tapelkd']);
$smtkd = nosql($_REQUEST['smtkd']);
$gurkd = nosql($_REQUEST['gurkd']);





//focus
$diload = "document.formx.kprp.focus();";



//PROSES ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//nek batal
if ($_POST['btnBTL'])
	{
	//nilai
	$tapelkd = nosql($_POST['tapelkd']);
	$smtkd = nosql($_POST['smtkd']);
	$gurkd = nosql($_POST['gurkd']);

	//diskonek
	xfree($qbw);
	xclose($koneksi);

	//re-direct
	$ke = "guru.php?tapelkd=$tapelkd&smtkd=$smtkd&gurkd=$gurkd";
	xloc($ke);
	exit();
	}





//nek simpan
if ($_POST['btnSMP'])
	{
	//nilai
	$tapelkd = nosql($_POST['tapelkd']);
	$smtkd = nosql($_POST['smtkd']);
	$gurkd = nosql($_POST['gurkd']);
	$kprp = nosql($_POST['kprp']);
	$hari = nosql($_POST['hari']);
	$jam = nosql($_POST['jam']);
	$lama = nosql($_POST['lama']);


	//nek null
	if ((empty($kprp)) OR (empty($hari)) OR (empty($jam)) OR (empty($lama)))
		{
		//diskonek
		xfree($qbw);
		xclose($koneksi);

		//re-direct
		$pesan = "Input Tidak Lengkap. Harap Diulangi...!";
		$ke = "$filenya?tapelkd=$tapelkd&smtkd=$smtkd&gurkd=$gurkd";
		pekem($pesan,$ke);
		exit();
		}
	else
		{
		//detail
		$qrpx = mysqli_query($koneksi, "SELECT m_guru_mapel.*, m_guru.* ".
							"FROM m_guru_mapel, m_guru ".
							"WHERE m_guru_mapel.kd_guru = m_guru.kd ".
							"AND m_guru_mapel.kd = '$kprp'");
		$rrpx = mysqli_fetch_assoc($qrpx);
		$rpx_kelkd = nosql($rrpx['kd_kelas']);


		//dapatkan lama jam mengajar...
		for($j=1;$j<=$lama;$j++)
			{
			//query
			$qkuji = mysqli_query($koneksi, "SELECT * FROM m_jam ".
											"WHERE kd = '$jam'");
			$rkuji = mysqli_fetch_assoc($qkuji);
			$tkuji = mysqli_num_rows($qkuji);
			$kuji_jam = nosql($rkuji['jam']);

			//jenjang max penambahan
			$kuji_max = round($kuji_jam + ($j - 1));


			//terpilih
			$qkujix = mysqli_query($koneksi, "SELECT * FROM m_jam ".
											"WHERE jam = '$kuji_max'");
			$rkujix = mysqli_fetch_assoc($qkujix);
			$tkujix = mysqli_num_rows($qkujix);
			$kujix_kd = nosql($rkujix['kd']);


			//query
			mysqli_query($koneksi, "INSERT INTO jadwal(kd, kd_tapel, kd_smt, kd_kelas, ".
							"kd_jam, kd_hari, kd_guru_mapel) VALUES ".
							"('$x', '$tapelkd', '$smtkd', '$rpx_kelkd', ".
							"'$kujix_kd', '$hari', '$kprp')");
			}


		//diskonek
		xfree($qbw);
		xclose($koneksi);

		//re-direct
		$ke = "guru.php?tapelkd=$tapelkd&smtkd=$smtkd&gurkd=$gurkd";
		xloc($ke);
		exit();
		}
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
xheadline($judul);

//view //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
echo '<form action="'.$filenya.'" method="post" name="formx">
<table width="100%" bgcolor="'.$warnaover.'" cellspacing="0" cellpadding="3">
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

echo '<strong>'.$smtx_smt.'</strong>,

Guru : ';
//terpilih
$qgrx = mysqli_query($koneksi, "SELECT * FROM m_guru ".
						"WHERE kd = '$gurkd'");
$rowgrx = mysqli_fetch_assoc($qgrx);
$grx_kd = nosql($rowgrx['kd']);
$grx_nip = nosql($rowgrx['kode']);
$grx_nm = balikin($rowgrx['nama']);

echo '<strong>['.$grx_nip.']. '.$grx_nm.'</strong>
</td>
</tr>
</table>
<br>

<table width="100%" border="0" cellspacing="0" cellpadding="3">
<tr valign="top">
<td>
<strong>Kelas/Pelajaran : </strong>
<br>';
echo '<select name="kprp">
<option value="" selected></option>';

//query
$qkui = mysqli_query($koneksi, "SELECT m_guru.*, m_guru_mapel.*, m_guru_mapel.kd AS mgkd ".
						"FROM m_guru, m_guru_mapel ".
						"WHERE m_guru_mapel.kd_guru = m_guru.kd ".
						"AND m_guru_mapel.kd_tapel = '$tapelkd' ".
						"AND m_guru_mapel.kd_guru = '$gurkd'");
$rkui = mysqli_fetch_assoc($qkui);



do
	{
	$kui_kd = nosql($rkui['mgkd']);
	$kui_kelkd = nosql($rkui['kd_kelas']);
	$kui_pelkd = nosql($rkui['kd_mapel']);


	//kelas
	$qbtx = mysqli_query($koneksi, "SELECT * FROM m_kelas ".
							"WHERE kd = '$kui_kelkd'");
	$rowbtx = mysqli_fetch_assoc($qbtx);
	$kui_kelas = balikin($rowbtx['kelas']);
	$kui_ruang = balikin($rowbtx['ruang']);


	//pddkn
	$qcc2 = mysqli_query($koneksi, "SELECT mapel FROM m_mapel ".
				"WHERE kd = '$kui_pelkd'");
	$rcc2 = mysqli_fetch_assoc($qcc2);
	$kui_pel = balikin($rcc2['mapel']);

	echo '<option value="'.$kui_kd.'">'.$kui_kelas.'-'.$kui_ruang.' / '.$kui_pel.'</option>';
	}
while ($rkui = mysqli_fetch_assoc($qkui));

echo '</select>
<br><br>
<strong>Hari : </strong>
<br>';


//hari-terpilih
$qhrix = mysqli_query($koneksi, "SELECT * FROM m_hari ".
						"WHERE kd = '$dir_harikd'");
$rhrix = mysqli_fetch_assoc($qhrix);
$hrix_kd = nosql($rhrix['kd']);
$hrix_hr = balikin($rhrix['hari']);

echo '<select name="hari">
<option value="'.$hrix_kd.'" selected>'.$hrix_hr.'</option>';
//hari
$qhri = mysqli_query($koneksi, "SELECT * FROM m_hari ".
						"WHERE kd <> '$hrix_kd' ".
						"ORDER BY round(no) ASC");
$rhri = mysqli_fetch_assoc($qhri);

do
	{
	$hri_kd = nosql($rhri['kd']);
	$hri_hr = balikin($rhri['hari']);

	echo '<option value="'.$hri_kd.'">'.$hri_hr.'</option>';
	}
while ($rhri = mysqli_fetch_assoc($qhri));

echo '</select>
<br><br>
<strong>Jam ke-: </strong>
<br>';


//jam-terpilih
$qjmx = mysqli_query($koneksi, "SELECT * FROM m_jam ".
						"WHERE kd = '$dir_jamkd'");
$rjmx = mysqli_fetch_assoc($qjmx);
$jmx_kd = nosql($rjmx['kd']);
$jmx_jam = nosql($rjmx['jam']);

echo '<select name="jam">
<option value="'.$jmx_kd.'" selected>'.$jmx_jam.'</option>';
//jam
$qjm = mysqli_query($koneksi, "SELECT * FROM m_jam ".
						"WHERE kd <> '$jmx_kd' ".
						"ORDER BY round(jam) ASC");
$rjm = mysqli_fetch_assoc($qjm);

do
	{
	$jm_kd = nosql($rjm['kd']);
	$jm_hr = nosql($rjm['jam']);

	echo '<option value="'.$jm_kd.'">'.$jm_hr.'</option>';
	}
while ($rjm = mysqli_fetch_assoc($qjm));

echo '</select>
<br><br>

<strong>Lama Mengajar : </strong>
<br>
<input type="text" name="lama" value="'.$lama.'" size="2" maxlength="1" onKeyPress="return numbersonly(this, event)"> Jam
<br><br>

<input name="tapelkd" type="hidden" value="'.$tapelkd.'">
<input name="smtkd" type="hidden" value="'.$smtkd.'">
<input name="gurkd" type="hidden" value="'.$gurkd.'">
<input name="btnSMP" type="submit" value="SIMPAN">
<input name="btnBTL" type="submit" value="BATAL">
</td>
</tr>
</table>
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
xfree($qbw);
xclose($koneksi);
exit();
?>