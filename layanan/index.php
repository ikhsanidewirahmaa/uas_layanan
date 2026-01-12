<?php
include 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Layanan Kerusakan Fasilitas - Pusat Perbaikan Terpercaya</title>
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
                <li><a href="#home" class="nav-link active">Beranda</a></li>
                <li><a href="#layanan" class="nav-link">Layanan</a></li>
                <li><a href="#tentang" class="nav-link">Tentang</a></li>
                <li><a href="#kontak" class="nav-link">Kontak</a></li>
                <li><a href="laporan.php" class="nav-link">Lapor Kerusakan</a></li>
            </ul>
            <div class="hamburger">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="home" class="hero">
        <div class="container">
            <div class="hero-content">
                <div class="hero-icon-top">
                    <i class="fas fa-wrench"></i>
                </div>
                <h1>Layanan Kerusakan Fasilitas Terpercaya</h1>
                <p>Solusi cepat dan profesional untuk semua kebutuhan perbaikan fasilitas Anda</p>
                <div class="hero-buttons">
                    <a href="laporan.php" class="btn btn-primary">
                        <i class="fas fa-clipboard-list"></i> Laporkan Kerusakan Sekarang
                    </a>
                    <a href="#layanan" class="btn btn-secondary">
                        <i class="fas fa-arrow-down"></i> Lihat Layanan
                    </a>
                </div>
                <div class="hero-stats">
                    <div class="hero-stat">
                        <span class="stat-icon"><i class="fas fa-check-circle"></i></span>
                        <span class="stat-text">1000+ Perbaikan</span>
                    </div>
                    <div class="hero-stat">
                        <span class="stat-icon"><i class="fas fa-users"></i></span>
                        <span class="stat-text">500+ Klien</span>
                    </div>
                    <div class="hero-stat">
                        <span class="stat-icon"><i class="fas fa-clock"></i></span>
                        <span class="stat-text">24/7 Siaga</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Layanan Section -->
    <section id="layanan" class="layanan">
        <div class="container">
            <div class="section-header">
                <h2><i class="fas fa-briefcase"></i> Layanan Kami</h2>
                <p>Solusi lengkap untuk semua kebutuhan perbaikan fasilitas</p>
            </div>
            <div class="layanan-grid">
                <div class="layanan-card" data-service="air">
                    <div class="layanan-icon">
                        <i class="fas fa-water"></i>
                    </div>
                    <h3>Perbaikan Air</h3>
                    <p>Perbaikan pipa, keran, WC, dan sistem plumbing profesional</p>
                    <div class="card-footer">
                        <i class="fas fa-phone"></i> Hubungi Ahli
                    </div>
                </div>

                <div class="layanan-card" data-service="listrik">
                    <div class="layanan-icon">
                        <i class="fas fa-bolt"></i>
                    </div>
                    <h3>Perbaikan Listrik</h3>
                    <p>Servis listrik, instalasi panel, penggantian kabel dan socket</p>
                    <div class="card-footer">
                        <i class="fas fa-phone"></i> Hubungi Ahli
                    </div>
                </div>

                <div class="layanan-card" data-service="pintu">
                    <div class="layanan-icon">
                        <i class="fas fa-grip"></i>
                    </div>
                    <h3>Pintu & Jendela</h3>
                    <p>Perbaikan pintu, jendela, kaca, dan kunci yang rusak</p>
                    <div class="card-footer">
                        <i class="fas fa-phone"></i> Hubungi Ahli
                    </div>
                </div>

                <div class="layanan-card" data-service="dinding">
                    <div class="layanan-icon">
                        <i class="fas fa-paint-roller"></i>
                    </div>
                    <h3>Dinding & Cat</h3>
                    <p>Perbaikan retak, pengecatan ulang, dan finishing berkualitas</p>
                    <div class="card-footer">
                        <i class="fas fa-phone"></i> Hubungi Ahli
                    </div>
                </div>

                <div class="layanan-card" data-service="ac">
                    <div class="layanan-icon">
                        <i class="fas fa-snowflake"></i>
                    </div>
                    <h3>AC & Pendingin</h3>
                    <p>Servis AC, pendingin ruangan, dan sistem ventilasi modern</p>
                    <div class="card-footer">
                        <i class="fas fa-phone"></i> Hubungi Ahli
                    </div>
                </div>

                <div class="layanan-card" data-service="pembersihan">
                    <div class="layanan-icon">
                        <i class="fas fa-sparkles"></i>
                    </div>
                    <h3>Pembersihan & Perawatan</h3>
                    <p>Pembersihan menyeluruh dan perawatan rutin untuk fasilitas optimal</p>
                    <div class="card-footer">
                        <i class="fas fa-phone"></i> Hubungi Ahli
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Tentang Section -->
    <section id="tentang" class="tentang">
        <div class="container">
            <div class="section-header">
                <h2><i class="fas fa-info-circle"></i> Tentang Kami</h2>
                <p>Mitra terpercaya Anda dalam layanan perbaikan fasilitas</p>
            </div>
            <div class="tentang-content">
                <div class="tentang-text">
                    <h3><i class="fas fa-star"></i> Kami adalah mitra terpercaya Anda</h3>
                    <p>Dengan pengalaman lebih dari 10 tahun melayani kebutuhan perbaikan fasilitas, tim profesional kami siap memberikan solusi terbaik untuk masalah fasilitas Anda.</p>
                    <ul class="fitur-list">
                        <li><i class="fas fa-check"></i> Tim Teknisi Bersertifikat & Berpengalaman</li>
                        <li><i class="fas fa-check"></i> Respons Cepat 24/7 Siaga Darurat</li>
                        <li><i class="fas fa-check"></i> Garansi Pekerjaan 1 Tahun</li>
                        <li><i class="fas fa-check"></i> Harga Kompetitif & Transparan</li>
                        <li><i class="fas fa-check"></i> Peralatan Modern & Berkualitas</li>
                        <li><i class="fas fa-check"></i> Layanan Purna Jual Terbaik</li>
                    </ul>
                </div>
                <div class="tentang-stats">
                    <div class="stat-item stat-1">
                        <i class="fas fa-hammer-head"></i>
                        <h4>1000+</h4>
                        <p>Pekerjaan Selesai</p>
                    </div>
                    <div class="stat-item stat-2">
                        <i class="fas fa-users"></i>
                        <h4>500+</h4>
                        <p>Klien Puas</p>
                    </div>
                    <div class="stat-item stat-3">
                        <i class="fas fa-headset"></i>
                        <h4>24/7</h4>
                        <p>Layanan Darurat</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Kontak Section -->
    <section id="kontak" class="kontak">
        <div class="container">
            <div class="section-header">
                <h2><i class="fas fa-envelope"></i> Hubungi Kami</h2>
                <p>Siap membantu Anda dengan respons cepat dan profesional</p>
            </div>
            <div class="kontak-content">
                <div class="kontak-info">
                    <div class="info-item">
                        <div class="info-icon">
                            <i class="fas fa-phone-alt"></i>
                        </div>
                        <div>
                            <h4>Telepon</h4>
                            <p><a href="tel:+62895395303617">(+62) 895-3953-03617</a></p>
                            <p style="font-size: 0.9rem; color: #999;">Tersedia 24/7</p>
                        </div>
                    </div>

                    <div class="info-item">
                        <div class="info-icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div>
                            <h4>Email</h4>
                            <p><a href="mailto:info@layanankerusakan.com">info@layanankerusakan.com</a></p>
                            <p style="font-size: 0.9rem; color: #999;">Respons dalam 1 jam</p>
                        </div>
                    </div>

                    <div class="info-item">
                        <div class="info-icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div>
                            <h4>Lokasi Kami</h4>
                            <p>Jl. Raya Utama No. 123</p>
                            <p style="font-size: 0.9rem;">Jakarta, Indonesia</p>
                        </div>
                    </div>

                    <div class="info-item">
                        <div class="info-icon">
                            <i class="fas fa-clock"></i>
                        </div>
                        <div>
                            <h4>Jam Operasional</h4>
                            <p>Senin - Jumat: 08:00 - 17:00</p>
                            <p style="font-size: 0.9rem;">Sabtu - Minggu: Darurat 24/7</p>
                        </div>
                    </div>
                </div>

                <form class="kontak-form" id="kontakForm">
                    <div class="form-group">
                        <label for="nama"><i class="fas fa-user"></i> Nama Anda</label>
                        <input type="text" id="nama" placeholder="Masukkan nama lengkap" required>
                    </div>
                    <div class="form-group">
                        <label for="email"><i class="fas fa-envelope"></i> Email</label>
                        <input type="email" id="email" placeholder="Masukkan email Anda" required>
                    </div>
                    <div class="form-group">
                        <label for="telepon"><i class="fas fa-phone"></i> Nomor Telepon</label>
                        <input type="tel" id="telepon" placeholder="Masukkan nomor telepon" required>
                    </div>
                    <div class="form-group">
                        <label for="pesan"><i class="fas fa-comment"></i> Pesan</label>
                        <textarea id="pesan" placeholder="Tulis pesan Anda di sini..." rows="5" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary" style="width: 100%;">
                        <i class="fas fa-paper-plane"></i> Kirim Pesan
                    </button>
                </form>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <p>&copy; 2026 Layanan Kerusakan Fasilitas. Semua hak dilindungi.</p>
            <div class="social-links">
                <a href="https://www.instagram.com/saniaderaa?igsh=NXZwOXB2NnZldGZ4"><i class="fab fa-instagram"></i></a>
                <a href="https://www.tiktok.com/@saniaderaa?_r=1&_t=ZS-930slAknR39"><i class="fab fa-tiktok"></i></a>
            </div>
        </div>
    </footer>

    <script src="assets/js/script.js"></script>
</body>
</html>
