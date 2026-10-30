<?php
$daftar_dosen = [
    [
        "id" => 1,
        "nama" => "Dr. Andi Pratama, S.Kom., M.Kom.",
        "nidn" => "0412345678",
        "jabatan" => "Lektor",
        "keahlian" => "Sistem Informasi"
    ],
    [
        "id" => 2,
        "nama" => "Rina Maharani, S.T., M.T.",
        "nidn" => "0423456789",
        "jabatan" => "Asisten Ahli",
        "keahlian" => "Sistem Informasi Akademik"
    ]
];
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Tugas Akhir & Skripsi</title>
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
        <h2>Daftar Dosen Pembimbing</h2>

        
            <p><strong>Nama:</strong> Muhammad Laksmana Kartanegara</p>
            <p><strong>NIM:</strong> 102022500289</p>
            <p><strong>Kelas:</strong> SI4907</p>
            <p><strong>Modul:</strong> B - Dosen Pembimbing</p>
        </div>

        <section>
            <?php foreach ($daftar_dosen as $dosen) { ?>
                <article>
                    <h3><?php echo $dosen['nama']; ?></h3>
                    <p><strong>NIDN:</strong> <?php echo $dosen['nidn']; ?></p>
                    <p><strong>Jabatan:</strong> <?php echo $dosen['jabatan']; ?></p>
                    <p><strong>Keahlian:</strong> <?php echo $dosen['keahlian']; ?></p>
                    <a href="detail-dosen.php?id=<?php echo $dosen['id']; ?>">Lihat Detail</a>
                </article>
            <?php } ?>
        </section>
    </main>
</body>
</html>
