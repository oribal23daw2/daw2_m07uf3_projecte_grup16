<?php
use App\Http\Controllers\ControladorClient;
use App\Http\Controllers\ControladorUsers;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControladorTreballador;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ControladorAutos;
use App\Http\Controllers\ControladorLloga;


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
    Route::get('users/crear', [ControladorUsers::class, 'create'])->name('users.create');
    Route::get('lloga/crear', [ControladorLloga::class, 'create'])->name('lloga.create');
    
    Route::resource('clients', 'App\Http\Controllers\ControladorClient');
    Route::resource('autos', 'App\Http\Controllers\ControladorAutos');
    Route::resource('lloga', 'App\Http\Controllers\ControladorLloga');
    Route::resource('users', 'App\Http\Controllers\ControladorUsers');
    Route::get('/pdf/lloga/{DNI}/{Matricula_auto}', 'PDFController@generateLlogaPDF')->name('pdf.lloga');


    Route::get('/pdf/Clients/{DNI}', [PDFController::class, 'generateUnicClientPDF'])->name('pdf.client');
    Route::get('/pdf/autos/{Matricula_auto}', [PDFController::class, 'generateUnicAutoPDF'])->name('pdf.auto');
    Route::get('/pdf/users/{id}', [PDFController::class, 'generateUnicUserPDF'])->name('pdf.user');
    Route::get('/pdf/lloga/{DNI}/{Matricula_auto}', [PDFController::class, 'generateLlogaPDF'])->name('pdf.lloga');

    Route::delete('lloga/{DNI}/{Matricula_auto}', [ControladorLloga::class, 'destroy'])->name('lloga.destroy');
    Route::get('lloga/{DNI}/{Matricula_auto}', [ControladorLloga::class, 'show'])->name('lloga.show');
    Route::get('lloga/{DNI}/{Matricula_auto}/edit', [ControladorLloga::class, 'edit'])->name('lloga.edit');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';