# 🛠️ Website Layanan Kerusakan Fasilitas

Website profesional untuk mengelola laporan kerusakan fasilitas dengan sistem database yang terstruktur.

## 📋 Fitur Utama

### 1. **Halaman Depan (index.php)**
- Hero section yang menarik
- Daftar layanan dengan icon dan deskripsi
- Informasi tentang perusahaan
- Kontak langsung
- Responsive design untuk semua perangkat

### 2. **Form Laporan Kerusakan (laporan.php)**
- Form pengisian laporan kerusakan yang user-friendly
- Validasi data real-time
- Kategori jenis kerusakan lengkap
- Tingkat prioritas kerusakan
- Notifikasi sukses/error
- Database integration untuk menyimpan laporan

### 3. **Panel Admin (admin.php)**
- Dashboard dengan statistik laporan
- Tabel laporan lengkap dengan filter dan search
- Fitur edit status laporan
- Lihat detail lengkap setiap laporan
- Modal untuk update catatan teknis
- Responsive dashboard

## 🗄️ Struktur Database

```
layanan_kerusakan/
├── laporan_kerusakan (tabel utama untuk laporan)
├── teknisi (data teknisi)
├── penugasan_teknisi (penugasan teknisi ke laporan)
├── kategori_kerusakan (kategori layanan)
├── pesan_kontak (pesan dari halaman kontak)
└── riwayat_aktivitas (log aktivitas)
```

## 📁 Struktur Folder

```
layanan/
├── index.php                    # Halaman utama
├── laporan.php                  # Form laporan kerusakan
├── admin.php                    # Panel admin
├── koneksi.php                  # Database connection
├── database.sql                 # Script database
├── assets/
│   ├── css/
│   │   └── style.css           # Stylesheet utama
│   └── js/
│       └── script.js           # JavaScript functionality
└── README.md                    # File dokumentasi ini
```

## 🚀 Cara Instalasi

### 1. Setup Database

1. Buka phpMyAdmin (http://localhost/phpmyadmin)
2. Buat database baru atau gunakan yang sudah ada
3. Buka database `layanan_kerusakan`
4. Klik "Import" → pilih file `database.sql`
5. Klik "Go" untuk menjalankan script

### 2. Konfigurasi Koneksi

File `koneksi.php` sudah dikonfigurasi untuk:
- Host: localhost
- User: root
- Password: (kosong)
- Database: layanan_kerusakan

Jika berbeda, silakan ubah sesuai konfigurasi XAMPP Anda.

### 3. Akses Website

- **Halaman Utama**: http://localhost/layanan/
- **Lapor Kerusakan**: http://localhost/layanan/laporan.php
- **Panel Admin**: http://localhost/layanan/admin.php

## 📱 Fitur Halaman

### Halaman Utama (index.php)
- **Navigation Bar**: Menu sticky dengan logo dan link
- **Hero Section**: Banner utama dengan CTA button
- **Layanan Section**: 6 kategori layanan dengan icon FontAwesome
- **Tentang Section**: Informasi perusahaan dan statistik
- **Kontak Section**: Form kontak dan informasi kontak
- **Footer**: Link media sosial dan copyright

### Halaman Laporan (laporan.php)
- Form dengan field:
  - Nama Lengkap (required)
  - Email (required)
  - Nomor Telepon (required)
  - Lokasi Kerusakan (required)
  - Jenis Kerusakan (select dropdown)
  - Deskripsi Kerusakan (textarea)
  - Tingkat Prioritas (select)
- Validasi input PHP & HTML5
- Penyimpanan otomatis ke database
- Alert sukses/error

### Panel Admin (admin.php)
- Dashboard dengan 4 kartu statistik:
  - Total Laporan
  - Laporan Pending
  - Laporan Diproses
  - Laporan Selesai
- Tabel laporan dengan kolom:
  - No, Nama, Jenis Kerusakan, Lokasi
  - Prioritas (badge warna)
  - Status (badge warna)
  - Tanggal
  - Aksi (Lihat, Edit)
- Filter berdasarkan status
- Search berdasarkan nama/email/lokasi
- Modal untuk lihat detail lengkap
- Modal untuk update status dan catatan teknis

## 🎨 Styling & Design

### Warna Utama
- Primary Color: #1e3a5f (Navy Blue)
- Secondary Color: #ff6b35 (Orange)
- Accent Color: #f7931e (Golden)
- Light Background: #f5f5f5

### Font
- Font Family: Segoe UI, Tahoma, Geneva, Verdana, sans-serif
- Icons: FontAwesome 6.0.0

### Responsive Breakpoints
- Desktop: 1200px
- Tablet: 768px
- Mobile: 480px

## 🔧 Teknologi yang Digunakan

- **Frontend**: HTML5, CSS3, JavaScript (Vanilla)
- **Backend**: PHP 7.4+
- **Database**: MySQL
- **Icons**: FontAwesome 6.0
- **Server**: Apache (XAMPP)

## 📝 Jenis Kerusakan (Kategori Layanan)

1. **Perbaikan Air** - Perbaikan pipa, keran, dan sistem plumbing
2. **Perbaikan Listrik** - Servis listrik, penggantian kabel, dan instalasi
3. **Perbaikan Pintu & Jendela** - Perbaikan dan perawatan pintu, jendela, kaca
4. **Perbaikan Dinding & Cat** - Perbaikan retak, pengecatan ulang, finishing
5. **Perbaikan AC & Pendingin** - Servis AC, perbaikan pendingin, ventilasi
6. **Pembersihan & Perawatan** - Pembersihan fasilitas dan perawatan rutin

## ⚡ Tingkat Prioritas

1. **Rendah** - Dapat ditangani dalam beberapa hari
2. **Sedang** - Perlu ditangani dalam 1-2 hari
3. **Tinggi** - Perlu ditangani segera
4. **Darurat** - Membutuhkan respons segera

## 📊 Status Laporan

1. **Pending** - Laporan baru yang belum diproses
2. **Diproses** - Laporan sedang ditangani
3. **Selesai** - Perbaikan sudah selesai
4. **Batal** - Laporan dibatalkan

## 🔐 Keamanan

- Menggunakan `mysqli_real_escape_string()` untuk mencegah SQL Injection
- Validasi input di sisi client dan server
- Form fields yang required
- Error handling untuk database connection

## 📞 Informasi Kontak Default

- **Telepon**: +62 812 3456 7890
- **Email**: info@layanankerusakan.com
- **Alamat**: Jl. Raya Utama No. 123, Jakarta

*Silakan ubah sesuai dengan informasi perusahaan Anda*

## 🎯 Tips Penggunaan

1. **Untuk Pengguna**: Akses halaman utama, isi form laporan dengan detail yang jelas
2. **Untuk Admin**: Gunakan panel admin untuk monitor dan manage semua laporan
3. **Untuk Update Status**: Cukup klik tombol Edit pada baris laporan

## 🔄 Workflow Laporan

1. Pengguna mengisi form laporan
2. Data tersimpan di database dengan status "Pending"
3. Admin menerima laporan di dashboard
4. Admin update status ke "Diproses"
5. Tim teknisi melakukan perbaikan
6. Admin update status ke "Selesai" dengan catatan teknis
7. Pengguna dapat melihat history laporan mereka

## 📈 Pengembangan Lebih Lanjut

Fitur yang bisa ditambahkan:
- [ ] Email notification kepada admin & pengguna
- [ ] Upload foto kerusakan
- [ ] Rating & review dari pengguna
- [ ] Tracking real-time dengan GPS
- [ ] Invoice/Receipt untuk perbaikan
- [ ] User login system
- [ ] API integration
- [ ] Mobile app
- [ ] Live chat support
- [ ] Scheduling system untuk teknisi

## 📄 Lisensi

Gratis untuk digunakan dan dikembangkan sesuai kebutuhan.

---

**Dibuat dengan ❤️ untuk memudahkan manajemen layanan kerusakan fasilitas**

*Last Updated: 12 Januari 2026*
