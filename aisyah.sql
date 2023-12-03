-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 12, 2019 at 03:25 AM
-- Server version: 10.1.22-MariaDB
-- PHP Version: 7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aisyah`
--

-- --------------------------------------------------------

--
-- Table structure for table `kadaluarsa`
--

CREATE TABLE `kadaluarsa` (
  `kd_obat` varchar(128) DEFAULT NULL,
  `tgl_keluar` date DEFAULT NULL,
  `qty` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kadaluarsa`
--

INSERT INTO `kadaluarsa` (`kd_obat`, `tgl_keluar`, `qty`) VALUES
('OB-00003', '2019-06-19', 10),
('OB-00003', '2019-06-20', 10),
('OB-00003', '2019-08-08', 20),
('OB-00001', '2019-08-08', 20),
('OB-00001', '2019-08-09', 60),
('OB-00002', '2019-09-11', 20),
('OB-00002', '2019-09-12', 200),
('OB-00002', '2019-09-12', 60),
('OB-00003', '2019-09-12', 40),
('OB-00005', '2019-09-12', 40),
('OB-00006', '2019-09-12', 490),
('OB-00003', '2019-09-12', 15),
('OB-00007', '2019-09-12', 690),
('OB-00002', '2019-09-12', 140);

--
-- Triggers `kadaluarsa`
--
DELIMITER $$
CREATE TRIGGER `obatkadaluarsa` AFTER INSERT ON `kadaluarsa` FOR EACH ROW BEGIN
 UPDATE stok
 SET qty = qty - NEW.qty
 WHERE
 kd_obat = NEW.kd_obat;
 END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Obat Mata'),
(2, 'Obat Injeksi'),
(3, 'Obat Kumur'),
(4, 'Obat Luar'),
(5, 'Obat Kulit'),
(6, 'Obat Minum');

-- --------------------------------------------------------

--
-- Table structure for table `obat`
--

CREATE TABLE `obat` (
  `kd_obat` varchar(128) NOT NULL,
  `nama_obat` varchar(128) DEFAULT NULL,
  `kategori` int(11) DEFAULT NULL,
  `satuan` int(11) DEFAULT NULL,
  `kegunaan` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `obat`
--

INSERT INTO `obat` (`kd_obat`, `nama_obat`, `kategori`, `satuan`, `kegunaan`) VALUES
('OB-00001', 'Ambroxol', 6, 1, 'obat batuk'),
('OB-00002', 'Acetyl sistain', 6, 1, 'obat batuk berdahak'),
('OB-00003', 'Acyclovir 400mg Tab  ', 5, 4, 'untuk  mengobati infesi virus '),
('OB-00004', 'Alpara ', 6, 1, 'untuk mengobati batuk'),
('OB-00005', 'Acyclovir Krim ', 5, 4, 'untuk  obat kulit'),
('OB-00006', 'Albendazole 400mg tab ', 6, 1, 'untuk infeksi tertentu seperti cacing'),
('OB-00007', 'salep scabis', 5, 4, 'obat kulit'),
('OB-00008', 'Ambroxol syr 15mg/5ml ', 6, 2, 'obat batuk'),
('OB-00009', 'Aminofillin 200mg ', 6, 1, 'untuk mengobati batuk dan sulit bernafas'),
('OB-00010', 'Amitriptilin 25mg tab salut ', 6, 1, 'obat anti depresan masalah kejiwaan'),
('OB-00011', 'Amlodipin 5mg tab ', 6, 1, 'untuk  darah tinggi'),
('OB-00012', 'Amoxicillin syr 125 ', 6, 2, 'obat anti septik untuk anak-anak'),
('OB-00013', 'Amoxicillin 500mg ', 6, 1, 'obat anti biotik'),
('OB-00014', 'Amoxicillin 500mg ', 6, 1, 'anti biotik'),
('OB-00015', 'Amoxicillin syr kering 250mg ', 6, 2, 'sirup anak-anak anti biotik'),
('OB-00016', 'Antasida DOEN suspensi ', 6, 1, 'obat sirup perut kembung atau sakit perut'),
('OB-00017', 'Antasida DOEN tab ', 6, 1, 'sakit perut'),
('OB-00018', 'Anti scabies cream (Scabimite cream) ', 5, 4, 'obat kulit'),
('OB-00019', 'Asam Askorbat 250mg ', 6, 1, 'obat untuk menabah vitamin C'),
('OB-00020', 'Asam Askorbat 50mg ', 6, 1, 'Obat minum untuk menambah vitamin C'),
('OB-00021', 'Asam Mefenamat 500mg ', 6, 1, 'untuk Mengobati pusing'),
('OB-00022', 'Attapulgit (New Diatabs/Pularex) ', 6, 1, 'untuk mengobati diare'),
('OB-00023', 'Betahistin mesilat 6mg tab ', 6, 1, 'untuk mengobati alergi'),
('OB-00024', 'Betametason Krim 0,1% ', 5, 4, 'untuk mengobati kulit '),
('OB-00025', 'Betason N cream ', 5, 4, 'untuk mengobati sakit kulit '),
('OB-00026', 'Bioplasenton ', 5, 4, 'untuk mengobati kulit terbakar'),
('OB-00027', 'Bromhexin ', 6, 2, 'untuk mengobati sakit batuk pada anak-anak'),
('OB-00028', 'Conterpain ', 5, 4, 'untuk mengobati sakit pinggang'),
('OB-00029', 'Ciprofloaxin tab ', 6, 1, 'untuk mengobati infeksi'),
('OB-00030', 'Cotrimoxazole DOEN I tab ', 6, 1, 'untuk mengobati anti septik diare'),
('OB-00031', 'Cotrimoxazole suspensi ', 6, 2, 'Obat anti septik'),
('OB-00032', 'Codein 10 mg ', 4, 1, 'untuk mengobati obat jiwa'),
('OB-00033', 'Clindamycin HCI Kapsul 300mg ', 6, 7, 'obat batuk berdahak'),
('OB-00034', 'Cefadroxil tab ', 6, 1, 'untuk mengobati batuk darah'),
('OB-00035', 'Cefadroxil(Sirup) ', 6, 2, 'untuk mengobati batuk berdahak pada anak'),
('OB-00036', 'Chloramphenicol Palmitate(sirup) ', 6, 2, 'untuk mengobati sakit kembung pada anak'),
('OB-00037', 'Carbamazepine ', 4, 1, 'untuk mengobati obat jiwa'),
('OB-00038', 'CTM 4mg ', 6, 1, 'untuk mengobati alergi pada kulit'),
('OB-00039', 'Dexamethason 0,5mg tab ', 6, 1, 'untuk mengobati sakit diare'),
('OB-00040', 'Diclofenac Sodium(NADIC) ', 6, 1, 'untuk mengobati linu'),
('OB-00041', 'Diazepam 5mg tab ', 4, 1, 'obat jiwa'),
('OB-00042', 'Digoxin 0,25mg tab ', 6, 1, 'obat jiwa'),
('OB-00043', 'Dimenhidrinat 50mg tab ', 6, 1, 'obat penurunan pada darah'),
('OB-00044', 'Domperidon 10mg tab ', 6, 1, 'obat mengatasi mual pada orang dewasa'),
('OB-00045', 'Domperidon suspensi 5mg/5ml ', 6, 2, 'obat kembung pada anak'),
('OB-00046', 'Eritromisin 250mg kap ', 6, 1, 'obat anti septik pada demam'),
('OB-00047', 'Eritromisin 500mg ', 6, 7, 'obat anti  septik pada demam'),
('OB-00048', 'Elyndamicyn ', 6, 1, 'obat infeksi pada bakteri'),
('OB-00049', 'Eritromisin syr 200mg/5ml ', 6, 2, 'obat  anti septik diare pada anak'),
('OB-00050', 'Fitomenadion 10mg tab ', 4, 1, 'obat jiwa'),
('OB-00051', 'Folic Acid ', 6, 1, 'obat jiwa'),
('OB-00052', 'Furosemid 40mg tab ', 6, 1, 'obat mengurangi cairan pada tubuh'),
('OB-00053', 'Gentamisin salep kulit 0,1% ', 5, 4, 'obat kulit'),
('OB-00054', 'Gentamicin Tetes Mata ', 1, 2, 'obat menyembukan sakit mata'),
('OB-00055', 'Glibenklamid 5mg tab ', 6, 1, 'obat menyembuhkan kencing manis'),
('OB-00056', 'Glimepiride 3mg tab ', 6, 1, 'obat menurunkan kolestrol'),
('OB-00057', 'Haloperidol 5mg tab ', 4, 1, 'obat  jiwa'),
('OB-00058', 'Haloperidol 1,5 mg tab ', 4, 1, 'obat jiwa'),
('OB-00059', 'Hemafort(Solvitron) ', 6, 1, 'obat  untuk menambah darah'),
('OB-00060', 'Ibuprofen 200mg tab ', 6, 1, 'obat pusing dan sakit gigi'),
('OB-00061', 'Ibuprofen 400mg tab ', 6, 1, 'obat mengobati pusing dan sakit gigi'),
('OB-00062', 'ISDN 5mg ', 6, 1, 'obat menyembuhkan sakit jantung'),
('OB-00063', 'Kaptropil 12,5 mg ', 6, 1, 'obat  menurunkan darah tinggi'),
('OB-00064', 'Kalsium Laktat 500mg ', 6, 1, 'obat  untuk menambah kasium'),
('OB-00065', 'Kaptopril 25mg tab ', 6, 1, 'obat untuk menurunkan darah tinggi'),
('OB-00066', 'Karbamazepin 200mg ', 4, 1, 'obat  jiwa'),
('OB-00067', 'Ketoconazole Salep ', 5, 5, 'obat  panu'),
('OB-00068', 'Ketoconazole 200mg tab ', 6, 1, 'obat panu'),
('OB-00069', 'Kloramfecort H krim ', 1, 4, 'obat infeksi krim pada mata'),
('OB-00070', 'Kloramfenikol kapsul 250mg ', 6, 7, 'infeksi bakteri pada mata'),
('OB-00071', 'Kloramfenikol salep mata 1% ', 1, 4, 'obat  mata'),
('OB-00072', 'Kloramfenikol suspensi ', 6, 2, 'obat anti septik pada anak-anak'),
('OB-00073', 'Kloramfenikol tetes mata 0,5% ', 1, 2, 'obat  sakit mata'),
('OB-00074', 'Kloramfenikol tetes telinga 3% ', 4, 2, 'obat  mengobati sakit teliga'),
('OB-00075', 'Lactobacillus tablet (Lacbon) ', 6, 1, 'obat  mengobati sakit diare'),
('OB-00076', 'Loperamid 2mg tab ', 6, 1, 'obat  mengobati sakit diare'),
('OB-00077', 'Loratadin 10mg tab ', 6, 1, 'obat  mengobati alergi pada kulit'),
('OB-00078', 'Meloksikam 15mg tab ', 6, 1, 'obat  mengobati anti septik'),
('OB-00079', 'Metformin 500mg tab ', 6, 1, 'obat  mengobati penurunan kolestrol '),
('OB-00080', 'Metilergometrin 0,125mg tab ', 6, 1, 'obat  mengobati menghentikan pendarahan'),
('OB-00081', 'Metoclopramide 10mg tab ', 6, 1, 'obat  mengobati penurunan darah '),
('OB-00082', 'Molexflu ', 6, 1, 'obat  mengobati pilex'),
('OB-00083', 'Metronidazole 500 Mg ', 6, 1, 'obat  mengobati sakit gigi'),
('OB-00084', 'Mikonazole 2% krim ', 5, 4, 'obat  mengobati sakit kulit'),
('OB-00085', 'Methyl Prednisolme ', 6, 1, 'obat  mengobati sakit demam atau menggigil'),
('OB-00086', 'MDT COMBI(Dewasa) ', 6, 1, 'obat  mengobati sakit paru dewasa'),
('OB-00087', 'AMOX', 6, 1, 'pusing'),
('OB-00088', 'MDT COMBI(Dewasa) ', 6, 1, 'obat paru'),
('OB-00089', 'MDT ANAK ', 6, 1, 'obat paru anak'),
('OB-00090', 'Multivitamin syrup ', 6, 2, 'vitamin sirup pada anak '),
('OB-00091', 'New Antides(Attapulgit) ', 6, 1, 'obat  mengobati sakit diare'),
('OB-00092', 'Neurotropik tab (Nutralix) ', 6, 1, 'obat  menambah vitamin pada tubuh'),
('OB-00093', 'Neurotropik+Vit E (Neurovit E) ', 6, 1, 'multi vitamin tubuh'),
('OB-00094', 'Nifedipin 10mg tab ', 6, 1, 'untuk mencegah tipe nyeri pada dada'),
('OB-00095', 'OAT(INTENSIF) ', 6, 1, 'Obat Paru'),
('OB-00096', 'OAT(LANJUTAN) ', 6, 1, 'Obat Paru'),
('OB-00097', 'OAT ANAK(LANJUTAN) ', 6, 1, 'Obat Paru'),
('OB-00098', 'OAT ANAK-KDT ', 6, 1, 'Obat Paru'),
('OB-00099', 'OAT ANAK(INTENSIF) ', 6, 1, 'Obat Paru'),
('OB-00100', 'OBH syrup ', 6, 2, 'untuk mengencerkan dahak'),
('OB-00101', 'Oksimetazolin HCl tetes hidung ', 6, 2, 'tetes telinga'),
('OB-00102', 'Oksitetrasiklin salep mata 1% ', 5, 4, 'obat salep mata'),
('OB-00103', 'Omeprazole 20mg kap ', 6, 1, 'untuk mengatasi perut keram '),
('OB-00104', 'Papaverin 40mg tab ', 6, 1, 'untuk meningkatkan aliran darah ke seluruh tubuh'),
('OB-00105', 'Parasetamol syr 120mg/5ml ', 6, 2, 'untuk mengatasi panas atau demam pada anak'),
('OB-00106', 'Parasetamol tab 500mg ', 6, 1, 'untuk mengatasi demam'),
('OB-00107', 'Pirantel 125mg tab score ', 6, 1, 'obat cacing'),
('OB-00108', 'Procuma Sirup  ', 6, 2, 'untuk menambah nafsu makan'),
('OB-00109', 'Phytomenadione(Vitamin K) ', 6, 1, 'untuk menghentikan batuk berdarah'),
('OB-00110', 'Phentoin Sodium ', 6, 1, 'obat jiwa '),
('OB-00111', 'Povidun lodium ', 6, 1, 'obat jiwa'),
('OB-00112', 'Piridoksin (B6) 10mg ', 6, 1, 'obat vitamin'),
('OB-00113', 'Resperidon ', 6, 1, 'obat jiwa'),
('OB-00114', 'Ranitidin 150mg tab ', 6, 1, 'untuk mengatasi perut mual'),
('OB-00115', 'Salbutamol 2mg tab ', 6, 1, 'untuk mengatasi sesak nafas'),
('OB-00116', 'Salep 2-4 ', 5, 4, 'obat kulit'),
('OB-00117', 'Sefadroxil syr kering 125mg/5ml ', 6, 2, 'obat anti biotik infeksi'),
('OB-00118', 'Sefiksim 100mg ', 6, 1, 'untuk mengatasi berbagai macam infeksi '),
('OB-00119', 'Simvastatin 10mg tab ', 6, 1, 'untuk menurunkan kolestrol'),
('OB-00120', 'Scopma ', 6, 1, 'untuk mengatasi diare'),
('OB-00121', 'Siproflosasin 500mg tab ', 6, 1, 'obat infeksi'),
('OB-00122', 'Tambah Darah Non Generik (Hemafort) ', 6, 1, 'untuk menambah darah '),
('OB-00123', 'Tetrasiklin 500mg kap ', 6, 1, 'untuk melancarkan pencernaan'),
('OB-00124', 'Theophyllin 150mg tab ', 6, 1, 'untuk mengobati napas pendek'),
('OB-00125', 'Thiamfenikol 500mg kap ', 6, 1, 'obat anti biotik perut '),
('OB-00126', 'Trifluoperazine 5mg ', 6, 1, 'untuk mengobati gangguan mental'),
('OB-00127', 'Thiamfenikol syrup ', 6, 2, 'obat ant biotik pada anak'),
('OB-00128', 'Thiamin (B1) 50mg tab ', 6, 1, 'menambah vitamin pada tubuh'),
('OB-00129', 'Tokovin ', 6, 1, 'obat vitamin E'),
('OB-00130', 'Triheksifenidil 2mg(THD) ', 6, 1, 'Obat jiwa'),
('OB-00132', 'Vitamin B Komplex ', 6, 1, 'untuk menambah nafsu makan'),
('OB-00133', 'Zinc 10mg tab ', 6, 1, 'obat anti biotik pada perut'),
('OB-00134', 'Zinc syrup 10mg/5ml ', 6, 1, 'obat anti biotik diare pada anak'),
('OB-00135', 'Ampisilin ', 2, 3, 'untuk mengatasi infeksi akibat bakteri'),
('OB-00137', 'Sofatic Metoclopramide ', 2, 3, 'untuk menurunkan darah tinggi'),
('OB-00138', 'Ika Newron ', 2, 3, 'obat vitamin'),
('OB-00139', 'Antrain ', 2, 3, 'obat injeksi'),
('OB-00140', 'Cefotaxim ', 2, 3, 'obat anti biotik pada tubuh'),
('OB-00141', 'Dexamethason ', 2, 3, 'untuk mengatasi kondisi sistem kekebalan pada tubuh'),
('OB-00142', 'Cyanocobalamin ', 2, 3, 'vitamin b12 buatan, untuk mencegah kekurangan vitamin b12'),
('OB-00143', 'Lidocain Composit ', 2, 3, 'untuk mengatasi infeksi'),
('OB-00144', 'Ranitidin  ', 2, 3, 'untuk mengatasi perut kembung'),
('OB-00145', 'Neurobion ', 2, 3, 'untuk menambah stamina pada tubuh'),
('OB-00146', 'Dhipenhydramine HCI ', 2, 3, 'untuk mengatasi akibat infeksi dan bakteri pada tubuh'),
('OB-00147', 'Oxitoxin ', 2, 3, 'obat anti septik '),
('OB-00148', 'Metilergometrin  ', 2, 3, 'untuk mengehentikan darah'),
('OB-00149', 'ambroxol ', 6, 1, 'obat batuk');

-- --------------------------------------------------------

--
-- Table structure for table `obatkeluar`
--

CREATE TABLE `obatkeluar` (
  `id_obatkeluar` int(11) NOT NULL,
  `kd_pasien` varchar(128) DEFAULT NULL,
  `kd_obat` varchar(128) DEFAULT NULL,
  `tgl_obatkeluar` date DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `nama_petugas` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `obatkeluar`
--

INSERT INTO `obatkeluar` (`id_obatkeluar`, `kd_pasien`, `kd_obat`, `tgl_obatkeluar`, `qty`, `nama_petugas`) VALUES
(17, 'PS-00001', 'OB-00010 ', '2019-09-12', 10, 'Aisyah'),
(18, 'PS-00001', 'OB-00001 ', '2019-09-12', 1920, 'Aisyah'),
(19, 'PS-00001', 'OB-00012 ', '2019-09-12', 1, 'Aisyah'),
(20, 'PS-00004', 'OB-00002 ', '2019-09-12', 80, 'Aisyah'),
(21, 'PS-00006', 'OB-00003 ', '2019-09-12', 5, 'Aisyah'),
(22, 'PS-00002', 'OB-00004 ', '2019-09-12', 30, 'Aisyah'),
(23, 'PS-00003', 'OB-00005 ', '2019-09-12', 20, 'Aisyah'),
(24, 'PS-00001', 'OB-00006 ', '2019-09-12', 10, 'Aisyah'),
(26, 'PS-00001', 'OB-00007 ', '2019-09-12', 10, 'Aisyah'),
(27, 'PS-00005', 'OB-00014 ', '2019-09-12', 20, 'Aisyah'),
(28, 'PS-00001', 'OB-00015 ', '2019-09-12', 1, 'Aisyah'),
(29, 'PS-00002', 'OB-00011 ', '2019-09-12', 10, 'Aisyah'),
(30, 'PS-00001', 'OB-00009 ', '2019-09-12', 5, 'Aisyah'),
(31, 'PS-00003', 'OB-00014 ', '2019-09-12', 20, 'Aisyah'),
(32, 'PS-00001', 'OB-00013 ', '2019-09-12', 200, 'Aisyah'),
(33, 'PS-00008', 'OB-00016 ', '2019-09-12', 10, 'Aisyah'),
(34, 'PS-00001', 'OB-00018 ', '2019-09-12', 1, 'Aisyah'),
(35, 'PS-00001', 'OB-00017 ', '2019-09-12', 10, 'Aisyah');

--
-- Triggers `obatkeluar`
--
DELIMITER $$
CREATE TRIGGER `hapusobat` AFTER DELETE ON `obatkeluar` FOR EACH ROW BEGIN
 UPDATE stok
 SET qty = qty + OLD.qty
 WHERE
 kd_obat = OLD.kd_obat;
 END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `keluarobat` AFTER INSERT ON `obatkeluar` FOR EACH ROW BEGIN
 UPDATE stok
 SET qty = qty - NEW.qty
 WHERE
 kd_obat = NEW.kd_obat;
 END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `obatmasuk`
--

CREATE TABLE `obatmasuk` (
  `id_obatmasuk` int(11) NOT NULL,
  `kd_obat` varchar(128) DEFAULT NULL,
  `tgl_obatmasuk` date DEFAULT NULL,
  `tgl_expired` date DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `nama_petugas` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `obatmasuk`
--

INSERT INTO `obatmasuk` (`id_obatmasuk`, `kd_obat`, `tgl_obatmasuk`, `tgl_expired`, `qty`, `nama_petugas`) VALUES
(7, 'OB-00003 ', '2019-06-17', '2019-06-30', 100, 'Aisyah'),
(8, 'OB-00002 ', '2019-06-19', '2019-06-30', 300, 'Aisyah'),
(9, 'OB-00001 ', '2019-08-08', '2021-08-08', 500, 'Apoteker'),
(10, 'OB-00005 ', '2019-08-08', '2020-08-08', 200, 'Apoteker'),
(11, 'OB-00001 ', '2019-08-08', '2020-08-08', 100, 'Apoteker'),
(12, 'OB-00006 ', '2019-08-09', '2020-08-09', 100, 'syamsudin'),
(13, 'OB-00001 ', '2019-08-09', '2020-08-09', 100, 'Apoteker'),
(14, 'OB-00001 ', '2019-08-09', '2020-08-09', 500, 'Apoteker'),
(15, 'OB-00001 ', '2019-09-11', '2020-09-11', 500, 'Apoteker'),
(16, 'OB-00001 ', '2019-09-11', '2020-09-11', 300, 'Apoteker'),
(17, 'OB-00002 ', '2019-09-11', '2020-09-11', 200, 'Apoteker'),
(18, 'OB-00004 ', '2019-09-11', '2020-09-11', 700, 'Apoteker'),
(19, 'OB-00005 ', '2019-09-11', '2020-09-11', 20, 'Apoteker'),
(20, 'OB-00006 ', '2019-09-11', '2020-09-11', 400, 'Apoteker'),
(21, 'OB-00007 ', '2019-09-11', '2020-09-11', 500, 'Apoteker'),
(22, 'OB-00007 ', '2019-09-11', '2020-09-11', 200, 'Apoteker'),
(23, 'OB-00009 ', '2019-09-11', '2020-09-11', 100, 'Apoteker'),
(24, 'OB-00010 ', '2019-09-11', '2020-09-11', 300, 'Apoteker'),
(25, 'OB-00011 ', '2019-09-11', '2020-09-11', 200, 'Apoteker'),
(26, 'OB-00012 ', '2019-09-11', '2020-09-11', 20, 'Apoteker'),
(27, 'OB-00013 ', '2019-09-11', '2020-09-11', 300, 'Apoteker'),
(28, 'OB-00014 ', '2019-09-11', '2020-09-11', 300, 'Apoteker'),
(29, 'OB-00015 ', '2019-09-11', '2020-09-11', 30, 'Apoteker'),
(30, 'OB-00016 ', '2019-09-11', '2020-09-11', 300, 'Apoteker'),
(31, 'OB-00017 ', '2019-09-11', '2020-09-11', 300, 'Apoteker'),
(32, 'OB-00018 ', '2019-09-11', '2020-09-11', 30, 'Apoteker'),
(33, 'OB-00019 ', '2019-09-11', '2020-09-11', 300, 'Apoteker'),
(34, 'OB-00020 ', '2019-09-11', '2020-09-11', 400, 'Apoteker'),
(35, 'OB-00021 ', '2019-09-11', '2020-09-11', 300, 'Apoteker'),
(36, 'OB-00022 ', '2019-09-11', '2020-09-11', 400, 'Apoteker'),
(37, 'OB-00023 ', '2019-09-11', '2020-09-11', 20, 'Apoteker'),
(38, 'OB-00024 ', '2019-09-11', '2020-09-11', 300, 'Apoteker'),
(39, 'OB-00025 ', '2019-09-11', '2020-09-11', 20, 'Apoteker'),
(40, 'OB-00026 ', '2019-09-11', '2020-09-11', 30, 'Apoteker'),
(41, 'OB-00027 ', '2019-09-11', '2020-09-11', 40, 'Apoteker'),
(42, 'OB-00028 ', '2019-09-11', '2020-09-11', 20, 'Apoteker'),
(43, 'OB-00029 ', '2019-09-11', '2020-09-11', 400, 'Apoteker'),
(44, 'OB-00030 ', '2019-09-11', '2020-09-11', 300, 'Apoteker'),
(45, 'OB-00031 ', '2019-09-11', '2020-09-11', 30, 'Apoteker'),
(46, 'OB-00032 ', '2019-09-11', '2020-09-11', 400, 'Apoteker'),
(47, 'OB-00033 ', '2019-09-11', '2020-09-11', 300, 'Apoteker'),
(48, 'OB-00034 ', '2019-09-11', '2020-09-11', 300, 'Apoteker'),
(49, 'OB-00035 ', '2019-09-11', '2020-09-11', 25, 'Apoteker'),
(50, 'OB-00036 ', '2019-09-11', '2020-09-11', 20, 'Apoteker'),
(51, 'OB-00037 ', '2019-09-11', '2020-09-11', 300, 'Apoteker'),
(52, 'OB-00038 ', '2019-09-11', '2020-09-11', 300, 'Apoteker'),
(53, 'OB-00039 ', '2019-09-11', '2020-09-11', 300, 'Apoteker'),
(54, 'OB-00040 ', '2019-09-11', '2020-09-11', 400, 'Apoteker'),
(55, 'OB-00041 ', '2019-09-11', '2020-09-11', 300, 'Apoteker'),
(56, 'OB-00042 ', '2019-09-11', '2020-09-11', 300, 'Apoteker'),
(57, 'OB-00043 ', '2019-09-11', '2020-09-11', 300, 'Apoteker'),
(58, 'OB-00044 ', '2019-09-11', '2020-09-11', 300, 'Apoteker'),
(59, 'OB-00045 ', '2019-09-11', '2020-09-11', 20, 'Apoteker'),
(60, 'OB-00046 ', '2019-09-11', '2020-09-11', 300, 'Apoteker'),
(61, 'OB-00047 ', '2019-09-11', '2020-09-11', 200, 'Apoteker'),
(62, 'OB-00048 ', '2019-09-11', '2020-09-11', 300, 'Apoteker'),
(63, 'OB-00049 ', '2019-09-11', '2020-09-11', 20, 'Apoteker'),
(64, 'OB-00050 ', '2019-09-11', '2020-09-11', 400, 'Apoteker'),
(65, 'OB-00051 ', '2019-09-11', '2020-09-11', 400, 'Apoteker'),
(66, 'OB-00052 ', '2019-09-11', '2020-09-11', 400, 'Apoteker'),
(67, 'OB-00053 ', '2019-09-11', '2020-09-11', 20, 'Apoteker'),
(68, 'OB-00054 ', '2019-09-11', '2020-09-11', 30, 'Apoteker'),
(69, 'OB-00055 ', '2019-09-11', '2020-09-11', 400, 'Apoteker'),
(70, 'OB-00056 ', '2019-09-11', '2020-09-11', 300, 'Apoteker'),
(71, 'OB-00056 ', '2019-09-11', '2020-09-11', 300, 'Apoteker'),
(72, 'OB-00057 ', '2019-09-11', '2020-09-11', 400, 'Apoteker'),
(73, 'OB-00058 ', '2019-09-11', '2020-09-11', 400, 'Apoteker'),
(74, 'OB-00058 ', '2019-09-11', '2020-09-11', 400, 'Apoteker'),
(75, 'OB-00059 ', '2019-09-11', '2020-09-11', 400, 'Apoteker'),
(76, 'OB-00060 ', '2019-09-11', '2020-09-11', 300, 'Apoteker'),
(77, 'OB-00061 ', '2019-09-11', '2020-09-11', 400, 'Apoteker'),
(78, 'OB-00062 ', '2019-09-11', '2020-09-11', 400, 'Apoteker'),
(79, 'OB-00063 ', '2019-09-11', '2020-09-11', 300, 'Apoteker'),
(80, 'OB-00064 ', '2019-09-11', '2020-09-11', 400, 'Apoteker'),
(81, 'OB-00065 ', '2019-09-11', '2020-09-11', 400, 'Apoteker'),
(82, 'OB-00066 ', '2019-09-11', '2020-09-11', 400, 'Apoteker'),
(83, 'OB-00067 ', '2019-09-11', '2020-09-11', 20, 'Apoteker'),
(84, 'OB-00068 ', '2019-09-11', '2020-09-11', 400, 'Apoteker'),
(85, 'OB-00069 ', '2019-09-11', '2020-09-11', 20, 'Apoteker'),
(86, 'OB-00070 ', '2019-09-11', '2020-09-11', 300, 'Apoteker'),
(87, 'OB-00071 ', '2019-09-11', '2020-09-11', 30, 'Apoteker'),
(88, 'OB-00072 ', '2019-09-11', '2020-09-11', 20, 'Apoteker'),
(89, 'OB-00073 ', '2019-09-11', '2020-09-11', 300, 'Apoteker'),
(90, 'OB-00074 ', '2019-09-11', '2020-09-11', 20, 'Apoteker'),
(91, 'OB-00075 ', '2019-09-11', '2020-09-11', 400, 'Apoteker'),
(92, 'OB-00076 ', '2019-09-11', '2020-09-11', 300, 'Apoteker'),
(93, 'OB-00077 ', '2019-09-11', '2020-09-11', 400, 'Apoteker'),
(94, 'OB-00078 ', '2019-09-11', '2020-09-11', 400, 'Apoteker'),
(95, 'OB-00079 ', '2019-09-11', '2020-09-11', 300, 'Apoteker'),
(96, 'OB-00080 ', '2019-09-11', '2020-09-11', 400, 'Apoteker'),
(97, 'OB-00081 ', '2019-09-11', '2020-09-11', 400, 'Apoteker'),
(98, 'OB-00082 ', '2019-09-11', '2020-09-11', 300, 'Apoteker'),
(99, 'OB-00083 ', '2019-09-11', '2020-09-11', 300, 'Apoteker'),
(100, 'OB-00084 ', '2019-09-11', '2020-09-11', 20, 'Apoteker'),
(101, 'OB-00085 ', '2019-09-11', '2020-09-11', 400, 'Apoteker'),
(102, 'OB-00086 ', '2019-09-11', '2020-09-11', 400, 'Apoteker'),
(103, 'OB-00087 ', '2019-09-11', '2020-09-11', 400, 'Apoteker'),
(104, 'OB-00088 ', '2019-09-11', '2020-09-11', 300, 'Apoteker'),
(105, 'OB-00089 ', '2019-09-11', '2020-09-11', 300, 'Apoteker'),
(106, 'OB-00090 ', '2019-09-11', '2020-09-11', 20, 'Apoteker'),
(107, 'OB-00091 ', '2019-09-11', '2020-09-11', 300, 'Apoteker'),
(108, 'OB-00092 ', '2019-09-11', '2020-09-11', 300, 'Apoteker'),
(109, 'OB-00096 ', '2019-09-11', '2020-09-11', 300, 'Apoteker'),
(110, 'OB-00104 ', '2019-09-11', '2020-09-11', 300, 'Apoteker'),
(111, 'OB-00108 ', '2019-09-11', '2020-09-11', 10, 'Apoteker'),
(112, 'OB-00106 ', '2019-09-11', '2020-09-11', 350, 'Apoteker'),
(113, 'OB-00116 ', '2019-09-11', '2020-09-11', 20, 'Apoteker'),
(114, 'OB-00117 ', '2019-09-11', '2020-09-11', 15, 'Apoteker'),
(115, 'OB-00119 ', '2019-09-11', '2020-09-11', 200, 'Apoteker'),
(116, 'OB-00127 ', '2019-09-11', '2020-09-11', 10, 'Apoteker'),
(117, 'OB-00120 ', '2019-09-11', '2020-09-11', 100, 'Apoteker'),
(118, 'OB-00143 ', '2019-09-11', '2020-09-11', 10, 'Apoteker'),
(119, 'OB-00147 ', '2019-09-11', '2020-09-11', 50, 'Apoteker'),
(120, 'OB-00145 ', '2019-09-11', '2020-09-11', 10, 'Apoteker'),
(121, 'OB-00137 ', '2019-09-11', '2020-09-11', 40, 'Apoteker'),
(122, 'OB-00135 ', '2019-09-11', '2020-09-11', 15, 'Apoteker'),
(123, 'OB-00132 ', '2019-09-11', '2020-09-11', 500, 'Apoteker');

--
-- Triggers `obatmasuk`
--
DELIMITER $$
CREATE TRIGGER `masukobat` AFTER INSERT ON `obatmasuk` FOR EACH ROW BEGIN
 INSERT INTO stok SET
 kd_obat = NEW.kd_obat, qty=New.qty
 ON DUPLICATE KEY UPDATE qty=qty+New.qty;
 END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE `pasien` (
  `kd_pasien` varchar(128) NOT NULL,
  `nama_pasien` varchar(128) DEFAULT NULL,
  `alamat` text,
  `no_rekam` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`kd_pasien`, `nama_pasien`, `alamat`, `no_rekam`) VALUES
('PS-00001', 'Malidu', 'Pasuruan', '08/001/00'),
('PS-00002', 'Karjumi', 'Balung Anyar', '09/001/01'),
('PS-00003', 'siti aisyah', 'Balung Anyar', '05/1121/01'),
('PS-00004', 'Syamsudin', 'balung', '05/1121/00'),
('PS-00005', 'sumanis', 'balung anyar', '05/001/02'),
('PS-00006', 'SYAMSUDIN', 'BRANANG', '04/021/00'),
('PS-00007', 'sanali', 'branang', '04/001'),
('PS-00008', 'suriyam', 'branang', '04/00');

-- --------------------------------------------------------

--
-- Table structure for table `satuan`
--

CREATE TABLE `satuan` (
  `id_satuan` int(11) NOT NULL,
  `nama_satuan` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `satuan`
--

INSERT INTO `satuan` (`id_satuan`, `nama_satuan`) VALUES
(1, 'Tablet'),
(2, 'Botol'),
(3, 'Ampul'),
(4, 'Tube'),
(5, 'Vial'),
(6, 'Bungkus'),
(7, 'Kapsul');

-- --------------------------------------------------------

--
-- Table structure for table `stok`
--

CREATE TABLE `stok` (
  `kd_obat` varchar(128) NOT NULL,
  `qty` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stok`
--

INSERT INTO `stok` (`kd_obat`, `qty`) VALUES
('OB-00001 ', 0),
('OB-00002 ', 0),
('OB-00003 ', 0),
('OB-00004 ', 670),
('OB-00005 ', 160),
('OB-00006 ', 0),
('OB-00007 ', 0),
('OB-00009 ', 95),
('OB-00010 ', 290),
('OB-00011 ', 190),
('OB-00012 ', 19),
('OB-00013 ', 100),
('OB-00014 ', 260),
('OB-00015 ', 29),
('OB-00016 ', 290),
('OB-00017 ', 290),
('OB-00018 ', 29),
('OB-00019 ', 300),
('OB-00020 ', 400),
('OB-00021 ', 300),
('OB-00022 ', 400),
('OB-00023 ', 20),
('OB-00024 ', 300),
('OB-00025 ', 20),
('OB-00026 ', 30),
('OB-00027 ', 40),
('OB-00028 ', 20),
('OB-00029 ', 400),
('OB-00030 ', 300),
('OB-00031 ', 30),
('OB-00032 ', 400),
('OB-00033 ', 300),
('OB-00034 ', 300),
('OB-00035 ', 25),
('OB-00036 ', 20),
('OB-00037 ', 300),
('OB-00038 ', 300),
('OB-00039 ', 300),
('OB-00040 ', 400),
('OB-00041 ', 300),
('OB-00042 ', 300),
('OB-00043 ', 300),
('OB-00044 ', 300),
('OB-00045 ', 20),
('OB-00046 ', 300),
('OB-00047 ', 200),
('OB-00048 ', 300),
('OB-00049 ', 20),
('OB-00050 ', 400),
('OB-00051 ', 400),
('OB-00052 ', 400),
('OB-00053 ', 20),
('OB-00054 ', 30),
('OB-00055 ', 400),
('OB-00056 ', 600),
('OB-00057 ', 400),
('OB-00058 ', 800),
('OB-00059 ', 400),
('OB-00060 ', 300),
('OB-00061 ', 400),
('OB-00062 ', 400),
('OB-00063 ', 300),
('OB-00064 ', 400),
('OB-00065 ', 400),
('OB-00066 ', 400),
('OB-00067 ', 20),
('OB-00068 ', 400),
('OB-00069 ', 20),
('OB-00070 ', 300),
('OB-00071 ', 30),
('OB-00072 ', 20),
('OB-00073 ', 300),
('OB-00074 ', 20),
('OB-00075 ', 400),
('OB-00076 ', 300),
('OB-00077 ', 400),
('OB-00078 ', 400),
('OB-00079 ', 300),
('OB-00080 ', 400),
('OB-00081 ', 400),
('OB-00082 ', 300),
('OB-00083 ', 300),
('OB-00084 ', 20),
('OB-00085 ', 400),
('OB-00086 ', 400),
('OB-00087 ', 400),
('OB-00088 ', 300),
('OB-00089 ', 300),
('OB-00090 ', 20),
('OB-00091 ', 300),
('OB-00092 ', 300),
('OB-00096 ', 300),
('OB-00104 ', 300),
('OB-00106 ', 350),
('OB-00108 ', 10),
('OB-00116 ', 20),
('OB-00117 ', 15),
('OB-00119 ', 200),
('OB-00120 ', 100),
('OB-00127 ', 10),
('OB-00132 ', 500),
('OB-00135 ', 15),
('OB-00137 ', 40),
('OB-00143 ', 10),
('OB-00145 ', 10),
('OB-00147 ', 50);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) DEFAULT NULL,
  `email` varchar(128) DEFAULT NULL,
  `password` varchar(256) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `is_active` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `role_id`, `is_active`) VALUES
(1, 'Aisyah', 'aisyah@gmail.com', '$2y$10$T8BTys3bkw8TmAhWAwr8aONG/2vxD7eMPAAmO46Rvo1vltFRft3Iu', 1, 1),
(2, 'Apoteker', 'apoteker@gmail.com', '$2y$10$Z0qWXybdvN9VawlLkZpWDO9U7r3EsOlGgWJhi8iycr8EbM0ZOzI4e', 2, 1),
(6, 'syamsudin', 'syamsudin@gmail.com', '$2y$10$.tlr1KNNGNKp21WzLpBHceCT1jHK3youmk18e8J7DYNyqX0MmtGES', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  `menu_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 1, 3),
(4, 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'Asisten');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) DEFAULT NULL,
  `title` varchar(128) DEFAULT NULL,
  `url` varchar(128) DEFAULT NULL,
  `icon` varchar(128) DEFAULT NULL,
  `is_active` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'admin', 'fas fa-fw fa-tachometer-alt', 1),
(2, 1, 'Obat', 'obat', 'fas fa-fw fa-tablets', 1),
(3, 1, 'Pasien', 'pasien', 'fas fa-fw fa-chalkboard-teacher', 1),
(4, 2, 'Dashboard', 'user', 'fas fa-fw fa-tachometer-alt', 1),
(5, 1, 'Config User', 'admin/user', 'fas fa-fw fa-users-cog', 1),
(6, 2, 'Obat Masuk', 'obatmasuk', 'fas fa-fw fa-external-link-alt', 1),
(7, 2, 'Data Obat', 'dataobat', 'fas fa-fw fa-tablets', 1),
(8, 1, 'Obat Keluar', 'obatkeluar', 'fas fa-fw fa-outdent', 1),
(9, 1, 'Change Password', 'admin/changepassword', 'fas fa-fw fa-user-edit', 1),
(10, 2, 'Change Password', 'user/changepassword', 'fas fa-fw fa-user-edit', 1),
(11, 1, 'Obat Kadaluarsa', 'kadaluarsa', 'fas fa-fw fa-shipping-fast', 1),
(12, 1, 'Laporan Pasien', 'admin/lap_pasien', 'fas fa-fw fa-print', 0),
(13, 2, 'Laporan Obat Masuk', 'user/lap_obatmasuk', 'fas fa-fw fa-print', 1),
(14, 1, 'Laporan Obat Keluar', 'admin/lap_obatkeluar', 'fas fa-fw fa-print', 1),
(15, 1, 'Laporan Persediaan', 'admin/lap_persediaan', 'fas fa-fw fa-print', 1),
(16, 1, 'Laporan Stok FIFO', 'admin/lap_stok', 'fas fa-fw fa-print', 1),
(17, 1, 'Laporan Kadaluarsa', 'admin/lap_kadaluarsa', 'fas fa-fw fa-print', 1);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_lap_obat`
-- (See below for the actual view)
--
CREATE TABLE `view_lap_obat` (
`kd_obat` varchar(128)
,`nama_obat` varchar(128)
,`nama_kategori` varchar(128)
,`nama_satuan` varchar(128)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_lap_obatkeluar`
-- (See below for the actual view)
--
CREATE TABLE `view_lap_obatkeluar` (
`nama_pasien` varchar(128)
,`nama_obat` varchar(128)
,`tgl_obatkeluar` date
,`qty` int(11)
,`nama_petugas` varchar(128)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_lap_obatmasuk`
-- (See below for the actual view)
--
CREATE TABLE `view_lap_obatmasuk` (
`kd_obat` varchar(128)
,`nama_obat` varchar(128)
,`tgl_obatmasuk` date
,`tgl_expired` date
,`qty` int(11)
,`nama_petugas` varchar(128)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_lap_pasien`
-- (See below for the actual view)
--
CREATE TABLE `view_lap_pasien` (
`kd_pasien` varchar(128)
,`nama_pasien` varchar(128)
,`alamat` text
,`no_rekam` varchar(128)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_lap_persediaan`
-- (See below for the actual view)
--
CREATE TABLE `view_lap_persediaan` (
`kd_obat` varchar(128)
,`nama_obat` varchar(128)
,`nama_satuan` varchar(128)
,`nama_kategori` varchar(128)
,`qty` int(11)
);

-- --------------------------------------------------------

--
-- Structure for view `view_lap_obat`
--
DROP TABLE IF EXISTS `view_lap_obat`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_lap_obat`  AS  (select `obat`.`kd_obat` AS `kd_obat`,`obat`.`nama_obat` AS `nama_obat`,`kategori`.`nama_kategori` AS `nama_kategori`,`satuan`.`nama_satuan` AS `nama_satuan` from ((`obat` join `kategori`) join `satuan`) where ((`obat`.`kategori` = `kategori`.`id_kategori`) and (`obat`.`satuan` = `satuan`.`id_satuan`))) ;

-- --------------------------------------------------------

--
-- Structure for view `view_lap_obatkeluar`
--
DROP TABLE IF EXISTS `view_lap_obatkeluar`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_lap_obatkeluar`  AS  (select `pasien`.`nama_pasien` AS `nama_pasien`,`obat`.`nama_obat` AS `nama_obat`,`obatkeluar`.`tgl_obatkeluar` AS `tgl_obatkeluar`,`obatkeluar`.`qty` AS `qty`,`obatkeluar`.`nama_petugas` AS `nama_petugas` from ((`obatkeluar` join `pasien`) join `obat`) where ((`obatkeluar`.`kd_pasien` = `pasien`.`kd_pasien`) and (`obatkeluar`.`kd_obat` = `obat`.`kd_obat`))) ;

-- --------------------------------------------------------

--
-- Structure for view `view_lap_obatmasuk`
--
DROP TABLE IF EXISTS `view_lap_obatmasuk`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_lap_obatmasuk`  AS  (select `obatmasuk`.`kd_obat` AS `kd_obat`,`obat`.`nama_obat` AS `nama_obat`,`obatmasuk`.`tgl_obatmasuk` AS `tgl_obatmasuk`,`obatmasuk`.`tgl_expired` AS `tgl_expired`,`obatmasuk`.`qty` AS `qty`,`obatmasuk`.`nama_petugas` AS `nama_petugas` from (`obatmasuk` join `obat`) where (`obat`.`kd_obat` = `obatmasuk`.`kd_obat`)) ;

-- --------------------------------------------------------

--
-- Structure for view `view_lap_pasien`
--
DROP TABLE IF EXISTS `view_lap_pasien`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_lap_pasien`  AS  (select `pasien`.`kd_pasien` AS `kd_pasien`,`pasien`.`nama_pasien` AS `nama_pasien`,`pasien`.`alamat` AS `alamat`,`pasien`.`no_rekam` AS `no_rekam` from `pasien`) ;

-- --------------------------------------------------------

--
-- Structure for view `view_lap_persediaan`
--
DROP TABLE IF EXISTS `view_lap_persediaan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_lap_persediaan`  AS  (select `obat`.`kd_obat` AS `kd_obat`,`obat`.`nama_obat` AS `nama_obat`,`satuan`.`nama_satuan` AS `nama_satuan`,`kategori`.`nama_kategori` AS `nama_kategori`,`stok`.`qty` AS `qty` from (((`obat` join `stok`) join `kategori`) join `satuan`) where ((`obat`.`kd_obat` = `stok`.`kd_obat`) and (`obat`.`kategori` = `kategori`.`id_kategori`) and (`obat`.`satuan` = `satuan`.`id_satuan`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`kd_obat`);

--
-- Indexes for table `obatkeluar`
--
ALTER TABLE `obatkeluar`
  ADD PRIMARY KEY (`id_obatkeluar`);

--
-- Indexes for table `obatmasuk`
--
ALTER TABLE `obatmasuk`
  ADD PRIMARY KEY (`id_obatmasuk`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`kd_pasien`);

--
-- Indexes for table `satuan`
--
ALTER TABLE `satuan`
  ADD PRIMARY KEY (`id_satuan`);

--
-- Indexes for table `stok`
--
ALTER TABLE `stok`
  ADD PRIMARY KEY (`kd_obat`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `obatkeluar`
--
ALTER TABLE `obatkeluar`
  MODIFY `id_obatkeluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `obatmasuk`
--
ALTER TABLE `obatmasuk`
  MODIFY `id_obatmasuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;
--
-- AUTO_INCREMENT for table `satuan`
--
ALTER TABLE `satuan`
  MODIFY `id_satuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
