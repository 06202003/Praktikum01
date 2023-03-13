-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 05, 2023 at 08:37 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pwl20222`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `ISBN` varchar(13) NOT NULL,
  `title` varchar(100) NOT NULL,
  `author` varchar(100) NOT NULL,
  `publisher` varchar(100) NOT NULL,
  `publish_year` year(4) NOT NULL,
  `short_description` varchar(300) NOT NULL,
  `cover` varchar(100) DEFAULT NULL,
  `genre_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`ISBN`, `title`, `author`, `publisher`, `publish_year`, `short_description`, `cover`, `genre_id`) VALUES
('9781338606348', 'A Baby Shark Book, I Love You, Baby Shark: Doo Doo Doo Doo Doo Doo', 'John John Bajet', 'Sinar Star Book', 2022, 'Bernyanyi dan menari bersama Baby Shark dalam cerita yang penuh dengan ciuman, snuggle, dan pelukan -- tindak lanjut dari buku bergambar terlaris!. Buku ini mengikuti gaya lagu baby shark, dan bahkan menyertakan gerakan tangan untuk menari bersama.', NULL, 1),
('9786020308371', 'Petualangan Tintin: Bintang Misterius', 'Herge', 'Gramedia Pustaka Utama', 2014, 'Bintang Misterius adalah seri kesepuluh dari album serial Kisah Petualangan Tintin. Dalam album ini dikisahkan bagaimana Tintin dan Kapten Haddock berlayar bersama sebuah tim ekspedisi peneliti Eropa, F.E.R.S ke kutub utara untuk meneliti sebuah meteorit yang jatuh di daerah Samudra Arktik.', NULL, 6),
('9786026731838', 'Buku Belajar Baca Cepat Bisa Plus Aktivitas', 'Ariendhy', 'Gavin\'s Story Book', 2023, 'Buku ini adalah edisi update dari buku Belajar Baca Cepat Bisa, dimana dalam buku edisi update ini kami telah menambahkan konten area aktivitas anak, mulai dari simple labirin, tracing garis sederhana untuk permulaan anak belajar menulis, dan area mewarnai.', NULL, 1),
('9786230029783', 'Jujutsu Kaisen 05', 'Gege Akutami', 'Elex Media Komputindo', 2022, 'Program pertukaran dengan Akademi Jujutsu Kyoto dimulai. Pihak yang duluan menyingkirkan jurei tingkat 2 di area pertandinganlah yang akan jadi pemenangnya. Todo yang gemar berkelahi segera menyerang pihak Tokyo! Saat Todo dan Itadori saling berhadapan, anak-anak Kyoto yang lain ikut mengepung Itado', NULL, 6),
('9786230046254', 'One Piece Party 06', 'Eiichiro Oda', 'Elex Media Komputindo', 2023, 'Luffy dan kawan-kawan terbawa terbang ke Pulau Langit lalu tertangkap oleh tangan iblis Enel! Simak komik berisi lima cerita pendek, termasuk cerita Kelas Ninja! Syukurlah kita punya nice buddies!', NULL, 6),
('9786233140850', 'Memimpin dan Melayani Seperti Yesus', 'Pdt. Sih Budidoyo, M.Div., M.Th.', 'Andi Offset', 2021, 'Jabatan pemimpin memang sangat prestisius. Kenyataannya, menjadi pemimpin bukanlah perkara mudah karena ada banyak tugas yang harus diemban. Selain itu, ia juga bertanggung jawab atas nasib orang-orang yang ia pimpin. Memahami pentingnya pemahaman yang benar mengenai kepemimpinan dalam kekristenan.', NULL, 4),
('9786233142298', 'Jesus And The Doctors - Mengalami Kesembuhan Ilahi', 'Andrew Murray', 'Andi Offset', 2022, 'Kesaksian pribadi dan ajaran Alkitab yang disampaikan Andrew Murray akan menjadi inspirasi bagi para pembaca untuk percaya bahwa jamahan kesembuhan dari Allah akan datang dalam bidang-bidang yang menjadi kebutuhan mereka yang paling dalam.', NULL, 4),
('9786233467544', 'Katjang Tjina” dalam Kuliner Nusantara', 'Ary Budiyanto', 'Penerbit Buku Kompas', 2023, 'Tahukah bedanya Pecel dan Pecak? Samakah Pecel Ayam dan Pecel Lele? Apa hubungan Rujak Cingur dan Pecel Sayur? Kenapa pecel mudah selingkuh dengan kuliner lain? Buku ini akan membawa kita menelusuri etimologi kata pecel dari para tukang pecel masa lampau dalam prasasti dan Kakawin Jawa Kuno, lalu be', NULL, 5),
('9786239174033', 'Buku Jago Sepak Bola Untuk Pemula', 'REKI SIAGA AGUSTINA, M.PD., AIFO-P', 'Cemerlang', 2020, 'Olahraga merupakan aktivitas fisik yang disengaja dan direncanakan mulai dari arah, tujuan, waktu, dan lokasinya. Olahraga dapat dilakukan secara individu maupun beregu. Dengan rutin berolahraga, banyak manfaat olahraga yang bisa langsung Anda dapatkan.', NULL, 3),
('9786250100521', 'Menu Korea Anti Gagal Ala Paik Jong Won', 'Paik Jong Won', 'm&c!', 2020, 'Paik Jong Won sudah menyusunkan resep Menu Korea Anti Gagal dan tentunya enak di buku ini. Buku ini dlengkapi dengan foto step by step yang jelas, siapapun dijamin bisa membuatnya, bahkan bila kamu newbie sekalipun! Selamat memasak!', NULL, 5),
('SCOOP21769', 'Gempa, Kumpulan Artikel Ilmu dan Teknologi Majalah Tempo', 'Andrew MurrayDody Hidayat [et. al]', 'Tempo', 2013, 'Gempa, Kumpulan Artikel Ilmu dan Teknologi Majalah Tempo.', NULL, 7);

-- --------------------------------------------------------

--
-- Table structure for table `genre`
--

CREATE TABLE `genre` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `genre`
--

INSERT INTO `genre` (`id`, `name`) VALUES
(1, 'Children'),
(2, 'Politics'),
(3, 'Sports'),
(4, 'Religion'),
(5, 'Cooking'),
(6, 'Comic'),
(7, 'Magazine');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`ISBN`),
  ADD KEY `fk_book_genre_idx` (`genre_id`);

--
-- Indexes for table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `genre`
--
ALTER TABLE `genre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `fk_book_genre` FOREIGN KEY (`genre_id`) REFERENCES `genre` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
