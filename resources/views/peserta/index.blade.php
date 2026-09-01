<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Peserta BPJS</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome untuk Icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-light">

    <!-- Memanggil Navbar yang sudah dipisah -->
    @include('layouts.navbar')

    <!-- Konten Utama -->
    <div class="container mb-5">
        <!-- Notifikasi Sukses -->
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
                <i class="fa-solid fa-circle-check me-2"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="card shadow border-0 rounded-4">
            <div class="card-header bg-white p-4 border-bottom d-flex justify-content-between align-items-center">
                <div>
                    <h3 class="fw-bold text-primary mb-1">📋 Data Peserta BPJS</h3>
                    <p class="text-muted mb-0 small">Daftar seluruh warga dan masyarakat yang terdaftar dalam sistem.</p>
                </div>
                <div>
                    <a href="{{ route('peserta.create') }}" class="btn btn-primary fw-semibold shadow-sm">
                        <i class="fa-solid fa-plus me-1"></i> Tambah Peserta
                    </a>
                </div>
            </div>

            <div class="card-body p-4">
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-dark">
                            <tr>
                                <th class="text-center" width="5%">No</th>
                                <th width="18%">Nama Warga</th>
                                <th width="15%">No BPJS</th>
                                <th width="15%">NIK</th>
                                <th width="10%">Kelas</th>
                                <th width="15%">Alamat</th>
                                <th width="10%">Petugas</th>
                                <th class="text-center" width="8%">Status</th>
                                <th class="text-center" width="9%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($peserta as $index => $p)
                            <tr>
                                <td class="text-center fw-bold">{{ $index + 1 }}</td>
                                <td>
                                    <span class="fw-semibold text-dark">{{ $p->nama_warga }}</span>
                                </td>
                                <td><code>{{ $p->nomor_bpjs }}</code></td>
                                <td>{{ $p->nik }}</td>
                                <td>
                                    <span class="badge bg-info text-dark">{{ $p->kelas_bpjs }}</span>
                                </td>
                                <td>{{ Str::limit($p->alamat, 30) }}</td>
                                <td>
                                    <small class="text-muted"><i class="fa-solid fa-user-tie me-1"></i> {{ $p->user->name ?? 'Admin/Staf' }}</small>
                                </td>
                                <td class="text-center">
                                    <span class="badge bg-success px-3 py-2">Aktif</span>
                                </td>
                                <td class="text-center">
                                    <div class="d-flex justify-content-center gap-1">
                                        <!-- Tombol Edit yang sudah dihubungkan dengan ID -->
                                        <a href="{{ route('peserta.edit', $p->id) }}" class="btn btn-sm btn-warning text-white" title="Edit Data">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>
                                        
                                        <!-- Form Hapus yang sudah dihubungkan dengan ID -->
                                        <form action="{{ route('peserta.destroy', $p->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data peserta ini?');" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" title="Hapus Data">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="9" class="text-center py-4 text-muted">
                                    <i class="fa-solid fa-folder-open fa-2x mb-2 d-block"></i>
                                    Belum ada data peserta BPJS yang terdaftar.
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>