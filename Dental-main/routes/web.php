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

Route::middleware(['auth.manual'])->group(function () {
    Route::get('/back-home', function () {
        return view('back.home');
    })->name('admin.home');
    
});


// routes/web.php or routes/web.php

Route::middleware(['auth.manual'])->group(function () {
    Route::get('/customer', [ClientController::class, 'customer'])->name('customer');
    Route::post('/appointments', [ClientController::class, 'store'])->name('appointments.store');
});

Route::get('/super-admin-dashboard', function () {
    return view('superadmin.dashboard');
})->name('super_admin.home');
Route::post('/super-admin-logout', [SuperAdminController::class, 'logout'])->name('super_admin.logout');


// Separate route without the auth.manual middleware for the customer route
Route::get('/customer', [ClientController::class, 'customer'])->name('customer')->middleware('auth');



//User Management rout//

Route::group(['prefix' => 'user'], function () {
    Route::get('table', [UserManagmentController::class, 'index'])->name('userTable')->middleware('auth');
    Route::get('edit/{id}', [UserManagmentController::class, 'editUser'])->name('editUser')->middleware('auth');
    Route::post('update/{id}', [UserManagmentController::class, 'updateUser'])->name('updateUser')->middleware('auth');
    Route::get('archive/{id}', [UserManagmentController::class, 'archiveUser'])->name('archiveUser')->middleware('auth');
    Route::get('add-user-form', [UserManagmentController::class, 'showAddUserForm'])->name('addUserForm')->middleware('auth'); // Add this line
    Route::post('store-user', [UserManagmentController::class, 'storeUser'])->name('storeUser')->middleware('auth');
    Route::get('/user/details/{id}', [UserManagmentController::class, 'getUserDetails'])->name('getUserDetails')->middleware('auth');
});



// Clinic routes
Route::get('/clinics/view', [ClinicController::class, 'viewClinics'])->name('clinics.view')->middleware('auth');
Route::get('/clinics/create', [ClinicController::class, 'createForm'])->name('clinic.create.form')->middleware('auth');
Route::post('/clinics/create', [ClinicController::class, 'create'])->name('clinic.create')->middleware('auth');
Route::get('/edit-clinic/{id}', [ClinicController::class, 'edit'])->name('clinic.edit')->middleware('auth');
Route::put('/update-clinic/{id}', [ClinicController::class, 'update'])->name('clinic.update')->middleware('auth');
Route::get('/view-clinics', [ClinicController::class, 'viewClinics'])->name('clinic.view')->middleware('auth');
Route::get('/clinics', [ClinicController::class, 'viewClinics'])->name('clinic.view')->middleware('auth');
Route::delete('/clinics/{id}/archive', [ClinicController::class, 'archive'])->name('clinic.archive')->middleware('auth');







//CLIENT side//

Route::get('/home1', [ClientController::class, 'home1'])->name('home1')->middleware('auth');
Route::get('/about2', [ClientController::class, 'about2'])->name('about2')->middleware('auth');
Route::get('/dentalClinic2', [ClientController::class, 'dentalClinic2'])->name('dentalClinic2')->middleware('auth');



// routes/web.php



Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');


//Staff apointment routes
Route::get('/staff', [StaffController::class, 'index'])->name('staff');
Route::get('/homeStaff', [StaffController::class, 'homeStaff'])->name('homeStaff');
Route::post('/complete-appointment/{appointment}', [StaffController::class, 'completeAppointment'])->name('complete.appointment');
Route::get('/staff/acceptedappoint', [StaffController::class, 'acceptedAppointments'])->name('staff.acceptedappoint');
Route::post('/accept-appointment/{appointment}', [StaffController::class, 'pendingAppointment'])->name('accept.appointment');
Route::get('/logout', [AuthController::class, 'logout'])->name('manual.logout');
Route::post('/complete-appointment/{appointment}', [StaffController::class, 'completeAppointment'])->name('complete.appointment');
Route::put('/staff/cancel/{appointment}', [StaffController::class, 'cancelAppointment'])->name('staff.cancel');



//Landing_Page
Route::get('/', [LandingPageController::class, 'Home'])->name('home');
Route::get('/ContactUs', [LandingPageController::class, 'ContactUs'])->name('contactUs');
Route::get('/Services', [LandingPageController::class, 'Services'])->name('services');
Route::get('/OurClinic', [LandingPageController::class, 'OurClinic'])->name('ourClinic');
Route::get('/OurShop', [LandingPageController::class, 'OurShop'])->name('ourShop');


//super admin routes
// Route::get('/super-admin-dashboard', function () {
//     return view('superadmin.dashboard');
// })->name('super_admin.home');
// Route::post('/super-admin-logout', [SuperAdminController::class, 'logout'])->name('super_admin.logout');


//User Dashboard
Route::get('/UserDashboard', [PageController::class, 'showDashboard']);
Route::prefix('superadmin')->group(function () {
    Route::get('users', [UserManagementController::class, 'index'])->name('superadmin.user.index')->middleware('auth');
    Route::get('users/create', [UserManagementController::class, 'create'])->name('superadmin.user.create')->middleware('auth');
    Route::post('users', [UserManagementController::class, 'store'])->name('superadmin.user.store')->middleware('auth');
    Route::get('users/{id}', [UserManagementController::class, 'show'])->name('superadmin.user.show')->middleware('auth');
    Route::get('users/{id}/edit', [UserManagementController::class, 'edit'])->name('superadmin.user.edit')->middleware('auth');
    Route::put('users/{id}', [UserManagementController::class, 'update'])->name('superadmin.user.update')->middleware('auth');
    Route::delete('/superadmin/user/{id}/archive', [UserManagementController::class, 'archive'])->name('superadmin.user.archive')->middleware('auth');

});


//inventory routes
Route::get('/inventory', [InventoryController::class, 'index'])->name('inventory.index');
Route::post('/inventory', [InventoryController::class, 'store'])->name('inventory.store');
Route::get('/inventory/{id}/audit', 'App\Http\Controllers\InventoryController@showAudit')->name('inventory.audit.show');
Route::post('/inventory/addquantity/{id}', [InventoryController::class, 'addQuantity'])->name('inventory.addquantity');


//admin in ventory
Route::get('/admin/inventory', [InventoryController::class, 'indexadmin'])->name('admin.inventory.indexadmin');
Route::delete('/admin/inventory/{id}', [InventoryController::class, 'destroy'])->name('admin.inventory.delete');


// ecom routes
Route::get('/shop', [ShopController::class, 'index'])->name('shop.index');
Route::get('/shop', [ShopController::class, 'index'])->name('shop.index');
Route::get('/clinic/{clinic_id}/buy/{inventory_id}', [ShopController::class, 'buyFromClinic'])->name('clinic.buy');
Route::post('/order-product', [ShopController::class, 'orderProduct'])->name('order.product');