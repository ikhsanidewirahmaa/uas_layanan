<?php
$host     = "localhost";
$user     = "root";
$password = "";
$db       = "layanan_kerusakan";

$koneksi = mysqli_connect($host, $user, $password, $db);

// Cek Kondisi Koneksi
if (!$koneksi) {
    // Jika Gagal
    die("<div style='color:red; font-family:sans-serif;'>
            <strong>Koneksi Gagal:</strong> " . mysqli_connect_error() . "
          </div>");
} else {
    // Jika Berhasil (Hapus atau beri komentar bagian ini jika sudah masuk tahap produksi)
    echo "<div style='color:green; font-family:sans-serif; margin-bottom:20px;'>
            ✅ <strong>Koneksi Berhasil:</strong> Terhubung ke database <u>$db</u>
          </div>";
}
?>