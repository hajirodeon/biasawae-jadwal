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
require("../../inc/cek/admwaka.php");
$tpl = LoadTpl("../../template/index.html");

nocache;

//nilai
$filenya = "guru_prog_pddkn.php";
$judul = "Guru per Mata Pelajaran";
$judulku = "[$waka_session : $nip10_session.$nm10_session] ==> $judul";
$judulx = $judul;
$tapelkd = nosql($_REQUEST['tapelkd']);
$jnskd = nosql($_REQUEST['jnskd']);
$pelkd = nosql($_REQUEST['pelkd']);
$s = nosql($_REQUEST['s']);
$ke = "$filenya?tapelkd=$tapelkd&jnskd=$jnskd&pelkd=$pelkd";



//focus...
if (empty($tapelkd))
	{
	$diload = "document.formx.tapel.focus();";
	}
else if (empty($jnskd))
	{
	$diload = "document.formx.jenis.focus();";
	}
else if (empty($pelkd))
	{
	$diload = "document.formx.progdi.focus();";
	}






//PROSES ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//jika simpan
if ($_POST['btnSMP'])
	{
	//nilai
	$tapelkd = nosql($_POST['tapelkd']);
	$kelkd = nosql($_POST['kelas']);
	$jnskd = nosql($_POST['jnskd']);
	$pelkd = nosql($_POST['pelkd']);
	$gurkd = nosql($_POST['gurkd']);

	//nek null
	if ((empty($gurkd)) OR (empty($kelkd)))
		{
		//re-direct
		$pesan = "Input Tidak Lengkap. Harap Diulangi...!!";
		pekem($pesan,$ke);
		exit();
		}
	else
		{
		//cek
		$qc = mysqli_query($koneksi, "SELECT m_guru_prog_pddkn.*, m_guru.*, m_pegawai.* ".
							"FROM m_guru_prog_pddkn, m_guru, m_pegawai ".
							"WHERE m_guru_prog_pddkn.kd_guru = m_guru.kd ".
							"AND m_guru.kd_pegawai = m_pegawai.kd ".
							"AND m_guru.kd_tapel = '$tapelkd' ".
							"AND m_guru.kd_kelas = '$kelkd' ".
							"AND m_guru_prog_pddkn.kd_prog_pddkn = '$pelkd' ".
							"AND m_guru_prog_pddkn.kd_guru = '$gurkd'");
		$rc = mysqli_fetch_assoc($qc);
		$tc = mysqli_num_rows($qc);
		$c_nip = nosql($rc['nip']);
		$c_nama = balikin2($rc['nama']);


		//nek ada, msg
		if ($tc != 0)
			{
			//re-direct
			$pesan = "Mata Pelajaran dengan Guru : [$c_nip].$c_nama, SUDAH ADA. SILAHKAN GANTI...!";
			pekem($pesan,$ke);
			exit();
			}
		else
			{
			//query
			mysqli_query($koneksi, "INSERT INTO m_guru_prog_pddkn(kd, kd_guru, kd_prog_pddkn) VALUES ".
					"('$x', '$gurkd', '$pelkd')");

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
	$jnskd = nosql($_REQUEST['jnskd']);
	$mgkd = nosql($_REQUEST['mgkd']);
	$pkd = nosql($_REQUEST['pkd']);

	//query
	mysqli_query($koneksi, "DELETE FROM m_guru_prog_pddkn ".
			"WHERE kd_guru = '$mgkd' ".
			"AND kd_prog_pddkn = '$pkd'");

	//re-direct
	xloc($ke);
	exit();
	}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



//isi *START
ob_start();

//menu
require("../../inc/menu/admwaka.php");

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

Jenis Mata Pelajaran : ';
echo "<select name=\"jenis\" onChange=\"MM_jumpMenu('self',this,0)\">";

//terpilih
$qjnx = mysqli_query($koneksi, "SELECT * FROM m_prog_pddkn_jns ".
						"WHERE kd = '$jnskd'");
$rowjnx = mysqli_fetch_assoc($qjnx);
$jnx_kd = nosql($rowjnx['kd']);
$jnx_jns = balikin($rowjnx['jenis']);

echo '<option value="'.$jnx_kd.'">'.$jnx_jns.'</option>';

//jenis
$qjn = mysqli_query($koneksi, "SELECT * FROM m_prog_pddkn_jns ".
						"WHERE kd <> '$jnskd' ".
						"ORDER BY jenis ASC");
$rowjn = mysqli_fetch_assoc($qjn);

do
	{
	$jn_kd = nosql($rowjn['kd']);
	$jn_jns = balikin($rowjn['jenis']);

	echo '<option value="'.$filenya.'?tapelkd='.$tapelkd.'&jnskd='.$jn_kd.'">'.$jn_jns.'</option>';
	}
while ($rowjn = mysqli_fetch_assoc($qjn));

echo '</select>,

Mata Pelajaran : ';
echo "<select name=\"progdi\" onChange=\"MM_jumpMenu('self',this,0)\">";
//terpilih
$qjnx = mysqli_query($koneksi, "SELECT * FROM m_prog_pddkn ".
			"WHERE kd = '$pelkd'");
$rowjnx = mysqli_fetch_assoc($qjnx);
$jnx_kd = nosql($rowjnx['kd']);
$jnx_pel = balikin($rowjnx['prog_pddkn']);

echo '<option value="'.$jnx_kd.'" selected>'.$jnx_pel.'</option>';

//daftar mapel
$qbs = mysqli_query($koneksi, "SELECT DISTINCT(m_prog_pddkn.kd) AS mmkd ".
			"FROM m_prog_pddkn_kelas, m_prog_pddkn ".
			"WHERE m_prog_pddkn_kelas.kd_prog_pddkn = m_prog_pddkn.kd ".
			"AND m_prog_pddkn_kelas.kd_keahlian = '$keakd' ".
			"AND m_prog_pddkn_kelas.kd_keahlian_kompetensi = '$kompkd' ".
			"AND m_prog_pddkn.kd_jenis = '$jnskd' ".
			"AND m_prog_pddkn.kd <> '$pelkd' ".
			"ORDER BY round(m_prog_pddkn.no) ASC, ".
			"round(m_prog_pddkn.no_sub) ASC");
$rbs = mysqli_fetch_assoc($qbs);

do
	{
	$bskd = nosql($rbs['mmkd']);

	//detail
	$qprodi = mysqli_query($koneksi, "SELECT * FROM m_prog_pddkn ".
				"WHERE kd = '$bskd'");
	$rprodi = mysqli_fetch_assoc($qprodi);
	$bspel = balikin2($rprodi['prog_pddkn']);

	echo '<option value="'.$filenya.'?tapelkd='.$tapelkd.'&jnskd='.$jnskd.'&pelkd='.$bskd.'">'.$bspel.'</option>';
	}
while ($rbs = mysqli_fetch_assoc($qbs));

echo '</select>

</td>
</tr>
</table>
<br>';

//nilai
$jnskd = nosql($_REQUEST['jnskd']);
$pelkd = nosql($_REQUEST['pelkd']);


//nek blm
if (empty($tapelkd))
	{
	echo '<h4>
	<strong><font color="#FF0000">TAHUN PELAJARAN Belum Dipilih...!</font></strong>
	</h4>';
	}

else if (empty($jnskd))
	{
	echo '<h4>
	<strong><font color="#FF0000">JENIS MATA PELAJARAN Belum Dipilih...!</font></strong>
	</h4>';
	}
else if (empty($pelkd))
	{
	echo '<h4>
	<strong><font color="#FF0000">MATA PELAJARAN Belum Dipilih...!</font></strong>
	</h4>';
	}
else
	{
	echo '<select name="gurkd">
	<option value="" selected>-GURU-</option>';

	//daftar guru
	$qg = mysqli_query($koneksi, "SELECT DISTINCT(m_pegawai.kd) AS mpkd ".
							"FROM m_guru, m_pegawai ".
							"WHERE m_guru.kd_pegawai = m_pegawai.kd ".
							"AND m_guru.kd_tapel = '$tapelkd' ".
							"ORDER BY round(m_pegawai.nip) ASC");
	$rg = mysqli_fetch_assoc($qg);

	do
		{
		$x_mpkd = nosql($rg['mpkd']);

		//detail
		$qpgw = mysqli_query($koneksi, "SELECT m_pegawai.*, m_guru.*, ".
								"m_guru.kd AS mgkd ".
								"FROM m_pegawai, m_guru ".
								"WHERE m_guru.kd_pegawai = m_pegawai.kd ".
								"AND m_guru.kd_tapel = '$tapelkd' ".
								"AND m_pegawai.kd = '$x_mpkd'");
		$rpgw = mysqli_fetch_assoc($qpgw);
		$tpwg = mysqli_num_rows($qpgw);
		$i_mgkd = nosql($rpgw['mgkd']);
		$i_nip = nosql($rpgw['nip']);
		$i_gnam = balikin2($rpgw['nama']);


		echo '<option value="'.$i_mgkd.'">'.$i_nip.'. '.$i_gnam.'</option>';
		}
	while ($rg = mysqli_fetch_assoc($qg));

	echo '</select>,
	<select name="kelas">
	<option value="">-Kelas-</option>';

	$qbt = mysqli_query($koneksi, "SELECT * FROM m_kelas ".
							"WHERE kelas LIKE '%$keax_singk%' ".
							"ORDER BY kelas ASC, ".
							"round(no) ASC");
	$rowbt = mysqli_fetch_assoc($qbt);

	do
		{
		$btkd = nosql($rowbt['kd']);
		$btkelas = nosql($rowbt['kelas']);

		echo '<option value="'.$btkd.'">'.$btkelas.'</option>';
		}
	while ($rowbt = mysqli_fetch_assoc($qbt));

	echo '</select>
	<input name="tapelkd" type="hidden" value="'.nosql($_REQUEST['tapelkd']).'">
	<input name="jnskd" type="hidden" value="'.nosql($_REQUEST['jnskd']).'">
	<input name="pelkd" type="hidden" value="'.nosql($_REQUEST['pelkd']).'">
	<input name="btnSMP" type="submit" value="SIMPAN >>">
	</p>';


	//query
	$q = mysqli_query($koneksi, "SELECT DISTINCT(m_pegawai.kd) AS mpkd ".
							"FROM m_pegawai, m_guru, m_guru_prog_pddkn ".
							"WHERE m_guru.kd_pegawai = m_pegawai.kd ".
							"AND m_guru_prog_pddkn.kd_guru = m_guru.kd ".
							"AND m_guru.kd_tapel = '$tapelkd' ".
							"AND m_guru_prog_pddkn.kd_prog_pddkn = '$pelkd'");
	$row = mysqli_fetch_assoc($q);
	$total = mysqli_num_rows($q);

	if ($total != 0)
		{
		echo '<table width="600" border="1" cellpadding="3" cellspacing="0">
		<tr bgcolor="'.$warnaheader.'">
		<td width="5" valign="top"><strong>No.</strong></td>
		<td width="1" valign="top">&nbsp;</td>
	    	<td valign="top"><strong><font color="'.$warnatext.'">Guru</font></strong></td>
		<td width="200" valign="top"><strong><font color="'.$warnatext.'">Kelas</font></strong></td>
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

			$i_nomer = $i_nomer + 1;
			$i_mpkd = nosql($row['mpkd']);


			//detail
			$qpgw = mysqli_query($koneksi, "SELECT m_pegawai.*, m_guru.*, m_guru_prog_pddkn.*, ".
									"m_guru_prog_pddkn.kd_guru AS mgkd, ".
									"m_guru_prog_pddkn.kd_prog_pddkn AS pkd ".
									"FROM m_pegawai, m_guru, m_guru_prog_pddkn ".
									"WHERE m_guru.kd_pegawai = m_pegawai.kd ".
									"AND m_guru_prog_pddkn.kd_guru = m_guru.kd ".
									"AND m_guru.kd_tapel = '$tapelkd' ".
									"AND m_guru_prog_pddkn.kd_prog_pddkn = '$pelkd' ".
									"AND m_pegawai.kd = '$i_mpkd'");
			$rpgw = mysqli_fetch_assoc($qpgw);
			$tpwg = mysqli_num_rows($qpgw);
			$i_mgkd = nosql($rpgw['mgkd']);
			$i_pkd = nosql($rpgw['pkd']);
			$i_gnam = balikin2($rpgw['nama']);


			echo "<tr bgcolor=\"$warna\" onmouseover=\"this.bgColor='$warnaover';\" onmouseout=\"this.bgColor='$warna';\">";
			echo '<td width="5">
			'.$i_nomer.'.
			</td>
			<td width="1">
			<a href="'.$ke.'&s=hapus&mgkd='.$i_mgkd.'&pkd='.$i_pkd.'" title="HAPUS --> '.$i_gnam.'"><img src="'.$sumber.'/img/delete.gif" width="16" height="16" border="0"></a>
			</td>
			<td>';

			//nek null
			if (empty($i_mgkd))
				{
				echo "-";
				}
			else
				{
				echo $i_gnam;
				}


			echo '</td>
			<td>';
			//ruang kelas
			$qru1 = mysqli_query($koneksi, "SELECT m_pegawai.*, m_guru.*, m_guru.kd AS mgkd, ".
									"m_guru_prog_pddkn.* ".
									"FROM m_pegawai, m_guru, m_guru_prog_pddkn ".
									"WHERE m_guru.kd_pegawai = m_pegawai.kd ".
									"AND m_guru_prog_pddkn.kd_guru = m_guru.kd ".
									"AND m_guru.kd_tapel = '$tapelkd' ".
									"AND m_pegawai.kd = '$i_mpkd' ".
									"AND m_guru_prog_pddkn.kd_prog_pddkn = '$pelkd'");
			$rru1 = mysqli_fetch_assoc($qru1);
			$tru1 = mysqli_num_rows($qru1);


			do
				{
				$ru1_kelkd = nosql($rru1['kd_kelas']);

				//detail kelas
				$qkelx = mysqli_query($koneksi, "SELECT * FROM m_kelas ".
							"WHERE kd = '$ru1_kelkd'");
				$rkelx = mysqli_fetch_assoc($qkelx);
				$tkelx = mysqli_num_rows($qkelx);
				$kelx_kelas = nosql($rkelx['kelas']);


				echo ''.$kelx_kelas.', ';
				}
			while ($rru1 = mysqli_fetch_assoc($qru1));

			echo '</td>
			</tr>';
			}
		while ($row = mysqli_fetch_assoc($q));

		echo '</table>
		<table width="600" border="0" cellspacing="0" cellpadding="3">
	    	<tr>
	    	<td align="right">Total : <strong><font color="#FF0000">'.$total.'</font></strong> Data.</td>
	    	</tr>
	  	</table>';
		}

	else
		{
		echo '<p>
		<b>
		<font color="red">
		TIDAK ADA DATA
		</font>
		</b>.
		</p>';
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