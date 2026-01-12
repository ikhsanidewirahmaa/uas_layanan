📚 PANDUAN SETUP LENGKAP
=========================

Website Layanan Kerusakan Fasilitas - Instalasi & Konfigurasi

## 1️⃣ PERSIAPAN AWAL

### Pastikan XAMPP Terinstall
- Download dari: https://www.apachefriends.org/
- Instalasi Apache, MySQL, PHP
- Jalankan XAMPP Control Panel

### Aktifkan Layanan
1. Klik "Start" pada Apache
2. Klik "Start" pada MySQL
3. Tunggu sampai berjalan (hijau)

## 2️⃣ SETUP DATABASE

### Langkah 1: Akses phpMyAdmin
- Buka browser: http://localhost/phpmyadmin
- Username: root (default)
- Password: kosong (default)

### Langkah 2: Buat Database
```sql
CREATE DATABASE layanan_kerusakan;
USE layanan_kerusakan;
```

ATAU

1. Di phpMyAdmin, klik "New"
2. Ketik nama: `layanan_kerusakan`
3. Klik "Create"

### Langkah 3: Import SQL File
1. Pilih database `layanan_kerusakan`
2. Klik tab "Import"
3. Klik "Choose File"
4. Pilih file `database.sql` dari folder project
5. Klik "Go/Import"

Tunggu sampai semua tabel berhasil dibuat ✓

## 3️⃣ COPY FILE PROJECT

### Lokasi Folder
- XAMPP htdocs folder: `C:\xampp\htdocs\`

### Struktur Folder Final
```
C:\xampp\htdocs\layanan\
├── index.php
├── laporan.php
├── admin.php
├── koneksi.php
├── database.sql
├── README.md
├── SETUP.md (file ini)
├── config.json
└── assets/
    ├── css/
    │   └── style.css
    └── js/
        └── script.js
```

Semua file sudah tersedia di folder ini ✓

## 4️⃣ KONFIGURASI (OPSIONAL)

### Edit File koneksi.php
Jika data MySQL Anda berbeda:

```php
$host     = "localhost";      // Host MySQL
$user     = "root";           // Username MySQL
$password = "";               // Password MySQL
$db       = "layanan_kerusakan"; // Database name
```

Sesuaikan dengan konfigurasi server Anda.

## 5️⃣ AKSES WEBSITE

### URL Halaman
1. **Halaman Utama**
   - URL: http://localhost/layanan/
   - File: index.php

2. **Form Laporan**
   - URL: http://localhost/layanan/laporan.php
   - File: laporan.php

3. **Panel Admin**
   - URL: http://localhost/layanan/admin.php
   - File: admin.php

4. **phpMyAdmin** (Database Management)
   - URL: http://localhost/phpmyadmin

### Bookmark untuk Kemudahan
Simpan URL di bookmark browser untuk akses cepat

## 6️⃣ TEST FUNGSIONALITAS

### Test Halaman Utama
- [ ] Buka http://localhost/layanan/
- [ ] Cek navigasi menu
- [ ] Cek responsiveness (resize browser)
- [ ] Cek semua link berfungsi

### Test Form Laporan
- [ ] Buka http://localhost/layanan/laporan.php
- [ ] Isi semua field
- [ ] Klik "Kirim Laporan"
- [ ] Cek alert "Laporan berhasil dikirim"
- [ ] Cek data di phpMyAdmin

### Test Admin Dashboard
- [ ] Buka http://localhost/layanan/admin.php
- [ ] Cek statistik menampilkan data
- [ ] Cek tabel laporan
- [ ] Test fitur search
- [ ] Test filter status
- [ ] Klik "Lihat Detail"
- [ ] Klik "Edit Status"

## 7️⃣ TROUBLESHOOTING

### Error: Koneksi Gagal
**Solusi:**
```
1. Pastikan MySQL sudah dijalankan
2. Cek password MySQL di koneksi.php
3. Cek nama database sudah benar
4. Lihat error message di halaman
```

### Error: Table not found
**Solusi:**
```
1. Pastikan database.sql sudah di-import
2. Buka phpMyAdmin cek tabel exists
3. Re-import database.sql
```

### Error: File not found
**Solusi:**
```
1. Cek struktur folder sudah sesuai
2. Pastikan assets/ folder ada
3. Cek file css/style.css dan js/script.js
```

### Error: Form tidak tersimpan
**Solusi:**
```
1. Cek MySQL aktif
2. Cek database permissions
3. Lihat error message di page
4. Cek browser console (F12)
```

## 8️⃣ CUSTOMIZATION

### Ubah Informasi Perusahaan

#### 1. Logo & Judul (index.php)
Cari:
```html
<span>Layanan Kerusakan Fasilitas</span>
```
Ganti dengan nama perusahaan Anda

#### 2. Nomor Telepon (index.php)
Cari:
```html
<p>+62 812 3456 7890</p>
```
Ganti dengan nomor Anda

#### 3. Email (index.php)
Cari:
```html
<p>info@layanankerusakan.com</p>
```
Ganti dengan email Anda

#### 4. Alamat (index.php)
Cari:
```html
<p>Jl. Raya Utama No. 123, Jakarta</p>
```
Ganti dengan alamat Anda

### Ubah Warna (Opsional)
Di file `assets/css/style.css` cari:
```css
:root {
    --primary-color: #1e3a5f;      /* Warna utama */
    --secondary-color: #ff6b35;    /* Warna sekunder */
    --accent-color: #f7931e;       /* Warna accent */
}
```

Ganti dengan warna pilihan Anda (format HEX)

## 9️⃣ BACKUP & MAINTENANCE

### Backup Database
1. Buka phpMyAdmin
2. Pilih database `layanan_kerusakan`
3. Klik tab "Export"
4. Klik "Go"
5. File SQL akan terunduh

### Backup Folder Project
1. Copy folder `layanan` ke lokasi aman
2. Lakukan secara berkala (mingguan)

## 🔟 TIPS KEAMANAN

### 1. Ubah Akses Admin
Tambahkan di `admin.php` (baris awal):
```php
<?php
// Proteksi halaman admin
session_start();
if (!isset($_SESSION['admin'])) {
    header('Location: index.php');
    exit;
}
?>
```

### 2. Validasi Input
Sudah ada di `laporan.php`:
- Validasi HTML5 (form attributes)
- Validasi PHP (mysqli_real_escape_string)
- Validasi JavaScript (form submission)

### 3. Error Reporting
Di `koneksi.php` sudah ada pengecekan koneksi
Warning messages akan ditampilkan jika ada error

## 1️⃣1️⃣ FITUR LANJUTAN (OPTIONAL)

### Tambah Email Notification
Dibutuhkan:
- SMTP server
- PHPMailer library
- Konfigurasi email

### Tambah User Login
Dibutuhkan:
- Session management
- Password hashing (bcrypt)
- User table di database

### Tambah File Upload
Dibutuhkan:
- File validation
- File storage folder
- Security checks

## 🚀 SIAP DIGUNAKAN!

Jika semua langkah selesai, website Anda sudah siap digunakan:

✅ Database sudah tersetup
✅ Halaman depan berfungsi
✅ Form laporan berfungsi
✅ Admin dashboard berfungsi
✅ Data tersimpan di database

---

## 📞 BANTUAN LEBIH LANJUT

Jika ada masalah:
1. Check browser console (F12)
2. Check error message di halaman
3. Check phpMyAdmin untuk data
4. Check log Apache
5. Read documentation di README.md

---

**Selamat! Website Anda sudah ready to use! 🎉**

*Created: 12 Januari 2026*
