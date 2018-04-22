<?php
///cek session //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$kd9_session = nosql($_SESSION['kd9_session']);
$username9_session = nosql($_SESSION['username9_session']);
$member_session = nosql($_SESSION['member_session']);
$pass9_session = nosql($_SESSION['pass9_session']);
$hajirobe_session = nosql($_SESSION['hajirobe_session']);

$qbw = mysql_query("SELECT kd FROM member ".
						"WHERE kd = '$kd9_session' ".
						"AND usernamex = '$username9_session' ".
						"AND passwordx = '$pass9_session'");
$rbw = mysql_fetch_assoc($qbw);
$tbw = mysql_num_rows($qbw);

if (($tbw == 0) OR (empty($kd9_session))
	OR (empty($username9_session))
	OR (empty($pass9_session))
	OR (empty($member_session))
	OR (empty($hajirobe_session)))
	{
	//diskonek
	xfree($qbw);
	xclose($koneksi);

	//re-direct
	$pesan = "ANDA BELUM LOGIN. SILAHKAN LOGIN DAHULU...!!!";
	pekem($pesan, $sumber);
	exit();
	}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
?>