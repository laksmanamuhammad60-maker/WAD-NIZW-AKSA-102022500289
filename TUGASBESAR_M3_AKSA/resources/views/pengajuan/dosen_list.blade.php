<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Dosen - Sistem Tugas Akhir</title>
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
        <h2>Daftar Dosen Pembimbing Aktif</h2>

        @if(session('success'))
            <div class="success-box" style="background-color: #f0fdf4; color: #166534; padding: 16px; border-radius: 6px; margin-bottom: 25px; border-left: 4px solid #16a34a; font-size: 14px; font-weight: 500;">
                ✓ {{ session('success') }}
            </div>
        @endif

        <div class="form-card">
            <table style="width: 100%; border-collapse: collapse; margin-top: 10px;">
                <thead>
                    <tr style="background-color: #333; color: white; text-align: left;">
                        <th style="padding: 12px; border: 1px solid #ddd; width: 10%;">No</th>
                        <th style="padding: 12px; border: 1px solid #ddd; width: 60%;">Nama Lengkap Dosen & Gelar</th>
                        <th style="padding: 12px; border: 1px solid #ddd; text-align: center;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($daftar_dosen as $index => $dosen)
                        <tr>
                            <td style="padding: 12px; border: 1px solid #ddd;">{{ $index + 1 }}</td>
                            <td style="padding: 12px; border: 1px solid #ddd;">{{ $dosen->nama }}</td>
                            <td style="padding: 12px; border: 1px solid #ddd; text-align: center;">
                                <div style="display: flex; gap: 8px; justify-content: center;">
                                    <a href="/pengajuan/dosen/{{ $dosen->id }}/edit" style="background-color: #eab308; color: white; padding: 6px 12px; border-radius: 4px; text-decoration: none; font-size: 13px; font-weight: bold;">Edit</a>
                                    
                                    <form action="/pengajuan/dosen/{{ $dosen->id }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus dosen ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" style="background-color: #ef4444; color: white; padding: 6px 12px; border: none; border-radius: 4px; font-size: 13px; font-weight: bold; cursor: pointer;">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" style="padding: 12px; border: 1px solid #ddd; text-align: center; color: #666;">Belum ada data dosen di database.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </main>

</body>
</html>
