<?php

use Illuminate\Support\Facades\Auth;
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
Route::get('/admin',[\App\Http\Controllers\Admin\AdminController::class,'login'])->name('admin.login');
Route::post('/admin',[\App\Http\Controllers\Admin\AdminController::class,'signIn'])->name('admin.auth');
Route::group(['middleware' => ['role:super-admin|admin']], function () {
    Route::get('/admin/dashboard',[\App\Http\Controllers\Admin\AdminController::class,'index'])->name('admin.dashboard');
    Route::get('/admin/profile',[\App\Http\Controllers\Admin\AdminController::class,'profile'])->name('admin.profile');
    Route::controller(\App\Http\Controllers\Admin\UserController::class)->group(function(){
        Route::get('/admin/users','index')->name('admin.users.index');
    });
    Route::controller(\App\Http\Controllers\Admin\PermissionController::class)->group(function(){
        Route::get('/admin/permissions','index')->name('admin.permissions.index');
        Route::get('/admin/permission','create')->name('admin.permissions.create');
        Route::post('/admin/permission','store')->name('admin.permissions.store');
        Route::get('/admin/permissions/{permission}','edit')->name('admin.permissions.edit');
        Route::put('/admin/permissions/{permission}','update')->name('admin.permissions.update');
        Route::delete('/admin/permissions/{permission}','destroy')->name('admin.permissions.delete');
    });
    Route::controller(\App\Http\Controllers\Admin\RoleController::class)->group(function(){
        Route::get('/admin/roles','index')->name('admin.roles.index');
        Route::get('/admin/role','create')->name('admin.roles.create');
        Route::post('/admin/role','store')->name('admin.roles.store');
        Route::get('/admin/roles/{role}','edit')->name('admin.roles.edit');
        Route::put('/admin/roles/{role}','update')->name('admin.roles.update');
        Route::delete('/admin/roles/{role}','destroy')->name('admin.roles.delete');
    });
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
