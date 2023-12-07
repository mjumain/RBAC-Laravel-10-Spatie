<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\MenuLabelController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\RouteController;
use App\Http\Controllers\UserController;
use App\Models\Menu;
use App\Models\MenuLabel;
use Database\Seeders\MenuLabelSeeder;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();
Auth::routes(['verify' => true]);

Route::group(['middleware' => ['auth','verified','web']], function(){
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('dashboard', DashboardController::class)->only('index');
    Route::resource('route', RouteController::class)->except('show');
    Route::resource('permission', PermissionController::class)->except('show');
    Route::post('permission/generate', [PermissionController::class, 'generate'])->name('permission.generate');
    Route::resource('role', RoleController::class)->except('show');
    Route::resource('menu', MenuLabelController::class)->except('show');
    Route::resource('menu.item', MenuController::class)->except('show');
    Route::resource('user', UserController::class)->except('show');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::put('/profile', [ProfileController::class, 'updatePassword'])->name('profile.password');
});

