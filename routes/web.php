<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImportController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

$proxy_url    = getenv('PROXY_URL');
$proxy_schema = getenv('PROXY_SCHEMA');

if (!empty($proxy_url)) {
   URL::forceRootUrl($proxy_url);
}

if (!empty($proxy_schema)) {
   URL::forceSchema($proxy_schema);
}

Route::get('/documentation/db', function(){
    return view('documentation');
})->name('documentation');

Route::get('/accueil', function(){
    return view('accueil');
})->middleware('auth')->name('accueil.show');

Route::get('/import', function(){
    return view('import');
});

Route::post('/import', [ImportController::class, 'ville_import']);

include __DIR__.'/auth.php';
include __DIR__.'/covoiturage.php';
include __DIR__.'/parametrage.php';
