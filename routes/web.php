<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AppoinmentController;
use App\Http\Controllers\Admin\DepartmentController;
use App\Http\Controllers\Admin\DoctorController;

use App\Http\Controllers\Admin\DoctorScheduleController;
use App\Http\Controllers\Admin\MailController;
use App\Http\Controllers\Admin\PaymentController;
use App\Http\Controllers\SuperAdmin\ClinicController;
use App\Http\Controllers\SuperAdmin\MailController as SuperAdminMail;
use App\Http\Controllers\Admin\PatientController;
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


//======================================= super admin =======================================

Route::middleware(['auth', 'role:0'])->group(function () {
    Route::get('/', [SuperAdminController::class, 'superadmin_index'])->name('superadmin');
    Route::get('/superadmin/get-clinic-details/{id}', [SuperAdminController::class, 'getClinicDetails']);

    Route::prefix('/super-admin')->name('superadmin.')->group(function () {

        // clinic start
        Route::get('clinic', [ClinicController::class, 'superadmin_clinic'])->name('clinic');
        Route::get('clinic/add', [ClinicController::class, 'superadmin_clinic_create'])->name('clinic.create');
        Route::post('clinic/add', [ClinicController::class, 'superadmin_clinic_store'])->name('clinic.store');
        Route::get('clinic/edit/{id}', [ClinicController::class, 'superadmin_clinic_edit'])->name('clinic.edit');
        Route::put('clinic/update/{id}', [ClinicController::class, 'superadmin_clinic_update'])->name('clinic.update');
        Route::get('clinic/delete/{id}', [ClinicController::class, 'superadmin_clinic_delete'])->name('clinic.delete');

        // clinic end

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
        Route::get('patient', [\App\Http\Controllers\SuperAdmin\PatientController::class, 'superadmin_patient'])->name('patient');

        //dapartment start
        // Route::get('department', [\App\Http\Controllers\SuperAdmin\DepartmentController::class, 'superadmin_department'])->name('department');
        // //Doctor End
        // Route::get('doctor', [\App\Http\Controllers\SuperAdmin\DoctorController::class, 'superadmin_doctor'])->name('doctor');
        // //Doctor Schedul start
        // Route::get('doctorschedule', [\App\Http\Controllers\SuperAdmin\DoctorScheduleController::class, 'suepradmin_doctor_schedule'])->name('doctor_schedule');

        // //Appoinment  start
        // Route::get('appoinment', [\App\Http\Controllers\SuperAdmin\AppoinmentController::class, 'superadmin_appoinment_index'])->name('appoinment');

        Route::get('compose', [SuperAdminMail::class, 'superadmin_mail_index'])->name('compose');
        Route::post('compose', [SuperAdminMail::class, 'superadmin_mail_store'])->name('mail.store');
        Route::get('inbox', [SuperAdminMail::class, 'superadmin_mail_inbox'])->name('inbox');
        Route::get('trash', [SuperAdminMail::class, 'superadmin_mail_trash'])->name('trash');
        Route::get('mail-view', [SuperAdminMail::class, 'superadmin_mail_mail_view'])->name('mail_view');
        Route::get('email/delete/{id}', [SuperAdminMail::class, 'superadmin_mail_delete'])->name('mail.delete');
        Route::get('trashemail/delete/{id}', [SuperAdminMail::class, 'superadmin_trashemail_delete'])->name('trashemail.delete');


        Route::get('payment', [SuperAdminController::class, 'payment'])->name('payment');

        // Dynamic Logo Change
        Route::get('setting', [SuperAdminController::class, 'setting_index'])->name('setting');
        Route::put('/logochange', [SuperAdminController::class, 'logoChange'])->name('setting.store');
    });
});


// Online appoinment
Route::get('appointment/{clinic_id}', [AppoinmentController::class, 'showForm'])->name('appointment.form');


//======================================= clinic =======================================
Route::middleware(['auth', 'role:1'])->group(function () {
    Route::get('/clinic', [AdminController::class, 'admin_index'])->name('clinic');
    Route::get('/clinic/get-patient-details/{id}', [PatientController::class, 'getPatientDetails']);
    Route::get('/clinic/get-user-details/{id}', [AdminController::class, 'getUserDetails']);

    Route::prefix('/clinic')->name('clinic.')->group(function () {

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

        //Doctor start
        Route::get('doctor', [DoctorController::class, 'admin_doctor'])->name('doctor');
        Route::get('doctor/add', [DoctorController::class, 'admin_doctor_create'])->name('doctor.create');
        Route::post('doctor/add', [DoctorController::class, 'admin_doctor_store'])->name('doctor.store');
        Route::get('doctor/edit/{id}', [DoctorController::class, 'admin_doctor_edit'])->name('doctor.edit');
        Route::put('doctor/update/{id}', [DoctorController::class, 'admin_doctor_update'])->name('doctor.update');
        Route::get('doctor/delete/{id}', [DoctorController::class, 'admin_doctor_delete'])->name('doctor.delete');


        //Patient start
        Route::get('patient', [PatientController::class, 'admin_patient'])->name('patient');
        Route::get('patient/add', [PatientController::class, 'admin_patient_create'])->name('patient.create');
        Route::post('patient/add', [patientController::class, 'admin_patient_store'])->name('patient.store');
        Route::get('patient/edit/{id}', [patientController::class, 'admin_patient_edit'])->name('patient.edit');
        Route::put('patient/update/{id}', [patientController::class, 'admin_patient_update'])->name('patient.update');
        Route::get('patient/delete/{id}', [patientController::class, 'admin_patient_delete'])->name('patient.delete');


        //Doctor Schedul start
        Route::get('doctorschedule', [DoctorScheduleController::class, 'doctor_schedule'])->name('doctor_schedule');
        Route::get('doctorschedule/add', [DoctorScheduleController::class, 'doctor_schedule_create'])->name('doctor_schedule.create');
        Route::post('doctorschedule/add', [DoctorScheduleController::class, 'doctor_schedule_store'])->name('doctor_schedule.store');
        Route::get('doctorschedule/edit/{id}', [DoctorScheduleController::class, 'doctor_schedule_edit'])->name('doctor_schedule.edit');
        Route::put('doctorschedule/update/{id}', [DoctorScheduleController::class, 'doctor_schedule_update'])->name('doctor_schedule.update');
        Route::get('doctorschedule/delete/{id}', [DoctorScheduleController::class, 'doctor_schedule_delete'])->name('doctor_schedule.delete');

        //Appoinment  start
        Route::get('appoinment', [AppoinmentController::class, 'appoinment_index'])->name('appoinment');
        Route::get('appoinment/add', [AppoinmentController::class, 'appoinment_create'])->name('appoinment.create');
        Route::post('appoinment/add', [AppoinmentController::class, 'appoinment_store'])->name('appoinment.store');

        Route::get('appoinment/edit/{id}', [AppoinmentController::class, 'appoinment_edit'])->name('appoinment.edit');
        Route::put('appoinment/update/{id}', [AppoinmentController::class, 'appoinment_update'])->name('appoinment.update');
        Route::get('appoinment/delete/{id}', [AppoinmentController::class, 'appoinment_delete'])->name('appoinment.delete');
        Route::get('/appoinment-doctor-details/{id}', [AppoinmentController::class, 'appoinment_get_doctor']);
        Route::get('/get-appoinment-schedule_details/{id}', [AppoinmentController::class, 'getDoctorScheduleDetails']);

        //Mail  start

        Route::get('compose', [MailController::class, 'mail_index'])->name('compose');
        Route::post('compose', [MailController::class, 'mail_store'])->name('mail.store');
        Route::get('inbox', [MailController::class, 'mail_inbox'])->name('inbox');
        Route::get('trash', [MailController::class, 'mail_trash'])->name('trash');
        Route::get('email/view/{id}', [MailController::class, 'mail_mail_view'])->name('mail_view');
        Route::put('email/delete/{id}', [MailController::class, 'mail_delete'])->name('mail.delete');
        Route::delete('trashemail/delete/{id}', [MailController::class, 'trashemail_delete'])->name('trashemail.delete');


        //Payment start
        Route::get('payment', [PaymentController::class, 'payment'])->name('payment');
        Route::get('payment/add', [PaymentController::class, 'payment_create'])->name('payment.create');
        Route::post('payment/add', [PaymentController::class, 'payment_store'])->name('payment.store');
        Route::get('payment/edit/{id}', [PaymentController::class, 'payment_edit'])->name('payment.edit');
        Route::put('payment/update/{id}', [PaymentController::class, 'payment_update'])->name('payment.update');
        Route::get('payment/delete/{id}', [PaymentController::class, 'payment_delete'])->name('payment.delete');
        Route::get('/get-patient-payment-details/{id}', [PaymentController::class, 'getPatientDetails']);

        // Dynamic Logo Change
        Route::get('setting', [AdminController::class, 'setting_index'])->name('setting');
        Route::put('/logochange', [AdminController::class, 'logoChange'])->name('setting.store');

    });
});

// ======================================= doctor =======================================
Route::middleware(['auth', 'role:2'])->group(function () {
    Route::get('/doctor', [\App\Http\Controllers\doctor\doctorController::class, 'doctor_dashboard'])->name('doctor');


    Route::prefix('/doctor')->name('doctor.')->group(function () {
        // profile start //
        Route::get('profile/', [\App\Http\Controllers\doctor\doctorController::class, 'admin_profile'])->name('profile');
        Route::get('profile/edit', [\App\Http\Controllers\doctor\doctorController::class, 'admin_profile_edit'])->name('profile.edit');
        Route::post('profile/update', [\App\Http\Controllers\doctor\doctorController::class, 'admin_profile_update'])->name('profile.update');


        //department start
        Route::get('department', [DepartmentController::class, 'admin_department'])->name('department');
        Route::get('appoinment/ChangeStatus/', [\App\Http\Controllers\doctor\doctorController::class, 'appoinment_status_change']);
        //Doctor start
        Route::get('doctor', [\App\Http\Controllers\doctor\doctorController::class, 'doctor_index'])->name('doctor');


        //Patient start
        Route::get('patient', [\App\Http\Controllers\doctor\doctorController::class, 'doctor_patient'])->name('patient');

        //Doctor Schedul start
        // Route::get('doctorschedule', [\App\Http\Controllers\doctor\doctorController::class, 'doctor_schedule'])->name('doctor_schedule');

        //Appoinment  start
        Route::get('appoinment', [\App\Http\Controllers\doctor\doctorController::class, 'doctor_appoinment'])->name('appoinment');
        //Mail  start
    });
});


//======================================= patient =======================================
Route::middleware(['auth', 'role:3'])->group(function () {
    Route::get('/patient', [\App\Http\Controllers\patient\patientController::class, 'patient_dashboard'])->name('patient');


    Route::prefix('/patient')->name('patient.')->group(function () {
        // profile start //
        Route::get('profile/', [\App\Http\Controllers\patient\patientController::class, 'patient_profile'])->name('profile');
        Route::get('profile/edit', [\App\Http\Controllers\patient\patientController::class, 'patient_profile_edit'])->name('profile.edit');
        Route::post('profile/update', [\App\Http\Controllers\patient\patientController::class, 'patient_profile_update'])->name('profile.update');
        //Appoinment  start
        Route::get('appoinment', [\App\Http\Controllers\patient\patientController::class, 'patient_appoinment'])->name('appoinment');
        Route::get('appoinment/add', [\App\Http\Controllers\patient\patientController::class, 'appoinment_create'])->name('appoinment.create');
        Route::post('appoinment/add', [\App\Http\Controllers\patient\patientController::class, 'appoinment_store'])->name('appoinment.store');

        Route::get('appoinment/edit/{id}', [\App\Http\Controllers\patient\patientController::class, 'appoinment_edit'])->name('appoinment.edit');
        Route::put('appoinment/update/{id}', [\App\Http\Controllers\patient\patientController::class, 'appoinment_update'])->name('appoinment.update');
        Route::get('appoinment/delete/{id}', [\App\Http\Controllers\patient\patientController::class, 'appoinment_delete'])->name('appoinment.delete');


        Route::get('payment', [\App\Http\Controllers\patient\patientController::class, 'payment'])->name('payment');

        //Mail  start

        Route::get('compose', [MailController::class, 'mail_index'])->name('compose');
        Route::post('compose', [MailController::class, 'mail_store'])->name('mail.store');
        Route::get('inbox', [MailController::class, 'mail_inbox'])->name('inbox');
        Route::get('trash', [MailController::class, 'mail_trash'])->name('trash');
        Route::get('mail-view', [MailController::class, 'mail_mail_view'])->name('mail_view');
        Route::put('email/delete/{id}', [MailController::class, 'mail_delete'])->name('mail.delete');
        Route::delete('trashemail/delete/{id}', [MailController::class, 'trashemail_delete'])->name('trashemail.delete');
    });
});




require __DIR__ . '/auth.php';
