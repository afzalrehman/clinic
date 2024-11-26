<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SuperAdmin\SuperAdminController;
use Illuminate\Support\Facades\Route;
use PHPUnit\Framework\Attributes\Group;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



Route::middleware(['auth', 'role:0'])->group(function () {
    Route::get('/', [SuperAdminController::class, 'superadmin_index'])->name('superadmin');
    Route::get('super-admin/user', [SuperAdminController::class, 'superadmin_user'])->name('superadmin.user');
});


Route::middleware(['auth', 'role:1'])->group(function () {
    Route::get('admin', [AdminController::class, 'admin_index'])->name('admin');
});

Route::get('forgot-password', [AuthenticatedSessionController::class, 'forgot_password_create'])
->name('password.request');

Route::post('forgot-password', [AuthenticatedSessionController::class, 'forgot_password_store'])
->name('password.email');


require __DIR__ . '/auth.php';
