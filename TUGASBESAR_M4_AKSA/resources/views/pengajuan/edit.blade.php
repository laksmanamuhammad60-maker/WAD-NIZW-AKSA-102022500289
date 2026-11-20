<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pengajuan - Sistem Tugas Akhir</title>
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
        <h2>Formulir Ubah Data Pengajuan</h2>

        <div class="form-card">
            <form action="/pengajuan/{{ $pengajuan->id }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="nama_mahasiswa">Nama Mahasiswa</label>
                    <input type="text" class="form-control" id="nama_mahasiswa" name="nama_mahasiswa" value="{{ $pengajuan->nama_mhs }}" required>
                </div>

                <div class="form-group">
                    <label for="nim">NIM</label>
                    <input type="text" class="form-control" id="nim" name="nim" value="{{ $pengajuan->nim_mhs }}" required>
                </div>

                <div class="form-group">
                    <label for="judul_ta">Rencana Judul Tugas Akhir</label>
                    <textarea class="form-control" id="judul_ta" name="judul_ta" rows="3" required>{{ $pengajuan->judul_ta }}</textarea>
                </div>

                <div class="form-group">
                    <label for="dosen_pembimbing">Pilih Dosen Pembimbing</label>
                    <select class="form-control" id="dosen_pembimbing" name="dosen_pembimbing" required>
                        @foreach($daftar_dosen as $dosen)
                            <option value="{{ $dosen->nama }}" {{ $pengajuan->dosen_pilih == $dosen->nama ? 'selected' : '' }}>
                                {{ $dosen->nama }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div style="display: flex; gap: 10px; margin-top: 20px;">
                    <a href="/pengajuan" class="btn-block" style="background-color: #6b7280; text-align: center; text-decoration: none; line-height: 40px; padding: 0; color: white; border-radius: 4px; width: 100%;">Batal</a>
                    <button type="submit" class="btn-block" style="background-color: #eab308; color: white; border: none; border-radius: 4px; width: 100%; cursor: pointer; height: 40px; font-weight: bold;">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </main>

</body>
</html>
