<?php
session_start();


//ambil nilai
require("../inc/config.php");
require("../inc/fungsi.php");
require("../inc/koneksi.php");
require("../inc/class/paging.php");
$tpl = LoadTpl("../template/index.html");



nocache;

//nilai
$filenya = "index.php";
$filenya_ke = $sumber;
$judul = "Sistem Informasi Jadwal Mata Pelajaran";
$judulku = $judul;






//PROSES ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//jika batal
if ($_POST['btnBTL'])
	{
	//re-direct
	xloc($filenya);
	exit();
	}





if ($_POST['btnOK'])
	{
	//ambil nilai
	$username = nosql($_POST["usernamex"]);
	$password = md5(nosql($_POST["passwordx"]));

	//cek null
	if ((empty($username)) OR (empty($password)))
		{
		//diskonek
		xclose($koneksi);

		//re-direct
		$pesan = "Input Tidak Lengkap. Harap Diulangi...!!";
		pekem($pesan,$filenya);
		exit();
		}
	else
		{
		//query
		$q = mysqli_query($koneksi, "SELECT * FROM member ".
								"WHERE usernamex = '$username' ".
								"AND passwordx = '$password'");
		$row = mysqli_fetch_assoc($q);
		$total = mysqli_num_rows($q);

		//cek login
		if ($total != 0)
			{
			session_start();

			//bikin session
			$_SESSION['kd6_session'] = nosql($row['kd']);
			$_SESSION['username6_session'] = $username;
			$_SESSION['pass6_session'] = $password;
			$_SESSION['adm_session'] = "ADMINISTRATOR";
			$_SESSION['hajirobe_session'] = $hajirobe;


			//diskonek
			xfree($q);
			xclose($koneksi);

			//re-direct
			$ke = "main.php";
			xloc($ke);
			exit();
			}
		else
			{
			//diskonek
			xfree($q);
			xclose($koneksi);

			//re-direct
			pekem($pesan, $filenya);
			exit();
			}
		}
	}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////








//isi *START
ob_start();



//view //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



//isi *START
ob_start();

require("inc/menu/adm.php");

//isi
$isi_banner = ob_get_contents();
ob_end_clean();





echo '<form action="'.$filenya.'" method="post" name="formx">

<h4>
'.$judul.'
</h4> 

<table bgcolor="white" width="100%" border="1" cellspacing="0" cellpadding="5">
<tr>
<td>

<p>
<img src="'.$sumber.'/img/support.png" width="24" height="24" border="0">
<br>
Username :
<br>
<input name="usernamex" type="text" size="15" onKeyDown="var keyCode = event.keyCode;
if (keyCode == 13)
	{
	document.formx.btnOK.focus();
	document.formx.btnOK.submit();
	}">
<br>


Password :
<br>
<input name="passwordx" type="password" size="15" onKeyDown="var keyCode = event.keyCode;
if (keyCode == 13)
	{
	document.formx.btnOK.focus();
	document.formx.btnOK.submit();
	}">
<br>


<input name="btnBTL" type="submit" value="BATAL">
<input name="btnOK" type="submit" value="OK &gt;&gt;&gt;">
</p>

</td>

</tr>
</table>



</form>';
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

//isi
$isi = ob_get_contents();
ob_end_clean();

require("inc/niltpl.php");


//diskonek
xclose($koneksi);
exit();
?>
