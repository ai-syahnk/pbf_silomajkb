<?php

namespace Tests\Feature;

use App\Models\Kompetisi;
use App\Models\Peserta;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PesertaRiwayatStatusTest extends TestCase
{
    use RefreshDatabase;

    public function test_peserta_dapat_melihat_status_pending_di_riwayat_lomba(): void
    {
        $user = User::factory()->createOne(['role' => 'peserta']);
        /** @var User $user */
        $peserta = Peserta::create([
            'user_id' => $user->id,
            'nim' => '22100121',
            'telepon' => '+628133333333',
            'prodi' => 'Teknik Informatika',
            'portofolio_path' => 'peserta/portofolio/file.pdf',
            'ktm_path' => 'peserta/ktm/ktm.pdf',
        ]);

        $kompetisi = Kompetisi::create([
            'nama' => 'Lomba Data Science',
            'periode_pendaftaran' => '1 Mei 2026 - 31 Mei 2026',
            'deskripsi' => 'Kompetisi analisis data.',
            'syarat_ketentuan' => 'Wajib mahasiswa aktif.',
            'gambar' => 'kompetisi/poster.png',
        ]);

        $kompetisi->peserta()->attach($peserta->id, [
            'kategori' => 'Data Science',
            'nama_tim' => 'Tim Delta',
            'anggota' => 'Eka, Fajar',
            'status' => 'pending',
        ]);

        $response = $this->actingAs($user)->get(route('peserta.hasil'));

        $response->assertOk();
        $response->assertSee('Lomba Data Science');
        $response->assertSee('Pending');
    }

    public function test_peserta_dapat_melihat_status_final_dan_catatan_admin(): void
    {
        $user = User::factory()->createOne(['role' => 'peserta']);
        /** @var User $user */
        $peserta = Peserta::create([
            'user_id' => $user->id,
            'nim' => '22100122',
            'telepon' => '+628144444444',
            'prodi' => 'Sistem Informasi',
            'portofolio_path' => 'peserta/portofolio/file.pdf',
            'ktm_path' => 'peserta/ktm/ktm.pdf',
        ]);

        $kompetisi = Kompetisi::create([
            'nama' => 'Lomba UI/UX Mahasiswa',
            'periode_pendaftaran' => '1 Mei 2026 - 31 Mei 2026',
            'deskripsi' => 'Kompetisi desain antarmuka.',
            'syarat_ketentuan' => 'Wajib mahasiswa aktif.',
            'gambar' => 'kompetisi/poster.png',
        ]);

        $kompetisi->peserta()->attach($peserta->id, [
            'kategori' => 'UI/UX',
            'nama_tim' => 'Tim Sigma',
            'anggota' => 'Gina, Hana',
            'status' => 'ditolak',
            'catatan_admin' => 'Dokumen portofolio belum sesuai format.',
        ]);

        $response = $this->actingAs($user)->get(route('peserta.hasil'));

        $response->assertOk();
        $response->assertSee('Ditolak');
        $response->assertSee('Catatan Admin:');
        $response->assertSee('Dokumen portofolio belum sesuai format.');
    }
}
