<?php
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CeramicArtworkController;
use App\Http\Controllers\CeramicChallengeController;
use App\Http\Controllers\Challenges;
use App\Http\Controllers\UserController; //para poder trabajar con la clase UserController
use App\Models\CeramicArtwork;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

//definicion de rutas
Route::get('/home', [HomeController::class, 'home'])->name('home.home');
Route::resource('/users',UserController::class); //route to User controller
Route::post('/users', [UserController::class, 'store'])->name('users.store');
//Route::get('users',[Usercontroller::class, 'index']);
//Route::get('users/create',[Usercontroller::class, 'create']);
Route::resource('/ceramicArtworks',CeramicArtworkController::class); //route to ArtworkController
Route::resource('/ceramicChallenges',CeramicChallengeController::class); 
// para el edit:
Route::put('/ceramicArtworks/{id}', [CeramicArtworkController::class, 'update'])->name('ceramicArtworks.update');
Route::put('/ceramicChallenges/{id}', [CeramicChallengeController::class, 'update'])->name('ceramicChallenges.update');
Route::get('/ceramicChallenges/{id}/edit', [CeramicChallengeController::class, 'edit'])->name('ceramicChallenges.edit');
