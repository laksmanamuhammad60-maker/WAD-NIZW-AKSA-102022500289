<?php
include 'koneksi.php';
$query = mysqli_query($conn, "SELECT * FROM pengajuan_pembimbing ORDER BY waktu_submit DESC");
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Pengajuan - Sistem Tugas Akhir</title>
    <link rel="stylesheet" href="style.css?v=2">
</head>
<body>
    <header>
        <h1>Sistem Tugas Akhir & Skripsi</h1>
        <p>Modul Dosen Pembimbing</p>
    </header>

    <nav>
        <a href="index.php">Daftar Dosen</a>
        <a href="ajukan-pembimbing.php">Ajukan Pembimbing</a>
        <a href="riwayat-pengajuan.php">Riwayat Pengajuan</a>
    </nav>

    <main style="max-width: 1100px;">
        <h2>Riwayat Pengajuan Dosen Pembimbing</h2>
        <br>
        
        <div class="form-card" style="overflow-x: auto;">
            <?php if ($query && mysqli_num_rows($query) > 0) { ?>
                <table class="result-table">
                    <thead>
                        <tr>
                            <th style="width: 5%;">No</th>
                            <th>Nama Mahasiswa</th>
                            <th>NIM</th>
                            <th>Judul Tugas Akhir</th>
                            <th>Dosen Pilihan</th>
                            <th>Waktu Kirim</th>
                            <th style="width: 15%; text-align: center;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $no = 1;
                        while ($row = mysqli_fetch_assoc($query)) { 
                        ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo htmlspecialchars($row['nama_mhs']); ?></td>
                                <td><?php echo htmlspecialchars($row['nim_mhs']); ?></td>
                                <td><?php echo htmlspecialchars($row['judul_ta']); ?></td>
                                <td><?php echo htmlspecialchars($row['dosen_pilih']); ?></td>
                                <td><?php echo $row['waktu_submit']; ?></td>
                                <td style="text-align: center;">
                                    <a href="edit-pengajuan.php?id=<?php echo $row['id']; ?>" style="background-color: #001f3f; color: white; padding: 5px 10px; text-decoration: none; border-radius: 4px; font-size: 13px; font-weight: bold; margin-right: 5px;">Edit</a>
                                    <a href="delete-pengajuan.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')" style="background-color: #800000; color: white; padding: 5px 10px; text-decoration: none; border-radius: 4px; font-size: 13px; font-weight: bold;">Delete</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            <?php } else { ?>
                <p style="text-align: center; color: #666; padding: 20px 0;">Belum ada riwayat berkas pengajuan yang tersimpan di database.</p>
            <?php } ?>
        </div>
    </main>
</body>
</html>
