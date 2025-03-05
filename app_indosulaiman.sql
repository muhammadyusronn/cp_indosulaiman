-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 05 Mar 2025 pada 16.31
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
-- Database: `app_indosulaiman`
--

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
(1, 'About Us', 'about us'),
(2, 'Visi', 'visi'),
(3, 'Misi', 'misi'),
(4, 'Motto', 'motto'),
(5, 'Project', 'Project'),
(6, 'Alamat', 'alamat'),
(7, 'Email', 'email'),
(8, 'Kontak', 'kontak'),
(9, 'Latitude', 'latitude'),
(10, 'Longtitude', 'longtitude');

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
(10, 3, 'Profil Kelurahan Talang Kelapa', '<p>Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non mauris vitae erat cauctor eu in elit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per Mauris in erat justo. Nullam ac urna eu felis dapibus condimentum sit amet a augue. Sed non neque elit. Sed ut imperdiet nisi. Proin condimentum fermentum nunc. Etiam pharetra, erat sed. Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non mauris vitae erat cauctor eu in elit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per Mauris in erat justo.</p>', '2023-05-11 11:37:22', 1, 1, 'smp.jpg'),
(11, 1, 'Tentang PT Indo Sulaiman Makmur', '<div>\r\n<div>\r\n<h3 class=\"column-title\">PT Indo Sulaiman Makmur</h3>\r\n</div>\r\n<div>\r\n<p>KAMI ADALAH PERUSAHAAN YANG BERGERAK DI BIDANG LEMBAGA PELATIHAN KERJA, JASA HUKUM DAN KETENAGAKERJAAN, RENOVASI, BANGUNAN RUMAH, GEDUNG INTERIOR, DAN SUPLIER ALAT TULIS KANTOR, DAN ALAT PEMADAM API RINGAN (APAR)</p>\r\n</div>\r\n<div>&nbsp;</div>\r\n</div>', '2023-05-11 11:40:07', 1, 1, 'logo.jpg'),
(12, 2, 'Struktur Organisasi Kelurahan Talang Kelapa', '<p>Lorem issum</p>', '2023-05-11 11:54:09', 1, 1, 'org8.jpg'),
(13, 4, 'Sejarah Kelurahan Talang Kelapa', '<p>Pada zaman penjajahan kawasan Kecamatan Talang Kelapa tercatat wilayahnya dikendalikan 3 marga besar, yakni, Gasing, Kenten dan Tanjung Lago. Seiring masa kemerdekaan maka kendali pimpinan kawasan dari marga diubah menjadi kecamatan.</p>\r\n<p>Awalnya Kecamatan Talang Kelapa adalah bagian dari Kabupaten Musi Banyuasin Banyuasin, wilayahnya mencakup kawasan Talang Kelapa, Tanjung Lago, dan sembilan kelurahan yang sekarang ada di wilayah kota Palembang, yakni Kelurahan Talang Betutu, Alang Alang Lebar, Srijaya, Sukamaju, Sako, Sukarame, Talang Jambi, Talang Kelapa. Sebelum dimekarkan beberapa kawasan Kecamatan Induk Talang Kelapa tercatat memiliki 19 desa, dan pusat pemerintahan berada di Kelurahan Sukareme dimana sekarang masuk dalam wilayah Palembang.</p>\r\n<p>Pengambil alihan sembilan desa di wilayah Musi Banyuasin ke Kota Palembang sekitar tahun 1998, maka pusat pemerintahan Kecamatan dipindahkan pemerintah Kabupaten Muba ke kawasan Desa Sukajadi. Pada tahun 2002 Kabupaten Musi Banyuasin mulai dimekarkan menjadi Kabupaten Banyuasin, pada saat itu Kecamatan Talang Kelapa masuk bagian dari Kecamatan pemekaran Kabupaten Banyuasin.</p>\r\n<p>Di masa-masa awal pemekaran Kabupaten Banyuasin, seluruh kawasan Tanjung Lago. merupakan bagian dari Kecamatan Talang Kelapa. Namun pada pemerintahan Kabupaten Banyuasin, kecamatan ini dimekarkan dua wilayah, Kecamatan Talang Kelapa dan Kecamatan Tanjung Lago. Pasca pemekaran kecamatan Talang Kelapa, menyisahkan 7 wilayah desa dan kelurahan, yakni, Kelurahan Kenten, Desa Gasing, Kelurahan Sukajadi, Kelurahan Sukamoro, Kelurahn Air Batu, Desa Pangkalan Benteng dan Desa Sungai Rengit.</p>\r\n<p>Pada tahun 2007 Kecamatan Talang Kelapa sejumlah wilayah kelurahan dan desa di kecamatan ini mulai di mekarkan, yakni Kelurahan Kenten dimekarkan menjadi 3 wilayah, Kelurahan Talang Keramat, Desa Kenten Laut dan Kelurahan Kenten. Di bagian barat Kelurahan Sukajadi dimekarkan menjadi 3 wilayah, Kelurahan Tanah Mas, Desa Talang Buluh dan Kelurahan Sukajadi. Pemekaran terakhir pada 2009 yakni Desa Sungai Rengit menjadi dua wilayah, Sungai Rengit dan Sungai Rengit Murni. Dari jumlah pemekaran desa dan kelurahan yang dilakukan secara bertahap, maka total desa Kecamatan Talang Kelapa kini memiliki 12 desa dan kelurahan. Adapun jumlah Camat yang memimpin Kecamatan Talang Kelapa dari dulu sampai sekarang tercatat 7 camat, yakni. Drs Syaiful Anwar, Drs Alimin Bahri (era Muba) Drs Suherman Maksun (era peralihan) Drs Efendi Samsani, Drs Ambrizal, Hasmi S.Sos M.Si, Drs Yusrizal dan Sekarang Aminuddin,S.Pd.,S.IP.,MM.</p>\r\n<p>Kecamatan Talang Kelapa merupakan salah satu kecamatan di Kabupaten Banyuasin dengan luas 560,12 kilometer persegi dan berpenduduk sekitar 125.233 jiwa. Letak Kecamatan Talang Kelapa berbatasan langsung dengan enam kecamatan, sebelah utara berbatasan Kecamatan Tanjung Lago dan Sako Palembang, sebelah selatan Kecamatan Gandus Palembang, sebelah barat Kecamatan Sembawa, sebelah timur Kecamatan Sukarame dan Alang-Alang Lebar Palembang.</p>\r\n<p>Kecamatan Talang Kelapa terdiri atas 12 wilayah, yakni 6 Desa, Sungai Rengit, Sungai Rengit Murni, Gasing, Pangkalan Benteng, Talang Buluh, dan Kenten Laut, dan 6 wilayah kelurahan, Air Batu, Sukamoro, Sukajadi, Tanah Mas, Talang Keramat, Kenten.</p>\r\n<p>Pusat pemerintahan Kecamatan Talang Kelapa berada di Kelurahan Sukajadi, sedangkan titik keramaian berada di dua wilayah, Kelurahan Sukajadi dan Kelurahan Kenten, hal ini dikarenakan didua wilayah ini terdapat pusat pemukiman dan pertokoan, dan memiliki akses yang mudah seperti Jalang Palembang &ndash; Betung di Sukajadi dan Jalan Pangeran Ayin di Kelurahan Kenten. Kedua jalan ini langsung menuju kota Palembang.</p>\r\n<p>Kecamatan Talang Kelapa berada diperbatasan yang notabene menempel Palembang sehingga sebagian besarnya berbudaya dan berbahasa Palembang. Bahkan hampir tidak ditemui penduduk menggunakan khas dialek daerah Talang Kelapa, selain berbahasa Palembang. Kecamatan Talang Kelapa, yakni jalur urat nadi perekonomian perbatasan mulai dari kawasan Sukajadi ruas kilometer 13 sampai kilometer 20, Jalan Palembang &ndash; Betung. Adapun diwilayah Kenten &ndash; Palembang terdapat ruas Jalan Pangeran Ayin yang menghubungkan langsung dibagian wilayah kota Palembang, dan satu lagi kawasan yang baru berkembang, yakni wilayah Gasing yang merupakan kawasan industri di Jalan Poros Tanjung Api-Api.</p>\r\n<p>Kemajuan yang begitu cepat di Kecamatan Talang Kelapa, serta posisinya yang berada diperbatasan, sehingga wilayah ini menjadi kawasan kecamatan berpenduduk urban, dan kecamatan penyangga perkotaan. Cepatnya pembangunan disegala bidang dalam wilayah kecamatan ini,membuat Kecamatan Talang Kelapa Kabupaten Banyuasin dijuluki Kecamatan penyangga perbatasan kota Palembang yang berhasil dan sukses, memanfaatkan posisinya diperbatasan kota untuk mendongkrak kemajuan wilayahnya.</p>', '2024-01-09 13:00:43', 1, 1, 'Talang_Kelapa.jpeg');

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
(2, 'User'),
(3, 'Publisher');

-- --------------------------------------------------------

--
-- Struktur dari tabel `object`
--

CREATE TABLE `object` (
  `id` int(11) NOT NULL,
  `object_type` int(11) NOT NULL,
  `object_text` varchar(100) NOT NULL,
  `object_code` varchar(50) NOT NULL,
  `object_name` varchar(100) NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `object`
--

INSERT INTO `object` (`id`, `object_type`, `object_text`, `object_code`, `object_name`, `is_active`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`) VALUES
(1, 1, 'Sekolah Dasar', 'sd', 'sekolah_dasar', 1, '2025-03-01 21:18:13', 1, NULL, NULL, NULL, NULL),
(2, 1, 'Sekolah Menengah Pertama', 'smp', 'sekolah_menengah_pertama1', 1, '2025-03-01 21:19:07', 1, NULL, NULL, NULL, NULL),
(3, 1, 'Sekolah Menengah Atas', 'sma', 'sekolah_menengah_atas', 1, '2025-03-01 21:19:07', 1, NULL, NULL, NULL, NULL),
(4, 1, 'Diploma I', 'd1', 'diploma_satu', 1, '2025-03-01 21:19:51', 1, NULL, NULL, NULL, NULL),
(5, 1, 'Diploma II', 'd2', 'diploma_dua', 1, '2025-03-01 21:19:51', 1, NULL, NULL, NULL, NULL),
(6, 1, 'Diploma III', 'd3', 'diploma_tiga', 1, '2025-03-01 21:20:37', 1, NULL, NULL, NULL, NULL),
(7, 1, 'Diploma IV', 'd4', 'diploma_empat', 1, '2025-03-01 21:20:37', 1, NULL, NULL, NULL, NULL),
(8, 1, 'Sarjana (S1)', 's1', 'sarjana', 1, '2025-03-01 21:21:19', 1, NULL, NULL, NULL, NULL),
(9, 1, 'Magister', 's2', 'magister', 1, '2025-03-01 21:21:19', 1, NULL, NULL, NULL, NULL),
(10, 2, 'Internet', 'internet', 'internet', 1, '2025-03-01 21:28:51', 1, NULL, NULL, NULL, NULL),
(11, 2, 'Media Sosial', 'media_sosial', 'media_sosial', 1, '2025-03-01 21:28:51', 1, NULL, NULL, NULL, NULL),
(12, 2, 'Teman', 'teman', 'teman', 1, '2025-03-01 21:28:51', 1, NULL, NULL, NULL, NULL),
(13, 2, 'Seminar', 'seminar', 'seminar', 1, '2025-03-01 21:28:51', 1, NULL, NULL, NULL, NULL),
(14, 2, 'Iklan', 'iklan', 'iklan', 1, '2025-03-01 21:28:51', 1, NULL, NULL, NULL, NULL),
(15, 2, 'Lainnya', 'lainnya', 'lainnya', 1, '2025-03-01 21:28:51', 1, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `object_type`
--

CREATE TABLE `object_type` (
  `id` int(11) NOT NULL,
  `object_type` varchar(100) NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `object_type`
--

INSERT INTO `object_type` (`id`, `object_type`, `is_active`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`) VALUES
(1, 'Pendidikan Terakhir', 1, '2025-03-01 21:14:35', 1, NULL, NULL, NULL, NULL),
(2, 'Sumber Informasi', 1, '2025-03-01 21:25:13', 1, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `peserta`
--

CREATE TABLE `peserta` (
  `id` int(11) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `usia` int(11) NOT NULL,
  `tinggi_badan` int(11) NOT NULL,
  `pendidikan_terakhir` int(11) DEFAULT NULL,
  `sumber_informasi` int(11) DEFAULT NULL,
  `alamat` text NOT NULL,
  `kode_verifikasi` varchar(10) DEFAULT NULL,
  `is_verified` int(11) NOT NULL DEFAULT 0,
  `verified_by` int(11) DEFAULT NULL,
  `priode` year(4) NOT NULL DEFAULT current_timestamp(),
  `registered_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `peserta`
--

INSERT INTO `peserta` (`id`, `nik`, `nama`, `email`, `no_hp`, `tempat_lahir`, `tanggal_lahir`, `usia`, `tinggi_badan`, `pendidikan_terakhir`, `sumber_informasi`, `alamat`, `kode_verifikasi`, `is_verified`, `verified_by`, `priode`, `registered_at`) VALUES
(1, '1231231231123123', 'Yusron', 'yusron@gmail.com', '6218223232', 'Jakarta', '2025-03-02', 22, 123, 1, 10, 'jakarta', NULL, 0, NULL, 2025, '2025-03-02 16:44:40');

-- --------------------------------------------------------

--
-- Struktur dari tabel `status`
--

CREATE TABLE `status` (
  `id_status` int(11) NOT NULL,
  `nama_status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `status`
--

INSERT INTO `status` (`id_status`, `nama_status`) VALUES
(1, 'Menungggu'),
(2, 'Sedang Diproses'),
(3, 'Selesai');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
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

INSERT INTO `user` (`id_user`, `username`, `nama`, `kontak`, `password`, `last_login`, `level_user`, `original_pass`) VALUES
(1, 'admin', 'Admin', '081299929922', '$2y$10$i6LAb9xDh4G.pgVZ.cGknOUtRiPvK5SAW8SeMvAnICqKvnejunsQS', '2025-03-05 09:28:34', 1, ''),
(2, 'user', 'user', '082189299222', '$2y$10$bMYspn86xs5Syrp9uclhu.WnCGUm9ZOhq2QBKaS8fWZGsxQro3aoW', '2025-03-01 09:23:44', 2, ''),
(3, 'publisher', 'publisher', '0812829922', '$2y$10$ixcBcvIlqaoLalUMpCwoDOzDjvXifp4zBR//Dsrrf7ISiG/kmg5dK', '2025-03-01 09:24:00', 3, '33333');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `galeri`
--
ALTER TABLE `galeri`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created_by` (`created_by`);

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
-- Indeks untuk tabel `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indeks untuk tabel `object`
--
ALTER TABLE `object`
  ADD PRIMARY KEY (`id`),
  ADD KEY `object_type` (`object_type`);

--
-- Indeks untuk tabel `object_type`
--
ALTER TABLE `object_type`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `peserta`
--
ALTER TABLE `peserta`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_nik` (`nik`),
  ADD KEY `sumber_informasi` (`sumber_informasi`),
  ADD KEY `pendidikan_terakhir` (`pendidikan_terakhir`);

--
-- Indeks untuk tabel `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id_status`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `nip` (`username`),
  ADD KEY `level_user` (`level_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `galeri`
--
ALTER TABLE `galeri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jenis_konten`
--
ALTER TABLE `jenis_konten`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `konten`
--
ALTER TABLE `konten`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `level`
--
ALTER TABLE `level`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `object`
--
ALTER TABLE `object`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `object_type`
--
ALTER TABLE `object_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `peserta`
--
ALTER TABLE `peserta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `status`
--
ALTER TABLE `status`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

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
-- Ketidakleluasaan untuk tabel `object`
--
ALTER TABLE `object`
  ADD CONSTRAINT `object_ibfk_1` FOREIGN KEY (`object_type`) REFERENCES `object_type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `peserta`
--
ALTER TABLE `peserta`
  ADD CONSTRAINT `peserta_ibfk_1` FOREIGN KEY (`sumber_informasi`) REFERENCES `object` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `peserta_ibfk_2` FOREIGN KEY (`pendidikan_terakhir`) REFERENCES `object` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`level_user`) REFERENCES `level` (`id_level`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
