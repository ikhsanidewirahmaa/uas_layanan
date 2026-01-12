-- ========== DATABASE LAYANAN KERUSAKAN FASILITAS ==========

-- Buat Database
CREATE DATABASE IF NOT EXISTS layanan_kerusakan;
USE layanan_kerusakan;

-- ========== TABEL LAPORAN KERUSAKAN ==========
CREATE TABLE IF NOT EXISTS laporan_kerusakan (
    id_laporan INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    telepon VARCHAR(20) NOT NULL,
    lokasi VARCHAR(255) NOT NULL,
    jenis_kerusakan VARCHAR(100) NOT NULL,
    deskripsi LONGTEXT NOT NULL,
    prioritas ENUM('Rendah', 'Sedang', 'Tinggi', 'Darurat') NOT NULL,
    tanggal_lapor DATETIME DEFAULT CURRENT_TIMESTAMP,
    status ENUM('Pending', 'Diproses', 'Selesai', 'Batal') DEFAULT 'Pending',
    catatan_teknis LONGTEXT,
    tanggal_diperbarui DATETIME ON UPDATE CURRENT_TIMESTAMP,
    INDEX idx_status (status),
    INDEX idx_prioritas (prioritas),
    INDEX idx_tanggal (tanggal_lapor)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ========== TABEL TEKNISI ==========
CREATE TABLE IF NOT EXISTS teknisi (
    id_teknisi INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    spesialisasi VARCHAR(100) NOT NULL,
    nomor_telepon VARCHAR(20),
    email VARCHAR(100),
    status ENUM('Aktif', 'Nonaktif') DEFAULT 'Aktif',
    tanggal_bergabung DATETIME DEFAULT CURRENT_TIMESTAMP,
    INDEX idx_spesialisasi (spesialisasi),
    INDEX idx_status (status)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ========== TABEL PENUGASAN TEKNISI ==========
CREATE TABLE IF NOT EXISTS penugasan_teknisi (
    id_penugasan INT AUTO_INCREMENT PRIMARY KEY,
    id_laporan INT NOT NULL,
    id_teknisi INT NOT NULL,
    tanggal_penugasan DATETIME DEFAULT CURRENT_TIMESTAMP,
    tanggal_selesai DATETIME,
    status_pekerjaan ENUM('Belum Dimulai', 'Sedang Dikerjakan', 'Selesai', 'Tertunda') DEFAULT 'Belum Dimulai',
    biaya_perbaikan DECIMAL(10, 2),
    FOREIGN KEY (id_laporan) REFERENCES laporan_kerusakan(id_laporan) ON DELETE CASCADE,
    FOREIGN KEY (id_teknisi) REFERENCES teknisi(id_teknisi) ON DELETE RESTRICT,
    INDEX idx_status_pekerjaan (status_pekerjaan),
    INDEX idx_tanggal_penugasan (tanggal_penugasan)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ========== TABEL KONTAK ==========
CREATE TABLE IF NOT EXISTS pesan_kontak (
    id_pesan INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    telepon VARCHAR(20),
    pesan LONGTEXT NOT NULL,
    tanggal_dikirim DATETIME DEFAULT CURRENT_TIMESTAMP,
    status_baca ENUM('Belum Dibaca', 'Dibaca') DEFAULT 'Belum Dibaca',
    INDEX idx_status_baca (status_baca),
    INDEX idx_tanggal (tanggal_dikirim)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ========== TABEL KATEGORI KERUSAKAN ==========
CREATE TABLE IF NOT EXISTS kategori_kerusakan (
    id_kategori INT AUTO_INCREMENT PRIMARY KEY,
    nama_kategori VARCHAR(100) NOT NULL UNIQUE,
    deskripsi LONGTEXT,
    icon VARCHAR(50),
    status ENUM('Aktif', 'Nonaktif') DEFAULT 'Aktif'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ========== INSERT DATA KATEGORI KERUSAKAN ==========
INSERT INTO kategori_kerusakan (nama_kategori, deskripsi, icon, status) VALUES
('Perbaikan Air', 'Perbaikan pipa, keran, dan sistem plumbing', 'fa-faucet', 'Aktif'),
('Perbaikan Listrik', 'Servis listrik, penggantian kabel, dan perbaikan instalasi', 'fa-lightbulb', 'Aktif'),
('Perbaikan Pintu & Jendela', 'Perbaikan dan perawatan pintu, jendela, dan kaca', 'fa-door-open', 'Aktif'),
('Perbaikan Dinding & Cat', 'Perbaikan retak, pengecatan ulang, dan finishing dinding', 'fa-hammer', 'Aktif'),
('Perbaikan AC & Pendingin', 'Servis AC, perbaikan pendingin, dan sistem ventilasi', 'fa-wind', 'Aktif'),
('Pembersihan & Perawatan', 'Pembersihan fasilitas dan perawatan rutin', 'fa-broom', 'Aktif');

-- ========== TABEL RIWAYAT AKTIVITAS ==========
CREATE TABLE IF NOT EXISTS riwayat_aktivitas (
    id_aktivitas INT AUTO_INCREMENT PRIMARY KEY,
    id_laporan INT,
    tipe_aktivitas VARCHAR(100),
    deskripsi LONGTEXT,
    tanggal_aktivitas DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_laporan) REFERENCES laporan_kerusakan(id_laporan) ON DELETE CASCADE,
    INDEX idx_tanggal (tanggal_aktivitas)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ========== CONTOH DATA TEKNISI ==========
INSERT INTO teknisi (nama, spesialisasi, nomor_telepon, email, status) VALUES
('Budi Santoso', 'Perbaikan Listrik', '08123456789', 'budi@layanan.com', 'Aktif'),
('Siti Nurhaliza', 'Perbaikan Air', '08129876543', 'siti@layanan.com', 'Aktif'),
('Ahmad Wijaya', 'Perbaikan Dinding & Cat', '08127654321', 'ahmad@layanan.com', 'Aktif'),
('Rina Dewi', 'Perbaikan AC & Pendingin', '08125555555', 'rina@layanan.com', 'Aktif'),
('Hendra Kusuma', 'Perbaikan Pintu & Jendela', '08124444444', 'hendra@layanan.com', 'Aktif');
