<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Pengelolaan Event & Workshop</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}"/>
</head>
<body>

    <header class="navbar">
        <div class="logo">Sistem Pengelolaan Event & Workshop</div>

        <nav class="nav-links" style="display: flex; align-items: center; gap: 15px;">
            <a href="{{ route('peserta.index') }}" class="active">Daftar Peserta</a>
            <a href="{{ route('peserta.create') }}">Tambah Peserta</a>

            <span style="color: white; font-weight: bold;">
                {{ auth()->user()->name }} ({{ ucfirst(auth()->user()->role) }})
            </span>

            <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                @csrf
                <button type="submit" class="btn btn-danger" style="padding: 5px 10px; font-size: 14px;">
                    Logout
                </button>
            </form>
        </nav>
    </header>

    <main class="container">
        <div class="header-section">
            <h2>Manajemen Data Peserta</h2>

            <a href="{{ route('peserta.create') }}" class="btn btn-primary">
                + Tambah Peserta Baru
            </a>
        </div>

        @if (session('success'))
            <div class="alert alert-success" style="margin-bottom: 15px; padding: 10px; background: #d4edda; color: #155724; border-radius: 5px;">
                {{ session('success') }}
            </div>
        @endif

        <table class="data-table">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>PROFIL PESERTA (NAMA)</th>
                    <th>ASAL INSTANSI / KAMPUS</th>
                    <th>NOMOR KONTAK</th>
                    <th>EMAIL AKTIF</th>
                    <th>AKSI</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($peserta as $index => $item)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $item->nama_lengkap }}</td>
                        <td>{{ $item->instansi }}</td>
                        <td>{{ $item->nomor_kontak }}</td>
                        <td>{{ $item->email }}</td>
                        <td>
                            <a href="{{ route('peserta.edit', $item->id) }}" class="btn btn-small">
                                Edit
                            </a>

                            @if (auth()->user()->role === 'admin')
                                <form action="{{ route('peserta.destroy', $item->id) }}"
                                      method="POST"
                                      style="display:inline;"
                                      onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-danger">
                                        Hapus
                                    </button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" align="center">Belum ada data peserta.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </main>

    <footer>
        <div class="footer-content">
            <p><strong>Nama:</strong> Samuel Andhika Putra Tirtasoekatja</p>
            <p><strong>NIM:</strong> 102022500151</p>
            <p><strong>Kelas:</strong> SI-49-06</p>
            <p><strong>Kelompok:</strong> Kelompok 8</p>
            <p><strong>Modul:</strong> Modul Peserta & Biodata (Individu D)</p>
        </div>
    </footer>

</body>
</html>