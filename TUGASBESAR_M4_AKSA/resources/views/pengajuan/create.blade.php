<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajukan Pembimbing - Sistem Tugas Akhir</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

    <header>
        <div class="header-container">
            <div class="header-titles">
                <h1>Sistem Tugas Akhir & Skripsi</h1>
                <p>Modul Dosen Pembimbing</p>
            </div>
            <div class="user-badge shadow-sm">
                <div class="badge-avatar">MLK</div>
                <div class="badge-info">
                    <h6>Muhammad Laksmana Kartanegara</h6>
                    <span>NIM: 102022500289</span>
                    <span>Kelas: SI4907 | Modul B</span>
                </div>
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
        <h2>Formulir Pengajuan Pembimbing</h2>

        @if(session('error'))
            <div class="error-box" style="background-color: #fef2f2; color: #991b1b; padding: 16px; border-radius: 6px; margin-bottom: 25px; border-left: 4px solid #dc2626; font-size: 14px; font-weight: 500;">
                ✕ {{ session('error') }}
            </div>
        @endif

        @if(session('success'))
            <div class="success-box" style="background-color: #f0fdf4; color: #166534; padding: 16px; border-radius: 6px; margin-bottom: 25px; border-left: 4px solid #16a34a; font-size: 14px; font-weight: 500;">
                ✓ {{ session('success') }}
            </div>
        @endif

        <div class="form-card">
            <form action="/pengajuan" method="POST">
                @csrf

                <div class="form-group">
                    <label for="nama_mahasiswa">Nama Mahasiswa</label>
                    <input type="text" class="form-control" id="nama_mahasiswa" name="nama_mahasiswa" placeholder="Masukkan nama lengkap" required>
                </div>

                <div class="form-group">
                    <label for="nim">NIM</label>
                    <input type="text" class="form-control" id="nim" name="nim" placeholder="Masukkan NIM" required>
                </div>

                <div class="form-group">
                    <label for="judul_ta">Rencana Judul Tugas Akhir</label>
                    <textarea class="form-control" id="judul_ta" name="judul_ta" rows="3" placeholder="Masukkan rencana judul" required></textarea>
                </div>

                <div class="form-group">
                    <label for="dosen_pembimbing">Pilih Dosen Pembimbing</label>
                    <select class="form-control" id="dosen_pembimbing" name="dosen_pembimbing" required>
                        <option value="" selected disabled>-- Pilih Dosen --</option>
                        @foreach($daftar_dosen as $dosen)
                            <option value="{{ $dosen->nama }}">{{ $dosen->nama }}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn-block">Kirim Berkas Pengajuan</button>
            </form>
        </div>
    </main>

</body>
</html>
