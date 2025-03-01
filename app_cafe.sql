-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 04 Feb 2024 pada 09.15
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
-- Database: `app_cafe`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_produk`
--

CREATE TABLE `detail_produk` (
  `id_detail` int(11) NOT NULL,
  `file` varchar(256) NOT NULL,
  `produk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `detail_produk`
--

INSERT INTO `detail_produk` (`id_detail`, `file`, `produk`) VALUES
(1, '1a.jpeg', 25),
(3, '1c.png', 25),
(4, '2a.jpeg', 26),
(5, '2b.jpeg', 26);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `id` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `status_makanan` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(1, 'Visi dan Misi', 'Ini adalah jenis konten utk kategori visi dan misi sekolah'),
(2, 'Struktur Organisasi', 'Ini adalah jenis konten utk kategori struktur organisasi sekolah'),
(3, 'Tentang', 'Ini adalah jenis konten utk kategori profile dan sejarah sekolah'),
(6, 'Sejarah', 'Ini adalah Jenis Konten Sejarah');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_produk`
--

CREATE TABLE `kategori_produk` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `code` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kategori_produk`
--

INSERT INTO `kategori_produk` (`id`, `nama`, `deskripsi`, `code`) VALUES
(1, 'Makanan Utama', 'ini adalah makanan utama', 'main-corse'),
(2, 'Kopi', 'Ini adalah kopi', 'kopi'),
(3, 'Snack', 'ini adalah snack', 'snack'),
(4, 'Non-Kopi', 'ini adalah non-kopi', 'non-kopi');

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
(11, 1, 'Visi dan Misi Kelurahan Talang Kelapa', '<p><strong>V I S I </strong></p>\r\n<p>Menciptakan Insan Berprestasi, Berbudaya dan Bertaqwa</p>\r\n<p><strong>M I S I</strong></p>\r\n<ol>\r\n<li>Menjalankan nilai nilai agama dan Berperilaku akhlakul Karimah Dalam Kehidupan Sehari Hari.</li>\r\n<li>Melaksanakan Pembelajaran Aktif, kreatif, efektif dan Menyenangkan untuk Mengembangkan potensi peserta Didik.</li>\r\n<li>Menumbuhkan semangat Berprestasi Kepada Keseluruh Warga Sekolah.</li>\r\n<li>Membimbing dan Mengembangkan Bakat Dan Minat Peserta Didik.</li>\r\n<li>Terlaksananya Program Ekstrakulikuler untuk menghasilkan siswa yang Berprestasi dan Bermanfaat bagi Kehidupan Sehari Hari.</li>\r\n<li>Menerapkan Manajemen Berbasis Sekolah Yang Partisifatif Dengan Melibatkan Seluruh Warga Sekolah.</li>\r\n<li>Mengembangkan Hasil Karya Yang dimiliki Peserta Dididk.</li>\r\n<li>Meningkatkan Kesadaran Untuk Memelihara Lingkungan.</li>\r\n</ol>', '2023-05-11 11:40:07', 1, 1, 'visi-dan-misi.jpeg'),
(12, 2, 'Struktur Organisasi Kelurahan Talang Kelapa', '<p>Lorem issum</p>', '2023-05-11 11:54:09', 1, 1, 'org8.jpg'),
(13, 6, 'Sejarah Kelurahan Talang Kelapa', '<p>Pada zaman penjajahan kawasan Kecamatan Talang Kelapa tercatat wilayahnya dikendalikan 3 marga besar, yakni, Gasing, Kenten dan Tanjung Lago. Seiring masa kemerdekaan maka kendali pimpinan kawasan dari marga diubah menjadi kecamatan.</p>\r\n<p>Awalnya Kecamatan Talang Kelapa adalah bagian dari Kabupaten Musi Banyuasin Banyuasin, wilayahnya mencakup kawasan Talang Kelapa, Tanjung Lago, dan sembilan kelurahan yang sekarang ada di wilayah kota Palembang, yakni Kelurahan Talang Betutu, Alang Alang Lebar, Srijaya, Sukamaju, Sako, Sukarame, Talang Jambi, Talang Kelapa. Sebelum dimekarkan beberapa kawasan Kecamatan Induk Talang Kelapa tercatat memiliki 19 desa, dan pusat pemerintahan berada di Kelurahan Sukareme dimana sekarang masuk dalam wilayah Palembang.</p>\r\n<p>Pengambil alihan sembilan desa di wilayah Musi Banyuasin ke Kota Palembang sekitar tahun 1998, maka pusat pemerintahan Kecamatan dipindahkan pemerintah Kabupaten Muba ke kawasan Desa Sukajadi. Pada tahun 2002 Kabupaten Musi Banyuasin mulai dimekarkan menjadi Kabupaten Banyuasin, pada saat itu Kecamatan Talang Kelapa masuk bagian dari Kecamatan pemekaran Kabupaten Banyuasin.</p>\r\n<p>Di masa-masa awal pemekaran Kabupaten Banyuasin, seluruh kawasan Tanjung Lago. merupakan bagian dari Kecamatan Talang Kelapa. Namun pada pemerintahan Kabupaten Banyuasin, kecamatan ini dimekarkan dua wilayah, Kecamatan Talang Kelapa dan Kecamatan Tanjung Lago. Pasca pemekaran kecamatan Talang Kelapa, menyisahkan 7 wilayah desa dan kelurahan, yakni, Kelurahan Kenten, Desa Gasing, Kelurahan Sukajadi, Kelurahan Sukamoro, Kelurahn Air Batu, Desa Pangkalan Benteng dan Desa Sungai Rengit.</p>\r\n<p>Pada tahun 2007 Kecamatan Talang Kelapa sejumlah wilayah kelurahan dan desa di kecamatan ini mulai di mekarkan, yakni Kelurahan Kenten dimekarkan menjadi 3 wilayah, Kelurahan Talang Keramat, Desa Kenten Laut dan Kelurahan Kenten. Di bagian barat Kelurahan Sukajadi dimekarkan menjadi 3 wilayah, Kelurahan Tanah Mas, Desa Talang Buluh dan Kelurahan Sukajadi. Pemekaran terakhir pada 2009 yakni Desa Sungai Rengit menjadi dua wilayah, Sungai Rengit dan Sungai Rengit Murni. Dari jumlah pemekaran desa dan kelurahan yang dilakukan secara bertahap, maka total desa Kecamatan Talang Kelapa kini memiliki 12 desa dan kelurahan. Adapun jumlah Camat yang memimpin Kecamatan Talang Kelapa dari dulu sampai sekarang tercatat 7 camat, yakni. Drs Syaiful Anwar, Drs Alimin Bahri (era Muba) Drs Suherman Maksun (era peralihan) Drs Efendi Samsani, Drs Ambrizal, Hasmi S.Sos M.Si, Drs Yusrizal dan Sekarang Aminuddin,S.Pd.,S.IP.,MM.</p>\r\n<p>Kecamatan Talang Kelapa merupakan salah satu kecamatan di Kabupaten Banyuasin dengan luas 560,12 kilometer persegi dan berpenduduk sekitar 125.233 jiwa. Letak Kecamatan Talang Kelapa berbatasan langsung dengan enam kecamatan, sebelah utara berbatasan Kecamatan Tanjung Lago dan Sako Palembang, sebelah selatan Kecamatan Gandus Palembang, sebelah barat Kecamatan Sembawa, sebelah timur Kecamatan Sukarame dan Alang-Alang Lebar Palembang.</p>\r\n<p>Kecamatan Talang Kelapa terdiri atas 12 wilayah, yakni 6 Desa, Sungai Rengit, Sungai Rengit Murni, Gasing, Pangkalan Benteng, Talang Buluh, dan Kenten Laut, dan 6 wilayah kelurahan, Air Batu, Sukamoro, Sukajadi, Tanah Mas, Talang Keramat, Kenten.</p>\r\n<p>Pusat pemerintahan Kecamatan Talang Kelapa berada di Kelurahan Sukajadi, sedangkan titik keramaian berada di dua wilayah, Kelurahan Sukajadi dan Kelurahan Kenten, hal ini dikarenakan didua wilayah ini terdapat pusat pemukiman dan pertokoan, dan memiliki akses yang mudah seperti Jalang Palembang &ndash; Betung di Sukajadi dan Jalan Pangeran Ayin di Kelurahan Kenten. Kedua jalan ini langsung menuju kota Palembang.</p>\r\n<p>Kecamatan Talang Kelapa berada diperbatasan yang notabene menempel Palembang sehingga sebagian besarnya berbudaya dan berbahasa Palembang. Bahkan hampir tidak ditemui penduduk menggunakan khas dialek daerah Talang Kelapa, selain berbahasa Palembang. Kecamatan Talang Kelapa, yakni jalur urat nadi perekonomian perbatasan mulai dari kawasan Sukajadi ruas kilometer 13 sampai kilometer 20, Jalan Palembang &ndash; Betung. Adapun diwilayah Kenten &ndash; Palembang terdapat ruas Jalan Pangeran Ayin yang menghubungkan langsung dibagian wilayah kota Palembang, dan satu lagi kawasan yang baru berkembang, yakni wilayah Gasing yang merupakan kawasan industri di Jalan Poros Tanjung Api-Api.</p>\r\n<p>Kemajuan yang begitu cepat di Kecamatan Talang Kelapa, serta posisinya yang berada diperbatasan, sehingga wilayah ini menjadi kawasan kecamatan berpenduduk urban, dan kecamatan penyangga perkotaan. Cepatnya pembangunan disegala bidang dalam wilayah kecamatan ini,membuat Kecamatan Talang Kelapa Kabupaten Banyuasin dijuluki Kecamatan penyangga perbatasan kota Palembang yang berhasil dan sukses, memanfaatkan posisinya diperbatasan kota untuk mendongkrak kemajuan wilayahnya.</p>', '2024-01-09 13:00:43', 1, 1, 'Talang_Kelapa.jpeg');

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
(2, 'Dapur'),
(3, 'Kasir');

-- --------------------------------------------------------

--
-- Struktur dari tabel `metode_bayar`
--

CREATE TABLE `metode_bayar` (
  `id_metode` int(11) NOT NULL,
  `metode` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `metode_bayar`
--

INSERT INTO `metode_bayar` (`id_metode`, `metode`) VALUES
(1, 'Tunai'),
(2, 'Non-tunai');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `deskripsi_produk` text NOT NULL,
  `harga_normal` int(11) NOT NULL,
  `harga_diskon` int(11) NOT NULL,
  `foto` varchar(256) NOT NULL,
  `kategori` int(11) NOT NULL,
  `is_deleted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `deskripsi_produk`, `harga_normal`, `harga_diskon`, `foto`, `kategori`, `is_deleted`) VALUES
(25, 'Kopi Latte Hot', 'Ekstrak kopi fresh dengan cita rasa khas Andung Coffee. Komposisi : 2 sdt kopi, 50 ml air panas, 150 ml susu segar, dan 2 1/2 sdt gula pasir', 18000, 0, '25/1c.png', 2, 0),
(26, 'Nasi Goreng Kampung', 'Nasi kampung dengan bahan premium dan bumbu khas andung. Komposisi : Nasi putih, kecap, telur ayam ceplok, ayam suwir, dan rempah pilihan', 26000, 0, '26/2a.jpeg', 1, 0);

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
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `nomor_meja` int(11) NOT NULL,
  `nomor_hp` varchar(15) NOT NULL,
  `nama_pembeli` varchar(50) NOT NULL,
  `total` int(11) NOT NULL,
  `potongan` int(11) NOT NULL,
  `metode_bayar` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `is_lunas` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(1, 'admin', 'Admin', '081299929922', '$2y$10$i6LAb9xDh4G.pgVZ.cGknOUtRiPvK5SAW8SeMvAnICqKvnejunsQS', '2024-02-04 02:14:26', 1, ''),
(2, 'dapur', 'Dapur', '082189299222', '$2y$10$bMYspn86xs5Syrp9uclhu.WnCGUm9ZOhq2QBKaS8fWZGsxQro3aoW', '2024-02-03 23:51:00', 2, ''),
(18, 'kasir', 'Kasir', '0812829922', '$2y$10$ixcBcvIlqaoLalUMpCwoDOzDjvXifp4zBR//Dsrrf7ISiG/kmg5dK', '2024-02-04 01:09:08', 3, '33333');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `detail_produk`
--
ALTER TABLE `detail_produk`
  ADD PRIMARY KEY (`id_detail`),
  ADD KEY `produk` (`produk`);

--
-- Indeks untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_produk` (`id_produk`),
  ADD KEY `id_transaksi` (`id_transaksi`);

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
-- Indeks untuk tabel `kategori_produk`
--
ALTER TABLE `kategori_produk`
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
-- Indeks untuk tabel `metode_bayar`
--
ALTER TABLE `metode_bayar`
  ADD PRIMARY KEY (`id_metode`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD KEY `kategori` (`kategori`);

--
-- Indeks untuk tabel `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id_status`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `metode_bayar` (`metode_bayar`),
  ADD KEY `status` (`status`);

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
-- AUTO_INCREMENT untuk tabel `detail_produk`
--
ALTER TABLE `detail_produk`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `galeri`
--
ALTER TABLE `galeri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jenis_konten`
--
ALTER TABLE `jenis_konten`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `kategori_produk`
--
ALTER TABLE `kategori_produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
-- AUTO_INCREMENT untuk tabel `metode_bayar`
--
ALTER TABLE `metode_bayar`
  MODIFY `id_metode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `status`
--
ALTER TABLE `status`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `detail_produk`
--
ALTER TABLE `detail_produk`
  ADD CONSTRAINT `detail_produk_ibfk_1` FOREIGN KEY (`produk`) REFERENCES `produk` (`id_produk`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD CONSTRAINT `detail_transaksi_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_transaksi_ibfk_2` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id_transaksi`) ON DELETE CASCADE ON UPDATE CASCADE;

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
-- Ketidakleluasaan untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `produk_ibfk_1` FOREIGN KEY (`kategori`) REFERENCES `kategori_produk` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`metode_bayar`) REFERENCES `metode_bayar` (`id_metode`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`status`) REFERENCES `status` (`id_status`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`level_user`) REFERENCES `level` (`id_level`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
