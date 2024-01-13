<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\VendorController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

// Admin Dashboard
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');
    Route::get('/admin/logout', [AdminController::class, 'AdminDestroy'])->name('admin.logout');
    Route::get('/admin/profile', [AdminController::class, 'AdminProfile'])->name('admin.profile');
    Route::post('/admin/profile/personalDetails', [AdminController::class, 'AdminPersonalDetails'])->name('admin.profile.personalDetails');
    Route::post('/admin/profile/additionalDetails', [AdminController::class, 'AdminAdditionalDetails'])->name('admin.profile.additionalDetails');
    Route::get('/admin/settings', [AdminController::class, 'AdminSettings'])->name('admin.settings');
    Route::post('/admin/settings/updatePassword', [AdminController::class, 'AdminUpdatePassword'])->name('admin.update.password');
    Route::post('/admin/api/fetch-state', [AdminController::class, 'AdminFetchState']);
    Route::post('/admin/api/fetch-cities', [AdminController::class, 'AdminFetchCity']);
});

// Vendor Dashboard
Route::middleware(['auth', 'role:vendor'])->group(function () {
    Route::get('/vendor/dashboard', [VendorController::class, 'VendorDashboard'])->name('vendor.dashboard');
    Route::get('/vendor/logout', [VendorController::class, 'VendorDestroy'])->name('vendor.logout');
    Route::get('/vendor/profile', [VendorController::class, 'VendorProfile'])->name('vendor.profile');
    Route::post('/vendor/profile/personalDetails', [VendorController::class, 'VendorPersonalDetails'])->name('vendor.profile.personalDetails');
    Route::post('/vendor/profile/additionalDetails', [VendorController::class, 'VendorAdditionalDetails'])->name('vendor.profile.additionalDetails');

    Route::post('/vendor/profile/shopDetails', [VendorController::class, 'VendorShopDetails'])->name('vendor.profile.shopDetails');

    Route::get('/vendor/settings', [VendorController::class, 'VendorSettings'])->name('vendor.settings');
    Route::post('/vendor/settings/updatePassword', [VendorController::class, 'VendorUpdatePassword'])->name('vendor.update.password');

    Route::post('/vendor/api/fetch-state', [VendorController::class, 'VendorFetchState']);
    Route::post('/vendor/api/fetch-cities', [VendorController::class, 'VendorFetchCity']);
});

Route::get('/admin/login', [AdminController::class, 'AdminLogin']);
Route::get('/vendor/login', [VendorController::class, 'VendorLogin']);
