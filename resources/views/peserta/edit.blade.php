<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Peserta BPJS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-light">

    @include('layouts.navbar')

    <div class="container mt-4 mb-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow border-0 rounded-4">
                    <div class="card-header bg-warning text-dark p-4 rounded-top-4">
                        <h4 class="mb-0 fw-bold">✏️ Edit Data Peserta BPJS</h4>
                        <p class="mb-0 text-muted small">Perbarui data warga atau masyarakat yang terdaftar.</p>
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

                        <form action="{{ route('peserta.update', $peserta->id) }}" method="POST">
                            @method('PUT')

                            <!-- Memanggil file _form.blade.php -->
                            @include('peserta._form')

                            <div class="d-flex justify-content-between align-items-center mt-4">
                                <a href="{{ route('peserta.index') }}" class="btn btn-outline-secondary px-4">Kembali</a>
                                <button type="submit" class="btn btn-warning px-4 fw-semibold text-white shadow-sm">Update Data Warga</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>