<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Peserta BPJS</title>
    <!-- Menggunakan Bootstrap 5 untuk tampilan tabel yang rapi -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Data Peserta BPJS</h2>
        <div>
            <a href="{{ route('peserta.create') }}" class="btn btn-primary">Tambah Peserta</a>
            <a href="{{ route('tagihan.index') }}" class="btn btn-secondary">Lihat Tagihan</a>
            
            <!-- Tombol Logout -->
            <form action="{{ route('logout') }}" method="POST" class="d-inline">
                @csrf
                <button type="submit" class="btn btn-danger">Logout</button>
            </form>
        </div>
    </div>
    
    <!-- Pesan Sukses jika data berhasil disimpan -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body">
            <table class="table table-bordered table-striped align-middle">
                <thead class="table-dark">
                    <tr>
                        <th width="5%">No</th>
                        <th>Nama User</th>
                        <th>No BPJS</th>
                        <th>NIK</th>
                        <th>Kelas</th>
                        <th width="15%">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($peserta as $p)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $p->user->nama ?? '-' }}</td>
                        <td>{{ $p->nomor_bpjs }}</td>
                        <td>{{ $p->nik }}</td>
                        <td>{{ $p->kelas_bpjs }}</td>
                        <td>
                            <span class="badge bg-{{ $p->status_keaktifan == 'Aktif' ? 'success' : 'danger' }}">
                                {{ $p->status_keaktifan }}
                            </span>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center text-muted">Belum ada data peserta BPJS.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>