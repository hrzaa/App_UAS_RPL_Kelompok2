<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CrudWargaTest extends TestCase
{

    use RefreshDatabase;

    public function test_user_cant_store_data()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->post('/warga/store', [
            'nama' => "Dinar",
            'nik' => "66666666",
            'email' => "dinar@gmail.com",
            'jenis_kelamin' => "P",
            'alamat' => "Karanganyar",
        ]);

        $response->assertRedirect('/warga');
        $this->assertDatabaseHas('warga', ['nama' => 'Dinar', 'nik' => '66666666', 'email' => 'dinar@gmail.com', 'jenis_kelamin' => 'P', 'alamat' => 'Karanganyar']);
    }
}
