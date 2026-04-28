<?php

namespace App\Http\Controllers;

use App\Models\Kompetisi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class KompetisiController extends Controller
{
    /**
     * Tampilkan daftar kompetisi.
     */
    public function index()
    {
        $kompetisi = Kompetisi::latest()->get();
        return view('content.panel.admin.kompetisi.index', compact('kompetisi'));
    }

    /**
     * Tampilkan form tambah kompetisi.
     */
    public function create()
    {
        return view('content.panel.admin.kompetisi.create');
    }

    /**
     * Simpan data kompetisi baru.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'periode_pendaftaran' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'syarat_ketentuan' => 'required|string',
            'gambar' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ], [
            'nama.required' => 'Nama kompetisi wajib diisi.',
            'periode_pendaftaran.required' => 'Periode pendaftaran wajib diisi.',
            'deskripsi.required' => 'Deskripsi kompetisi wajib diisi.',
            'syarat_ketentuan.required' => 'Syarat & ketentuan wajib diisi.',
            'gambar.required' => 'Gambar/poster kompetisi wajib diunggah.',
            'gambar.image' => 'File harus berupa gambar.',
            'gambar.mimes' => 'Format gambar harus JPG, JPEG, atau PNG.',
            'gambar.max' => 'Ukuran gambar maksimal 2MB.',
        ]);

        $gambarPath = $request->file('gambar')->store('kompetisi', 'public');

        Kompetisi::create([
            'nama' => $request->nama,
            'periode_pendaftaran' => $request->periode_pendaftaran,
            'deskripsi' => $request->deskripsi,
            'syarat_ketentuan' => $request->syarat_ketentuan,
            'gambar' => $gambarPath,
        ]);

        return redirect()->route('admin.kompetisi')->with('success', 'Kompetisi berhasil ditambahkan!');
    }

    /**
     * Tampilkan form edit kompetisi.
     */
    public function edit(Kompetisi $kompetisi)
    {
        return view('content.panel.admin.kompetisi.edit', compact('kompetisi'));
    }

    /**
     * Update data kompetisi.
     */
    public function update(Request $request, Kompetisi $kompetisi)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'periode_pendaftaran' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'syarat_ketentuan' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ], [
            'nama.required' => 'Nama kompetisi wajib diisi.',
            'periode_pendaftaran.required' => 'Periode pendaftaran wajib diisi.',
            'deskripsi.required' => 'Deskripsi kompetisi wajib diisi.',
            'syarat_ketentuan.required' => 'Syarat & ketentuan wajib diisi.',
            'gambar.image' => 'File harus berupa gambar.',
            'gambar.mimes' => 'Format gambar harus JPG, JPEG, atau PNG.',
            'gambar.max' => 'Ukuran gambar maksimal 2MB.',
        ]);

        $data = [
            'nama' => $request->nama,
            'periode_pendaftaran' => $request->periode_pendaftaran,
            'deskripsi' => $request->deskripsi,
            'syarat_ketentuan' => $request->syarat_ketentuan,
        ];

        if ($request->hasFile('gambar')) {
            // Hapus gambar lama
            if ($kompetisi->gambar) {
                Storage::disk('public')->delete($kompetisi->gambar);
            }
            $data['gambar'] = $request->file('gambar')->store('kompetisi', 'public');
        }

        $kompetisi->update($data);

        return redirect()->route('admin.kompetisi')->with('success', 'Kompetisi berhasil diperbarui!');
    }

    /**
     * Hapus data kompetisi.
     */
    public function destroy(Kompetisi $kompetisi)
    {
        if ($kompetisi->gambar) {
            Storage::disk('public')->delete($kompetisi->gambar);
        }

        $kompetisi->delete();

        return redirect()->route('admin.kompetisi')->with('success', 'Kompetisi berhasil dihapus!');
    }

    /**
     * Daftarkan peserta login ke kompetisi.
     */
    public function daftar(Request $request, Kompetisi $kompetisi)
    {
        $user = $request->user();
        $peserta = $user?->peserta;

        if (!$peserta) {
            return redirect()->route('peserta.profil')
                ->with('error', 'Lengkapi profil peserta terlebih dahulu sebelum mendaftar kompetisi.');
        }

        if (empty($peserta->portofolio_path) || empty($peserta->ktm_path)) {
            return redirect()->route('peserta.profil')
                ->with('error', 'Portofolio dan KTM wajib diunggah sebelum mendaftar kompetisi.');
        }

        $sudahTerdaftar = $kompetisi->peserta()
            ->wherePivot('peserta_id', $peserta->id)
            ->exists();

        if ($sudahTerdaftar) {
            return back()->with('error', 'Anda sudah terdaftar pada kompetisi ini.');
        }

        $validated = $request->validate([
            'kategori' => ['required', 'string', 'max:100'],
            'nama_tim' => ['required', 'string', 'max:150'],
            'anggota' => ['required', 'string', 'max:2000'],
        ], [
            'kategori.required' => 'Kategori wajib diisi.',
            'nama_tim.required' => 'Nama tim wajib diisi.',
            'anggota.required' => 'Anggota tim wajib diisi.',
        ]);

        $kompetisi->peserta()->attach($peserta->id, [
            'kategori' => $validated['kategori'],
            'nama_tim' => $validated['nama_tim'],
            'anggota' => $validated['anggota'],
        ]);

        return back()->with('success', 'Pendaftaran kompetisi berhasil dikirim.');
    }

    /**
     * Proses status pendaftaran lomba oleh admin.
     */
    public function prosesPendaftaran(Request $request, int $pendaftaranId)
    {
        $validated = $request->validate([
            'status' => ['required', 'in:diterima,ditolak'],
            'catatan_admin' => ['nullable', 'string', 'max:2000'],
        ], [
            'status.required' => 'Status proses wajib dipilih.',
            'status.in' => 'Status tidak valid.',
            'catatan_admin.max' => 'Catatan admin maksimal 2000 karakter.',
        ]);

        $pendaftaran = DB::table('kompetisi_peserta')->where('id', $pendaftaranId)->first();

        if (!$pendaftaran) {
            return back()->with('error', 'Data pendaftaran tidak ditemukan.');
        }

        if (in_array($pendaftaran->status, ['diterima', 'ditolak'], true)) {
            return back()->with('error', 'Pendaftaran sudah diproses sebelumnya.');
        }

        DB::table('kompetisi_peserta')
            ->where('id', $pendaftaranId)
            ->update([
                'status' => $validated['status'],
                'catatan_admin' => $validated['catatan_admin'] ?? null,
                'updated_at' => now(),
            ]);

        $labelStatus = $validated['status'] === 'diterima' ? 'diterima' : 'ditolak';

        return back()->with('success', "Pendaftaran berhasil {$labelStatus}.");
    }
}
