<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Dosen - Sistem Tugas Akhir</title>
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
        <h2>Detail Data Dosen Pembimbing</h2>

        <div class="form-card" style="padding: 30px;">
            <div class="form-group" style="margin-bottom: 20px;">
                <label style="color: #6b7280; font-size: 14px; display: block; margin-bottom: 5px;">ID Sistem Dosen</label>
                <p style="font-size: 18px; font-weight: bold; margin: 0; color: #374151;">#{{ $dosen->id }}</p>
            </div>

            <div class="form-group" style="margin-bottom: 30px;">
                <label style="color: #6b7280; font-size: 14px; display: block; margin-bottom: 5px;">Nama Lengkap beserta Gelar</label>
                <p style="font-size: 20px; font-weight: bold; margin: 0; color: #1e3a8a;">{{ $dosen->nama_dosen }}</p>
            </div>

            <hr style="border: 0; border-top: 1px solid #e5e7eb; margin-bottom: 25px;">

            <div style="display: flex; gap: 10px;">
                <a href="/pengajuan/dosen" class="btn-block" style="background-color: #4b5563; text-align: center; text-decoration: none; line-height: 40px; padding: 0; color: white;">Kembali ke Daftar</a>
                <a href="{{ route('dosen.edit', $dosen->id) }}" class="btn-block" style="background-color: #f59e0b; text-align: center; text-decoration: none; line-height: 40px; padding: 0; color: white;">Edit Dosen</a>
            </div>
        </div>
    </main>

</body>
</html>
