@extends('layouts.panel.main')

@section('content')
<div class="mb-4 d-flex justify-content-between align-items-center">
    <h2 class="fw-bold fs-4 m-0">Daftar Kompetisi</h2>
    <a href="{{ route('admin.kompetisi.create') }}" class="btn btn-primary shadow-sm" style="background-color: var(--primary-color); border-color: var(--primary-color);">
        <i class="bi bi-plus-lg me-1"></i> Tambah Kompetisi
    </a>
</div>

@if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<div class="card border-0 shadow-sm mb-4" style="background-color: var(--primary-color);">
    <div class="card-body px-4 pb-4 pt-4">
        <table class="table mb-0 w-100 my-table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Gambar</th>
                    <th>Nama</th>
                    <th>Deskripsi</th>
                    <th>Syarat & Ketentuan</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($kompetisi as $index => $item)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>
                        <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->nama }}" width="100px">
                    </td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ Str::limit($item->deskripsi, 80) }}</td>
                    <td>{{ Str::limit($item->syarat_ketentuan, 80) }}</td>
                    <td>
                        <div class="d-flex gap-2 justify-content-center">
                            <button class="btn btn-sm btn-primary" style="background-color: var(--secondary-color); border-color: var(--secondary-color);">Edit</button>
                            <button class="btn btn-sm btn-danger">Hapus</button>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center py-4">Belum ada data kompetisi.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        if (typeof jQuery !== 'undefined' && $.fn.DataTable) {
            $('.my-table').DataTable({
                language: {
                    search: "",
                    searchPlaceholder: "Search..."
                },
                pageLength: 10,
                lengthChange: true,
                responsive: true
            });
        }
    });
</script>
@endpush
