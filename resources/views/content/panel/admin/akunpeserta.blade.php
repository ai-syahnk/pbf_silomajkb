@extends('layouts.panel.main')

@section('content')
<div class="mb-4">
    <h2 class="fw-bold fs-4 m-0">Akun Peserta</h2>
</div>

@if(session('success'))
<div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<div class="card border-0 shadow-sm mb-4" style="background-color: var(--primary-color); border-radius: 12px;">
    <div class="card-body p-4">
        <div class="table-responsive">
            <table class="table mb-0 w-100 my-table align-middle">
                <thead>
                    <tr>
                        <th class="text-center">NO</th>
                        <th>Nama</th>
                        <th>NPM</th>
                        <th>Prodi</th>
                        <th>No HP</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($peserta as $index => $item)
                    <tr>
                        <td class="text-center">{{ $index + 1 }}</td>
                        <td class="fw-bold">{{ $item->user->name }}</td>
                        <td class="fw-bold">{{ $item->nim }}</td>
                        <td class="fw-bold">{{ $item->prodi }}</td>
                        <td class="fw-bold">{{ $item->telepon }}</td>
                        <td class="text-center">
                            <form action="{{ route('admin.peserta.reset-password', $item->id) }}" method="POST"
                                class="form-reset-password d-inline">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-light shadow-sm"
                                    style="border-radius: 8px; padding: 0.3rem 0.6rem; background-color: #d1d1d1; border: none;"
                                    title="Reset Password">
                                    <i class="bi bi-key-fill"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    @if($peserta->isEmpty())
                    <tr>
                        <td colspan="6" class="text-center py-4">Tidak ada data peserta.</td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
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
                    searchPlaceholder: "Search...",
                    lengthMenu: "Show _MENU_ entries",
                },
                pageLength: 10,
                lengthChange: true,
                responsive: true,
                dom: '<"d-flex justify-content-between align-items-center mb-3"lf>rt<"d-flex justify-content-between align-items-center mt-3"ip>'
            });
        }

        // SweetAlert2 reset password confirmation
        document.querySelectorAll('.form-reset-password').forEach(function(form) {
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                Swal.fire({
                    title: 'Apakah anda yakin?',
                    text: 'Password akan di-reset',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yakin',
                    cancelButtonText: 'Batal',
                    confirmButtonColor: '#ff0000', // Red as per design
                    cancelButtonColor: '#6c757d',
                    reverseButtons: false,
                    customClass: {
                        popup: 'swal-custom-popup',
                        title: 'swal-custom-title',
                        htmlContainer: 'swal-custom-text',
                        confirmButton: 'swal-btn-confirm',
                        cancelButton: 'swal-btn-cancel'
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire({
                            title: 'Akun Peserta',
                            html: 'Hasil generate password<br><b>12345678</b><br>Silahkan catat hasil generate ini, karena hanya bisa ditampilkan sekali.',
                            icon: 'success',
                            confirmButtonText: 'OK',
                            customClass: {
                                popup: 'swal-custom-popup',
                                title: 'swal-custom-title',
                                htmlContainer: 'swal-custom-text',
                                confirmButton: 'swal-btn-confirm'
                            }
                        }).then(() => {
                            form.submit();
                        });
                    }
                });
            });
        });
    });
</script>
@endpush