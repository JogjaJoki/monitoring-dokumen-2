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
    return redirect()->route('login');
    // return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function (){
    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
    
    Route::get('/category', [App\Http\Controllers\Admin\CategoryController::class, 'index'])->name('admin.category.index');
    Route::get('/add-category', [App\Http\Controllers\Admin\CategoryController::class, 'add'])->name('admin.category.add');
    Route::post('/create-category', [App\Http\Controllers\Admin\CategoryController::class, 'create'])->name('admin.category.create');
    Route::get('/edit-category/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'edit'])->name('admin.category.edit');
    Route::post('/update-category', [App\Http\Controllers\Admin\CategoryController::class, 'update'])->name('admin.category.update');
    Route::get('/delete-category/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'delete'])->name('admin.category.delete');

    Route::get('/document', [App\Http\Controllers\Admin\DocumentController::class, 'index'])->name('admin.document.index');
    Route::get('/add-document', [App\Http\Controllers\Admin\DocumentController::class, 'add'])->name('admin.document.add');
    Route::post('/create-document', [App\Http\Controllers\Admin\DocumentController::class, 'create'])->name('admin.document.create');
    Route::get('/edit-document/{id}', [App\Http\Controllers\Admin\DocumentController::class, 'edit'])->name('admin.document.edit');
    Route::post('/update-document', [App\Http\Controllers\Admin\DocumentController::class, 'update'])->name('admin.document.update');
    Route::get('/delete-document/{id}', [App\Http\Controllers\Admin\DocumentController::class, 'delete'])->name('admin.document.delete');

    Route::get('/search-document', [App\Http\Controllers\Admin\DocumentController::class, 'search'])->name('admin.document.search');
    Route::post('/get-document', [App\Http\Controllers\Admin\DocumentController::class, 'getDocument'])->name('admin.document.get');

    Route::get('/report-document', [App\Http\Controllers\Admin\DocumentController::class, 'report'])->name('admin.document.report');
    Route::post('/get-report', [App\Http\Controllers\Admin\DocumentController::class, 'getReport'])->name('admin.document.getReport');

    Route::get('/petugas', [App\Http\Controllers\Admin\PetugasController::class, 'index'])->name('admin.petugas.index');
    Route::get('/add-petugas', [App\Http\Controllers\Admin\PetugasController::class, 'add'])->name('admin.petugas.add');
    Route::post('/create-petugas', [App\Http\Controllers\Admin\PetugasController::class, 'create'])->name('admin.petugas.create');
    Route::get('/edit-petugas/{id}', [App\Http\Controllers\Admin\PetugasController::class, 'edit'])->name('admin.petugas.edit');
    Route::post('/update-petugas', [App\Http\Controllers\Admin\PetugasController::class, 'update'])->name('admin.petugas.update');
    Route::get('/delete-petugas/{id}', [App\Http\Controllers\Admin\PetugasController::class, 'delete'])->name('admin.petugas.delete');

    Route::get('/user', [App\Http\Controllers\Admin\UserController::class, 'index'])->name('admin.user.index');
    Route::get('/add-user', [App\Http\Controllers\Admin\UserController::class, 'add'])->name('admin.user.add');
    Route::post('/create-user', [App\Http\Controllers\Admin\UserController::class, 'create'])->name('admin.user.create');
    Route::get('/edit-user/{id}', [App\Http\Controllers\Admin\UserController::class, 'edit'])->name('admin.user.edit');
    Route::post('/update-user', [App\Http\Controllers\Admin\UserController::class, 'update'])->name('admin.user.update');
    Route::get('/delete-user/{id}', [App\Http\Controllers\Admin\UserController::class, 'delete'])->name('admin.user.delete');
});
