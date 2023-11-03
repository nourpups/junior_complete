<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\RolePermissionController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes(['verify' => true]);

Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::view('/', 'dashboard')->name('dashboard');

    Route::get('notifications', [NotificationController::class, 'index'])->name('notifications.index');
    Route::post('notifications/{notification}/mark-as-read', [NotificationController::class, 'markAsRead'])->name('notifications.mark_as_read');

    Route::get('profiles/{user}/edit', [ProfileController::class, 'edit'])->name('profiles.edit');
    Route::put('profiles/{user}/update/profile', [ProfileController::class, 'updateProfile'])->name('profiles.update.profile');
    Route::put('profiles/{user}/update/password', [ProfileController::class, 'updatePassword'])->name('profiles.update.password');

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

