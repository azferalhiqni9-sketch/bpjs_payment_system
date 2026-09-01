<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buat Tagihan Iuran</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Form Buat Tagihan Iuran BPJS</h4>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('tagihan.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Pilih Peserta BPJS</label>
                            <select name="peserta_id" class="form-control" required>
                                <option value="">-- Pilih Peserta --</option>
                                @foreach($peserta as $p)
                                    <option value="{{ $p->id }}">{{ $p->user->nama ?? 'Tanpa Nama' }} (No: {{ $p->nomor_bpjs }})</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Bulan & Tahun Tagihan</label>
                            <input type="text" name="bulan_tahun" class="form-control" placeholder="Contoh: 2026-09" required>
                            <div class="form-text">Gunakan format YYYY-MM (Tahun-Bulan).</div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Nominal Iuran (Rp)</label>
                            <input type="number" name="nominal" class="form-control" placeholder="Contoh: 35000" required>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('tagihan.index') }}" class="btn btn-secondary">Kembali</a>
                            <button type="submit" class="btn btn-success">Simpan Tagihan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>