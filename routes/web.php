<?php

use App\Http\Controllers\MakeupColorpController;
use App\Http\Controllers\MakeupController;
use App\Http\Controllers\MakeupProductController;
use App\Http\Controllers\MakeupSubCategoryController;
use App\Http\Controllers\ProfileController;
use App\Models\MakeupSubCategory;
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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard2', function () {
    return view('dashboard2');
})->middleware(['auth', 'verified'])->name('dashboard2');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Makeup Category

Route::middleware('auth')->group(function () {
    Route::get('/makeup-trash', [MakeupController::class, 'trash'])->name('makeup.trash');
    Route::get('/makeup/{id}/restore', [MakeupController::class, 'restore'])->name('makeup.restore');
    Route::delete('/makeup/{id}/delete', [MakeupController::class, 'delete'])->name('makeup.delete');

    Route::get('makeup/active/{id}', [MakeupController::class, 'active'])->name('makeup.active');
    Route::get('makeup/inactive/{id}', [MakeupController::class, 'inactive'])->name('makeup.inactive');
    Route::resource('makeup', MakeupController::class);
});

// Makeup Sub Category

Route::middleware('auth')->group(function () {
    Route::get('/makeupSubCategory-trash', [MakeupSubCategoryController::class, 'trash'])->name('makeupSubCategory.trash');
    Route::get('/makeupSubCategory/{id}/restore', [MakeupSubCategoryController::class, 'restore'])->name('makeupSubCategory.restore');
    Route::delete('/makeupSubCategory/{id}/delete', [MakeupSubCategoryController::class, 'delete'])->name('makeupSubCategory.delete');

    Route::get('makeupSubCategory/active/{id}', [MakeupSubCategoryController::class, 'active'])->name('makeupSubCategory.active');
    Route::get('makeupSubCategory/inactive/{id}', [MakeupSubCategoryController::class, 'inactive'])->name('makeupSubCategory.inactive');
    Route::resource('makeupSubCategory', MakeupSubCategoryController::class);
});

// Makeup Products

Route::middleware('auth')->group(function () {
    Route::get('/makeupProduct-trash', [MakeupProductController::class, 'trash'])->name('makeupProduct.trash');
    Route::get('/makeupProduct/{id}/restore', [MakeupProductController::class, 'restore'])->name('makeupProduct.restore');
    Route::delete('/makeupProduct/{id}/delete', [MakeupProductController::class, 'delete'])->name('makeupProduct.delete');

    Route::get('makeupProduct/active/{id}', [MakeupProductController::class, 'active'])->name('makeupProduct.active');
    Route::get('makeupProduct/inactive/{id}', [MakeupProductController::class, 'inactive'])->name('makeupProduct.inactive');
    Route::resource('makeupProduct', MakeupProductController::class);
});


// Makeup color

Route::middleware('auth')->group(function () {
    Route::get('/makeupColor-trash', [MakeupColorpController::class, 'trash'])->name('makeupColor.trash');
    Route::get('/makeupColor/{id}/restore', [MakeupColorpController::class, 'restore'])->name('makeupColor.restore');
    Route::delete('/makeupColor/{id}/delete', [MakeupColorpController::class, 'delete'])->name('makeupColor.delete');
    // Route::get('makeupColor/show/{id}', [MakeupColorpController::class, 'viewColor'])->name('makeupColor.viewColor');
    Route::resource('makeupColorp', MakeupColorpController::class);
});

require __DIR__ . '/auth.php';
