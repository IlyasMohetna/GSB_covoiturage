<?php 

namespace Tests\Unit;

use Tests\TestCase;
use App\Services\VehiculeService;
use App\Models\Vehicule;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Mockery;

class VehiculeServiceTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        Artisan::call('db:seed', ['--class' => 'DatabaseSeeder']);
        $user = User::factory()->create();
        Auth::login($user);
    }

    public function test_get_personal_vehicules()
    {
        Vehicule::factory()->count(3)->create(['code_employe' => auth()->user()->code_employe]);

        $service = new VehiculeService();
        $vehicules = $service->getPersonalVehicules(auth()->user()->code_employe);
        $this->assertCount(3, $vehicules);
    }

    public function test_create_personal_vehicule()
    {

        $data = [
            'immatriculation' => 'ABC123',
            'marque' => 'Toyota',
            'model' => 'Corolla',
            'annee_model' => 2020,
            'photo' => 'photo.jpg',
        ];
        $employeeCode = '12345';

        $service = new VehiculeService();
        $vehicule = $service->createPersonalVehicule($data, $employeeCode);

        $this->assertDatabaseHas('vehicule', [
            'immatriculation' => 'ABC123',
            'code_employe' => $employeeCode,
        ]);
    }
}
