<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Tagihan Iuran BPJS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Data Tagihan Iuran BPJS</h2>
        <div>
            <a href="{{ route('tagihan.create') }}" class="btn btn-primary">Buat Tagihan Baru</a>
            <a href="{{ route('peserta.index') }}" class="btn btn-secondary">Lihat Peserta</a>
        </div>
    </div>
    
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
                        <th>Nama Warga</th>
                        <th>Bulan/Tahun</th>
                        <th>Nominal</th>
                        <th width="20%">Status Pembayaran</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($tagihan as $t)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $t->peserta->user->nama ?? '-' }}</td>
                        <td>{{ $t->bulan_tahun }}</td>
                        <td>Rp {{ number_format($t->nominal, 0, ',', '.') }}</td>
                        <td>
                            <span class="badge bg-{{ $t->status_pembayaran == 'Lunas' ? 'success' : 'warning text-dark' }}">
                                {{ $t->status_pembayaran }}
                            </span>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center text-muted">Belum ada data tagihan.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
