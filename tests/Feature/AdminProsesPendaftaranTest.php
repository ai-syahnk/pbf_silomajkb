<?php

namespace Tests\Feature;

use App\Models\Kompetisi;
use App\Models\Peserta;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class AdminProsesPendaftaranTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_bisa_menerima_pendaftaran(): void
    {
        $admin = User::factory()->createOne(['role' => 'admin']);
        $userPeserta = User::factory()->createOne(['role' => 'peserta']);

        $peserta = Peserta::create([
            'user_id' => $userPeserta->id,
            'nim' => '22100111',
            'telepon' => '+628111111111',
            'prodi' => 'Teknik Informatika',
            'portofolio_path' => 'peserta/portofolio/file.pdf',
            'ktm_path' => 'peserta/ktm/ktm.pdf',
        ]);

        $kompetisi = Kompetisi::create([
            'nama' => 'Lomba Pemrograman',
            'periode_pendaftaran' => '1 Mei 2026 - 31 Mei 2026',
            'deskripsi' => 'Kompetisi coding.',
            'syarat_ketentuan' => 'Wajib mahasiswa aktif.',
            'gambar' => 'kompetisi/poster.png',
        ]);

        $kompetisi->peserta()->attach($peserta->id, [
            'kategori' => 'Pemrograman',
            'nama_tim' => 'Tim Alpha',
            'anggota' => 'Ari, Beni',
        ]);

        $pendaftaranId = DB::table('kompetisi_peserta')->value('id');

        $response = $this->actingAs($admin)
            ->from(route('admin.dashboard'))
            ->patch(route('admin.pendaftaran.proses', $pendaftaranId), [
                'status' => 'diterima',
                'catatan_admin' => 'Dokumen valid.',
            ]);

        $response->assertRedirect(route('admin.dashboard'));
        $response->assertSessionHas('success', 'Pendaftaran berhasil diterima.');

        $this->assertDatabaseHas('kompetisi_peserta', [
            'id' => $pendaftaranId,
            'status' => 'diterima',
            'catatan_admin' => 'Dokumen valid.',
        ]);
    }

    public function test_pendaftaran_yang_sudah_diproses_tidak_bisa_diproses_ulang(): void
    {
        $admin = User::factory()->createOne(['role' => 'admin']);
        $userPeserta = User::factory()->createOne(['role' => 'peserta']);

        $peserta = Peserta::create([
            'user_id' => $userPeserta->id,
            'nim' => '22100112',
            'telepon' => '+628122222222',
            'prodi' => 'Sistem Informasi',
            'portofolio_path' => 'peserta/portofolio/file.pdf',
            'ktm_path' => 'peserta/ktm/ktm.pdf',
        ]);

        $kompetisi = Kompetisi::create([
            'nama' => 'Lomba UI/UX',
            'periode_pendaftaran' => '1 Mei 2026 - 31 Mei 2026',
            'deskripsi' => 'Kompetisi desain.',
            'syarat_ketentuan' => 'Wajib mahasiswa aktif.',
            'gambar' => 'kompetisi/poster.png',
        ]);

        $kompetisi->peserta()->attach($peserta->id, [
            'kategori' => 'UI/UX',
            'nama_tim' => 'Tim Beta',
            'anggota' => 'Citra, Dimas',
            'status' => 'ditolak',
            'catatan_admin' => 'Dokumen tidak lengkap.',
        ]);

        $pendaftaranId = DB::table('kompetisi_peserta')->value('id');

        $response = $this->actingAs($admin)
            ->from(route('admin.dashboard'))
            ->patch(route('admin.pendaftaran.proses', $pendaftaranId), [
                'status' => 'diterima',
            ]);

        $response->assertRedirect(route('admin.dashboard'));
        $response->assertSessionHas('error', 'Pendaftaran sudah diproses sebelumnya.');

        $this->assertDatabaseHas('kompetisi_peserta', [
            'id' => $pendaftaranId,
            'status' => 'ditolak',
            'catatan_admin' => 'Dokumen tidak lengkap.',
        ]);
    }
}
