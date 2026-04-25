@extends('layouts.panel.main')

@section('content')
<div class="mb-4">
    <h2 class="fw-bold fs-4">Halaman Dashboard</h2>
</div>

<div class="card border-0 shadow-sm mb-4" style="background-color: var(--primary-color);">
    <div class="card-header border-0 py-4 px-4 text-white" style="background-color: transparent;">
        <h3 class="card-title m-0 fw-semibold fs-5">Permintaan Pendaftaran Perlombaan</h3>
    </div>
    <div class="card-body px-4 pb-4 pt-0">
        <table class="table mb-0 w-100 my-table">
            <thead>
                <tr>
                    <th>Kompetisi</th>
                    <th>Kategori</th>
                    <th>Nama Tim</th>
                    <th width="10px" class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>GEMASTIK</td>
                    <td>xxxxxxxx</td>
                    <td>xxxxxxxx</td>
                    <td>
                        <div class="d-flex gap-2">
                            <button class="btn btn-sm btn-primary">Detail</button>
                            <button class="btn btn-sm btn-success">Terima</button>
                            <button class="btn btn-sm btn-danger">Tolak</button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>GEMASTIK</td>
                    <td>xxxxxxxx</td>
                    <td>xxxxxxxx</td>
                    <td>
                        <div class="d-flex gap-2">
                            <button class="btn btn-sm btn-primary">Detail</button>
                            <button class="btn btn-sm btn-success">Terima</button>
                            <button class="btn btn-sm btn-danger">Tolak</button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>GEMASTIK</td>
                    <td>xxxxxxxx</td>
                    <td>xxxxxxxx</td>
                    <td>
                        <div class="d-flex gap-2">
                            <button class="btn btn-sm btn-primary">Detail</button>
                            <button class="btn btn-sm btn-success">Terima</button>
                            <button class="btn btn-sm btn-danger">Tolak</button>
                        </div>
                    </td>
                </tr>
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
