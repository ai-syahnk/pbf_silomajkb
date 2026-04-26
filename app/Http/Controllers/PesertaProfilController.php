<?php

namespace App\Http\Controllers;

use App\Models\Peserta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class PesertaProfilController extends Controller
{
    public function edit()
    {
        return view('content.panel.peserta.profil');
    }

    public function update(Request $request)
    {
        $user = $request->user();
        $peserta = $user->peserta;

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'nim' => [
                'required',
                'string',
                'max:20',
                Rule::unique('peserta', 'nim')->ignore($peserta?->id),
            ],
            'telepon' => ['required', 'string', 'min:8', 'max:20'],
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('users', 'email')->ignore($user->id),
            ],
            'prodi' => ['required', 'string', 'max:255'],
            'portofolio' => ['nullable', 'file', 'mimes:pdf,doc,docx,zip,rar', 'max:5120'],
            'ktm' => ['nullable', 'file', 'mimes:jpg,jpeg,png,pdf', 'max:3072'],
        ], [
            'name.required' => 'Nama wajib diisi.',
            'nim.required' => 'NIM wajib diisi.',
            'nim.unique' => 'NIM sudah terdaftar.',
            'telepon.required' => 'Nomor telepon wajib diisi.',
            'email.required' => 'Email wajib diisi.',
            'email.unique' => 'Email sudah terdaftar.',
            'prodi.required' => 'Program studi wajib diisi.',
            'portofolio.mimes' => 'Portofolio harus berupa file PDF, DOC, DOCX, ZIP, atau RAR.',
            'portofolio.max' => 'Ukuran portofolio maksimal 5MB.',
            'ktm.mimes' => 'KTM harus berupa file JPG, JPEG, PNG, atau PDF.',
            'ktm.max' => 'Ukuran file KTM maksimal 3MB.',
        ]);

        DB::transaction(function () use ($request, $user, $peserta, $validated) {
            $user->update([
                'name' => $validated['name'],
                'email' => $validated['email'],
            ]);

            $pesertaData = [
                'nim' => $validated['nim'],
                'telepon' => $this->normalizePhoneNumber($validated['telepon']),
                'prodi' => $validated['prodi'],
            ];

            if ($request->hasFile('portofolio')) {
                if ($peserta?->portofolio_path && Storage::disk('public')->exists($peserta->portofolio_path)) {
                    Storage::disk('public')->delete($peserta->portofolio_path);
                }

                $pesertaData['portofolio_path'] = $request->file('portofolio')->store('peserta/portofolio', 'public');
            }

            if ($request->hasFile('ktm')) {
                if ($peserta?->ktm_path && Storage::disk('public')->exists($peserta->ktm_path)) {
                    Storage::disk('public')->delete($peserta->ktm_path);
                }

                $pesertaData['ktm_path'] = $request->file('ktm')->store('peserta/ktm', 'public');
            }

            if ($peserta) {
                $peserta->update($pesertaData);
                return;
            }

            Peserta::create(array_merge(
                ['user_id' => $user->id],
                $pesertaData
            ));
        });

        return back()->with('success', 'Profil berhasil diperbarui.');
    }

    public function destroyPortofolio(Request $request)
    {
        $peserta = $request->user()->peserta;

        if (!$peserta || !$peserta->portofolio_path) {
            return back()->with('error', 'Dokumen portofolio belum tersedia.');
        }

        if (Storage::disk('public')->exists($peserta->portofolio_path)) {
            Storage::disk('public')->delete($peserta->portofolio_path);
        }

        $peserta->update(['portofolio_path' => null]);

        return back()->with('success', 'Dokumen portofolio berhasil dihapus.');
    }

    public function destroyKtm(Request $request)
    {
        $peserta = $request->user()->peserta;

        if (!$peserta || !$peserta->ktm_path) {
            return back()->with('error', 'Dokumen KTM belum tersedia.');
        }

        if (Storage::disk('public')->exists($peserta->ktm_path)) {
            Storage::disk('public')->delete($peserta->ktm_path);
        }

        $peserta->update(['ktm_path' => null]);

        return back()->with('success', 'Dokumen KTM berhasil dihapus.');
    }

    private function normalizePhoneNumber(string $phoneNumber): string
    {
        $numbersOnly = preg_replace('/\D+/', '', $phoneNumber) ?? '';

        if (str_starts_with($numbersOnly, '62')) {
            $numbersOnly = substr($numbersOnly, 2);
        }

        $numbersOnly = ltrim($numbersOnly, '0');

        return '+62' . $numbersOnly;
    }
}
