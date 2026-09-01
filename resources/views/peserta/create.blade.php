<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pendaftaran Peserta BPJS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow border-0 rounded-4">
                    <div class="card-header bg-primary text-white p-4 rounded-top-4">
                        <h4 class="mb-0 fw-bold">🏥 Form Pendaftaran Peserta BPJS</h4>
                        <p class="mb-0 text-white-50 small">Masukkan data warga atau masyarakat yang akan didaftarkan.</p>
                    </div>
                    <div class="card-body p-4">
                        @if ($errors->any())
                            <div class="alert alert-danger rounded-3 shadow-sm">
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
                                <label class="form-label fw-semibold">Nama Lengkap Warga</label>
                                <input type="text" name="nama_warga" class="form-control" placeholder="Contoh: Siti Aminah" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-semibold">Nomor BPJS</label>
                                <input type="text" name="nomor_bpjs" class="form-control" placeholder="Contoh: 000123456789" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-semibold">NIK (Nomor Induk Kependudukan)</label>
                                <input type="text" name="nik" class="form-control" placeholder="Contoh: 3271234567890001 (16 digit)" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-semibold">Kelas BPJS</label>
                                <select name="kelas_bpjs" class="form-control" required>
                                    <option value="">-- Pilih Kelas Perawatan --</option>
                                    <option value="Kelas 1">Kelas 1</option>
                                    <option value="Kelas 2">Kelas 2</option>
                                    <option value="Kelas 3">Kelas 3</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-semibold">Alamat Lengkap Warga</label>
                                <textarea name="alamat" class="form-control" rows="3" placeholder="Masukkan alamat lengkap sesuai KTP..."></textarea>
                            </div>

                            <div class="d-flex justify-content-between align-items-center mt-4">
                                <a href="{{ route('peserta.index') }}" class="btn btn-outline-secondary px-4">Kembali</a>
                                <button type="submit" class="btn btn-success px-4 fw-semibold shadow-sm">Simpan Data Warga</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>