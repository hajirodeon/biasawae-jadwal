<?php
session_start();

require("../../inc/config.php");
require("../../inc/fungsi.php");
require("../../inc/koneksi.php");
require("../../inc/cek/member.php");
$tpl = LoadTpl("../../template/index.html");

nocache;

//nilai
$filenya = "mapel.php";
$judul = "Data Mata Pelajaran";
$judulku = "[$member_session] ==> $judul";
$judulx = $judul;
$s = nosql($_REQUEST['s']);
$kd = nosql($_REQUEST['kd']);





//PROSES ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//nek batal
if ($_POST['btnBTL'])
	{
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
	$qx = mysqli_query($koneksi, "SELECT * FROM m_mapel ".
						"WHERE kd_member = '$kd9_session' ".
						"AND kd = '$kdx'");
	$rowx = mysqli_fetch_assoc($qx);
	$e_kode = balikin($rowx['kode']);
	$e_mapel = balikin($rowx['mapel']);
	}





//jika simpan
if ($_POST['btnSMP'])
	{
	//nilai
	$s = nosql($_POST['s']);
	$kd = nosql($_POST['kd']);
	$e_kode = cegah($_POST['e_kode']);
	$e_mapel = cegah($_POST['e_mapel']);


	//nek null
	if ((empty($e_kode)) OR (empty($e_mapel)))
		{
		//re-direct
		$pesan = "Input Tidak Lengkap. Harap Diulangi...!!";
		pekem($pesan,$filenya);
		exit();
		}
	else
		{
		//jika baru
		if (empty($s))
			{
			///cek
			$qcc = mysqli_query($koneksi, "SELECT * FROM m_mapel ".
								"WHERE kd_member = '$kd9_session' ".
								"AND kode = '$e_kode'");
			$rcc = mysqli_fetch_assoc($qcc);
			$tcc = mysqli_num_rows($qcc);


			//nek ada
			if ($tcc != 0)
				{
				//re-direct
				$pesan = "Kode Sudah Ada. Silahkan Ganti Yang Lain...!!";
				pekem($pesan,$filenya);
				exit();
				}
			else
				{
				//insert
				mysqli_query($koneksi, "INSERT INTO m_mapel(kd, kd_member, kode, mapel, postdate) VALUES ".
								"('$x', '$kd9_session', '$e_kode', '$e_mapel', '$today')");

				//re-direct
				xloc($filenya);
				exit();
				}
			}


		//jika update
		else if ($s == "edit")
			{
			//update
			mysqli_query($koneksi, "UPDATE m_mapel SET kode = '$e_kode', ".
							"mapel = '$e_mapel' ".
							"WHERE kd_member = '$kd9_session' ".
							"AND kd = '$kd'");

			//re-direct
			xloc($filenya);
			exit();
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
		mysqli_query($koneksi, "DELETE FROM m_mapel ".
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
require("../../inc/js/jumpmenu.js");
require("../../inc/js/number.js");
require("../../inc/js/checkall.js");
require("../../inc/js/swap.js");
xheadline($judul);

//view //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
echo '<form action="'.$filenya.'" method="post" name="formx">

<p>
Kode :
<br>
<input name="e_kode" type="text" value="'.$e_kode.'" size="5">
</p>

<p>
Nama Mapel :
<br>
<input name="e_mapel" type="text" value="'.$e_mapel.'" size="30">
</p>


<p>
<input name="s" type="hidden" value="'.$s.'">
<input name="kd" type="hidden" value="'.$kd.'">
<input name="btnSMP" type="submit" value="SIMPAN">
<input name="btnBTL" type="submit" value="BATAL">
</p>

<table width="600" border="1" cellspacing="0" cellpadding="3">
<tr valign="top" bgcolor="'.$warnaheader.'">
<td width="1">&nbsp;</td>
<td width="1">&nbsp;</td>
<td width="10"><strong><font color="'.$warnatext.'">Kode</font></strong></td>
<td><strong><font color="'.$warnatext.'">Mata Pelajaran</font></strong></td>
</tr>';




//query
$q1 = mysqli_query($koneksi, "SELECT * FROM m_mapel ".
					"WHERE kd_member = '$kd9_session' ".
					"ORDER BY round(kode) ASC");
$row1 = mysqli_fetch_assoc($q1);
$total1 = mysqli_num_rows($q1);

//jika null, sample aja...
if (empty($total1))
	{
	//query
	$q = mysqli_query($koneksi, "SELECT * FROM m_mapel ".
						"WHERE kd_member = '' ".
						"ORDER BY round(kode) ASC");
	$row = mysqli_fetch_assoc($q);
	$total = mysqli_num_rows($q);
	

	do {
		$nomer = $nomer + 1;
		$kdx = md5("$x$nomer");
		$i_kd = nosql($row['kd']);
		$i_kode = balikin($row['kode']);
		$i_pel = balikin($row['mapel']);
		
		//insert
		mysqli_query($koneksi, "INSERT INTO m_mapel(kd, kd_member, kode, mapel, postdate) VALUES ".
						"('$kdx', '$kd9_session', '$i_kode', '$i_pel', '$today')");

		}
	while ($row = mysqli_fetch_assoc($q));
	}




//query
$q = mysqli_query($koneksi, "SELECT * FROM m_mapel ".
					"WHERE kd_member = '$kd9_session' ".
					"ORDER BY round(kode) ASC");
$row = mysqli_fetch_assoc($q);
$total = mysqli_num_rows($q);


if ($total != 0)
	{
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
		$i_kode = balikin($row['kode']);
		$i_pel = balikin($row['mapel']);

		echo "<tr valign=\"top\" bgcolor=\"$warna\" onmouseover=\"this.bgColor='$warnaover';\" onmouseout=\"this.bgColor='$warna';\">";
		echo '<td>
		<input type="checkbox" name="item'.$nomer.'" value="'.$i_kd.'">
       	</td>
		<td>
		<a href="'.$filenya.'?s=edit&kd='.$i_kd.'">
		<img src="'.$sumber.'/img/edit.gif" width="16" height="16" border="0">
		</a>
		</td>
		<td>'.$i_kode.'</td>
		<td>'.$i_pel.'</td>
       	</tr>';
		}
	while ($row = mysqli_fetch_assoc($q));
	}

echo '</table>

<table width="600" border="0" cellspacing="0" cellpadding="3">
<tr>
<td>
<input name="jml" type="hidden" value="'.$total.'">
<input name="btnALL" type="button" value="SEMUA" onClick="checkAll('.$total.')">
<input name="btnBTL" type="submit" value="BATAL">
<input name="btnHPS" type="submit" value="HAPUS">


Total : <strong><font color="#FF0000">'.$total.'</font></strong> Data.
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