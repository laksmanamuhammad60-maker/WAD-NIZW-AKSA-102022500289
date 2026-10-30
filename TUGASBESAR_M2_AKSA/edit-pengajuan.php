<?php
include 'koneksi.php';

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$query_data = mysqli_query($conn, "SELECT * FROM pengajuan_pembimbing WHERE id = $id");
$data = mysqli_fetch_assoc($query_data);

if (!$data) {
    die("Data pengajuan tidak ditemukan.");
}

$query_dosen = mysqli_query($conn, "SELECT nama FROM daftar_dosen");
$nama_err = $nim_err = $judul_err = $dosen_err = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_mhs = trim($_POST["nama_mhs"]);
    $nim_mhs = trim($_POST["nim_mhs"]);
    $judul_ta = trim($_POST["judul_ta"]);
    $dosen_pilih = $_POST["dosen_pilih"];

    if (empty($nama_mhs)) { $nama_err = "Nama tidak boleh kosong"; }
    if (empty($nim_mhs)) { $nim_err = "NIM tidak boleh kosong"; }
    if (empty($judul_ta)) { $judul_err = "Judul tidak boleh kosong"; }
    if (empty($dosen_pilih)) { $dosen_err = "Silakan pilih dosen"; }

    if (empty($nama_err) && empty($nim_err) && empty($judul_err) && empty($dosen_err)) {
        $update = mysqli_query($conn, "UPDATE pengajuan_pembimbing SET nama_mhs='$nama_mhs', nim_mhs='$nim_mhs', judul_ta='$judul_ta', dosen_pilih='$dosen_pilih' WHERE id=$id");
        if ($update) {
            header("Location: riwayat-pengajuan.php");
            exit;
        } else {
            die("Gagal memperbarui data: " . mysqli_error($conn));
        }
    }
} else {
    $nama_mhs = $data['nama_mhs'];
    $nim_mhs = $data['nim_mhs'];
    $judul_ta = $data['judul_ta'];
    $dosen_pilih = $data['dosen_pilih'];
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pengajuan - Sistem Tugas Akhir</title>
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
    <main>
        <div class="form-card">
            <h2>Edit Berkas Pengajuan Pembimbing</h2>
            <br>
            <form method="POST" action="edit-pengajuan.php?id=<?php echo $id; ?>">
                <div class="form-group">
                    <label>Nama Mahasiswa</label>
                    <input type="text" name="nama_mhs" class="form-control" value="<?php echo htmlspecialchars($nama_mhs); ?>">
                    <span class="error-text"><?php echo $nama_err; ?></span>
                </div>
                <div class="form-group">
                    <label>NIM</label>
                    <input type="text" name="nim_mhs" class="form-control" value="<?php echo htmlspecialchars($nim_mhs); ?>">
                    <span class="error-text"><?php echo $nim_err; ?></span>
                </div>
                <div class="form-group">
                    <label>Rencana Judul Tugas Akhir</label>
                    <textarea name="judul_ta" class="form-control" rows="4"><?php echo htmlspecialchars($judul_ta); ?></textarea>
                    <span class="error-text"><?php echo $judul_err; ?></span>
                </div>
                <div class="form-group">
                    <label>Pilih Dosen Pembimbing</label>
                    <select name="dosen_pilih" class="form-control">
                        <?php while ($d = mysqli_fetch_assoc($query_dosen)) { ?>
                            <option value="<?php echo $d['nama']; ?>" <?php if ($dosen_pilih == $d['nama']) echo 'selected'; ?>>
                                <?php echo $d['nama']; ?>
                            </option>
                        <?php } ?>
                    </select>
                    <span class="error-text"><?php echo $dosen_err; ?></span>
                </div>
                <button type="submit" class="btn-block">Simpan Perubahan Data</button>
                <br><br>
                <a href="riwayat-pengajuan.php" class="btn-block" style="text-align:center; text-decoration:none; display:block; background-color: #555;">Batal</a>
            </form>
        </div>
    </main>
</body>
</html>
