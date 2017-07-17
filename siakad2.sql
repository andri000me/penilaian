-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 15, 2017 at 05:11 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `siakad2`
--

-- --------------------------------------------------------

--
-- Table structure for table `ev_class_up`
--

CREATE TABLE `ev_class_up` (
  `id_ev` int(11) NOT NULL,
  `nis` int(11) NOT NULL,
  `from_nip` int(11) NOT NULL,
  `from_kelas` varchar(200) NOT NULL,
  `to_kelas` varchar(200) NOT NULL,
  `confirmation` tinyint(1) NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `hak_akses`
--

CREATE TABLE `hak_akses` (
  `id` int(11) NOT NULL,
  `hak_akses` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hak_akses`
--

INSERT INTO `hak_akses` (`id`, `hak_akses`) VALUES
(1, 'administrator'),
(2, 'guru'),
(3, 'siswa');

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `nama_jabatan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `nama_jabatan`) VALUES
(1, 'Kepala Sekolah'),
(2, 'Wa. Kepala Sekolah'),
(5, 'Staff Tata Usaha'),
(6, 'Wali Kelas'),
(7, 'Staff Pengajar'),
(8, 'Office Boy'),
(9, 'Honorer');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_global`
--

CREATE TABLE `jadwal_global` (
  `id_key` int(11) NOT NULL,
  `tahun_ajaran` varchar(100) NOT NULL,
  `semester` varchar(100) NOT NULL,
  `id_kelas` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_weekly`
--

CREATE TABLE `jadwal_weekly` (
  `id_primary` int(11) NOT NULL,
  `id_key` bigint(20) NOT NULL,
  `jam_ke` varchar(50) NOT NULL,
  `senin` varchar(255) NOT NULL,
  `selasa` varchar(255) NOT NULL,
  `rabu` varchar(255) NOT NULL,
  `kamis` varchar(255) NOT NULL,
  `jumat` varchar(255) NOT NULL,
  `sabtu` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `jam_mengajar`
--

CREATE TABLE `jam_mengajar` (
  `id_jam_mengajar` int(11) NOT NULL,
  `jam_ke` varchar(20) NOT NULL,
  `jam_mengajar` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jam_mengajar`
--

INSERT INTO `jam_mengajar` (`id_jam_mengajar`, `jam_ke`, `jam_mengajar`) VALUES
(3, 'I', '07:30:00'),
(5, 'III', '08:30:00'),
(6, 'II', '08:00:00'),
(7, 'IV', '09:30:00'),
(8, 'V', '10:00:00'),
(9, 'VI', '10:30:00'),
(11, 'VII', '11:00:00'),
(12, 'VIII', '11:30:00'),
(13, 'IX', '12:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `id_jurusan` int(11) NOT NULL,
  `nama_jurusan` varchar(255) NOT NULL,
  `group_jurusan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `nama_kelas` varchar(25) NOT NULL,
  `nama_jurusan` varchar(255) NOT NULL,
  `kelas_jurusan` varchar(255) NOT NULL,
  `wali_kelas` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nama_kelas`, `nama_jurusan`, `kelas_jurusan`, `wali_kelas`) VALUES
(23, 'IPS I', 'IPS - 1', 'IPS I - IPS - 1', '212');

-- --------------------------------------------------------

--
-- Table structure for table `mata_pelajaran`
--

CREATE TABLE `mata_pelajaran` (
  `id_mapel` int(11) NOT NULL,
  `kode_mapel` varchar(50) NOT NULL,
  `nama_mapel` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mata_pelajaran`
--

INSERT INTO `mata_pelajaran` (`id_mapel`, `kode_mapel`, `nama_mapel`) VALUES
(16, 'IPS', 'IPS'),
(17, 'IPA', 'IPA'),
(18, 'MTK', 'Matematika'),
(19, 'IND', 'Bhs. Indonesia'),
(20, 'TIK', 'Teknik Komputer');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_admin`
--

CREATE TABLE `tabel_admin` (
  `id_admin` int(11) NOT NULL,
  `nama_admin` varchar(255) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tabel_admin`
--

INSERT INTO `tabel_admin` (`id_admin`, `nama_admin`, `id_user`) VALUES
(1, 'Guntur', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tabel_nilai`
--

CREATE TABLE `tabel_nilai` (
  `id_nilai` int(11) NOT NULL,
  `nis` int(11) NOT NULL DEFAULT '0',
  `mata_pelajaran` varchar(255) NOT NULL,
  `tugas` bigint(20) NOT NULL,
  `uts` bigint(20) NOT NULL,
  `uas` bigint(20) NOT NULL,
  `absensi` bigint(20) NOT NULL,
  `norma` varchar(50) NOT NULL,
  `hasil` bigint(20) NOT NULL,
  `tahun_ajaran` varchar(255) NOT NULL,
  `semester` varchar(25) NOT NULL,
  `nip` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tabel_pengajar`
--

CREATE TABLE `tabel_pengajar` (
  `id_pengajar` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nip` int(11) NOT NULL,
  `nama_pengajar` varchar(255) NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `guru_bid_studi` varchar(255) NOT NULL,
  `ttl_location` varchar(200) NOT NULL,
  `ttl_date` date NOT NULL,
  `phone` bigint(20) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `golongan_darah` varchar(50) NOT NULL,
  `email` varchar(200) NOT NULL,
  `alamat` text NOT NULL,
  `agama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tabel_siswa`
--

CREATE TABLE `tabel_siswa` (
  `id_siswa` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nis` bigint(20) NOT NULL,
  `nama_siswa` varchar(255) NOT NULL,
  `kelas` varchar(255) NOT NULL,
  `ttl_location` varchar(255) NOT NULL,
  `ttl_date` date NOT NULL,
  `agama` varchar(200) NOT NULL,
  `phone` bigint(20) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `golongan_darah` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `angkatan` varchar(50) NOT NULL,
  `nama_ayah` varchar(255) NOT NULL,
  `nama_ibu` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tahun_ajaran`
--

CREATE TABLE `tahun_ajaran` (
  `id_thn_ajaran` int(11) NOT NULL,
  `nama_tahun_ajaran` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tahun_ajaran`
--

INSERT INTO `tahun_ajaran` (`id_thn_ajaran`, `nama_tahun_ajaran`) VALUES
(10, '2012/2013'),
(11, '2013/2014'),
(12, '2014/2015');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(100) NOT NULL,
  `hak_akses` varchar(100) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `id_user`, `nama_user`, `hak_akses`, `username`, `password`) VALUES
(1, 1, 'Apip', '1', 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(31, 212, 'an', '2', 'wali', '21232f297a57a5a743894a0e4a801fc3'),
(35, 23, 'Nur', '2', '', '21232f297a57a5a743894a0e4a801fc3'),
(36, 321, 'Alan', '3', 'alan', '21232f297a57a5a743894a0e4a801fc3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ev_class_up`
--
ALTER TABLE `ev_class_up`
  ADD PRIMARY KEY (`id_ev`);

--
-- Indexes for table `hak_akses`
--
ALTER TABLE `hak_akses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `jadwal_global`
--
ALTER TABLE `jadwal_global`
  ADD PRIMARY KEY (`id_key`);

--
-- Indexes for table `jadwal_weekly`
--
ALTER TABLE `jadwal_weekly`
  ADD PRIMARY KEY (`id_primary`);

--
-- Indexes for table `jam_mengajar`
--
ALTER TABLE `jam_mengajar`
  ADD PRIMARY KEY (`id_jam_mengajar`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
  ADD PRIMARY KEY (`id_mapel`);

--
-- Indexes for table `tabel_admin`
--
ALTER TABLE `tabel_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tabel_nilai`
--
ALTER TABLE `tabel_nilai`
  ADD PRIMARY KEY (`id_nilai`);

--
-- Indexes for table `tabel_pengajar`
--
ALTER TABLE `tabel_pengajar`
  ADD PRIMARY KEY (`id_pengajar`);

--
-- Indexes for table `tabel_siswa`
--
ALTER TABLE `tabel_siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indexes for table `tahun_ajaran`
--
ALTER TABLE `tahun_ajaran`
  ADD PRIMARY KEY (`id_thn_ajaran`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ev_class_up`
--
ALTER TABLE `ev_class_up`
  MODIFY `id_ev` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `hak_akses`
--
ALTER TABLE `hak_akses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `jadwal_global`
--
ALTER TABLE `jadwal_global`
  MODIFY `id_key` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `jadwal_weekly`
--
ALTER TABLE `jadwal_weekly`
  MODIFY `id_primary` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `jam_mengajar`
--
ALTER TABLE `jam_mengajar`
  MODIFY `id_jam_mengajar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id_jurusan` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
  MODIFY `id_mapel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `tabel_admin`
--
ALTER TABLE `tabel_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tabel_nilai`
--
ALTER TABLE `tabel_nilai`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tabel_pengajar`
--
ALTER TABLE `tabel_pengajar`
  MODIFY `id_pengajar` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tabel_siswa`
--
ALTER TABLE `tabel_siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tahun_ajaran`
--
ALTER TABLE `tahun_ajaran`
  MODIFY `id_thn_ajaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
