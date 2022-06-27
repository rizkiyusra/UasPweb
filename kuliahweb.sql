create database kuliahweb;

use kuliahweb;

CREATE TABLE `ambilmk` (
  `nim` int(11) NOT NULL primary key ,
  `kode_mk` varchar(5) NOT NULL,
  `tahun_ajaran` varchar(10) NOT NULL,
  `ruangan` varchar(20) NOT NULL,
  `hari` varchar(10) NOT NULL,
  `tgl_ambilmk` datetime NOT NULL DEFAULT current_timestamp()
);

CREATE TABLE `mahasiswa` (
  `nim` int(11) NOT NULL primary key,
  `nama` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL
);


CREATE TABLE `matakuliah` (
  `kode_mk` varchar(5) NOT NULL primary key,
  `nama_mk` varchar(30) NOT NULL,
  `sks` int(1) NOT NULL,
  `semester` int(2) NOT NULL,
  `program_studi` varchar(4) NOT NULL,
  `keterangan` varchar(200) NOT NULL
);

INSERT INTO `matakuliah` (`kode_mk`, `nama_mk`, `sks`, `semester`, `program_studi`, `keterangan`) VALUES
('mk001', 'Pemrograman Web', 4, 4, 'S1', 'matakuliah ini membahas tentang .......'),
('mk002', 'Pemrograman Bergerak', 4, 4, 'S1', 'matakuliah ini membahas tentang .....'),
('mk003', 'Sistem Basis Data', 3, 4, 'S1', 'matakuliah ini membahas tentang ......');

INSERT INTO `ambilmk` (`nim`, `kode_mk`, `tahun_ajaran`, `ruangan`, `hari`, `tgl_ambilmk`) VALUES
(120215213, 'mk001', '2021/2022', 'lab rpl', 'selasa', '2022-06-26 20:46:45'),
(120215213, 'mk002', '2021/2022', 'lab database', 'senin', '2022-06-26 20:46:45'),
(121414124, 'mk003', '2021/2022', 'lab rpl', 'rabu', '2022-06-27 00:14:33');

INSERT INTO `mahasiswa` (`nim`, `nama`, `tgl_lahir`, `alamat`, `no_hp`, `email`) VALUES
(120215213, 'Alif', '2002-06-05', 'Sungai Apit', '08812025821', 'alif@gmail.com'),
(121414124, 'Fachrul', '2002-06-20', 'selat panjang', '082142141236', 'fachrul@gmail.com'),
(1205013142, 'S Raju', '2002-01-30', 'jl karya masa', '082371241567', 'raju@gmail.com');