<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Pengajuan - Sistem Tugas Akhir</title>
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
        <h2>Riwayat Pengajuan Pembimbing</h2>

        @if(session('success'))
            <div class="success-box" style="background-color: #f0fdf4; color: #166534; padding: 16px; border-radius: 6px; margin-bottom: 25px; border-left: 4px solid #16a34a; font-size: 14px; font-weight: 500;">
                ✓ {{ session('success') }}
            </div>
        @endif

        <div class="form-card">
            <table style="width: 100%; border-collapse: collapse; margin-top: 10px;">
                <thead>
                    <tr style="background-color: #333; color: white; text-align: left;">
                        <th style="padding: 12px; border: 1px solid #ddd;">Nama Mahasiswa</th>
                        <th style="padding: 12px; border: 1px solid #ddd;">NIM</th>
                        <th style="padding: 12px; border: 1px solid #ddd;">Judul Tugas Akhir</th>
                        <th style="padding: 12px; border: 1px solid #ddd;">Dosen Pembimbing</th>
                        <th style="padding: 12px; border: 1px solid #ddd;">Status</th>
                        <th style="padding: 12px; border: 1px solid #ddd; text-align: center;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($pengajuans as $pengajuan)
                        <tr>
                            <td style="padding: 12px; border: 1px solid #ddd;">{{ $pengajuan->nama_mhs }}</td>
                            <td style="padding: 12px; border: 1px solid #ddd;">{{ $pengajuan->nim_mhs }}</td>
                            <td style="padding: 12px; border: 1px solid #ddd;">{{ $pengajuan->judul_ta }}</td>
                            <td style="padding: 12px; border: 1px solid #ddd;">{{ $pengajuan->dosen_pilih }}</td>
                            <td style="padding: 12px; border: 1px solid #ddd;">
                                <span style="padding: 4px 8px; border-radius: 4px; font-size: 12px; font-weight: bold; background-color: #fef9c3; color: #854d0e;">
                                    Pending
                                </span>
                            </td>
                            <td style="padding: 12px; border: 1px solid #ddd; text-align: center;">
                                <div style="display: flex; gap: 8px; justify-content: center;">
                                    <a href="/pengajuan/{{ $pengajuan->id }}/edit" style="background-color: #eab308; color: white; padding: 6px 12px; border-radius: 4px; text-decoration: none; font-size: 13px; font-weight: bold;">Edit</a>
                                    
                                    <form action="/pengajuan/{{ $pengajuan->id }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus berkas pengajuan ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" style="background-color: #ef4444; color: white; padding: 6px 12px; border: none; border-radius: 4px; font-size: 13px; font-weight: bold; cursor: pointer;">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" style="padding: 12px; border: 1px solid #ddd; text-align: center; color: #666;">Belum ada riwayat berkas pengajuan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </main>

</body>
</html>
