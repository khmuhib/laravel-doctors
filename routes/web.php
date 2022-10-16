<?php

use App\Http\Controllers\AkunController;
use App\Http\Controllers\DiseaseController;
use App\Http\Controllers\DoctorCategoryController;
use App\Http\Controllers\DoctorController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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
    //return view('welcome');
    return redirect('login');
});

Auth::routes();

Route::group(['prefix' => 'dashboard/admin'], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');

    Route::group(['prefix' => 'profile'], function () {
        Route::get('/', [HomeController::class, 'profile'])->name('profile');
        Route::post('update', [HomeController::class, 'updateprofile'])->name('profile.update');
    });

    Route::controller(AkunController::class)
        ->prefix('akun')
        ->as('akun.')
        ->group(function () {
            Route::get('/', 'index')->name('index');
            Route::post('showdata', 'dataTable')->name('dataTable');
            Route::match(['get', 'post'], 'tambah', 'tambahAkun')->name('add');
            Route::match(['get', 'post'], '{id}/ubah', 'ubahAkun')->name('edit');
            Route::delete('{id}/hapus', 'hapusAkun')->name('delete');
        }
    );

    Route::get('disease/list/', [DiseaseController::class, 'index'])->name('admin.disease.index');
    Route::get('disease/create/', [DiseaseController::class, 'create'])->name('admin.disease.create');
    Route::post('disease/store/', [DiseaseController::class, 'store'])->name('admin.disease.store');
    Route::get('disease/edit/{id}', [DiseaseController::class, 'edit'])->name('admin.disease.edit');
    Route::put('disease/update/{id}', [DiseaseController::class, 'update'])->name('admin.disease.update');
    Route::get('disease/delete/{id}', [DiseaseController::class, 'delete'])->name('admin.disease.delete');

    Route::get('doctor/category/list', [DoctorCategoryController::class, 'index'])->name('admin.doctor.category.index');
    Route::get('doctor/category/create', [DoctorCategoryController::class, 'create'])->name('admin.doctor.category.create');

    Route::get('doctor/list/', [DoctorController::class, 'index'])->name('admin.doctor.index');
    Route::get('doctor/create/', [DoctorController::class, 'create'])->name('admin.doctor.create');


});
