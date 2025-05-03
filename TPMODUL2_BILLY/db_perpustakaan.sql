-- Database: `db_perpustakaan`
CREATE DATABASE IF NOT EXISTS `db_perpustakaan`;
USE `db_perpustakaan`;

-- Struktur Tabel untuk `tb_buku`
CREATE TABLE IF NOT EXISTS `tb_buku` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(25) NOT NULL,
  `penulis` varchar(25) NOT NULL,
  `tahun_terbit` int(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Data Dummy untuk Testing
INSERT INTO `tb_buku` (`judul`, `penulis`, `tahun_terbit`) VALUES
('Belajar PHP', 'John Doe', 2021),
('Pemrograman Web', 'Jane Doe', 2020),
('Database Dasar', 'Ali Ahmad', 2019),
('Algoritma Pemula', 'Siti Aisyah', 2022);
