-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 09, 2022 at 08:08 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_kel5`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama_admin` varchar(200) NOT NULL,
  `email_admin` varchar(200) NOT NULL,
  `password_admin` varchar(200) NOT NULL,
  `alamat_admin` varchar(400) NOT NULL,
  `jenis_kelamin_admin` varchar(100) NOT NULL,
  `foto_admin` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `email_admin`, `password_admin`, `alamat_admin`, `jenis_kelamin_admin`, `foto_admin`) VALUES
(5, '12', '3232', '434', '5464', 'Perempuan', 'Er5gs20220529100119pengembalian.png');

-- --------------------------------------------------------

--
-- Table structure for table `gambar_produk`
--

CREATE TABLE `gambar_produk` (
  `id_gambar_produk` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `gambar_produk` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gambar_produk`
--

INSERT INTO `gambar_produk` (`id_gambar_produk`, `id_produk`, `gambar_produk`) VALUES
(12, 2, 'Men\'s_Short_Sleeve_Shirt_Abu_tua.jpg'),
(13, 2, 'Men\'s_Short_Sleeve_Shirt_Abu.jpg'),
(14, 2, 'Men\'s_Short_Sleeve_Shirt_Hijau.jpg'),
(15, 2, 'Men\'s_Short_Sleeve_Shirt_Tosca.jpg'),
(16, 3, 'Rayon_Casual_Shirt_floral.jpg'),
(17, 3, 'Rayon_Casual_Shirt_Geometric.jpg'),
(18, 3, 'Rayon_Casual_Shirt_floral_white.jpg'),
(19, 3, 'Rayon_Casual_Shirt_Leaf.jpg'),
(20, 4, 'Kemeja_Strip_Biru.jpg'),
(21, 4, 'Kemeja_Strip_Putih.jpg'),
(22, 4, 'Kemeja_Strip_Abu-abu.jpg'),
(23, 4, 'Kemeja_Strip_Hijau.jpg'),
(24, 5, 'Dicky_work_Pants.jpg'),
(25, 5, 'Dicky_work_pants_Beige.jpg'),
(26, 5, 'Dicky_work_Pants_Abu-abu.jpg'),
(27, 5, 'Dicky_work_Pants_Navy.jpg'),
(28, 5, 'Dicky_work_Pants_Putih.jpg'),
(29, 7, 'Thobes_Jubba_Islamic_Putih.jpg'),
(30, 7, 'Thobes_Jubba_Islamic_Coksu.jpg'),
(31, 7, 'Thobes_Jubba_Islamic_Coklat.jpg'),
(32, 8, 'T_Shirt_Print_Putih.jpg'),
(33, 8, 'T_Shirt_Print_Black_Smile.jpg'),
(34, 8, 'T_Shirt_Print_Black_Fausto.jpg'),
(35, 8, 'T_Shirt_Print_Tengkorak.jpg'),
(36, 9, 'Long_sleeve_T_shirt_Kuning.jpg'),
(37, 8, 'Long_sleeve_T_shirt_Hijau.jpg'),
(38, 9, 'Long_sleeve_T_shirt_Putih.jpg'),
(39, 9, 'Long_sleeve_T_shirt_Navy.jpg'),
(40, 10, 'Hoodie_Set_Coksu.jpg'),
(41, 10, 'Hoodie_Set_Coklat.jpg'),
(42, 10, 'Hoodie_Set_Abu.jpg'),
(43, 11, 'Parka_Zara_Man_Biru.jpg'),
(44, 11, 'Parka_Zara_Man_Hijau.jpg'),
(45, 12, 'Sepatu_Converse.jpg'),
(46, 12, 'Sepatu_Converse_Putih.jpg'),
(47, 12, 'Sepatu_Converse_Abu.jpg'),
(48, 12, 'Sepatu_Converse_Maroon.jpg'),
(49, 13, 'Poncho_V_Neck_Navy.jpg'),
(50, 13, 'Poncho_V_Neck_Putih.jpg'),
(51, 13, 'Poncho_V_Neck_Biru.jpg'),
(52, 13, 'Poncho_V_Neck_Army.jpg'),
(53, 14, 'Tier_Basic_Dress_rayon_Biru.jpg'),
(54, 14, 'Tier_Basic_Dress_rayon_Pink.jpg'),
(55, 14, 'Tier_Basic_Dress_rayon_Putih.jpg'),
(56, 15, 'Zara_Trouser_Pants.jpg'),
(57, 15, 'Zara_Trouser_Pants_Cream.jpg'),
(58, 15, 'Zara_Trouser_Pants_Hazelnut.jpg'),
(59, 16, 'hoodie_polos_lengan_panjang.jpg'),
(60, 16, 'hoodie_polos_lengan_panjang_coklat.jpg'),
(61, 16, 'hoodie_polos_lengan_panjang_Cream.jpg'),
(62, 16, 'hoodie_polos_lengan_panjang_Biru.jpg'),
(63, 16, 'hoodie_polos_lengan_panjang_Hitam.jpg'),
(64, 17, 'Wide_Leg_Knit_Pants_Coksu.jpg'),
(65, 17, 'Wide_Leg_Knit_Pants_pink.jpg'),
(66, 17, 'Wide_Leg_Knit_Pants_Putih.jpg'),
(67, 18, 'Ribbon_Back_Cotton_Dress_Abu.jpg'),
(68, 18, 'Ribbon_Back_Cotton_Dress_hitam.jpg'),
(69, 19, 'Gamis_Basic_Muslim_Putih.jpg'),
(70, 19, 'Gamis_Basic_Muslim_Coklat.jpg'),
(71, 19, 'Gamis_Basic_Muslim_Abu.jpg'),
(72, 19, 'Gamis_Basic_Muslim_Hijau.jpg'),
(73, 19, 'Gamis_Basic_Muslim_Ovaltine.jpg'),
(74, 20, 'Baju_Bayi_Oversize_set_Unisex_Coksu.jpg'),
(75, 20, 'Baju_Bayi_Oversize_set_Unisex_Dustypink.jpg'),
(76, 20, 'Baju_Bayi_Oversize_set_Unisex_Mustard.jpg'),
(77, 21, 'Puff_Sleeves_Dress_Pink.jpg'),
(78, 21, 'Puff_Sleeves_Dress_Abu.jpg'),
(79, 21, 'Puff_Sleeves_Dress_Cream.jpg'),
(80, 22, 'Piyama_Anak_Musim_Semi_Autum_Renda_Pink.jpg'),
(81, 22, 'Piyama_Anak_Musim_Semi_Autum_Renda_Putih.jpg'),
(82, 22, 'Piyama_Anak_Musim_Semi_Autum_Renda_Biru.jpg'),
(83, 23, 'Gamis_Syar\'i_Romera_Kids_Hitam.jpg'),
(84, 23, 'Gamis_Syar\'i_Romera_Kids_Merah.jpg'),
(85, 24, 'Piyama_set_anak_hitam.jpg'),
(86, 24, 'Piyama_set_anak_Navy.jpg'),
(87, 24, 'Piyama_set_anak_putih.jpg'),
(88, 24, 'Piyama_set_anak_Biru.jpg'),
(89, 25, 'Baju_set_Anak_Burberry_Abu_bubble.jpg'),
(90, 25, 'Baju_set_Anak_Burberry_Putih_bubble.jpg'),
(91, 25, 'Baju_set_Anak_Burberry_Pink_Kotak.jpg'),
(92, 25, 'Baju_set_Anak_Burberry_Putih_kotak.jpg'),
(93, 26, 'Kids_Clothes_Kombinasi_biru.jpg'),
(94, 26, 'Kids_Clothes_motif_hitam.jpg'),
(95, 26, 'Kids_Clothes_Biru_polos.jpg'),
(96, 26, 'Kids_Clothes_biru_panjang.jpg'),
(97, 27, 'Cheap_Sandals_Anak-anak_Hijau2.jpg'),
(98, 27, 'Cheap_Sandals_Anak-anak_Hijau.jpg'),
(99, 27, 'Cheap_Sandals_Anak-anak_Pink2.jpg'),
(100, 27, 'Cheap_Sandals_Anak-anak_Pink.jpg'),
(101, 27, 'Cheap_Sandals_Anak-anak_Putih.jpg'),
(102, 28, 'Rubber_Shoes_Kids_Hitam.jpg'),
(103, 28, 'Rubber_Shoes_Kids_putih.jpg'),
(104, 28, 'Rubber_Shoes_Kids_Abu.jpg'),
(105, 29, 'Daisy Floral Print O neck Short Sleeve T shirt For Women P1799623Meteor White _ US 12.jfif'),
(106, 29, 'Moon Print Short Sleeve O neck Loose Casual T Shirt For Women P1800263, Black _ US 18.jfif'),
(107, 31, ' Women\'s Casual Shoes HOS1136 _ Touchy Style.png'),
(108, 30, 'High Waist Ripped Jeans.jfif'),
(109, 30, 'High Waist Slant Pocket Straight Leg Jeans.jfif'),
(110, 33, 'Music Note Printed Long Sleeve Women Hoodie 7060 - XXXXXL _ Gray.jfif'),
(111, 34, 'Vintage Windbreaker Jacket.jfif'),
(112, 35, 'Women Ultra Light Down Jacket Hooded Winter Duck Down Jackets Women Slim Long Sleeve Parka Zipper Coats 2017 Pockets Solid Color, Hot pink _ S.jfif'),
(113, 32, 'Womens Casual Cool Lace Up White Sneakers.png'),
(114, 37, 'c4f9b507-a132-4a8a-be34-e980c01fc8dc.jfif'),
(115, 38, 'adidas Campus AS _Cardinal Red_ - OG EUKicks Sneaker Magazine.jfif'),
(116, 37, 'Men\'s Fashion Jackets.png'),
(117, 40, 'Men\'s Fashion Jackets.png'),
(118, 41, 'Mens Next Slim Fit Jeans With Stretch - Blue.jfif'),
(119, 42, 'Mens Panel Patchwork Raglan Sleeve Loose Kangaroo Pocket Drawstring Hoodies.jfif'),
(120, 43, 'Spring Boys Girls Jackets Kids Boys Outerwear Waterproof Windproof Hoodies Jackets For Children\'s Polar Fleece Coat - red child jacket _ 12.jfif'),
(121, 43, 'Children Reversible Hooded Jacket_ Baby Jacket _ Toddler _ Etsy.png'),
(122, 44, 'Cotton Boys T-Shirt Kids Shirts Baby Boys Casual Short Sleeve Car Print T-shirt For Boy Summer Children Toddlder Tee Shirts Tops - Aa _ 4.jfif'),
(123, 45, 'Unicorn Baby Sweaters Cotton Rainbow Sweatshirts - AB-8055 _ 5T.jfif'),
(124, 46, 'Big Kids Zip Fleece Hoodie - Youth L (12) _ Tri Light Gray.jfif'),
(125, 47, 'Cartoon Print O neck Short Sleeve T shirt For Women P1799625.jfif'),
(126, 48, 'Gap.jfif'),
(127, 49, 'Kid\'s Cotton Straight Jeans - Blue, 5T.jfif'),
(128, 49, 'Skinny Pants Toddler Pants Girl Kids Pants for Boy Cotton 1-5Y.png');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `judul_kategori` varchar(300) NOT NULL,
  `gambar_kategori` varchar(300) NOT NULL,
  `deskripsi_kategori` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `judul_kategori`, `gambar_kategori`, `deskripsi_kategori`) VALUES
(5, 'Wanita', 'kategori_wanita.jpg', ' Style Fashion Glamor '),
(13, 'Pria', 'Kategori_Pria.jpg', 'styles gentleman'),
(14, 'Anak-anak', 'Kategori_Anak.jpg', 'Style fashion imut yang mewah');

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE `keranjang` (
  `id_keranjang` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `email_pelanggan` varchar(100) NOT NULL,
  `ukuran` varchar(100) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `keranjang`
--

INSERT INTO `keranjang` (`id_keranjang`, `id_produk`, `email_pelanggan`, `ukuran`, `jumlah`, `tanggal`) VALUES
(3, 5, '1', '1', 1, '0000-00-00 00:00:00'),
(4, 2, '21', '31', 41, '0000-00-00 00:00:00'),
(5, 5, '', '', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `nama_pelanggan` varchar(100) NOT NULL,
  `email_pelanggan` varchar(200) NOT NULL,
  `password_pelanggan` varchar(100) NOT NULL,
  `alamat_pelanggan` varchar(400) NOT NULL,
  `jenis_kelamin_pelanggan` varchar(100) NOT NULL,
  `foto_pelanggan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama_pelanggan`, `email_pelanggan`, `password_pelanggan`, `alamat_pelanggan`, `jenis_kelamin_pelanggan`, `foto_pelanggan`) VALUES
(1, 'ana khoerunnisa', 'anakhoerunnisa@member.maribelajar.org', 'A12345', 'rt 01/rw 04 Sekaran Kec. Gunung pati Semarang', 'Perempuan', 'pelanggan1.jpg'),
(4, 'Ahmad Figo A.', 'ahmad.19011@member.maribelajar.org', 'B12345', 'Rt 02/Rw 05 Desa pamutih kec. ulujami pemalang', 'Laki-laki', 'pelanggan2.jpg'),
(5, 'Andra Ramadan Pratama', '1911010125.1911010125@member.maribelajar.org', 'C12345', 'rt 03/rw 01 Desa Kalisapu kec. Slawi Tegal', 'Laki-laki', 'pelanggan3.jpg'),
(6, 'Anugrah Prima Ramdhan', 'anugrahprima34@member.maribelajar.org', 'D12345', 'rt 03/rw 05 Kalisongo, Kab. Malang Jawa Timur', 'Laki-laki', 'pelanggan4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id_pemesanan` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `alamat_pengiriman` varchar(400) NOT NULL,
  `jenis_pengiriman` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pemesanan`
--

INSERT INTO `pemesanan` (`id_pemesanan`, `id_pelanggan`, `alamat_pengiriman`, `jenis_pengiriman`, `status`, `tanggal`) VALUES
(2, 1, '51', '51', '51', '2022-05-31 05:31:24'),
(3, 4, '12', '12', '1212', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan_detail`
--

CREATE TABLE `pemesanan_detail` (
  `id_pemesanan_detail` int(11) NOT NULL,
  `id_pemesanan` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `ukuran` varchar(100) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga_produk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pemesanan_detail`
--

INSERT INTO `pemesanan_detail` (`id_pemesanan_detail`, `id_pemesanan`, `id_produk`, `ukuran`, `jumlah`, `harga_produk`) VALUES
(10, 0, 5, '', 0, 0),
(12, 0, 5, '', 0, 12121212),
(13, 0, 2, '', 0, 600000);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `id_produk_kategori` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `judul_produk` varchar(200) NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `keyword_produk` varchar(200) NOT NULL,
  `deskripsi_produk` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `id_produk_kategori`, `id_kategori`, `judul_produk`, `harga_produk`, `keyword_produk`, `deskripsi_produk`) VALUES
(2, 1, 13, 'Men\'s Short Sleeve Shirt', 150000, 'Kemeja basic, Kemeja polos, basic shirt, fashion pria', 'Basic kemeja lengan pendek Harga : 150.000,- Brand :INCERUN\r\nSize: S,M,L,XL,2XL,3XL\r\nwarna :Hijau, Tosca, Abu, Abu Tua\r\nbahan :100%Polyester'),
(3, 2, 13, 'Rayon Casual Shirt', 200000, 'Fashion pria, kemeja motif, geometric, kemeja pria, kemeja santai, kemeja rayon', 'RAYON CASUAL SHIRT\r\nKemeja kasual lengan pendek dengan motif berbagai macam. \r\nMotif : Floral, Geometric, Leaf\r\nBahan : 100% Rayon premium\r\nSize : M,L,XL\r\nHarga : 200.000,-'),
(4, 3, 13, 'Kemeja Kantor Strip', 90000, 'kemeja kantor, kemeja formal, kemeja strip, fashion pria', 'Kemeja Strip Pria \r\nKemeja Kantor dengan lengan panjang dan memiliki kancing dipergelangan. \r\nBahan : 100 % Cotton\r\nWarna : Putih, Abu-abu, Biru, Hijau \r\nSize : M, L, XL, XXL\r\nHarga : 90.000,-'),
(5, 4, 13, 'Dicky Work Pants', 200000, 'celena kerja, casual pants, celana formal, celana kantor, fashion pria', 'Work pant original dari DICKIES yang merupakan produk best seller.Twill & design yang terdepan membuat work pant Dickies cocok digunakan untuk bekerja, bepergian, atau untuk kegiatan sehari.\r\nSize : 28, 20, 32, 34, 36, 38\r\nWarna : Beige, Hitam, Putih \r\nHarga : 200.000,-'),
(7, 5, 13, 'Thobes Jubba Islamic', 200000, 'Gamis Pria, Jubba arab, fashion Muslim', 'Jubah Gamis Thobes\r\nBahan Wool dengan warna2 yang elegan dan tidak pasaran. Jahitan pas di badan sehingga terlihat gagah dipakai seperti jubah para pangeran. Dilengkapi kancing dr kerahnya. Ada kantong di bagian depan 1 sisi. \r\nWarna : Putih,Coklat,Coksu\r\nHarga : 200.000,-\r\nSize : 54/20;54/22;54/24'),
(8, 6, 13, 'T Shirt Print', 150000, 'Tshirt print, kaos sablon, kaos basic, kaos pria, fashion pria', 'T shirt lengan pendek Menggunakan bahan bermaterial Cotton Combed 30s dengan jahitan dan sablon terbaik yang nyaman dikenakan\r\nSize Chart Tshirt lokal - REGULAR T-SHIRT\r\nS, M, L, XL,XXL\r\n'),
(9, 7, 13, 'Long Sleeve T Shirt-7', 150000, 'Long shirt, Baju lengan Panjang, baju musim dingin, fashion pria', 'Bahan Wool dengan warna2 yang elegan dan tidak pasaran. Ditampilkan dengan kombinasi warna yang menarik dan lengan panjang sangat cocok untuk musim dingin. \r\nWarna : Navy, Putih, hijau, kuning\r\nHarga : 150.000,-\r\nSize : M, L, XL, XXL\r\n'),
(10, 9, 13, 'Hoodie Set', 200000, 'Hoodie Pria, Hoodie set, styles sport, jogger, fashion pria', ' 💚SETELAN PRIA HOODIE + JOGGER POLOS💚 \r\nBAHAN : FLEECE TEBAL \r\nUKURAN : M , L \r\nSWEATER M : LD 104CM PJ 69CM \r\nSWEATER L : LD 106CM PJ 70CM \r\nCELANA : UK 28 - 32 \r\nTERSEDIA PILIHAN WARNA ABU, COKLAT, COKSU \r\nDETAIL : JOGGER ADA SAKU KANAN KIRI \r\nBAHAN ADEM NYAMAN DI PAKAI\r\nHarga : 200.000,-'),
(11, 14, 13, 'Parka Zara Man ', 900000, 'Parka pria, ZARA, Parka Zara, Style pria, baju tren', 'Merek : Zara\r\nPanjang Luaran : Panjang\r\nBahan : Katun, Tekstil\r\nMotif : Polos\r\nPanjang Lengan : Lengan Panjang\r\nUkuran : L, XL, XXL\r\nGaya : Korean, Street Style\r\nHarga : 900.000,-\r\n'),
(12, 15, 13, 'Sepatu Converse', 500000, 'Sepatu tren, Sepatu konverse, Sepatu pria, sepatu putih, sepatu fashion', 'Sepatu Conrvese  (Unisex)\r\nTersedia warna : Putih, merah, abu-abu\r\nUkuran : 36, 37, 38, 39, 40, 41\r\nDi lengkapi jait berkualitas +stoble canvas 12os outsol tebal tidak licin nyaman buat di pakai sehari hari.\r\n'),
(13, 16, 5, 'Poncho V Neck', 90000, 'Outer Style, Outer tren, Kain Tenun, V neck, Baju wanita', 'Poncho V Neck Menggunakan bahan kain yang ditenun dengan tangan dalan setiap potongnya. Serta memiliki motif yang beragam sesuai untuk outfit para wanita. \r\nWarna : Biru, Army, Putih, Navy\r\nSize : All Size (Fit to XL()\r\nHarga : 90.000,-'),
(14, 17, 5, 'Tier Basic Dress Rayon', 118000, 'Dress panjang, baju Pantai, Dress wanita, dress tie, Fahion tren', 'Tier dress\r\nHarga : Rp 118.000,-\r\none-size-fits-all, fit to XL\r\nLD 108cm\r\nPanjang 135 cm\r\nBahan: Rayon (ademm, lembut, menyerap keringat, tetap nyaman digunakan dalam cuaca panas)\r\nKemiripan warna 90% (karena pencahayaan, perbedaan warna layar, kamera, dll.)'),
(15, 18, 5, 'Zara Trouser Pants', 365000, 'Zara pants, Celana kerja, celana casual, celana kantor, fashion style', '• Warna : Hazelnut, cream, coksu\r\n• SIZE : Medium : 27 - 28\r\n         Large : 29 - 30. (ONE SIZE LANG KASYA SA 27-30 DAHIL STRETCHY)\r\n• Haega : 365.000,-\r\n'),
(16, 19, 5, 'Hoodie Polos Lengan Panjang', 80000, 'Hoodie polos, Hoodie premium, baju wanita, fashion style, fashion tren', 'Hoodie Mod: 538/34 \r\nUkuran: 42-46 48-52 \r\nKain: Velour sport (Turki) \r\nWarna: putih, hitam, moka, \r\nHarga : 80.000,-\r\n'),
(17, 22, 5, 'Wide Leg Knit Pants', 80000, 'Celana kulot, kulot improt, kulot korea, fashion tren', 'Korea Fashion Wanita Celana Musim Gugur Musim Dingin Rajutan Lebar Kaki Celana Elastis Tinggi Pinggang Wanita Kasual Longgar Celana S1267\r\nWarna : Pink, Cokusi, Putih \r\nSize : One Size fit to L\r\nHarga : 80.000,-'),
(18, 23, 5, 'Ribbon Back Cotoon Dress', 120000, 'Tunik, Ribbon dress, Pakaian wanita, pakaian muslim, fashion tren', 'Dress katun boxy dan oversized tanpa lingkar pinggang terstruktur dan saku jahitan samping yang tersembunyi. Selesai dengan pengikatan pita tiga ke arah sebaliknya. \r\nUkuran : M, L'),
(19, 24, 5, 'Basic Dress/Gamis Muslim', 170000, 'Basic dress, Gamis Muslim, Pakaian Muslim, Gamis tren, fashion wanita', 'Detail Produk : ARUMI BASIC DRESS\r\nMaterial : CREPE\r\nCOLLOR : Abu, putih, hijau, ovaltine, coklat\r\nSIZE : Allsize M Fit To XL (LD106-110 PB138)\r\nGamis Zipper Depan ( Busui )\r\nJahitan Rapi Dan Presisi\r\nModel Terbaru Dan Terkini\r\nBahan Tebal Tidak Menerawang\r\nTidak Berbulu\r\nTidak Mudah Kusut'),
(20, 25, 14, 'Baju Bayi Oversice Set Unisex', 70000, 'Baju Bayi set, Baju gemes, Baju bayi lucu, fashion style baby', 'Baju bayi oversize set unisex, Dengan bahan berkualitas.\r\nBahan : Kaos Premium (100% cotton)\r\nBahan cutton: lembut, tidak panas, menyerap keringat, perawatan mudah, cocok untuk dipakai bayi dan anak-anak sehari-hari\r\nSize : 1Y, 2Y, 3Y, 4Y\r\nColor : Dusty pink, Coksu, Mustard\r\nHarga : 70.000,-\r\n\r\n'),
(21, 26, 14, 'Puff Sleeves Dress', 100000, 'Dress Anak-Anak, Dress premium, baju anak, fashion anak, styles baby', 'Dress dengan leher persegi yang indah dengan lengan balon dan manset smocked \r\nBahan : Katun 100%\r\nWarna : Cream, Abu-abu, Pink\r\nSize : S ( 1-2 tahun)\r\n       M ( 3-4 tahun)\r\nHarga : 100.000,-\r\n'),
(22, 27, 14, 'Piyama anak musim semi autum renda', 70000, 'Piyama anak, baju tidur anak, baju anak, fashion anak, baju anak perempuan', 'Piyama Setelan Anak perempuan lengan panjang Musim semi autum renda. Menggunakan kain dengan bahan premium yang lembut serta nyaman digunakan\r\n• Bahan : Katun\r\n• Rentang Usia：7+\r\n• Size : 7, 8, 9, 10\r\n• Tipe Pola : Kartun, Bunga, Buah\r\n• Jumlah : 2 potong (Baju, Celana)\r\n• Harga : 85.000,-\r\n\r\n'),
(23, 28, 14, 'Gamis Syar\'i Romera Kids', 120000, 'Gamis anak, pakaian muslim anak, baju syar\'i, baju anak, fashion muslim', 'Gamis Syar’I Romera Kids \r\nGamis anak terbaru dengan bahan lembut dan harga tejangkau, bahan tidak menerawang dan nyaman dipakai. Tersedia dengan warna kombinasi yang menarik.\r\nBahan : Baby doll\r\nMotif : kombinasi bawah\r\nTipe : Gamis Muslim\r\nHarga : 120.000,-\r\nSize: M, L, XL\r\nColor : Hitam, Merah'),
(24, 29, 14, 'Piyama set anak', 95000, 'Piyama anak, baju tidur anak, baju unisex, fashion anak, style tren', 'Baju tidur anak yang nyaman untuk dipakai, dengan potongan 2 bagian atasan dan celana panjang. Selain itu, memiliki pinggang yang elastis sehingga lebih fleksible untuk dipakai dengan tambhaan tali serut dibagian depan. \r\nBahan : 100% Sutra\r\nSize : S, M, L, XL\r\nColor : Hitam, Navy, Biru muda, Putih\r'),
(25, 30, 14, 'BAJU SET BURBERRY', 100000, 'Baju ana, baju santai, kids clothes, Fashion anak', 'Setelan Kaos Kerah Anak Import Usia 1-4 Tahun \r\nBahan Atasan Kaos lembut menyerap keringat.\r\nBahan Celana katun motif burberry. \r\nCocok untuk di jalan ke mall, bermain, segala aktivitas \r\nCasual dan keren\r\nColor : Putih bubble, Abu Bubble, pink, putih motif kotak \r\nSize:S, M ,L, XL'),
(26, 31, 14, 'Kids Clothes', 75000, 'Kids Clothes, kemeja anak, kemeja lucu, kemeja premium anak, fashion anak', 'Kemeja Anak-anak, dengan material cutton yang memiliki kesan elegan dan kalem. Model kerah V neck. Bahan : 100% Cutton. Motif : kombinasi putih, Biru polos, Motif hitam, biru panjang. \r\nHarga : 75.000,- . \r\nSize : M, L, XL '),
(27, 32, 14, 'Cheap Sandals Anak', 50000, 'sandal anak, sandal lucu, sepatu sandal, fashion anak', 'Cheap Sandals \r\nSandal lucu untuk anak perempuan cocok digunakan saat summer, dengan bahan berkualitas dan harga terjangkau. \r\nBahan: Lembut kombinasi jarring diluar.\r\nWarna : Putih, Hijau, Pink\r\nHarga : 50.000,-\r\nSize :21, 22,23,24\r\n'),
(28, 33, 14, 'Rubber shoes Kids', 150000, 'Sepatu anak, shoes kids, sepatu unisex, fashion anak', 'Jenis kelamin: Uniseks\r\nMusim: Musim Dingin Musim Panas Musim Semi / Musim Gugur\r\nBahan: Kain Karet Katun Kulit\r\nGaya: Tali gesper\r\nBahan Atas: Kulit original\r\nHarga : 150.000,-\r\nWarna : hitam, putih  abu-abu \r\nSize : 22, 23, 24, 25\r\n'),
(29, 34, 5, 'Print O neck Short Sleeve T shirt For Women', 50000, 'Shirt wanita, kaos wanita, pakaian wanita, baju santai, fashion wanita', 'print o neck short sleeve t shirt\r\nbaju lengan pendek dengan motif bunga daisy memberikan kesan simple dan feminim pada wanita. \r\nMotif L: daisy, moon\r\nbahan : kaos\r\nsize : S, M, L, XL\r\nwarna : Hitam\r\nharga : 50.000'),
(30, 40, 5, 'Celana jeans (High Jeans) ', 90000, 'jeans wanita, celana jeans wanita, celana wanita', 'High Waist Jeans\r\nCelana jeans untuk wanita model panjang\r\nmodel : Ripped, Straight \r\nwarna : Biru \r\nSize : S, M, L, XL\r\nharga : 90.000'),
(31, 35, 5, 'canvas flat sneaker for woman', 200000, 'sneakers, sepatu cewek', 'Fashion Vulcanize Canvas Flats Sneakers Women\'s Casual Shoes\r\nClassic white shoes woman casual canvas shoes female summer women sneakers lace-Up flat trainers fashion women vulcanize shoes.\r\nbahan : Canvas\r\nWarna : Putih\r\nSize : 38, 39, 40, 41\r\nHarga : 200.000'),
(32, 36, 5, 'Womens Casual Cool Lace Up White Sneakers', 200000, 'sepatu cewek, sneakers', 'Womens Casual Cool Lace Up White Sneakers. \r\nsepatu dengan kulit sintetis cocok dipadukan dengan ootd kuliah, hangout, jalan-jalan. \r\nbahan : kulit sintetis\r\nwarna : putih\r\nsize : 39, 40, 41\r\nHarga : 200.000'),
(33, 37, 5, 'Music Note Printed Long Sleeve Woman Hoodie', 250000, 'hoodie casual, elegan, fashion wanita', 'Music Note Printed Long Sleeve Women Hoodie\r\nhoodie motif print untuk wanita dengan memberikan kesan elegan dan casual. \r\nwarna : hitam \r\nsize : all size fit to L\r\nHarga : 250.000 \r\n\r\n'),
(34, 38, 5, 'Vintage Windbreaker Jacket for Woman', 100000, 'Jaket Unisex, Jaket wanita, jaket ', 'Jaket unisex dengan perpaduan dua warna hijau tosca dan putih memberikan kesan kalem dan hangat. \r\nsize : All size fit to XL \r\nwarna : hijau tosaca mix putih\r\nharga : 100.000'),
(35, 39, 5, 'women Ultra Light Down Jacket Hooded Winter', 300000, 'jaket musim dingin, jaket wanita, fashion wanita', 'Women Ultra Light Down Jacket Hooded Winter Duck Down Jackets Women Slim Long Sleeve Parka Zipper Coats 2017 Pockets Solid Color\r\njaket musim dingin untuk wanita\r\nwarna : hitam \r\nsize : S, M, L\r\nharga : 300.000'),
(36, 40, 5, 'High Waist Jeans', 90000, 'Celana jeans panjang, jeans panjang, celana panjang wanita, fashion wanita', 'High Waist Jeans\r\nCelana jeans untuk wanita model panjang\r\nmodel : Ripped, Straight \r\nwarna : Biru \r\nSize : S, M, L, XL\r\nharga : 90.000'),
(37, 42, 13, 'Jaket Pria two Layer', 500000, 'Jaket 2 layer, jaket pria, jaket tren, fashion pria', 'jaket pria 2 layer, bisa pemakaian bolak-balik sesuai dengan keinginan.\r\nwarna : coklat dan hitam \r\nsize : S,M,L,XL\r\nHarga : 500.000'),
(38, 43, 13, 'Sepatu Adidas Cardinal Red', 600000, 'Sepatu adidas, sepatu pria, sepatu tren, fashion pria', 'Sepatu Adidas Cardinal Red \r\nsepatu adidas dengan bahan canvas pelengkat ootd ke kampus, hangout, dan lainnya\r\nwarna : maroon\r\nSize : 39,40,41,42\r\nHarga : 600.000'),
(40, 44, 13, 'Man\'s Jackets ', 200000, 'jaket pria, jaket simple, jaket motif, jaket casual', 'jaket pria dengan motif strip pada kerah leher. \r\nnayaman dipakai seharian dan anti air. \r\nbahan : kulit sintetis\r\nWarna : Hitam \r\nSize : S,M,L,XL\r\nHarga : 200.000'),
(41, 45, 13, 'Celana jeans pria', 100000, 'Celana jeans pria, celana panjang pria, fashion pria', 'Mens Next Slim Fit Jeans With Stretch\r\ncelana jeans panjang pria yang memberikan kesan slim, dan dibuat dengan bahan yang nyaman untuk dipakai. \r\nwarna : Biru \r\nSize : 39, 40, 41\r\nHarga : 100.000'),
(42, 46, 13, 'Hoodie pria kantong depan', 150000, 'Hoodie pria, hoodie kantong depan, hoodie flanel', 'Mens Panel Patchwork Raglan Sleeve Loose Kangaroo Pocket Drawstring Hoodies\r\nHoodie flanel dengan model kantong depan kangguru\r\nwarna : kombinasi putih, coklat, abu\r\nsize : S,M,L,XL\r\nHarga : 150.000'),
(43, 47, 14, 'Jacket Kid\'s Boy', 150000, 'Jaket anak, jaket lucu, fashion anak', 'Jaket anak-anak laki-laki \r\ndibuat dengan bahan yang nyaman dipakai untuk anak, terdapat model bercindung. \r\nwarna : navy, merah bata\r\nsize : S,M,L,XL\r\nharga : 150.000'),
(44, 48, 14, 'Cotton Boys T-Shirt Kids', 50000, 'Kaos anak, shirt anak, kaos lengan pendek, fashion anak', 'Cotton Boys T-Shirt Kids Shirts Baby Boys Casual Short Sleeve Car Print T-shirt For Boy Summer Children Toddlder Tee Shirts Tops\r\nwarna : navy\r\nsize : S,M,L,XL\r\nHarga : 50.000'),
(45, 49, 14, 'Unicorn Baby Sweaters Cotton', 80000, 'Sweater anak, sweater lengan panjang, sweater murah, fashion anak', 'Unicorn Baby Sweaters Cotton Rainbow Sweatshirt\r\nSweater anak unisex dengan bahan lembut dan model lengan panjang \r\nWarna :Biru\r\nSize : S,M,L,XL\r\nharga: 80.000'),
(46, 50, 14, 'Big Kids Zip Fleece Hoodie', 100000, 'Hoodie anak, hoodie lucu, hoodie premium, hoodie simple', 'Hoodie anak dengan model Zip berbahan lembut dan nyaman dipakai seharian\r\nwarna : Abu muda\r\nSize : S,M,L,XL\r\nHarga :100.000\r\n\r\n'),
(47, 51, 14, 'Cartoon print O neck Short Sleeve', 90000, 'Baju anak, Shirt Anak, Fashion anak', 'Cartoon Print O neck Short Sleeve T shirt For Women\r\nbaju anak dengan motif lucu memberikan kesan menggemaskan pada anak. \r\nwarna : hijau \r\nsize : s,m,l,xl\r\nHarga : 90.000'),
(48, 52, 14, 'Sepatu flat anak', 100000, 'Sepatu anak, sneakers anak, fashion anak', 'Sepatu flat anak unisex\r\nsepatu dibuat dengan bahan yang ringan sehingga nyaman dipakai oleh sikecil.\r\nWarna : Putih \r\nSize : 20,21,22\r\nHarga : 100.000'),
(49, 53, 14, 'Celana jeans panjang anak', 90000, 'Celana anak, jeans anak, celana panjang, fashion anak', 'celana jeans anak dengan model panjang, dilengkapi denga 2 warna. bahan yang lembut dan tipis agar anak merasakan nyaman saat memakai.\r\nwarna : biru, navy\r\nsize : S,M,L,XL\r\nharga : 90000');

-- --------------------------------------------------------

--
-- Table structure for table `produk_kategori`
--

CREATE TABLE `produk_kategori` (
  `id_produk_kategori` int(11) NOT NULL,
  `judul_produk_kategori` varchar(300) NOT NULL,
  `deskripsi_produk_kategori` varchar(400) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk_kategori`
--

INSERT INTO `produk_kategori` (`id_produk_kategori`, `judul_produk_kategori`, `deskripsi_produk_kategori`) VALUES
(1, 'Men\'s Short Sleeve Shirt', 'Basic kemeja lengan pendek Harga : 150.000,- Brand :INCERUN\r\nSize: S,M,L,XL,2XL,3XL\r\nwarna :Hijau, Tosca, Abu, Abu Tua\r\nbahan :100%Polyester'),
(2, 'Rayon Casual Shirt', 'RAYON CASUAL SHIRT\r\nKemeja kasual lengan pendek dengan motif berbagai macam. \r\nMotif : Floral, Geometric, Leaf\r\nBahan : 100% Rayon premium\r\nSize : M,L,XL\r\nHarga : 200.000,-\r\n\r\n'),
(3, 'Kemeja Kantor Strip', 'Kemeja Strip Pria \r\nKemeja Kantor dengan lengan panjang dan memiliki kancing dipergelangan. \r\nBahan : 100 % Cotton\r\nWarna : Putih, Abu-abu, Biru, Hijau \r\nSize : M, L, XL, XXL\r\nHarga : 90.000,-\r\n'),
(4, 'Dicky work Pants', 'Work pant original dari DICKIES yang merupakan produk best seller. Campuran antara polyster & cotton membuat celana anti luntur & memiliki keawetan yang tahan lama. Twill & design yang terdepan membuat work pant Dickies cocok digunakan untuk bekerja, bepergian, atau untuk kegiatan sehari.\r\nSize : 28, 20, 32, 34, 36, 38\r\nWarna : Beige, Hitam, Putih , Navy\r\nHarga : 200.000,-\r\n'),
(5, 'Thobes Jubba Islamic', 'Jubah Gamis Thobes\r\nBahan Wool dengan warna2 yang elegan dan tidak pasaran. Jahitan pas di badan sehingga terlihat gagah dipakai seperti jubah para pangeran. Dilengkapi kancing dr kerahnya. Ada kantong di bagian depan 1 sisi. \r\nWarna : Putih, Coklat, Coksu\r\nHarga : 200.000,-\r\nSize 54/20 \r\nPanjang Jubah : 137 cm Lebar dada : 51 cm (S) \r\nSize 54/22 \r\nPanjang Jubah : 137 cm Lebar dada : 56 cm (M) '),
(6, 'T shirt Print', 'T shirt lengan pendek Menggunakan bahan bermaterial Cotton Combed 30s dengan jahitan dan sablon terbaik yang nyaman dikenakan\r\nSize Chart Tshirt Lokal - REGULAR T-SHIRT\r\nNote: PT (panjang tangan), LD (Lebar Dada), PB (Panjang Baju)\r\nS PT 19-20cm, LD 47-48 cm, PB 65-67cm\r\nM PT 21-22cm, LD 49-50cm, PB 68-70cm\r\nL PT 23-24cm, LD 51-52cm, PB 71-72cm\r\nXL PT 24-25cm, LD 53-54cm, PB 73-74cm'),
(7, 'Long sleeve T shirt', 'Bahan Wool dengan warna2 yang elegan dan tidak pasaran. Ditampilkan dengan kombinasi warna yang menarik dan lengan panjang sangat cocok untuk musim dingin. \r\nWarna : Navy, Putih, hijau, kuning\r\nHarga : 150.000,-\r\nSize : M, L, XL, XXL'),
(9, 'Hoodie Set', '💚SETELAN PRIA HOODIE + JOGGER POLOS💚 \r\nBAHAN : FLEECE TEBAL \r\nUKURAN : M , L \r\nSWEATER M : LD 104CM PJ 69CM \r\nSWEATER L : LD 106CM PJ 70CM \r\nCELANA : UK 28 - 32 \r\nTERSEDIA PILIHAN WARNA ABU, COKLAT, COKSU \r\nDETAIL : JOGGER ADA SAKU KANAN KIRI \r\nBAHAN ADEM NYAMAN DI PAKAI\r\nHarga : 200.000,-\r\n'),
(14, 'Parka Zara Man', 'Merek : Zara\r\nPanjang Luaran : Panjang\r\nBahan : Katun, Tekstil\r\nMotif : Polos\r\nWarna : Hijau, Biru\r\nPanjang Lengan : Lengan Panjang\r\nUkuran : L, XL, XXL\r\nGaya : Korean, Street Style\r\nHarga : 900.000,-\r\n'),
(15, 'Sepatu Converse ', 'Sepatu Conrvese  (Unisex)\r\nTersedia warna : Putih, merah, abu-abu\r\nUkuran : 36, 37, 38, 39, 40, 41\r\nDi lengkapi jait berkualitas +stoble canvas 12os outsol tebal tidak licin nyaman buat di pakai sehari hari,, bisa 1 kg muat 2 pcs tergantung ukuran dan berat, jika lebih 1 kg maka kami kurangi box di ganti uang kembali box\r\n'),
(16, 'Poncho V Neck', 'Poncho V Neck Menggunakan bahan kain yang ditenun dengan tangan dalan setiap potongnya. Serta memiliki motif yang beragam sesuai untuk outfit para wanita. \r\nWarna : Biru, Army, Putih, Navy\r\nSize : All Size (Fit to XL)\r\nHarga : 90.000,-\r\n'),
(17, 'Tier Basic Dress rayon', 'Tier dress\r\nHarga : Rp 118.000,-\r\none-size-fits-all, fit to XL\r\nLD 108cm\r\nPanjang 135 cm\r\nWarna : dusty pink, Navy, Putih\r\nBahan: Rayon (ademm, lembut, menyerap keringat, tetap nyaman digunakan dalam cuaca panas)\r\nKemiripan warna 90% (karena pencahayaan, perbedaan warna layar, kamera, dll.)'),
(18, 'Zara Trouser Pants', '• Warna : Hazelnut, cream, coksu\r\n• SIZE : Medium : 27 - 28\r\n         Large : 29 - 30. (ONE SIZE LANG KASYA SA 27-30 DAHIL STRETCHY)\r\n• Haega : 365.000,-\r\n'),
(19, 'Hoodie Polos lengan panjang', 'Hoodie Mod: 538/34 \r\nUkuran: 42-46 48-52 \r\nKain: Velour sport (Turki) \r\nWarna: putih, hitam, moka, \r\nHarga : 80.000,-\r\n'),
(22, 'Wide Leg Knit Pants', 'Korea Fashion Wanita Celana Musim Gugur Musim Dingin Rajutan Lebar Kaki Celana Elastis Tinggi Pinggang Wanita Kasual Longgar Celana S1267\r\nWarna : Pink, Cokusi, Putih \r\nSize : One Size fit to L\r\nHarga : 80.000,-\r\n'),
(23, 'Ribbon Back Cotton Dress', 'Dress katun boxy dan oversized tanpa lingkar pinggang terstruktur dan saku jahitan samping yang tersembunyi. Selesai dengan pengikatan pita tiga ke arah sebaliknya. Ukuran UK 8 – 10 dapat mengharapkan kecocokan yang longgar dan kebesaran, sementara ukuran UK 14 akan lebih pas. Satu Ukuran: Panjang: 115cm, Lebar (Bust): 55cm, Pinggang: 46\", Lengan: 45cm. Tinggi Model: 163cm 100% Katun.'),
(24, 'Basic Dress/Gamis Muslim', 'Detail Produk : ARUMI BASIC DRESS\r\nMaterial : CREPE\r\nCOLLOR : Abu, putih, hijau, ovaltine, coklat\r\nSIZE : Allsize M Fit To XL (LD106-110 PB138)\r\nGamis Zipper Depan ( Busui )\r\nJahitan Rapi Dan Presisi\r\nModel Terbaru Dan Terkini\r\nBahan Tebal Tidak Menerawang\r\nTidak Berbulu\r\nTidak Mudah Kusut'),
(25, 'Baju Bayi Oversize set Unisex', 'Baju bayi oversize set unisex, Dengan bahan berkualitas yang sangat lembut dan halus dikulit bayi\r\nBahan : Kaos Premium (100% cotton)\r\nBahan cutton: lembut, tidak panas, menyerap keringat, perawatan mudah, cocok untuk dipakai bayi dan anak-anak sehari-hari\r\nSize : 3-6m, 6-12m, 1Y, 2Y, 3Y, 4Y\r\nColor : Dusty pink, Coksu, Mustard\r\nHarga : 70.000,-\r\n\r\n'),
(26, 'Puff Sleeves Dress', 'Dress dengan leher persegi yang indah dengan lengan balon dan manset smocked \r\nBahan : Katun 100%\r\nWarna : Cream, Abu-abu, Pink\r\nSize : S ( 1-2 tahun)\r\n       M ( 3-4 tahun)\r\nHarga : 100.000,-\r\nBahan mudah untuk dicuci (disarankan menggunakan cuci tangan), dan tidak panas dipakai sehari-hari\r\n'),
(27, 'Piyama Anak Musim Semi Autum Renda ', 'Piyama Setelan Anak perempuan lengan panjang Musim semi autum renda. Menggunakan kain dengan bahan premium yang lembut serta nyaman digunakan\r\n• Bahan : Katun\r\n• Rentang Usia：7+\r\n• Size : 7, 8, 9, 10\r\n• Tipe Pola : Kartun, Bunga, Buah\r\n• Jumlah : 2 potong (Baju, Celana)\r\n• Harga : 85.000,-\r\n'),
(28, 'Gamis Syar\'I Romera Kids ', 'Gamis Syar’I Romera Kids \r\nGamis anak terbaru dengan bahan lembut dan harga tejangkau, bahan tidak menerawang dan nyaman dipakai. Tersedia dengan warna kombinasi yang menarik.\r\nBahan : Baby doll\r\nMotif : kombinasi bawah\r\nTipe : Gamis Muslim\r\nHarga : 120.000,-\r\nSize:\r\nM : Usia 4 sampai 5 Tahun\r\nL : Usia 6 sampai 7 Tahun\r\nXL : Usia 8 sampai 9 Tahun \r\nXXL : Usia 10 Tahun \r\nColor : Hitam, Merah\r\n'),
(29, 'Piyama set anak', 'Piyama set anak\r\nBaju tidur anak dibuat dengan sangat nyaman untuk dipakai, dengan potongan 2 bagian atasan dan celana panjang. Selain itu, piyama ini memiliki pinggang yang elastis sehingga lebih fleksible untuk dipakai dengan tambhaan tali serut dibagian depan. \r\nBahan : 100% Sutra\r\nSize : S, M, L, XL\r\nColor : Hitam, Navy, Biru muda, Putih\r\nHarga : 95.000,-\r\nDisarankan dicuci dengan air dingin'),
(30, 'Baju set Anak Burberry', 'Setelan Kaos Kerah Anak Import Usia 1-4 Tahun \r\nBahan Atasan Kaos lembut menyerap keringat.\r\nBahan Celana katun motif burberry. \r\nCocok untuk di jalan ke mall, bermain, segala aktivitas \r\nCasual dan keren\r\nColor : Putih bubble, Abu Bubble, pink, putih motif kotak \r\nSize: \r\nS/80: LD. 52cm, PB. 33cm, P. 29cm (1TH) \r\nM/90: LD. 54cm, PB. 35cm, P. 29cm (2TH) \r\nL/100: LD. 56cm, PB. 37cm, P. 30cm (3TH)'),
(31, 'Kids Clothes', 'Kemeja Anak-anak, dengan material cutton yang memiliki kesan elegan dan kalem. Model kerah V neck. Bahan : 100% Cutton. Motif : kombinasi putih, Biru polos, Motif hitam, biru panjang. Harga : 75.000,- . M : 2-3 tahun LD 35 cm, PB 50 cm\r\nL : 4 tahun LD 37 cm, PB 51 cm\r\nXL : 5-6 tahun LD 39 cm PB 52 cm \r\nXXL : 7-8 tahun LD 41 cm, PB 53 cm '),
(32, 'Cheap Sandals Anak-anak', 'Cheap Sandals \r\nSandal lucu untuk anak perempuan cocok digunakan saat summer, dengan bahan berkualitas dan harga terjangkau. \r\nBahan: Lembut kombinasi jarring diluar.\r\nWarna : Putih, Hijau, Pink\r\nHarga : 50.000,-\r\nSize :\r\n21 : 13.5 cm\r\n22 : 14.0 cm\r\n23 : 14.5 cm\r\n24 : 15.0 cm'),
(33, 'Rubber Shoes Kids', 'Jenis kelamin: Uniseks\r\nMusim: Musim Dingin Musim Panas Musim Semi / Musim Gugur\r\nBahan: Kain Karet Katun Kulit\r\nGaya: Tali gesper\r\nBahan Atas: Kulit original\r\nHarga : 150.000,-\r\nWarna : hitam, putih  abu-abu \r\nSize : 22, 23, 24, 25'),
(34, 'Print O neck Short Sleeve T shirt For Women ', 'print o neck short sleeve t shirt\r\nbaju lengan pendek dengan motif bunga daisy memberikan kesan simple dan feminim pada wanita. \r\nMotif L: daisy, moon\r\nbahan : kaos\r\nsize : S, M, L, XL\r\nwarna : Hitam\r\nharga : 50.000'),
(35, 'Canvas Flat Sneakers for woman', 'Fashion Vulcanize Canvas Flats Sneakers Women\'s Casual Shoes\r\nClassic white shoes woman casual canvas shoes female summer women sneakers lace-Up flat trainers fashion women vulcanize shoes.\r\nbahan : Canvas\r\nWarna : Putih\r\nSize : 38, 39, 40, 41\r\nHarga : 200.000'),
(36, 'Womens Casual Cool Lace Up White Sneakers', 'Womens Casual Cool Lace Up White Sneakers. \r\nsepatu dengan kulit sintetis cocok dipadukan dengan ootd kuliah, hangout, jalan-jalan. \r\nbahan : kulit sintetis\r\nwarna : putih\r\nsize : 39, 40, 41\r\nHarga : 200.000'),
(37, 'Music Note Printed Long Sleeve Women Hoodie', 'Music Note Printed Long Sleeve Women Hoodie\r\nhoodie motif print untuk wanita dengan memberikan kesan elegan dan casual. \r\nwarna : hitam \r\nsize : all size fit to L\r\nHarga : 250.000 \r\n\r\n'),
(38, 'Vintage Windbreaker Jacket', 'Jaket unisex dengan perpaduan dua warna hijau tosca dan putih memberikan kesan kalem dan hangat. \r\nsize : All size fit to XL \r\nwarna : hijau tosaca mix putih\r\nharga : 100.000'),
(39, 'Women Ultra Light Down Jacket Hooded Winter Duck Down Jackets Women Slim Long Sleeve Parka Zipper ', 'Women Ultra Light Down Jacket Hooded Winter Duck Down Jackets Women Slim Long Sleeve Parka Zipper Coats 2017 Pockets Solid Color\r\njaket musim dingin untuk wanita\r\nwarna : hitam \r\nsize : S, M, L\r\nharga : 300.000'),
(40, 'celana jeans ', 'High Waist Jeans\r\nCelana jeans untuk wanita model panjang\r\nmodel : Ripped, Straight \r\nwarna : Biru \r\nSize : S, M, L, XL\r\nharga : 90.000'),
(42, 'Jaket Pria 2 layer', 'jaket pria 2 layer, bisa pemakaian bolak-balik sesuai dengan keinginan.\r\nwarna : coklat dan hitam \r\nsize : S,M,L,XL\r\nHarga : 500.000'),
(43, 'adidas Campus AS Cardinal Red ', 'Sepatu Adidas Cardinal Red \r\nsepatu adidas dengan bahan canvas pelengkat ootd ke kampus, hangout, dan lainnya\r\nwarna : maroon\r\nSize : 39,40,41,42'),
(44, 'Men\'s Fashion Jackets', 'jaket pria dengan motif strip pada kerah leher. \r\nnayaman dipakai seharian dan anti air. \r\nbahan : kulit sintetis\r\nWarna : Hitam \r\nSize : S,M,L,XL\r\nHarga : 200.000'),
(45, 'Mens Next Slim Fit Jeans With Stretch', 'Mens Next Slim Fit Jeans With Stretch\r\ncelana jeans panjang pria yang memberikan kesan slim, dan dibuat dengan bahan yang nyaman untuk dipakai. \r\nwarna : Biru \r\nSize : 39, 40, 41\r\nHarga : 100.000'),
(46, 'Mens Panel Patchwork Raglan Sleeve Loose Kangaroo Pocket Drawstring Hoodies', 'Mens Panel Patchwork Raglan Sleeve Loose Kangaroo Pocket Drawstring Hoodies\r\nHoodie flanel dengan model kantong depan kangguru\r\nwarna : kombinasi putih, coklat, abu\r\nsize : S,M,L,XL\r\nHarga : 150.000'),
(47, 'Jacket kid\'s boy', 'Jaket anak-anak laki-laki \r\ndibuat dengan bahan yang nyaman dipakai untuk anak, terdapat model bercindung. \r\nwarna : navy, merah bata\r\nsize : S,M,L,XL\r\nharga : 150.000'),
(48, 'Cotton Boys T-Shirt Kids ', 'Cotton Boys T-Shirt Kids Shirts Baby Boys Casual Short Sleeve Car Print T-shirt For Boy Summer Children Toddlder Tee Shirts Tops\r\nwarna : navy\r\nsize : S,M,L,XL\r\nHarga : 50.000'),
(49, 'Unicorn Baby Sweaters Cotton', 'Unicorn Baby Sweaters Cotton Rainbow Sweatshirt\r\nSweater anak unisex dengan bahan lembut dan model lengan panjang \r\nWarna :Biru\r\nSize : S,M,L,XL\r\nharga: 80.000'),
(50, 'Big Kids Zip Fleece Hoodie ', 'Hoodie anak dengan model Zip berbahan lembut dan nyaman dipakai seharian\r\nwarna : Abu muda\r\nSize : S,M,L,XL\r\nHarga :100.000\r\n\r\n'),
(51, 'Cartoon Print O neck Short Sleeve T shirt For Women ', 'Cartoon Print O neck Short Sleeve T shirt For Women\r\nbaju anak dengan motif lucu memberikan kesan menggemaskan pada anak. \r\nwarna : hijau \r\nsize : s,m,l,xl\r\nHarga : 90.000'),
(52, 'Sepatu anak', 'Sepatu flat anak unisex\r\nsepatu dibuat dengan bahan yang ringan sehingga nyaman dipakai oleh sikecil.\r\nWarna : Putih \r\nSize : 20,21,22\r\nHarga : 100.000'),
(53, 'Celana jeans panjang anak', 'celana jeans anak dengan model panjang, dilengkapi denga 2 warna. bahan yang lembut dan tipis agar anak merasakan nyaman saat memakai.\r\nwarna : biru, navy\r\nsize : S,M,L,XL\r\nharga : 90000');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id_slider` int(11) NOT NULL,
  `nama_slider` varchar(200) NOT NULL,
  `gambar_slider` varchar(200) NOT NULL,
  `heading_slider` varchar(200) NOT NULL,
  `text_slider` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id_slider`, `nama_slider`, `gambar_slider`, `heading_slider`, `text_slider`) VALUES
(1, '1', '2', '3', '4'),
(2, 'sds', 'asdasd', 'asdasd', 'asdasdasd'),
(3, 'asdasd', 'rak.png', 'asdasda', 'sdasdasdasd'),
(11, '2', 'peminjaman.png', '4', '5'),
(12, '11', 'sablon.png', '21', '31'),
(13, '1', 'marketplace222.png', '3', '5'),
(16, '1', 'nWNYi20220529085318pengembalian.png', '2', '3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `gambar_produk`
--
ALTER TABLE `gambar_produk`
  ADD PRIMARY KEY (`id_gambar_produk`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id_keranjang`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id_pemesanan`);

--
-- Indexes for table `pemesanan_detail`
--
ALTER TABLE `pemesanan_detail`
  ADD PRIMARY KEY (`id_pemesanan_detail`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD KEY `id_produk_kategori` (`id_produk_kategori`),
  ADD KEY `id_produk` (`id_produk`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `produk_kategori`
--
ALTER TABLE `produk_kategori`
  ADD PRIMARY KEY (`id_produk_kategori`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id_slider`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `gambar_produk`
--
ALTER TABLE `gambar_produk`
  MODIFY `id_gambar_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id_keranjang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id_pemesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pemesanan_detail`
--
ALTER TABLE `pemesanan_detail`
  MODIFY `id_pemesanan_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `produk_kategori`
--
ALTER TABLE `produk_kategori`
  MODIFY `id_produk_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id_slider` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `gambar_produk`
--
ALTER TABLE `gambar_produk`
  ADD CONSTRAINT `gambar_produk_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`);

--
-- Constraints for table `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `produk_ibfk_1` FOREIGN KEY (`id_produk_kategori`) REFERENCES `produk_kategori` (`id_produk_kategori`),
  ADD CONSTRAINT `produk_ibfk_2` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
