@extends('layouts.panel.main')

@section('content')
    <div class="mb-4">
        <h2 class="fw-bold fs-4" style="color: #331E8A;">Riwayat Hasil Lomba</h2>
    </div>

    <div class="card border border-dark border-opacity-11 rounded-4 mb-4 shadow-sm">
        <div class="card-body p-4 p-md-5">
            <!-- Informasi Mahasiswa -->
            <div class="mb-5">
                <h5 class="fw-bold mb-4" style="font-size: 1.1rem;">Informasi Mahasiswa</h5>
                <div class="row g-4">
                    <div class="col-md-3">
                        <div class="mb-4">
                            <label class="text-muted small d-block mb-1">Nama</label>
                            <span class="fw-bold" style="font-size: 0.9rem;">{{ Auth::user()->name }}</span>
                        </div>
                        <div>
                            <label class="text-muted small d-block mb-1">Email</label>
                            <span class="text-dark" style="font-size: 0.9rem;">{{ Auth::user()->email }}</span>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-4">
                            <label class="text-muted small d-block mb-1">NPM</label>
                            <span class="fw-bold" style="font-size: 0.9rem;">{{ $peserta->nim ?? '-' }}</span>
                        </div>
                        <div>
                            <label class="text-muted small d-block mb-1">Status Mahasiswa</label>
                            <span class="text-success fw-bold" style="font-size: 0.9rem;"><i
                                    class="bi-check-circle-fill"></i> Terverifikasi</span>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label class="text-muted small d-block mb-1">Prodi</label>
                        <span class="text-dark" style="font-size: 0.9rem;">{{ $peserta->prodi ?? '-' }}</span>
                    </div>
                    <div class="col-md-3">
                        <label class="text-muted small d-block mb-1">No Hp</label>
                        <span class="text-dark" style="font-size: 0.9rem;">{{ $peserta->telepon ?? '-' }}</span>
                    </div>
                </div>
            </div>

            <!-- Riwayat Lomba -->
            <div>
                <h5 class="fw-bold mb-4" style="font-size: 1.1rem;">Riwayat Lomba</h5>
                <div class="d-flex flex-column gap-4">
                    @forelse ($riwayat as $item)
                        <div class="border border-dark border-opacity-11 rounded-1 p-4">
                            <div class="row g-4">
                                <div class="col-md-3">
                                    <div class="rounded overflow-hidden" style="max-height: 500px;">
                                        <img src="{{ $item->gambar ? asset('storage/' . $item->gambar) : asset('images/kompetisi-1.jpg') }}"
                                            alt="{{ $item->nama }}" class="w-100 h-100 object-fit-cover">
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                        <h6 class="fw-bold mb-0" style="font-size: 1rem;">{{ $item->nama }}</h6>
                                        @php
                                            $status = $item->pivot->status ?? 'pending';
                                        @endphp
                                        @if ($status === 'diterima')
                                            <span class="badge bg-success">Diterima</span>
                                        @elseif ($status === 'ditolak')
                                            <span class="badge bg-danger">Ditolak</span>
                                        @else
                                            <span class="badge bg-warning text-dark">Pending</span>
                                        @endif
                                    </div>

                                    <div class="row g-2 mb-3" style="font-size: 0.85rem;">
                                        <div class="col-md-4"><strong>Kategori:</strong> {{ $item->pivot->kategori ?? '-' }}
                                        </div>
                                        <div class="col-md-4"><strong>Nama Tim:</strong> {{ $item->pivot->nama_tim ?? '-' }}
                                        </div>
                                        <div class="col-md-4"><strong>Anggota:</strong> {{ $item->pivot->anggota ?? '-' }}
                                        </div>
                                    </div>

                                    <div class="text-dark small"
                                        style="text-align: justify; line-height: 1.6; font-size: 0.85rem;">
                                        {!! nl2br(e($item->deskripsi)) !!}
                                    </div>

                                    @if (!empty($item->pivot->catatan_admin))
                                        <div class="mt-3 p-2 border rounded bg-light" style="font-size: 0.85rem;">
                                            <strong>Catatan Admin:</strong> {{ $item->pivot->catatan_admin }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="text-center py-5 border border-dark border-opacity-10 rounded-1">
                            <p class="text-muted mb-0">Belum ada riwayat lomba yang diikuti.</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
@endsection
