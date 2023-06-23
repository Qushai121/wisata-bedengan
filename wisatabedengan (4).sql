-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2023 at 11:47 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wisatabedengan`
--

-- --------------------------------------------------------

--
-- Table structure for table `fasilitasumum`
--

CREATE TABLE `fasilitasumum` (
  `fasilitasumum_id` bigint(20) UNSIGNED NOT NULL,
  `fasilitasumum_nama` varchar(100) NOT NULL,
  `fasilitasumum_detail` varchar(255) NOT NULL,
  `fasilitasumum_lokasi` varchar(255) NOT NULL,
  `fasilitasumum_status` bigint(20) UNSIGNED DEFAULT NULL,
  `fasilitasumum_gambar` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `fasilitasumum`
--

INSERT INTO `fasilitasumum` (`fasilitasumum_id`, `fasilitasumum_nama`, `fasilitasumum_detail`, `fasilitasumum_lokasi`, `fasilitasumum_status`, `fasilitasumum_gambar`, `user_id`) VALUES
(1, 'Masjid', 'Masjid Bedengan', 'Disebrang jaln bla bla blaasdsdsdsdsd', NULL, '1686721451_806699ac4906d804e0fc.jpg', 2),
(2, 'Toilet Umum', 'Toilet Umum &amp; dan ada kamar mandi juga', 'di situ tuh', 2, '1686724334_4b0f114723c552b93af5.jpeg', 2);

-- --------------------------------------------------------

--
-- Table structure for table `jeniswisata`
--

CREATE TABLE `jeniswisata` (
  `jeniswisata_id` bigint(20) UNSIGNED NOT NULL,
  `wisata_nama` varchar(255) NOT NULL,
  `wisata_thumbnail` text NOT NULL,
  `wisata_description` text DEFAULT NULL,
  `wisata_detail` text DEFAULT NULL,
  `wisata_status` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `jeniswisata`
--

INSERT INTO `jeniswisata` (`jeniswisata_id`, `wisata_nama`, `wisata_thumbnail`, `wisata_description`, `wisata_detail`, `wisata_status`, `user_id`) VALUES
(1, 'Outbond', '1686652478_8fe9fa81941c118fff2a.webp', '      Dengan kegiatan Outbound, peserta dilatih untuk dapat meningkatkan kemandirian, empati, team work, komunikasi, kepemimpinan dan kesabaran. Dan diharapkan dapat memiliki sikap dan karakter yang lebih baik misalnya menjadi lebih kreatif, disiplin dan bertanggung jawab setelah mengikuti kegiatan.', 'Camping Outbound merupakan perpaduan yang tepat dalam pembentukan solidaritas perusahaan demi mewujudkan Visi dan Misi yang akan digapai.\r\nKegiatan rekreasi di luar ruangan dilakukan untuk menenangkan pikiran dari ramainya kesibukan ibu kota dengan menikmati keindahan alam bersama rekan kerja ataupun komunitas.', 3, 2),
(2, ' Family Camp ', '1686652755_fd41f68c45c6f5adde33.webp', ' Camping atau berkemah merupakan kegiatan menginap di alam terbuka yang sangat menyenangkan. Tidak hanya dapat menyegarkan badan dan pikiran dari penatnya kesibukan sehari-hari. Camping juga memiliki segudang manfaat, salah satunya adalah untuk membangun kebersamaan, menciptakan harmonisasi kekeluargaan, serta pengembangan karakter diri.', 'Refreshing dari penatnya kesibukan\r\n\r\nDengan tujuan mendekatkan diri dengan alam, camping ini bisa dilakukan oleh keluarga atau kelompok tertentu. Dengan panorama pegunungan dan sungai, Citra Alam bisa menjadi pilihan untuk tempat refreshing bersama keluarga anda. Aktivitas yang dilakukan dalam Family Camp juga beragam, mulai dari permainan outbound yang seru, bermain di aliran sungai, melihat ikan-ikan kecil, berenang sampai dengan yakiniku an.', 1, 2),
(3, 'RAPPELLING', '1686652962_6055bed29398ab1f1ddd.jpg', 'Rappelling/abseiling atau turun tebing merupakan salah satu bagian dari teknik SRT (single rope technique) dalam olahraga mountaineering. Rappelling merupakan mode transportasi untuk menjangkau tempat/lokasi yang sulit dengan menggunakan tali rappel sebagai jalur lintasan dan/atau sebagai tempat bergantung, seperti untuk menuruni tebing, turun dari gedung/jembatan atau turun kedalaman perut bumi dengan menggunakan gaya berat badan dan gaya tolak kaki sebagai pendorong gerak turun.', 'Teknik bergelantungan dengan tubuh menggunakan harness yang diperlengkapi webing, carabiners, descender, sarung tangan dan helm yang biasanya dilakukan pada tebing tinggi dibukit-bukit oleh para penikmat wisata petualangan, dikawasan wisata curug panjang, aktivitas rappeling di lakukan dengan menuruni tebingan air terjun yang eksotis.\r\n\r\nTeknik rappelling lambat biasanya digunakan oleh rappeller ketika menuruni trek tebing untuk menikmati pesona air terjun dan kemewahan alam yang menyelimutinya secara perlahan. Dan, terkadang rappeller menggunakan teknik rappelling cepat hanya untuk beradu kecepatan dengan jatuhnya air terjun ke kolam terjunan.', 5, 2),
(4, 'JELAJAH AIR TERJUN', '1686653053_75a2792c0ad8b82bb6c4.jpg', 'Jelajah air terjun merupakan sebuah alur petualangan yang memadukan antara pesona lansekap hutan punggungan sebelah barat daya gunung Paseban dengan keindahan elemen air di aliran sungai Cirangrang yang bertaburkan terjunan-terjunan air nan eksotis.', 'Kegiatan bergenre wisata minat khusus ini diperuntukan bagi wisatawan yang memiliki kecenderungan minat dan motivasi khusus dalam wisata petualangan, terutama pada minat penjelajahan hutan dan petualangan di air terjun.\r\n\r\nDurasi jelajah yang dapat memakan waktu s.d 3 jam ini akan melintasi hutan, menapaki tebingan bebatuan hitam dan batuan cadas untuk mencapai terjunan air, menyusuri arus yang searah aliran sungai dan melakukan aktivitas body rafting, river trekking, cliff jumping dan free falling di curug Naga, Barong, Priuk dan curug Orok.Dengan menggunakan perlengkapan keselamatan tubuh dan aturan yang ketat selama melakukan aktivitas jelajah air terjun, anda akan menemukan sensasi petualangan dengan aman dan nyaman di air terjun yang paling eksotis dan privasi yang berada di Bogor dan kawasan pariwisata Puncak.\r\n\r\n', 2, 2),
(6, 'wibu ', '1687150995_51c448c4b89afab232be.png', 'gasdsahudsdhsdhud', 'gsbdsuyhdshdushdsh', 3, 2),
(9, 'kebun teh', '1687406333_5a8c833a981eb6c91e8a.png', 'belajar cara bagaimana membuat teh', 'baca deskripsi aja', 1, 3),
(11, 'ayamlayang', '1687410191_e9a00255f21ee47155b9.jpg', 'Ayam Layang', 'Ayam layang adalah spot  terkenal di bedengan', 1, 6),
(12, 'mancing mania', '1687417162_8aa5db95cbbb2c95ac9a.jpeg', 'Kolam pancing seringkali merupakan tempat yang terawat dengan baik dan dibangun khusus untuk memancing. Air kolam biasanya jernih dan terpelihara dengan baik. Di sekitar kolam, Anda mungkin akan menemukan berbagai fasilitas seperti tempat duduk, dermaga, dan tempat berteduh. Beberapa kolam pancing juga dilengkapi dengan berbagai jenis ikan yang ditebar secara khusus untuk kegiatan memancing. Kolam pancing biasanya cocok untuk pemancing pemula atau yang ingin menikmati suasana yang lebih tenang.', ' tempat pancing ini menawarkan pengalaman yang unik dan menarik bagi para pemancing. Dalam memilih tempat pancing, penting untuk mempertimbangkan lokasi, jenis ikan yang ingin ditangkap, fasilitas yang tersedia, dan suasana yang diinginkan.', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `jeniswisatatiketbridge`
--

CREATE TABLE `jeniswisatatiketbridge` (
  `bridge_id` bigint(20) UNSIGNED NOT NULL,
  `jeniswisata_id` bigint(20) UNSIGNED NOT NULL,
  `tiket_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `jeniswisatatiketbridge`
--

INSERT INTO `jeniswisatatiketbridge` (`bridge_id`, `jeniswisata_id`, `tiket_id`) VALUES
(1, 1, 2),
(2, 1, 3),
(3, 3, 3),
(6, 2, 7),
(7, 4, 3),
(8, 11, 8),
(9, 12, 3),
(10, 1, 8);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `penyewaan`
--

CREATE TABLE `penyewaan` (
  `penyewaan_id` bigint(20) UNSIGNED NOT NULL,
  `penyewaan_nama` varchar(100) NOT NULL,
  `penyewaan_detail` varchar(255) NOT NULL,
  `penyewaan_lokasi` varchar(255) NOT NULL,
  `penyewaan_status` bigint(20) UNSIGNED DEFAULT NULL,
  `penyewaan_gambar` text NOT NULL,
  `penyewaan_harga` bigint(20) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `penyewaan`
--

INSERT INTO `penyewaan` (`penyewaan_id`, `penyewaan_nama`, `penyewaan_detail`, `penyewaan_lokasi`, `penyewaan_status`, `penyewaan_gambar`, `penyewaan_harga`, `user_id`) VALUES
(1, 'Tenda', 'tenda berukuran 2X2 ', 'disono\r\n', 4, '1686716516_48a81ed5c30ed00eafbe.png', 200000, 2),
(2, 'pancingan', 'pancingan 1 buah ,dan unpan', 'di sungai sono bang', 5, '1686716915_6d9f14d1b6a36ab766c5.png', 20000, 2);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `role_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_id`, `role_name`) VALUES
(1, 'User Biasa'),
(2, 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `status_id` bigint(20) UNSIGNED NOT NULL,
  `status_detail` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`status_id`, `status_detail`) VALUES
(1, 'BUKA'),
(2, 'DIPERBAIKI'),
(3, 'TUTUP'),
(4, 'TERSEDIA'),
(5, 'TIDAK TERSEDIA');

-- --------------------------------------------------------

--
-- Table structure for table `tiket`
--

CREATE TABLE `tiket` (
  `tiket_id` bigint(20) UNSIGNED NOT NULL,
  `tiket_nama` varchar(100) NOT NULL,
  `tiket_harga` varchar(100) NOT NULL,
  `tiket_promo` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tiket`
--

INSERT INTO `tiket` (`tiket_id`, `tiket_nama`, `tiket_harga`, `tiket_promo`) VALUES
(2, 'Anak Kecil ', '30000', 0),
(3, 'Dewasa ', '100000', 20000),
(7, 'tenda besar', '200000', 120000),
(8, 'Ayam Layang', '250000', 50000);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `foto` text NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` bigint(20) UNSIGNED DEFAULT 1,
  `token` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `foto`, `username`, `email`, `password`, `role_id`, `token`) VALUES
(2, '1687423309_8ef807de276676d7d665.png', 'Qushai', 'qushai@gmail.com', 'ff98d17a228fb02dc56271bd47ba61101bfc587540bd76251c8e9118377b4722a40f876f1df6e46b5bf19824eb3e1430ffdf1b4a291dcfc73071df456068e921a8097c6a3561f8a2d7537a21faf84359f81e7551e0563a37', 2, ''),
(3, '1687406079_e9e984df3c1d5c1208c2.jpeg', 'bobby', 'm.qushai111@gmail.com', '914220c57dcb8ab164c4ff02da684c2d9cf6ba6c022a221508944ae7f8834e95fde44e8424d8944708af8143e9a5de60d9381927b4401ce84534ad6b4ae3903a7e728ef75710c471937421eeeacdc4d447dbad61e27c', 2, 'K8w8Xrc47L'),
(4, '', 'anjay', 'tolol@gmail.com', '2a57c1bccfa8224830785d43ac73b4f6aac76cb523c30ba95d79dd3c651f771d2a3a155629da4f134c88d2ff258381c328a6bda58b2a3b5aab4c3a6e121dd88d68c91517df09d434aa85c57296e3f4bc7a940c7c1f90', 1, 'anHEsjgql7'),
(5, '', 'admin', 'binomodelesol@gmail.com', '20426250b5ae6af61d99216ede245357fad7f3d54a76a8aeac9bb0e0246d7e51161fe4fe0abf865422c898de0d7243a442a670c53fae6549d64ef3c9294f93d94dfe1dc731a59bf41d53a394407a56c8bc6c00976fc8930b', 1, 'NJknKJeZHA'),
(6, '', 'AyamTerbang', 'santosobobby0@gmail.com', '061f4dcdaa8e10bbe40ebc405ced16eaa031bdbed503077598566bc4ee70f91e9763cd4c7a3b141d25397de2c5fd6dcb6ff8599a1baeb7613cee6c16538dc02b1b4bea627ff43b293df4c09a11569444f4e625a8f93d', 2, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `wisatasection`
--

CREATE TABLE `wisatasection` (
  `wisatasection_id` bigint(20) UNSIGNED NOT NULL,
  `wisatasection_gambar` text NOT NULL,
  `wisatasection_judul` varchar(255) NOT NULL,
  `wisatasection_deskripsi` text NOT NULL,
  `wisatasection_detail` text NOT NULL,
  `jeniswisata_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `wisatasection`
--

INSERT INTO `wisatasection` (`wisatasection_id`, `wisatasection_gambar`, `wisatasection_judul`, `wisatasection_deskripsi`, `wisatasection_detail`, `jeniswisata_id`, `user_id`) VALUES
(3, '1687074334_5df9f754850a379f352e.jpg', 'OUTBOUND SEBAGAI…', 'Outbound merupakan model pembelajaran dan pelatihan perilaku individu, kelompok / tim dan kepemimpinan yang dilakukan di alam terbuka berdasarkan metode belajar melalui pengalaman secara langsung dengan menggunakan permainan-permainan kreatif, edukatif dan komunikatif yang berbasis petualangan untuk meningkatkan kompetensi individu dan kerjasama antar individu didalam sebuah tim yang kuat melalui komunikasi efektip, kepemimpinan dan keselarasan dalam mencapai tujuan sebuah organisasi atau lembaga.', 'Kegiatan outbound memberikan tantangan dalam kegiatannya untuk mengembangkan kemampuan kepemimpinan (leadership), kerjasama kelompok (team building) dan membangun karakter individu yang lebih baik (character building) yang disajikan dalam bentuk permainan, simulasi, diskusi dan petualangan sebagai media penyampaian materi.\r\n\r\nOutbound sebagai pendidikan sejatinya adalah kegiatan yang terfokus pada pengembangan sumberdaya manusia dengan Experiential Learning sebagai metode dan alam sebagai media sekaligus materi pembelajarannya.', 1, 2),
(4, '1687074385_0d29e5a17005f2d15edc.jpg', 'OUTBOUND SEBAGAI…', 'Outbound sebagai aktivitas rekreasi atau yang lebih dikenal dengan istilah fun outbound, otbond atau outbound murah, lahir sebagai pemenuh atas kebutuhan pasar pariwisata yang bermuatan outdoor training, atau pemenuhan kebutuhan outdoor training dalam kemasan kegiatan rekreasi dan dalam nuansa rekreatif. Dalam hal ini, fun outbound menjadi salah satu medium yang disisipkan dalam event gathering, outing dan atau kegiatan lainnya yang melibatkan banyak orang.', 'Selain sebagai pemenuh aktivitas rekreasi dengan kekhasan permainan-permaianan yang ditampilkan, berpadu padan dengan kemampuan fasilitator dalam mentransformasikan pembelajaran (learning) atas sebuah permainan outbound yang dimainkan dengan pelibatkan olah fisik, emosi dan olah pikir dalam aktivitas wisata yang lebih banyak mengandung muatan kebersamaan serta kesenangan, itu merupakan obyek daya tarik wisata tersendiri yang banyak diminati.\r\n\r\nDalam hal ini, outbound yang awalnya digagas sebagai model pendidikan luar ruang telah bergenerasi menjadi bagian dari dunia pariwisata dengan tidak menghilangkan muatan pembelajaran dalam setiap aktivitas fun outbound.', 1, 2),
(6, '1687406813_7499f03db4fe25e2e5e7.png', 'asdasdasdasdsadsad', 'asdsdsadsasadsad', 'dsadsadsadsadsasadsadsad', 9, 3),
(7, '1687409179_661f6ff949dcb2c39daa.jpg', 'JOURNEY edit', 'Menemukan jalur penjelajahan dengan berbekal kompas untuk mencapai terjunan air curug panjang dari tempat berkemah merupakan satu dari banyak keragaman aktivitas petualangan yang dihadirkan ketika event gathering dan outing dalam nuansa berkemah dalam kawasan wisata curug Panjang.', 'Menelusuri jalanan setapak dibawah rimbunnya tajuk tegakan di lembahan hutan pegunungan dalam kawasan wisata curug panjang, menapaki bebatuan hitam disepanjang aliran sungai yang tak berarus kencang dan mendaki tebingan air terjun curug saimah untuk mencapai puncak ketinggian dimana pandangan tak terbatasi oleh sekat-sekat pembatasnya, lalu berenang di segarnya air berwarna hijau tosca di curug panjang yang memiliki lerengan terjunan air sepanjang +20 meter, itu adalah sensasi yang akan didapatkan ketika mengikuti kegiatan journey dari tempat anda berkemah menuju air terjun curug panjang.\r\n\r\nDalam perjalanan ini, alam akan menjadi untaian symponi yang menakjubkan dimana aktivitas fisik dan olah emosi akan berpadu peran dengan instrumen – instrumen hutan dan elemen air serta dalam ruang-ruang kebersamaan.', 4, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fasilitasumum`
--
ALTER TABLE `fasilitasumum`
  ADD PRIMARY KEY (`fasilitasumum_id`),
  ADD KEY `fasilitasumum_user_id_foreign` (`user_id`),
  ADD KEY `fasilitasumum_fasilitasumum_status_foreign` (`fasilitasumum_status`);

--
-- Indexes for table `jeniswisata`
--
ALTER TABLE `jeniswisata`
  ADD PRIMARY KEY (`jeniswisata_id`),
  ADD KEY `jeniswisata_user_id_foreign` (`user_id`),
  ADD KEY `jeniswisata_wisata_status_foreign` (`wisata_status`);

--
-- Indexes for table `jeniswisatatiketbridge`
--
ALTER TABLE `jeniswisatatiketbridge`
  ADD PRIMARY KEY (`bridge_id`),
  ADD KEY `JenisWisataTiketBridge_jeniswisata_id_foreign` (`jeniswisata_id`),
  ADD KEY `JenisWisataTiketBridge_tiket_id_foreign` (`tiket_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penyewaan`
--
ALTER TABLE `penyewaan`
  ADD PRIMARY KEY (`penyewaan_id`),
  ADD KEY `penyewaan_user_id_foreign` (`user_id`),
  ADD KEY `penyewaan_penyewaan_status_foreign` (`penyewaan_status`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`status_id`);

--
-- Indexes for table `tiket`
--
ALTER TABLE `tiket`
  ADD PRIMARY KEY (`tiket_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `user_role_id_foreign` (`role_id`);

--
-- Indexes for table `wisatasection`
--
ALTER TABLE `wisatasection`
  ADD PRIMARY KEY (`wisatasection_id`),
  ADD KEY `wisatasection_jeniswisata_id_foreign` (`jeniswisata_id`),
  ADD KEY `wisatasection_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fasilitasumum`
--
ALTER TABLE `fasilitasumum`
  MODIFY `fasilitasumum_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jeniswisata`
--
ALTER TABLE `jeniswisata`
  MODIFY `jeniswisata_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `jeniswisatatiketbridge`
--
ALTER TABLE `jeniswisatatiketbridge`
  MODIFY `bridge_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `penyewaan`
--
ALTER TABLE `penyewaan`
  MODIFY `penyewaan_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `role_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `status_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tiket`
--
ALTER TABLE `tiket`
  MODIFY `tiket_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `wisatasection`
--
ALTER TABLE `wisatasection`
  MODIFY `wisatasection_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `fasilitasumum`
--
ALTER TABLE `fasilitasumum`
  ADD CONSTRAINT `fasilitasumum_fasilitasumum_status_foreign` FOREIGN KEY (`fasilitasumum_status`) REFERENCES `status` (`status_id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `fasilitasumum_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `jeniswisata`
--
ALTER TABLE `jeniswisata`
  ADD CONSTRAINT `jeniswisata_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `jeniswisata_wisata_status_foreign` FOREIGN KEY (`wisata_status`) REFERENCES `status` (`status_id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `jeniswisatatiketbridge`
--
ALTER TABLE `jeniswisatatiketbridge`
  ADD CONSTRAINT `JenisWisataTiketBridge_jeniswisata_id_foreign` FOREIGN KEY (`jeniswisata_id`) REFERENCES `jeniswisata` (`jeniswisata_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `JenisWisataTiketBridge_tiket_id_foreign` FOREIGN KEY (`tiket_id`) REFERENCES `tiket` (`tiket_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `penyewaan`
--
ALTER TABLE `penyewaan`
  ADD CONSTRAINT `penyewaan_penyewaan_status_foreign` FOREIGN KEY (`penyewaan_status`) REFERENCES `status` (`status_id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `penyewaan_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `role` (`role_id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `wisatasection`
--
ALTER TABLE `wisatasection`
  ADD CONSTRAINT `wisatasection_jeniswisata_id_foreign` FOREIGN KEY (`jeniswisata_id`) REFERENCES `jeniswisata` (`jeniswisata_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `wisatasection_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
