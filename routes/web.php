<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AdminController;

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

Route::middleware(['auth'])->group(function () {
    Route::middleware(['approval'])->group(function () {
        Route::middleware(['role:manager'])->group(function () {
            Route::get('/admin/approve', [AdminController::class, 'approve'])->name('admin.approve');
            Route::post('/admin/approve/{id}', [AdminController::class, 'postApprove'])->name('admin.postApprove');
        });

        Route::middleware(['role:manager,admin'])->group(function () {
            Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
            Route::get('/orders/boost', [OrderController::class, 'boostOrders'])->name('orders.boost');
            Route::get('/orders/coaching', [OrderController::class, 'coachingOrders'])->name('orders.coaching');
            Route::get('/orders/wins', [OrderController::class, 'winsOrders'])->name('orders.wins');
            Route::get('/orders/user/{id}', [OrderController::class, 'getOrdersByUserId'])->name('orders.user');
            Route::get('/orders/employee/{id}', [OrderController::class, 'getOrdersByEmployeeId'])->name('orders.employee');
            Route::post('/orders/{id}/status/{type}/{status}', [OrderController::class, 'updateOrderStatus'])->name('orders.updateStatus');
        });

        Route::middleware(['role:client'])->group(function () {
            Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');
        });
    });
});

require __DIR__.'/auth.php';
