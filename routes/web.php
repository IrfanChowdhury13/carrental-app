<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CarController;
use App\Http\Controllers\Frontend\PageController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\RentalController as AdminRentalController;
use App\Http\Controllers\Frontend\RentalController;
use App\Http\Controllers\Frontend\CarController as FrontendCarController;




Route::prefix('admin')->as('admin.')->middleware(['admin'])->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('cars', CarController::class);
    Route::resource('customers', CustomerController::class);
    Route::resource('rentals', AdminRentalController::class);
});

// Frontend Routes

Route::get('/',[PageController::class,'home'])->name('home');
Route::get('allcars',[PageController::class,'allCars'])->name('allcars');
Route::get('cars',[FrontendCarController::class,'index'])->name('cars.index');
Route::get('rentals/create/{car}',[RentalController::class,'create'])->name('rentals.create')->middleware('auth');

Route::post('rentals', [RentalController::class, 'store'])->name('rentals.store')->middleware('auth');
Route::get('rentals', [RentalController::class, 'index'])->name('rentals.index')->middleware('auth');
Route::put('rentals/{id}', [RentalController::class, 'cancel'])->name('rentals.cancel')->middleware('auth');

Route::get('/booking', [PageController::class, 'booking'])->name('customer.booking')->middleware('auth');
Route::get('/bookingform/{id}', [PageController::class, 'bookingForm'])->name('customer.bookingform')->middleware('auth');




require __DIR__.'/auth.php';

