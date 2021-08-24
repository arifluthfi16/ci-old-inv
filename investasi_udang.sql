-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Okt 2020 pada 19.32
-- Versi server: 10.1.36-MariaDB
-- Versi PHP: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `investasi_udang`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `hak_akses` enum('admin') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `nama`, `username`, `password`, `email`, `hak_akses`) VALUES
(13, 'administrator', 'admin', '$2y$12$klnQ74twkapYDJwLM/dZTex4JsK5VZNrrj8svIeJpiuQFO/0aBYZ6', 'admin@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `crowdfunding`
--

CREATE TABLE `crowdfunding` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `need` bigint(20) NOT NULL,
  `earn` bigint(20) NOT NULL,
  `desc` text NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `active_now` smallint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `crowdfunding`
--

INSERT INTO `crowdfunding` (`id`, `title`, `need`, `earn`, `desc`, `date_created`, `active_now`) VALUES
(2, 'Investasi tambak udang vaname batch 1 sukabumi', 5500000000, 600000000, 'Crowdfunding tambak udang vaname batch 1 berlokasi di pesisir pantai pelabuhan ratu sukabumi', '2020-08-28 08:37:27', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `faq`
--

CREATE TABLE `faq` (
  `id` int(11) NOT NULL,
  `pertanyaan` varchar(255) NOT NULL,
  `jawaban` text NOT NULL,
  `count` int(11) NOT NULL,
  `kategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `faq`
--

INSERT INTO `faq` (`id`, `pertanyaan`, `jawaban`, `count`, `kategori`) VALUES
(1, 'Kenapa Harus Investasi Udang?', '', 3000, 'keuangan'),
(2, 'Kenapa Modal Infrastruktur & Budidaya Udang Mahal?', '<p>Memerlukan Spesifikasi Teknologi Tinggi</p><p>Arsitektur Tambak Udang</p><p>Asitektur Kolam</p><p>Kelistrikan</p><p>Water Treatment</p><p>Instalasi Pengolahan Limbah (Waste Management)</p><p>Laboraturium Teknologi (Chemical, Physical, Biological, Disease)</p>', 3000, 'keuangan'),
(3, 'Program Investasi PT Bakti Udang Indonesia?', '<p><strong>Model Pemodalan</strong></p><p style=\"padding-left: 30px;\">1. Crowdfunding</p><p style=\"padding-left: 60px;\">1 Hektar Biaya 7 Milyar</p><p style=\"padding-left: 60px;\">2 Hektar Biaya 14 Milyar</p><p style=\"padding-left: 30px;\">2. Full Investment</p><p style=\"padding-left: 60px;\">1 Hektar Biaya 7 Milyar</p><p style=\"padding-left: 60px;\">2 Hektar Biaya 14 Milyar</p><p><strong>Logika Investor</strong></p><p>Ownership (51:49) Non-Ownership (Berapa lama? 4 tahun )</p><p><strong>Proses bagi hasil dilakukan 1-3 hari oleh pengelola ke rekening investor.</strong></p>', 3000, 'keuangan'),
(4, 'Berapa Modal Minimum & maksimum investasi Budidaya Udang?', '', 3000, 'keuangan'),
(5, 'Seberapa besar keuntungan Budidaya Udang?', '', 3000, 'keuangan'),
(6, 'Proses Pencairan Keuntungan Budidaya Udang?', '', 3000, 'keuangan'),
(7, 'Pusat dan Proses Publikasi Transaparansi Keuangan?', '', 3000, 'keuangan'),
(8, 'Lama waktu investasi?', '', 3000, 'keuangan'),
(9, 'Bagaimana mekanisme reinvestasi?', '', 3000, 'keuangan'),
(10, 'Skema Penarikan dana investasi sebelum jatuh tempo?', '', 3000, 'keuangan'),
(11, 'Kenapa bisa bagi hasil 20 % per tahun?', '', 3000, 'keuangan'),
(12, 'Apa saja faktor / penyakit yang menyerang udang?', '<p>WFD (berak putih); IMNV (virus Myo); WSSV (virus white spot); Taura; EMS (early mortality syndrome); HPND. Munculnya penyakit ini karena :</p><p>a. Perubahan cuaca (hujan; kemarau; suhu air turun dibawah 26°C; ombak besar dilaut) </p><p>b. Kualitas benur sedang turun</p><p>c. Kualitas pakan udang sdg kurang baik</p><p>d. Muncul penyakit2 udang yg baru </p><p>e. Kondisi N load yg tinggi ketika udang sedang masa2 pertumbuhan yg menghabiskan banyak pakan udang.</p><p>f. Konstruksi kolam yg tdk standard yg menyebabkan kotoran tdk terkumpul di central drain. Shg kotoran teraduk di kolom air yg menyebabkan air kolam jadi kotor.</p><p>Maka pencegahannya :</p><p>a. Pengadaan watertreatment (tandon air) sebelum air masuk ke kolam budidaya utk antisipasi air laut sdg buruk ktk ada gelombang laut yg tinggi</p><p>b. Utk mencegah timbulnya penyakit2 udang  maka : Penjagaan pH antara 7,6 -- 8,0 (dg menjaga kesetimbangan jumlah plankton dan bakteri)  shg ketimbangan kimiawi; fisikawi dan biologi air tambak bisa terjaga dg baik. Maka kita menggunakan Mineral MSO yg aplikasi waktunya disesuaikan dg kondisi air tambak. Shg hidup udang akan nyaman dan pertumbuhan bisa maksimal. </p><p>c. Utk mengurangi N load (pencemaran air) digunakan aplikasi bakteri Bacillus + Mineral MSO.  Shg kondisi airnya bisa dalam batas aman utk budidaya udang</p><p>d. Tidak digunakannya bahan2 kimiawi berbaya (kaporit; tcca; destan dll) dapat mencegah timbulnya penyakit2 baru karena adanya mutasi gen. </p><p>e. Digunakannya IPAL (water treatment) utk menjaga perairan laut bisa tetap green zone. f. Bahkan dg digunakannya sistem MSO kami bisa dihasilkan dari limbah air tambak kami berupa : bakteri2 baik (bakteri buruk sedikit) dan plankton2 baik shg bisa menambah kesuburan ekosistem peraiaran Laut di sekitar lokasi tambak. Akibatnya penyakit2 udang akan dapat dikurangi jumlah dan jenisnya diperairan laut. Dg kata lain bisa menciptakan Green Ekosistem Perairan Laut. </p><p>6. Penjarahan tambak bisa dicegah dg melakukan pendekatan ke masyarakat sekitar dg cara :</p><p>a. Memperkerjakan orang lokal utk mengisi pekerjaan di tambak. Dg cara mendidik SDM sampai mereka menjadi cukup baik. </p><p>b. Memperkerjakan orang lokal dalam pembersihan kolam tambak setelah panen total.</p><p>c. CSR dari hasil keuntungan sepenuhnya disalurkan utk kesejahteraan masyarakat di sekitar tambak. </p>', 3000, 'budidaya'),
(13, 'Desinfektan apa yang digunakan?', 'Sterilisasi dan Desinfektan tdk menggunakan bahan2 kimia berbahaya (spt kaporit/tcca/destan dll). Digantikan dg bahan CaO dg kadar 300--500 ppm. Shg tidak mencemari lingkungan dan menyebabkan mutasi bakteri dan virus  penyakit udang.', 3000, 'budidaya'),
(14, 'Probiotik apa saja yang digunakan?', '<p> - Bakteri Bacillus dari merk Aquazime (Taiwan)</p><p> - Bakteri Rhodobacter dari merk PT. SHS </p><p> - Bakteri pengurai Lumpur dari merk PT. Biotrent</p><p> - Bakteri Bacillus dan Enzyme utk Hepato Pancreas udang dari produk MSO </p><p> - Mineralisasi memakai produk MSO dan Vineral</p>', 3000, 'budidaya'),
(15, 'Menggukaan apa saja pakan udangnya?', 'Beli Pakan Udang yg terbaik merk Samsung', 3000, 'budidaya'),
(16, 'Dimana Beli Bibit yg terbaik?', '<p>Benur Ayen (PT. Prima Larvae) dari Lampung Barat.<p></p>PT. STP (Suri Tani Pemuka) dari Anyer (Banten)</p>', 3000, 'budidaya'),
(17, 'Bagai mana cara mencegah pencurian?', '<p>a. Memberikan gaji kpd karyawan dg layak (UMR Lokal) dan memberikan bonus atas keberhasilan panen sebesar 6--8%. Disesuaikan dg hasil panen dan profit budidayanya. </p><p>b. Mencegah tindakan sabotase masyarakat dg cara :</p><p> -  Melakukan pendekatan personal kpd para tokoh masyarakat; Ormas dan LSM setempat.</p><p> - Ikut berpartisipasi dalam kegiatan sosial kemasyarakatan dan pembangunan lingkungan (penyediaan sumur bor air bersih; penjagaan kebersihan pantai dll )</p>', 3000, 'keamanan'),
(18, 'Teknologi apa saja yang dipakai?', '<p>a. Menggunakan bahan2 yg ramah lingkungan</p><p>b. Penggunaan probiotik yg kita buat sendiri utk menjaga kualitas tetap prima</p><p>c. Sistem Probiotik (sistem instan)  yg kita ciptakan utk mempermudah aplikasi di dalam budidaya udang. Shg pekerja dapat dg mudah dalam menjalankan SOP MSO kami.</p><p>d. Teknologi Sistem MSO kami sudah dapat utk menjaga :</p><p># Kesetimbangan Plankton dan Bakteri shg dapat menjaga range pH antara 7,6 -- 8,0. Shg yg tumbuh adalah Plankton dan Bakteri baik yg menguntungkan sistem budidaya. </p><p># Menjaga sistem imunitas udang krn dapat menjaga sistem kesetimbang</p>', 3000, 'budidaya');

-- --------------------------------------------------------

--
-- Struktur dari tabel `investor`
--

CREATE TABLE `investor` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `fund` bigint(20) NOT NULL,
  `crowdfund_id` int(11) NOT NULL,
  `time_submited` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `investor`
--

INSERT INTO `investor` (`id`, `user_id`, `fund`, `crowdfund_id`, `time_submited`) VALUES
(5, 4, 10000000, 2, '2020-08-28 12:46:29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `google_id` varchar(255) DEFAULT NULL,
  `display_pict` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `phone_number` varchar(18) DEFAULT NULL,
  `identity_image` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `verified` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `google_id`, `display_pict`, `name`, `email`, `phone_number`, `identity_image`, `password`, `verified`) VALUES
(3, '107796070054756997595', 'https://lh3.googleusercontent.com/-QH9UaihLioE/AAAAAAAAAAI/AAAAAAAAAAA/AMZuucmZ6PP2fHDowX4eyxz6NPcIi139YQ/photo.jpg', 'yuma yusuf', 'yumayusuf@gmail.com', '081313190101', '7995837298c0423266d24da621ee3d0b.jpg', NULL, 0),
(4, '117590447095928393061', 'https://lh3.googleusercontent.com/a-/AOh14GiropXzYMs_ceQ5alFo96QcC06gY0KOQ406HicMYg', 'Yumavol', 'yumavol@gmail.com', '08112342067', 'd0898bc81947f2741eada8a94924db70.jpg', NULL, 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `crowdfunding`
--
ALTER TABLE `crowdfunding`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `investor`
--
ALTER TABLE `investor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `crowdfunding`
--
ALTER TABLE `crowdfunding`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `faq`
--
ALTER TABLE `faq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `investor`
--
ALTER TABLE `investor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
