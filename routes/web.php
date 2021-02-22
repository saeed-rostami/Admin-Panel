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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/admin', [App\Http\Controllers\HomeController::class, 'admin'])->name('admin.index');


//categories
Route::get('/categories', [App\Http\Controllers\Admin\CategoryController::class, 'index'])->name('admin.categories');

Route::post('/category-store', [App\Http\Controllers\Admin\CategoryController::class, 'store'])->name('admin.category.store');

Route::get('/category-edit-show/{category}', [App\Http\Controllers\Admin\CategoryController::class, 'edit'])->name('admin.category.edit');

Route::put('/category-update/{category}', [App\Http\Controllers\Admin\CategoryController::class, 'update'])->name('admin.category.update');

Route::delete('/category-destroy/{category}', [App\Http\Controllers\Admin\CategoryController::class, 'destroy'])->name
('admin.category.delete');


//articles
Route::get('/articles', [App\Http\Controllers\Admin\ArticleController::class, 'index'])->name('admin.articles');
Route::get('/article/{article}', [App\Http\Controllers\Admin\ArticleController::class, 'show'])->name('admin.article.show');

Route::get('/article-create', [App\Http\Controllers\Admin\ArticleController::class, 'create'])->name('admin.article.create');

Route::post('/article-store', [App\Http\Controllers\Admin\ArticleController::class, 'store'])->name('admin.article.store');

Route::get('/article-edit-show/{article}', [App\Http\Controllers\Admin\ArticleController::class, 'edit'])->name('admin.article.edit');

Route::put('/article-update/{article}', [App\Http\Controllers\Admin\ArticleController::class, 'update'])->name('admin.article.update');

Route::delete('/article-destroy/{article}', [App\Http\Controllers\Admin\ArticleController::class, 'destroy'])->name
('admin.article.delete');


Route::group(['middleware' => ['role:admin']], function () {
//admin
    Route::get('/admins', [App\Http\Controllers\Admin\AdminController::class, 'index'])->name('admin.admins');
    Route::get('/admin-show/{user}', [App\Http\Controllers\Admin\AdminController::class, 'show'])->name('admin.show');
    Route::post('/role-user/{user}', [App\Http\Controllers\Admin\AdminController::class, 'roleUser'])->name('admin.roleUser.store');
    Route::post('/role-user-remove/{user}', [App\Http\Controllers\Admin\AdminController::class, 'removeRoleUser'])->name('admin.roleUser.remove');

//roles
    Route::get('/roles', [App\Http\Controllers\Admin\RoleController::class, 'index'])->name('admin.roles.index');
    Route::get('/role/{role}', [App\Http\Controllers\Admin\RoleController::class, 'show'])->name('admin.role.show');
    Route::post('/role-store', [App\Http\Controllers\Admin\RoleController::class, 'store'])->name('admin.role.store');
    Route::get('/role-edit/{role}', [App\Http\Controllers\Admin\RoleController::class, 'edit'])->name('admin.roles.edit');
    Route::put('/role-update/{role}', [App\Http\Controllers\Admin\RoleController::class, 'update'])->name('admin.role.update');

    Route::post('/role-store', [App\Http\Controllers\Admin\RoleController::class, 'store'])->name('admin.role.store');

    Route::delete('/role-delete/{role}', [App\Http\Controllers\Admin\RoleController::class, 'destroy'])->name('admin.role.delete');


//permissions
    Route::get('/permissions', [App\Http\Controllers\Admin\PermissionController::class, 'index'])->name('admin.permissions.index');
    Route::post('/permission-store', [App\Http\Controllers\Admin\PermissionController::class, 'store'])->name('admin.permission.store');
    Route::get('/permission-edit/{permission}', [App\Http\Controllers\Admin\PermissionController::class, 'edit'])->name('admin.permission.edit');
    Route::put('/permission-update/{permission}', [App\Http\Controllers\Admin\PermissionController::class, 'update'])->name('admin.permission.update');

    Route::post('/permission-store', [App\Http\Controllers\Admin\PermissionController::class, 'store'])->name('admin.permission.store');

    Route::delete('/permission-delete/{permission}', [App\Http\Controllers\Admin\PermissionController::class, 'destroy'])->name('admin.permission.delete');

    Route::post('/permission-role-store/{role}', [App\Http\Controllers\Admin\PermissionController::class, 'permissionsRole'])->name('admin.permissionsRole.store');

});
