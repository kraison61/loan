<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;

Route::get('/', function () {
    return view('index');
});

// ── Auth routes (Breeze / Jetstream already registers these) ─
// require __DIR__.'/auth.php';

// ── Admin routes ─────────────────────────────────────────────
Route::prefix('admin')
    ->name('admin.')
    ->middleware(['auth', 'admin'])
    ->group(function () {

        Route::get('/', [DashboardController::class, 'index'])
            ->name('dashboard');

        // Stubs — wire up controllers as you build each module
        Route::get('/pages', fn() => abort(404))->name('pages.index');
        Route::get('/posts', fn() => abort(404))->name('posts.index');
        Route::get('/products', fn() => abort(404))->name('products.index');
        Route::get('/contacts', fn() => abort(404))->name('contacts.index');
        Route::get('/faqs', fn() => abort(404))->name('faqs.index');
        Route::get('/users', fn() => abort(404))->name('users.index');
    });
Route::get('/login', fn() => abort(404))->name('login');