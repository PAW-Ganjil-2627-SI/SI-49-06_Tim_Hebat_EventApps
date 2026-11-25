<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Peserta - Sistem Pengelolaan Event & Workshop</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

    <header class="navbar">
        <div class="logo">Sistem Pengelolaan Event & Workshop</div>
        <nav class="nav-links">
            <a href="{{ route('peserta.index') }}">Daftar Peserta</a>
            <a href="{{ route('peserta.create') }}">Tambah Peserta</a>
        </nav>
    </header>

    <main class="container">
        <div class="header-section">
            <h2>Edit Form Biodata Peserta</h2>
        </div>

        <form action="{{ route('peserta.update', $peserta->id) }}" method="POST" class="form-card">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label>Nama Lengkap (Profil Peserta)</label>
                <input type="text" name="nama_lengkap" value="{{ $peserta->nama_lengkap }}" required>
            </div>

            <div class="form-group">
                <label>Asal Instansi / Kampus</label>
                <input type="text" name="instansi" value="{{ $peserta->instansi }}" required>
            </div>

            <div class="form-group">
                <label>Nomor Kontak (WhatsApp)</label>
                <input type="text" name="nomor_kontak" value="{{ $peserta->nomor_kontak }}" required>
            </div>

            <div class="form-group">
                <label>Email Aktif</label>
                <input type="email" name="email" value="{{ $peserta->email }}" required>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-primary">Update Biodata</button>
                <a href="{{ route('peserta.index') }}" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </main>

</body>
</html>