<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Dosen - Sistem Tugas Akhir</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

    <header>
        <div class="header-container">
            <div class="header-titles">
                <h1>Sistem Tugas Akhir & Skripsi</h1>
                <p>Modul Dosen Pembimbing</p>
            </div>
        </div>
    </header>

    <nav>
        <a href="/pengajuan/tambah-dosen">Tambah Dosen</a>
        <a href="/pengajuan/dosen">Daftar Dosen</a>
        <a href="/pengajuan/create">Ajukan Pembimbing</a>
        <a href="/pengajuan">Riwayat Pengajuan</a>
    </nav>

    <main>
        <h2>Formulir Tambah Dosen Pembimbing</h2>

        <div class="form-card">
            <form action="/pengajuan/simpan-dosen" method="POST">
                @csrf

                <div class="form-group">
                    <label for="nama_dosen">Nama Lengkap Dosen & Gelar</label>
                    <input type="text" class="form-control" id="nama_dosen" name="nama_dosen" placeholder="Contoh: Dr. Andi Pratama, S.Kom., M.Kom." required>
                </div>

                <div style="display: flex; gap: 10px;">
                    <a href="/pengajuan/create" class="btn-block" style="background-color: #6b7280; text-align: center; text-decoration: none; line-height: 40px; padding: 0;">Kembali</a>
                    <button type="submit" class="btn-block" style="background-color: #159c6b;">Simpan Dosen</button>
                </div>
            </form>
        </div>
    </main>

</body>
</html>
