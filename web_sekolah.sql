-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 09 Jan 2024 pada 16.53
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `app_kelurahan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `artikel`
--

CREATE TABLE `artikel` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL,
  `is_published` int(11) NOT NULL,
  `file` varchar(256) NOT NULL,
  `jenis_artikel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `artikel`
--

INSERT INTO `artikel` (`id`, `judul`, `isi`, `created_at`, `created_by`, `is_published`, `file`, `jenis_artikel`) VALUES
(2, 'Ekstrakulikuler Basket', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>\r\n<p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>\r\n<p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '2024-01-01 15:57:28', 1, 1, 'basket.jpeg', 1),
(3, 'Ekstrakulikuler Pramuka', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '2023-12-17 15:57:46', 1, 1, 'pramuka.jpeg', 2),
(4, 'Ekstrakulikuler Memanah', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2023-09-03 15:58:03', 1, 1, 'memanah.jpeg', 2),
(5, 'Ekstrakulikuler Programming', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2023-05-17 15:58:18', 1, 1, 'programming.jpeg', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `field_persyaratan`
--

CREATE TABLE `field_persyaratan` (
  `id` int(11) NOT NULL,
  `nama_field` varchar(100) NOT NULL,
  `code` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `field_persyaratan`
--

INSERT INTO `field_persyaratan` (`id`, `nama_field`, `code`) VALUES
(1, 'Nama Pemohon', 'nama_pemohon'),
(2, 'TTL', 'ttl'),
(3, 'Alamat', 'alamat'),
(4, 'Nomor HP', 'nomor_hp'),
(5, 'Nomor Identitas Kependudukan', 'nik'),
(6, 'Nomor Kartu Keluarga', 'no_kk'),
(7, 'Tanggal Kematian', 'tanggal_kematian'),
(8, 'Pengantar RT', 'pengantar_rt'),
(9, 'Kartu Keluarga', 'kk'),
(10, 'Kartu Tanda Penduduk', 'ktp'),
(11, 'Bukti Lunas PPB', 'bukti_ppb'),
(12, 'Izin Tetangga', 'izin_tetangga'),
(13, 'Keterangan Kematian', 'keterangan_kematian'),
(14, 'Pernyataan Pemohon', 'pernyataan_pemohon'),
(15, 'Foto Surat Tanah', 'surat_tanah'),
(16, 'Surat Cerai', 'surat_cerai'),
(17, 'Keterangan Surat Pindah dari Capil', 'surat_pindah'),
(18, 'Kartu Keluarga Seluruh Ahli Waris', 'kk_ahli_waris'),
(19, 'Buku Nikah', 'buku_nikah');

-- --------------------------------------------------------

--
-- Struktur dari tabel `galeri`
--

CREATE TABLE `galeri` (
  `id` int(11) NOT NULL,
  `file` varchar(256) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `filter` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `galeri`
--

INSERT INTO `galeri` (`id`, `file`, `created_at`, `created_by`, `name`, `filter`) VALUES
(4, 'DSC_0069.jpeg', '2023-05-14 16:50:30', 1, 'Gambar 1', 'filter-internal'),
(5, 'images_-_2020-09-08T164150_808.jpeg', '2023-05-14 16:50:41', 1, 'Gambar 2', 'filter-internal'),
(6, 'maxresdefault.jpeg', '2023-05-14 16:50:47', 1, 'Gambar 3', 'filter-internal'),
(7, 'maxresdefault1.jpeg', '2023-05-14 16:50:54', 1, 'Gambar 4', 'filter-internal'),
(8, 'murid-smp.jpeg', '2023-05-14 16:51:01', 1, 'Gambar 5', 'filter-eksternal'),
(9, '1.jpeg', '2023-05-14 16:52:20', 1, 'Gambar 6', 'filter-eksternal');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_artikel`
--

CREATE TABLE `jenis_artikel` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `jenis_artikel`
--

INSERT INTO `jenis_artikel` (`id`, `nama`, `deskripsi`) VALUES
(1, 'Berita', 'Ini adalah jenis artikel berita'),
(2, 'Pengumuman', 'Ini adalah Jenis Artikel Pengumuman');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_konten`
--

CREATE TABLE `jenis_konten` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `jenis_konten`
--

INSERT INTO `jenis_konten` (`id`, `nama`, `deskripsi`) VALUES
(1, 'Visi dan Misi', 'Ini adalah jenis konten utk kategori visi dan misi sekolah'),
(2, 'Struktur Organisasi', 'Ini adalah jenis konten utk kategori struktur organisasi sekolah'),
(3, 'Tentang', 'Ini adalah jenis konten utk kategori profile dan sejarah sekolah'),
(6, 'Sejarah', 'Ini adalah Jenis Konten Sejarah');

-- --------------------------------------------------------

--
-- Struktur dari tabel `konten`
--

CREATE TABLE `konten` (
  `id` int(11) NOT NULL,
  `jenis_konten` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL,
  `is_published` int(11) NOT NULL,
  `file` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `konten`
--

INSERT INTO `konten` (`id`, `jenis_konten`, `judul`, `isi`, `created_at`, `created_by`, `is_published`, `file`) VALUES
(10, 3, 'Profil Sekolah SMP Negeri 37 OKU', 'Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non mauris vitae erat cauctor eu in elit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per Mauris in erat justo.\r\n\r\n\r\nNullam ac urna eu felis dapibus condimentum sit amet a augue. Sed non neque elit. Sed ut imperdiet nisi. Proin condimentum fermentum nunc. Etiam pharetra, erat sed.\r\n\r\n\r\nNam nec tellus a odio tincidunt auctor a ornare odio. Sed non mauris vitae erat cauctor eu in elit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per Mauris in erat justo.', '2023-05-11 11:37:22', 1, 1, 'smp.jpg'),
(11, 1, 'Visi dan Misi SMP N 37 OKU', '<p><strong>V I S I </strong></p>\r\n<p>Menciptakan Insan Berprestasi, Berbudaya dan Bertaqwa</p>\r\n<p><strong>M I S I</strong></p>\r\n<ol>\r\n<li>Menjalankan nilai nilai agama dan Berperilaku akhlakul Karimah Dalam Kehidupan Sehari Hari.</li>\r\n<li>Melaksanakan Pembelajaran Aktif, kreatif, efektif dan Menyenangkan untuk Mengembangkan potensi peserta Didik.</li>\r\n<li>Menumbuhkan semangat Berprestasi Kepada Keseluruh Warga Sekolah.</li>\r\n<li>Membimbing dan Mengembangkan Bakat Dan Minat Peserta Didik.</li>\r\n<li>Terlaksananya Program Ekstrakulikuler untuk menghasilkan siswa yang Berprestasi dan Bermanfaat bagi Kehidupan Sehari Hari.</li>\r\n<li>Menerapkan Manajemen Berbasis Sekolah Yang Partisifatif Dengan Melibatkan Seluruh Warga Sekolah.</li>\r\n<li>Mengembangkan Hasil Karya Yang dimiliki Peserta Dididk.</li>\r\n<li>Meningkatkan Kesadaran Untuk Memelihara Lingkungan.</li>\r\n</ol>', '2023-05-11 11:40:07', 1, 1, '692115417.jpg'),
(12, 2, 'Struktur Organisasi SMP Negeri 37 OKU', 'Lorem issum', '2023-05-11 11:54:09', 1, 1, 'org8.jpg'),
(13, 6, 'Sejarah Kelurahan Talang Kelapa', '<p>Pada zaman penjajahan kawasan Kecamatan Talang Kelapa tercatat wilayahnya dikendalikan 3 marga besar, yakni, Gasing, Kenten dan Tanjung Lago. Seiring masa kemerdekaan maka kendali pimpinan kawasan dari marga diubah menjadi kecamatan.</p>\r\n<p>Awalnya Kecamatan Talang Kelapa adalah bagian dari Kabupaten Musi Banyuasin Banyuasin, wilayahnya mencakup kawasan Talang Kelapa, Tanjung Lago, dan sembilan kelurahan yang sekarang ada di wilayah kota Palembang, yakni Kelurahan Talang Betutu, Alang Alang Lebar, Srijaya, Sukamaju, Sako, Sukarame, Talang Jambi, Talang Kelapa. Sebelum dimekarkan beberapa kawasan Kecamatan Induk Talang Kelapa tercatat memiliki 19 desa, dan pusat pemerintahan berada di Kelurahan Sukareme dimana sekarang masuk dalam wilayah Palembang.</p>\r\n<p>Pengambil alihan sembilan desa di wilayah Musi Banyuasin ke Kota Palembang sekitar tahun 1998, maka pusat pemerintahan Kecamatan dipindahkan pemerintah Kabupaten Muba ke kawasan Desa Sukajadi. Pada tahun 2002 Kabupaten Musi Banyuasin mulai dimekarkan menjadi Kabupaten Banyuasin, pada saat itu Kecamatan Talang Kelapa masuk bagian dari Kecamatan pemekaran Kabupaten Banyuasin.</p>\r\n<p>Di masa-masa awal pemekaran Kabupaten Banyuasin, seluruh kawasan Tanjung Lago. merupakan bagian dari Kecamatan Talang Kelapa. Namun pada pemerintahan Kabupaten Banyuasin, kecamatan ini dimekarkan dua wilayah, Kecamatan Talang Kelapa dan Kecamatan Tanjung Lago. Pasca pemekaran kecamatan Talang Kelapa, menyisahkan 7 wilayah desa dan kelurahan, yakni, Kelurahan Kenten, Desa Gasing, Kelurahan Sukajadi, Kelurahan Sukamoro, Kelurahn Air Batu, Desa Pangkalan Benteng dan Desa Sungai Rengit.</p>\r\n<p>Pada tahun 2007 Kecamatan Talang Kelapa sejumlah wilayah kelurahan dan desa di kecamatan ini mulai di mekarkan, yakni Kelurahan Kenten dimekarkan menjadi 3 wilayah, Kelurahan Talang Keramat, Desa Kenten Laut dan Kelurahan Kenten. Di bagian barat Kelurahan Sukajadi dimekarkan menjadi 3 wilayah, Kelurahan Tanah Mas, Desa Talang Buluh dan Kelurahan Sukajadi. Pemekaran terakhir pada 2009 yakni Desa Sungai Rengit menjadi dua wilayah, Sungai Rengit dan Sungai Rengit Murni. Dari jumlah pemekaran desa dan kelurahan yang dilakukan secara bertahap, maka total desa Kecamatan Talang Kelapa kini memiliki 12 desa dan kelurahan. Adapun jumlah Camat yang memimpin Kecamatan Talang Kelapa dari dulu sampai sekarang tercatat 7 camat, yakni. Drs Syaiful Anwar, Drs Alimin Bahri (era Muba) Drs Suherman Maksun (era peralihan) Drs Efendi Samsani, Drs Ambrizal, Hasmi S.Sos M.Si, Drs Yusrizal dan Sekarang Aminuddin,S.Pd.,S.IP.,MM.</p>\r\n<p>Kecamatan Talang Kelapa merupakan salah satu kecamatan di Kabupaten Banyuasin dengan luas 560,12 kilometer persegi dan berpenduduk sekitar 125.233 jiwa. Letak Kecamatan Talang Kelapa berbatasan langsung dengan enam kecamatan, sebelah utara berbatasan Kecamatan Tanjung Lago dan Sako Palembang, sebelah selatan Kecamatan Gandus Palembang, sebelah barat Kecamatan Sembawa, sebelah timur Kecamatan Sukarame dan Alang-Alang Lebar Palembang.</p>\r\n<p>Kecamatan Talang Kelapa terdiri atas 12 wilayah, yakni 6 Desa, Sungai Rengit, Sungai Rengit Murni, Gasing, Pangkalan Benteng, Talang Buluh, dan Kenten Laut, dan 6 wilayah kelurahan, Air Batu, Sukamoro, Sukajadi, Tanah Mas, Talang Keramat, Kenten.</p>\r\n<p>Pusat pemerintahan Kecamatan Talang Kelapa berada di Kelurahan Sukajadi, sedangkan titik keramaian berada di dua wilayah, Kelurahan Sukajadi dan Kelurahan Kenten, hal ini dikarenakan didua wilayah ini terdapat pusat pemukiman dan pertokoan, dan memiliki akses yang mudah seperti Jalang Palembang &ndash; Betung di Sukajadi dan Jalan Pangeran Ayin di Kelurahan Kenten. Kedua jalan ini langsung menuju kota Palembang.</p>\r\n<p>Kecamatan Talang Kelapa berada diperbatasan yang notabene menempel Palembang sehingga sebagian besarnya berbudaya dan berbahasa Palembang. Bahkan hampir tidak ditemui penduduk menggunakan khas dialek daerah Talang Kelapa, selain berbahasa Palembang. Kecamatan Talang Kelapa, yakni jalur urat nadi perekonomian perbatasan mulai dari kawasan Sukajadi ruas kilometer 13 sampai kilometer 20, Jalan Palembang &ndash; Betung. Adapun diwilayah Kenten &ndash; Palembang terdapat ruas Jalan Pangeran Ayin yang menghubungkan langsung dibagian wilayah kota Palembang, dan satu lagi kawasan yang baru berkembang, yakni wilayah Gasing yang merupakan kawasan industri di Jalan Poros Tanjung Api-Api.</p>\r\n<p>Kemajuan yang begitu cepat di Kecamatan Talang Kelapa, serta posisinya yang berada diperbatasan, sehingga wilayah ini menjadi kawasan kecamatan berpenduduk urban, dan kecamatan penyangga perkotaan. Cepatnya pembangunan disegala bidang dalam wilayah kecamatan ini,membuat Kecamatan Talang Kelapa Kabupaten Banyuasin dijuluki Kecamatan penyangga perbatasan kota Palembang yang berhasil dan sukses, memanfaatkan posisinya diperbatasan kota untuk mendongkrak kemajuan wilayahnya.</p>', '2024-01-09 13:00:43', 1, 1, 'Talang_Kelapa.jpeg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `layanan`
--

CREATE TABLE `layanan` (
  `id` int(11) NOT NULL,
  `nama_layanan` varchar(100) NOT NULL,
  `deskripsi_layanan` text NOT NULL,
  `is_active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `layanan`
--

INSERT INTO `layanan` (`id`, `nama_layanan`, `deskripsi_layanan`, `is_active`) VALUES
(1, 'Surat Keterangan Berobat', 'Surat Keterangan Berobat', 1),
(2, 'Surat Keterangan Belum Menikah', 'Surat Keterangan Belum Menikah', 1),
(3, 'Surat Keterangan Belum Punya Rumah', 'Surat Keterangan Belum Punya Rumah', 1),
(4, 'Surat Keterangan Tidak Mampu', 'Surat Keterangan Tidak Mampu', 1),
(5, 'Pengantar SKCK', 'Pengantar SKCK', 1),
(6, 'Pengantar SKBD', 'Pengantar SKBD', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `level`
--

CREATE TABLE `level` (
  `id_level` int(11) NOT NULL,
  `nama_level` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `level`
--

INSERT INTO `level` (`id_level`, `nama_level`) VALUES
(1, 'Admin'),
(2, 'Pimpinan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `persyaratan_layanan`
--

CREATE TABLE `persyaratan_layanan` (
  `id` int(11) NOT NULL,
  `id_layanan` int(11) NOT NULL,
  `id_persyaratan` int(11) NOT NULL,
  `is_mandatory` int(11) NOT NULL,
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `persyaratan_layanan`
--

INSERT INTO `persyaratan_layanan` (`id`, `id_layanan`, `id_persyaratan`, `is_mandatory`, `type`) VALUES
(1, 1, 1, 1, 1),
(2, 1, 2, 1, 1),
(3, 1, 5, 1, 1),
(4, 1, 6, 1, 1),
(5, 1, 3, 1, 1),
(6, 1, 4, 1, 1),
(7, 1, 9, 1, 2),
(8, 1, 8, 1, 2),
(9, 1, 11, 1, 2),
(11, 2, 1, 1, 1),
(12, 2, 2, 1, 1),
(13, 2, 5, 1, 1),
(14, 2, 6, 1, 1),
(15, 2, 3, 1, 1),
(16, 2, 4, 1, 1),
(17, 2, 9, 1, 2),
(18, 2, 8, 1, 2),
(19, 2, 11, 0, 2),
(20, 3, 1, 1, 1),
(21, 3, 2, 1, 1),
(22, 3, 5, 1, 1),
(23, 3, 6, 1, 1),
(24, 3, 3, 1, 1),
(25, 3, 4, 1, 1),
(26, 3, 9, 1, 2),
(27, 3, 8, 1, 2),
(28, 3, 11, 1, 2),
(29, 4, 1, 1, 1),
(30, 4, 2, 1, 1),
(31, 4, 5, 1, 1),
(32, 4, 6, 1, 1),
(33, 4, 3, 1, 1),
(34, 4, 4, 1, 1),
(35, 4, 9, 1, 2),
(36, 4, 8, 1, 2),
(37, 4, 11, 1, 2),
(38, 5, 1, 1, 1),
(39, 5, 2, 1, 1),
(40, 5, 5, 1, 1),
(41, 5, 6, 1, 1),
(42, 5, 3, 1, 1),
(43, 5, 4, 1, 1),
(44, 5, 9, 1, 2),
(45, 5, 8, 1, 2),
(46, 5, 11, 1, 2),
(47, 6, 1, 1, 1),
(48, 6, 2, 1, 1),
(49, 6, 5, 1, 1),
(50, 6, 6, 1, 1),
(51, 6, 3, 1, 1),
(52, 6, 4, 1, 1),
(53, 6, 9, 1, 2),
(54, 6, 8, 1, 2),
(55, 6, 11, 1, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nip` varchar(50) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `kontak` varchar(15) NOT NULL,
  `password` text NOT NULL,
  `last_login` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `level_user` int(11) NOT NULL,
  `original_pass` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nip`, `nama`, `kontak`, `password`, `last_login`, `level_user`, `original_pass`) VALUES
(1, '11111', 'Admin', '081299929922', '$2y$10$i6LAb9xDh4G.pgVZ.cGknOUtRiPvK5SAW8SeMvAnICqKvnejunsQS', '2024-01-09 07:21:25', 1, ''),
(2, '22222', 'Pimpinan', '082189299222', '$2y$10$bMYspn86xs5Syrp9uclhu.WnCGUm9ZOhq2QBKaS8fWZGsxQro3aoW', '2023-05-08 15:11:46', 2, '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `jenis_artikel` (`jenis_artikel`);

--
-- Indeks untuk tabel `field_persyaratan`
--
ALTER TABLE `field_persyaratan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `galeri`
--
ALTER TABLE `galeri`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created_by` (`created_by`);

--
-- Indeks untuk tabel `jenis_artikel`
--
ALTER TABLE `jenis_artikel`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jenis_konten`
--
ALTER TABLE `jenis_konten`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `konten`
--
ALTER TABLE `konten`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `jenis_konten` (`jenis_konten`);

--
-- Indeks untuk tabel `layanan`
--
ALTER TABLE `layanan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indeks untuk tabel `persyaratan_layanan`
--
ALTER TABLE `persyaratan_layanan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_layanan` (`id_layanan`),
  ADD KEY `id_persyaratan` (`id_persyaratan`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `nip` (`nip`),
  ADD KEY `level_user` (`level_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `artikel`
--
ALTER TABLE `artikel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `field_persyaratan`
--
ALTER TABLE `field_persyaratan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `galeri`
--
ALTER TABLE `galeri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `jenis_artikel`
--
ALTER TABLE `jenis_artikel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `jenis_konten`
--
ALTER TABLE `jenis_konten`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `konten`
--
ALTER TABLE `konten`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `layanan`
--
ALTER TABLE `layanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `level`
--
ALTER TABLE `level`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `persyaratan_layanan`
--
ALTER TABLE `persyaratan_layanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `artikel`
--
ALTER TABLE `artikel`
  ADD CONSTRAINT `artikel_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `artikel_ibfk_2` FOREIGN KEY (`jenis_artikel`) REFERENCES `jenis_artikel` (`id`);

--
-- Ketidakleluasaan untuk tabel `galeri`
--
ALTER TABLE `galeri`
  ADD CONSTRAINT `galeri_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `konten`
--
ALTER TABLE `konten`
  ADD CONSTRAINT `konten_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `konten_ibfk_2` FOREIGN KEY (`jenis_konten`) REFERENCES `jenis_konten` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `persyaratan_layanan`
--
ALTER TABLE `persyaratan_layanan`
  ADD CONSTRAINT `persyaratan_layanan_ibfk_1` FOREIGN KEY (`id_layanan`) REFERENCES `layanan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `persyaratan_layanan_ibfk_2` FOREIGN KEY (`id_persyaratan`) REFERENCES `field_persyaratan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`level_user`) REFERENCES `level` (`id_level`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
