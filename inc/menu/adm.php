<?php
//nilai
$maine = "$sumber/adm/index.php";


//view //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
echo '<table bgcolor="#E4D6CC" width="100%" border="0" cellspacing="0" cellpadding="5">
<tr>
<td>';
//view //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////





//home //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
echo '<a href="'.$maine.'" title="Home" class="menuku"><strong>HOME</strong>&nbsp;&nbsp;</a> | ';
//home //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////





//setting ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
echo '<A href="#" class="menuku" data-flexmenu="flexmenu1"><strong>SETTING</strong>&nbsp;&nbsp;</A> |
<UL id="flexmenu1" class="flexdropdownmenu">
<LI>
<a href="'.$sumber.'/adm/s/pass.php" title="Ganti Password">Ganti Password</a>
</LI>

<LI>
<a href="'.$sumber.'/adm/s/waktu.php" title="Data Waktu">Data Waktu</a>
</LI>

</UL>';
//setting ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////





//akademik //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
echo '<A href="#" class="menuku" data-flexmenu="flexmenu3"><strong>AKADEMIK</strong>&nbsp;&nbsp;</A> |
<UL id="flexmenu3" class="flexdropdownmenu">
<LI>
<a href="'.$sumber.'/adm/akad/tapel.php" title="Data Tahun Pelajaran">Data Tahun Pelajaran</a>
</LI>
<LI>
<a href="'.$sumber.'/adm/akad/kelas.php" title="Data Kelas">Data Kelas</a>
</LI>
<LI>
<a href="'.$sumber.'/adm/akad/mapel.php" title="Data Mata Pelajaran">Data Mata Pelajaran</a>
</LI>

<LI>
<a href="#" title="Guru">Guru</a>
	<UL>
	<LI>
	<a href="'.$sumber.'/adm/akad/guru.php" title="Data Guru">Data Guru</a>
	</LI>
	<LI>
	<a href="'.$sumber.'/adm/akad/guru_mapel_kelas.php" title="Guru per Mapel">Guru per Mapel</a>
	</LI>
	<LI>
	<a href="'.$sumber.'/adm/akad/guru_mapel_tmp.php" title="Penempatan Guru Mengajar">Penempatan Guru Mengajar</a>
	</LI>
	</UL>
</LI>


<LI>
<a href="#" title="Jadwal">Jadwal</a>
	<UL>
	<LI>
	<a href="'.$sumber.'/adm/jwal/pel.php" title="Jadwal Pelajaran per Kelas">Jadwal Pelajaran per Kelas</a>
	</LI>
	<LI>
	<a href="'.$sumber.'/adm/jwal/pel_hari.php" title="Jadwal Pelajaran per Hari">Jadwal Pelajaran per Hari</a>
	</LI>
	<LI>
	<a href="'.$sumber.'/adm/jwal/guru.php" title="Jadwal Guru Mengajar">Jadwal Guru Mengajar</a>
	</LI>
	</UL>
</LI>

</UL>';
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////







//logout ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
echo '<A href="'.$sumber.'/adm/logout.php" class="menuku" title="Logout / KELUAR"><strong>LogOut</strong></A>
</td>
</tr>
</table>';
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
?>
