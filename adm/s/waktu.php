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
$filenya = "waktu.php";
$judul = "Data Waktu";
$judulku = "[$adm_session] ==> $judul";
$judulx = $judul;
$s = nosql($_REQUEST['s']);
$kd = nosql($_REQUEST['kd']);




//PROSES ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//jika batal
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
	$qx = mysqli_query($koneksi, "SELECT * FROM m_waktu ".
						"WHERE kd = '$kdx'");
	$rowx = mysqli_fetch_assoc($qx);
	$e_hrkd = balikin($rowx['kd_hari']);
	$e_jkd = balikin($rowx['kd_jam']);
	$e_no = balikin($rowx['no_urut']);
	$e_waktu = balikin($rowx['waktu']);
	$e_ket = balikin($rowx['ket']);
	}



//jika simpan
if ($_POST['btnSMP'])
	{
	//nilai
	$kd = nosql($_POST['kd']);
	$hrkd = nosql($_POST['e_hari']);
	$jkd = nosql($_POST['e_jam']);
	$e_no = nosql($_POST['e_no']);
	$e_waktu = cegah2($_POST['e_waktu']);
	$e_ket = cegah2($_POST['e_ket']);

	//nek null
	if ((empty($e_no)) OR (empty($e_waktu)))
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
			//query
			mysqli_query($koneksi, "INSERT INTO m_waktu(kd, kd_hari, kd_jam, no_urut, waktu, ket) VALUES ".
							"('$x', '$hrkd', '$jkd', '$e_no', '$e_waktu', '$e_ket')");

			//re-direct
			xloc($filenya);
			exit();
			}

		//jika update
		else if ($s == "edit")
			{
			//query
			mysqli_query($koneksi, "UPDATE m_waktu SET kd_hari = '$hrkd', ".
							"kd_jam = '$jkd', ".
							"no_urut = '$e_no', ".
							"waktu = '$e_waktu', ".
							"ket = '$e_ket' ".
							"WHERE kd = '$kd'");

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
		mysqli_query($koneksi, "DELETE FROM m_waktu ".
						"WHERE kd = '$kd'");
		}

	//re-direct
	xloc($filenya);
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
require("../../inc/js/checkall.js");
require("../../inc/js/swap.js");
require("../../inc/js/number.js");
xheadline($judul);

//view //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
echo '<form action="'.$filenya.'" method="post" name="formx">
<p>
Hari : 
<br>';

//hari-terpilih
$qhrix = mysqli_query($koneksi, "SELECT * FROM m_hari ".
						"WHERE kd = '$e_hrkd'");
$rhrix = mysqli_fetch_assoc($qhrix);
$hrix_kd = nosql($rhrix['kd']);
$hrix_hr = balikin($rhrix['hari']);

echo '<select name="e_hari">
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

</p>

<p>
No.Urut :
<br>';

echo '<select name="e_no">
<option value="'.$e_no.'" selected>'.$e_no.'</option>';

for ($k=1;$k<=12;$k++)
	{
	echo '<option value="'.$k.'">'.$k.'</option>';
	}

echo '</select>

</p>

<p>
Jam ke- :
<br>';

//jam-terpilih
$qjmx = mysqli_query($koneksi, "SELECT * FROM m_jam ".
						"WHERE kd = '$e_jkd'");
$rjmx = mysqli_fetch_assoc($qjmx);
$jmx_kd = nosql($rjmx['kd']);
$jmx_jam = nosql($rjmx['jam']);

echo '<select name="e_jam">
<option value="'.$jmx_kd.'" selected>'.$jmx_jam.'</option>
<option value=""></option>';

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

</p>

<p>
Waktu : 
<br>
<input type="text" name="e_waktu" value="'.$e_waktu.'" size="15">
</p>

<p>
Ket. :
<br>
<input type="text" name="e_ket" value="'.$e_ket.'" size="30">
</p>

<p>
<input name="s" type="hidden" value="'.$s.'">
<input name="kd" type="hidden" value="'.$kd.'">
<input name="btnSMP" type="submit" value="SIMPAN">
<input name="btnBTL" type="submit" value="BATAL">
</p>';

//query
$q = mysqli_query($koneksi, "SELECT m_waktu.* ".
					"FROM m_waktu, m_hari ".
					"WHERE m_waktu.kd_hari = m_hari.kd ".
					"ORDER BY m_hari.no ASC, ".
					"round(m_waktu.no_urut) ASC");
$row = mysqli_fetch_assoc($q);
$total = mysqli_num_rows($q);


if ($total != 0)
	{
	echo '<table width="700" border="1" cellspacing="0" cellpadding="3">
	<tr valign="top" bgcolor="'.$warnaheader.'">
	<td width="1">&nbsp;</td>
	<td width="1">&nbsp;</td>
	<td width="50"><strong><font color="'.$warnatext.'">Hari</font></strong></td>
	<td width="50"><strong><font color="'.$warnatext.'">No. Urut</font></strong></td>
	<td width="50"><strong><font color="'.$warnatext.'">Jam</font></strong></td>
	<td><strong><font color="'.$warnatext.'">Waktu</font></strong></td>
	<td><strong><font color="'.$warnatext.'">Ket</font></strong></td>
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
		$i_hrkd = nosql($row['kd_hari']);
		$i_jkd = nosql($row['kd_jam']);
		$i_nourut = nosql($row['no_urut']);
		$i_waktu = balikin($row['waktu']);
		$i_ket = balikin($row['ket']);

		//hari
		$qjmx = mysqli_query($koneksi, "SELECT * FROM m_hari ".
								"WHERE kd = '$i_hrkd'");
		$rjmx = mysqli_fetch_assoc($qjmx);
		$i_hari = balikin($rjmx['hari']);
		
		
		//jam
		$qjmx = mysqli_query($koneksi, "SELECT * FROM m_jam ".
								"WHERE kd = '$i_jkd'");
		$rjmx = mysqli_fetch_assoc($qjmx);
		$i_jam = balikin($rjmx['jam']);
		
		
		echo "<tr valign=\"top\" bgcolor=\"$warna\" onmouseover=\"this.bgColor='$warnaover';\" onmouseout=\"this.bgColor='$warna';\">";
		echo '<td>
		<input type="checkbox" name="item'.$nomer.'" value="'.$kd.'">
        </td>
		<td>
		<a href="'.$filenya.'?s=edit&kd='.$kd.'">
		<img src="'.$sumber.'/img/edit.gif" width="16" height="16" border="0">
		</a>
		</td>
		<td>'.$i_hari.'</td>
		<td>'.$i_nourut.'</td>
		<td>'.$i_jam.'</td>
		<td>'.$i_waktu.'</td>
		<td>'.$i_ket.'</td>
        </tr>';
		}
	while ($row = mysqli_fetch_assoc($q));

	echo '</table>
	<table border="0" cellspacing="0" cellpadding="3">
	<tr>
	<td>
	<input name="jml" type="hidden" value="'.$total.'">
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