<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class PesertaLoginTest extends TestCase
{
    use RefreshDatabase;

    public function test_peserta_can_login_from_peserta_login_form(): void
    {
        $user = User::factory()->create([
            'role' => 'peserta',
            'password' => Hash::make('password123'),
        ]);

        $response = $this->post(route('peserta.login.submit'), [
            'email' => $user->email,
            'password' => 'password123',
        ]);

        $response->assertRedirect(route('peserta.dashboard'));
        $this->assertAuthenticatedAs($user);
    }

    public function test_non_peserta_cannot_login_from_peserta_login_form(): void
    {
        $user = User::factory()->create([
            'role' => 'admin',
            'password' => Hash::make('password123'),
        ]);

        $response = $this->from(route('peserta.login'))->post(route('peserta.login.submit'), [
            'email' => $user->email,
            'password' => 'password123',
        ]);

        $response->assertRedirect(route('peserta.login'));
        $response->assertSessionHasErrors([
            'email' => 'Akun ini bukan akun peserta.',
        ]);
        $this->assertGuest();
    }
}
