<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SystemController;
use App\models\Pharmacy;
use App\models\Orders;
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
    return view('welcome' , ['medInformation' => Pharmacy::all()]);
});

Route::post('/saveOrder',[SystemController::class, 'saveOrders'])->name('saveOrders');

Route::post('/saveItemRoute',[SystemController::class, 'saveInfo'])->name('saveInfo');

Route::get('/delete-task/{id}', [SystemController::class, 'deleteTask'])->name('deleteTask');

Route::post('/update-info/{id}', [SystemController::class, 'updateTask'])->name('updateTask');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard', ['medInformation' => Pharmacy::paginate(6)]);
    })->name('dashboard');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/sales', function () {
        return view('sales', ['medInformation' => Pharmacy::all()]);
    })->name('sales');
});


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/orders', function () {
        return view('orders', ['orders' => Orders::all()]);
    })->name('orders');
});