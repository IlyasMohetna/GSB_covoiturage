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
        $response->assertTrue(1);
    }
}
