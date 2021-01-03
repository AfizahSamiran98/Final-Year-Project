-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2020 at 02:17 PM
-- Server version: 10.3.15-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kkj`
--

-- --------------------------------------------------------

--
-- Table structure for table `aktiviti`
--

CREATE TABLE `aktiviti` (
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `id_aktv` int(100) NOT NULL,
  `aktvimg` int(11) NOT NULL,
  `nama_aktv` varchar(255) NOT NULL,
  `harga_aktv` float(11,2) NOT NULL,
  `masa_aktv` varchar(255) NOT NULL,
  `pnrgn_aktv` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aktiviti`
--

INSERT INTO `aktiviti` (`reg_date`, `id_aktv`, `aktvimg`, `nama_aktv`, `harga_aktv`, `masa_aktv`, `pnrgn_aktv`) VALUES
('2020-05-11 17:02:59', 64, 0, 'Ceramic Painting', 15.00, '30 Min - 1 Jam', 'Seni seramik bermaksud benda seni seperti pinggan mangkuk yang dibuat dari tanah liat dan bahan mentah lain. Sebilangan produk seramik dianggap sebagai seni rupa, sementara yang lain dianggap sebagai hiasan, perindustrian atau benda seni terpakai, atau sebagai artifak dalam arkeologi. Seramik hiasan kadang-kadang disebut \"tembikar seni\".'),
('2020-05-11 17:03:41', 65, 0, 'Kompang', 35.00, '1 Jam - 2 Jam', 'Kompang ialah sejenis alat muzik tradisional gegendang bagi masyarakat Melayu. Selain itu, kompang juga kadangkala digunakan oleh suku Bajau di pesisir Sabah, Malaysia. Kulit kompang biasanya diperbuat daripada kulit kambing betina, kulit lembu, kerbau malah getah sintetik.Alat muzik ini berasal dari dunia Arab.'),
('2020-05-11 17:12:56', 66, 0, 'Angklung', 30.00, '1 Jam', 'Angklung merupakan sejenis alat muzik yang diperbuat daripada buluh dalam kategori idiofon. Ia lazimnya terdiri dari dua hingga empat tiub yang diikat pada rangka yang dikenali sebagai \'ancak\'. Angklung biasanya digetarkan agar ia berlaga antara dua bahagian untuk menghasilkan bunyi.'),
('2020-05-11 17:14:30', 67, 0, 'Mini Basket Weaving', 16.00, '1 Jam', 'Tenunan bakul adalah proses menenun atau menjahit bahan yang mudah dilentur menjadi artifak tiga dimensi, seperti bakul, tikar, beg mesh atau bahkan perabot.Tenunan bakul juga merupakan kraf luar bandar. Keranjang dibuat dari pelbagai bahan berserat atau lentur, apa sahaja yang akan membengkok dan membentuk bentuk. '),
('2020-05-11 17:19:11', 68, 0, 'Key-Chain Weaving', 10.00, '1 Jam', 'Gantungan kunci, atau gantungan kunci, adalah rantai kecil, biasanya dibuat dari logam atau plastik. Panjang rantai kunci membolehkan item digunakan dengan lebih mudah daripada jika disambungkan terus ke keyring. Beberapa gantungan kunci membolehkan satu atau kedua-dua hujungnya kemampuan untuk berputar.\r\n'),
('2020-05-11 17:22:45', 69, 0, 'Wau Colouring', 25.00, '1 Jam', 'Wau bulan merupakan antara jenis wau yang paling popular di Malaysia. Kepopularannya didominasi oleh rakyat pantai timur di Semenanjung Malaysia. Bentuk wau ini menyerupai bulan sabit pada bahagian hadapan dan separa bulatan pada bahagian ekornya. Justeru, wau tersebut kelihatan seperti bulan yang terbit di angkasa apabila diterbangkan.'),
('2020-05-11 17:25:50', 70, 0, 'Shadow Puppet Bookmark', 20.00, '1 Jam - 2 Jam', '\r\nPenanda buku adalah penanda tipis, biasanya terbuat dari kad, kulit, atau kain, yang digunakan untuk menyimpan tempat pembaca di dalam buku dan untuk memungkinkan mereka kembali dengan mudah. Bahan alternatif untuk penanda buku adalah kertas, logam seperti perak dan tembaga, sutera, kayu, tali (menjahit), dan plastik.'),
('2020-05-11 17:27:18', 71, 0, 'Traditional Dress Miniature', 15.00, '45 Min - 1 Jam', '\r\nPakaian adalah istilah untuk pakaian dalam bahasa Melayu. Oleh kerana Malaysia merangkumi tiga budaya utama: Melayu, Cina dan India, setiap budaya mempunyai artikel pakaian tradisional dan keagamaan masing-masing yang semuanya sesuai dengan jantina dan mungkin disesuaikan dengan pengaruh dan keadaan tempatan.'),
('2020-05-11 17:33:48', 72, 0, 'One Stroke Painting', 10.00, '30 Min - 1 Jam', 'Mug yang dicat adalah kaedah yang hebat untuk menghias kabinet atau meja kopi sesiapa sahaja. Mereka membuat projek atau hadiah DIY yang sempurna. Cukup dapatkan cawan, basuh, basuh alkohol di mana anda berhasrat meletakkan cat, dan anda hampir bersedia untuk memulakan lukisan.'),
('2020-05-11 17:37:08', 73, 0, 'Basic Decoupage', 15.00, '30 Min - 1 Jam', 'Kata decoupage berasal dari kata kerja Perancis decouper, \'to cut out\'. Teknik decoupage boleh digunakan untuk memperibadikan hampir semua barang di kediaman anda dan yang menarik ialah reka bentuknya boleh menjadi sesederhana atau kompleks seperti yang anda mahukan.\r\n'),
('2020-05-11 17:41:51', 74, 0, 'On Canvas', 10.00, '30 Min - 1 Jam', 'Canvas adalah kain tenunan yang sangat tahan lama yang digunakan untuk membuat layar, tenda, tempat perlindungan, dan barang-barang lain yang diperlukan kekokohan, serta pada benda fesyen seperti beg tangan, sarung alat elektronik, dan kasut. Ia juga popular digunakan oleh seniman sebagai permukaan lukisan, biasanya terbentang di bingkai kayu.'),
('2020-05-13 13:52:29', 75, 0, 'Batik Colouring', 18.00, '30 Min - 1 Jam', 'Batik adalah seni dan kraf, yang menjadi popular dan terkenal di Barat sebagai medium kreatif yang luar biasa. Seni menghias kain dengan cara menggunakan lilin dan pewarna, telah diamalkan selama berabad-abad. Di Jawa, Indonesia, batik adalah bagian dari tradisi kuno, dan beberapa kain batik terbaik di dunia masih dibuat di sana.');

-- --------------------------------------------------------

--
-- Table structure for table `bayaran`
--

CREATE TABLE `bayaran` (
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_byrn` int(11) NOT NULL,
  `tarikh_lwtn` date NOT NULL,
  `nokad_bank` int(16) NOT NULL,
  `cvv` int(3) NOT NULL,
  `bulan` int(2) NOT NULL,
  `tahun` int(4) NOT NULL,
  `nama_bank` varchar(255) NOT NULL,
  `status_byrn` varchar(255) NOT NULL DEFAULT 'Tidak',
  `jumlah_byrn` float(11,2) NOT NULL,
  `id_lwtn` int(11) NOT NULL,
  `tajuk_lwtn` varchar(255) NOT NULL,
  `emel_plgn` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bayaran`
--

INSERT INTO `bayaran` (`reg_date`, `id_byrn`, `tarikh_lwtn`, `nokad_bank`, `cvv`, `bulan`, `tahun`, `nama_bank`, `status_byrn`, `jumlah_byrn`, `id_lwtn`, `tajuk_lwtn`, `emel_plgn`) VALUES
('2020-05-30 14:20:06', 43, '2020-07-24', 2147483647, 123, 4, 2022, ' MAYBANK BERHAD', 'Berjaya', 855.00, 59, 'LAWATAN MEMPELAJARI CARA MEMBUAT DECOUPAGE', 'norida@gmail.com'),
('2020-05-30 14:20:27', 44, '2020-06-10', 2147483647, 123, 6, 2025, ' RHB BANK BERHAD', 'Berjaya', 1260.00, 54, 'LAWATAN MEMPELAJARI CARA MEMBUAT ANGKLUNG', 'norida@gmail.com'),
('2020-05-30 14:22:49', 45, '2020-05-31', 2147483647, 123, 6, 2023, ' CIMB BANK BERHAD', 'Berjaya', 1855.00, 55, 'LAWATAN SAMBIL BELAJAR SMK SULTAN ISMAIL', 'norida@gmail.com'),
('2020-05-31 09:22:14', 46, '2020-08-07', 2147483647, 123, 5, 2022, ' BANK SIMPANAN NASIONAL BERHAD', 'Berjaya', 945.00, 58, 'LAWATAN POLIKTEKNIK IBRAHIM SULTAN', 'adnan@gmail.com'),
('2020-05-31 09:22:45', 47, '2020-07-16', 2147483647, 123, 4, 2025, ' MAYBANK BERHAD', 'Berjaya', 672.00, 56, 'LAWATAN SAMBIL BELAJAR SMK TASEK UTARA', 'zanariah@gmail.com'),
('2020-06-02 03:18:41', 48, '2020-06-25', 2147483647, 123, 4, 2022, ' BANK ISLAM MALAYSIA BERHAD', 'Berjaya', 2220.00, 62, 'LAWATAN MEMPELAJARI CARA MEMBUAT ANGKLUNG 2020', 'norida@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `kalendar`
--

CREATE TABLE `kalendar` (
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_cal` int(11) NOT NULL,
  `tarikh_lwtn` date NOT NULL,
  `perkara` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'lwtn'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kalendar`
--

INSERT INTO `kalendar` (`reg_date`, `id_cal`, `tarikh_lwtn`, `perkara`, `status`) VALUES
('2020-05-30 09:50:42', 2, '2020-09-12', 'LAWATAN SAMBIL BELAJAR MEMBUAT WAU', 'lwtn'),
('2020-05-30 14:20:06', 3, '2020-07-24', 'LAWATAN MEMPELAJARI CARA MEMBUAT DECOUPAGE', 'lwtn'),
('2020-05-30 14:20:27', 4, '2020-06-10', 'LAWATAN MEMPELAJARI CARA MEMBUAT ANGKLUNG', 'lwtn'),
('2020-05-30 14:22:49', 5, '2020-05-31', 'LAWATAN SAMBIL BELAJAR SMK SULTAN ISMAIL', 'lwtn'),
('2020-05-31 09:22:14', 6, '2020-08-07', 'LAWATAN POLIKTEKNIK IBRAHIM SULTAN', 'lwtn'),
('2020-05-31 09:22:45', 7, '2020-07-16', 'LAWATAN SAMBIL BELAJAR SMK TASEK UTARA', 'lwtn'),
('2020-06-01 08:24:02', 13, '2020-06-26', 'Cuti Peristiwa', 'kkj'),
('2020-06-02 02:21:08', 14, '2020-06-15', 'Program jom masuk IKN', 'kkj'),
('2020-06-02 03:18:41', 15, '2020-06-25', 'LAWATAN MEMPELAJARI CARA MEMBUAT ANGKLUNG 2020', 'lwtn'),
('2020-06-02 03:22:21', 16, '2020-06-12', 'cuti', 'kkj'),
('2020-06-02 03:27:29', 17, '2020-05-31', 'LAWATAN SAMBIL BELAJAR SMK SULTAN ISMAIL2', 'lwtn'),
('2020-06-06 06:38:03', 18, '2020-06-30', 'LAWATAN SAMBIL BELAJAR SMK SULTAN ISMAIL3', 'lwtn'),
('2020-06-08 08:58:31', 27, '2020-06-30', 'LAWATAN SAMBIL BELAJAR SMK SULTAN ISMAIL3', 'lwtn'),
('2020-06-08 09:04:17', 28, '2020-06-27', 'Program jom masuk IKN', 'kkj'),
('2020-06-08 10:08:56', 29, '2020-05-31', 'LAWATAN SAMBIL BELAJAR SMK SULTAN ISMAIL2', 'lwtn'),
('2020-06-08 10:23:21', 30, '2020-06-10', 'LAWATAN MEMPELAJARI CARA MEMBUAT ANGKLUNG', 'lwtn'),
('2020-06-08 10:33:37', 31, '2020-06-21', 'cuti', 'kkj');

-- --------------------------------------------------------

--
-- Table structure for table `lawatan`
--

CREATE TABLE `lawatan` (
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_lwtn` int(100) NOT NULL,
  `tajuk_lwtn` varchar(255) NOT NULL,
  `tujuan_lwtn` text NOT NULL,
  `tarikh_lwtn` date NOT NULL,
  `masa_lwtn` varchar(255) NOT NULL,
  `jumlah_urusetia` int(11) NOT NULL,
  `jumlah_plwt` int(11) NOT NULL,
  `jumlah_lwtn` int(11) NOT NULL,
  `document` varchar(200) NOT NULL,
  `status_lwtn` varchar(255) NOT NULL DEFAULT 'Dalam Proses',
  `id_aktv` int(100) NOT NULL,
  `jumlah_byrn` float(11,2) NOT NULL,
  `status_byrn` varchar(255) NOT NULL DEFAULT 'Tidak',
  `status_MB` varchar(255) NOT NULL DEFAULT 'Belum',
  `emel_plgn` varchar(255) NOT NULL,
  `emel_staf` varchar(255) NOT NULL DEFAULT 'Tiada',
  `nama_staf` varchar(255) NOT NULL DEFAULT 'Tiada'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lawatan`
--

INSERT INTO `lawatan` (`reg_date`, `id_lwtn`, `tajuk_lwtn`, `tujuan_lwtn`, `tarikh_lwtn`, `masa_lwtn`, `jumlah_urusetia`, `jumlah_plwt`, `jumlah_lwtn`, `document`, `status_lwtn`, `id_aktv`, `jumlah_byrn`, `status_byrn`, `status_MB`, `emel_plgn`, `emel_staf`, `nama_staf`) VALUES
('2020-06-08 10:23:21', 54, 'LAWATAN MEMPELAJARI CARA MEMBUAT ANGKLUNG', 'Definisi lawatan ialah menjenguk atau berkunjung ke sesuatu tempat untuk satu jangka\r\nmasa tertentu.\r\n', '2020-06-10', '09.00am-04.00pm', 2, 40, 42, '0', 'Lulus', 66, 1260.00, 'Berjaya', 'Belum', 'norida@gmail.com', 'fahazanie@gmail.com', 'Tiada'),
('2020-05-31 09:53:19', 56, 'LAWATAN SAMBIL BELAJAR SMK TASEK UTARA', 'Definisi lawatan ialah menjenguk atau berkunjung ke sesuatu tempat untuk satu jangka\r\nmasa tertentu.\r\n', '2020-07-16', '10.00am-05.00pm', 2, 40, 42, '0', 'Lulus', 67, 672.00, 'Berjaya', 'Belum', 'zanariah@gmail.com', 'ellanie@gmail.com', 'Tiada'),
('2020-06-08 09:03:14', 57, 'LAWATAN MEMPELAJARI CARA MEMBUAT WAU', 'Definisi lawatan ialah menjenguk atau berkunjung ke sesuatu tempat untuk satu jangka\r\nmasa tertentu.\r\n', '2020-07-15', '11.00am-06.00pm', 1, 50, 51, '0', 'Lulus', 69, 1275.00, 'Tidak', 'Belum', 'zanariah@gmail.com', 'khairul@gmail.com', 'Tiada'),
('2020-05-31 09:53:33', 58, 'LAWATAN POLIKTEKNIK IBRAHIM SULTAN', 'Definisi lawatan ialah menjenguk atau berkunjung ke sesuatu tempat untuk satu jangka\r\nmasa tertentu.\r\n', '2020-08-07', '10.00am-05.00pm', 3, 60, 63, '0', 'Lulus', 71, 945.00, 'Berjaya', 'Belum', 'adnan@gmail.com', 'rahamah@gmail.com', 'Tiada'),
('2020-06-08 10:24:36', 59, 'LAWATAN MEMPELAJARI CARA MEMBUAT DECOUPAGE', 'Definisi lawatan ialah menjenguk atau berkunjung ke sesuatu tempat untuk satu jangka\r\nmasa tertentu.\r\n', '2020-07-24', '10.00am-05.00pm', 2, 55, 57, '0', 'Lulus', 73, 855.00, 'Tidak', 'Sudah', 'norida@gmail.com', 'rahamah@gmail.com', 'Tiada'),
('2020-06-08 10:14:59', 61, 'LAWATAN SAMBIL BELAJAR SMK SULTAN ISMAIL2', 'try', '2020-05-31', '09.00am-04.00pm', 1, 40, 41, '0', 'Ditolak', 68, 410.00, 'Tidak', 'Belum', 'norida@gmail.com', 'fahazanie@gmail.com', 'Tiada'),
('2020-06-08 10:14:15', 62, 'LAWATAN MEMPELAJARI CARA MEMBUAT ANGKLUNG 2020', 'Definisi lawatan ialah menjenguk atau berkunjung ke sesuatu tempat untuk satu jangka\r\nmasa tertentu.', '2020-06-25', '11.00am-06.00pm', 4, 70, 74, '0', 'Lulus', 66, 2220.00, 'Tidak', 'Belum', 'norida@gmail.com', 'nurulniza@gmail.com', 'Tiada'),
('2020-06-08 10:32:35', 63, 'LAWATAN SAMBIL BELAJAR SMK SULTAN ISMAIL3', 'Definisi lawatan ialah menjenguk atau berkunjung ke sesuatu tempat untuk satu jangka\r\nmasa tertentu.', '2020-06-30', '10.00am-05.00pm', 2, 50, 52, '0', 'Lulus', 67, 832.00, 'Tidak', 'Belum', 'norida@gmail.com', 'fahazanie@gmail.com', 'Tiada');

-- --------------------------------------------------------

--
-- Table structure for table `maklumbalas`
--

CREATE TABLE `maklumbalas` (
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_MB` int(11) NOT NULL,
  `MB_lwtn` text NOT NULL,
  `pen_lwtn` varchar(255) NOT NULL,
  `pen_staf` varchar(255) NOT NULL,
  `status_MB` varchar(255) NOT NULL DEFAULT 'Belum',
  `emel_staf` varchar(255) NOT NULL,
  `nama_staf` varchar(255) NOT NULL,
  `id_lwtn` int(11) NOT NULL,
  `tajuk_lwtn` varchar(255) NOT NULL,
  `tarikh_lwtn` date NOT NULL,
  `nama_aktv` varchar(255) NOT NULL,
  `emel_plgn` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `maklumbalas`
--

INSERT INTO `maklumbalas` (`reg_date`, `id_MB`, `MB_lwtn`, `pen_lwtn`, `pen_staf`, `status_MB`, `emel_staf`, `nama_staf`, `id_lwtn`, `tajuk_lwtn`, `tarikh_lwtn`, `nama_aktv`, `emel_plgn`) VALUES
('2020-05-31 13:52:20', 11, 'Pengurusan lawatan perlu dipertingkatkan', '2', '4', 'Sudah', ' fahazanie@gmail.com', 'Fahazanie Sandy Bin Halim', 54, 'LAWATAN MEMPELAJARI CARA MEMBUAT ANGKLUNG', '2020-06-10', 'Angklung', 'norida@gmail.com'),
('2020-05-31 11:27:34', 12, 'Baik', '4', '3', 'Sudah', ' khairul@gmail.com', 'Khairul Irwan Suhaidi bin Mansin', 55, 'LAWATAN SAMBIL BELAJAR SMK SULTAN ISMAIL', '2020-05-31', 'Kompang', 'norida@gmail.com'),
('2020-05-31 10:03:16', 14, 'Aktiviti sangat menarik dan mudah difahami', '5', '3', 'Sudah', ' rahamah@gmail.com', 'Rahamah binti Abu Bakar', 59, 'LAWATAN MEMPELAJARI CARA MEMBUAT DECOUPAGE', '2020-07-24', 'Basic Decoupage', 'norida@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `emel_plgn` varchar(255) NOT NULL,
  `katalaluan_plgn` varchar(255) NOT NULL,
  `nama_plgn` varchar(255) NOT NULL,
  `imgplgn` int(11) NOT NULL DEFAULT 1,
  `nokp_plgn` varchar(12) NOT NULL,
  `institut_plgn` varchar(255) NOT NULL,
  `jawatan_plgn` varchar(255) NOT NULL,
  `notelpej_plgn` varchar(12) NOT NULL,
  `nofax_plgn` varchar(12) NOT NULL,
  `notel_plgn` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`reg_date`, `emel_plgn`, `katalaluan_plgn`, `nama_plgn`, `imgplgn`, `nokp_plgn`, `institut_plgn`, `jawatan_plgn`, `notelpej_plgn`, `nofax_plgn`, `notel_plgn`) VALUES
('2020-06-06 04:02:39', 'adnan@gmail.com', '$2y$10$yNGPGU0efayEJMLjH9lBauzJ0IDB982QntN5QV7XK.AiZ36Ev7imS', 'ADNAN BIN SHAMSUDDIN', 1, '123456789123', 'POLITEKNIK IBRAHIM SULTAN', 'Pensyarah', '0312345678', '0312345678', '0121234567'),
('2020-06-06 04:03:03', 'azlena@gmail.com', '$2y$10$NGjtCs8yUj4DmOsVjNFXwuh/kIBxoyK5ZYRHm6SGqOPo75XNvwWiC', 'AZLENA BINTI HAMDAN', 1, '123456789123', 'UTM', 'Pensyarah', '0312345678', '0312345678', '0121234567'),
('2020-06-06 04:03:13', 'firdaus@gmail.com', '$2y$10$jxggsD5OKe4FKBJ6GEYOhOCHDWapwTnOiGPOwYuuUHtTX8L1RRfQy', 'FIRDAUS BIN ABDULLAH', 1, '123456789123', 'SK MOHD KHIR JOHARI', 'GURU', '0312345678', '0312345678', '0121234567'),
('2020-06-06 04:03:20', 'norida@gmail.com', '$2y$10$hgq3kyhCj9sXtJ8N2YjTG.4hErMGC0KUoJanlHWh8b1S5B.EeN33O', 'NORIDA BINTI ASNAWAR', 1, '123456789123', 'SMK SULTAN ISMAIL', 'GURU', '0312345678', '0312345678', '0111234567'),
('2020-06-06 04:03:28', 'zanariah@gmail.com', '$2y$10$f.A.39QsxUScVs2R6pkh7OH/xIGHxlvr32NlQHUnKGSZqyT/Izt0O', 'ZANARIAH BINTI KARSAN', 1, '123456789123', 'SMK TASEK UTARA', 'GURU', '0312345678', '0312345678', '0121234567');

-- --------------------------------------------------------

--
-- Table structure for table `staf`
--

CREATE TABLE `staf` (
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `emel_staf` varchar(255) NOT NULL,
  `katalaluan_staf` varchar(255) NOT NULL,
  `id_staf` varchar(4) NOT NULL,
  `nama_staf` varchar(255) NOT NULL,
  `imgstaf` int(11) NOT NULL DEFAULT 1,
  `nokp_staf` varchar(12) NOT NULL,
  `jawatan_staf` varchar(255) NOT NULL,
  `notelpej_staf` varchar(12) NOT NULL,
  `notel_staf` varchar(12) NOT NULL,
  `pengguna` varchar(12) NOT NULL DEFAULT 'staf'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staf`
--

INSERT INTO `staf` (`reg_date`, `emel_staf`, `katalaluan_staf`, `id_staf`, `nama_staf`, `imgstaf`, `nokp_staf`, `jawatan_staf`, `notelpej_staf`, `notel_staf`, `pengguna`) VALUES
('2020-06-06 05:03:42', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'S001', 'Pengurus', 1, '123456789012', 'Admin', '031234567', '0121234567', 'pengurus'),
('2020-05-18 05:52:03', 'ellanie@gmail.com', 'ec1e1217b4e1af8881c1111832b343af', 'S005', 'Ellanie Binti Ahmad Izani', 1, '123456789012', 'Penolong Pegawai Ehwal Ekonomi', '07-2350433', '0121234567', 'staf'),
('2020-05-18 05:50:33', 'fahazanie@gmail.com', '8edf513c394b360663ae98006818ec15', 'S003', 'Fahazanie Sandy Bin Halim', 1, '123456789012', 'Pereka', '07-2350433', '0121234567', 'staf'),
('2020-05-18 05:46:57', 'khairul@gmail.com', '8e2d43a3407835dc5d58abb5f71a206f', 'S002', 'Khairul Irwan Suhaidi bin Mansin', 1, '123456789012', 'Penolong Jurutera', '07-2350433', '0121234567', 'staf'),
('2020-05-18 05:51:09', 'nurulniza@gmail.com', 'ccd78964951415496ccb234487c0b338', 'S004', 'Nurulniza Binti Masuan', 1, '123456789012', 'Penolong Akauntan', '07-2350433', '0121234567', 'staf'),
('2020-06-06 05:54:01', 'rahamah@gmail.com', '914f8cb77884674f0ac50672e23282c3', 'S006', 'Rahamah binti Abu Bakar', 0, '123456789012', 'Pembantu Ehwal Ekonomi', '07-2350433', '0121234567', 'staf');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aktiviti`
--
ALTER TABLE `aktiviti`
  ADD PRIMARY KEY (`id_aktv`);

--
-- Indexes for table `bayaran`
--
ALTER TABLE `bayaran`
  ADD PRIMARY KEY (`id_byrn`);

--
-- Indexes for table `kalendar`
--
ALTER TABLE `kalendar`
  ADD PRIMARY KEY (`id_cal`);

--
-- Indexes for table `lawatan`
--
ALTER TABLE `lawatan`
  ADD PRIMARY KEY (`id_lwtn`);

--
-- Indexes for table `maklumbalas`
--
ALTER TABLE `maklumbalas`
  ADD PRIMARY KEY (`id_MB`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`emel_plgn`);

--
-- Indexes for table `staf`
--
ALTER TABLE `staf`
  ADD PRIMARY KEY (`emel_staf`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aktiviti`
--
ALTER TABLE `aktiviti`
  MODIFY `id_aktv` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `bayaran`
--
ALTER TABLE `bayaran`
  MODIFY `id_byrn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `kalendar`
--
ALTER TABLE `kalendar`
  MODIFY `id_cal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `lawatan`
--
ALTER TABLE `lawatan`
  MODIFY `id_lwtn` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `maklumbalas`
--
ALTER TABLE `maklumbalas`
  MODIFY `id_MB` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
