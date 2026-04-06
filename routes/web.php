<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SupplierController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    if (auth()->check()) {
        if (auth()->user()->role === 'admin') {
            return redirect()->route('admin.dashboard');
        }
        return redirect()->route('staff.dashboard');
    }
    return redirect()->route('login');
});

Route::middleware(['auth', 'can:access-admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', function(){
        return view('admin.dashboard');
    })->name('admin.dashboard');
    Route::resource('suppliers', SupplierController::class)->names('admin.suppliers');
});

Route::middleware(['auth', 'can:access-staff'])->prefix('staff')->group(function () {
    Route::get('/dashboard', function(){
        return view('staff.dashboard');
    })->name('staff.dashboard');
    Route::resource('customers', CustomerController::class)->names('staff.customers');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';
