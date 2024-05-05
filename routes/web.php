<?php
use App\Http\Controllers\ControladorClient;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControladorTreballador;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ControladorAutos;

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
return view('inici');
});

Route::post('/login', 'AuthController@login')->name('login');
Route::post('/logout', 'AuthController@logout')->name('logout');

Route::group(['middleware' => 'auth'], function(){

    Route::group(['middleware' => 'adminAuth'], function(){
        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('dashboard');
    });

    // Route::get('/dashboard', function () {
    //     return view('dashboard');
    // })->name('dashboard');

    Route::get('/dashboard-basic', function () {
        return view('dashboard-basic');
    })-> name('dashboard-basic');

    Route::get('clients/index_basic', [ControladorClient::class, 'index_basic'])->name('clients.index_basic');
    
    Route::get('clients/show_basic/{tid}', [ControladorClient::class, 'show_basic'])->name('clients.show_basic');
    

    Route::get('clients/crear', [ControladorClient::class, 'create'])->name('clients.create');
    Route::get('autos/crear', [ControladorAutos::class, 'create'])->name('clients.create');
    
    Route::resource('clients', 'App\Http\Controllers\ControladorClient');
    Route::resource('autos', 'App\Http\Controllers\ControladorAutos');

    Route::get('/pdf/Clients', [PDFController::class, 'generatePDF']);

});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';