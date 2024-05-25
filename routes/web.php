<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImportController;
use App\Http\Controllers\HoneyPotController;


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

Route::get('/documentation/db', function(){
    return view('documentation');
})->name('documentation');

Route::get('/audit-qualite', function(){
    $file = public_path('pdf/audit_qualite.pdf');
    return response()->file($file);
})->name('audit');

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

Route::get('{path}', [HoneyPotController::class, '__invoke'])->where('path', '.*');
