<?php

use App\Http\Controllers\Admin\SupportController;
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

// declarando as rotas com uma linha somente.
// Route::resource('/supports', SupportController::class);

Route::delete('supports/{id}', [SupportController::class, 'destroy'])->name('supports.destroy');
Route::put('/supports/{id}/edit', [SupportController::class, 'update'])->name('supports.update');
Route::get('/supports/{id}/edit', [SupportController::class, 'edit'])->name('supports.edit');
Route::get('/supports/create', [SupportController::class, 'create'])->name('supports.create');
Route::get('/supports/{id}', [SupportController::class, 'show'])->name('supports.show');
Route::post('/supports/create', [SupportController::class, 'store'])->name('supports.store');
Route::get('/supports', [SupportController::class, 'index'])->name('supports.index');

Route::get('/', function () {
    return view('welcome');
});
