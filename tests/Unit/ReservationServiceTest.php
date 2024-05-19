<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Services\ReservationService;
use App\Models\Reservation;
use App\Models\Trajet;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Ville;
use App\Models\Etape;
use App\Models\Vehicule;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;

class ReservationServiceTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        Artisan::call('db:seed', ['--class' => 'DatabaseSeeder']);
        $user = User::factory()->create();
        Auth::login($user);
    }

    public function test_create_reservation()
    {
        $ville1 = Ville::inRandomOrder()->first();
        $ville2 = Ville::inRandomOrder()->first();

        $vehicule = Vehicule::factory()->create(['code_employe' => auth()->user()->code_employe]);

        $trajet = Trajet::create([
            'nombre_place_maximum' => 4,
            'id_vehicule' => $vehicule->id_vehicule,
            'code_employe' => auth()->user()->code_employe,
        ]);

        $etapeDepart = Etape::create([
            'ordre_etape' => 1,
            'date_passage' => Carbon::now()->addDays(1),
            'id_trajet' => $trajet->id_trajet,
            'id_ville' => $ville1->id_ville,
        ]);

        $etapeArrive = Etape::create([
            'ordre_etape' => 2,
            'date_passage' => Carbon::now()->addDays(1)->addHours(1),
            'id_trajet' => $trajet->id_trajet,
            'id_ville' => $ville2->id_ville,
        ]);

        $data = [
            'id_etape_depart' => $etapeDepart->id_etape,
            'id_etape_arrive' => $etapeArrive->id_etape,
        ];

        $employeeCode = auth()->user()->code_employe;

        $service = new ReservationService();
        $reservation = $service->createReservation($trajet->id_trajet, $data, $employeeCode);

        $this->assertDatabaseHas('reservation', [
            'id_trajet' => $trajet->id_trajet,
            'code_employe' => $employeeCode,
        ]);
    }
}
