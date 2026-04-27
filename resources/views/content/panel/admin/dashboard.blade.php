@extends('layouts.panel.main')

@push('css')
<style>
    .modal-content {
        border-radius: 12px;
        border: none;
    }
    .modal-header {
        border-bottom: none;
        padding: 2rem 2rem 1rem;
    }
    .modal-title {
        color: #331E8A;
        font-weight: 700;
    }
    .modal-body {
        padding: 0 2rem 2rem;
    }
    .detail-card {
        background-color: #D9D9D9;
        border-radius: 15px;
        padding: 1.5rem;
        height: 100%;
    }
    .detail-card h4 {
        font-weight: 700;
        font-size: 1.1rem;
        margin-bottom: 1.5rem;
    }
    .info-group {
        margin-bottom: 1rem;
    }
    .info-group label {
        font-weight: 600;
        font-size: 0.9rem;
        display: block;
        margin-bottom: 0.3rem;
    }
    .info-value {
        background-color: white;
        padding: 0.5rem 1rem;
        border-radius: 5px;
        font-size: 0.9rem;
        min-height: 38px;
        display: flex;
        align-items: center;
    }
    .berkas-list {
        background-color: white;
        padding: 1rem;
        border-radius: 5px;
        margin-top: 1rem;
    }
    .berkas-list h5 {
        font-size: 0.85rem;
        font-weight: 700;
        margin-bottom: 0.5rem;
    }
    .berkas-list ol {
        padding-left: 1.2rem;
        margin-bottom: 0;
        font-size: 0.85rem;
    }
    .preview-img {
        width: 100%;
        border-radius: 10px;
        margin-bottom: 1rem;
    }
    .catatan-admin {
        background-color: white;
        border-radius: 5px;
        padding: 0.6rem;
    }
    .catatan-admin label {
        font-weight: 700;
        font-size: 0.75rem;
        margin-bottom: 0.5rem;
        display: block;
    }
    .catatan-admin textarea {
        border: none;
        width: 100%;
        resize: none;
        outline: none;
        font-size: 0.75rem;
    }
    .modal-btn-group {
        display: flex;
        justify-content: flex-end;
        gap: 0.5rem;
        margin-top: 1rem;
    }
    .btn-tutup {
        background-color: #FBB03B;
        color: white;
        border: none;
        padding: 0.5rem 1.5rem;
        border-radius: 5px;
        font-weight: 600;
    }
    .btn-terima-modal {
        background-color: #00A651;
        color: white;
        border: none;
        padding: 0.5rem 1.5rem;
        border-radius: 5px;
        font-weight: 600;
    }
    .btn-tolak-modal {
        background-color: #ED1C24;
        color: white;
        border: none;
        padding: 0.5rem 1.5rem;
        border-radius: 5px;
        font-weight: 600;
    }
</style>
@endpush

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
                    <td>Pemrograman</td>
                    <td>TIM GEMASTIK TI</td>
                    <td>
                        <div class="d-flex gap-2">
                            <button class="btn btn-sm btn-primary btn-detail-action" 
                                data-bs-toggle="modal" 
                                data-bs-target="#modalDetail"
                                data-tim="TIM GEMASTIK TI"
                                data-kompetisi="GEMASTIK"
                                data-kategori="Pemrograman"
                                data-kontak="0895337283953"
                                data-anggota="Valen"
                            >Detail</button>
                            <button class="btn btn-sm btn-success">Terima</button>
                            <button class="btn btn-sm btn-danger">Tolak</button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>GEMASTIK</td>
                    <td>Desain UI/UX</td>
                    <td>TIM UI/UX JKB</td>
                    <td>
                        <div class="d-flex gap-2">
                            <button class="btn btn-sm btn-primary btn-detail-action" 
                                data-bs-toggle="modal" 
                                data-bs-target="#modalDetail"
                                data-tim="TIM UI/UX JKB"
                                data-kompetisi="GEMASTIK"
                                data-kategori="Desain UI/UX"
                                data-kontak="081234567890"
                                data-anggota="Budi, Siti"
                            >Detail</button>
                            <button class="btn btn-sm btn-success">Terima</button>
                            <button class="btn btn-sm btn-danger">Tolak</button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>GEMASTIK</td>
                    <td>Cyber Security</td>
                    <td>TIM CYBER JKB</td>
                    <td>
                        <div class="d-flex gap-2">
                            <button class="btn btn-sm btn-primary btn-detail-action" 
                                data-bs-toggle="modal" 
                                data-bs-target="#modalDetail"
                                data-tim="TIM CYBER JKB"
                                data-kompetisi="GEMASTIK"
                                data-kategori="Cyber Security"
                                data-kontak="087766554433"
                                data-anggota="Andi, Jaka"
                            >Detail</button>
                            <button class="btn btn-sm btn-success">Terima</button>
                            <button class="btn btn-sm btn-danger">Tolak</button>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<!-- Modal Detail -->
<div class="modal fade" id="modalDetail" tabindex="-1" aria-labelledby="modalDetailLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title fs-4" id="modalDetailLabel">Permintaan Pendaftaran Perlombaan</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <!-- Left Column -->
                    <div class="col-md-7 mb-3 mb-md-0">
                        <div class="detail-card">
                            <h4 id="detailNamaTim">TIM GEMASTIK TI</h4>
                            
                            <div class="row info-group">
                                <div class="col-4">
                                    <label>Kompetisi</label>
                                </div>
                                <div class="col-8">
                                    <div class="info-value" id="detailKompetisi">GEMASTIK</div>
                                </div>
                            </div>
                            
                            <div class="row info-group">
                                <div class="col-4">
                                    <label>Kategori</label>
                                </div>
                                <div class="col-8">
                                    <div class="info-value" id="detailKategori">Pemrograman</div>
                                </div>
                            </div>
                            
                            <div class="row info-group">
                                <div class="col-4">
                                    <label>Kontak</label>
                                </div>
                                <div class="col-8">
                                    <div class="info-value" id="detailKontak">0895337283953</div>
                                </div>
                            </div>
                            
                            <div class="row info-group">
                                <div class="col-4">
                                    <label>Anggota</label>
                                </div>
                                <div class="col-8">
                                    <div class="info-value" id="detailAnggota">Valen</div>
                                </div>
                            </div>

                            <div class="berkas-list">
                                <h5>Berkas Persyaratan</h5>
                                <ol>
                                    <li>KTM <a href="#" class="text-primary text-decoration-none">(detail)</a></li>
                                    <li>Portofolio <a href="#" class="text-primary text-decoration-none">(detail)</a></li>
                                    <br><br>
                                </ol>
                            </div>
                        </div>
                    </div>

                    <!-- Right Column -->
                    <div class="col-md-5">
                        <div class="detail-card">
                            <img src="{{ asset('storage/peserta/ktm/jsFMIfU3iCvIIhaPwcDI5uA5kPJvYCZbdM45NyoX.png') }}" alt="Preview" class="preview-img" style="object-fit: fill; height: 250px;">
                            <!-- In real implementation, this would be the KTM image -->
                            
                            <div class="catatan-admin">
                                <label for="catatan">Catatan Admin:</label>
                                <textarea name="catatan" id="catatan" rows="2" placeholder="Tambahkan catatan..."></textarea>
                            </div>

                            <div class="modal-btn-group">
                                <button type="button" class="btn-tutup" data-bs-dismiss="modal">Tutup</button>
                                <button type="button" class="btn-terima-modal">Terima</button>
                                <button type="button" class="btn-tolak-modal">Tolak</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
                    searchPlaceholder: "Search..."
                },
                pageLength: 10,
                lengthChange: true,
                responsive: true
            });
        }

        // Modal Data Population
        const modalDetail = document.getElementById('modalDetail');
        if (modalDetail) {
            modalDetail.addEventListener('show.bs.modal', event => {
                const button = event.relatedTarget;
                
                const tim = button.getAttribute('data-tim');
                const kompetisi = button.getAttribute('data-kompetisi');
                const kategori = button.getAttribute('data-kategori');
                const kontak = button.getAttribute('data-kontak');
                const anggota = button.getAttribute('data-anggota');

                modalDetail.querySelector('#detailNamaTim').textContent = tim;
                modalDetail.querySelector('#detailKompetisi').textContent = kompetisi;
                modalDetail.querySelector('#detailKategori').textContent = kategori;
                modalDetail.querySelector('#detailKontak').textContent = kontak;
                modalDetail.querySelector('#detailAnggota').textContent = anggota;
            });
        }
    });
</script>
@endpush
