<?php
use App\Http\Controllers\ControladorClient;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControladorTreballador;

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

    Route::get('trebs/index_basic', [ControladorTreballador::class, 'index_basic'])->name('trebs.index_basic');
    Route::get('trebs/show_basic/{tid}', [ControladorTreballador::class, 'show_basic'])->name('trebs.show_basic');

    Route::resource('trebs', ControladorTreballador::class);

    Route::get('clients/index_basic', [ControladorClient::class, 'index_basic'])->name('clients.index_basic');
    Route::get('clients/show_basic/{tid}', [ControladorClient::class, 'show_basic'])->name('clients.show_basic');
    
    Route::resource('clients', ControladorClient::class);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';