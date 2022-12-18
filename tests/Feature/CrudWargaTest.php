<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Warga;
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

    public function test_user_can_see_edit_page()
    {
        $user = User::factory()->create();
        $warga = Warga::factory()->create();
        $response = $this->actingAs($user)->get('/warga/edit/' . $warga->id);
        $response->assertStatus(200);
        $response->assertSee($warga->nama);
    }
}
