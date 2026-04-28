<?php

namespace Tests\Feature;

use App\Models\Kompetisi;
use App\Models\Peserta;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PesertaDashboardStatsTest extends TestCase
{
    use RefreshDatabase;

    public function test_dashboard_menampilkan_jumlah_lomba_sudah_dan_sedang_diikuti_secara_realtime(): void
    {
        $user = User::factory()->createOne(['role' => 'peserta']);
        /** @var User $user */

        $peserta = Peserta::create([
            'user_id' => $user->id,
            'nim' => '22100131',
            'telepon' => '+628155555555',
            'prodi' => 'Teknik Informatika',
            'portofolio_path' => 'peserta/portofolio/file.pdf',
            'ktm_path' => 'peserta/ktm/ktm.pdf',
        ]);

        $kompetisiPending = Kompetisi::create([
            'nama' => 'Lomba A',
            'periode_pendaftaran' => '1 Mei 2026 - 31 Mei 2026',
            'deskripsi' => 'Deskripsi A',
            'syarat_ketentuan' => 'Syarat A',
            'gambar' => 'kompetisi/a.png',
        ]);

        $kompetisiDiterima = Kompetisi::create([
            'nama' => 'Lomba B',
            'periode_pendaftaran' => '1 Mei 2026 - 31 Mei 2026',
            'deskripsi' => 'Deskripsi B',
            'syarat_ketentuan' => 'Syarat B',
            'gambar' => 'kompetisi/b.png',
        ]);

        $kompetisiDitolak = Kompetisi::create([
            'nama' => 'Lomba C',
            'periode_pendaftaran' => '1 Mei 2026 - 31 Mei 2026',
            'deskripsi' => 'Deskripsi C',
            'syarat_ketentuan' => 'Syarat C',
            'gambar' => 'kompetisi/c.png',
        ]);

        $kompetisiPending->peserta()->attach($peserta->id, [
            'kategori' => 'A',
            'nama_tim' => 'Tim A',
            'anggota' => 'Anggota A',
            'status' => 'pending',
        ]);

        $kompetisiDiterima->peserta()->attach($peserta->id, [
            'kategori' => 'B',
            'nama_tim' => 'Tim B',
            'anggota' => 'Anggota B',
            'status' => 'diterima',
        ]);

        $kompetisiDitolak->peserta()->attach($peserta->id, [
            'kategori' => 'C',
            'nama_tim' => 'Tim C',
            'anggota' => 'Anggota C',
            'status' => 'ditolak',
        ]);

        $response = $this->actingAs($user)->get(route('peserta.dashboard'));

        $response->assertOk();
        $response->assertViewHas('jumlahSedangDiikuti', 1);
        $response->assertViewHas('jumlahSudahDiikuti', 2);
    }
}
