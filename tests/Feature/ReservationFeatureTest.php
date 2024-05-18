<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Reservation;
use App\Models\Trajet;
use App\Models\Etape;
use App\Models\User;
use App\Models\Ville;
use App\Models\Vehicule;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Carbon\Carbon;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;

class ReservationFeatureTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        Artisan::call('db:seed', ['--class' => 'DatabaseSeeder']);
        $user = User::factory()->create();
        Auth::login($user);
    }

    public function test_create_reservation_feature()
    {
        // OK
        logger()->info('Environment: ' . app()->environment());
        logger()->info('DB Connection: ' . config('database.default'));
        logger()->info('DB Database: ' . config('database.connections.mysql.database'));

        $ville1 = Ville::first();
        $ville2 = Ville::skip(1)->first();

        $vehicule = Vehicule::factory()->create(['code_employe' => auth()->user()->code_employe]);

        $trajet = Trajet::create([
            'nombre_place_maximum' => 4,
            'id_vehicule' => $vehicule->id_vehicule,
            'code_employe' => auth()->user()->code_employe,
        ]);

        $startDate = Carbon::createFromFormat('d/m/Y H:i:s', '12/12/2023 10:00:00');
        $endDate = $startDate->copy()->addHours(1);

        $etapeDepart = Etape::create([
            'ordre_etape' => 1,
            'date_passage' => $startDate,
            'id_trajet' => $trajet->id_trajet,
            'id_ville' => $ville1->id_ville,
        ]);

        $etapeArrive = Etape::create([
            'ordre_etape' => 2,
            'date_passage' => $endDate,
            'id_trajet' => $trajet->id_trajet,
            'id_ville' => $ville2->id_ville,
        ]);

        $data = [
            'modal_id_trajet' => $trajet->id_trajet,
            'modal_etape_depart' => $etapeDepart->id_etape,
            'modal_etape_arrive' => $etapeArrive->id_etape,
        ];

        $employeeCode = auth()->user()->code_employe;

        $response = $this->post(route('covoiturage.annonce_reserver_action'), $data);
        if ($response->status() === 419) {
            logger()->error('Test failed with status 419. Response: ' . $response->getContent());
        }

        $response->assertStatus(302);
        $response->assertRedirect(route('covoiturage.reservation_confirmed_show'));

        $this->assertDatabaseHas('reservation', [
            'id_trajet' => $trajet->id_trajet,
            'code_employe' => $employeeCode,
            'id_etape_depart' => $etapeDepart->id_etape,
            'id_etape_arrive' => $etapeArrive->id_etape,
        ]);
    }
}
