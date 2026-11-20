<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Sistem Tugas Akhir</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        body {
            background-color: #0f172a;
            color: #e2e8f0;
            margin: 0;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        .auth-wrapper {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 36px 20px;
        }
        .auth-card {
            background-color: #1e293b;
            border: 1px solid #334155;
            border-top: 4px solid #16a34a;
            padding: 32px;
            border-radius: 10px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.45);
            width: 100%;
            max-width: 420px;
        }
        .auth-card h2 {
            margin: 0 0 6px 0;
            color: #f8fafc;
            font-size: 22px;
            text-align: center;
            letter-spacing: 0.3px;
        }
        .auth-card p.subtitle {
            text-align: center;
            color: #94a3b8;
            font-size: 13px;
            margin: 0 0 22px 0;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 6px;
            font-weight: 600;
            color: #cbd5e1;
            font-size: 13px;
        }
        .form-group input,
        .form-group select {
            width: 100%;
            padding: 10px 14px;
            background-color: #0f172a;
            border: 1px solid #334155;
            border-radius: 6px;
            color: #f8fafc;
            font-size: 14px;
            box-sizing: border-box;
            transition: border-color 0.2s, box-shadow 0.2s;
        }
        .form-group input::placeholder {
            color: #475569;
        }
        .form-group input:focus,
        .form-group select:focus {
            outline: none;
            border-color: #16a34a;
            box-shadow: 0 0 0 3px rgba(22, 163, 74, 0.2);
        }
        .btn-submit {
            width: 100%;
            padding: 12px;
            background: linear-gradient(135deg, #16a34a, #15803d);
            color: #ffffff;
            border: none;
            border-radius: 6px;
            font-size: 15px;
            font-weight: bold;
            cursor: pointer;
            margin-top: 8px;
            transition: opacity 0.2s;
        }
        .btn-submit:hover {
            opacity: 0.92;
        }
        .error-alert {
            background-color: rgba(239, 68, 68, 0.12);
            color: #fca5a5;
            border-left: 4px solid #ef4444;
            padding: 10px 12px;
            border-radius: 4px;
            font-size: 13px;
            margin-bottom: 18px;
        }
        .auth-footer {
            text-align: center;
            margin-top: 20px;
            padding-top: 16px;
            border-top: 1px solid #334155;
            font-size: 13px;
            color: #94a3b8;
        }
        .auth-footer a {
            color: #4ade80;
            font-weight: 600;
            text-decoration: none;
        }
        .auth-footer a:hover {
            text-decoration: underline;
        }
    </style>
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

    <div class="auth-wrapper">
        <div class="auth-card">
            <h2>Registrasi Akun</h2>
            <p class="subtitle">Buat akun baru dengan hak akses Admin atau Staff</p>

            @if ($errors->any())
                <div class="error-alert">{{ $errors->first() }}</div>
            @endif

            <form action="{{ route('register') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input type="text" name="name" value="{{ old('name') }}" placeholder="Masukkan nama lengkap" required>
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" placeholder="contoh@email.com" required>
                </div>

                <div class="form-group">
                    <label>Role Akun</label>
                    <select name="role" required>
                        <option value="admin">Admin</option>
                        <option value="staff">Staff</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Password (min. 6 karakter)</label>
                    <input type="password" name="password" placeholder="••••••••" required>
                </div>

                <div class="form-group">
                    <label>Konfirmasi Password</label>
                    <input type="password" name="password_confirmation" placeholder="••••••••" required>
                </div>

                <button type="submit" class="btn-submit">Daftar Akun</button>
            </form>

            <div class="auth-footer">
                Sudah punya akun? <a href="{{ route('login') }}">Login di sini</a>
            </div>
        </div>
    </div>

</body>
</html>
