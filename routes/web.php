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

    Route::get('clients/crear', [ControladorClient::class, 'create'])->name('clients.create');
    Route::get('autos/crear', [ControladorAutos::class, 'create'])->name('autos.create');
    Route::get('lloga/crear', [ControladorLloga::class, 'create'])->name('clients.create');
    
    Route::resource('clients', 'App\Http\Controllers\ControladorClient');
    Route::resource('autos', 'App\Http\Controllers\ControladorAutos');

    Route::get('/pdf/clients', [PDFController::class, 'generatePDF']);
    Route::get('/pdf/Clients/{DNI}', [PDFController::class, 'generateUnicClientPDF'])->name('pdf.client');

    Route::get('/pdf/autos', [PDFController::class, 'generateAutoPDF']);
    Route::get('/pdf/autos/{Matricula_auto}', [PDFController::class, 'generateAutoPDF'])->name('pdf.auto');
    // Route::get('/pdf/client/{DNI}', [PDFController::class, 'generateUnicClientPDF']);


});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';