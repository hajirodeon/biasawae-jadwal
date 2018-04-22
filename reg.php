<?php
session_start();


//ambil nilai
require("inc/config.php");
require("inc/fungsi.php");
require("inc/koneksi.php");
require("inc/class/paging.php");
$tpl = LoadTpl("template/login.html");



nocache;

//nilai
$filenya = "reg.php";
$filenya_ke = $sumber;
$judul = "Daftar Menjadi Pengguna";
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
	$e_nama = cegah($_POST["e_nama"]);
	$e_alamat = cegah($_POST["e_alamat"]);
	$e_sekolah = cegah($_POST["e_sekolah"]);
	$e_telp = cegah($_POST["e_telp"]);
	$e_email = cegah($_POST["e_email"]);
	$e_web = cegah($_POST["e_web"]);
	$e_username = cegah($_POST["e_username"]);
	$e_password = cegah($_POST["e_password"]);
	$e_usernamex = $e_username;
	$e_passwordx = md5($e_password);


	//cek null
	if ((empty($e_username)) OR (empty($e_password)) OR (empty($e_nama)) OR (empty($e_sekolah)))
		{
		//re-direct
		$pesan = "Input Tidak Lengkap. Harap Diulangi...!!";
		pekem($pesan,$filenya);
		exit();
		}
	else
		{
		//query
		$q = mysql_query("SELECT * FROM member ".
							"WHERE usernamex = '$e_username'");
		$row = mysql_fetch_assoc($q);
		$total = mysql_num_rows($q);

		//cek login
		if (empty($total))
			{
			$kd = $x;
			
			//insert
			mysql_query("INSERT INTO member(kd, nama, alamat, ".
							"sekolah, telp, email, web, ".
							"usernamex, passwordx, postdate) VALUES ".
							"('$kd', '$e_nama', '$e_alamat', ".
							"'$e_sekolah', '$e_telp', '$e_email', '$e_web', ".
							"'$e_usernamex', '$e_passwordx', '$today')");
			
			
			session_start();

			//bikin session
			$_SESSION['kd9_session'] = $kd;
			$_SESSION['username9_session'] = $e_usernamex;
			$_SESSION['pass9_session'] = $e_passwordx;
			$_SESSION['member_session'] = "MEMBER";
			$_SESSION['hajirobe_session'] = $hajirobe;

			//re-direct
			$ke = "member/index.php";
			$pesan = "Anda Telah Berhasil Melakukan Pendaftaran. Silahkan Lanjut ya...";
			pekem($pesan,$ke);
			exit();
			}
		else
			{
			//re-direct
			$pesan = "Username Yang Anda Pilih, Sudah Dipergunakan. Silahkan Ganti Lainnya ya...!!.";
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

<font color="green">
<h4>
'.$judul.'
</h4> 
</font>

<table bgcolor="white" width="100%" border="1" cellspacing="0" cellpadding="5">
<tr>
<td>

<p>
Nama :
<br>
<input name="e_nama" type="text" size="30">
</p>


<p>
Alamat :
<br>
<input name="e_alamat" type="text" size="50">
</p>


<p>
Nama Sekolah :
<br>
<input name="e_sekolah" type="text" size="30">
</p>


<p>
Telp :
<br>
<input name="e_telp" type="text" size="20">
</p>

<p>
E-Mail :
<br>
<input name="e_email" type="text" size="30">
</p>

<p>
Web/Situs :
<br>
<input name="e_web" type="text" size="30">
</p>


<hr>
<p>
Username :
<br>
<input name="e_username" type="text" size="20">
</p>


<p>
Password :
<br>
<input name="e_password" type="password" size="20">
</p>




<p>
<input name="btnBTL" type="submit" value="BATAL">
<input name="btnOK" type="submit" value="LANJUT DAFTAR &gt;&gt;&gt;">
</p>

</td>

</tr>
</table>





<table bgcolor="orange" width="100%" border="1" cellspacing="0" cellpadding="5">
<tr>
<td>
<?td>
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
