-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Agu 2023 pada 04.33
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toko_online`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_pembelian`
--

CREATE TABLE `detail_pembelian` (
  `id_detail_pembelian` bigint(20) NOT NULL,
  `id_pembelian` bigint(20) NOT NULL,
  `id_produk` bigint(20) NOT NULL,
  `id_varian` bigint(20) DEFAULT NULL,
  `kuantitas` int(11) NOT NULL,
  `sub_berat` int(11) NOT NULL,
  `sub_harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `detail_pembelian`
--

INSERT INTO `detail_pembelian` (`id_detail_pembelian`, `id_pembelian`, `id_produk`, `id_varian`, `kuantitas`, `sub_berat`, `sub_harga`) VALUES
(1, 1, 16, NULL, 1, 1700, 5800000),
(2, 1, 7, 9, 2, 2200, 1716000),
(3, 2, 12, NULL, 1, 3200, 956000),
(4, 2, 3, NULL, 1, 550, 130000),
(5, 3, 4, 14, 1, 500, 2200000),
(6, 4, 6, 5, 1, 16000, 1832000),
(7, 5, 17, 22, 1, 250, 108000),
(8, 6, 8, NULL, 1, 3000, 673000),
(9, 7, 15, NULL, 1, 1500, 6950000),
(10, 7, 11, NULL, 1, 2000, 762000),
(11, 8, 9, NULL, 1, 1000, 578000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` bigint(20) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL,
  `gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `gambar`) VALUES
(1, 'Tas', '358b645eab88f8a79ccf5f9b3e2fd31d.jpg'),
(2, 'Jam Tangan', '951c2fcc2a3a63556e6c362852997e1e.jpg'),
(3, 'Sepatu', '2de1a5e77b96774de74ebb5aafd82045.jpg'),
(4, 'Baju Pria', '34bd7aa8ffc48a8749288e5b654fd215.jpg'),
(5, 'Pakaian Wanita', '3ef258df311e4188c3461c135a507436.jpg'),
(6, 'Laptop &amp; Komputer', '04c7b9153500b54e4a4a4280f07dc473.jpg'),
(7, 'Handphone', 'ac42750f6924bb5fc42f675c94dea4cc.jpg'),
(8, 'Makanan &amp; Minuman', 'c63f0ef29ef0ae1bfe93c21a19398353.jpg'),
(9, 'Perawatan Kecantikan', '8aa55e21d1f8385933daa1e207b3870d.jpg'),
(10, 'Elektronik', '92afc5edd23e4028d0e49067f6ff6267.jpg'),
(12, 'Peralatan Masak', 'bdcec0809941e9761b8315efc9d6deaf.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` bigint(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `no_hp` varchar(25) NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama`, `email`, `password`, `no_hp`, `foto`) VALUES
(1, 'Muhammad Surya Mukti', 'muhammadsuryomukti@gmail.com', 'e953837396bb823f758c58bfefc29c51', '0896-7319-7004', '19687c33b70e88ae9c42801652d1d016.png'),
(2, 'Muhammad Agus', 'muhammadagus@gmail.com', 'fdf169558242ee051cca1479770ebac3', '0875 6445 3021', ''),
(3, 'Budianto', 'budibudianto@gmail.com', '00dfc53ee86af02e742515cdcf075ed3', '089-673-001-348', '8703833878c6c73744c7518bed614bbc.jpg'),
(4, 'Andhika Tegar', 'tegarandhika11@gmail.com', '1d31802d64bae29d88923d795fc73734', '087-893-661-9920', 'f064ee9234cd1c9432b340b03798a82b.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` bigint(20) NOT NULL,
  `tgl_pembelian` datetime NOT NULL,
  `tgl_dikemas` datetime NOT NULL,
  `tgl_dikirim` datetime NOT NULL,
  `tgl_sampai` datetime NOT NULL,
  `id_pelanggan` bigint(20) DEFAULT NULL,
  `total_berat` int(11) NOT NULL,
  `resi_pengiriman` varchar(50) NOT NULL,
  `alamat_pengiriman` text NOT NULL,
  `provinsi` varchar(50) NOT NULL,
  `distrik` varchar(100) NOT NULL,
  `tipe` varchar(20) NOT NULL,
  `kodepos` varchar(10) NOT NULL,
  `ekspedisi` varchar(50) NOT NULL,
  `paket` varchar(10) NOT NULL,
  `ongkir` int(11) NOT NULL,
  `estimasi` varchar(10) NOT NULL,
  `total_pembelian` int(11) NOT NULL,
  `total_bayar` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  `bukti` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `tgl_pembelian`, `tgl_dikemas`, `tgl_dikirim`, `tgl_sampai`, `id_pelanggan`, `total_berat`, `resi_pengiriman`, `alamat_pengiriman`, `provinsi`, `distrik`, `tipe`, `kodepos`, `ekspedisi`, `paket`, `ongkir`, `estimasi`, `total_pembelian`, `total_bayar`, `status`, `bukti`) VALUES
(1, '2023-08-06 10:42:47', '2023-08-09 09:32:01', '2023-08-09 09:52:15', '2023-08-11 08:33:40', 1, 3900, 'REG-76YTU534L', 'Jl. ABC No. 10 Ds. Kedungsari RT 08 RW 03 kec. bandung', 'Jawa Barat', 'Bandung', 'Kota', '40111', 'tiki', 'REG', 68000, '2', 7516000, 7584000, 'Selesai', 'febef7a80d424e72e78d1d07ee33a4af.jpg'),
(2, '2023-08-06 10:45:55', '2023-08-09 09:32:31', '2023-08-11 08:34:07', '0000-00-00 00:00:00', 2, 3750, 'OKE-TR5637UHS', 'Jl. Podorejo No. 12 Ds. Podorejo RT 01 RW 01 kec. ngaliyan', 'Jawa Tengah', 'Semarang', 'Kota', '50135', 'jne', 'OKE', 40000, '2-3', 1086000, 1126000, 'Dikirim', '47eb274e8f075c619e2494b29d503cc0.jpg'),
(3, '2023-08-06 10:49:23', '2023-08-09 09:51:12', '2023-08-11 08:35:16', '0000-00-00 00:00:00', 3, 500, 'KRG-UJGD378', 'Jl. Soekarno Hatta No. 97 Ds. Candiroto RT 01 RW 10 kec. cengkareng', 'DKI Jakarta', 'Jakarta Barat', 'Kota', '11220', 'pos', 'Pos Kargo', 50000, '7-14 HARI', 2200000, 2250000, 'Dikirim', 'f182b1a07b00e3f3383f530bc879373a.jpg'),
(4, '2023-08-06 10:51:03', '2023-08-06 11:01:58', '2023-08-09 09:40:32', '2023-08-11 08:33:06', 4, 16000, 'CTC-546YT8976543', 'Jl. Soponyono No. 99 Ds. Kedungsuren kec. kaliwungu selatan', 'Jawa Tengah', 'Kendal', 'Kabupaten', '51314', 'jne', 'CTC', 112000, '3-6', 1832000, 1944000, 'Selesai', '537c7b6d1af36e2e408e93ab6f3e6372.png'),
(5, '2023-08-11 08:48:38', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 250, '', 'Jl. Mekar sari No. 34 Perumahan Griya Abadi Ds. Maju Jaya Kec. cikarang', 'DKI Jakarta', 'Jakarta Pusat', 'Kota', '10540', 'pos', 'Pos Nextda', 26500, '1 HARI', 108000, 134500, 'Menunggu Konfirmasi', '8fe41326acece13fa3d9fa675bfb479d.jpg'),
(6, '2023-08-11 08:51:01', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2, 3000, '', 'Jl. Melati wangi No. 21 Ds. Sidokumpul Kec. Kertorejo', 'Jawa Tengah', 'Cilacap', 'Kabupaten', '53211', 'jne', 'REG', 36000, '1-2', 673000, 709000, 'Pembayaran Gagal', 'e6b42a5c8ee7b5b43a00cee989d1c23f.png'),
(7, '2023-08-11 08:53:24', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 4, 3500, '', 'Jl. Pendekar No. 86 Ds. Wonorejo Kec. Banyuwangi', 'Jawa Tengah', 'Demak', 'Kabupaten', '59519', 'tiki', 'ECO', 58000, '5', 7712000, 7770000, 'Belum Bayar', ''),
(8, '2023-08-11 08:56:02', '2023-08-11 09:11:23', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 3, 1000, '', 'Jl. Kerokan No. 100 Ds. Kerokan Kec. Temanggung', 'Jawa Tengah', 'Temanggung', 'Kabupaten', '56212', 'jne', 'OKE', 13000, '3-6', 578000, 591000, 'Dikemas', 'cb5639251882de7ce54368ab286641ca.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `petugas`
--

CREATE TABLE `petugas` (
  `id` bigint(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `level` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `petugas`
--

INSERT INTO `petugas` (`id`, `nama`, `email`, `password`, `no_hp`, `level`) VALUES
(1, 'Jalar Mardika', 'jalarmardika@gmail.com', 'f0783370ce4988a97dcb63a977eb6747', '0896 7319 7044', 'Admin'),
(2, 'Ahmad Bagus', 'bagusahmad@gmail.com', '61243c7b9a4022cb3f8dc3106767ed12', '0873 8213 7604', 'Petugas'),
(4, 'Yulianto', 'yulianto53@gmail.com', '7b5adea9f129b861e3291e851a9e15e9', '087 775 430 921', 'Petugas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` bigint(20) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `id_kategori` bigint(20) NOT NULL,
  `warna` varchar(50) NOT NULL,
  `ukuran` varchar(50) NOT NULL,
  `harga` bigint(20) NOT NULL,
  `berat` bigint(20) NOT NULL,
  `deskripsi` text NOT NULL,
  `stok` bigint(20) NOT NULL,
  `terjual` bigint(20) NOT NULL,
  `gambar_produk` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `id_kategori`, `warna`, `ukuran`, `harga`, `berat`, `deskripsi`, `stok`, `terjual`, `gambar_produk`) VALUES
(1, 'POLYTRON DIGITAL TV 24', 10, 'Hitam', 'Besar', 2750000, 5000, '<strong>LED TV dengan Garansi 5 Tahun yang sudah mendukung Digital TV (DVB-T2)</strong><br />\r\n<br />\r\n<br />\r\n- Digital TV (DVB-T2) : gambar lebih jernih dan tidak berbayang<br />\r\n<br />\r\n- DIPE Engine : menghasilkan detail dan ketajaman gambar sebenarnya<br />\r\n<br />\r\n- USB Play Movie : memutar beragam film, gambar dan lagu favorit langsung dari USB Flash drive', 10, 0, '081392c8a98854e35a6e386984ee8a01.jpg'),
(2, 'Sepatu Pria Wanita Sepatu casual, sepatu Kece, Sepatu Wanita Sepatu vans Hitam, Sepatu casual', 3, 'Hitam', '39', 125000, 1000, 'Bahan Mhes halus juga lentur.<br />\r\nOut. Sol karet lokal&nbsp;', 20, 0, 'd58bb8a4deaf1f54f87e272bb4b09257.jpg'),
(3, 'Sepatu Sneakers Casual Sport Sup Trend Culture Fashion', 3, 'Putih', '39', 130000, 550, 'Tangan Pertama Pengrajin Sepatu &amp; Sandal Dari Bogor, Bahan Baku Serta Proses Produksi Kita Semua Yang Kerjakan Maka Dari itu Kita Bisa Berikan Harga Yang sangat Terjangkau. Jadi jangan ragu lagi untuk segera beli kak. Terima Kasih.<br />\r\n<br />\r\nSpesifikasi Produk :<br />\r\n-Model Sepatu/Sandal&nbsp;&nbsp; &nbsp;: Sneakers Tali<br />\r\n-Tinggi Sole&nbsp; : 3 cm<br />\r\n-Berat Produk : 550 gram<br />\r\n-Packing Produk&nbsp; : Plastik', 24, 1, 'a5185267a181d4d42dae9ca7db8a45d1.jpg'),
(4, 'OPPO Hot 20 5G 4/128 -MediaTek Dimensity 810- 4/128', 7, 'Putih', '', 2249000, 500, '<ul>\r\n	<li>OPERATING SYSTEM Android&trade; 12</li>\r\n	<li>DISPLAY 6.6</li>\r\n	<li>FHD+ 120HZ FULLSCREEN</li>\r\n	<li>PROCESSOR MediaTek Dimensity 810</li>\r\n	<li>BATTERY 5000mAh</li>\r\n</ul>\r\n', 20, 0, 'fa3f80c23ae0c98b453e134e2b9d701f.jpg'),
(5, 'Xiaomi Redmi Note 5 Smartphone [4 GB/ 64 GB/ Resmi TAM]', 7, 'Hitam', '', 2690000, 550, '<ol>\r\n	<li>OS : Android 7.1.2</li>\r\n	<li>Prosesor : Snapdragon 636, octa-core</li>\r\n	<li>Kamera : Utama dual 12MP+5MP dan kamera sekunder 13 MP</li>\r\n	<li>Layar : 5.99 Inch</li>\r\n	<li>Baterai : Li-Po 4000 mAh</li>\r\n</ol>\r\n', 15, 0, '0b06fa50f7546cc50ba8d0ab1abc52df.jpg'),
(6, 'Polytron Kulkas SJ-X165MG Shine Magneglas Series Red', 10, 'Abu abu', 'Besar', 2316000, 24000, 'Body Color Gray with Geometric pattern blue/red magneglas steel plate<br />\r\nCooling System Direct Cooling<br />\r\nRefrigerant (NON CFC) R-134a<br />\r\nDefrosting Semi Automatic<br />\r\nCAPACITY<br />\r\nCapacity (Gross / Netto) 133 Liter / 128 Liter<br />\r\nRefrigerator (Gross / Netto) 113 Liter / 109 Liter<br />\r\nFreezer (Gross / Netto) 20 Liter / 19 Liter<br />\r\nPOWER<br />\r\nSource 220 - 240 Volt<br />\r\nConsumption 84 Watt<br />\r\nDIMENSION (W X H X D)<br />\r\nWidth 535 mm<br />\r\nHeight 977 mm<br />\r\nDepth 575 mm<br />\r\nNET WEIGHT<br />\r\nWeight nett : 24 kg', 10, 0, 'f7c61c19f260086b93996da2216dd4e2.jpg'),
(7, 'SETRIKA MIYAKO OTOMATIS STAINLESS / GOSOKAN BAJU', 10, 'Ungu', '', 869000, 1200, 'SETRIKA STAINLESS DAN PLASTIK<br />\r\n<br />\r\nPLASTIK MERK Miyako<br />\r\nPANAS HANYA DALAM 1 MENIT<br />\r\nDAYA 300 WATT<br />\r\nOTOMATIS SHUT OFF BILA PANAS &nbsp;BERLEBIH JADI TIDAK PERLU KHAWATIR&nbsp;<br />\r\nBAHAN STAINLESS DAN ANTI LENGKET.', 20, 0, '535d00119efbcf91d55a72de225ba2ed.jpg'),
(8, 'Kipas Angin Meja Listrik 8 Inch Asli Arashi ( Bisa Putar Kiri Kanan)', 10, 'Biru', '', 673000, 3000, '* Tegangan rendah Dan hemat daya.<br />\r\n* 3 buah daun kipas.<br />\r\n* Tiupan angin kuat.<br />\r\n* Berdaya listrik 25 watt pd tegangan. 220v/50 Hz.<br />\r\n* Memiliki diameter lingkaran kipas 8 inch.<br />\r\n* Awet Dan tidak gampang rusak.', 14, 1, '4c7bf8ec2a0b093d891ccaf573b324b7.jpg'),
(9, 'TEKO LISTRIK SCARLETT 2 LITER HIGH QUALITY/TEKO PEMANAS AIR/TEKO LISTRIK MURAH/ALAT PEMANAS AIR/PEMA', 10, 'Hitam', '', 578000, 1000, 'Kategori produk: Elektronik<br />\r\nBahan: Stainless Steel<br />\r\nKecepatan Pemanasan: 4-6 menit<br />\r\nMetode Pemanasan: Pemanasan underpant<br />\r\nMatikan otomatis: Ya<br />\r\nKapasitas: 2 Liter<br />\r\nFitur: Basis Rotasi 360 Derajat<br />\r\nFitur: Perlindungan Anti-kering<br />\r\nDaya: 220V/50 hz<br />\r\nWatt : 500W<br />\r\nMode operasi: Jenis tombol<br />\r\nMetode pemanasan: Pemanasan sasis', 9, 1, 'dba52d396aea54e3cbd46433c6f2350c.jpg'),
(11, 'Super Hand Mixer, Pengaduk 7 Kecepatan Otomatis - Free 4 Buah Alat Pengocok / Mixer RANDOM des:misal', 10, 'Hijau', '', 762000, 2000, 'Dengan bodi yang ringkas dan pegangan ergonomis akan mendukung penggunaan yang nyaman dan cengkeraman&nbsp;<br />\r\nyang nyaman. Dilengkapi 2 jenis pengaduk stainless steel sangat tahan lama dan tidak mudah berkarat<br />\r\nseiring waktu. Mesin Mixer dilengkapi motor tembaga memberikan efisiensi tinggi dalam mengaduk adonan.<br />\r\nTidak hanya itu, ventilasi udara depan dan belakang memudahkan pembuangan panas selama durasi pakai yang lama.&nbsp;<br />\r\n<br />\r\n7 saklar posisi kecepatan :&nbsp;<br />\r\n0 posisi: mati&nbsp;<br />\r\n1 ~ 2 posisi-lambat: ini adalah kecepatan awal yang baik untuk makanan curah dan kering seperti tepung, mentega dan kentang hancur<br />\r\n3 ~ 4 posisi -Kecepatan rendah: kecepatan terbaik untuk memulai mengaduk bahan cair (liquid) dan untuk mencampur dressing salad<br />\r\n5 posisi - Kecepatan sedang : kecepatan terbaik untuk memulai mengaduk kue dan membuat adonan tepung roti<br />\r\n6 posisi - Kecepatan tinggi : untuk mengaduk mentega dan gula, adonan permen, adonan kue<br />\r\n7 posisi - Kecepatan sangat tinggi : untuk telur kocok, membuat icing, whipping potato, whipping cream<br />\r\n<br />\r\nBahan: Body terbuat dari plastik abs&nbsp;<br />\r\nWarna: putih campur hitam&nbsp;<br />\r\nDaya: 120-220 W&nbsp;<br />\r\nTegangan: 220-240 V&nbsp;<br />\r\nDimensi: Produk - 17.5 cm panjang x 12.5 cm tinggi x panjang kabel 48 cm<br />\r\nAksesoris Produk - panjang 16 cm x tebal besi 0.5 cm&nbsp;<br />\r\nKemasan - 18.5 cm x 15.5 cm x 7.5 cm', 9, 1, 'cae68017bf9fcb38e42b4a475f1f16ce.jpg'),
(12, 'Sanken1.8L Digital Rice Cooker HD4515/33 - 400Watt, 8 Menu, White, putih, mejikom multi fungsi', 10, 'Abu abu', 'Besar', 956000, 3200, '- Tetap hangat 12 jam&nbsp;<br />\r\n- Tutup bagian dalam lepas-pasang untuk memudahkan pembersihan&nbsp;<br />\r\n- Layar digital besar memudahkan pembacaan menu dan waktu&nbsp;<br />\r\n- Mengatur suhu pemanasan dengan cerdas untuk berbagai program<br />\r\n- Tidak ada fitur low sugar', 14, 1, '9389eb05e4ad849c909d4cd4d8f9b04e.jpg'),
(14, 'Airbot Supersonics Cordless Vacuum Cleaner Penyedot Debu Tanpa Kabel Vakum Vacum', 10, 'Merah', '', 1029000, 5000, 'Motor BLDC 19000Pa terbaru menghasilkan daya vakum yang konsisten. Penghalang pembatalan kebisingan 5-lapis kerucut atas. Desain genggam baru yang lebih ringan dengan lampu LED pintar, melaporkan tingkat baterai waktu nyata.<br />\r\n<br />\r\nDesain genggam ramping yang baru, 1,2KG, ringan, pegangan lebih nyaman,<br />\r\n<br />\r\nLED pintar teratas, Status baterai umpan balik waktu nyata, mengetahui waktu pengisian yang tepat,<br />\r\n<br />\r\nDesain cangkir debu yang baru, meluncur mulus untuk mengunci atau membuka kunci, pemasangan yang mudah, teknologi siklon, generasi ke-3 terbaru,<br />\r\n<br />\r\n&nbsp;kompresi debu / rambut yang cepat, mengeluarkan udara yang lebih bersih.<br />\r\n<br />\r\nKerucut peredam kebisingan teratas, kebisingan motor nada tinggi yang lebih rendah selama pembersihan.<br />\r\n<br />\r\nMotor BLDC yang ditingkatkan, Output daya vakum yang konsisten<br />\r\n<br />\r\nFilter HEPA E-grade, desain melingkar berukuran lebih tinggi untuk penyaringan debu mikro yang lebih baik<br />\r\n<br />\r\nCangkir debu, siklon, sikat berbulu semuanya bisa dicuci dan digunakan kembali<br />\r\n<br />\r\n5 lapisan peredam kebisingan, tidak ada suara motor picth tinggi<br />\r\n<br />\r\nDaya hisap maksimum 19000Pa<br />\r\n<br />\r\nWaktu pengoperasian maksimum 45 menit dalam Mode Eco<br />\r\n<br />\r\nKecepatan ganda, Eco/Max, tekan tombol dan lepaskan, tidak perlu terus menekan', 20, 0, '2485103219cdfbbca3c7c66ac070b005.jpg'),
(15, 'Lenovo IdeaPad 3 15IGL05 (81WQ00NWYA)', 6, 'Abu abu', 'Sedang', 6950000, 1500, '<ul>\r\n	<li>Processor : Intel Core i3-1005G1 CPU @ 1.20GHz &nbsp; 1.19 GHz</li>\r\n	<li>Storage : HDD 1TB</li>\r\n	<li>RAM :&nbsp; 4GB</li>\r\n	<li>OS : Windows 10 64 bit Education</li>\r\n</ul>\r\n', 9, 1, '895938952520b4c114515d19e9fae0ec.jpg'),
(16, 'HP 240 GB 15 inch Business Laptop', 6, 'Hitam', 'Sedang', 5800000, 1700, '', 14, 1, '48f3c612e4be7c32b809d7f305a69e9f.jpg'),
(17, 'Jam Tangan Pria Dual Time Original SKMEI AD15863', 2, 'Hijau', '', 105000, 200, 'Jam Tangan Pria Dual Time Original SKMEISport LED watch original&nbsp;AD15863.', 10, 0, '15d4b5d36e85c3f483bb2b856b796252.jpg'),
(18, 'Jam Tangan Kasual Pria Milanese Strap', 2, 'Hitam', '', 256000, 200, '<ul>\r\n	<li>Tipe : analog</li>\r\n	<li>Movement : QUARTZ Movement</li>\r\n	<li>Diameter Jam : 44&nbsp;mm</li>\r\n	<li>Tebal : 7mm</li>\r\n	<li>Panjang Strap : 240 mm</li>\r\n	<li>Lebar Strap : 23 mm</li>\r\n</ul>\r\n', 10, 0, '4f0bafab501a32b2ca2660e26856dc0b.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `varian`
--

CREATE TABLE `varian` (
  `id_varian` bigint(20) NOT NULL,
  `id_produk` bigint(20) NOT NULL,
  `warna` varchar(50) NOT NULL,
  `ukuran` varchar(50) NOT NULL,
  `harga` bigint(20) NOT NULL,
  `berat` bigint(20) NOT NULL,
  `stok` bigint(20) NOT NULL,
  `terjual` bigint(20) NOT NULL,
  `gambar_varian` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `varian`
--

INSERT INTO `varian` (`id_varian`, `id_produk`, `warna`, `ukuran`, `harga`, `berat`, `stok`, `terjual`, `gambar_varian`) VALUES
(4, 1, 'Hitam', 'Sedang', 1500000, 4000, 10, 0, 'bcdf2ab36246ec3a972c76e76c891c12.jpg'),
(5, 6, 'Merah maroon', 'Kecil', 1832000, 16000, 14, 1, '7cd68a6bfd521a356eeb4d3c5bb09c43.jpg'),
(6, 6, 'Abu abu', 'Kecil', 1785000, 15500, 10, 0, '5dc7be05b08a9ee6406f4d009158ded7.jpg'),
(7, 5, 'Putih', '', 2559000, 540, 15, 0, '98fdcefb9dde388b7542a2995ac760a1.jpg'),
(8, 2, 'Hitam', '38', 120000, 980, 10, 0, '3e2401fd329dad158138eb213cec2ae7.jpg'),
(9, 7, 'Biru Muda', '', 858000, 1100, 13, 2, '6492aa94da9d3b23516ede508c3677a5.jpg'),
(10, 7, 'Biru', '', 866000, 1200, 10, 0, 'd53ef3dcddb479922520e394e26276c0.jpg'),
(11, 8, 'Kuning', '', 675000, 3000, 20, 0, '6853ca90f4807b6ad8684edfa3fdca20.jpg'),
(12, 12, 'Biru', 'Kecil', 658000, 2000, 10, 0, '9cb548c7e44ad87639cc9eb218a4fed7.jpg'),
(13, 12, 'Hitam', 'Kecil', 648000, 2000, 15, 0, '20c4fcace3dcaa6ec8a7ade35a933520.jpg'),
(14, 4, 'Hitam', '', 2200000, 500, 9, 1, '224d830eca0e6b15f3fb60ef71b171b4.jpg'),
(15, 4, 'Abu abu', '', 2235000, 600, 15, 0, 'ad228a8184a8cb875bb8119f779a18d3.jpg'),
(16, 9, 'Biru', 'Kecil', 380000, 500, 20, 0, '1a75bceb6d65188a44285160b3f013bc.jpg'),
(17, 9, 'Hitam-Putih', 'Besar', 591000, 1000, 25, 0, '06e6cf475f297890a6602e8fa489b1b7.jpg'),
(18, 11, 'Merah', '', 758000, 2000, 15, 0, 'b6e01242dbbf908a0d26e1acfd095d6b.jpg'),
(19, 11, 'Abu abu', '', 765000, 2000, 10, 0, 'a275180892dd6f39d9a6e8074d60494d.jpg'),
(20, 16, 'Putih', 'Sedang', 5799000, 1650, 10, 0, 'a0aafd17567ededf15410a3719b76ceb.jpg'),
(21, 15, 'Hitam', 'Sedang', 7100000, 1400, 15, 0, 'b5b711597cad35c04b9987fc8b88c8e5.jpg'),
(22, 17, 'Cokelat', '', 108000, 250, 14, 1, 'a11fc585d245416631d3ca84d99497a8.jpg'),
(23, 17, 'Biru', '', 110000, 200, 20, 0, 'f3b0bfb480a0f127cffece6ca5204094.jpg'),
(24, 17, 'Hitam', '', 120000, 200, 20, 0, '736e9a6b980c9e562bd8c4af8a2c2a8d.jpg'),
(25, 18, 'Silver', '', 260000, 240, 25, 0, 'fbf4e81e73c19577456262c9ff09d377.jpg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `detail_pembelian`
--
ALTER TABLE `detail_pembelian`
  ADD PRIMARY KEY (`id_detail_pembelian`),
  ADD KEY `fk_pembelian_detail_pembelian` (`id_pembelian`),
  ADD KEY `fk_produk_detail_pembelian` (`id_produk`),
  ADD KEY `fk_varian_detail_pembelian` (`id_varian`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indeks untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`),
  ADD KEY `fk_pelanggan_pembelian` (`id_pelanggan`);

--
-- Indeks untuk tabel `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD KEY `fk_kategori_produk` (`id_kategori`);

--
-- Indeks untuk tabel `varian`
--
ALTER TABLE `varian`
  ADD PRIMARY KEY (`id_varian`),
  ADD KEY `fk_produk_varian` (`id_produk`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `detail_pembelian`
--
ALTER TABLE `detail_pembelian`
  MODIFY `id_detail_pembelian` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `varian`
--
ALTER TABLE `varian`
  MODIFY `id_varian` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `detail_pembelian`
--
ALTER TABLE `detail_pembelian`
  ADD CONSTRAINT `fk_pembelian_detail_pembelian` FOREIGN KEY (`id_pembelian`) REFERENCES `pembelian` (`id_pembelian`),
  ADD CONSTRAINT `fk_produk_detail_pembelian` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`),
  ADD CONSTRAINT `fk_varian_detail_pembelian` FOREIGN KEY (`id_varian`) REFERENCES `varian` (`id_varian`);

--
-- Ketidakleluasaan untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  ADD CONSTRAINT `fk_pelanggan_pembelian` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`);

--
-- Ketidakleluasaan untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `fk_kategori_produk` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`);

--
-- Ketidakleluasaan untuk tabel `varian`
--
ALTER TABLE `varian`
  ADD CONSTRAINT `fk_produk_varian` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
