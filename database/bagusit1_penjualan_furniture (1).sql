-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 26 Agu 2022 pada 02.56
-- Versi server: 5.7.39
-- Versi PHP: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bagusit1_penjualan_furniture`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` int(1) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `nama`, `username`, `password`) VALUES
(1, 'Administrator', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_bank`
--

CREATE TABLE `tb_bank` (
  `id_bank` int(6) NOT NULL,
  `nama_bank` varchar(20) NOT NULL,
  `nama_rekening` varchar(50) NOT NULL,
  `no_rekening` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_bank`
--

INSERT INTO `tb_bank` (`id_bank`, `nama_bank`, `nama_rekening`, `no_rekening`) VALUES
(1, 'BCA', 'UD Sido Asih', '12345678901'),
(2, 'BRI', 'UD Sido Asih', '12345678902'),
(3, 'Mandiri', 'UD Sido Asih', '12345678903');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_detail_transaksi`
--

CREATE TABLE `tb_detail_transaksi` (
  `id` int(11) NOT NULL,
  `id_transaksi` varchar(15) NOT NULL,
  `id_produk` varchar(15) NOT NULL,
  `nama_produk` varchar(50) NOT NULL,
  `berat` double NOT NULL,
  `harga` double NOT NULL,
  `jumlah` int(11) NOT NULL,
  `sub_berat` double NOT NULL,
  `sub_total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_detail_transaksi`
--

INSERT INTO `tb_detail_transaksi` (`id`, `id_transaksi`, `id_produk`, `nama_produk`, `berat`, `harga`, `jumlah`, `sub_berat`, `sub_total`) VALUES
(6, 'TR170422001', 'PR1708220008', 'Kursi set', 14000, 3200000, 2, 28000, 6400000),
(7, 'TR170422002', 'PR1708220004', 'Lemari Pakaian', 12000, 6500000, 1, 12000, 6500000),
(8, 'TR170422003', 'PR1708220005', 'Lemari Hias', 25000, 7000000, 1, 25000, 7000000),
(9, 'TR170422004', 'PR1708220002', 'Lemari Pakaian', 8500, 4000000, 1, 8500, 4000000),
(10, 'TR170422005', 'PR1708220005', 'Lemari Hias', 25000, 7000000, 1, 25000, 7000000),
(11, 'TR170422006', 'PR1708220006', 'Lemari Hias', 20000, 5000000, 1, 20000, 5000000),
(12, 'TR170522007', 'PR1708220012', 'Lemari Pakaian', 13500, 3500000, 1, 13500, 3500000),
(13, 'TR180522008', 'PR1708220011', 'Kursi Tamu', 7000, 1000000, 1, 7000, 1000000),
(14, 'TR220522009', 'PR1708220002', 'Lemari Pakaian', 8500, 4000000, 1, 8500, 4000000),
(15, 'TR220522010', 'PR1708220009', 'Kursi set', 14000, 3300000, 1, 14000, 3300000),
(16, 'TR220522011', 'PR1708220014', 'Meja Belajar', 5000, 600000, 2, 10000, 1200000),
(17, 'TR220522012', 'PR1708220003', 'Lemari Pakaian', 9000, 4000000, 1, 9000, 4000000),
(18, 'TR220522013', 'PR1708220014', 'Meja Belajar', 5000, 600000, 3, 15000, 1800000),
(19, 'TR220522014', 'PR1708220014', 'Meja Belajar', 5000, 600000, 2, 10000, 1200000),
(20, 'TR230522001', 'PR1708220004', 'Lemari Pakaian', 12000, 6500000, 1, 12000, 6500000),
(21, 'TR230522004', 'PR2308220005', 'Meja Set ', 1000, 600000, 4, 4000, 2400000),
(22, 'TR230522002', 'PR2308220001', 'Meja Makan Set', 500, 650000, 2, 1000, 1300000),
(23, 'TR230522003', 'PR2308220010', 'Meja Kayu jatibelanda', 5000, 2350000, 1, 5000, 2350000),
(24, 'TR230622004', 'PR2308220009', 'Lemari Kayu 3 Pintu', 7000, 5500000, 1, 7000, 5500000),
(25, 'TR230622005', 'PR2308220009', 'Lemari Kayu 3 Pintu', 7000, 5500000, 1, 7000, 5500000),
(26, 'TR230622006', 'PR1708220008', 'Kursi set', 14000, 3200000, 1, 14000, 3200000),
(27, 'TR230622007', 'PR2308220008', 'Kursi Kayu', 500, 200000, 4, 2000, 800000),
(28, 'TR230622008', 'PR1708220011', 'Kursi Tamu', 7000, 1000000, 1, 7000, 1000000),
(29, 'TR230622009', 'PR2308220002', 'Bangku Kayu', 500, 120000, 4, 2000, 480000),
(30, 'TR230622009', 'PR2308220003', 'Meja Bar', 500, 350000, 1, 500, 350000),
(31, 'TR230622010', 'PR2308220011', 'Bangku Bulat', 500, 200000, 2, 1000, 400000),
(32, 'TR230622011', 'PR1708220003', 'Lemari Pakaian', 9000, 4000000, 1, 9000, 4000000),
(33, 'TR230622012', 'PR2308220005', 'Meja Set ', 1000, 600000, 2, 2000, 1200000),
(34, 'TR230622013', 'PR2308220010', 'Meja Kayu jatibelanda', 5000, 2350000, 1, 5000, 2350000),
(35, 'TR230622014', 'PR2308220011', 'Bangku Bulat', 500, 200000, 3, 1500, 600000),
(36, 'TR230622015', 'PR1708220002', 'Lemari Pakaian', 8500, 4000000, 1, 8500, 4000000),
(37, 'TR230622016', 'PR1708220002', 'Lemari Pakaian', 8500, 4000000, 1, 8500, 4000000),
(38, 'TR230722017', 'PR1708220001', 'Lemari Pakaian', 10000, 6000000, 1, 10000, 6000000),
(39, 'TR230722001', 'PR1708220010', 'Kursi Meja', 15000, 3300000, 1, 15000, 3300000),
(40, 'TR230722002', 'PR2308220005', 'Meja Set ', 1000, 600000, 1, 1000, 600000),
(41, 'TR230722003', 'PR1708220003', 'Lemari Pakaian', 9000, 4000000, 1, 9000, 4000000),
(42, 'TR230722004', 'PR2308220008', 'Kursi Kayu', 500, 200000, 3, 1500, 600000),
(43, 'TR230722005', 'PR1708220002', 'Lemari Pakaian', 8500, 4000000, 1, 8500, 4000000),
(44, 'TR230722006', 'PR1708220012', 'Lemari Pakaian', 13500, 3500000, 1, 13500, 3500000),
(45, 'TR230722007', 'PR2308220004', 'Meja Kantor', 500, 850000, 1, 500, 850000),
(46, 'TR230722008', 'PR2308220007', 'Meja Belajar Kayu', 2500, 400000, 1, 2500, 400000),
(47, 'TR230722009', 'PR2308220002', 'Bangku Kayu', 500, 120000, 3, 1500, 360000),
(48, 'TR230722010', 'PR2308220010', 'Meja Kayu jatibelanda', 5000, 2350000, 1, 5000, 2350000),
(49, 'TR230722011', 'PR2308220002', 'Bangku Kayu', 500, 120000, 4, 2000, 480000),
(50, 'TR230722012', 'PR2308220003', 'Meja Bar', 500, 350000, 1, 500, 350000),
(51, 'TR230822001', 'PR1708220005', 'Lemari Hias', 25000, 7000000, 1, 25000, 7000000);

--
-- Trigger `tb_detail_transaksi`
--
DELIMITER $$
CREATE TRIGGER `update_stok` AFTER INSERT ON `tb_detail_transaksi` FOR EACH ROW BEGIN

UPDATE tb_produk SET stok = stok - NEW.jumlah WHERE id_produk = NEW.id_produk;

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_informasi`
--

CREATE TABLE `tb_informasi` (
  `id` int(1) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `no_telepon` varchar(13) NOT NULL,
  `email` varchar(50) NOT NULL,
  `cara_pemesanan` text NOT NULL,
  `kota` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_informasi`
--

INSERT INTO `tb_informasi` (`id`, `nama`, `alamat`, `no_telepon`, `email`, `cara_pemesanan`, `kota`) VALUES
(1, 'UD Sido Asih', 'Jl. Bugangin No.7 Rt.15/Rw.03, Banjarsari, Kecamatan Madiun kabupaten Madiun, Jawa Timur  Kode Pos : 63151', '081123456781', 'udsidoasih@gmail.com', '<ol><li>Lakukan pendaftaran pada menu pendaftaran untuk dapat login kedalam menu pengguna</li><li>Login dengan menggunakan username dan password sesuai dengan akun yang sudah terdaftar</li><li>Cari barang yang akan dibeli kemudian klik beli, maka data barang akan masuk kedalam keranjang belanaja</li><li>Jika barang yang akan dibeli selesai maka klik tombol pesan</li><li>Lakukan pembayaran melalui tranfer</li><li>Kemudian konfirmasi pembayaran dengan mengupload bukti transfer</li><li>Kemudianakan dikonfirmasi kapan barang dikirim</li><li>Selesai</li></ol>', '247\r\n                ');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_kategori`
--

INSERT INTO `tb_kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Meja'),
(2, 'Kursi'),
(3, 'Lemari');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_keranjang`
--

CREATE TABLE `tb_keranjang` (
  `id_keranjang` int(11) NOT NULL,
  `id_pelanggan` varchar(15) NOT NULL,
  `id_produk` varchar(15) NOT NULL,
  `nama_produk` varchar(50) NOT NULL,
  `berat` double NOT NULL,
  `harga` double NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total_berat` double NOT NULL,
  `total_harga` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_keranjang`
--

INSERT INTO `tb_keranjang` (`id_keranjang`, `id_pelanggan`, `id_produk`, `nama_produk`, `berat`, `harga`, `jumlah`, `total_berat`, `total_harga`) VALUES
(77, 'PLG0045', 'PR1708220010', 'Kursi Meja', 15000, 3300000, 1, 15000, 3300000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pelanggan`
--

CREATE TABLE `tb_pelanggan` (
  `id_pelanggan` varchar(15) NOT NULL,
  `nama_pelanggan` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `no_telepon` varchar(13) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_pelanggan`
--

INSERT INTO `tb_pelanggan` (`id_pelanggan`, `nama_pelanggan`, `alamat`, `no_telepon`, `username`, `password`) VALUES
('PLG0003', 'Windu Ramadhani', 'Jl. Pulanggeni rt. 16/06 Kel. Josenan Kec. Taman Kota Madiun', '085123432223', 'Windu Ramadhani', 'g1g13j3b03ll'),
('PLG0004', 'Sri Hartati', 'Jl. Apotik hidup No. 23 Kel.Ngengong, Kec Manguharjo Kota Madiun', '085735222007', 'Sri', '123'),
('PLG0005', 'Saka', 'Jl. Suwondo rt.08/rw.02 Ds. Kaibon Kec. Geger Kab. Madiun', '081234756577', 'Saka N', 'svw30r4j4mv'),
('PLG0006', 'Agus Budhie Santoso', 'Jl. Banda no.20', '085735675951', 'Agus', '123'),
('PLG0007', 'Tindi Aprisiano', 'Jl.Mojopahit no.37', '085777551922', 'tiwok123', 'tiwok123'),
('PLG0008', 'Kartini', 'Jl.GorangGareng', '085777551903', 'tiwok12345', 'tiwok12345'),
('PLG0009', 'Sudaryono', 'Jl. Apotik Hidup Rt. 08/ Rw. 02', '081225537970', 'Sudaryono', '123'),
('PLG0010', 'Suraya', 'Jl. Tulungrejo No.8, Babadan, Dimong, Kec. Madiun, Kabupaten Madiun, Jawa Timur 63151', '081335211007', 'Suraya', 'suraya'),
('PLG0011', 'Ferdian Fugestanto', 'Jl. Ds. Dimong, RT.5/RW.01, Dimong, Kec. Madiun, Kabupaten Madiun, Jawa Timur', '081675531889', 'Ferdian', 'ferdian'),
('PLG0012', 'Susari', 'Jl. Maleo No.6, Nambangan Kidul, Kec. Manguharjo, Kota Madiun, Jawa Timur 63128', '087825562145', 'Susari', 'susari'),
('PLG0013', 'Budiyah', 'Desa Sumberejo dk.Bendungan RT:13 RW:02, Bendungan, Sumberejo, Kec. Madiun, Kabupaten Madiun, Jawa Timur', '081736266456', 'Budiyah', 'budiyah'),
('PLG0014', 'Sunaryo', 'Jl kutilang Bendungan, Sumberejo, Kec. Madiun, Kabupaten Madiun, Jawa Timur', '081135543778', 'Sunaryo', 'sunaryo'),
('PLG0015', 'Sudarso', 'Jl. Kutilan no.13, Bendungan, Sumberejo, Kec. Madiun, Kabupaten Madiun, Jawa Timur', '081166435627', 'Sudarso', 'sudarso'),
('PLG0016', 'Jehan', 'Jl. Durian No.53, Tanjungrejo I, Tanjungrejo, Kec. Madiun, Kabupaten Madiun', '082160526123', 'jehan', 'jehan'),
('PLG0017', 'Heri Wibowo', 'l. A.Yani No 20, Tulungrejo, Kec. Madiun, Kabupaten Madiun', '085163959787', 'heri', 'heri'),
('PLG0018', 'Agus Tri', 'Jl. Dusun Cabean  No.21, Kec. Sawahan, Kabupaten Madiun', '085046734747', 'tri', 'tri'),
('PLG0019', 'Hanafi', 'Jl. Raya Wonoasri No.50, Jatirejo II, Jatirejo, Kec. Wonoasri, Kabupaten Madiun', '089878633029', 'hanafi', 'hanafi'),
('PLG0020', 'Muhammad Kusdiantoro', 'Jl. Maeso Wulung No.26a, Tiron, Kec. Madiun, Kabupaten Madiun', '089737615619', 'kusdiantoro', 'kusdiantoro'),
('PLG0021', 'Agus Fandria', 'Jl. Dusun Dempelan, RT.18/RW.03, Dempelan, Kec. Madiun, Kabupaten Madiun', '087024648927', 'fandria', 'fandria'),
('PLG0022', 'Siti Astuti', 'Jl. Nusa Indah No.31 , Dempelan, Kec. Madiun, Kabupaten Madiun', '089215814817', 'siti', 'siti'),
('PLG0023', 'Nur Azizah', 'Jl. Dusun Nglambangan, RT.01/RW.01, Nglambangan, Kec. Wungu, Kabupaten Madiun', '089180961251', 'nur', 'nur'),
('PLG0024', 'Siti Farihah', 'Jl. Dusun, RT.15/RW.03, Tempuran, Tempursari, Kec. Wungu, Kabupaten Madiun', '081283674484', 'sitif', 'sitif'),
('PLG0025', 'Edy Suwarno', 'Jl. Ki Ageng Bagus Suratman No.12, Pojokjakas, Wayut, Kec. Jiwan, Kabupaten Madiun', '085728561497', 'edy', 'edy'),
('PLG0026', 'Dodi Suhartono', 'Jl. Gatot Kaca No.7, Nglames, Kec. Madiun, Kabupaten Madiun', '085978630054', 'dodi', 'dodi'),
('PLG0027', 'Bambang Rahardja Burhan', 'Jl. Kasatrian No.69, Tawangrejo, Kec. Kartoharjo, Kota Madiun', '088124201207', 'bambang', 'bambang'),
('PLG0028', 'Aris Agung Budiman', 'Jl. Puskesmas, Patang, Banjarsari, Kec. Madiun, Kabupaten Madiun', '087901334012', 'aris', 'aris'),
('PLG0029', 'Bimo Surono', 'Jl. Sri Waluyo no.43, Kapasan, Banjarsari, Kec. Madiun, Kabupaten Madiun', '087987178645', 'bimo', 'bimo'),
('PLG0030', 'Ria Indriana', 'Jl. Dusun Keppel No.33 RT.06/RW.01, Kepel, Banjarsari, Kec. Madiun, Kabupaten Madiun', '081280708261', 'ria', 'ria'),
('PLG0031', 'Alfari Narindra', 'Jl. bugangin No.11, RT.13/RW.03, Banjarsari, Kec. Madiun, Kabupaten Madiun', '081743352374', 'alfari', 'alfari'),
('PLG0032', 'Amalia Aristiningsih', 'Jalan Kutilan No.14 RT.11/RW.02 Bendungan, Bendungan, Sumberejo, Kec. Madiun, Kabupaten Madiun', '085426592639', 'amalia', 'amalia'),
('PLG0033', 'Novita Nurlatif', 'jl.sendang gati no.3 rt13 rw2, Butuh, Sendangrejo, Kec. Madiun, Kabupaten Madiun', '087043352374', 'novita', 'novita'),
('PLG0034', 'Widya Putri', 'Jl. Desa Sendangrejo No.12 RT.12/RW.02 Butuh, Butuh, Sendangrejo, Kec. Madiun, Kabupaten Madiun', '088619063199', 'widya', 'widya'),
('PLG0035', 'Putri Rahmawati', 'Jl. Belimbing No.27, Betek, Kec. Madiun, Kabupaten Madiun', '089430508098', 'putri', 'putri'),
('PLG0036', 'Kurniawan', 'Jl. Dusun Nglambangan No.1 , RT.01/RW.01, Nglambangan, Kec. Wungu, Kabupaten Madiun', '089239204445', 'kurniawan', 'kurniawan'),
('PLG0037', 'Indawan Saputra', 'jl.Tedjo kusumo No.15 No.Rt 15/05, Tegalanyar, Sirapan, Kec. Madiun, Kabupaten Madiun', '081548301685', 'indawan', 'indrawan'),
('PLG0038', 'Rahmawaty', 'Jl. Lombok No.12, Ngampel, Sumberejo, Kec. Madiun, Kabupaten Madiun', '085119405360', 'rahma', 'rahma'),
('PLG0039', 'Shinta Deviyanti', 'Jalan Seruni No.21 RT.02/RW.01, Setro, Dempelan, Kec. Madiun, Kabupaten Madiun', '089370654952', 'shintia', 'shintia'),
('PLG0040', 'Yolanda Wijaya', 'Jl. Raya Krokeh RT.03/RW.01, Krokeh, Sawahan, Kabupaten Madiun', '081903178817', 'yolanda', 'yolanda'),
('PLG0041', 'Irfan Vadila', 'Jl. Raya Nglames No.21, Nglames, Kec. Madiun, Kabupaten Madiun', '087783308097', 'irfan', 'irfan'),
('PLG0042', 'Renaldo Pratama', 'Jl. Abiyoso No.2, RT.11/RW.04, Nglames, Kec. Madiun, Kabupaten Madiun', '085644647058', 'renaldo', 'renaldi'),
('PLG0043', 'Wijaya Nata', 'Jl. Lombok No.9, Ngampel, Sumberejo, Kec. Madiun, Kabupaten Madiun', '089735609884', 'nata', 'nata'),
('PLG0044', 'Hilmi Prayogo', 'Jl. Gajah Sorengpati No. 19 RT.09/RW.04, Kuwek, Tiron, Kec. Madiun, Kabupaten Madiun', '085226320853', 'hilmi', 'hilmi'),
('PLG0045', 'yoga bagus', 'jl. apotik hidup no.23', '085784442013', 'yogabagus', 'bagus');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pembayaran`
--

CREATE TABLE `tb_pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `id_transaksi` varchar(15) NOT NULL,
  `bank` int(5) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `bukti` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pesan`
--

CREATE TABLE `tb_pesan` (
  `id_pesan` int(11) NOT NULL,
  `dari` varchar(15) NOT NULL,
  `untuk` varchar(15) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `pesan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_produk`
--

CREATE TABLE `tb_produk` (
  `id_produk` varchar(15) NOT NULL,
  `nama_produk` varchar(50) NOT NULL,
  `kategori` int(11) NOT NULL,
  `berat` double NOT NULL,
  `harga` double NOT NULL,
  `stok` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `foto` varchar(100) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_produk`
--

INSERT INTO `tb_produk` (`id_produk`, `nama_produk`, `kategori`, `berat`, `harga`, `stok`, `keterangan`, `foto`, `tanggal`) VALUES
('PR1708220001', 'Lemari Pakaian', 3, 10000, 6000000, 2, 'Ukuran  : 160x55x220\r\nBahan    : Jati\r\nWarna   : Natural/emas\r\nharga     : 6.000.000', 'item-220817-74bb0c9515.jpg', '2022-04-17'),
('PR1708220002', 'Lemari Pakaian', 3, 8500, 4000000, 1, 'Ukuran  : 110x55x200\r\nBahan    : Jati\r\nWarna   : Natural\r\nharga     : 4.000.000', 'item-220817-c497bbfc7d.jpg', '2022-04-17'),
('PR1708220003', 'Lemari Pakaian', 3, 9000, 4000000, 2, 'Ukuran  : 110x55x200\r\nBahan    : Jati\r\nWarna   : Natural\r\nharga     : 4.000.000', 'item-220817-35d249d3e7.jpg', '2022-04-17'),
('PR1708220004', 'Lemari Pakaian', 3, 12000, 6500000, 2, 'Ukuran  : 160x55x220\r\nBahan    : Jati\r\nWarna   : Natural/kombinasi\r\nharga     : 6.500.000', 'item-220817-4e5272158a.jpg', '2022-04-17'),
('PR1708220005', 'Lemari Hias', 3, 25000, 7000000, 0, 'Ukuran  : 200x60x220\r\nBahan    : Jati\r\nWarna   : Natural\r\nharga     : 7.000.000', 'item-220817-54559b764a.jpg', '2022-04-17'),
('PR1708220006', 'Lemari Hias', 3, 20000, 5000000, 1, 'Ukuran  : 150x55x220\r\nBahan    : Jati\r\nWarna   : Natural\r\nharga     : 5.000.000', 'item-220817-faccd7e6ae.jpg', '2022-04-17'),
('PR1708220007', 'Lemari Hias', 3, 19000, 6000000, 2, 'Ukuran  : 170x60x220\r\nBahan    : Jati\r\nWarna   : Natural/emas\r\nharga     : 6.000.000', 'item-220817-1280dc75de.jpg', '2022-04-17'),
('PR1708220008', 'Kursi set', 2, 14000, 3200000, 2, 'Ukuran  : 200 x 215 cm\r\nBahan    : Jati\r\nWarna   : Natural\r\nharga     : Rp 3.200.000', 'item-220817-daec63ade0.jpg', '2022-04-17'),
('PR1708220009', 'Kursi set', 2, 14000, 3300000, 2, 'Ukuran  : 200 x 215 cm\r\nBahan    : Jati\r\nWarna   : Natural\r\nharga     : Rp 3.300.000', 'item-220817-21716b7b97.jpg', '2022-04-17'),
('PR1708220010', 'Kursi Meja', 2, 15000, 3300000, 2, 'Ukuran  : 200 x 215 cm\r\nBahan    : Jati\r\nWarna   : Natural/Emas\r\nharga     : Rp 3.300.000', 'item-220817-5df36a1cb6.jpg', '2022-04-17'),
('PR1708220011', 'Kursi Tamu', 2, 7000, 1000000, 3, 'Bahan    : Jati\r\nWarna   : Natural\r\nharga     : Rp 1.000.000', 'item-220817-cb008a440a.jpg', '2022-04-17'),
('PR1708220012', 'Lemari Pakaian', 3, 13500, 3500000, 1, 'Ukuran  : 160x55x220\r\nBahan    : Jati\r\nWarna   : Natural\r\nharga     : 3.500.000', 'item-220817-1eff7532cc.jpg', '2022-04-17'),
('PR1708220013', 'Lemari Pakaian', 3, 10000, 2500000, 3, 'Ukuran  : 110x55x200\r\nBahan    : Jati\r\nWarna   : Natural\r\nharga     : 2.500.000', 'item-220817-97f1e02750.jpg', '2022-04-17'),
('PR1708220014', 'Meja Belajar', 1, 5000, 600000, 1, 'Ukuran  : 160x80x80\r\nBahan    : Jati\r\nWarna   : Natural\r\nharga     : 600000', 'item-220817-fa1c3d4a5b.jpg', '2022-04-17'),
('PR2308220001', 'Meja Makan Set', 1, 500, 650000, 3, 'Ukuran Meja 60x120x75\r\nUkuran Bangku 30x30x45\r\nBahan : Jati ', 'item-220823-3223cea785.jpg', '2022-08-23'),
('PR2308220002', 'Bangku Kayu', 2, 500, 120000, 10, 'Bahan :  kayu jatibelanda\r\nUkuran : 30x30x45', 'item-220823-58031e808d.jpg', '2022-08-23'),
('PR2308220003', 'Meja Bar', 1, 500, 350000, 3, 'Bahan : kayu jati belanda\r\nUkuran : 120x40x100', 'item-220823-84f454ff0e.jpg', '2022-08-23'),
('PR2308220004', 'Meja Kantor', 1, 500, 850000, 3, 'Bahan : kayu jatibelanda\r\nUkuran : 60x120x75', 'item-220823-79be81f691.jpg', '2022-08-23'),
('PR2308220005', 'Meja Set ', 1, 1000, 600000, 3, '1meja 2kursi panjang\r\nBahan kayu jati belanda\r\nUkuran meja 120x60x75\r\nUkuran kursi 120x30x45', 'item-220823-05a5377470.jpg', '2022-08-23'),
('PR2308220006', 'Bangku Bulat', 2, 800, 200000, 10, 'bahan kayu jati belanda\r\nUkuran 30x75', 'item-220823-ca8f1816bf.jpg', '2022-08-23'),
('PR2308220007', 'Meja Belajar Kayu', 1, 2500, 400000, 6, 'bahan jati belanda\r\nukuran 60x120x45', 'item-220823-b4f172c3af.jpg', '2022-08-23'),
('PR2308220008', 'Kursi Kayu', 2, 500, 200000, 3, 'bahan kayu jatibelanda\r\nukuran 45x45x100', 'item-220823-5016e4e926.jpg', '2022-08-23'),
('PR2308220009', 'Lemari Kayu 3 Pintu', 3, 7000, 5500000, 3, 'bahan kayu jatibelanda\r\nwarna duco putih\r\nukuran. 60x160x200\r\n', 'item-220823-10306655bb.jpg', '2022-08-23'),
('PR2308220010', 'Meja Kayu jatibelanda', 1, 5000, 2350000, 2, 'bahankayu jati belanda\r\nukuran 100x50x80', 'item-220823-e099a65012.jpg', '2022-08-23'),
('PR2308220011', 'Bangku Bulat', 2, 500, 200000, 7, 'bahan kayu jati belanda\r\nwarna pernis natural+cat duco hitam\r\nukuran 30x75', 'item-220823-8ce581830e.jpg', '2022-08-23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id_transaksi` varchar(15) NOT NULL,
  `tanggal` date NOT NULL,
  `id_pelanggan` varchar(15) NOT NULL,
  `nama_penerima` varchar(50) NOT NULL,
  `total_berat` double NOT NULL,
  `total_harga` double NOT NULL,
  `provinsi` varchar(30) NOT NULL,
  `kodepos` varchar(20) NOT NULL,
  `ekspedisi` varchar(20) NOT NULL,
  `ongkir` double NOT NULL,
  `estimasi` varchar(30) NOT NULL,
  `detail_alamat` varchar(100) NOT NULL,
  `total_bayar` double NOT NULL,
  `status` varchar(30) NOT NULL,
  `kode_unik` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`id_transaksi`, `tanggal`, `id_pelanggan`, `nama_penerima`, `total_berat`, `total_harga`, `provinsi`, `kodepos`, `ekspedisi`, `ongkir`, `estimasi`, `detail_alamat`, `total_bayar`, `status`, `kode_unik`) VALUES
('TR170422001', '2022-04-20', 'PLG0003', 'Windu Ramadhani', 28000, 6400000, 'Jawa Timur\r\n                ', '63122\r\n            ', 'jne', 196000, '1-2', 'Jl. Pulanggeni rt.16/rw.06 Kel. Josenan Kec. Taman Kota Madiun', 6596273, 'Selesai', 273),
('TR170422002', '2022-04-20', 'PLG0004', 'Sri Hartati', 12000, 6500000, 'Jawa Timur\r\n                ', '63122\r\n            ', 'jne', 84000, '1-2', 'JL. Apotik Hidup No.23 Ngegong ', 6584646, 'Selesai', 646),
('TR170422003', '2022-04-22', 'PLG0005', 'Saka N', 25000, 7000000, 'Jawa Timur\r\n                ', '63153\r\n            ', 'tiki', 175000, '1', 'Jl. Suwondo Rt. 08/ rw. 02 Ds. Kaibon Kec. Taman Kab. Madiun\r\n', 7175239, 'Selesai', 239),
('TR170422004', '2022-04-22', 'PLG0006', 'Agus Budhie', 8500, 4000000, 'Jawa Timur\r\n                ', '63122\r\n            ', 'jne', 63000, '1-2', 'Jl. Banda No.20', 4063689, 'Selesai', 689),
('TR170422005', '2022-04-22', 'PLG0007', 'Tindi Aprisyiano', 25000, 7000000, 'Jawa Timur\r\n                ', '63153\r\n            ', 'jne', 175000, '1-2', 'Jl.Mojopahit no.37', 7175111, 'Selesai', 111),
('TR170422006', '2022-04-22', 'PLG0007', 'Tindi Aprisyiano', 20000, 5000000, 'Jawa Timur\r\n                ', '63122\r\n            ', 'jne', 140000, '1-2', 'Jl. Mojopahit No.37', 5140534, 'Selesai', 534),
('TR170522007', '2022-05-16', 'PLG0008', 'Kartini', 13500, 3500000, 'Jawa Timur\r\n                ', '63153\r\n            ', 'jne', 98000, '1-2', 'Jl.GorangGareng', 3598639, 'Selesai', 639),
('TR180522008', '2022-05-18', 'PLG0009', 'Sudaryono', 7000, 1000000, 'Jawa Timur\r\n                ', '63122\r\n            ', 'pos', 38500, '7-14 HARI', 'Jl. Apotik Hidup No.30 Rt.07 Rw.02 Ngegong', 1039431, 'Selesai', 931),
('TR220522009', '2022-05-19', 'PLG0010', 'Suraya', 8500, 4000000, 'Jawa Timur\r\n                ', '63153\r\n            ', 'tiki', 45000, '4', 'Jl. Tulungrejo No.8, Babadan, Dimong, Kec. Madiun, Kabupaten Madiun, Jawa Timur 63151', 4045101, 'Selesai', 101),
('TR220522010', '2022-05-20', 'PLG0011', 'Ferdian Sugestanto', 14000, 3300000, 'Jawa Timur\r\n                ', '63153\r\n            ', 'tiki', 70000, '4', 'Jl. Ds. Dimong, RT.5/RW.01, Dimong, Kec. Madiun, Kabupaten Madiun, Jawa Timur 63151', 3370180, 'Selesai', 180),
('TR220522011', '2022-05-21', 'PLG0012', 'Susari', 10000, 1200000, 'Jawa Timur\r\n                ', '63122\r\n            ', 'tiki', 50000, '4', 'Jl. Maleo No.6, Nambangan Kidul, Kec. Manguharjo, Kota Madiun, Jawa Timur 63128', 1250406, 'Selesai', 406),
('TR220522012', '2022-05-21', 'PLG0013', 'Budiyah', 9000, 4000000, 'Jawa Timur\r\n                ', '63153\r\n            ', 'tiki', 45000, '4', 'Desa Sumberejo dk.Bendungan RT.13 RW.02, Bendungan, Sumberejo, Kec. Madiun, Kabupaten Madiun, Jawa T', 4045747, 'Selesai', 747),
('TR220522013', '2022-05-24', 'PLG0014', 'Sunaryo', 15000, 1800000, 'Jawa Timur\r\n                ', '63153\r\n            ', 'tiki', 75000, '4', 'Jl kutilang no. 7 Bendungan, Sumberejo, Kec. Madiun, Kabupaten Madiun, Jawa Timur', 1875704, 'Selesai', 704),
('TR220522014', '2022-05-24', 'PLG0015', 'Angkringan sudarso', 10000, 1200000, 'Jawa Timur\r\n                ', '63153\r\n            ', 'tiki', 50000, '4', 'Jl. Kutilan no.13, Bendungan, Sumberejo, Kec. Madiun, Kabupaten Madiun, Jawa Timur', 1250235, 'Selesai', 235),
('TR230522001', '2022-05-25', 'PLG0016', 'jehan', 12000, 6500000, 'Jawa Timur\r\n                ', '63153\r\n            ', 'tiki', 60000, '4', 'Jl. Durian No.53, Tanjungrejo I, Tanjungrejo, Kec. Madiun, Kabupaten Madiun', 6560089, 'Selesai', 89),
('TR230522002', '2022-06-04', 'PLG0018', 'Agus Tri', 1000, 1300000, 'Jawa Timur\r\n                ', '63153\r\n            ', 'pos', 10000, '1 HARI', 'Jl. Dusun Cabean  No.21, Kec. Sawahan, Kabupaten Madiun', 1310003, 'Selesai', 3),
('TR230522003', '2022-06-06', 'PLG0019', 'Hanafi', 5000, 2350000, 'Jawa Timur\r\n                ', '63153\r\n            ', 'tiki', 30000, '3', 'Jl. Raya Wonoasri No.50, Jatirejo II, Jatirejo, Kec. Wonoasri, Kabupaten Madiun', 2380701, 'Selesai', 701),
('TR230522004', '2022-05-28', 'PLG0017', 'Heri Wobowo', 4000, 2400000, 'Jawa Timur\r\n                ', '63153\r\n            ', 'tiki', 20000, '4', 'Jl. A.Yani No.20, Tulungrejo, Kec. Madiun, Kabupaten Madiun', 2420451, 'Selesai', 451),
('TR230622004', '2022-06-06', 'PLG0020', 'Muhammad Kusdiantoro', 7000, 5500000, 'Jawa Timur\r\n                ', '63153\r\n            ', 'tiki', 35000, '4', 'Jl. Maeso Wulung No.26a, Tiron, Kec. Madiun, Kabupaten Madiun', 5535612, 'Selesai', 612),
('TR230622005', '2022-06-07', 'PLG0021', 'Agus Fandria', 7000, 5500000, 'Jawa Timur\r\n                ', '63153\r\n            ', 'tiki', 35000, '4', 'Jl. Dusun Dempelan, RT.18/RW.03, Dempelan, Kec. Madiun, Kabupaten Madiun', 5535282, 'Selesai', 282),
('TR230622006', '2022-06-09', 'PLG0022', 'Siti Astuti', 14000, 3200000, 'Jawa Timur\r\n                ', '63153\r\n            ', 'tiki', 70000, '4', 'Jl. Nusa Indah No.31 , Dempelan, Kec. Madiun, Kabupaten Madiun', 3270835, 'Selesai', 835),
('TR230622007', '2022-06-11', 'PLG0023', 'Nur Azizah', 2000, 800000, 'Jawa Timur\r\n                ', '63153\r\n            ', 'pos', 24000, '0 HARI', 'Jl. Dusun Nglambangan, RT.01/RW.01, Nglambangan, Kec. Wungu, Kabupaten Madiun', 824737, 'Selesai', 737),
('TR230622008', '2022-06-15', 'PLG0024', 'Siti Farihah', 7000, 1000000, 'Jawa Timur\r\n                ', '63153\r\n            ', 'tiki', 35000, '4', 'Jl. Dusun, RT.15/RW.03, Tempuran, Tempursari, Kec. Wungu, Kabupaten Madiun', 1035689, 'Selesai', 689),
('TR230622009', '2022-06-16', 'PLG0025', 'Edy Suwarno', 2500, 830000, 'Jawa Timur\r\n                ', '63153\r\n            ', 'pos', 30000, '1 HARI', 'Jl. Ki Ageng Bagus Suratman No.12, Pojokjakas, Wayut, Kec. Jiwan, Kabupaten Madiun', 860971, 'Selesai', 971),
('TR230622010', '2022-06-18', 'PLG0026', 'Dodi Suhartono', 1000, 400000, 'Jawa Timur\r\n                ', '63153\r\n            ', 'jne', 7000, '1-2', 'Jl. Gatot Kaca No.7, Nglames, Kec. Madiun, Kabupaten Madiun', 407397, 'Selesai', 397),
('TR230622011', '2022-06-20', 'PLG0027', 'Bambang Rahardja Burhan', 9000, 4000000, 'Jawa Timur\r\n                ', '63122\r\n            ', 'tiki', 45000, '4', 'Jl. Kasatrian No.69, Tawangrejo, Kec. Kartoharjo, Kota Madiun', 4045160, 'Selesai', 160),
('TR230622012', '2022-06-22', 'PLG0028', 'Aris Agung Budiman', 2000, 1200000, 'Jawa Timur\r\n                ', '63153\r\n            ', 'tiki', 14000, '1', 'Jl. Puskesmas No.35, Patang, Banjarsari, Kec. Madiun, Kabupaten Madiun', 1214044, 'Selesai', 44),
('TR230622013', '2022-06-25', 'PLG0029', 'Bimo Surono', 5000, 2350000, 'Jawa Timur\r\n                ', '63153\r\n            ', 'tiki', 25000, '4', 'Jl. Sri Waluyo no.43, Kapasan, Banjarsari, Kec. Madiun, Kabupaten Madiun', 2375312, 'Selesai', 312),
('TR230622014', '2022-06-26', 'PLG0030', 'Ria Indriana', 1500, 600000, 'Jawa Timur\r\n                ', '63153\r\n            ', 'tiki', 10000, '4', 'Jl. Dusun Keppel No.33 RT.06/RW.01, Kepel, Banjarsari, Kec. Madiun, Kabupaten Madiun', 610852, 'Selesai', 852),
('TR230622015', '2022-06-29', 'PLG0031', 'Alfari Narindra', 8500, 4000000, 'Jawa Timur\r\n                ', '63153\r\n            ', 'pos', 10000, '1', 'Jl. bugangin No.11, RT.13/RW.03, Banjarsari, Kec. Madiun, Kabupaten Madiun', 4010333, 'Dibatalkan', 333),
('TR230622016', '2022-06-30', 'PLG0031', 'Alfari Narindra', 8500, 4000000, 'Jawa Timur\r\n                ', '63153\r\n            ', 'tiki', 45000, '4', 'Jl. bugangin no.11 RT.13/RW.03, Banjarsari, Kec. Madiun, Kabupaten Madiun', 4045111, 'Selesai', 111),
('TR230722001', '2022-07-02', 'PLG0033', 'Novita Nurlatif', 15000, 3300000, 'Jawa Timur\r\n                ', '63153\r\n            ', 'tiki', 75000, '4', 'jl.sendang gati no.3 rt13 rw2, Butuh, Sendangrejo, Kec. Madiun, Kabupaten Madiun', 3375443, 'Selesai', 443),
('TR230722002', '2022-07-02', 'PLG0034', 'Widya Putri', 1000, 600000, 'Jawa Timur\r\n                ', '63153\r\n            ', 'pos', 10000, '1 HARI', 'Jl. Desa Sendangrejo No.12 RT.12/RW.02 Butuh, Butuh, Sendangrejo, Kec. Madiun, Kabupaten Madiun', 610691, 'Selesai', 691),
('TR230722003', '2022-07-03', 'PLG0035', 'Putri Rahmawati', 9000, 4000000, 'Jawa Timur\r\n                ', '63153\r\n            ', 'tiki', 45000, '4', 'Jl. Belimbing No.27, Betek, Kec. Madiun, Kabupaten Madiun', 4045570, 'Selesai', 570),
('TR230722004', '2022-07-07', 'PLG0036', 'Kurniawan', 1500, 600000, 'Jawa Timur\r\n                ', '63153\r\n            ', 'tiki', 10000, '4', 'Jl. Dusun Nglambangan No.1 RT.01/RW.01, Nglambangan, Kec. Wungu, Kabupaten Madiun', 610945, 'Selesai', 945),
('TR230722005', '2022-07-10', 'PLG0037', 'Indawan Saputra', 8500, 4000000, 'Jawa Timur\r\n                ', '63153\r\n            ', 'tiki', 45000, '4', 'jl.Tedjo kusumo No.15 No.Rt 15/05, Tegalanyar, Sirapan, Kec. Madiun, Kabupaten Madiun', 4045990, 'Selesai', 990),
('TR230722006', '2022-07-11', 'PLG0038', 'Rahmawaty', 13500, 3500000, 'Jawa Timur\r\n                ', '63153\r\n            ', 'tiki', 70000, '4', 'Jl. Lombok No.12, Ngampel, Sumberejo, Kec. Madiun, Kabupaten Madiun', 3570428, 'Selesai', 428),
('TR230722007', '2022-07-14', 'PLG0039', 'Shinta Deviyanti', 500, 850000, 'Jawa Timur\r\n                ', '63153\r\n            ', 'pos', 10000, '1 HARI', 'Jalan Seruni No.21 RT.02/RW.01, Setro, Dempelan, Kec. Madiun, Kabupaten Madiun', 860497, 'Selesai', 497),
('TR230722008', '2022-07-16', 'PLG0040', 'Yolanda Wijaya', 2500, 400000, 'Jawa Timur\r\n                ', '63153\r\n            ', 'pos', 16500, '7-14 HARI', 'Jl. Raya Krokeh RT.03/RW.01, Krokeh, Sawahan, Kabupaten Madiun', 416947, 'Selesai', 447),
('TR230722009', '2022-07-17', 'PLG0041', 'Irfan', 1500, 360000, 'Jawa Timur\r\n                ', '63153\r\n            ', 'tiki', 12000, '3', 'Jl. Raya Nglames No.21, Nglames, Kec. Madiun, Kabupaten Madiun', 372453, 'Selesai', 453),
('TR230722010', '2022-07-20', 'PLG0042', 'Renaldo Pratama', 5000, 2350000, 'Jawa Timur\r\n                ', '63153\r\n            ', 'tiki', 35000, '1', 'Jl. Abiyoso No.2, RT.11/RW.04, Nglames, Kec. Madiun, Kabupaten Madiun', 2385879, 'Selesai', 879),
('TR230722011', '2022-07-23', 'PLG0043', 'Wijaya Nata', 2000, 480000, 'Jawa Timur\r\n                ', '63153\r\n            ', 'tiki', 14000, '1', 'Jl. Lombok No.9, Ngampel, Sumberejo, Kec. Madiun, Kabupaten Madiun', 494620, 'Selesai', 620),
('TR230722012', '2022-07-25', 'PLG0019', 'Hanafi', 500, 350000, 'Jawa Timur\r\n                ', '63153\r\n            ', 'pos', 12000, '0 HARI', 'Jl. Dusun Cabean  No.21, Kec. Sawahan, Kabupaten Madiun', 362736, 'Selesai', 736),
('TR230722017', '2022-07-30', 'PLG0032', 'Amalia Aristiningsih', 10000, 6000000, 'Jawa Timur\r\n                ', '63153\r\n            ', 'tiki', 50000, '4', 'Jalan Kutilan No.14 RT.11/RW.02 Bendungan, Bendungan, Sumberejo, Kec. Madiun, Kabupaten Madiun', 6050724, 'Selesai', 724),
('TR230822001', '2022-08-06', 'PLG0044', 'Hilmi Prayogo', 25000, 7000000, 'Jawa Timur\r\n                ', '63153\r\n            ', 'tiki', 125000, '4', 'Jl. Gajah Sorengpati No. 19 RT.09/RW.04, Kuwek, Tiron, Kec. Madiun, Kabupaten Madiun', 7125409, 'Menunggu Pembayaran', 409);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `tb_bank`
--
ALTER TABLE `tb_bank`
  ADD PRIMARY KEY (`id_bank`);

--
-- Indeks untuk tabel `tb_detail_transaksi`
--
ALTER TABLE `tb_detail_transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_detail_produk` (`id_produk`),
  ADD KEY `fk_detail_transaksi` (`id_transaksi`);

--
-- Indeks untuk tabel `tb_informasi`
--
ALTER TABLE `tb_informasi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `tb_keranjang`
--
ALTER TABLE `tb_keranjang`
  ADD PRIMARY KEY (`id_keranjang`),
  ADD KEY `fk_keranjang_pelanggan` (`id_pelanggan`),
  ADD KEY `fk_keranjang_produk` (`id_produk`);

--
-- Indeks untuk tabel `tb_pelanggan`
--
ALTER TABLE `tb_pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indeks untuk tabel `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD UNIQUE KEY `id_pembayaran` (`id_pembayaran`),
  ADD KEY `fk_pembayaran_transaksi` (`id_transaksi`),
  ADD KEY `fk_bank` (`bank`);

--
-- Indeks untuk tabel `tb_pesan`
--
ALTER TABLE `tb_pesan`
  ADD PRIMARY KEY (`id_pesan`);

--
-- Indeks untuk tabel `tb_produk`
--
ALTER TABLE `tb_produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD KEY `fk_produk_kategori` (`kategori`);

--
-- Indeks untuk tabel `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `fk_transaksi_pelanggan` (`id_pelanggan`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_bank`
--
ALTER TABLE `tb_bank`
  MODIFY `id_bank` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_detail_transaksi`
--
ALTER TABLE `tb_detail_transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT untuk tabel `tb_informasi`
--
ALTER TABLE `tb_informasi`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `tb_keranjang`
--
ALTER TABLE `tb_keranjang`
  MODIFY `id_keranjang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT untuk tabel `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_pesan`
--
ALTER TABLE `tb_pesan`
  MODIFY `id_pesan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_detail_transaksi`
--
ALTER TABLE `tb_detail_transaksi`
  ADD CONSTRAINT `fk_detail_produk` FOREIGN KEY (`id_produk`) REFERENCES `tb_produk` (`id_produk`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_detail_transaksi` FOREIGN KEY (`id_transaksi`) REFERENCES `tb_transaksi` (`id_transaksi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_keranjang`
--
ALTER TABLE `tb_keranjang`
  ADD CONSTRAINT `fk_keranjang_pelanggan` FOREIGN KEY (`id_pelanggan`) REFERENCES `tb_pelanggan` (`id_pelanggan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_keranjang_produk` FOREIGN KEY (`id_produk`) REFERENCES `tb_produk` (`id_produk`);

--
-- Ketidakleluasaan untuk tabel `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  ADD CONSTRAINT `fk_bank` FOREIGN KEY (`bank`) REFERENCES `tb_bank` (`id_bank`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_pembayaran_transaksi` FOREIGN KEY (`id_transaksi`) REFERENCES `tb_transaksi` (`id_transaksi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_produk`
--
ALTER TABLE `tb_produk`
  ADD CONSTRAINT `fk_produk_kategori` FOREIGN KEY (`kategori`) REFERENCES `tb_kategori` (`id_kategori`);

--
-- Ketidakleluasaan untuk tabel `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD CONSTRAINT `fk_transaksi_pelanggan` FOREIGN KEY (`id_pelanggan`) REFERENCES `tb_pelanggan` (`id_pelanggan`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
