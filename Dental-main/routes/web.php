<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClinicController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserManagmentController;
use App\Http\Controllers\CashierController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\ClientController;  
use App\Http\Controllers\StaffController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\SuperAdmin\UserManagementController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\ShopController;

// Public routes accessible to all users
Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');

// Routes accessible only to authenticated users
Route::middleware(['auth', 'PreventBackHistory'])->group(function () {
    Route::get('/back-home', function () {
        return view('back.home');
    })->name('admin.home');

    // Client routes
    Route::get('/customer', [ClientController::class, 'customer'])->name('customer');
    Route::post('/appointments', [ClientController::class, 'store'])->name('appointments.store');

    // User Management routes
    Route::group(['prefix' => 'user'], function () {
        Route::get('table', [UserManagmentController::class, 'index'])->name('userTable');
        Route::get('edit/{id}', [UserManagmentController::class, 'editUser'])->name('editUser');
        Route::post('update/{id}', [UserManagmentController::class, 'updateUser'])->name('updateUser');
        Route::get('archive/{id}', [UserManagmentController::class, 'archiveUser'])->name('archiveUser');
        Route::get('add-user-form', [UserManagmentController::class, 'showAddUserForm'])->name('addUserForm');
        Route::post('store-user', [UserManagmentController::class, 'storeUser'])->name('storeUser');
        Route::get('/user/details/{id}', [UserManagmentController::class, 'getUserDetails'])->name('getUserDetails');
    });

    // Clinic routes
    Route::get('/clinics/view', [ClinicController::class, 'viewClinics'])->name('clinics.view');
    Route::get('/clinics/create', [ClinicController::class, 'createForm'])->name('clinic.create.form');
    Route::post('/clinics/create', [ClinicController::class, 'create'])->name('clinic.create');
    Route::get('/edit-clinic/{id}', [ClinicController::class, 'edit'])->name('clinic.edit');
    Route::put('/update-clinic/{id}', [ClinicController::class, 'update'])->name('clinic.update');
    Route::get('/view-clinics', [ClinicController::class, 'viewClinics'])->name('clinic.view');
    Route::get('/clinics', [ClinicController::class, 'viewClinics'])->name('clinic.view');
    Route::delete('/clinics/{id}/archive', [ClinicController::class, 'archive'])->name('clinic.archive');

    // Other routes accessible to authenticated users

    // Staff appointment routes
    Route::get('/staff', [StaffController::class, 'index'])->name('staff');
    Route::get('/homeStaff', [StaffController::class, 'homeStaff'])->name('homeStaff');
    Route::post('/complete-appointment/{appointment}', [StaffController::class, 'completeAppointment'])->name('complete.appointment');
    Route::get('/staff/acceptedappoint', [StaffController::class, 'acceptedAppointments'])->name('staff.acceptedappoint');
    Route::post('/accept-appointment/{appointment}', [StaffController::class, 'pendingAppointment'])->name('accept.appointment');
    Route::post('/complete-appointment/{appointment}', [StaffController::class, 'completeAppointment'])->name('complete.appointment');
    Route::put('/staff/cancel/{appointment}', [StaffController::class, 'cancelAppointment'])->name('staff.cancel');

    // Landing_Page routes
    Route::get('/', [LandingPageController::class, 'Home'])->name('home');
    Route::get('/ContactUs', [LandingPageController::class, 'ContactUs'])->name('contactUs');
    Route::get('/Services', [LandingPageController::class, 'Services'])->name('services');
    Route::get('/OurClinic', [LandingPageController::class, 'OurClinic'])->name('ourClinic');
    Route::get('/OurShop', [LandingPageController::class, 'OurShop'])->name('ourShop');

    // Super admin routes
    Route::get('/super-admin-dashboard', function () {
        return view('superadmin.dashboard');
    })->name('super_admin.home');
    Route::post('/super-admin-logout', [SuperAdminController::class, 'logout'])->name('super_admin.logout');

    // User Dashboard
    Route::get('/UserDashboard', [PageController::class, 'showDashboard']);
    Route::prefix('superadmin')->group(function () {
        Route::get('users', [UserManagementController::class, 'index'])->name('superadmin.user.index');
        Route::get('users/create', [UserManagementController::class, 'create'])->name('superadmin.user.create');
        Route::post('users', [UserManagementController::class, 'store'])->name('superadmin.user.store');
        Route::get('users/{id}', [UserManagementController::class, 'show'])->name('superadmin.user.show');
        Route::get('users/{id}/edit', [UserManagementController::class, 'edit'])->name('superadmin.user.edit');
        Route::put('users/{id}', [UserManagementController::class, 'update'])->name('superadmin.user.update');
        Route::delete('/superadmin/user/{id}/archive', [UserManagementController::class, 'archive'])->name('superadmin.user.archive');
    });

    // Inventory routes
    Route::get('/inventory', [InventoryController::class, 'index'])->name('inventory.index');
    Route::post('/inventory', [InventoryController::class, 'store'])->name('inventory.store');
    Route::get('/inventory/{id}/audit', 'App\Http\Controllers\InventoryController@showAudit')->name('inventory.audit.show');
    Route::post('/inventory/addquantity/{id}', [InventoryController::class, 'addQuantity'])->name('inventory.addquantity');

    // Admin inventory routes
    Route::get('/admin/inventory', [InventoryController::class, 'indexadmin'])->name('admin.inventory.indexadmin');
    Route::delete('/admin/inventory/{id}', [InventoryController::class, 'destroy'])->name('admin.inventory.delete');

    // Ecom routes
    Route::get('/shop', [ShopController::class, 'index'])->name('shop.index');

    // Logout route
    // Logout route
    Route::get('/logout', [AuthController::class, 'logout'])->name('manual.logout');
    //Landing_Page
    Route::get('/', [LandingPageController::class, 'Home'])->name('home');
    Route::get('/ContactUs', [LandingPageController::class, 'ContactUs'])->name('contactUs');
    Route::get('/Services', [LandingPageController::class, 'Services'])->name('services');
    Route::get('/OurClinic', [LandingPageController::class, 'OurClinic'])->name('ourClinic');
    Route::get('/OurShop', [LandingPageController::class, 'OurShop'])->name('ourShop');
    Route::get('/home1', [ClientController::class, 'home1'])->name('home1');
    Route::get('/about2', [ClientController::class, 'about2'])->name('about2');
    Route::get('/dentalClinic2', [ClientController::class, 'dentalClinic2'])->name('dentalClinic2');

});

?>
