<?php

use App\Http\Controllers\GuestLoanController;
use App\Http\Controllers\ManagerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\ItemCategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ActivityLogController;
use App\Http\Controllers\StaffController;

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

// Public routes
Route::get('/', function () {
    return view('home');
})->name('home');
Route::get('/profile/history', function () {
    return view('profile.history');
})->name('profile.history');

Route::get('/profile/duties', function () {
    return view('profile.duties');
})->name('profile.duties');

Route::get('/profile/structure', function () {
    return view('profile.structure');
})->name('profile.structure');

Route::get('/profile/logo', function () {
    return view('profile.logo');
})->name('profile.logo');

Route::get('/contact/faq', function () {
    return view('contact.faq');
})->name('contact.faq');

Route::get('/contact/complaints', function () {
    return view('contact.complaints');
})->name('contact.complaints');

Route::post('/contact/complaints', [ComplaintController::class, 'store'])->name('contact.complaints.store');

// Guest routes (view and book items)
Route::middleware(['auth', 'role:Guest'])->group(function () {
    Route::get('/items', [BarangController::class, 'index'])->name('items.index');
    Route::get('/items/{type}/{id}', [BarangController::class, 'show'])->name('items.show');
    Route::get('/items/category/{category}', [BarangController::class, 'byCategory'])->name('items.byCategory');
    
    // Loan routes
    Route::get('/loans', [GuestLoanController::class, 'index'])->name('guest.loans.index');
    Route::get('/loans/create/{itemType}/{itemId}', [GuestLoanController::class, 'create'])->name('guest.loans.create');
    Route::post('/loans', [GuestLoanController::class, 'store'])->name('guest.loans.store');
});

// Staff routes (view all + loan history + logs)
Route::middleware(['auth', 'role:Staff'])->prefix('staff')->name('staff.')->group(function () {
    Route::get('/dashboard', [StaffController::class, 'dashboard'])->name('dashboard');
    

     // Inventory Management
     Route::get('/categories', [ItemCategoryController::class, 'index'])->name('categories.index');
     Route::get('/categories/{category}', [ItemCategoryController::class, 'showCategory'])->name('categories.show');
     Route::post('/categories/{category}', [ItemCategoryController::class, 'store'])->name('categories.store');
     Route::get('/categories/{category}/{id}/edit', [ItemCategoryController::class, 'edit'])->name('categories.edit');
     Route::put('/categories/{category}/{id}', [ItemCategoryController::class, 'update'])->name('categories.update');
     Route::delete('/categories/{category}/{id}', [ItemCategoryController::class, 'destroy'])->name('categories.destroy');
    

       // User Management
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
    
    // Loan routes
    Route::prefix('loans')->name('loans.')->group(function () {
        Route::get('/', [StaffController::class, 'loans'])->name('index');
        Route::get('/active', [StaffController::class, 'activeLoans'])->name('active');
    });
    Route::get('/logs', [StaffController::class, 'logs'])->name('logs.index');
});

// Manager routes (full access)
Route::middleware(['auth', 'role:Manager'])->prefix('manager')->name('manager.')->group(function () {
   Route::get('/dashboard', [ManagerController::class, 'dashboard'])->name('dashboard');
     
    // Loan Management
    Route::get('/peminjaman', [PeminjamanController::class, 'index'])->name('peminjaman.index');
    Route::get('/peminjaman/{id}', [PeminjamanController::class, 'show'])->name('peminjaman.show');
    Route::put('/peminjaman/{id}/approve', [PeminjamanController::class, 'approve'])->name('peminjaman.approve');
    Route::put('/peminjaman/{id}/reject', [PeminjamanController::class, 'reject'])->name('peminjaman.reject'); 
    Route::put('/peminjaman/{id}/return', [PeminjamanController::class, 'return'])->name('peminjaman.return');

    // Activity Logs
    Route::get('/activities', [ActivityLogController::class, 'managerIndex'])->name('activities.index');
  
});

require __DIR__.'/auth.php';