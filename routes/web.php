<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::middleware(['auth'])->group(function() {
    
    Route::resource('users', App\Http\Controllers\UserController::class);
    Route::resource('dashboards', App\Http\Controllers\DashboardController::class);
    Route::resource('productCategories', App\Http\Controllers\ProductCategoryController::class);
    Route::resource('suppliers', App\Http\Controllers\SupplierController::class);
    Route::resource('companies', App\Http\Controllers\CompanyController::class);
    Route::resource('profiles', App\Http\Controllers\ProfileController::class);
    Route::resource('roles', App\Http\Controllers\RoleController::class);
    Route::resource('permissions', App\Http\Controllers\PermissionController::class);
    Route::resource('customers', App\Http\Controllers\CustomerController::class);
    Route::resource('expenseTypes', App\Http\Controllers\ExpenseTypeController::class);
    Route::resource('expenses', App\Http\Controllers\ExpenseController::class);
    Route::resource('warehouses', App\Http\Controllers\WarehouseController::class);
    Route::resource('products', App\Http\Controllers\ProductController::class);
    Route::resource('loaners', App\Http\Controllers\LoanerController::class);
    Route::resource('invoices', App\Http\Controllers\InvoiceController::class);

});









