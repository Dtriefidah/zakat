-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Sep 16, 2017 at 02:05 PM
-- Server version: 5.5.42
-- PHP Version: 5.6.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zakat`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`) VALUES
(1, 'Inspirasi', 'inspirasi-1'),
(2, 'Mitra', 'mitra-2');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `category_id`, `title`, `slug`, `content`, `image`, `created_at`) VALUES
(1, 1, 'Manfaat Infuse Water', 'manfaat-infuse-water-1', '<div><span style="font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif; font-size: 1rem;">Bagi anda yang baru mendengar istilah ini, mungkin bertanya apa itu infused water? Infused water sendiri merupakan suatu jenis metode pemberian nutrisi-nutrisi tambahan pada air mineral biasa agar menjadi lebih bermanfaat bagi kesehatan tubuh.</span><br></div><div><br></div><div>Biasanya cara melakukannya adalah dengan menambahkan irisan atau potongan dari berbagai jenis manfaat buah-buahan yang memiliki asam dan segar, seperti : jeruk, lemon, apel, mentimun, apel, nanas, dan strawberry. Berikut ini adalah beberapa manfaat dari infused water.</div>', 'uploads/news/1/1505278796815_2017-09-08_07-56-47_254535.jpg', '2017-09-13 07:00:00'),
(2, 1, 'Anjuran Rasul Untuk Berdagang', 'anjuran-rasul-untuk-berdagang-2', '<div>Ustadz Erick Yusuf menjabarkan alasan kenapa Nabi Muhammad SAW menganjurkan berdagang kepada umat Islam. Ustadz Erick menyebut, Nabi menilai aktivitas berdagang adalah aktivitas yang punya banyak manfaat bagi banyak orang.</div><div><br></div><div>Sebab, berdagang adalah salah satu aktivitas yang dapat memenuhi kebutuhan orang banyak. “Kenapa sunah Rasulullah SAW itu anjurkan berdagang, karena banyak manfaatnya. Misalnya Anda punya uang Rp10 juta, itu uang mau dimanfaatkan jadi apa kalau tidak ada pedagang,” ujar Erick.</div><div><br></div><div>Untuk itu, kata Ustadz Erick, perlunya kalangan muda Islam untuk dimotovasi agar giat berwirausaha dan dapat menjalankan anjuran nabi. Ia juga menilai, bekerja keras dan berwirausaha sejak masa muda akan membuat seseorang dapat tumbuh menjadi sosok yang matang, karena bekerja keras akan memberikan banyak pelajaran penting dalam hidup. Hal ini tentunya akan membuat kalangan muda akan tumbuh menjadi orang dewasa yang unggulan.</div>', 'uploads/news/2/1505287590225_2017-09-08_06-36-50_658708-300x178.jpg', '2017-09-13 09:26:32');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `template` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `title`, `slug`, `content`, `image`, `template`, `created_at`) VALUES
(1, 'Sejarah GYD', 'sejarah-gyd', '<p><b>2009</b>&nbsp;</p><p>Berawal dari rasa galau beberapa founding father yayasan GYD melihat kondisi anak-anak yang terpaksa putus sekolah atau tidak sekolah sama sekali karena harus bekerja untuk menyambung hidupnya di daerah kampung Dadap, pemukiman kumuh persis ditengah-tengah megahnya perumahan Bumi Serpong Damai. Setelah beberapa kali mengadakan pertemuan, dibentuklah lembaga sosial yang concern pada masalah sosial khususnya anak-anak. Dengan menempati sebuah rumah di Jl. Magnolia 1 Sektor 1.2 BSD yang digunakan juga sebagai asrama yatim dan dhuafa terbentuklah organisasi sosial yang bernama Yayasan Griya Yatim dan Dhuafa. Pada awal berdirinya, GYD dengan 6 orang karyawan menampung 9 orang anak yang tinggal diasrama dan membina sekitar 15-an anak yang semuanya berasal dari kampung Dadap. Karena dukungan masyarakat yang terus meluas mendorong dilakukannya pengelolaan organisasi ini lebih baik dirintislah program beasiswa pendidikan yatim dan dhuafa, santunan kesehatan, layanan donasi barang layak pakai dan lain-lain. Animo masyarakat pada perlunya organisasi kemanusiaan ternyata cukup besar. Masyarakat memandang penting misi sosial ini diteruskan bahkan untuk kiprah yang lebih luas. Hanya berselang beberapa bulan, tepatnya bulan Agustus 2009 asrama kedua di Jl. Elang Raya – Bintaro Jaya dibuka. Pada akhir tahun 2009 GYD telah membina lebih dari 100 anak asuh.&nbsp;</p><p><b>2010</b></p><p>Pertumbuhan asrama meningkat. Kantor pelayanan dibuka didaerah Bintaro. Ekspansi mulai melebar ke Jakarta dan Bekasi dengan dibukanya asrama ketiga di Cibubur – Jakarta Timur dan asrama keempat di Kranggan – Bekasi. Dimulainya pembangunan sistem Teknologi Informasi untuk peningkatan mutu pelayanan. Hampir seluruh kantor cabang telah tersambung secara online. Website www.griyayatim.com dirilis dan disempurnakan, menggantikan alamat situs sebelumnya di www.griyayatim.org. Menjelang akhir tahun 2010, regenerasi puncak pimpinan diestafetkan dari Adi Prabowo beralih ke Haryono. Babak sejarah baru dimulai. GYD melakukan serangkaian adaptasi dan perubahan terkait visi, misi dan value yang menjadi budaya di GYD. Pembelajaran untuk menjadi organisasi yang amanah dan profesional terus dilakukan, salah satunya dengan penguatan program-program peningkatan kualitas sumber daya manusia melalui pelatihan, training, seminar dan lain-lain. Pada akhir tahun 2010 GYD membina lebih dari 800 binaan yang terdiri dari anak yatim dan dhuafa, janda dan lansia serta mengasuh 50an anak yang tinggal diseluruh asrama yatim dan dhuafanya.&nbsp;</p><p><b>2011</b></p><p>Implementasi program GYD mulai difokuskan hingga mengerucut pada enam induk yaitu Pendidikan, Sosial, Pemberdayaan, Kemanusiaan, Lingkungan dan Wakaf. Daerah yang ada disekitar asrama GYD difokuskan untuk penyaluran yang terintegrasi dibidang pendidikan, sosial, kesehatan, pelatihan keterampilan dan pemberdayaan ekonomi secara terpadu. Dengan bantuan koordinator mustahik sebagai pendamping, KBA (Komunitas berbasis asrama) menjadi pusat penyaluran program sehingga lebih terukur dan terkontrol. Pada peringatan Milad kedua tanggal 9 Juni 2011, Griya Yatim dan Dhuafa melaunching logo dan identitas barunya menggantikan logo sebelumnya. “Dengan keyakinan kuat untuk bisa memberikan manfaat yang semakin besar, GYD berdaya upaya untuk menjadi organisasi terdepan di indonesia yang dapat menghantarkan anak yatim dan dhuafa meraih masa depannya yang lebih baik.”&nbsp;</p><p><b>2012</b></p><p>Atas inovasi yang dilakukan dalam pola mengasuh dan memberdayakan anak yatim dan dhuafa, GYD mendapat pengakuan dari Museum Rekor Indonesia (MURI) sebagai lembaga sosial pertama di dunia yang menggunakan kartu ATM dalam menyalurkan bantuan kepada penerima manfaat-nya. Sebagai lembaga yang mengusung misi amanah dan profesional, atas inisiatif sendiri GYD juga telah diaudit oleh institusi akuntan publik dan pada audit perdananya ini GYD berhasil memperoleh predikat “Wajar Tanpa Pengecualian”. Kami bertekad agar ditahun ini keberadaan GYD dapat dirasakan oleh semakin banyak orang Indonesia termasuk dengan pembukaan jaringan atau asrama dan kantor pelayanan di 10 propinsi. “Dengan keyakinan kuat untuk bisa memberikan manfaat yang semakin besar, GYD berdaya upaya untuk menjadi organisasi terdepan di indonesia yang dapat menghantarkan anak yatim dan dhuafa meraih masa depannya yang lebih baik.”</p>', 'uploads/pages/1/1505435299811_All_American_EFX_-_Kre-Alkalyn_EFX_-_120_Capsules_-_1_1.jpg', 'default', '2017-09-15 02:23:56'),
(2, 'Visi dan Misi', 'visi-dan-misi', '<p>“Menjadi organisasi sosial terdepan dalam mewujudkan masa depan Yatim &amp; Dhuafa“&nbsp;</p><p><br></p><p>MISI&nbsp;</p><p>1. Pemberdayaan Potensi Yatim &amp; Dhuafa.&nbsp;</p><p>2. Menjadi fasilitator yang memiliki integritas.&nbsp;</p><p>3. Menjadi organisasi yang profesional dan modern.&nbsp;</p><p>4. Menjadi organisasi yang lebih peduli terhadap lingkungan hidup.</p>', '', 'default', '2017-09-15 04:50:46'),
(3, 'Program Kegiatan', 'program-kegiatan', '<p>Program Kegiatan Content</p>', '', 'default', '2017-09-15 16:42:28'),
(4, 'Landasan Legal', 'landasan-legal', '<p>Landasan Legal Content</p>', '', 'default', '2017-09-15 16:48:23'),
(5, 'Hubungi Kami', 'hubungi-kami', '<h3 style="box-sizing: border-box; font-family: FontAwesome; margin-top: 20px; margin-bottom: 10px; font-size: 24px;">Kantor Pelayanan</h3><p style="box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; font-family: FontAwesome; font-size: 20px;">Virgin Island NA-7 De Latinos, BSD Rawa Buntu Kec. serpong Tangsel</p><ul><li style="box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; font-family: FontAwesome; font-size: 20px;">Phone : 021 9355 5981</li><li style="box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; font-family: FontAwesome; font-size: 20px;">E-mail :&nbsp;<a href="mailto:griyayatimdhuafa@gmail.com" style="background: rgb(255, 255, 255); box-sizing: border-box;">griyayatimdhuafa@gmail.com</a></li><li style="box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; font-family: FontAwesome; font-size: 20px;">Operational : Senin - Jum''at: 08.00 - 17.00 wib</li></ul>', '', 'contact_us', '2017-09-15 16:56:19'),
(6, 'Info Zakat', 'info-zakat', '<p>Info Zakat Content</p>', '', 'default', '2017-09-16 12:14:28');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `type` enum('Zakat Agriculture','Zakat Farm Animals','Zakat Gold and Silver','Zakat Money','Zakat Rikaz','Zakat Trading') COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `images` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `user_id`, `title`, `slug`, `content`, `created_at`) VALUES
(1, 1, 'anak saya sariawan', 'anak-saya-sariawan-1', 'dok saya mau bertanya... anak bayi saya umur 4 bulan 2 minggu... anak saya sariawan dok dan saya beli obat nymiko nystatin suspension... apakan anak saya boleh minum obat nymiko dok..mohon jelaskan dok saya masih belom paham dengan kegunaanya?', '2017-09-16 13:43:49'),
(2, 1, 'Sudah lama saya mengalami haid dengan darah yang menggumpal', 'sudah-lama-saya-mengalami-haid-dengan-darah-yang-menggumpal-2', 'Dok saya mau bertanya.Sudah lama saya mengalami haid dengan darah yang menggumpal dan setelah masa haid berhenti,saya mengalami keputihan yang sering terjadi. Mengapa begitu dok? Apakah berbahaya? Minta penjelasannya dok. Terimakasih', '2017-09-16 13:44:16');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `status` enum('Paid','Unpaid') COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transaction_detail`
--

CREATE TABLE `transaction_detail` (
  `id` int(11) NOT NULL,
  `transaction_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `sub_total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_type` enum('admin','user') COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `phone_number` varchar(16) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_type`, `email`, `password`, `name`, `address`, `phone_number`) VALUES
(1, 'admin', 'admin@email.com', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'Jakarta', '081122223333'),
(2, 'user', 'redzjovi@gmail.com', 'defac44447b57f152d14f30cea7a73cb', 'Jovi', '', '087877118199');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `question_id` (`question_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `transaction_detail`
--
ALTER TABLE `transaction_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaction_id` (`transaction_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `transaction_detail`
--
ALTER TABLE `transaction_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `answers`
--
ALTER TABLE `answers`
  ADD CONSTRAINT `answers_ibfk_1` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`),
  ADD CONSTRAINT `answers_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `transaction_detail`
--
ALTER TABLE `transaction_detail`
  ADD CONSTRAINT `transaction_detail_ibfk_1` FOREIGN KEY (`transaction_id`) REFERENCES `transactions` (`id`),
  ADD CONSTRAINT `transaction_detail_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
