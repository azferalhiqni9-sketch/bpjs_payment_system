<!-- resources/views/layouts/navbar.blade.php -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm mb-4">
    <div class="container">
        <a class="navbar-brand fw-bold" href="{{ route('peserta.index') }}">
            <i class="fa-solid fa-hospital-user me-2"></i> BPJS System
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('peserta.index') }}">
                        <i class="fa-solid fa-users me-1"></i> Data Peserta
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="fa-solid fa-file-invoice-dollar me-1"></i> Tagihan Iuran
                    </a>
                </li>
            </ul>
            <div class="d-flex align-items-center text-white gap-3">
                <span class="small">
                    <i class="fa-solid fa-user-shield me-1"></i> {{ Auth::user()->name ?? 'Petugas' }}
                </span>
                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-danger btn-sm fw-semibold shadow-sm">
                        <i class="fa-solid fa-right-from-bracket me-1"></i> Logout
                    </button>
                </form>
            </div>
        </div>
    </div>
</nav>