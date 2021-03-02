<?php
session_start();

require("../../inc/config.php");
require("../../inc/fungsi.php");
require("../../inc/koneksi.php");
require("../../inc/cek/member.php");
$tpl = LoadTpl("../../template/index.html");

nocache;

//nilai
$filenya = "kelas.php";
$diload = "document.formx.no.focus();";
$judul = "Data Kelas";
$judulku = "[$member_session] ==> $judul";
$judulx = $judul;
$s = nosql($_REQUEST['s']);
$kd = nosql($_REQUEST['kd']);




//PROSES ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//nek batal
if ($_POST['btnBTL'])
	{
	//diskonek
	xfree($qbw);
	xclose($koneksi);

	//re-direct
	xloc($filenya);
	exit();
	}



//jika edit
if ($s == "edit")
	{
	//nilai
	$kdx = nosql($_REQUEST['kd']);

	//query
	$qx = mysqli_query($koneksi, "SELECT * FROM m_kelas ".
						"WHERE kd_member = '$kd9_session' ".
						"AND kd = '$kdx'");
	$rowx = mysqli_fetch_assoc($qx);
	$e_no = nosql($rowx['no']);
	$e_kelas = balikin($rowx['kelas']);
	$e_ruang = balikin($rowx['ruang']);
	}



//jika simpan
if ($_POST['btnSMP'])
	{
	$s = nosql($_POST['s']);
	$kd = nosql($_POST['kd']);
	$e_no = nosql($_POST['e_no']);
	$e_kelas = cegah($_POST['e_kelas']);
	$e_ruang = cegah($_POST['e_ruang']);

	//nek null
	if ((empty($e_no)) OR (empty($e_kelas)) OR (empty($e_ruang)))
		{
		//re-direct
		$pesan = "Input Tidak Lengkap. Harap Diulangi...!!";
		pekem($pesan,$filenya);
		exit();
		}
	else
		{
		//cek
		$qcc = mysqli_query($koneksi, "SELECT * FROM m_kelas ".
								"WHERE kd_member = '$kd9_session' ".
								"AND kelas = '$e_kelas' ".
								"AND ruang = '$e_ruang'");
		$rcc = mysqli_fetch_assoc($qcc);
		$tcc = mysqli_num_rows($qcc);

		//nek ada
		if ($tcc != 0)
			{
			//re-direct
			$pesan = "Kelas Tersebut Sudah Ada. Silahkan Ganti Yang Lain...!!";
			pekem($pesan,$filenya);
			exit();
			}
		else
			{
			//jika baru
			if (empty($s))
				{
				//query
				mysqli_query($koneksi, "INSERT INTO m_kelas(kd, kd_member, no, kelas, ruang) VALUES ".
								"('$x', '$kd9_session', '$e_no', '$e_kelas', '$e_ruang')");

				//re-direct
				xloc($filenya);
				exit();
				}
				
			//jika update
			else if ($s == "edit")
				{
				//query
				mysqli_query($koneksi, "UPDATE m_kelas SET no = '$e_no', ".
								"kelas = '$e_kelas', ".
								"ruang = '$e_ruang' ".
								"WHERE kd_member = '$kd9_session' ".
								"AND kd = '$kd'");

				//re-direct
				xloc($filenya);
				exit();
				}
			}
		}
	}


//jika hapus
if ($_POST['btnHPS'])
	{
	//ambil nilai
	$jml = nosql($_POST['jml']);

	//ambil semua
	for ($i=1; $i<=$jml;$i++)
		{
		//ambil nilai
		$yuk = "item";
		$yuhu = "$yuk$i";
		$kd = nosql($_POST["$yuhu"]);

		//del
		mysqli_query($koneksi, "DELETE FROM m_kelas ".
						"WHERE kd_member = '$kd9_session' ".
						"AND kd = '$kd'");
		}


	//auto-kembali
	xloc($filenya);
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
require("../../inc/js/checkall.js");
require("../../inc/js/swap.js");
xheadline($judul);

//view //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
echo '<form action="'.$filenya.'" method="post" name="formx">
<p>
No.Index :
<br>
<input name="e_no" type="text" value="'.$e_no.'" size="1" maxlength="1">
</p>

<p>
Kelas :
<br>
<input name="e_kelas" type="text" value="'.$e_kelas.'" size="10">
</p>

<p>
Ruang :
<br>
<input name="e_ruang" type="text" value="'.$e_ruang.'" size="5">
</p>

<p>
<input name="s" type="hidden" value="'.$s.'">
<input name="kd" type="hidden" value="'.$kd.'">
<input name="btnSMP" type="submit" value="SIMPAN">
<input name="btnBTL" type="submit" value="BATAL">
</p>';


//query
$q1 = mysqli_query($koneksi, "SELECT * FROM m_kelas ".
					"WHERE kd_member = '$kd9_session'");
$row1 = mysqli_fetch_assoc($q1);
$total1 = mysqli_num_rows($q1);

//jika null, kasi sample
if (empty($total1))
	{
	//query
	$q = mysqli_query($koneksi, "SELECT * FROM m_kelas ".
						"WHERE kd_member = '' ".
						"ORDER BY round(no) ASC, ".
						"kelas ASC, ".
						"ruang ASC");
	$row = mysqli_fetch_assoc($q);
	$total = mysqli_num_rows($q);

	do
		{
		$nomer = $nomer + 1;
		$kdx = md5("$x$nomer");
		$i_kd = nosql($row['kd']);
		$i_no = nosql($row['no']);
		$i_kelas = balikin2($row['kelas']);
		$i_ruang = balikin2($row['ruang']);
		
		//query
		mysqli_query($koneksi, "INSERT INTO m_kelas(kd, kd_member, no, kelas, ruang) VALUES ".
						"('$kdx', '$kd9_session', '$i_no', '$i_kelas', '$i_ruang')");
		}
	while ($row = mysqli_fetch_assoc($q));
	
	}





//query
$q = mysqli_query($koneksi, "SELECT * FROM m_kelas ".
					"WHERE kd_member = '$kd9_session' ".
					"ORDER BY round(no) ASC, ".
					"kelas ASC, ".
					"ruang ASC");
$row = mysqli_fetch_assoc($q);
$total = mysqli_num_rows($q);

if ($total != 0)
	{
	echo '<table width="300" border="1" cellspacing="0" cellpadding="3">
	<tr bgcolor="'.$warnaheader.'">
	<td width="1">&nbsp;</td>
	<td width="1">&nbsp;</td>
	<td width="1"><strong><font color="'.$warnatext.'">No. Index</font></strong></td>
	<td><strong><font color="'.$warnatext.'">Kelas</font></strong></td>
	<td><strong><font color="'.$warnatext.'">Ruang</font></strong></td>
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
		$i_no = nosql($row['no']);
		$i_kelas = balikin2($row['kelas']);
		$i_ruang = balikin2($row['ruang']);

		echo "<tr valign=\"top\" bgcolor=\"$warna\" onmouseover=\"this.bgColor='$warnaover';\" onmouseout=\"this.bgColor='$warna';\">";
		echo '<td>
		<input type="checkbox" name="item'.$nomer.'" value="'.$i_kd.'">
    	</td>
		<td>
		<a href="'.$filenya.'?s=edit&kd='.$i_kd.'">
		<img src="'.$sumber.'/img/edit.gif" width="16" height="16" border="0">
		</a>
		</td>
		<td>'.$i_no.'</td>
		<td>'.$i_kelas.'</td>
		<td>'.$i_ruang.'</td>
    	</tr>';
		}
	while ($row = mysqli_fetch_assoc($q));

	echo '</table>
	<table width="400" border="0" cellspacing="0" cellpadding="3">
	<tr>
	<td>
	<input name="jml" type="hidden" value="'.$total.'">
	<input name="btnALL" type="button" value="SEMUA" onClick="checkAll('.$total.')">
	<input name="btnBTL" type="submit" value="BATAL">
	<input name="btnHPS" type="submit" value="HAPUS">

	Total : <strong><font color="#FF0000">'.$total.'</font></strong> Data.
	</td>
	</tr>
	</table>';
	}
else
	{
	echo '<p>
	<font color="red">
	<strong>TIDAK ADA DATA. Silahkan Entry Dahulu...!!</strong>
	</font>
	</p>';
	}

echo '</form>';
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
