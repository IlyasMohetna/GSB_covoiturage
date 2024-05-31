<?php 

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CovoiturageController;
use App\Http\Controllers\ParametrageController;

Route::middleware(['auth', 'auth.session'])->group(function () {
    Route::get('/covoiturage/create', [CovoiturageController::class, 'annonce_create_show'])->name('covoiturage.annonce_create_show');
    Route::post('/covoiturage/create', [CovoiturageController::class, 'annonce_create_action'])->name('covoiturage.annonce_create_action');
    Route::get('/covoiturage/annonces', [CovoiturageController::class, 'annonces_show'])->name('covoiturage.annonces_show');
    Route::get('/covoiturage/annonce/{id}', [CovoiturageController::class, 'annonce_show'])->name('covoiturage.annonce_show');
    Route::get('/covoiturage/reservations', [CovoiturageController::class, 'reservations_show'])->name('covoiturage.reservations_show');
    Route::get('/covoiturage/parc', [CovoiturageController::class, 'parc_show'])->name('covoiturage.parc_show');
    Route::get('/covoiturage/parc/vehicule_perso/create', [CovoiturageController::class, 'vehicule_perso_create_show'])->name('covoiturage.vehicule_perso_create_show');
    Route::post('/covoiturage/parc/vehicule_perso/create', [CovoiturageController::class, 'vehicule_perso_create_action'])->name('covoiturage.vehicule_perso_create_action');
    Route::get('/covoiturage/search', [CovoiturageController::class, 'annonce_search_show'])->name('covoiturage.annonce_search_show');
    Route::get('/api/covoiturage/search', [CovoiturageController::class, 'annonce_search_action'])->name('covoiturage.annonce_search_action');
    Route::get('/api/covoiturage/vehicule_perso/search', [CovoiturageController::class, 'vehicule_perso_available_search_action'])->name('covoiturage.vehicule_perso_available_search_action');
    Route::get('/api/covoiturage/vehicule_service/search', [CovoiturageController::class, 'vehicule_service_available_search_action'])->name('covoiturage.vehicule_service_available_search_action');
    Route::post('/covoiturage/reserver', [CovoiturageController::class, 'annonce_reserver'])->name('covoiturage.annonce_reserver_action');
    Route::get('/ville', [ParametrageController::class, 'ville_lookup'])->name('covoiturage.ville_lookup');
    Route::get('/departement', [ParametrageController::class, 'departement_lookup'])->name('covoiturage.departement_lookup');
    Route::get('/region', [ParametrageController::class, 'region_lookup'])->name('covoiturage.region_lookup');
    /* E5 */
    Route::get('/vehicule/historique_utilisation/{id}', [CovoiturageController::class, 'vehicule_historique_show'])->name('covoiturage.vehicule_historique_show');
    Route::get('/vehicule/releve_kilometrique/{id}', [CovoiturageController::class, 'vehicule_releve_kilometrique_show'])->name('covoiturage.vehicule_releve_kilometrique_show');
    Route::post('/vehicule/releve_kilometrique/create/', [CovoiturageController::class, 'vehicule_releve_kilometrique_create'])->name('covoiturage.vehicule_releve_kilometrique_create');

    Route::get('/covoiturage/reservation/confirmed', function () {
        if (!session('reservation_success')) {
            return redirect()->route('covoiturage.annonce_search_show');
        }
        session()->forget('reservation_success');
        return view('covoiturage.confirmed');
    })->name('covoiturage.reservation_confirmed_show');
});
