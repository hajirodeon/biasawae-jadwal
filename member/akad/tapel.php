<?php
session_start();

require("../../inc/config.php");
require("../../inc/fungsi.php");
require("../../inc/koneksi.php");
require("../../inc/cek/member.php");
$tpl = LoadTpl("../../template/index.html");

nocache;

//nilai
$filenya = "tapel.php";
$diload = "document.formx.tahun1.focus();";
$judul = "Data Tahun Pelajaran";
$judulku = "[$member_session] ==> $judul";
$judulx = $judul;
$s = nosql($_REQUEST['s']);




//PROSES ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//jika batal
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
	$qx = mysqli_query($koneksi, "SELECT * FROM m_tapel ".
						"WHERE kd_member = '$kd9_session' ".
						"AND kd = '$kdx'");
	$rowx = mysqli_fetch_assoc($qx);
	$tahun1 = nosql($rowx['tahun1']);
	$tahun2 = nosql($rowx['tahun2']);
	}



//jika simpan
if ($_POST['btnSMP'])
	{
	//nilai
	$kd = nosql($_POST['kd']);
	$tahun1 = nosql($_POST['tahun1']);
	$tahun2 = nosql($_POST['tahun2']);

	//nek null
	if ((empty($tahun1)) OR (empty($tahun2)))
		{
		//diskonek
		xfree($qbw);
		xclose($koneksi);

		//re-direct
		$pesan = "Input Tidak Lengkap. Harap Diulangi...!!";
		pekem($pesan,$filenya);
		exit();
		}
	else
		{ //cek
		$qcc = mysqli_query($koneksi, "SELECT * FROM m_tapel ".
								"WHERE kd_member = '$kd9_session' ".
								"AND tahun1 = '$tahun1' ".
								"AND tahun2 = '$tahun2'");
		$rcc = mysqli_fetch_assoc($qcc);
		$tcc = mysqli_num_rows($qcc);

		//nek ada
		if ($tcc != 0)
			{
			//re-direct
			$pesan = "Tahun Pelajaran : $tahun1/$tahun2, Sudah Ada. Silahkan Ganti Yang Lain...!!";
			pekem($pesan,$filenya);
			exit();
			}
		else
			{
			//jika baru
			if (empty($s))
				{
				//query
				mysqli_query($koneksi, "INSERT INTO m_tapel(kd, kd_member, tahun1, tahun2, postdate) VALUES ".
								"('$x', '$kd9_session', '$tahun1', '$tahun2', '$today')");

				//re-direct
				xloc($filenya);
				exit();
				}

			//jika update
			else if ($s == "edit")
				{
				//query
				mysqli_query($koneksi, "UPDATE m_tapel SET tahun1 = '$tahun1', ".
								"tahun2 = '$tahun2' ".
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
		mysqli_query($koneksi, "DELETE FROM m_tapel ".
						"WHERE kd_member = '$kd9_session' ".
						"AND kd = '$kd'");
		}

	//diskonek
	xfree($qbw);
	xclose($koneksi);

	//re-direct
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
require("../../inc/js/number.js");
xheadline($judul);

//view //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
echo '<form action="'.$filenya.'" method="post" name="formx">
<p>
<input name="tahun1" type="text" value="'.$tahun1.'" size="4" maxlength="4" onKeyPress="return numbersonly(this, event)"> /
<input name="tahun2" type="text" value="'.$tahun2.'" size="4" maxlength="4" onKeyPress="return numbersonly(this, event)">
<input name="btnSMP" type="submit" value="SIMPAN">
<input name="btnBTL" type="submit" value="BATAL">
</p>';


//query
$q1 = mysqli_query($koneksi, "SELECT * FROM m_tapel ".
					"WHERE kd_member = '$kd9_session' ".
					"ORDER BY tahun1 ASC");
$row1 = mysqli_fetch_assoc($q1);
$total1 = mysqli_num_rows($q1);

//jika null, kasi sample
if (empty($total1))
	{
	//query
	$q = mysqli_query($koneksi, "SELECT * FROM m_tapel ".
						"WHERE kd_member = '' ".
						"ORDER BY tahun1 ASC");
	$row = mysqli_fetch_assoc($q);
	$total = mysqli_num_rows($q);

	do
		{
		$nomer = $nomer + 1;
		$kdx = md5("$x$nomer");
		$kd = nosql($row['kd']);
		$tahun1 = nosql($row['tahun1']);
		$tahun2 = nosql($row['tahun2']);


		//query
		mysqli_query($koneksi, "INSERT INTO m_tapel(kd, kd_member, tahun1, tahun2, postdate) VALUES ".
						"('$kdx', '$kd9_session', '$tahun1', '$tahun2', '$today')");
		}
	while ($row1 = mysqli_fetch_assoc($q1));
	}


//query
$q = mysqli_query($koneksi, "SELECT * FROM m_tapel ".
					"WHERE kd_member = '$kd9_session' ".
					"ORDER BY tahun1 ASC");
$row = mysqli_fetch_assoc($q);
$total = mysqli_num_rows($q);

if ($total != 0)
	{
	echo '<table width="275" border="1" cellspacing="0" cellpadding="3">
	<tr valign="top" bgcolor="'.$warnaheader.'">
	<td>&nbsp;</td>
	<td>&nbsp;</td>
	<td><strong><font color="'.$warnatext.'">Tahun Pelajaran</font></strong></td>
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
		$kd = nosql($row['kd']);
		$tahun1 = nosql($row['tahun1']);
		$tahun2 = nosql($row['tahun2']);

		echo "<tr valign=\"top\" bgcolor=\"$warna\" onmouseover=\"this.bgColor='$warnaover';\" onmouseout=\"this.bgColor='$warna';\">";
		echo '<td width="1%">
		<input type="checkbox" name="item'.$nomer.'" value="'.$kd.'">
        </td>
		<td width="4%">
		<a href="'.$filenya.'?s=edit&kd='.$kd.'">
		<img src="'.$sumber.'/img/edit.gif" width="16" height="16" border="0">
		</a>
		</td>
		<td width="86%">'.$tahun1.'/'.$tahun2.'</td>
        </tr>';
		}
	while ($row = mysqli_fetch_assoc($q));

	echo '</table>
	<table width="275" border="0" cellspacing="0" cellpadding="3">
	<tr>
	<td>
	<input name="jml" type="hidden" value="'.$total.'">
	<input name="s" type="hidden" value="'.$s.'">
	<input name="kd" type="hidden" value="'.$kdx.'">
	<input name="btnALL" type="button" value="SEMUA" onClick="checkAll('.$total.')">
	<input name="btnBTL" type="reset" value="BATAL">
	<input name="btnHPS" type="submit" value="HAPUS">
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