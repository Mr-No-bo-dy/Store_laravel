<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProducerController;
use App\Http\Controllers\Admin\SubcategoryController;
use App\Http\Controllers\Pages\GeneralController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('index');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware(['auth', 'verified'])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });

Route::controller(GeneralController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/welcome', 'index')->name('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::middleware('is_admin')->group(function () {
        Route::prefix('admin')->group(function () {         // URI's prefix
            // Route::name('admin.')->group(function () {          // Route name's prefix

                Route::controller(AdminController::class)->group(function() {
                    Route::get('/', 'index')->name('admin.dashboard');
                });

                Route::controller(ProducerController::class)->group(function() {
                    Route::get('/producers', 'index')->name('admin.producers');
                    Route::get('/producer/show/{id_producer}', 'show')->name('admin.producerShow');
                    Route::get('/producer/create', 'create')->name('admin.producerCreate');
                    Route::post('/producer/store', 'store')->name('admin.producerStore');
                    Route::get('/producer/edit/{id_producer}', 'edit')->name('admin.producerEdit');
                    Route::patch('/producer/update', 'update')->name('admin.producerUpdate');
                    Route::delete('/producer/delete', 'delete')->name('admin.producerDelete');
                    Route::patch('/producer/restore', 'restore')->name('admin.producerRestore');
                    Route::delete('/producer/destroy', 'destroy')->name('admin.producerDestroy');
                });
                Route::controller(CategoryController::class)->group(function() {
                    Route::get('/categories', 'index')->name('admin.categories');
                    Route::get('/category/show/{id_category}', 'show')->name('admin.categoryShow');
                    Route::get('/category/create', 'create')->name('admin.categoryCreate');
                    Route::post('/category/store', 'store')->name('admin.categoryStore');
                    Route::get('/category/edit/{id_category}', 'edit')->name('admin.categoryEdit');
                    Route::patch('/category/update', 'update')->name('admin.categoryUpdate');
                    Route::delete('/category/delete', 'delete')->name('admin.categoryDelete');
                    Route::patch('/category/restore', 'restore')->name('admin.categoryRestore');
                    Route::delete('/category/destroy', 'destroy')->name('admin.categoryDestroy');
                });
                Route::controller(SubcategoryController::class)->group(function() {
                    Route::get('/subcategories', 'index')->name('admin.subcategories');
                    Route::get('/subcategory/show/{id_subcategory}', 'show')->name('admin.subcategoryShow');
                    Route::get('/subcategory/create', 'create')->name('admin.subcategoryCreate');
                    Route::post('/subcategory/store', 'store')->name('admin.subcategoryStore');
                    Route::get('/subcategory/edit/{id_subcategory}', 'edit')->name('admin.subcategoryEdit');
                    Route::patch('/subcategory/update', 'update')->name('admin.subcategoryUpdate');
                    Route::delete('/subcategory/delete', 'delete')->name('admin.subcategoryDelete');
                    Route::patch('/subcategory/restore', 'restore')->name('admin.subcategoryRestore');
                    Route::delete('/subcategory/destroy', 'destroy')->name('admin.subcategoryDestroy');
                });
            // });
        });
    });
});

require __DIR__.'/auth.php';
