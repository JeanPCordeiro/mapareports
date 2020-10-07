<?php

use Illuminate\Support\Facades\Route;

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

use App\Http\Controllers\KpiController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LineController;
use App\Http\Controllers\BreakdownController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::resource('kpis', KpiController::class);
Route::resource('users', UserController::class);
Route::resource('lines', LineController::class);
Route::resource('breakdowns', BreakdownController::class);


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/cellulose', [App\Http\Controllers\CelluloseReportController::class, 'index'])->name('cellulose');
Route::get('/synthcellulose', [App\Http\Controllers\CelluloseSyntheseController::class, 'index'])->name('synthcellulose');
Route::get('/collect-status/{factory}', [App\Http\Controllers\CollectStatusController::class, 'index'])->name('collect-status');
Route::get('/cellulose-report/{factory}/{line}', [App\Http\Controllers\CelluloseReportController::class, 'index'])->name('cellulose-report');
Route::get('/input', [App\Http\Controllers\InputController::class, 'index'])->name('input');
Route::get('/edit/{line}', [App\Http\Controllers\InputController::class, 'edit'])->name('edit');
Route::post('/update', [App\Http\Controllers\InputController::class, 'update'])->name('update');
Route::get('/campaign', [App\Http\Controllers\CampaignController::class, 'index'])->name('campaign');
Route::post('/newcampaign', [App\Http\Controllers\CampaignController::class, 'update'])->name('newcampaign');


Route::get('/home', function() {
    return view('home');
})->name('home')->middleware('auth');
