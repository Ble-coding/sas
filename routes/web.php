<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

//parcs
Route::get('parcs/liste/{term?}/', [App\Http\Controllers\ParcsController::class, 'index' ])->name('parcs.index');

//inventaires
Route::get('inventaires/liste/{term?}/', [App\Http\Controllers\InventairesController::class, 'index' ])->name('inventaires.index');

//inventaires
Route::get('checkers/liste/{term?}/', [App\Http\Controllers\CheckersController::class, 'index' ])->name('checkers.index');

//historique
Route::get('historiques/liste/{term?}/', [App\Http\Controllers\InventairesController::class, 'historique' ])->name('inventaires.historique');

// //onlysearch
// Route::get('inventaires/cars/{term?}/', [App\Http\Controllers\InventairesController::class, 'cars' ])->name('inventaires.cars');
// Route::get('inventaires/identites/{term?}/', [App\Http\Controllers\InventairesController::class, 'identite' ])->name('inventaires.identites');
// Route::get('inventaires/users/{term?}/', [App\Http\Controllers\InventairesController::class, 'user' ])->name('inventaires.users');



Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');


//onlysearch
Route::get('inventaires/cars/{term?}/', [App\Http\Controllers\InventairesController::class, 'cars' ])->name('inventaires.cars');
Route::get('inventaires/identites/{term?}/', [App\Http\Controllers\InventairesController::class, 'identite' ])->name('inventaires.identites');
Route::get('inventaires/users/{term?}/', [App\Http\Controllers\InventairesController::class, 'user' ])->name('inventaires.users');

Route::group(['auth:sanctum', 'verified'], function(){
//parcs
Route::get('/parcs/liste/parcs/{id}', [App\Http\Controllers\ParcsController::class, 'show'])->name('parcs.show');
Route::get('/parcs/parcs/{id}', [App\Http\Controllers\ParcsController::class, 'show'])->name('parcs.show');
Route::get('/parcs', [App\Http\Controllers\ParcsController::class, 'create'])->name('parcs.create');
Route::post('/parcs', [App\Http\Controllers\ParcsController::class, 'store']);
Route::get('/parcs/liste/parcs/edit/{id}', [App\Http\Controllers\ParcsController::class, 'edit']);
Route::get('/parcs/parcs/edit/{id}', [App\Http\Controllers\ParcsController::class, 'edit']);
Route::patch('/parcs/parcs/{id}', [App\Http\Controllers\ParcsController::class, 'update']);
Route::delete('/parcs/parcs/{id}', [App\Http\Controllers\ParcsController::class, 'destroy']);

    //inventaires
  Route::get('inventaires/accueil', [App\Http\Controllers\InventairesController::class, 'accueil'])->name('inventaires.accueil');

  Route::get('/inventaires/liste/inventaires/{id}', [App\Http\Controllers\InventairesController::class, 'show'])->name('inventaires.show');
  Route::get('inventaires/inventaires/{id}', [App\Http\Controllers\InventairesController::class, 'show'])->name('inventaires.show');

  //historiques
  Route::get('/historiques/liste/inventaires/{id}', [App\Http\Controllers\InventairesController::class, 'montrer'])->name('historiques.show');
  Route::get('historiques/inventaires/{id}', [App\Http\Controllers\InventairesController::class, 'montrer'])->name('historiques.show');


  Route::get('inventaires', [App\Http\Controllers\InventairesController::class, 'create'])->name('inventaires.create');
  Route::post('inventaires', [App\Http\Controllers\InventairesController::class, 'store']);

  Route::get('/inventaires/liste/inventaires/edit/{id}', [App\Http\Controllers\InventairesController::class, 'edit']);
  Route::get('inventaires/inventaires/edit/{id}', [App\Http\Controllers\InventairesController::class, 'edit']);

  
  Route::get('/historiques/liste/inventaires/edit/{id}', [App\Http\Controllers\InventairesController::class, 'modifier']);
  Route::get('historiques/inventaires/edit/{id}', [App\Http\Controllers\InventairesController::class, 'modifier']);

  Route::patch('inventaires/inventaires/{id}', [App\Http\Controllers\InventairesController::class, 'update']);
  Route::patch('historiques/inventaires/{id}', [App\Http\Controllers\InventairesController::class, 'ajour']);

  Route::patch('inventaires/terminer/{id}', [App\Http\Controllers\InventairesController::class, 'terminer']);
  Route::delete('inventaires/inventaires/{id}', [App\Http\Controllers\InventairesController::class, 'destroy']);

  //checkers
  Route::get('/checkers/liste/inventaires/{id}', [App\Http\Controllers\CheckersController::class, 'show'])->name('checkers.show');
  Route::get('checkers/inventaires/{id}', [App\Http\Controllers\CheckersController::class, 'show'])->name('checkers.show');
  Route::patch('checkers/terminer/{id}', [App\Http\Controllers\CheckersController::class, 'terminer']);

  //auteurs
  Route::group(['auth:sanctum', 'role'], function(){
    Route::get('/auteurs', [App\Http\Controllers\AuteursController::class, 'create'])->name('auteurs.create');
        });

        //checkers
  Route::group(['auth:sanctum', 'role'], function(){
    Route::get('/checkers', [App\Http\Controllers\CheckersController::class, 'create'])->name('checkers.create');
        });

});
