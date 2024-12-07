<?php

use App\Http\Controllers\backend\AdminProductcontroller;
use App\Http\Controllers\backend\AuthController;
use App\Http\Controllers\backend\dashboardController;
use App\Http\Controllers\shoppingController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\backend\CategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// frontend
Route::get('/', [shoppingController::class, 'home'])->name('home');
Route::get('/shops', [shoppingController::class, 'shops'])->name('shops');
Route::get('/news', [shoppingController::class, 'news'])->name('news');

Route::get('/detail', [shoppingController::class, 'detail'])->name('detail');
Route::get('/search', [shoppingController::class, 'search'])->name('search');

// backend


// login & register
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::get('/register', [AuthController::class, 'register'])->name('register');

Route::post('/submit_login', [AuthController::class, 'submit_login'])->name('submitlogin');
Route::post('/submit_register', [AuthController::class, 'submit_register'])->name('submitregister');

// logout

Route::get('/logout' , [AuthController::class , 'logout'])->name('logout');
Route::post('/submit_logout' , [AuthController::class , 'submitlogout'])->name('submit-logout');

Route::middleware(['auth'])->group(function () {
    // dashboard

    Route::get('admin/dash', [dashboardController::class, 'dashboard'])->name('dashboard');

    // category
    Route::get('/admin/category', [CategoryController::class, 'index'])->name('category.view');
    Route::get('/admin/category/add', [CategoryController::class, 'addCategory'])->name('category.add');
    Route::post('/admin/category/submit-category', [CategoryController::class, 'submitCategory'])->name('category.submit');
    Route::get('/admin/category/edit/{id}', [CategoryController::class, 'editCategory'])->name('category.edit');
    Route::post('/admin/category/submit-edit', [CategoryController::class, 'submitEditCategory'])->name('category.submitEditCategory');
    Route::post('/admin/category/submit-delete', [CategoryController::class, 'submitDeleteCategory'])->name('category.submitDeleteCategory');
});

// logo
    Route::get('/admin/view_logo' , [AdminProductcontroller::class,'viewLogo'])->name('view-logo');
    Route::get('/admin/add_logo', [AdminProductcontroller::class , 'addLogo'])->name('add-logo');
    Route::post('/admin/submit_add_logo', [AdminProductcontroller::class , 'submitAddLogo'])->name('submit-add-logo');
// product
    Route::get('/admin/view-product',[AdminProductcontroller::class,'viewProduct'])->name('view-product');
    Route::get('/admin/add-product' , [AdminProductcontroller::class , 'addPRoduct'])->name('add-product');
    Route::post('/admin/product/submit-product', [AdminProductcontroller::class , 'submitProduct'] )->name('submit-product');

// edit
        Route::get('admin/edite-product/{id}/{category_id}', [AdminProductcontroller::class , 'EditProduct'])->name('edit_product');
    Route::post('admin/submitEdit' , [AdminProductcontroller::class , 'submitEdit'])->name('submitEdit');