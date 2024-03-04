<?php
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CeramicArtworkController;
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
//Route::get('users',[Usercontroller::class, 'index']);
//Route::get('users/create',[Usercontroller::class, 'create']);
Route::resource('/CeramicArtworks',CeramicArtworkController::class); //route to ArtworkController
