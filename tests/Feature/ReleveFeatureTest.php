<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Vehicule;
use App\Models\ReleveKilo;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use App\Models\User;

class ReleveFeatureTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        Artisan::call('db:seed', ['--class' => 'DatabaseSeeder']);
        $user = User::factory()->create();
        Auth::login($user);
    }

    public function testCreateReleveKilometrique()
    {
        $vehicule = Vehicule::factory()->create();
        $data = [
            'id_vehicule' => $vehicule->id_vehicule,
            'kilometrage' => 1234.56,
            'month' => 7,
            'year' => 2023
        ];

        $response = $this->post(route('covoiturage.vehicule_releve_kilometrique_create'), $data);

        $response->assertStatus(302);
        $this->assertDatabaseHas('releve_kilo', $data);
    }
}
