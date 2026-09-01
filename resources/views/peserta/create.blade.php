<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Peserta BPJS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Form Tambah Peserta BPJS</h4>
                </div>
                <div class="card-body">
                    <!-- Menampilkan Error jika validasi gagal -->
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('peserta.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Pilih User</label>
                            <select name="user_id" class="form-control" required>
                                <option value="">-- Pilih User --</option>
                                @foreach($users as $u)
                                    <option value="{{ $u->id }}">{{ $u->nama }} ({{ $u->email }})</option>
                                @endforeach
                            </select>
                            <div class="form-text">Pastikan sudah ada data user di database atau buat data dummy terlebih dahulu.</div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Nomor BPJS</label>
                            <input type="text" name="nomor_bpjs" class="form-control" placeholder="Contoh: 000123456789" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">NIK</label>
                            <input type="text" name="nik" class="form-control" placeholder="Contoh: 3271234567890001" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Kelas BPJS</label>
                            <select name="kelas_bpjs" class="form-control" required>
                                <option value="Kelas 1">Kelas 1</option>
                                <option value="Kelas 2">Kelas 2</option>
                                <option value="Kelas 3">Kelas 3</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Alamat</label>
                            <textarea name="alamat" class="form-control" rows="3" placeholder="Alamat lengkap warga..."></textarea>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('peserta.index') }}" class="btn btn-secondary">Kembali</a>
                            <button type="submit" class="btn btn-success">Simpan Data</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>