<?php
include 'koneksi.php';

$query_dosen = mysqli_query($conn, "SELECT nama FROM daftar_dosen");

$nama_mhs = $nim_mhs = $judul_ta = $dosen_pilih = "";
$nama_err = $nim_err = $judul_err = $dosen_err = "";
$sukses = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty(trim($_POST["nama_mhs"]))) {
        $nama_err = "Nama mahasiswa tidak boleh kosong";
    } else {
        $nama_mhs = trim($_POST["nama_mhs"]);
    }
    
    if (empty(trim($_POST["nim_mhs"]))) {
        $nim_err = "NIM tidak boleh kosong";
    } else if (!ctype_digit(trim($_POST["nim_mhs"]))) {
        $nim_err = "NIM harus berupa angka";
    } else {
        $nim_mhs = trim($_POST["nim_mhs"]);
    }
    
    if (empty(trim($_POST["judul_ta"]))) {
        $judul_err = "Judul Tugas Akhir tidak boleh kosong";
    } else {
        $judul_ta = trim($_POST["judul_ta"]);
    }
    
    if (empty($_POST["dosen_pilih"])) {
        $dosen_err = "Silakan pilih dosen pembimbing";
    } else {
        $dosen_pilih = $_POST["dosen_pilih"];
    }
    
    if (empty($nama_err) && empty($nim_err) && empty($judul_err) && empty($dosen_err)) {
        // Query untuk menyimpan data formulir ke database
        $sql = "INSERT INTO pengajuan_pembimbing (nama_mhs, nim_mhs, judul_ta, dosen_pilih) VALUES ('$nama_mhs', '$nim_mhs', '$judul_ta', '$dosen_pilih')";
        if (mysqli_query($conn, $sql)) {
            $sukses = true;
        } else {
            die("Gagal menyimpan data! Error database: " . mysqli_error($conn));
        }
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajukan Pembimbing - Sistem Tugas Akhir</title>
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
            <?php if ($sukses) { ?>
                <div class="success-box">
                    ✓ Berkas berhasil dikirim dan tersimpan di database phpMyAdmin!
                </div>
                <h2>Ringkasan Data Pengajuan</h2>
                <table class="result-table">
                    <thead>
                        <tr>
                            <th>Atribut</th>
                            <th>Detail Informasi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><strong>Nama Mahasiswa</strong></td>
                            <td><?php echo htmlspecialchars($nama_mhs); ?></td>
                        </tr>
                        <tr>
                            <td><strong>NIM</strong></td>
                            <td><?php echo htmlspecialchars($nim_mhs); ?></td>
                        </tr>
                        <tr>
                            <td><strong>Judul Tugas Akhir</strong></td>
                            <td><?php echo htmlspecialchars($judul_ta); ?></td>
                        </tr>
                        <tr>
                            <td><strong>Dosen Pilihan</strong></td>
                            <td><?php echo htmlspecialchars($dosen_pilih); ?></td>
                        </tr>
                    </tbody>
                </table>
                <br>
                <a href="ajukan-pembimbing.php" class="btn-block" style="text-align:center; text-decoration:none; display:block;">Buat Pengajuan Baru</a>
            <?php } else { ?>
                <h2>Formulir Pengajuan Pembimbing</h2>
                <br>
                <form method="POST" action="ajukan-pembimbing.php">
                    <div class="form-group">
                        <label>Nama Mahasiswa</label>
                        <input type="text" name="nama_mhs" class="form-control" value="<?php echo htmlspecialchars($nama_mhs); ?>" placeholder="Masukkan nama lengkap">
                        <span class="error-text"><?php echo $nama_err; ?></span>
                    </div>

                    <div class="form-group">
                        <label>NIM</label>
                        <input type="text" name="nim_mhs" class="form-control" value="<?php echo htmlspecialchars($nim_mhs); ?>" placeholder="Masukkan NIM">
                        <span class="error-text"><?php echo $nim_err; ?></span>
                    </div>

                    <div class="form-group">
                        <label>Rencana Judul Tugas Akhir</label>
                        <textarea name="judul_ta" class="form-control" rows="4" placeholder="Tuliskan rencana judul skripsi Anda"><?php echo htmlspecialchars($judul_ta); ?></textarea>
                        <span class="error-text"><?php echo $judul_err; ?></span>
                    </div>

                    <div class="form-group">
                        <label>Pilih Dosen Pembimbing</label>
                        <select name="dosen_pilih" class="form-control">
                            <option value="">-- Silakan Pilih Dosen --</option>
                            <?php while ($d = mysqli_fetch_assoc($query_dosen)) { ?>
                                <option value="<?php echo $d['nama']; ?>" <?php if ($dosen_pilih == $d['nama']) echo 'selected'; ?>>
                                    <?php echo $d['nama']; ?>
                                </option>
                            <?php } ?>
                        </select>
                        <span class="error-text"><?php echo $dosen_err; ?></span>
                    </div>

                    <button type="submit" class="btn-block">Kirim Berkas Pengajuan</button>
                </form>
            <?php } ?>
        </div>
    </main>
</body>
</html>
