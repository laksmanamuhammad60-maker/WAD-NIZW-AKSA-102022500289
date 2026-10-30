<?php
$id = isset($_GET['id']) ? (int)$_GET['id'] : 1;

$daftar_dosen = [
    1 => [
        "nama" => "Dr. Andi Pratama, S.Kom., M.Kom.",
        "nidn" => "0412345678",
        "jabatan" => "Lektor",
        "keahlian" => "Sistem Informasi",
        "bidang_riset" => "Sistem Informasi Akademik",
        "topik" => [
            "Sistem Informasi Akademik",
            "Pengembangan Sistem Berbasis Web",
            "Analisis dan Perancangan Sistem"
        ]
    ],
    2 => [
        "nama" => "Rina Maharani, S.T., M.T.",
        "nidn" => "0423456789",
        "jabatan" => "Asisten Ahli",
        "keahlian" => "Sistem Informasi Akademik",
        "bidang_riset" => "Analisis Data & Proses Bisnis",
        "topik" => [
            "Optimasi Proses Bisnis",
            "Audit Sistem Informasi",
            "Perancangan Enterprise Architecture"
        ]
    ]
];

$dosen = isset($daftar_dosen[$id]) ? $daftar_dosen[$id] : $daftar_dosen[1];
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Dosen - Sistem Tugas Akhir</title>
    <link rel="stylesheet" href="style.css?v=1">
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
            <h2><?php echo $dosen['nama']; ?></h2>
            <br>
            <p><strong>NIDN:</strong> <?php echo $dosen['nidn']; ?></p>
            <p><strong>Jabatan Fungsional:</strong> <?php echo $dosen['jabatan']; ?></p>
            <p><strong>Keahlian Utama:</strong> <?php echo $dosen['keahlian']; ?></p>
            <p><strong>Bidang Riset:</strong> <?php echo $dosen['bidang_riset']; ?></p>
            <br>
            <h3>Topik Penelitian yang Dibimbing</h3>
            <br>
            <ul style="padding-left: 20px;">
                <?php foreach ($dosen['topik'] as $topik) { ?>
                    <li style="margin-bottom: 5px;"><?php echo $topik; ?></li>
                <?php } ?>
            </ul>
            <br>
            <a href="index.php" class="btn-block" style="text-align:center; text-decoration:none; display:block;">Kembali ke Daftar Dosen</a>
        </div>
    </main>
</body>
</html>
