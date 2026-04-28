<?php

namespace Tests\Feature;

use App\Models\Kompetisi;
use App\Models\Peserta;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class KompetisiDaftarTest extends TestCase
{
    use RefreshDatabase;

    public function test_guest_diarahkan_ke_login_saat_mendaftar_kompetisi(): void
    {
        $kompetisi = $this->buatKompetisi();

        $response = $this->post(route('web.kompetisi.daftar', $kompetisi));

        $response->assertRedirect(route('peserta.login'));
    }

    public function test_peserta_tanpa_dokumen_tidak_bisa_mendaftar(): void
    {
        $user = User::factory()->createOne(['role' => 'peserta']);
        /** @var User $user */
        $peserta = Peserta::create([
            'user_id' => $user->id,
            'nim' => '22100001',
            'telepon' => '+628123456789',
            'prodi' => 'Teknik Informatika',
            'portofolio_path' => null,
            'ktm_path' => null,
        ]);
        $kompetisi = $this->buatKompetisi();

        $response = $this->actingAs($user)
            ->from(route('web.kompetisi.detail', $kompetisi->id))
            ->post(route('web.kompetisi.daftar', $kompetisi), [
                'kategori' => 'UI/UX',
                'nama_tim' => 'Tim Sigma',
                'anggota' => 'Andi, Budi',
            ]);

        $response->assertRedirect(route('peserta.profil'));
        $response->assertSessionHas('error', 'Portofolio dan KTM wajib diunggah sebelum mendaftar kompetisi.');
        $this->assertDatabaseMissing('kompetisi_peserta', [
            'kompetisi_id' => $kompetisi->id,
            'peserta_id' => $peserta->id,
        ]);
    }

    public function test_peserta_dengan_dokumen_lengkap_berhasil_mendaftar(): void
    {
        $user = User::factory()->createOne(['role' => 'peserta']);
        /** @var User $user */
        $peserta = Peserta::create([
            'user_id' => $user->id,
            'nim' => '22100002',
            'telepon' => '+628123456788',
            'prodi' => 'Sistem Informasi',
            'portofolio_path' => 'peserta/portofolio/file.pdf',
            'ktm_path' => 'peserta/ktm/ktm.pdf',
        ]);
        $kompetisi = $this->buatKompetisi();

        $response = $this->actingAs($user)
            ->from(route('web.kompetisi.detail', $kompetisi->id))
            ->post(route('web.kompetisi.daftar', $kompetisi), [
                'kategori' => 'UI/UX',
                'nama_tim' => 'Tim Inovasi',
                'anggota' => 'Siti, Rina, Dewa',
            ]);

        $response->assertRedirect(route('web.kompetisi.detail', $kompetisi->id));
        $response->assertSessionHas('success', 'Pendaftaran kompetisi berhasil dikirim.');
        $this->assertDatabaseHas('kompetisi_peserta', [
            'kompetisi_id' => $kompetisi->id,
            'peserta_id' => $peserta->id,
            'kategori' => 'UI/UX',
            'nama_tim' => 'Tim Inovasi',
            'anggota' => 'Siti, Rina, Dewa',
        ]);
    }

    public function test_peserta_tidak_bisa_daftar_dua_kali_pada_kompetisi_yang_sama(): void
    {
        $user = User::factory()->createOne(['role' => 'peserta']);
        /** @var User $user */
        $peserta = Peserta::create([
            'user_id' => $user->id,
            'nim' => '22100003',
            'telepon' => '+628123456787',
            'prodi' => 'Teknik Komputer',
            'portofolio_path' => 'peserta/portofolio/file.pdf',
            'ktm_path' => 'peserta/ktm/ktm.pdf',
        ]);
        $kompetisi = $this->buatKompetisi();

        $kompetisi->peserta()->attach($peserta->id);

        $response = $this->actingAs($user)
            ->from(route('web.kompetisi.detail', $kompetisi->id))
            ->post(route('web.kompetisi.daftar', $kompetisi));

        $response->assertRedirect(route('web.kompetisi.detail', $kompetisi->id));
        $response->assertSessionHas('error', 'Anda sudah terdaftar pada kompetisi ini.');
        $this->assertDatabaseCount('kompetisi_peserta', 1);
    }

    private function buatKompetisi(): Kompetisi
    {
        return Kompetisi::create([
            'nama' => 'Lomba UI/UX Nasional',
            'periode_pendaftaran' => '1 Mei 2026 - 31 Mei 2026',
            'deskripsi' => 'Kompetisi desain antarmuka untuk mahasiswa.',
            'syarat_ketentuan' => 'Wajib mahasiswa aktif.',
            'gambar' => 'kompetisi/poster.png',
        ]);
    }
}
