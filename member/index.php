<?php
session_start();

//ambil nilai
require("../inc/config.php");
require("../inc/fungsi.php");
require("../inc/koneksi.php");
require("../inc/cek/member.php");
$tpl = LoadTpl("../template/index.html");


nocache;

//nilai
$filenya = "index.php";
$judul = "Selamat Datang....";
$judulku = "$judul  [$member_session]";




//isi *START
ob_start();

//menu
require("../inc/menu/member.php");

//isi_menu
$isi_menu = ob_get_contents();
ob_end_clean();




//isi *START
ob_start();

//view //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
echo '<table width="100%" height="100%" border="0" cellspacing="0" cellpadding="3">
<tr valign="middle">
<td valign="middle" align="center">
<p>
Anda Berada di <font color="blue"><strong>MEMBER AREA</strong></font>
</p>
</td>
</tr>
</table>';
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

//isi
$isi = ob_get_contents();
ob_end_clean();

require("../inc/niltpl.php");

//diskonek
xfree($qbw);
xclose($koneksi);
exit();
?>