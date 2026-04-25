@extends('layouts.panel.main')

@section('content')
<div class="mb-4 d-flex justify-content-between align-items-center">
    <h2 class="fw-bold fs-4 m-0">Form Tambah Kompetisi</h2>
    <a href="{{ route('admin.kompetisi') }}" class="btn btn-outline-secondary shadow-sm">
        <i class="bi bi-arrow-left me-1"></i> Kembali
    </a>
</div>

<div class="card border-0 shadow-sm" style="background-color: var(--primary-color);">
    <div class="card-body p-4">
        <form action="{{ route('admin.kompetisi.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="mb-4">
                <label for="nama" class="form-label fw-medium text-white">Nama Kompetisi <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama') }}" placeholder="Masukkan nama kompetisi" required>
                @error('nama')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="mb-4">
                <label for="periode_pendaftaran" class="form-label fw-medium text-white">Periode Pendaftaran <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('periode_pendaftaran') is-invalid @enderror" id="periode_pendaftaran" name="periode_pendaftaran" value="{{ old('periode_pendaftaran') }}" placeholder="Contoh: 1 Juli - 31 Agustus 2026" required>
                @error('periode_pendaftaran')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="mb-4">
                <label for="deskripsi" class="form-label fw-medium text-white">Deskripsi Kompetisi <span class="text-danger">*</span></label>
                <textarea class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi" rows="5" placeholder="Masukkan deskripsi lengkap tentang kompetisi" required>{{ old('deskripsi') }}</textarea>
                @error('deskripsi')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="mb-4">
                <label for="syarat_ketentuan" class="form-label fw-medium text-white">Syarat & Ketentuan <span class="text-danger">*</span></label>
                <textarea class="form-control @error('syarat_ketentuan') is-invalid @enderror" id="syarat_ketentuan" name="syarat_ketentuan" rows="5" placeholder="Masukkan syarat dan ketentuan kompetisi" required>{{ old('syarat_ketentuan') }}</textarea>
                @error('syarat_ketentuan')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="gambar" class="form-label fw-medium text-white">Gambar/Poster Kompetisi <span class="text-danger">*</span></label>
                <input type="file" class="form-control @error('gambar') is-invalid @enderror" id="gambar" name="gambar" accept="image/*" required>
                <div class="form-text text-white-50">Format yang didukung: JPG, PNG, JPEG. Ukuran maksimal: 2MB.</div>
                @error('gambar')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="d-flex justify-content-end gap-2 mt-5">
                <a href="{{ route('admin.kompetisi') }}" class="btn btn-danger px-4">Batal</a>
                <button type="submit" class="btn btn-success px-4">Simpan Data</button>
            </div>
        </form>
    </div>
</div>
@endsection
