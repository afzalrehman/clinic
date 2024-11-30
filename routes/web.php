<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\DepartmentController;
use App\Http\Controllers\Admin\DoctorController;

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
    Route::prefix('/super-admin')->name('superadmin.')->group(function () {
        // user start
        Route::get('user', [SuperAdminController::class, 'superadmin_user'])->name('user');
        Route::get('user/add', [SuperAdminController::class, 'superadmin_user_create'])->name('user.create');
        Route::post('user/add', [SuperAdminController::class, 'superadmin_user_store'])->name('user.store');
        Route::get('user/edit/{id}', [SuperAdminController::class, 'superadmin_user_edit'])->name('user.edit');
        Route::put('user/update/{id}', [SuperAdminController::class, 'superadmin_user_update'])->name('user.update');
        Route::get('user/delete/{id}', [SuperAdminController::class, 'superadmin_user_delete'])->name('user.delete');
        // user end

        // profile start //
        Route::get('profile/', [SuperAdminController::class, 'superadmin_profile'])->name('profile');
        Route::get('profile/edit', [SuperAdminController::class, 'superadmin_profile_edit'])->name('profile.edit');
        Route::post('profile/update', [SuperAdminController::class, 'superadmin_profile_update'])->name('profile.update');


        //dapartment start
        Route::get('department', [\App\Http\Controllers\SuperAdmin\DepartmentController::class, 'superadmin_department'])->name('department');

    });
});


Route::middleware(['auth', 'role:1'])->group(function () {
    Route::get('/admin', [AdminController::class, 'admin_index'])->name('admin');
    Route::prefix('admin/')->name('admin.')->group(function () {

        // user start
        Route::get('user', [AdminController::class, 'admin_user'])->name('user');
        Route::get('user/add', [AdminController::class, 'admin_user_create'])->name('user.create');
        Route::post('user/add', [AdminController::class, 'admin_user_store'])->name('user.store');
        Route::get('user/edit/{id}', [AdminController::class, 'admin_user_edit'])->name('user.edit');
        Route::put('user/update/{id}', [AdminController::class, 'admin_user_update'])->name('user.update');
        Route::get('user/delete/{id}', [AdminController::class, 'admin_user_delete'])->name('user.delete');
        // user end


        // profile start //
        Route::get('profile/', [AdminController::class, 'admin_profile'])->name('profile');
        Route::get('profile/edit', [AdminController::class, 'admin_profile_edit'])->name('profile.edit');
        Route::post('profile/update', [AdminController::class, 'admin_profile_update'])->name('profile.update');


        //department start
        Route::get('department', [DepartmentController::class, 'admin_department'])->name('department');
        Route::get('department/add', [DepartmentController::class, 'admin_department_create'])->name('department.create');
        Route::post('department/add', [DepartmentController::class, 'admin_department_store'])->name('department.store');
        Route::get('department/edit/{id}', [DepartmentController::class, 'admin_department_edit'])->name('department.edit');
        Route::put('department/update/{id}', [DepartmentController::class, 'admin_department_update'])->name('department.update');
        Route::get('department/delete/{id}', [DepartmentController::class, 'admin_department_delete'])->name('department.delete');

        //Doctor End
        Route::get('doctor', [DoctorController::class, 'admin_doctor'])->name('doctor');
        Route::get('doctor/add', [DoctorController::class, 'admin_doctor_create'])->name('doctor.create');
        //  Route::post('doctor/add', [DoctorController::class, 'admin_doctor_store'])->name('doctor.store');
        //  Route::get('doctor/edit/{id}', [DoctorController::class, 'admin_doctor_edit'])->name('doctor.edit');
        //  Route::put('doctor/update/{id}', [DoctorController::class, 'admin_doctor_update'])->name('doctor.update');
        //  Route::get('doctor/delete/{id}', [DoctorController::class, 'admin_doctor_delete'])->name('doctor.delete');


    });
});



require __DIR__ . '/auth.php';
