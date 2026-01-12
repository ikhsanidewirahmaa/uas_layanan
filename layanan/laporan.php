<?php
include 'koneksi.php';

// Proses form jika disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $email = mysqli_real_escape_string($koneksi, $_POST['email']);
    $telepon = mysqli_real_escape_string($koneksi, $_POST['telepon']);
    $lokasi = mysqli_real_escape_string($koneksi, $_POST['lokasi']);
    $jenis_kerusakan = mysqli_real_escape_string($koneksi, $_POST['jenis_kerusakan']);
    $deskripsi = mysqli_real_escape_string($koneksi, $_POST['deskripsi']);
    $prioritas = mysqli_real_escape_string($koneksi, $_POST['prioritas']);
    $tanggal_lapor = date('Y-m-d H:i:s');
    $status = 'Pending';

    $query = "INSERT INTO laporan_kerusakan 
              (nama, email, telepon, lokasi, jenis_kerusakan, deskripsi, prioritas, tanggal_lapor, status) 
              VALUES 
              ('$nama', '$email', '$telepon', '$lokasi', '$jenis_kerusakan', '$deskripsi', '$prioritas', '$tanggal_lapor', '$status')";

    if (mysqli_query($koneksi, $query)) {
        $pesan_sukses = "Laporan kerusakan berhasil dikirim! Kami akan segera menindaklanjutinya.";
    } else {
        $pesan_error = "Error: " . mysqli_error($koneksi);
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lapor Kerusakan - Layanan Kerusakan Fasilitas</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar">
        <div class="container">
            <div class="logo">
                <i class="fas fa-tools"></i>
                <span>Layanan Kerusakan Fasilitas</span>
            </div>
            <ul class="nav-menu">
                <li><a href="index.php#home" class="nav-link">Beranda</a></li>
                <li><a href="index.php#layanan" class="nav-link">Layanan</a></li>
                <li><a href="index.php#tentang" class="nav-link">Tentang</a></li>
                <li><a href="index.php#kontak" class="nav-link">Kontak</a></li>
                <li><a href="laporan.php" class="nav-link active">Lapor Kerusakan</a></li>
            </ul>
            <div class="hamburger">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </nav>

    <!-- Page Header -->
    <section class="page-header">
        <div class="container">
            <h1><i class="fas fa-clipboard-list"></i> Lapor Kerusakan Fasilitas</h1>
            <p>Isi formulir di bawah untuk melaporkan kerusakan dengan detail yang lengkap</p>
        </div>
    </section>

    <!-- Form Laporan -->
    <section class="laporan-section">
        <div class="container">
            <div class="laporan-wrapper">
                <?php if (isset($pesan_sukses)): ?>
                    <div class="alert alert-success">
                        <i class="fas fa-check-circle"></i>
                        <div>
                            <strong>Sukses!</strong><br/>
                            <?php echo $pesan_sukses; ?>
                        </div>
                    </div>
                <?php endif; ?>

                <?php if (isset($pesan_error)): ?>
                    <div class="alert alert-error">
                        <i class="fas fa-exclamation-circle"></i>
                        <div>
                            <strong>Error!</strong><br/>
                            <?php echo $pesan_error; ?>
                        </div>
                    </div>
                <?php endif; ?>

                <form method="POST" class="laporan-form" id="laporanForm">
                    <div class="form-section-title">
                        <i class="fas fa-user-circle"></i> Data Pelapor
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="nama"><i class="fas fa-user"></i> Nama Lengkap <span class="required">*</span></label>
                            <input type="text" id="nama" name="nama" required placeholder="Contoh: Budi Santoso">
                        </div>
                        <div class="form-group">
                            <label for="email"><i class="fas fa-envelope"></i> Email <span class="required">*</span></label>
                            <input type="email" id="email" name="email" required placeholder="Contoh: budi@example.com">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="telepon"><i class="fas fa-phone"></i> Nomor Telepon <span class="required">*</span></label>
                            <input type="tel" id="telepon" name="telepon" required placeholder="Contoh: 08123456789">
                        </div>
                        <div class="form-group">
                            <label for="lokasi"><i class="fas fa-map-marker-alt"></i> Lokasi Kerusakan <span class="required">*</span></label>
                            <input type="text" id="lokasi" name="lokasi" required placeholder="Contoh: Ruang Meeting Lantai 2">
                        </div>
                    </div>

                    <div class="form-section-title">
                        <i class="fas fa-tools"></i> Detail Kerusakan
                    </div>

                    <div class="form-group">
                        <label for="jenis_kerusakan"><i class="fas fa-list"></i> Jenis Kerusakan <span class="required">*</span></label>
                        <select id="jenis_kerusakan" name="jenis_kerusakan" required>
                            <option value="">-- Pilih Jenis Kerusakan --</option>
                            <option value="Perbaikan Air"><i class="fas fa-water"></i> Perbaikan Air</option>
                            <option value="Perbaikan Listrik"><i class="fas fa-bolt"></i> Perbaikan Listrik</option>
                            <option value="Perbaikan Pintu & Jendela"><i class="fas fa-grip"></i> Perbaikan Pintu & Jendela</option>
                            <option value="Perbaikan Dinding & Cat"><i class="fas fa-paint-roller"></i> Perbaikan Dinding & Cat</option>
                            <option value="Perbaikan AC & Pendingin"><i class="fas fa-snowflake"></i> Perbaikan AC & Pendingin</option>
                            <option value="Pembersihan & Perawatan"><i class="fas fa-sparkles"></i> Pembersihan & Perawatan</option>
                            <option value="Lainnya">Lainnya</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="deskripsi"><i class="fas fa-align-left"></i> Deskripsi Kerusakan <span class="required">*</span></label>
                        <textarea id="deskripsi" name="deskripsi" required placeholder="Jelaskan detail kerusakan yang Anda alami, kapan terjadi, dan dampaknya..." rows="6"></textarea>
                        <small style="color: #666;"><i class="fas fa-info-circle"></i> Semakin detail, semakin cepat kami menangani</small>
                    </div>

                    <div class="form-group">
                        <label for="prioritas"><i class="fas fa-exclamation-triangle"></i> Tingkat Prioritas <span class="required">*</span></label>
                        <select id="prioritas" name="prioritas" required>
                            <option value="">-- Pilih Prioritas --</option>
                            <option value="Rendah"><i class="fas fa-check"></i> Rendah - Dapat ditangani dalam beberapa hari</option>
                            <option value="Sedang"><i class="fas fa-arrow-up"></i> Sedang - Perlu ditangani dalam 1-2 hari</option>
                            <option value="Tinggi"><i class="fas fa-arrow-up-up"></i> Tinggi - Perlu ditangani segera</option>
                            <option value="Darurat"><i class="fas fa-fire"></i> Darurat - Membutuhkan respons segera</option>
                        </select>
                    </div>

                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary btn-large">
                            <i class="fas fa-paper-plane"></i> Kirim Laporan
                        </button>
                        <a href="index.php" class="btn btn-secondary btn-large">
                            <i class="fas fa-arrow-left"></i> Kembali ke Beranda
                        </a>
                    </div>
                </form>

                <div class="laporan-info">
                    <h3><i class="fas fa-lightbulb"></i> Tips Melaporkan Kerusakan</h3>
                    <div class="info-grid">
                        <div class="info-box">
                            <i class="fas fa-check-circle"></i>
                            <p><strong>Jelaskan Detail</strong> - Semakin detail penjelasan, semakin cepat kami merespons</p>
                        </div>
                        <div class="info-box">
                            <i class="fas fa-phone"></i>
                            <p><strong>Nomor Aktif</strong> - Pastikan nomor telepon aktif untuk koordinasi</p>
                        </div>
                        <div class="info-box">
                            <i class="fas fa-clock"></i>
                            <p><strong>Waktu Respons</strong> - Kami akan menghubungi Anda dalam 2 jam untuk darurat</p>
                        </div>
                        <div class="info-box">
                            <i class="fas fa-shield-alt"></i>
                            <p><strong>Keamanan Data</strong> - Data Anda dijaga dengan aman dan tidak dibagikan</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <p>&copy; 2026 Layanan Kerusakan Fasilitas. Semua hak dilindungi.</p>
            <div class="social-links">
                <a href="https://www.instagram.com/saniaderaa?igsh=NXZwOXB2NnZldGZ4"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-whatsapp"></i></a>
            </div>
        </div>
    </footer>

    <script src="assets/js/script.js"></script>
</body>
</html>
