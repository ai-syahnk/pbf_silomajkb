<?php

namespace App\Http\Controllers;

use App\Models\Kompetisi;
use Illuminate\Http\Request;
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
}
