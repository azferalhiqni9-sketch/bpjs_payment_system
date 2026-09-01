<!-- resources/views/peserta/_form.blade.php -->
@csrf

<div class="mb-3">
    <label class="form-label fw-semibold">Nama Lengkap Warga</label>
    <input type="text" name="nama_warga" class="form-control" value="{{ old('nama_warga', $peserta->nama_warga ?? '') }}" placeholder="Contoh: Siti Aminah" required>
</div>

<div class="mb-3">
    <label class="form-label fw-semibold">Nomor BPJS</label>
    <input type="text" name="nomor_bpjs" class="form-control" value="{{ old('nomor_bpjs', $peserta->nomor_bpjs ?? '') }}" placeholder="Contoh: 000123456789" required>
</div>

<div class="mb-3">
    <label class="form-label fw-semibold">NIK (Nomor Induk Kependudukan)</label>
    <input type="text" name="nik" class="form-control" value="{{ old('nik', $peserta->nik ?? '') }}" placeholder="Contoh: 3271234567890001 (16 digit)" required>
</div>

<div class="mb-3">
    <label class="form-label fw-semibold">Kelas BPJS</label>
    <select name="kelas_bpjs" class="form-control" required>
        <option value="">-- Pilih Kelas Perawatan --</option>
        <option value="Kelas 1" {{ (old('kelas_bpjs', $peserta->kelas_bpjs ?? '') == 'Kelas 1') ? 'selected' : '' }}>Kelas 1</option>
        <option value="Kelas 2" {{ (old('kelas_bpjs', $peserta->kelas_bpjs ?? '') == 'Kelas 2') ? 'selected' : '' }}>Kelas 2</option>
        <option value="Kelas 3" {{ (old('kelas_bpjs', $peserta->kelas_bpjs ?? '') == 'Kelas 3') ? 'selected' : '' }}>Kelas 3</option>
    </select>
</div>

<div class="mb-3">
    <label class="form-label fw-semibold">Alamat Lengkap Warga</label>
    <textarea name="alamat" class="form-control" rows="3" placeholder="Masukkan alamat lengkap sesuai KTP...">{{ old('alamat', $peserta->alamat ?? '') }}</textarea>
</div>