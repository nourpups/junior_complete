<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\RolePermissionController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
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
Auth::routes(['verify' => true]);

Route::group(['middleware' => ['auth', 'verified']], function (){
    Route::view('/', 'dashboard')->name('dashboard');

    Route::get('roles/{role}/permissions/add-form', [RolePermissionController::class, 'addForm'])->name('roles.permissions.add_form');
    Route::post('roles/{role}/permissions/add', [RolePermissionController::class, 'add'])->name('roles.permissions.add');

    Route::resources([
        'users' => UserController::class,
        'clients' => ClientController::class,
        'projects' => ProjectController::class,
        'tasks' => TaskController::class,
        'roles' => RoleController::class,
        'permissions' => PermissionController::class,
        'roles.permissions' => RolePermissionController::class
    ], [
          'except' => ['show'],
    ]);
});

