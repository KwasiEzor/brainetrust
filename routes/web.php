<?php

use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\UpdateUserPasswordController;
use App\Http\Controllers\HomepageController;
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

Route::get('/', [HomepageController::class,'index'])->name('homepage');
// Public posts routes
Route::resource('posts',\App\Http\Controllers\PostController::class);

Route::get('/admin',[\App\Http\Controllers\Admin\AdminController::class,'login'])->name('admin.login');
Route::post('/admin',[\App\Http\Controllers\Admin\AdminController::class,'signIn'])->name('admin.auth');
Route::group(['middleware' => ['role:super-admin|admin']], function () {
    Route::get('/admin/dashboard',[\App\Http\Controllers\Admin\AdminController::class,'index'])->name('admin.dashboard');
    Route::get('/admin/profile',[\App\Http\Controllers\Admin\AdminController::class,'profile'])->name('admin.profile');
    Route::controller(\App\Http\Controllers\Admin\UserController::class)->group(function(){
        Route::get('/admin/users','index')->name('admin.users.index');
        Route::get('/admin/users/create','create')->name('admin.users.create');
        Route::post('/admin/users','store')->name('admin.users.store');
        Route::get('/admin/users/{user}','show')->name('admin.users.show');
        Route::put('/admin/users/{user}/roles','addRoles')->name('admin.users.add-roles');
        Route::put('/admin/users/{user}/permissions','givePermissions')->name('admin.users.add-permissions');
        Route::get('/admin/users/{user}/edit','edit')->name('admin.users.edit');
        Route::put('/admin/users/{user}','update')->name('admin.users.update');
        Route::delete('/admin/users/{user}','destroy')->name('admin.users.delete');
    });
   /* Route::put('/admin/users/password/{id}',UpdateUserPasswordController::class)->name('admin.user.password-update');
    Route::put('/admin/users/profile/{id}',UpdateUserPasswordController::class)->name('admin.user.profile-update');*/

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

    Route::controller(PostController::class)->group(function(){
        Route::get('/admin/posts','index')->name('admin.posts.index');
        Route::get('/admin/posts/create','create')->name('admin.posts.create');
        Route::get('/admin/posts/{post}','show')->name('admin.posts.show');
        Route::get('/admin/posts/{post}/edit','edit')->name('admin.posts.edit');
        Route::post('/admin/posts','store')->name('admin.posts.store');
        Route::put('/admin/posts/{post}','update')->name('admin.posts.update');
        Route::delete('/admin/posts/{post}','destroy')->name('admin.posts.delete');
    });
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
