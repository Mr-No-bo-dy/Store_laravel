<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProducerController;
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
                    Route::post('/producer/create', 'store')->name('admin.producerCreate');
                    Route::get('/producer/edit/{id_producer}', 'edit')->name('admin.producerEdit');
                    Route::patch('/producer/update', 'update')->name('admin.producerUpdate');
                    Route::delete('/producer/delete', 'delete')->name('admin.producerDelete');    
                    Route::patch('/producer/restore', 'restore')->name('admin.producerRestore');    
                    Route::delete('/producer/destroy', 'destroy')->name('admin.producerDestroy');    
                });
            // });
        });
    });
});

require __DIR__.'/auth.php';
