<?php 

namespace Tests\Unit;

use Tests\TestCase;
use App\Services\TrajetService;
use App\Models\Trajet;
use App\Models\Etape;
use App\Models\User;
use App\Models\Ville;
use App\Models\Vehicule;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class TrajetServiceTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        Artisan::call('db:seed', ['--class' => 'DatabaseSeeder']);
        $user = User::factory()->create();
        Auth::login($user);
    }

    public function test_create_trajet()
    {
        $data = [
            'nombre_place_maximum' => 4,
            'id_vehicule' => 1,
        ];
        $employeeCode = '12345';

        $service = new TrajetService();
        $trajet = $service->createTrajet($data, $employeeCode);

        $this->assertDatabaseHas('trajet', [
            'nombre_place_maximum' => 4,
            'code_employe' => $employeeCode,
        ]);
    }

    public function test_create_etapes()
    {
        $ville1 = Ville::inRandomOrder()->first();
        $ville2 = Ville::inRandomOrder()->first();
        $arrivingDates = ['12/12/2023 10:00:00', '12/12/2023 11:30:00'];

        $vehicule = Vehicule::factory()->create(['code_employe' => auth()->user()->code_employe]);
        $trajet = Trajet::create([
            'nombre_place_maximum' => 4,
            'id_vehicule' => $vehicule->id_vehicule,
            'code_employe' => auth()->user()->code_employe,
        ]);

        $startLocation = $ville1->id_ville;
        $startDate = '12/12/2023 10:00';
        $steps = [];
        $endLocation = 4;

        $service = new TrajetService();
        $service->createEtapes($trajet->id_trajet, $startLocation, $startDate, $steps, $arrivingDates, $endLocation);

        $this->assertDatabaseHas('etape', [
            'id_trajet' => $trajet->id_trajet,
            'id_ville' => $startLocation,
        ]);
    }
}
