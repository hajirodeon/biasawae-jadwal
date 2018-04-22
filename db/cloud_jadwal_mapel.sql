-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 11 Feb 2016 pada 09.57
-- Versi Server: 10.1.9-MariaDB
-- PHP Version: 5.5.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cloud_jadwal_mapel`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `adminx`
--

CREATE TABLE `adminx` (
  `kd` varchar(50) NOT NULL DEFAULT '',
  `usernamex` varchar(15) NOT NULL DEFAULT '',
  `passwordx` varchar(50) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `adminx`
--

INSERT INTO `adminx` (`kd`, `usernamex`, `passwordx`) VALUES
('e4ea2f7dfb2e5c51e38998599e90afc2', 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal`
--

CREATE TABLE `jadwal` (
  `kd` varchar(50) NOT NULL DEFAULT '',
  `kd_tapel` varchar(50) NOT NULL DEFAULT '',
  `kd_smt` varchar(50) NOT NULL DEFAULT '',
  `kd_kelas` varchar(50) NOT NULL DEFAULT '',
  `kd_hari` varchar(50) NOT NULL DEFAULT '',
  `kd_jam` varchar(50) NOT NULL DEFAULT '',
  `kd_guru_mapel` varchar(50) NOT NULL,
  `kd_member` varchar(50) NOT NULL,
  `postdate` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jadwal`
--

INSERT INTO `jadwal` (`kd`, `kd_tapel`, `kd_smt`, `kd_kelas`, `kd_hari`, `kd_jam`, `kd_guru_mapel`, `kd_member`, `postdate`) VALUES
('95dfde9d1b3188a91e3bea3ed6d8ef92', '7fd69a26245ab95088bcfcccc6cc559e', 'b060de380c57384744177849d22fb584', '54aa97d5ede9ab9ff07b0febef11201c', 'd7c1803d15c88bd82eb4a702b57647f4', '3be17d09596cd245484fed3a4f5576eb', '18b20aa266bbd34de800ecea8274c6ef', '', '0000-00-00 00:00:00'),
('95dfde9d1b3188a91e3bea3ed6d8ef92', '7fd69a26245ab95088bcfcccc6cc559e', 'b060de380c57384744177849d22fb584', '54aa97d5ede9ab9ff07b0febef11201c', 'd7c1803d15c88bd82eb4a702b57647f4', 'b049b4d3490463a7c3db3cea5fc1fa10', '18b20aa266bbd34de800ecea8274c6ef', '', '0000-00-00 00:00:00'),
('c7a3aad6a6cb889c615249ba07fcf15f', '7fd69a26245ab95088bcfcccc6cc559e', 'b060de380c57384744177849d22fb584', '54aa97d5ede9ab9ff07b0febef11201c', 'd7c1803d15c88bd82eb4a702b57647f4', '3be17d09596cd245484fed3a4f5576eb', '41d92788bf0a6265110d49e39b9bfe5f', '', '0000-00-00 00:00:00'),
('c7a3aad6a6cb889c615249ba07fcf15f', '7fd69a26245ab95088bcfcccc6cc559e', 'b060de380c57384744177849d22fb584', '54aa97d5ede9ab9ff07b0febef11201c', 'd7c1803d15c88bd82eb4a702b57647f4', 'b049b4d3490463a7c3db3cea5fc1fa10', '41d92788bf0a6265110d49e39b9bfe5f', '', '0000-00-00 00:00:00'),
('aa0860de136b2ed4bb1c097d42a6e4b8', '7fd69a26245ab95088bcfcccc6cc559e', 'b060de380c57384744177849d22fb584', '54aa97d5ede9ab9ff07b0febef11201c', '7d73752ca4d67f433696f6848afbb107', '02c979304d20859b2fe5c9135c0c269b', '51f893d32191da49871bf474fcb50293', '', '0000-00-00 00:00:00'),
('aa0860de136b2ed4bb1c097d42a6e4b8', '7fd69a26245ab95088bcfcccc6cc559e', 'b060de380c57384744177849d22fb584', '54aa97d5ede9ab9ff07b0febef11201c', '7d73752ca4d67f433696f6848afbb107', 'f341e7faba39e62971b3d538c92e82df', '51f893d32191da49871bf474fcb50293', '', '0000-00-00 00:00:00'),
('2c1ededb322d993b1a4ccf43ba3e065b', '7fd69a26245ab95088bcfcccc6cc559e', 'b060de380c57384744177849d22fb584', '54aa97d5ede9ab9ff07b0febef11201c', 'f88bd7a685a66f4f73219524c1f9e417', '02c979304d20859b2fe5c9135c0c269b', '41d92788bf0a6265110d49e39b9bfe5f', '', '0000-00-00 00:00:00'),
('2c1ededb322d993b1a4ccf43ba3e065b', '7fd69a26245ab95088bcfcccc6cc559e', 'b060de380c57384744177849d22fb584', '54aa97d5ede9ab9ff07b0febef11201c', 'f88bd7a685a66f4f73219524c1f9e417', '21ddd50a146dfd554ddac33c19a21be5', '41d92788bf0a6265110d49e39b9bfe5f', '', '0000-00-00 00:00:00'),
('763560201b5875005fa0e66cc412ad2a', '7fd69a26245ab95088bcfcccc6cc559e', 'b060de380c57384744177849d22fb584', '54aa97d5ede9ab9ff07b0febef11201c', '3bd672f690029e9b72e83b8ad1b2f8ae', '9b0001d3a5a4c413f0bb8e697b0e513f', 'faa06445829cef1d925c572da0727a90', '', '0000-00-00 00:00:00'),
('763560201b5875005fa0e66cc412ad2a', '7fd69a26245ab95088bcfcccc6cc559e', 'b060de380c57384744177849d22fb584', '54aa97d5ede9ab9ff07b0febef11201c', '3bd672f690029e9b72e83b8ad1b2f8ae', 'f78e58e3d8d18775f418762e9426b43d', 'faa06445829cef1d925c572da0727a90', '', '0000-00-00 00:00:00'),
('7e38a40d9213c89c2163edff59a6fe90', '7fd69a26245ab95088bcfcccc6cc559e', 'b060de380c57384744177849d22fb584', '54aa97d5ede9ab9ff07b0febef11201c', 'd7c1803d15c88bd82eb4a702b57647f4', 'b049b4d3490463a7c3db3cea5fc1fa10', 'b7e647eace85ba5c26f0dc5302f6b493', '', '0000-00-00 00:00:00'),
('7e38a40d9213c89c2163edff59a6fe90', '7fd69a26245ab95088bcfcccc6cc559e', 'b060de380c57384744177849d22fb584', '54aa97d5ede9ab9ff07b0febef11201c', 'd7c1803d15c88bd82eb4a702b57647f4', '3be17d09596cd245484fed3a4f5576eb', 'b7e647eace85ba5c26f0dc5302f6b493', '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `member`
--

CREATE TABLE `member` (
  `kd` varchar(50) NOT NULL,
  `fbid` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `sekolah` varchar(100) NOT NULL,
  `telp` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `web` varchar(255) NOT NULL,
  `postdate` datetime NOT NULL,
  `usernamex` varchar(50) NOT NULL,
  `passwordx` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `member`
--

INSERT INTO `member` (`kd`, `fbid`, `nama`, `alamat`, `sekolah`, `telp`, `email`, `web`, `postdate`, `usernamex`, `passwordx`) VALUES
('a8fc4d365e3ed9c9c91bbb9e8f3184f5', '', '1', '1', '1', '1', '1', '1', '2015-10-18 11:05:37', '1', 'c4ca4238a0b923820dcc509a6f75849b'),
('bb9f7aaa0d474c3ab69069acdec2695a', '', 'a', 'a', 'a', 'a', 'axtkeongxa.com', 'a', '2016-02-10 03:07:55', 'a', '0cc175b9c0f1b6a831c399e269772661');

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_guru`
--

CREATE TABLE `m_guru` (
  `kd` varchar(50) NOT NULL DEFAULT '',
  `nip` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `kode` varchar(10) NOT NULL,
  `kd_member` varchar(50) NOT NULL,
  `postdate` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `m_guru`
--

INSERT INTO `m_guru` (`kd`, `nip`, `nama`, `kode`, `kd_member`, `postdate`) VALUES
('67a7131a77725f3c1cee7d938800c466', '1', 'Agus', 'A', '', '0000-00-00 00:00:00'),
('c46f2a2fe9621612ccae6cf7d7513e07', '2', 'Muhajir', 'B', '', '0000-00-00 00:00:00'),
('9f2971ce05bd8c6689f7272fa198dd94', '3', 'BiasaWae', 'C', '', '0000-00-00 00:00:00'),
('a402f741ecaa6939dc199126d89ed258', '1', 'Agus', 'A', 'a8fc4d365e3ed9c9c91bbb9e8f3184f5', '2015-10-18 11:45:57'),
('20f58ef06aeb85673d1e10c539fbbffc', '2', 'Muhajir', 'B', 'a8fc4d365e3ed9c9c91bbb9e8f3184f5', '2015-10-18 11:45:57'),
('83b80e715e59d54ba2f7472e584578b8', '3', 'BiasaWae', 'C', 'a8fc4d365e3ed9c9c91bbb9e8f3184f5', '2015-10-18 11:45:57');

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_guru_jml_jam`
--

CREATE TABLE `m_guru_jml_jam` (
  `kd` varchar(50) NOT NULL,
  `kd_guru` varchar(50) NOT NULL,
  `kd_tapel` varchar(50) NOT NULL,
  `kd_smt` varchar(50) NOT NULL,
  `jml_jam_mingguan` varchar(10) NOT NULL,
  `postdate` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_guru_mapel`
--

CREATE TABLE `m_guru_mapel` (
  `kd` varchar(50) NOT NULL DEFAULT '',
  `kd_guru` varchar(50) NOT NULL DEFAULT '',
  `kd_tapel` varchar(50) NOT NULL DEFAULT '',
  `kd_kelas` varchar(50) NOT NULL,
  `kd_smt` varchar(50) NOT NULL,
  `kd_mapel` varchar(50) NOT NULL,
  `kd_member` varchar(50) NOT NULL,
  `postdate` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `m_guru_mapel`
--

INSERT INTO `m_guru_mapel` (`kd`, `kd_guru`, `kd_tapel`, `kd_kelas`, `kd_smt`, `kd_mapel`, `kd_member`, `postdate`) VALUES
('8f3ddc6e87963764c960c390f7d80b30', 'c46f2a2fe9621612ccae6cf7d7513e07', '7fd69a26245ab95088bcfcccc6cc559e', '54aa97d5ede9ab9ff07b0febef11201c', 'b060de380c57384744177849d22fb584', 'a174d344bdc8497d5335ae3da3ff06fb', '', '0000-00-00 00:00:00'),
('faa06445829cef1d925c572da0727a90', 'c46f2a2fe9621612ccae6cf7d7513e07', '7fd69a26245ab95088bcfcccc6cc559e', '54aa97d5ede9ab9ff07b0febef11201c', 'b060de380c57384744177849d22fb584', '0472858494d781a8bd5d855dee73a417', '', '0000-00-00 00:00:00'),
('41d92788bf0a6265110d49e39b9bfe5f', 'c46f2a2fe9621612ccae6cf7d7513e07', '7fd69a26245ab95088bcfcccc6cc559e', '54aa97d5ede9ab9ff07b0febef11201c', 'b060de380c57384744177849d22fb584', '6e1ca23af751e366d3ce4b37cf4ea1d4', '', '0000-00-00 00:00:00'),
('18b20aa266bbd34de800ecea8274c6ef', '67a7131a77725f3c1cee7d938800c466', '7fd69a26245ab95088bcfcccc6cc559e', '54aa97d5ede9ab9ff07b0febef11201c', 'b060de380c57384744177849d22fb584', 'e5b859a6ca8e1f14b1474edd6436278b', '', '0000-00-00 00:00:00'),
('b7e647eace85ba5c26f0dc5302f6b493', '67a7131a77725f3c1cee7d938800c466', '7fd69a26245ab95088bcfcccc6cc559e', '54aa97d5ede9ab9ff07b0febef11201c', 'b060de380c57384744177849d22fb584', '01321f2e7f9f29886cd6862d8e7278ba', '', '0000-00-00 00:00:00'),
('51f893d32191da49871bf474fcb50293', '67a7131a77725f3c1cee7d938800c466', '7fd69a26245ab95088bcfcccc6cc559e', '54aa97d5ede9ab9ff07b0febef11201c', 'b060de380c57384744177849d22fb584', '6862664ea022602b233a7cff21e3402b', '', '0000-00-00 00:00:00'),
('6e7036e38ab029068a7f00163206589c', 'a402f741ecaa6939dc199126d89ed258', '088b2b16c96e83e144140d7a23c8e992', '1241b067b14c9c2b44fb549448e7a389', 'b060de380c57384744177849d22fb584', 'f33f1cffd8350437c60e15c358ed8bb5', 'a8fc4d365e3ed9c9c91bbb9e8f3184f5', '2015-10-18 11:54:03'),
('e8303bbf411dc2c1c71a36ecfd13bfba', '20f58ef06aeb85673d1e10c539fbbffc', '088b2b16c96e83e144140d7a23c8e992', '1241b067b14c9c2b44fb549448e7a389', 'b060de380c57384744177849d22fb584', 'f4e1fceaf760aa95e143972054e0fa16', 'a8fc4d365e3ed9c9c91bbb9e8f3184f5', '2015-10-18 11:54:07'),
('dd0049c9b2a9c690b60cff6211b5f4ff', '83b80e715e59d54ba2f7472e584578b8', '088b2b16c96e83e144140d7a23c8e992', '1241b067b14c9c2b44fb549448e7a389', 'b060de380c57384744177849d22fb584', '1264b09ef5619e3b108c9faa4306eb62', 'a8fc4d365e3ed9c9c91bbb9e8f3184f5', '2015-10-18 11:54:11'),
('3827ccdaec30de9f61a122ecb5eb2d55', 'a402f741ecaa6939dc199126d89ed258', '088b2b16c96e83e144140d7a23c8e992', '1241b067b14c9c2b44fb549448e7a389', 'b060de380c57384744177849d22fb584', 'd97673620f218414b9a373113b72260e', 'a8fc4d365e3ed9c9c91bbb9e8f3184f5', '2015-10-18 11:54:16'),
('ba3d3fdb641ad39d965f4e287cfac757', '20f58ef06aeb85673d1e10c539fbbffc', '088b2b16c96e83e144140d7a23c8e992', '4fa1fb0c8d1677d6646dad8b6aaba051', 'b060de380c57384744177849d22fb584', 'bd5bd2829fc8cce5c26cf159cdbb23d1', 'a8fc4d365e3ed9c9c91bbb9e8f3184f5', '2015-10-18 11:59:18'),
('e5ec1a2c9b44f682e2d890127e6ded1e', 'a402f741ecaa6939dc199126d89ed258', '7fd69a26245ab95088bcfcccc6cc559e', '1241b067b14c9c2b44fb549448e7a389', 'b060de380c57384744177849d22fb584', 'f33f1cffd8350437c60e15c358ed8bb5', 'a8fc4d365e3ed9c9c91bbb9e8f3184f5', '2016-02-11 09:49:04'),
('f7181569004e7d52e9aee0007d5e493b', '20f58ef06aeb85673d1e10c539fbbffc', '7fd69a26245ab95088bcfcccc6cc559e', '1241b067b14c9c2b44fb549448e7a389', 'b060de380c57384744177849d22fb584', 'f4e1fceaf760aa95e143972054e0fa16', 'a8fc4d365e3ed9c9c91bbb9e8f3184f5', '2016-02-11 09:49:08'),
('12723ef14beeeba8d12ccc6fc4353434', 'a402f741ecaa6939dc199126d89ed258', '7fd69a26245ab95088bcfcccc6cc559e', '241fb0fc181d60a0792dab0ff4991e39', 'b060de380c57384744177849d22fb584', 'd97673620f218414b9a373113b72260e', 'a8fc4d365e3ed9c9c91bbb9e8f3184f5', '2016-02-11 09:50:21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_hari`
--

CREATE TABLE `m_hari` (
  `kd` varchar(50) NOT NULL DEFAULT '',
  `no` char(1) NOT NULL DEFAULT '',
  `hari` varchar(10) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `m_hari`
--

INSERT INTO `m_hari` (`kd`, `no`, `hari`) VALUES
('3bd672f690029e9b72e83b8ad1b2f8ae', '1', 'Senin'),
('d7c1803d15c88bd82eb4a702b57647f4', '2', 'Selasa'),
('7d73752ca4d67f433696f6848afbb107', '3', 'Rabu'),
('f88bd7a685a66f4f73219524c1f9e417', '4', 'Kamis'),
('4fcf418adddd67383212bc1d22c61e98', '5', 'Jum''at'),
('b0f139e46f9efe22e22dba86f523d0fa', '6', 'Sabtu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_jam`
--

CREATE TABLE `m_jam` (
  `kd` varchar(50) NOT NULL DEFAULT '',
  `jam` char(2) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `m_jam`
--

INSERT INTO `m_jam` (`kd`, `jam`) VALUES
('b049b4d3490463a7c3db3cea5fc1fa10', '1'),
('3be17d09596cd245484fed3a4f5576eb', '2'),
('f341e7faba39e62971b3d538c92e82df', '3'),
('02c979304d20859b2fe5c9135c0c269b', '4'),
('21ddd50a146dfd554ddac33c19a21be5', '5'),
('4fcf418adddd67383212bc1d22c61e98', '6'),
('9b0001d3a5a4c413f0bb8e697b0e513f', '7'),
('f78e58e3d8d18775f418762e9426b43d', '8'),
('1bb73a74f58b3ba76720a0f3ab332e59', '9'),
('d3d9446802a44259755d38e6d163e820', '10'),
('6512bd43d9caa6e02c990b0a82652dca', '11'),
('c20ad4d76fe97759aa27a0c99bff6710', '12'),
('c51ce410c124a10e0db5e4b97fc2af39', '13'),
('aab3238922bcc25a6f606eb525ffdc56', '14');

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_kelas`
--

CREATE TABLE `m_kelas` (
  `kd` varchar(50) NOT NULL DEFAULT '',
  `no` char(1) NOT NULL DEFAULT '',
  `kelas` varchar(50) NOT NULL,
  `ruang` varchar(100) NOT NULL,
  `kd_member` varchar(50) NOT NULL,
  `postdate` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `m_kelas`
--

INSERT INTO `m_kelas` (`kd`, `no`, `kelas`, `ruang`, `kd_member`, `postdate`) VALUES
('0403bf94d7a623a6f49217ed7b0d0a99', '1', 'VII', 'C', '', '0000-00-00 00:00:00'),
('693c472f3c592363aa992862125d5ee6', '2', 'VIII', 'C', '', '0000-00-00 00:00:00'),
('f132357467931bcb599014a8c439c8eb', '3', 'IX', 'B', '', '0000-00-00 00:00:00'),
('b815884b3404edd73e5e34bdfd80b7a9', '3', 'IX', 'A', '', '0000-00-00 00:00:00'),
('3c6ffefe97a8ed7927d538fa4ad96ba6', '2', 'VIII', 'B', '', '0000-00-00 00:00:00'),
('688fbd35f753ff900d9ea9b41a048ca1', '1', 'VII', 'B', '', '0000-00-00 00:00:00'),
('aded7f27d705f1d42c1436c8881deb13', '2', 'VIII', 'A', '', '0000-00-00 00:00:00'),
('70f853860fb902df85144c6e9a0404dc', '3', 'IX', 'C', '', '0000-00-00 00:00:00'),
('54aa97d5ede9ab9ff07b0febef11201c', '1', 'VII', 'A', '', '0000-00-00 00:00:00'),
('1241b067b14c9c2b44fb549448e7a389', '1', 'VII', 'A', 'a8fc4d365e3ed9c9c91bbb9e8f3184f5', '0000-00-00 00:00:00'),
('4fa1fb0c8d1677d6646dad8b6aaba051', '1', 'VII', 'B', 'a8fc4d365e3ed9c9c91bbb9e8f3184f5', '0000-00-00 00:00:00'),
('6219322bd2790468b42fb61814fd95b3', '2', 'VIII', 'A', 'a8fc4d365e3ed9c9c91bbb9e8f3184f5', '0000-00-00 00:00:00'),
('241fb0fc181d60a0792dab0ff4991e39', '2', 'VIII', 'B', 'a8fc4d365e3ed9c9c91bbb9e8f3184f5', '0000-00-00 00:00:00'),
('e26a6a53b66daffae3ae86da839aadfc', '3', 'IX', 'A', 'a8fc4d365e3ed9c9c91bbb9e8f3184f5', '0000-00-00 00:00:00'),
('b317287f86b0ab5531572b0a4e884c04', '3', 'IX', 'B', 'a8fc4d365e3ed9c9c91bbb9e8f3184f5', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_mapel`
--

CREATE TABLE `m_mapel` (
  `kd` varchar(50) NOT NULL DEFAULT '',
  `kode` varchar(10) NOT NULL,
  `mapel` varchar(100) NOT NULL,
  `kd_member` varchar(50) NOT NULL,
  `postdate` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `m_mapel`
--

INSERT INTO `m_mapel` (`kd`, `kode`, `mapel`, `kd_member`, `postdate`) VALUES
('e5b859a6ca8e1f14b1474edd6436278b', '1', 'Pendidikan Agama', '', '0000-00-00 00:00:00'),
('6e1ca23af751e366d3ce4b37cf4ea1d4', '2', 'PPKn', '', '0000-00-00 00:00:00'),
('01321f2e7f9f29886cd6862d8e7278ba', '3', 'Bahasa Indonesia', '', '0000-00-00 00:00:00'),
('6862664ea022602b233a7cff21e3402b', '4', 'Matematika', '', '0000-00-00 00:00:00'),
('0472858494d781a8bd5d855dee73a417', '5', 'IPA', '', '0000-00-00 00:00:00'),
('14fb7cc5dd910454f63499838d6a993e', '6', 'IPS', '', '0000-00-00 00:00:00'),
('49e959f44db03d43adad8b3c869d471d', '7', 'Seni Budaya', '', '0000-00-00 00:00:00'),
('a174d344bdc8497d5335ae3da3ff06fb', '8', 'Penjaskes', '', '0000-00-00 00:00:00'),
('ba12037ab932e6d08abf0a01af542fec', '9', 'Bahasa Inggris', '', '0000-00-00 00:00:00'),
('8093474fd77356101fd92ce424822861', '10', 'Bahasa Jawa', '', '0000-00-00 00:00:00'),
('04c3244f3ffbadddbfa307a264dcd305', '11', 'Ketrampilan xgmringx prakarya', '', '0000-00-00 00:00:00'),
('1b05b885db0450344b509fa75cea242f', '12', 'Teknologi Informasi dan Komunikasi', '', '0000-00-00 00:00:00'),
('f33f1cffd8350437c60e15c358ed8bb5', '1', 'Pendidikan Agama', 'a8fc4d365e3ed9c9c91bbb9e8f3184f5', '2015-10-18 11:40:23'),
('f4e1fceaf760aa95e143972054e0fa16', '2', 'PPKn', 'a8fc4d365e3ed9c9c91bbb9e8f3184f5', '2015-10-18 11:40:23'),
('fdabebe5cff8815d03093fc0ffc6afcc', '3', 'Bahasa Indonesia', 'a8fc4d365e3ed9c9c91bbb9e8f3184f5', '2015-10-18 11:40:23'),
('d97673620f218414b9a373113b72260e', '4', 'Matematika', 'a8fc4d365e3ed9c9c91bbb9e8f3184f5', '2015-10-18 11:40:23'),
('786f1e96fa0441869a1eda4378f9a909', '5', 'IPA', 'a8fc4d365e3ed9c9c91bbb9e8f3184f5', '2015-10-18 11:40:23'),
('1264b09ef5619e3b108c9faa4306eb62', '6', 'IPS', 'a8fc4d365e3ed9c9c91bbb9e8f3184f5', '2015-10-18 11:40:23'),
('bd5bd2829fc8cce5c26cf159cdbb23d1', '7', 'Seni Budaya', 'a8fc4d365e3ed9c9c91bbb9e8f3184f5', '2015-10-18 11:40:23'),
('30a3f7e66e41327fe581fad7ba8e44e8', '8', 'Penjaskes', 'a8fc4d365e3ed9c9c91bbb9e8f3184f5', '2015-10-18 11:40:23'),
('76a9d05aaeda1c91fc57e89050f7b4e0', '9', 'Bahasa Inggris', 'a8fc4d365e3ed9c9c91bbb9e8f3184f5', '2015-10-18 11:40:23'),
('b11db5b1ac2228c905538c08c6307769', '10', 'Bahasa Jawa', 'a8fc4d365e3ed9c9c91bbb9e8f3184f5', '2015-10-18 11:40:23'),
('61923ffce45a021a0e8cd92b5c710e5d', '11', 'Ketrampilan / prakarya', 'a8fc4d365e3ed9c9c91bbb9e8f3184f5', '2015-10-18 11:40:23'),
('23108929b4cf4f4def89da66861f2624', '12', 'Teknologi Informasi dan Komunikasi', 'a8fc4d365e3ed9c9c91bbb9e8f3184f5', '2015-10-18 11:40:23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_smt`
--

CREATE TABLE `m_smt` (
  `kd` varchar(50) NOT NULL DEFAULT '',
  `no` varchar(1) NOT NULL,
  `smt` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `m_smt`
--

INSERT INTO `m_smt` (`kd`, `no`, `smt`) VALUES
('b060de380c57384744177849d22fb584', '1', 'Ganjil'),
('900e28393edf271632735d0bb6e9b31c', '2', 'Genap');

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_tapel`
--

CREATE TABLE `m_tapel` (
  `kd` varchar(50) NOT NULL DEFAULT '',
  `tahun1` varchar(4) NOT NULL DEFAULT '',
  `tahun2` varchar(4) NOT NULL DEFAULT '',
  `postdate` datetime NOT NULL,
  `id` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `m_tapel`
--

INSERT INTO `m_tapel` (`kd`, `tahun1`, `tahun2`, `postdate`, `id`) VALUES
('7fd69a26245ab95088bcfcccc6cc559e', '2015', '2016', '0000-00-00 00:00:00', 1),
('ec8b24e7c5f7cb101dc6c9524f1719e3', '2017', '2018', '0000-00-00 00:00:00', 4),
('dbf4a4c6ccc429700ced10081b54718a', '2016', '2017', '2015-10-18 11:28:12', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_waktu`
--

CREATE TABLE `m_waktu` (
  `kd` varchar(50) NOT NULL,
  `kd_hari` varchar(50) NOT NULL,
  `kd_jam` varchar(50) NOT NULL,
  `no_urut` varchar(2) NOT NULL,
  `waktu` varchar(100) NOT NULL,
  `ket` varchar(255) NOT NULL,
  `kd_member` varchar(50) NOT NULL,
  `postdate` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `m_waktu`
--

INSERT INTO `m_waktu` (`kd`, `kd_hari`, `kd_jam`, `no_urut`, `waktu`, `ket`, `kd_member`, `postdate`) VALUES
('81521bad0ded486356d29bca558aba82', '3bd672f690029e9b72e83b8ad1b2f8ae', 'b049b4d3490463a7c3db3cea5fc1fa10', '1', '07.00xstrix07.50', 'UPACARA &  APEL', '', '0000-00-00 00:00:00'),
('143e9135eb03f049bf4446893ccb94d9', '3bd672f690029e9b72e83b8ad1b2f8ae', '3be17d09596cd245484fed3a4f5576eb', '2', '07.50xstrix08.30', '', '', '0000-00-00 00:00:00'),
('57bbe33b1980b64448eaca1fe60f3a81', '3bd672f690029e9b72e83b8ad1b2f8ae', 'f341e7faba39e62971b3d538c92e82df', '3', '08.30xstrix09.10', '', '', '0000-00-00 00:00:00'),
('3caf7f643bcb5c98a9d0db4025ffddfc', '3bd672f690029e9b72e83b8ad1b2f8ae', '', '4', '09.10xstrix09.30', 'ISTIRAHAT', '', '0000-00-00 00:00:00'),
('2f58b08c2e80dc6c3762e6f151729532', '3bd672f690029e9b72e83b8ad1b2f8ae', '02c979304d20859b2fe5c9135c0c269b', '5', '09.30xstrix10.10', '', '', '0000-00-00 00:00:00'),
('1322ee6fa1bb048c3e03a8c5b36a9d52', '3bd672f690029e9b72e83b8ad1b2f8ae', '21ddd50a146dfd554ddac33c19a21be5', '6', '10.10xstrix10.50', '', '', '0000-00-00 00:00:00'),
('df81b8d694a240b8bc8e3b768af268d8', '3bd672f690029e9b72e83b8ad1b2f8ae', '4fcf418adddd67383212bc1d22c61e98', '7', '10.50xstrix11.30', '', '', '0000-00-00 00:00:00'),
('aaf0df3d76a613c4d82752a535086b30', '3bd672f690029e9b72e83b8ad1b2f8ae', '', '8', '11.30xstrix11.55', 'ISTIRAHAT', '', '0000-00-00 00:00:00'),
('51c3e71b751505f6ac167224205261e3', '3bd672f690029e9b72e83b8ad1b2f8ae', '9b0001d3a5a4c413f0bb8e697b0e513f', '9', '11.55xstrix12.35', '', '', '0000-00-00 00:00:00'),
('9b11512ac7b3f2e530f88dac3d35d41d', '3bd672f690029e9b72e83b8ad1b2f8ae', 'f78e58e3d8d18775f418762e9426b43d', '10', '12.35xstrix13.15', '', '', '0000-00-00 00:00:00'),
('2db9c832a77a1ce010c019041e24c22a', '3bd672f690029e9b72e83b8ad1b2f8ae', '1bb73a74f58b3ba76720a0f3ab332e59', '11', '13.15xstrix13.45', 'PEMBUATAN RENCANA DAN PENYELESAIAN ADMINISTRASI PEMBELAJARAN & REMIDIAL', '', '0000-00-00 00:00:00'),
('42c45fc398bc7205add4f373c60b137c', 'd7c1803d15c88bd82eb4a702b57647f4', '', '1', '07.00xstrix07.10', 'TADARUS ALxstrixQURAN', '', '0000-00-00 00:00:00'),
('df91aba60c0bbce9361ae262d3854a07', 'd7c1803d15c88bd82eb4a702b57647f4', 'b049b4d3490463a7c3db3cea5fc1fa10', '2', '07.10xstrix07.50', '', '', '0000-00-00 00:00:00'),
('fc01982070af9433a92d627068faca9b', 'd7c1803d15c88bd82eb4a702b57647f4', '3be17d09596cd245484fed3a4f5576eb', '3', '07.50xstrix08.30', '', '', '0000-00-00 00:00:00'),
('7b68486e52040762bdac3a09ec113799', 'd7c1803d15c88bd82eb4a702b57647f4', 'f341e7faba39e62971b3d538c92e82df', '4', '08.30xstrix09.10', '', '', '0000-00-00 00:00:00'),
('12ac46f2eff7d3ab32851a1ef4c9b617', 'd7c1803d15c88bd82eb4a702b57647f4', '', '5', '09.10xstrix09.30', 'ISTIRAHAT', '', '0000-00-00 00:00:00'),
('a8a9143e3c5481e3ca62abb44f41bfb7', 'd7c1803d15c88bd82eb4a702b57647f4', '02c979304d20859b2fe5c9135c0c269b', '6', '09.30xstrix10.10', '', '', '0000-00-00 00:00:00'),
('d6351c25fbeb770c005de36dc6a770f6', 'd7c1803d15c88bd82eb4a702b57647f4', '21ddd50a146dfd554ddac33c19a21be5', '7', '10.10xstrix10.50', '', '', '0000-00-00 00:00:00'),
('ffdfcacee08221f70fc6888c9ef53a4f', 'd7c1803d15c88bd82eb4a702b57647f4', '4fcf418adddd67383212bc1d22c61e98', '8', '10.50xstrix11.30', '', '', '0000-00-00 00:00:00'),
('706ee7e223beeddc307e682939814c37', 'd7c1803d15c88bd82eb4a702b57647f4', '', '9', '11.30xstrix11.55', 'ISTIRAHAT', '', '0000-00-00 00:00:00'),
('4e1245dde6a1e7171863d68d241bd111', 'd7c1803d15c88bd82eb4a702b57647f4', '9b0001d3a5a4c413f0bb8e697b0e513f', '10', '11.55xstrix12.35', '', '', '0000-00-00 00:00:00'),
('7fddfa8fac6722a56437e5814bda7c35', 'd7c1803d15c88bd82eb4a702b57647f4', 'f78e58e3d8d18775f418762e9426b43d', '11', '12.35xstrix13.15', '', '', '0000-00-00 00:00:00'),
('3761b653260fe3562ad26cf25ff2e3ce', 'd7c1803d15c88bd82eb4a702b57647f4', '1bb73a74f58b3ba76720a0f3ab332e59', '12', '13.15xstrix13.45', 'PEMBUATAN RENCANA DAN PENYELESAIAN ADMINISTRASI PEMBELAJARAN & REMIDIAL', '', '0000-00-00 00:00:00'),
('5f695891b1d9266eddd49760ac0ab690', '7d73752ca4d67f433696f6848afbb107', '', '1', '07.00xstrix07.10', 'TADARUS ALxstrixQURAN', '', '0000-00-00 00:00:00'),
('1d195b499ff49d1d70571836007ae038', '7d73752ca4d67f433696f6848afbb107', 'b049b4d3490463a7c3db3cea5fc1fa10', '2', '07.10xstrix07.50', '', '', '0000-00-00 00:00:00'),
('e5a8b35337449cef5ab8e1f7035ab351', '7d73752ca4d67f433696f6848afbb107', '3be17d09596cd245484fed3a4f5576eb', '3', '07.50xstrix08.30', '', '', '0000-00-00 00:00:00'),
('cafff119143d6a5f0c42234c940431e6', '7d73752ca4d67f433696f6848afbb107', 'f341e7faba39e62971b3d538c92e82df', '4', '08.30xstrix09.10', '', '', '0000-00-00 00:00:00'),
('11d397a4f91bb114ed8f6d06508e1cc7', '7d73752ca4d67f433696f6848afbb107', '', '5', '09.10xstrix09.30', 'ISTIRAHAT', '', '0000-00-00 00:00:00'),
('8cd0d5fede1712bad19ed097290700a6', '7d73752ca4d67f433696f6848afbb107', '02c979304d20859b2fe5c9135c0c269b', '6', '09.30xstrix10.10', '', '', '0000-00-00 00:00:00'),
('280ce2713f5a9221245a1763c6c24a0d', '7d73752ca4d67f433696f6848afbb107', '21ddd50a146dfd554ddac33c19a21be5', '7', '10.10xstrix10.50', '', '', '0000-00-00 00:00:00'),
('376a350a82193a2571c273fcd8e59764', '7d73752ca4d67f433696f6848afbb107', '4fcf418adddd67383212bc1d22c61e98', '8', '10.50xstrix11.30', '', '', '0000-00-00 00:00:00'),
('d86de6dd74535f0ec20939af8c60b426', '7d73752ca4d67f433696f6848afbb107', '', '9', '11.30xstrix11.55', 'ISTIRAHAT', '', '0000-00-00 00:00:00'),
('f399fefd2176ab72f02105f82abdc4da', '7d73752ca4d67f433696f6848afbb107', '9b0001d3a5a4c413f0bb8e697b0e513f', '10', '11.55xstrix12.35', '', '', '0000-00-00 00:00:00'),
('8ad0f4f142446e8fa04f71255e727170', '7d73752ca4d67f433696f6848afbb107', 'f78e58e3d8d18775f418762e9426b43d', '11', '12.35xstrix13.15', '', '', '0000-00-00 00:00:00'),
('d672282bf447b128271e0d3192b37575', '7d73752ca4d67f433696f6848afbb107', '1bb73a74f58b3ba76720a0f3ab332e59', '12', '13.15xstrix13.45', 'PEMBUATAN RENCANA DAN PENYELESAIAN ADMINISTRASI PEMBELAJARAN & REMIDIAL', '', '0000-00-00 00:00:00'),
('421cfee295e1ee09d297e237c80a2c9a', 'f88bd7a685a66f4f73219524c1f9e417', '', '1', '07.00xstrix07.10', 'TADARUS ALxstrixQURAN', '', '0000-00-00 00:00:00'),
('45356a9e8019b9d4d25bc13443bcd0be', 'f88bd7a685a66f4f73219524c1f9e417', 'b049b4d3490463a7c3db3cea5fc1fa10', '2', '07.10xstrix07.50', '', '', '0000-00-00 00:00:00'),
('fe464a99efe5acdb85ca94eef0b7c713', 'f88bd7a685a66f4f73219524c1f9e417', '3be17d09596cd245484fed3a4f5576eb', '3', '07.50xstrix08.30', '', '', '0000-00-00 00:00:00'),
('eb7e893c7673661d87e69de34ade6ccb', 'f88bd7a685a66f4f73219524c1f9e417', 'f341e7faba39e62971b3d538c92e82df', '4', '08.30xstrix09.10', '', '', '0000-00-00 00:00:00'),
('e2bcbb7c854bb8c857c160ce78830e70', 'f88bd7a685a66f4f73219524c1f9e417', '', '5', '09.10xstrix09.30', 'ISTIRAHAT', '', '0000-00-00 00:00:00'),
('f8b904308bf896c9fd4e22801d4651e8', 'f88bd7a685a66f4f73219524c1f9e417', '02c979304d20859b2fe5c9135c0c269b', '6', '09.30xstrix10.10', '', '', '0000-00-00 00:00:00'),
('69e11a2dd352094d0c8ae878db38d4c9', 'f88bd7a685a66f4f73219524c1f9e417', '21ddd50a146dfd554ddac33c19a21be5', '7', '10.10xstrix10.50', '', '', '0000-00-00 00:00:00'),
('bb915b810a7e79d0677fa192db9072d6', 'f88bd7a685a66f4f73219524c1f9e417', '4fcf418adddd67383212bc1d22c61e98', '8', '10.50xstrix11.30', '', '', '0000-00-00 00:00:00'),
('90e652dd507e7e0651427ff10a709a97', 'f88bd7a685a66f4f73219524c1f9e417', '', '9', '11.30xstrix11.55', 'ISTIRAHAT', '', '0000-00-00 00:00:00'),
('e72bbbfa007ac7967472f903411679be', 'f88bd7a685a66f4f73219524c1f9e417', '9b0001d3a5a4c413f0bb8e697b0e513f', '10', '11.55xstrix12.35', '', '', '0000-00-00 00:00:00'),
('c72506d374122341567f0192895cfd6a', 'f88bd7a685a66f4f73219524c1f9e417', 'f78e58e3d8d18775f418762e9426b43d', '11', '12.35xstrix13.15', '', '', '0000-00-00 00:00:00'),
('451d9df5e5b6472a8c3da28767bb9ba4', 'f88bd7a685a66f4f73219524c1f9e417', '1bb73a74f58b3ba76720a0f3ab332e59', '12', '13.15xstrix13.45', 'PEMBUATAN RENCANA DAN PENYELESAIAN ADMINISTRASI PEMBELAJARAN & REMIDIAL', '', '0000-00-00 00:00:00'),
('be389f63d860ea7f83ce03c7bcf1b42f', '4fcf418adddd67383212bc1d22c61e98', '', '1', '07.00 xstrix 07.10', 'TADARUS ALxstrixQURAN', '', '0000-00-00 00:00:00'),
('890aa6b90019052ca8fa8c3633ec1027', '4fcf418adddd67383212bc1d22c61e98', 'b049b4d3490463a7c3db3cea5fc1fa10', '2', '07.10xstrix 07.50', '', '', '0000-00-00 00:00:00'),
('5ec39cc950422eeccb08af25de46f5a7', '4fcf418adddd67383212bc1d22c61e98', '3be17d09596cd245484fed3a4f5576eb', '3', '07.50 xstrix 08.30', '', '', '0000-00-00 00:00:00'),
('dc21738f8e0737b7c92cf434dccc40eb', '4fcf418adddd67383212bc1d22c61e98', '', '4', '08.30 xstrix 08.50', 'ISTIRAHAT', '', '0000-00-00 00:00:00'),
('c2947bece9b33a5f2e48edf9cc9ae8cd', '4fcf418adddd67383212bc1d22c61e98', 'f341e7faba39e62971b3d538c92e82df', '5', '08.50 xstrix 09.30', '', '', '0000-00-00 00:00:00'),
('0deb787ada7fe99e3b8ba321d1902882', '4fcf418adddd67383212bc1d22c61e98', '02c979304d20859b2fe5c9135c0c269b', '6', '09.30 xstrix 10.10', '', '', '0000-00-00 00:00:00'),
('5e2a8624d7f1a4d0bdf47f323c4eb8dd', '4fcf418adddd67383212bc1d22c61e98', '21ddd50a146dfd554ddac33c19a21be5', '7', '10.10 xstrix 10.50', 'KEPRAMUKAAN', '', '0000-00-00 00:00:00'),
('c7dfc8b4cf05d91c2ac233484052ba67', 'b0f139e46f9efe22e22dba86f523d0fa', '', '1', '07.00xstrix07.10', 'TADARUS ALxstrixQURAN', '', '0000-00-00 00:00:00'),
('769de846f1e8c9e42f46339fa435b0b0', 'b0f139e46f9efe22e22dba86f523d0fa', 'b049b4d3490463a7c3db3cea5fc1fa10', '2', '07.10xstrix07.50', '', '', '0000-00-00 00:00:00'),
('641434fd915e29cab390eb08685310f4', 'b0f139e46f9efe22e22dba86f523d0fa', '3be17d09596cd245484fed3a4f5576eb', '3', '07.50xstrix08.30', '', '', '0000-00-00 00:00:00'),
('bbfab1505431ca4825ab169b47e19d06', 'b0f139e46f9efe22e22dba86f523d0fa', 'f341e7faba39e62971b3d538c92e82df', '4', '08.30xstrix09.10', '', '', '0000-00-00 00:00:00'),
('a86b38a2ca2e94b40f98deb4111823d2', 'b0f139e46f9efe22e22dba86f523d0fa', '', '5', '09.10xstrix09.30', 'ISTIRAHAT', '', '0000-00-00 00:00:00'),
('76c4e02c0ea49d397f08711b6071a0ce', 'b0f139e46f9efe22e22dba86f523d0fa', '02c979304d20859b2fe5c9135c0c269b', '6', '09.30xstrix10.10', '', '', '0000-00-00 00:00:00'),
('2c55d2738f08f838a3c947781bb2bbf8', 'b0f139e46f9efe22e22dba86f523d0fa', '21ddd50a146dfd554ddac33c19a21be5', '7', '10.10xstrix10.50', '', '', '0000-00-00 00:00:00'),
('22ad9d64567f1f98b3c010d5ac72e8ff', 'b0f139e46f9efe22e22dba86f523d0fa', '', '8', '10.50xstrix11.10', '', '', '0000-00-00 00:00:00'),
('25ab0bd0f04e0bd424de66405a7cb104', 'b0f139e46f9efe22e22dba86f523d0fa', '4fcf418adddd67383212bc1d22c61e98', '9', '11.10xstrix11.50', '', '', '0000-00-00 00:00:00'),
('c051be9c337c4fd5fca2e0c3c6342534', 'b0f139e46f9efe22e22dba86f523d0fa', '9b0001d3a5a4c413f0bb8e697b0e513f', '10', '11.50xstrix12.30', '', '', '0000-00-00 00:00:00'),
('c5b04b7f03e2c9b4d69f74e6822f2d5d', 'b0f139e46f9efe22e22dba86f523d0fa', '', '11', '12.30xstrix13.10', 'PEMBINAAN xgmringx INFORMASI KEPALA SEKOLAH', '', '0000-00-00 00:00:00'),
('922f6c0b80566026dd7f3506e62532e2', 'b0f139e46f9efe22e22dba86f523d0fa', '', '12', '13.10xstrix13.50', 'PENGEMBANGAN DIRI xgmringx EKSTRAKURIKULER', '', '0000-00-00 00:00:00'),
('f8c6168997079ed225fa781a843f1774', 'b0f139e46f9efe22e22dba86f523d0fa', '', '11', '12.30-13.10', 'PEMBINAAN / INFORMASI KEPALA SEKOLAH', 'a8fc4d365e3ed9c9c91bbb9e8f3184f5', '2015-10-18 11:19:24'),
('c206cf881e156f458f0af38531767242', 'b0f139e46f9efe22e22dba86f523d0fa', '9b0001d3a5a4c413f0bb8e697b0e513f', '10', '11.50-12.30', '', 'a8fc4d365e3ed9c9c91bbb9e8f3184f5', '2015-10-18 11:19:24'),
('a76ee18f31a0809a244d9b7224fcc98e', 'b0f139e46f9efe22e22dba86f523d0fa', '4fcf418adddd67383212bc1d22c61e98', '9', '11.10-11.50', '', 'a8fc4d365e3ed9c9c91bbb9e8f3184f5', '2015-10-18 11:19:24'),
('cb235e9bfba8fa1093847d0f20ca09e6', 'b0f139e46f9efe22e22dba86f523d0fa', '', '8', '10.50-11.10', '', 'a8fc4d365e3ed9c9c91bbb9e8f3184f5', '2015-10-18 11:19:24'),
('455ef7578465ae20d9bd0dbdf1854620', 'b0f139e46f9efe22e22dba86f523d0fa', '21ddd50a146dfd554ddac33c19a21be5', '7', '10.10-10.50', '', 'a8fc4d365e3ed9c9c91bbb9e8f3184f5', '2015-10-18 11:19:24'),
('e421fc0a0697b66222eb3079a2ff3db9', 'b0f139e46f9efe22e22dba86f523d0fa', '', '5', '09.10-09.30', 'ISTIRAHAT', 'a8fc4d365e3ed9c9c91bbb9e8f3184f5', '2015-10-18 11:19:24'),
('c3be4ddd3f7278f0e649eed903b0ec9d', 'b0f139e46f9efe22e22dba86f523d0fa', '02c979304d20859b2fe5c9135c0c269b', '6', '09.30-10.10', '', 'a8fc4d365e3ed9c9c91bbb9e8f3184f5', '2015-10-18 11:19:24'),
('20e54876214e381f4feebba4c15b23d0', 'b0f139e46f9efe22e22dba86f523d0fa', 'f341e7faba39e62971b3d538c92e82df', '4', '08.30-09.10', '', 'a8fc4d365e3ed9c9c91bbb9e8f3184f5', '2015-10-18 11:19:24'),
('7ca0710b633512401d77d570bd44ed4b', 'b0f139e46f9efe22e22dba86f523d0fa', 'b049b4d3490463a7c3db3cea5fc1fa10', '2', '07.10-07.50', '', 'a8fc4d365e3ed9c9c91bbb9e8f3184f5', '2015-10-18 11:19:24'),
('2a13430f102db3896006f84f457c489f', 'b0f139e46f9efe22e22dba86f523d0fa', '3be17d09596cd245484fed3a4f5576eb', '3', '07.50-08.30', '', 'a8fc4d365e3ed9c9c91bbb9e8f3184f5', '2015-10-18 11:19:24'),
('4f87a2aaa7b28cedd893c34e65064810', 'b0f139e46f9efe22e22dba86f523d0fa', '', '1', '07.00-07.10', 'TADARUS AL-QURAN', 'a8fc4d365e3ed9c9c91bbb9e8f3184f5', '2015-10-18 11:19:24'),
('cba7d6f956fde47b6f1d7b3bfc3e72ad', '4fcf418adddd67383212bc1d22c61e98', '21ddd50a146dfd554ddac33c19a21be5', '7', '10.10 - 10.50', 'KEPRAMUKAAN', 'a8fc4d365e3ed9c9c91bbb9e8f3184f5', '2015-10-18 11:19:24'),
('5d62212d828ea3793e459648b4ee1175', '4fcf418adddd67383212bc1d22c61e98', '02c979304d20859b2fe5c9135c0c269b', '6', '09.30 - 10.10', '', 'a8fc4d365e3ed9c9c91bbb9e8f3184f5', '2015-10-18 11:19:24'),
('eb5df9e102e72710473761e0cf291ffb', '4fcf418adddd67383212bc1d22c61e98', 'f341e7faba39e62971b3d538c92e82df', '5', '08.50 - 09.30', '', 'a8fc4d365e3ed9c9c91bbb9e8f3184f5', '2015-10-18 11:19:24'),
('a86ea8ed1bb4b5c7ca8c0e577703e719', '4fcf418adddd67383212bc1d22c61e98', '3be17d09596cd245484fed3a4f5576eb', '3', '07.50 - 08.30', '', 'a8fc4d365e3ed9c9c91bbb9e8f3184f5', '2015-10-18 11:19:24'),
('950ccbaa2353d2a59e67544f8455d698', '4fcf418adddd67383212bc1d22c61e98', '', '4', '08.30 - 08.50', 'ISTIRAHAT', 'a8fc4d365e3ed9c9c91bbb9e8f3184f5', '2015-10-18 11:19:24'),
('8bcfd0f850b57eae6665b2af626a4dc1', '4fcf418adddd67383212bc1d22c61e98', 'b049b4d3490463a7c3db3cea5fc1fa10', '2', '07.10- 07.50', '', 'a8fc4d365e3ed9c9c91bbb9e8f3184f5', '2015-10-18 11:19:24'),
('bdba41c9d372e03f9c68bce82d852405', '4fcf418adddd67383212bc1d22c61e98', '', '1', '07.00 - 07.10', 'TADARUS AL-QURAN', 'a8fc4d365e3ed9c9c91bbb9e8f3184f5', '2015-10-18 11:19:24'),
('b4b08905a6246b58e8d274615b12e220', 'f88bd7a685a66f4f73219524c1f9e417', '1bb73a74f58b3ba76720a0f3ab332e59', '12', '13.15-13.45', 'PEMBUATAN RENCANA DAN PENYELESAIAN ADMINISTRASI PEMBELAJARAN & REMIDIAL', 'a8fc4d365e3ed9c9c91bbb9e8f3184f5', '2015-10-18 11:19:24'),
('9d9418dc308ee07269962130e34d564d', 'f88bd7a685a66f4f73219524c1f9e417', 'f78e58e3d8d18775f418762e9426b43d', '11', '12.35-13.15', '', 'a8fc4d365e3ed9c9c91bbb9e8f3184f5', '2015-10-18 11:19:24'),
('fdef899fbf3679a1039944a8406c6b33', 'f88bd7a685a66f4f73219524c1f9e417', '', '9', '11.30-11.55', 'ISTIRAHAT', 'a8fc4d365e3ed9c9c91bbb9e8f3184f5', '2015-10-18 11:19:24'),
('96f00f938a8118ba5f2b3dfedc592a65', 'f88bd7a685a66f4f73219524c1f9e417', '9b0001d3a5a4c413f0bb8e697b0e513f', '10', '11.55-12.35', '', 'a8fc4d365e3ed9c9c91bbb9e8f3184f5', '2015-10-18 11:19:24'),
('649bd68ec592817c007fcd156f5e2835', 'f88bd7a685a66f4f73219524c1f9e417', '4fcf418adddd67383212bc1d22c61e98', '8', '10.50-11.30', '', 'a8fc4d365e3ed9c9c91bbb9e8f3184f5', '2015-10-18 11:19:24'),
('356797cc43748ac292b1befeb004a6d8', 'f88bd7a685a66f4f73219524c1f9e417', '21ddd50a146dfd554ddac33c19a21be5', '7', '10.10-10.50', '', 'a8fc4d365e3ed9c9c91bbb9e8f3184f5', '2015-10-18 11:19:24'),
('e31e623202849fd9117c6dfcb965d49e', 'f88bd7a685a66f4f73219524c1f9e417', '', '5', '09.10-09.30', 'ISTIRAHAT', 'a8fc4d365e3ed9c9c91bbb9e8f3184f5', '2015-10-18 11:19:24'),
('a3ec96f4a8e84fa810c27e1c16f72db2', 'f88bd7a685a66f4f73219524c1f9e417', '02c979304d20859b2fe5c9135c0c269b', '6', '09.30-10.10', '', 'a8fc4d365e3ed9c9c91bbb9e8f3184f5', '2015-10-18 11:19:24'),
('929db699ab63f171bdcd9f40f279df65', 'f88bd7a685a66f4f73219524c1f9e417', '3be17d09596cd245484fed3a4f5576eb', '3', '07.50-08.30', '', 'a8fc4d365e3ed9c9c91bbb9e8f3184f5', '2015-10-18 11:19:24'),
('0b6e65abf1b07544e3ef93e55082e466', 'f88bd7a685a66f4f73219524c1f9e417', 'f341e7faba39e62971b3d538c92e82df', '4', '08.30-09.10', '', 'a8fc4d365e3ed9c9c91bbb9e8f3184f5', '2015-10-18 11:19:24'),
('ec792b7a490502060365a4c999fca357', 'f88bd7a685a66f4f73219524c1f9e417', 'b049b4d3490463a7c3db3cea5fc1fa10', '2', '07.10-07.50', '', 'a8fc4d365e3ed9c9c91bbb9e8f3184f5', '2015-10-18 11:19:24'),
('a74d94d486763f476b3e959bcd62bd34', 'f88bd7a685a66f4f73219524c1f9e417', '', '1', '07.00-07.10', 'TADARUS AL-QURAN', 'a8fc4d365e3ed9c9c91bbb9e8f3184f5', '2015-10-18 11:19:24'),
('185bcfa5c1ec83c333e6d8a86d814089', '7d73752ca4d67f433696f6848afbb107', '1bb73a74f58b3ba76720a0f3ab332e59', '12', '13.15-13.45', 'PEMBUATAN RENCANA DAN PENYELESAIAN ADMINISTRASI PEMBELAJARAN & REMIDIAL', 'a8fc4d365e3ed9c9c91bbb9e8f3184f5', '2015-10-18 11:19:24'),
('dbe7c4c56274adae45d3afed0ce0f24d', '7d73752ca4d67f433696f6848afbb107', 'f78e58e3d8d18775f418762e9426b43d', '11', '12.35-13.15', '', 'a8fc4d365e3ed9c9c91bbb9e8f3184f5', '2015-10-18 11:19:24'),
('fbd38644928efe414d4bc9a85cce9cfb', '7d73752ca4d67f433696f6848afbb107', '', '9', '11.30-11.55', 'ISTIRAHAT', 'a8fc4d365e3ed9c9c91bbb9e8f3184f5', '2015-10-18 11:19:24'),
('b4fedd333b2e993d151cc75a728b704b', '7d73752ca4d67f433696f6848afbb107', '9b0001d3a5a4c413f0bb8e697b0e513f', '10', '11.55-12.35', '', 'a8fc4d365e3ed9c9c91bbb9e8f3184f5', '2015-10-18 11:19:24'),
('a6fadf4660b4cffc2cde4041e2f6b8d3', '7d73752ca4d67f433696f6848afbb107', '4fcf418adddd67383212bc1d22c61e98', '8', '10.50-11.30', '', 'a8fc4d365e3ed9c9c91bbb9e8f3184f5', '2015-10-18 11:19:24'),
('a5611a68f91ace009b9bb421ee18ef15', '7d73752ca4d67f433696f6848afbb107', '21ddd50a146dfd554ddac33c19a21be5', '7', '10.10-10.50', '', 'a8fc4d365e3ed9c9c91bbb9e8f3184f5', '2015-10-18 11:19:24'),
('7fa2278ddbaf95192c10a8162b06e09d', '7d73752ca4d67f433696f6848afbb107', '', '5', '09.10-09.30', 'ISTIRAHAT', 'a8fc4d365e3ed9c9c91bbb9e8f3184f5', '2015-10-18 11:19:24'),
('f924ed670efc0d6c5cf735935099dad4', '7d73752ca4d67f433696f6848afbb107', '02c979304d20859b2fe5c9135c0c269b', '6', '09.30-10.10', '', 'a8fc4d365e3ed9c9c91bbb9e8f3184f5', '2015-10-18 11:19:24'),
('9ec702cbaa375fb7f7f28b9b47d4377d', '7d73752ca4d67f433696f6848afbb107', 'f341e7faba39e62971b3d538c92e82df', '4', '08.30-09.10', '', 'a8fc4d365e3ed9c9c91bbb9e8f3184f5', '2015-10-18 11:19:24'),
('2bb3fd0a00f4ed0b02760e8410fee1f4', '7d73752ca4d67f433696f6848afbb107', '3be17d09596cd245484fed3a4f5576eb', '3', '07.50-08.30', '', 'a8fc4d365e3ed9c9c91bbb9e8f3184f5', '2015-10-18 11:19:24'),
('25841bd6274c8e8919eff97c6d03a2c0', '7d73752ca4d67f433696f6848afbb107', 'b049b4d3490463a7c3db3cea5fc1fa10', '2', '07.10-07.50', '', 'a8fc4d365e3ed9c9c91bbb9e8f3184f5', '2015-10-18 11:19:24'),
('7ee83212a724851a629f9092d273b13b', '7d73752ca4d67f433696f6848afbb107', '', '1', '07.00-07.10', 'TADARUS AL-QURAN', 'a8fc4d365e3ed9c9c91bbb9e8f3184f5', '2015-10-18 11:19:24'),
('b8531b6ec963ce9c53fffa861cab3514', 'd7c1803d15c88bd82eb4a702b57647f4', '1bb73a74f58b3ba76720a0f3ab332e59', '12', '13.15-13.45', 'PEMBUATAN RENCANA DAN PENYELESAIAN ADMINISTRASI PEMBELAJARAN & REMIDIAL', 'a8fc4d365e3ed9c9c91bbb9e8f3184f5', '2015-10-18 11:19:24'),
('18c4534e5d7ea921fd9d06227cf6309f', 'd7c1803d15c88bd82eb4a702b57647f4', 'f78e58e3d8d18775f418762e9426b43d', '11', '12.35-13.15', '', 'a8fc4d365e3ed9c9c91bbb9e8f3184f5', '2015-10-18 11:19:24'),
('2fa900fb47547804040bfa2be56dea4f', 'd7c1803d15c88bd82eb4a702b57647f4', '9b0001d3a5a4c413f0bb8e697b0e513f', '10', '11.55-12.35', '', 'a8fc4d365e3ed9c9c91bbb9e8f3184f5', '2015-10-18 11:19:24'),
('bf864d1031cfc8631286431c96de2ab3', 'd7c1803d15c88bd82eb4a702b57647f4', '', '9', '11.30-11.55', 'ISTIRAHAT', 'a8fc4d365e3ed9c9c91bbb9e8f3184f5', '2015-10-18 11:19:24'),
('dfca0d998b6bf40d2f841e41f99f8eff', 'd7c1803d15c88bd82eb4a702b57647f4', '4fcf418adddd67383212bc1d22c61e98', '8', '10.50-11.30', '', 'a8fc4d365e3ed9c9c91bbb9e8f3184f5', '2015-10-18 11:19:24'),
('59fccc48dc01ffe8661bcb685dddb1ab', 'd7c1803d15c88bd82eb4a702b57647f4', '21ddd50a146dfd554ddac33c19a21be5', '7', '10.10-10.50', '', 'a8fc4d365e3ed9c9c91bbb9e8f3184f5', '2015-10-18 11:19:24'),
('a7bdca76c886ebcf768875c13c065545', 'd7c1803d15c88bd82eb4a702b57647f4', '02c979304d20859b2fe5c9135c0c269b', '6', '09.30-10.10', '', 'a8fc4d365e3ed9c9c91bbb9e8f3184f5', '2015-10-18 11:19:24'),
('ffc33998ca8ffb46ec087a421b2ab9fa', 'd7c1803d15c88bd82eb4a702b57647f4', 'f341e7faba39e62971b3d538c92e82df', '4', '08.30-09.10', '', 'a8fc4d365e3ed9c9c91bbb9e8f3184f5', '2015-10-18 11:19:24'),
('4991b4dfc3ba1c5bc3ed26aa2b8f88f2', 'd7c1803d15c88bd82eb4a702b57647f4', '', '5', '09.10-09.30', 'ISTIRAHAT', 'a8fc4d365e3ed9c9c91bbb9e8f3184f5', '2015-10-18 11:19:24'),
('8f2083536e31626275be4f6c6ed8828f', 'd7c1803d15c88bd82eb4a702b57647f4', '3be17d09596cd245484fed3a4f5576eb', '3', '07.50-08.30', '', 'a8fc4d365e3ed9c9c91bbb9e8f3184f5', '2015-10-18 11:19:24'),
('621ee3a789dd43c193d253d96a2a0afb', 'd7c1803d15c88bd82eb4a702b57647f4', 'b049b4d3490463a7c3db3cea5fc1fa10', '2', '07.10-07.50', '', 'a8fc4d365e3ed9c9c91bbb9e8f3184f5', '2015-10-18 11:19:24'),
('9525a7349ff2818f299a9358fb311703', 'd7c1803d15c88bd82eb4a702b57647f4', '', '1', '07.00-07.10', 'TADARUS AL-QURAN', 'a8fc4d365e3ed9c9c91bbb9e8f3184f5', '2015-10-18 11:19:24'),
('9361b6e6f59359806390253e375fe1eb', '3bd672f690029e9b72e83b8ad1b2f8ae', '1bb73a74f58b3ba76720a0f3ab332e59', '11', '13.15-13.45', 'PEMBUATAN RENCANA DAN PENYELESAIAN ADMINISTRASI PEMBELAJARAN & REMIDIAL', 'a8fc4d365e3ed9c9c91bbb9e8f3184f5', '2015-10-18 11:19:24'),
('d8d06be095326974bca14dcd33287540', '3bd672f690029e9b72e83b8ad1b2f8ae', 'f78e58e3d8d18775f418762e9426b43d', '10', '12.35-13.15', '', 'a8fc4d365e3ed9c9c91bbb9e8f3184f5', '2015-10-18 11:19:24'),
('f3c9d238972a3ff303dea1ec22d1a4df', '3bd672f690029e9b72e83b8ad1b2f8ae', '9b0001d3a5a4c413f0bb8e697b0e513f', '9', '11.55-12.35', '', 'a8fc4d365e3ed9c9c91bbb9e8f3184f5', '2015-10-18 11:19:24'),
('5aa0fcf2388f37bb1927b409f5743a62', '3bd672f690029e9b72e83b8ad1b2f8ae', '', '8', '11.30-11.55', 'ISTIRAHAT', 'a8fc4d365e3ed9c9c91bbb9e8f3184f5', '2015-10-18 11:19:24'),
('e6e8f48723479aa06d599e1292bb5c82', '3bd672f690029e9b72e83b8ad1b2f8ae', '4fcf418adddd67383212bc1d22c61e98', '7', '10.50-11.30', '', 'a8fc4d365e3ed9c9c91bbb9e8f3184f5', '2015-10-18 11:19:24'),
('6c46b2f4ece9f04f4c48f01cac36f6da', '3bd672f690029e9b72e83b8ad1b2f8ae', '21ddd50a146dfd554ddac33c19a21be5', '6', '10.10-10.50', '', 'a8fc4d365e3ed9c9c91bbb9e8f3184f5', '2015-10-18 11:19:24'),
('083757c0a739eb409805a82b3d514aa7', '3bd672f690029e9b72e83b8ad1b2f8ae', '02c979304d20859b2fe5c9135c0c269b', '5', '09.30-10.10', '', 'a8fc4d365e3ed9c9c91bbb9e8f3184f5', '2015-10-18 11:19:24'),
('1c047d2d61327c42db53ad50c76c1b04', '3bd672f690029e9b72e83b8ad1b2f8ae', '', '4', '09.10-09.30', 'ISTIRAHAT', 'a8fc4d365e3ed9c9c91bbb9e8f3184f5', '2015-10-18 11:19:24'),
('ab0d628eeccedc49f94f6d1a8f82bc9e', '3bd672f690029e9b72e83b8ad1b2f8ae', 'f341e7faba39e62971b3d538c92e82df', '3', '08.30-09.10', '', 'a8fc4d365e3ed9c9c91bbb9e8f3184f5', '2015-10-18 11:19:24'),
('c54acda418c1f5c03768cabb8e5ef9e0', '3bd672f690029e9b72e83b8ad1b2f8ae', '3be17d09596cd245484fed3a4f5576eb', '2', '07.50-08.30', '', 'a8fc4d365e3ed9c9c91bbb9e8f3184f5', '2015-10-18 11:19:24'),
('3f93585f605d75f6f722b3599c510b28', '3bd672f690029e9b72e83b8ad1b2f8ae', 'b049b4d3490463a7c3db3cea5fc1fa10', '1', '07.00-07.50', 'UPACARA &  APEL', 'a8fc4d365e3ed9c9c91bbb9e8f3184f5', '2015-10-18 11:19:24'),
('3586c8c594f1d562840b2c316eec6139', 'b0f139e46f9efe22e22dba86f523d0fa', '', '12', '13.10-13.50', 'PENGEMBANGAN DIRI / EKSTRAKURIKULER', 'a8fc4d365e3ed9c9c91bbb9e8f3184f5', '2015-10-18 11:19:24'),
('a1c8e15991ffe138256279e974ba4186', '3bd672f690029e9b72e83b8ad1b2f8ae', 'b049b4d3490463a7c3db3cea5fc1fa10', '1', '07.00-07.50', 'UPACARA &  APEL', 'bb9f7aaa0d474c3ab69069acdec2695a', '2016-02-10 03:08:08'),
('ad3922e3ede3d24cf56e055b003e093c', '3bd672f690029e9b72e83b8ad1b2f8ae', '3be17d09596cd245484fed3a4f5576eb', '2', '07.50-08.30', '', 'bb9f7aaa0d474c3ab69069acdec2695a', '2016-02-10 03:08:08'),
('0c72a48251aa957bdb48c35a6d9da225', '3bd672f690029e9b72e83b8ad1b2f8ae', 'f341e7faba39e62971b3d538c92e82df', '3', '08.30-09.10', '', 'bb9f7aaa0d474c3ab69069acdec2695a', '2016-02-10 03:08:08'),
('bfbb0ad16dbd3f59491c7d0a6a2b09c6', '3bd672f690029e9b72e83b8ad1b2f8ae', '', '4', '09.10-09.30', 'ISTIRAHAT', 'bb9f7aaa0d474c3ab69069acdec2695a', '2016-02-10 03:08:08'),
('1c7f2f4a28a8b3cd8a7c68c30b02fd2f', '3bd672f690029e9b72e83b8ad1b2f8ae', '02c979304d20859b2fe5c9135c0c269b', '5', '09.30-10.10', '', 'bb9f7aaa0d474c3ab69069acdec2695a', '2016-02-10 03:08:08'),
('7cb5c3e60f434796f8bc14f847afae15', '3bd672f690029e9b72e83b8ad1b2f8ae', '21ddd50a146dfd554ddac33c19a21be5', '6', '10.10-10.50', '', 'bb9f7aaa0d474c3ab69069acdec2695a', '2016-02-10 03:08:08'),
('22359921e71446f99637aaed762cc2db', '3bd672f690029e9b72e83b8ad1b2f8ae', '4fcf418adddd67383212bc1d22c61e98', '7', '10.50-11.30', '', 'bb9f7aaa0d474c3ab69069acdec2695a', '2016-02-10 03:08:08'),
('ae3ed25ec2089651edee959d524320b3', '3bd672f690029e9b72e83b8ad1b2f8ae', '', '8', '11.30-11.55', 'ISTIRAHAT', 'bb9f7aaa0d474c3ab69069acdec2695a', '2016-02-10 03:08:08'),
('9c43effef92fa8d7ec6439da36d03758', '3bd672f690029e9b72e83b8ad1b2f8ae', '9b0001d3a5a4c413f0bb8e697b0e513f', '9', '11.55-12.35', '', 'bb9f7aaa0d474c3ab69069acdec2695a', '2016-02-10 03:08:08'),
('3889c496583ef41d977c2e6f8f86ea28', '3bd672f690029e9b72e83b8ad1b2f8ae', 'f78e58e3d8d18775f418762e9426b43d', '10', '12.35-13.15', '', 'bb9f7aaa0d474c3ab69069acdec2695a', '2016-02-10 03:08:08'),
('b1ab835cda24fea376bdd10516e4b7c5', '3bd672f690029e9b72e83b8ad1b2f8ae', '1bb73a74f58b3ba76720a0f3ab332e59', '11', '13.15-13.45', 'PEMBUATAN RENCANA DAN PENYELESAIAN ADMINISTRASI PEMBELAJARAN & REMIDIAL', 'bb9f7aaa0d474c3ab69069acdec2695a', '2016-02-10 03:08:08'),
('b0c007fdd3cd40ae270b9e8c64f91f52', 'd7c1803d15c88bd82eb4a702b57647f4', '', '1', '07.00-07.10', 'TADARUS AL-QURAN', 'bb9f7aaa0d474c3ab69069acdec2695a', '2016-02-10 03:08:08'),
('282ccab85b4affdc42f24fe9b19bbd3d', 'd7c1803d15c88bd82eb4a702b57647f4', 'b049b4d3490463a7c3db3cea5fc1fa10', '2', '07.10-07.50', '', 'bb9f7aaa0d474c3ab69069acdec2695a', '2016-02-10 03:08:08'),
('34082bc78e874903306910f6f8ccaff1', 'd7c1803d15c88bd82eb4a702b57647f4', '3be17d09596cd245484fed3a4f5576eb', '3', '07.50-08.30', '', 'bb9f7aaa0d474c3ab69069acdec2695a', '2016-02-10 03:08:08'),
('12961633e2626ce48cb567d1cf25e448', 'd7c1803d15c88bd82eb4a702b57647f4', 'f341e7faba39e62971b3d538c92e82df', '4', '08.30-09.10', '', 'bb9f7aaa0d474c3ab69069acdec2695a', '2016-02-10 03:08:08'),
('ebe6fbe4a8d9f9f9907436a49f5f4006', 'd7c1803d15c88bd82eb4a702b57647f4', '', '5', '09.10-09.30', 'ISTIRAHAT', 'bb9f7aaa0d474c3ab69069acdec2695a', '2016-02-10 03:08:08'),
('a3eb6141ff9e22072443cd9da9517049', 'd7c1803d15c88bd82eb4a702b57647f4', '02c979304d20859b2fe5c9135c0c269b', '6', '09.30-10.10', '', 'bb9f7aaa0d474c3ab69069acdec2695a', '2016-02-10 03:08:08'),
('844d18eddfc18ab822ecd93e4df7f691', 'd7c1803d15c88bd82eb4a702b57647f4', '21ddd50a146dfd554ddac33c19a21be5', '7', '10.10-10.50', '', 'bb9f7aaa0d474c3ab69069acdec2695a', '2016-02-10 03:08:08'),
('ed0ca3d00cce673a37cf802534e298d4', 'd7c1803d15c88bd82eb4a702b57647f4', '4fcf418adddd67383212bc1d22c61e98', '8', '10.50-11.30', '', 'bb9f7aaa0d474c3ab69069acdec2695a', '2016-02-10 03:08:08'),
('1bf62079155207d2fe3e725351adb8e0', 'd7c1803d15c88bd82eb4a702b57647f4', '', '9', '11.30-11.55', 'ISTIRAHAT', 'bb9f7aaa0d474c3ab69069acdec2695a', '2016-02-10 03:08:08'),
('d176595d53afb03a7e2190c4465a66e2', 'd7c1803d15c88bd82eb4a702b57647f4', '9b0001d3a5a4c413f0bb8e697b0e513f', '10', '11.55-12.35', '', 'bb9f7aaa0d474c3ab69069acdec2695a', '2016-02-10 03:08:08'),
('afd01ab435e63145b9f06feeb5f9cfbc', 'd7c1803d15c88bd82eb4a702b57647f4', 'f78e58e3d8d18775f418762e9426b43d', '11', '12.35-13.15', '', 'bb9f7aaa0d474c3ab69069acdec2695a', '2016-02-10 03:08:08'),
('7aa64991278390e78cebc9e1f2c64a35', 'd7c1803d15c88bd82eb4a702b57647f4', '1bb73a74f58b3ba76720a0f3ab332e59', '12', '13.15-13.45', 'PEMBUATAN RENCANA DAN PENYELESAIAN ADMINISTRASI PEMBELAJARAN & REMIDIAL', 'bb9f7aaa0d474c3ab69069acdec2695a', '2016-02-10 03:08:08'),
('954a84810f562eba1b1e76fc232b79d4', '7d73752ca4d67f433696f6848afbb107', '', '1', '07.00-07.10', 'TADARUS AL-QURAN', 'bb9f7aaa0d474c3ab69069acdec2695a', '2016-02-10 03:08:08'),
('c16501963d574b93609f471f25f55f01', '7d73752ca4d67f433696f6848afbb107', 'b049b4d3490463a7c3db3cea5fc1fa10', '2', '07.10-07.50', '', 'bb9f7aaa0d474c3ab69069acdec2695a', '2016-02-10 03:08:08'),
('9574241d8b9cdc31c433e489883ee06d', '7d73752ca4d67f433696f6848afbb107', '3be17d09596cd245484fed3a4f5576eb', '3', '07.50-08.30', '', 'bb9f7aaa0d474c3ab69069acdec2695a', '2016-02-10 03:08:08'),
('d818f69465b5fa096afcb448a4183390', '7d73752ca4d67f433696f6848afbb107', 'f341e7faba39e62971b3d538c92e82df', '4', '08.30-09.10', '', 'bb9f7aaa0d474c3ab69069acdec2695a', '2016-02-10 03:08:08'),
('236ac259fa7d5a5cab7775524ff8c371', '7d73752ca4d67f433696f6848afbb107', '', '5', '09.10-09.30', 'ISTIRAHAT', 'bb9f7aaa0d474c3ab69069acdec2695a', '2016-02-10 03:08:08'),
('565ff53b3bba3df2a2cf32f48c879575', '7d73752ca4d67f433696f6848afbb107', '02c979304d20859b2fe5c9135c0c269b', '6', '09.30-10.10', '', 'bb9f7aaa0d474c3ab69069acdec2695a', '2016-02-10 03:08:08'),
('6326f9e69f63a7f5fa79e213dc9b24d5', '7d73752ca4d67f433696f6848afbb107', '21ddd50a146dfd554ddac33c19a21be5', '7', '10.10-10.50', '', 'bb9f7aaa0d474c3ab69069acdec2695a', '2016-02-10 03:08:08'),
('3ec7034490f4a92ed2431898876b277d', '7d73752ca4d67f433696f6848afbb107', '4fcf418adddd67383212bc1d22c61e98', '8', '10.50-11.30', '', 'bb9f7aaa0d474c3ab69069acdec2695a', '2016-02-10 03:08:08'),
('1927a57a0c8ab719b6ad7a4c19535f77', '7d73752ca4d67f433696f6848afbb107', '', '9', '11.30-11.55', 'ISTIRAHAT', 'bb9f7aaa0d474c3ab69069acdec2695a', '2016-02-10 03:08:08'),
('0e3a4019d304bc5994ca0a2b410fe754', '7d73752ca4d67f433696f6848afbb107', '9b0001d3a5a4c413f0bb8e697b0e513f', '10', '11.55-12.35', '', 'bb9f7aaa0d474c3ab69069acdec2695a', '2016-02-10 03:08:08'),
('e6d44f75a07c28971755f7d2f5a08e52', '7d73752ca4d67f433696f6848afbb107', 'f78e58e3d8d18775f418762e9426b43d', '11', '12.35-13.15', '', 'bb9f7aaa0d474c3ab69069acdec2695a', '2016-02-10 03:08:08'),
('34f7cd9aab718aaca86da06d56073f7a', '7d73752ca4d67f433696f6848afbb107', '1bb73a74f58b3ba76720a0f3ab332e59', '12', '13.15-13.45', 'PEMBUATAN RENCANA DAN PENYELESAIAN ADMINISTRASI PEMBELAJARAN & REMIDIAL', 'bb9f7aaa0d474c3ab69069acdec2695a', '2016-02-10 03:08:08'),
('c276df39c81bdce466d3af0631c29020', 'f88bd7a685a66f4f73219524c1f9e417', '', '1', '07.00-07.10', 'TADARUS AL-QURAN', 'bb9f7aaa0d474c3ab69069acdec2695a', '2016-02-10 03:08:08'),
('022919d259577ebc1d7599487cc6185c', 'f88bd7a685a66f4f73219524c1f9e417', 'b049b4d3490463a7c3db3cea5fc1fa10', '2', '07.10-07.50', '', 'bb9f7aaa0d474c3ab69069acdec2695a', '2016-02-10 03:08:08'),
('ea3d5fe967ff19628bcbd14f3b304b40', 'f88bd7a685a66f4f73219524c1f9e417', '3be17d09596cd245484fed3a4f5576eb', '3', '07.50-08.30', '', 'bb9f7aaa0d474c3ab69069acdec2695a', '2016-02-10 03:08:08'),
('cb1a77dfae0f32f2224ad710938fd39a', 'f88bd7a685a66f4f73219524c1f9e417', 'f341e7faba39e62971b3d538c92e82df', '4', '08.30-09.10', '', 'bb9f7aaa0d474c3ab69069acdec2695a', '2016-02-10 03:08:08'),
('07d93b6fc2bfa388c3aa8ad408d4e455', 'f88bd7a685a66f4f73219524c1f9e417', '', '5', '09.10-09.30', 'ISTIRAHAT', 'bb9f7aaa0d474c3ab69069acdec2695a', '2016-02-10 03:08:08'),
('f37b27fc4e02d127a73b2550547c2990', 'f88bd7a685a66f4f73219524c1f9e417', '02c979304d20859b2fe5c9135c0c269b', '6', '09.30-10.10', '', 'bb9f7aaa0d474c3ab69069acdec2695a', '2016-02-10 03:08:08'),
('31d1c070089b0a6b96d40a64d79b66b9', 'f88bd7a685a66f4f73219524c1f9e417', '21ddd50a146dfd554ddac33c19a21be5', '7', '10.10-10.50', '', 'bb9f7aaa0d474c3ab69069acdec2695a', '2016-02-10 03:08:08'),
('1b6b055af175a308e85793f5ed2eaf1b', 'f88bd7a685a66f4f73219524c1f9e417', '4fcf418adddd67383212bc1d22c61e98', '8', '10.50-11.30', '', 'bb9f7aaa0d474c3ab69069acdec2695a', '2016-02-10 03:08:08'),
('defbbf5397477f0a24a867f3318c851a', 'f88bd7a685a66f4f73219524c1f9e417', '', '9', '11.30-11.55', 'ISTIRAHAT', 'bb9f7aaa0d474c3ab69069acdec2695a', '2016-02-10 03:08:08'),
('eac4c2ed9f8075125cfa8a602ad7f904', 'f88bd7a685a66f4f73219524c1f9e417', '9b0001d3a5a4c413f0bb8e697b0e513f', '10', '11.55-12.35', '', 'bb9f7aaa0d474c3ab69069acdec2695a', '2016-02-10 03:08:08'),
('2678b6cbb41b1652e76b346d18e5cab1', 'f88bd7a685a66f4f73219524c1f9e417', 'f78e58e3d8d18775f418762e9426b43d', '11', '12.35-13.15', '', 'bb9f7aaa0d474c3ab69069acdec2695a', '2016-02-10 03:08:08'),
('e71b65d700a20702be81ad4f22f7d28e', 'f88bd7a685a66f4f73219524c1f9e417', '1bb73a74f58b3ba76720a0f3ab332e59', '12', '13.15-13.45', 'PEMBUATAN RENCANA DAN PENYELESAIAN ADMINISTRASI PEMBELAJARAN & REMIDIAL', 'bb9f7aaa0d474c3ab69069acdec2695a', '2016-02-10 03:08:08'),
('de0b7912f92ba33179baf6e2187c45f5', '4fcf418adddd67383212bc1d22c61e98', '', '1', '07.00 - 07.10', 'TADARUS AL-QURAN', 'bb9f7aaa0d474c3ab69069acdec2695a', '2016-02-10 03:08:08'),
('4d4ab8b2445cf512d200c3e29d51b63d', '4fcf418adddd67383212bc1d22c61e98', 'b049b4d3490463a7c3db3cea5fc1fa10', '2', '07.10- 07.50', '', 'bb9f7aaa0d474c3ab69069acdec2695a', '2016-02-10 03:08:08'),
('14a2e946ef9f870a4cbbb70c16b4f8d8', '4fcf418adddd67383212bc1d22c61e98', '3be17d09596cd245484fed3a4f5576eb', '3', '07.50 - 08.30', '', 'bb9f7aaa0d474c3ab69069acdec2695a', '2016-02-10 03:08:08'),
('6962d9c04ea7ea93d894a5b1c65be8f6', '4fcf418adddd67383212bc1d22c61e98', '', '4', '08.30 - 08.50', 'ISTIRAHAT', 'bb9f7aaa0d474c3ab69069acdec2695a', '2016-02-10 03:08:08'),
('0ddcd4871ecc6fbb5bb753a56a16ea7f', '4fcf418adddd67383212bc1d22c61e98', 'f341e7faba39e62971b3d538c92e82df', '5', '08.50 - 09.30', '', 'bb9f7aaa0d474c3ab69069acdec2695a', '2016-02-10 03:08:08'),
('fe5f4da9ad36aa99501ab6594b6e237e', '4fcf418adddd67383212bc1d22c61e98', '02c979304d20859b2fe5c9135c0c269b', '6', '09.30 - 10.10', '', 'bb9f7aaa0d474c3ab69069acdec2695a', '2016-02-10 03:08:08'),
('1ba5b7c9696ec32e9bec526bf23173ca', '4fcf418adddd67383212bc1d22c61e98', '21ddd50a146dfd554ddac33c19a21be5', '7', '10.10 - 10.50', 'KEPRAMUKAAN', 'bb9f7aaa0d474c3ab69069acdec2695a', '2016-02-10 03:08:08'),
('38cf870cb25788fc354f8bc193096bda', 'b0f139e46f9efe22e22dba86f523d0fa', '', '1', '07.00-07.10', 'TADARUS AL-QURAN', 'bb9f7aaa0d474c3ab69069acdec2695a', '2016-02-10 03:08:08'),
('62683e4a094d3f6ba2c01ded69754494', 'b0f139e46f9efe22e22dba86f523d0fa', 'b049b4d3490463a7c3db3cea5fc1fa10', '2', '07.10-07.50', '', 'bb9f7aaa0d474c3ab69069acdec2695a', '2016-02-10 03:08:08'),
('70e4d5cfb13feb4400ac13fa09767d74', 'b0f139e46f9efe22e22dba86f523d0fa', '3be17d09596cd245484fed3a4f5576eb', '3', '07.50-08.30', '', 'bb9f7aaa0d474c3ab69069acdec2695a', '2016-02-10 03:08:08'),
('5f09b9f1b52427d353a3f3e0b52a8e16', 'b0f139e46f9efe22e22dba86f523d0fa', 'f341e7faba39e62971b3d538c92e82df', '4', '08.30-09.10', '', 'bb9f7aaa0d474c3ab69069acdec2695a', '2016-02-10 03:08:08'),
('a38ed7b9473fa3da4bd7862d8762f36c', 'b0f139e46f9efe22e22dba86f523d0fa', '', '5', '09.10-09.30', 'ISTIRAHAT', 'bb9f7aaa0d474c3ab69069acdec2695a', '2016-02-10 03:08:08'),
('d4585f64b996ca4b038dfd728e3e4eb6', 'b0f139e46f9efe22e22dba86f523d0fa', '02c979304d20859b2fe5c9135c0c269b', '6', '09.30-10.10', '', 'bb9f7aaa0d474c3ab69069acdec2695a', '2016-02-10 03:08:08'),
('d1c4889b5b9200fbffaa91fae3b50208', 'b0f139e46f9efe22e22dba86f523d0fa', '21ddd50a146dfd554ddac33c19a21be5', '7', '10.10-10.50', '', 'bb9f7aaa0d474c3ab69069acdec2695a', '2016-02-10 03:08:08'),
('77e72a5db476a22eec35bf379c2c62da', 'b0f139e46f9efe22e22dba86f523d0fa', '', '8', '10.50-11.10', '', 'bb9f7aaa0d474c3ab69069acdec2695a', '2016-02-10 03:08:08'),
('9a39392ec8a95fbe7576f6a85645e4d5', 'b0f139e46f9efe22e22dba86f523d0fa', '4fcf418adddd67383212bc1d22c61e98', '9', '11.10-11.50', '', 'bb9f7aaa0d474c3ab69069acdec2695a', '2016-02-10 03:08:08'),
('6ee1a5700e2f89213bce306938105806', 'b0f139e46f9efe22e22dba86f523d0fa', '9b0001d3a5a4c413f0bb8e697b0e513f', '10', '11.50-12.30', '', 'bb9f7aaa0d474c3ab69069acdec2695a', '2016-02-10 03:08:08'),
('1133c680fbfaeb5050dc08f7602519d4', 'b0f139e46f9efe22e22dba86f523d0fa', '', '11', '12.30-13.10', 'PEMBINAAN / INFORMASI KEPALA SEKOLAH', 'bb9f7aaa0d474c3ab69069acdec2695a', '2016-02-10 03:08:08'),
('b304204aa7d15b076f43ff617438e50e', 'b0f139e46f9efe22e22dba86f523d0fa', '', '12', '13.10-13.50', 'PENGEMBANGAN DIRI / EKSTRAKURIKULER', 'bb9f7aaa0d474c3ab69069acdec2695a', '2016-02-10 03:08:08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `m_tapel`
--
ALTER TABLE `m_tapel`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `m_tapel`
--
ALTER TABLE `m_tapel`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
