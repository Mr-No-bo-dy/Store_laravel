<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProducerController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\SubcategoryController;
use App\Http\Controllers\ProductController;
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

    /* Profile **/
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::middleware('is_admin')->group(function () {
        Route::prefix('admin')->group(function () {         // URI's prefix
            // Route::name('admin.')->group(function () {          // Route name's prefix

                Route::controller(AdminController::class)->group(function() {
                    Route::get('/', 'index')->name('admin.dashboard');
                });

                /* Producers **/
                Route::controller(ProducerController::class)->group(function() {
                    Route::get('/producers', 'index')->name('admin.producer.index');
                    Route::get('/producer/show/{id_producer}', 'show')->name('admin.producer.show');
                    Route::get('/producer/create', 'create')->name('admin.producer.create');
                    Route::post('/producer/store', 'store')->name('admin.producer.store');
                    Route::get('/producer/edit/{id_producer}', 'edit')->name('admin.producer.edit');
                    Route::patch('/producer/update', 'update')->name('admin.producer.update');
                    Route::delete('/producer/delete', 'delete')->name('admin.producer.delete');
                    Route::patch('/producer/restore', 'restore')->name('admin.producer.restore');
                    Route::delete('/producer/destroy', 'destroy')->name('admin.producer.destroy');
                });

                /* Categories **/
                Route::controller(CategoryController::class)->group(function() {
                    Route::get('/categories', 'index')->name('admin.category.index');
                    Route::get('/category/show/{id_category}', 'show')->name('admin.category.show');
                    Route::get('/category/create', 'create')->name('admin.category.create');
                    Route::post('/category/store', 'store')->name('admin.category.store');
                    Route::get('/category/edit/{id_category}', 'edit')->name('admin.category.edit');
                    Route::patch('/category/update', 'update')->name('admin.category.update');
                    Route::delete('/category/delete', 'delete')->name('admin.category.delete');
                    Route::patch('/category/restore', 'restore')->name('admin.category.restore');
                    Route::delete('/category/destroy', 'destroy')->name('admin.category.destroy');
                });

                /* Subcategories **/
                Route::controller(SubcategoryController::class)->group(function() {
                    Route::get('/subcategories', 'index')->name('admin.subcategory.index');
                    Route::get('/subcategory/show/{id_subcategory}', 'show')->name('admin.subcategory.show');
                    Route::get('/subcategory/create', 'create')->name('admin.subcategory.create');
                    Route::post('/subcategory/store', 'store')->name('admin.subcategory.store');
                    Route::get('/subcategory/edit/{id_subcategory}', 'edit')->name('admin.subcategory.edit');
                    Route::patch('/subcategory/update', 'update')->name('admin.subcategory.update');
                    Route::delete('/subcategory/delete', 'delete')->name('admin.subcategory.delete');
                    Route::patch('/subcategory/restore', 'restore')->name('admin.subcategory.restore');
                    Route::delete('/subcategory/destroy', 'destroy')->name('admin.subcategory.destroy');
                });

                /* Products **/
                Route::controller(AdminProductController::class)->group(function() {
                    Route::get('/products/index', 'index')->name('admin.product.index');
                    Route::get('/product/show/{id_product}', 'show')->name('admin.product.show');
                    Route::get('/product/create', 'create')->name('admin.product.create');
                    Route::post('/product/store', 'store')->name('admin.product.store');
                    Route::get('/product/edit/{id_product}', 'edit')->name('admin.product.edit');
                    Route::patch('/product/update', 'update')->name('admin.product.update');
                    Route::delete('/product/delete', 'delete')->name('admin.product.delete');
                    Route::patch('/product/restore', 'restore')->name('admin.product.restore');
                    Route::delete('/product/destroy', 'destroy')->name('admin.product.destroy');
                });
            // });
        });
    });
});

/* Products **/
Route::controller(ProductController::class)->group(function() {
    Route::get('/products', 'index')->name('product.index');
    Route::get('/product/show/{id_product}', 'show')->name('product.show');
});

require __DIR__.'/auth.php';
