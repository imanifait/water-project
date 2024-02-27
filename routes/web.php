<?php

use App\Http\Controllers\WaterController;
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

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/login',[WaterController::class,'login'])->name('login');
Route::post('/login',[WaterController::class,'loginPost'])->name('login.post');
Route::get('/customer',[WaterController::class,'customer'])->name('customer');
Route::post('/customer',[WaterController::class,'customerPost'])->name('customer.post');
Route::get('/registration',[WaterController::class,'registration'])->name('registration');
Route::post('/registration',[WaterController::class,'registrationPost'])->name('registration.post');
Route::get('/staff',[WaterController::class,'staff'])->name('staff');
Route::post('/staff/performAction',[WaterController::class,'performAction'])->name('performAction');
Route::get('/staff/{staff}/edit',[WaterController::class,'edit'])->name('edit');
Route::put('/staff/{staff}/update',[WaterController::class,'update'])->name('update');
Route::get('/staff/{staff}/delete',[WaterController::class,'delete'])->name('delete');
Route::get('/sealregistration',[WaterController::class,'sealregistration'])->name('sealregistration');
Route::post('/sealregistration',[WaterController::class,'sealregistrationPost'])->name('sealregistration.post');
Route::get('/seal',[WaterController::class,'seal'])->name('seal');
Route::post('/seal/performAction2',[WaterController::class,'performAction2'])->name('performAction2');
Route::get('/seal/{seal}/editseal',[WaterController::class,'editseal'])->name('editseal');
Route::put('/seal/{seal}/updateseal',[WaterController::class,'updateseal'])->name('updateseal');
Route::get('/seal/{seal}/deleteseal',[WaterController::class,'deleteseal'])->name('deleteseal');








