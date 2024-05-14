<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Web\Brand\BrandController;
use App\Http\Controllers\Web\Order\OrderController;
use App\Http\Controllers\Web\Product\ProductController;
use App\Http\Controllers\Web\Category\CategoryController;
use App\Http\Controllers\Web\Customer\CustomerController;
use App\Http\Controllers\Web\Employee\EmployeeController;
use App\Http\Controllers\Web\Department\DepartmentController;

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

    Route::resource('employees',EmployeeController::class)->names('employees')->except('show');

    Route::resource('departments',DepartmentController::class)->names('departments')->except('show');

    Route::resource('brands',BrandController::class)->names('brands')->except('show');

    Route::resource('categories',CategoryController::class)->names('categories')->except('show');

    Route::resource('products', ProductController::class)->names('products')->except('show');

    Route::resource('customers', CustomerController::class)->names('customers')->except('show');

    Route::resource('orders', OrderController::class)->names('orders')->except('show');

});

require __DIR__.'/auth.php';
