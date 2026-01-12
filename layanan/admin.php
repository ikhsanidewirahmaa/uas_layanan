<?php
include 'koneksi.php';

// Session check (jika diperlukan)
// session_start();

// Ambil data laporan
$query = "SELECT * FROM laporan_kerusakan ORDER BY tanggal_lapor DESC";
$result = mysqli_query($koneksi, $query);
$laporan_list = [];

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $laporan_list[] = $row;
    }
}

// Proses update status
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_status'])) {
    $id_laporan = $_POST['id_laporan'];
    $status = $_POST['status'];
    $catatan = isset($_POST['catatan']) ? mysqli_real_escape_string($koneksi, $_POST['catatan']) : '';
    
    $update_query = "UPDATE laporan_kerusakan SET status = '$status', catatan_teknis = '$catatan' WHERE id_laporan = $id_laporan";
    
    if (mysqli_query($koneksi, $update_query)) {
        $pesan_sukses = "Status laporan berhasil diperbarui!";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Kelola Laporan Kerusakan</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f5f5;
            color: #333;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .admin-header {
            background: linear-gradient(135deg, #1e3a5f 0%, #2c5282 100%);
            color: white;
            padding: 30px 20px;
            border-radius: 10px;
            margin-bottom: 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .admin-header h1 {
            font-size: 2rem;
        }

        .admin-header a {
            background-color: #ff6b35;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .admin-header a:hover {
            background-color: #ff5520;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .stat-card {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .stat-card h3 {
            color: #1e3a5f;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .stat-card h3 i {
            font-size: 1.5rem;
            color: #ff6b35;
        }

        .stat-card .number {
            font-size: 2.5rem;
            font-weight: bold;
            color: #ff6b35;
        }

        .filter-section {
            background: white;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 20px;
            display: flex;
            gap: 15px;
            align-items: center;
            flex-wrap: wrap;
        }

        .filter-section select {
            padding: 10px 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1rem;
        }

        .search-box {
            flex: 1;
            min-width: 200px;
        }

        .search-box input {
            width: 100%;
            padding: 10px 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1rem;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        th {
            background-color: #1e3a5f;
            color: white;
            padding: 15px;
            text-align: left;
            font-weight: 600;
        }

        td {
            padding: 15px;
            border-bottom: 1px solid #eee;
        }

        tr:hover {
            background-color: #f9f9f9;
        }

        .status-badge {
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
            text-align: center;
        }

        .status-pending {
            background-color: #fff3cd;
            color: #856404;
        }

        .status-diproses {
            background-color: #cce5ff;
            color: #004085;
        }

        .status-selesai {
            background-color: #d4edda;
            color: #155724;
        }

        .status-batal {
            background-color: #f8d7da;
            color: #721c24;
        }

        .priority-badge {
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
            text-align: center;
        }

        .priority-rendah {
            background-color: #d4edda;
            color: #155724;
        }

        .priority-sedang {
            background-color: #fff3cd;
            color: #856404;
        }

        .priority-tinggi {
            background-color: #ffe6e6;
            color: #c33;
        }

        .priority-darurat {
            background-color: #f8d7da;
            color: #721c24;
        }

        .action-buttons {
            display: flex;
            gap: 10px;
        }

        .btn {
            padding: 8px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 0.9rem;
            text-decoration: none;
            display: inline-block;
            transition: all 0.3s;
        }

        .btn-view {
            background-color: #17a2b8;
            color: white;
        }

        .btn-view:hover {
            background-color: #138496;
        }

        .btn-edit {
            background-color: #ffc107;
            color: white;
        }

        .btn-edit:hover {
            background-color: #e0a800;
        }

        .btn-delete {
            background-color: #dc3545;
            color: white;
        }

        .btn-delete:hover {
            background-color: #c82333;
        }

        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 1000;
            justify-content: center;
            align-items: center;
        }

        .modal.active {
            display: flex;
        }

        .modal-content {
            background: white;
            padding: 30px;
            border-radius: 10px;
            max-width: 600px;
            width: 90%;
            max-height: 90vh;
            overflow-y: auto;
        }

        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            border-bottom: 2px solid #eee;
            padding-bottom: 15px;
        }

        .modal-header h2 {
            color: #1e3a5f;
        }

        .close-btn {
            background: none;
            border: none;
            font-size: 1.5rem;
            cursor: pointer;
            color: #666;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: 600;
            color: #1e3a5f;
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 10px 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1rem;
            font-family: inherit;
        }

        .form-group textarea {
            resize: vertical;
            min-height: 100px;
        }

        .alert {
            padding: 15px 20px;
            border-radius: 5px;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .empty-state {
            text-align: center;
            padding: 60px 20px;
            color: #999;
        }

        .empty-state i {
            font-size: 4rem;
            margin-bottom: 20px;
            opacity: 0.5;
        }

        @media (max-width: 768px) {
            .admin-header {
                flex-direction: column;
                gap: 15px;
            }

            .filter-section {
                flex-direction: column;
            }

            .search-box {
                min-width: 100%;
            }

            table {
                font-size: 0.9rem;
            }

            td, th {
                padding: 10px;
            }

            .action-buttons {
                flex-direction: column;
            }

            .btn {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="admin-header">
            <h1><i class="fas fa-cog"></i> Panel Admin</h1>
            <a href="index.php"><i class="fas fa-arrow-left"></i> Kembali ke Beranda</a>
        </div>

        <?php if (isset($pesan_sukses)): ?>
            <div class="alert alert-success">
                <i class="fas fa-check-circle"></i>
                <?php echo $pesan_sukses; ?>
            </div>
        <?php endif; ?>

        <div class="stats-grid">
            <div class="stat-card">
                <h3><i class="fas fa-list"></i> Total Laporan</h3>
                <div class="number"><?php echo count($laporan_list); ?></div>
            </div>
            <div class="stat-card">
                <h3><i class="fas fa-clock"></i> Pending</h3>
                <div class="number"><?php echo count(array_filter($laporan_list, fn($x) => $x['status'] == 'Pending')); ?></div>
            </div>
            <div class="stat-card">
                <h3><i class="fas fa-spinner"></i> Diproses</h3>
                <div class="number"><?php echo count(array_filter($laporan_list, fn($x) => $x['status'] == 'Diproses')); ?></div>
            </div>
            <div class="stat-card">
                <h3><i class="fas fa-check-circle"></i> Selesai</h3>
                <div class="number"><?php echo count(array_filter($laporan_list, fn($x) => $x['status'] == 'Selesai')); ?></div>
            </div>
        </div>

        <div class="filter-section">
            <select id="filterStatus">
                <option value=""><i class="fas fa-filter"></i> Semua Status</option>
                <option value="Pending"><i class="fas fa-clock"></i> Pending</option>
                <option value="Diproses"><i class="fas fa-spinner"></i> Diproses</option>
                <option value="Selesai"><i class="fas fa-check-circle"></i> Selesai</option>
                <option value="Batal"><i class="fas fa-times-circle"></i> Batal</option>
            </select>
            <div class="search-box">
                <i class="fas fa-search"></i>
                <input type="text" id="searchBox" placeholder="Cari nama, email, atau lokasi...">
            </div>
        </div>

        <?php if (count($laporan_list) > 0): ?>
            <table>
                <thead>
                    <tr>
                        <th><i class="fas fa-hashtag"></i> No</th>
                        <th><i class="fas fa-user"></i> Nama</th>
                        <th><i class="fas fa-tools"></i> Jenis Kerusakan</th>
                        <th><i class="fas fa-map-marker-alt"></i> Lokasi</th>
                        <th><i class="fas fa-exclamation-triangle"></i> Prioritas</th>
                        <th><i class="fas fa-flag"></i> Status</th>
                        <th><i class="fas fa-calendar"></i> Tanggal</th>
                        <th><i class="fas fa-cog"></i> Aksi</th>
                    </tr>
                </thead>
                <tbody id="tableBody">
                    <?php 
                    $no = 1;
                    foreach ($laporan_list as $laporan): 
                    ?>
                        <tr class="laporan-row" data-status="<?php echo $laporan['status']; ?>" data-search="<?php echo strtolower($laporan['nama'] . ' ' . $laporan['email'] . ' ' . $laporan['lokasi']); ?>">
                            <td><?php echo $no++; ?></td>
                            <td><?php echo htmlspecialchars($laporan['nama']); ?></td>
                            <td><?php echo htmlspecialchars($laporan['jenis_kerusakan']); ?></td>
                            <td><?php echo htmlspecialchars($laporan['lokasi']); ?></td>
                            <td>
                                <span class="priority-badge priority-<?php echo strtolower($laporan['prioritas']); ?>">
                                    <?php echo $laporan['prioritas']; ?>
                                </span>
                            </td>
                            <td>
                                <span class="status-badge status-<?php echo strtolower(str_replace(' ', '', $laporan['status'])); ?>">
                                    <?php echo $laporan['status']; ?>
                                </span>
                            </td>
                            <td><?php echo date('d/m/Y H:i', strtotime($laporan['tanggal_lapor'])); ?></td>
                            <td>
                                <div class="action-buttons">
                                    <button class="btn btn-view" onclick="viewDetails(<?php echo $laporan['id_laporan']; ?>)">
                                        <i class="fas fa-eye"></i> Lihat
                                    </button>
                                    <button class="btn btn-edit" onclick="editStatus(<?php echo $laporan['id_laporan']; ?>)">
                                        <i class="fas fa-edit"></i> Edit
                                    </button>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <div class="empty-state">
                <i class="fas fa-inbox"></i>
                <h3>Tidak ada laporan</h3>
                <p>Belum ada laporan kerusakan fasilitas yang masuk</p>
            </div>
        <?php endif; ?>
    </div>

    <!-- Modal Detail -->
    <div id="detailModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Detail Laporan</h2>
                <button class="close-btn" onclick="closeModal('detailModal')">×</button>
            </div>
            <div id="detailContent"></div>
        </div>
    </div>

    <!-- Modal Edit Status -->
    <div id="editModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Update Status Laporan</h2>
                <button class="close-btn" onclick="closeModal('editModal')">×</button>
            </div>
            <form method="POST" id="editForm">
                <input type="hidden" name="id_laporan" id="editLaporanId">
                <input type="hidden" name="update_status" value="1">
                
                <div class="form-group">
                    <label for="editStatus">Status</label>
                    <select name="status" id="editStatus" required>
                        <option value="Pending">Pending</option>
                        <option value="Diproses">Diproses</option>
                        <option value="Selesai">Selesai</option>
                        <option value="Batal">Batal</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="editCatatan">Catatan Teknis</label>
                    <textarea name="catatan" id="editCatatan" placeholder="Masukkan catatan atau progress perbaikan..."></textarea>
                </div>

                <button type="submit" class="btn btn-edit" style="width: 100%; padding: 12px;">
                    <i class="fas fa-save"></i> Simpan Perubahan
                </button>
            </form>
        </div>
    </div>

    <script>
        const laporan = <?php echo json_encode($laporan_list); ?>;

        function viewDetails(id) {
            const lapor = laporan.find(x => x.id_laporan == id);
            if (lapor) {
                const html = `
                    <div style="line-height: 1.8;">
                        <p><strong>Nama:</strong> ${lapor.nama}</p>
                        <p><strong>Email:</strong> ${lapor.email}</p>
                        <p><strong>Telepon:</strong> ${lapor.telepon}</p>
                        <p><strong>Lokasi:</strong> ${lapor.lokasi}</p>
                        <p><strong>Jenis Kerusakan:</strong> ${lapor.jenis_kerusakan}</p>
                        <p><strong>Prioritas:</strong> <span class="priority-badge priority-${lapor.prioritas.toLowerCase()}">${lapor.prioritas}</span></p>
                        <p><strong>Status:</strong> <span class="status-badge status-${lapor.status.toLowerCase().replace(' ', '')}">${lapor.status}</span></p>
                        <p><strong>Tanggal Lapor:</strong> ${new Date(lapor.tanggal_lapor).toLocaleString('id-ID')}</p>
                        <hr style="margin: 15px 0;">
                        <p><strong>Deskripsi Kerusakan:</strong></p>
                        <p style="white-space: pre-wrap; background-color: #f5f5f5; padding: 10px; border-radius: 5px;">${lapor.deskripsi}</p>
                        ${lapor.catatan_teknis ? `<p><strong>Catatan Teknis:</strong></p><p style="white-space: pre-wrap; background-color: #f5f5f5; padding: 10px; border-radius: 5px;">${lapor.catatan_teknis}</p>` : ''}
                    </div>
                `;
                document.getElementById('detailContent').innerHTML = html;
                document.getElementById('detailModal').classList.add('active');
            }
        }

        function editStatus(id) {
            document.getElementById('editLaporanId').value = id;
            const lapor = laporan.find(x => x.id_laporan == id);
            if (lapor) {
                document.getElementById('editStatus').value = lapor.status;
                document.getElementById('editCatatan').value = lapor.catatan_teknis || '';
            }
            document.getElementById('editModal').classList.add('active');
        }

        function closeModal(modalId) {
            document.getElementById(modalId).classList.remove('active');
        }

        window.onclick = function(event) {
            const detailModal = document.getElementById('detailModal');
            const editModal = document.getElementById('editModal');
            if (event.target == detailModal) {
                detailModal.classList.remove('active');
            }
            if (event.target == editModal) {
                editModal.classList.remove('active');
            }
        }

        // Filter dan Search
        document.getElementById('filterStatus').addEventListener('change', filterTable);
        document.getElementById('searchBox').addEventListener('input', filterTable);

        function filterTable() {
            const status = document.getElementById('filterStatus').value.toLowerCase();
            const search = document.getElementById('searchBox').value.toLowerCase();
            const rows = document.querySelectorAll('.laporan-row');

            rows.forEach(row => {
                const rowStatus = row.getAttribute('data-status').toLowerCase().replace(' ', '');
                const rowSearch = row.getAttribute('data-search');
                
                const statusMatch = !status || rowStatus === status.replace(' ', '');
                const searchMatch = !search || rowSearch.includes(search);

                row.style.display = (statusMatch && searchMatch) ? '' : 'none';
            });
        }
    </script>
</body>
</html>
