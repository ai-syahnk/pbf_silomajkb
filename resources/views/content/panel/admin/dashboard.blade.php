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

    @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger" role="alert">
            {{ session('error') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger" role="alert">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

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
                        <th>Status</th>
                        <th width="10px" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pendaftaran as $item)
                        <tr>
                            <td>{{ $item->kompetisi }}</td>
                            <td>{{ $item->kategori ?? '-' }}</td>
                            <td>{{ $item->nama_tim ?? '-' }}</td>
                            <td>
                                @if ($item->status === 'diterima')
                                    <span class="badge bg-success">Diterima</span>
                                @elseif ($item->status === 'ditolak')
                                    <span class="badge bg-danger">Ditolak</span>
                                @else
                                    <span class="badge bg-warning text-dark">Pending</span>
                                @endif
                            </td>
                            <td>
                                <div class="d-flex gap-2">
                                    <button class="btn btn-sm btn-primary btn-detail-action" data-bs-toggle="modal"
                                        data-bs-target="#modalDetail" data-tim="{{ $item->nama_tim ?? '-' }}"
                                        data-kompetisi="{{ $item->kompetisi }}" data-kategori="{{ $item->kategori ?? '-' }}"
                                        data-kontak="{{ $item->kontak ?? '-' }}" data-anggota="{{ $item->anggota ?? '-' }}"
                                        data-status="{{ $item->status ?? 'pending' }}"
                                        data-catatan-admin="{{ $item->catatan_admin ?? '' }}"
                                        data-proses-url="{{ route('admin.pendaftaran.proses', $item->id) }}"
                                        data-ktm-url="{{ $item->ktm_path ? Storage::url($item->ktm_path) : '#' }}"
                                        data-portofolio-url="{{ $item->portofolio_path ? Storage::url($item->portofolio_path) : '#' }}">
                                        Detail
                                    </button>
                                    @if (($item->status ?? 'pending') === 'pending')
                                        <form action="{{ route('admin.pendaftaran.proses', $item->id) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('PATCH')
                                            <input type="hidden" name="status" value="diterima">
                                            <button class="btn btn-sm btn-success" type="submit">Terima</button>
                                        </form>
                                        <form action="{{ route('admin.pendaftaran.proses', $item->id) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('PATCH')
                                            <input type="hidden" name="status" value="ditolak">
                                            <button class="btn btn-sm btn-danger" type="submit">Tolak</button>
                                        </form>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @endforeach
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
                                <h4 id="detailNamaTim"></h4>

                                <div class="row info-group">
                                    <div class="col-4">
                                        <label>Kompetisi</label>
                                    </div>
                                    <div class="col-8">
                                        <div class="info-value" id="detailKompetisi"></div>
                                    </div>
                                </div>

                                <div class="row info-group">
                                    <div class="col-4">
                                        <label>Kategori</label>
                                    </div>
                                    <div class="col-8">
                                        <div class="info-value" id="detailKategori"></div>
                                    </div>
                                </div>

                                <div class="row info-group">
                                    <div class="col-4">
                                        <label>Kontak</label>
                                    </div>
                                    <div class="col-8">
                                        <div class="info-value" id="detailKontak"></div>
                                    </div>
                                </div>

                                <div class="row info-group">
                                    <div class="col-4">
                                        <label>Anggota</label>
                                    </div>
                                    <div class="col-8">
                                        <div class="info-value" id="detailAnggota"></div>
                                    </div>
                                </div>

                                <div class="berkas-list">
                                    <h5>Berkas Persyaratan</h5>
                                    <ol>
                                        <li>KTM <a href="#" id="detailKtmLink" target="_blank"
                                                class="text-primary text-decoration-none">(detail)</a>
                                        </li>
                                        <li>Portofolio <a href="#" id="detailPortofolioLink" target="_blank"
                                                class="text-primary text-decoration-none">(detail)</a></li>
                                        <br><br>
                                    </ol>
                                </div>
                            </div>
                        </div>

                        <!-- Right Column -->
                        <div class="col-md-5">
                            <div class="detail-card">
                                <img src="{{ asset('storage/peserta/ktm/NDwdcOEOc2Qvm3lWjCSIExSM6NZnu6zwaUL1RjPC.png') }}"
                                    alt="Preview" class="preview-img" style="object-fit: fill; height: 250px;">
                                <!-- In real implementation, this would be the KTM image -->
                                <form id="modalProsesForm" action="#" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <input type="hidden" id="modalStatusInput" name="status" value="">

                                    <div class="catatan-admin">
                                        <label for="catatanAdmin">Catatan Admin:</label>
                                        <textarea name="catatan_admin" id="catatanAdmin" rows="2" placeholder="Tambahkan catatan..."></textarea>
                                    </div>

                                    <div class="modal-btn-group">
                                        <button type="button" class="btn-tutup" data-bs-dismiss="modal">Tutup</button>
                                        <button type="button" id="btnTerimaModal"
                                            class="btn-terima-modal">Terima</button>
                                        <button type="button" id="btnTolakModal" class="btn-tolak-modal">Tolak</button>
                                    </div>
                                </form>
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
                        searchPlaceholder: "Search...",
                        emptyTable: "Belum ada permintaan pendaftaran."
                    },
                    pageLength: 10,
                    lengthChange: true,
                    responsive: true
                });
            }

            // Modal Data Population
            const modalDetail = document.getElementById('modalDetail');
            if (modalDetail) {
                const modalForm = modalDetail.querySelector('#modalProsesForm');
                const modalStatusInput = modalDetail.querySelector('#modalStatusInput');
                const catatanAdminField = modalDetail.querySelector('#catatanAdmin');
                const btnTerimaModal = modalDetail.querySelector('#btnTerimaModal');
                const btnTolakModal = modalDetail.querySelector('#btnTolakModal');

                modalDetail.addEventListener('show.bs.modal', event => {
                    const button = event.relatedTarget;

                    const tim = button.getAttribute('data-tim');
                    const kompetisi = button.getAttribute('data-kompetisi');
                    const kategori = button.getAttribute('data-kategori');
                    const kontak = button.getAttribute('data-kontak');
                    const anggota = button.getAttribute('data-anggota');
                    const status = button.getAttribute('data-status') || 'pending';
                    const catatanAdmin = button.getAttribute('data-catatan-admin') || '';
                    const prosesUrl = button.getAttribute('data-proses-url') || '#';
                    const ktmUrl = button.getAttribute('data-ktm-url') || '#';
                    const portofolioUrl = button.getAttribute('data-portofolio-url') || '#';
                    const isProcessed = status !== 'pending';

                    modalDetail.querySelector('#detailNamaTim').textContent = tim;
                    modalDetail.querySelector('#detailKompetisi').textContent = kompetisi;
                    modalDetail.querySelector('#detailKategori').textContent = kategori;
                    modalDetail.querySelector('#detailKontak').textContent = kontak;
                    modalDetail.querySelector('#detailAnggota').textContent = anggota;
                    modalDetail.querySelector('#detailKtmLink').setAttribute('href', ktmUrl);
                    modalDetail.querySelector('#detailPortofolioLink').setAttribute('href', portofolioUrl);

                    modalForm.setAttribute('action', prosesUrl);
                    catatanAdminField.value = catatanAdmin;
                    catatanAdminField.readOnly = isProcessed;
                    btnTerimaModal.disabled = isProcessed;
                    btnTolakModal.disabled = isProcessed;
                });

                btnTerimaModal.addEventListener('click', function() {
                    modalStatusInput.value = 'diterima';
                    modalForm.submit();
                });

                btnTolakModal.addEventListener('click', function() {
                    modalStatusInput.value = 'ditolak';
                    modalForm.submit();
                });
            }
        });
    </script>
@endpush
