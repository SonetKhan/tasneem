<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\CourierController;
use App\Models\Order;
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

Route::get('/admin/index', function () {

    return view('admin.body.index');
})->name('dashboard');
/*
|--------------------------------------------------------------------------
| Admin routes
|--------------------------------------------------------------------------

*/


/*
|--------------------------------------------------------------------------
|  Login && registration
|--------------------------------------------------------------------------

*/
//Route::get('/register',[RegisterController::class,'create']);
//
//Route::post('/register',[RegisterController::class,'store']);

Route::get('/login', [RegisterController::class, 'login'])->name('login');

Route::post('/login', [RegisterController::class, 'session']);

Route::get('/logout', [RegisterController::class, 'logout'])->name('logout');


/*
|--------------------------------------------------------------------------
|  User's route
|--------------------------------------------------------------------------

*/




Route::get('admin/users', [UsersController::class, 'alluser'])->name('all.users');

Route::get('admin/users/search', [UsersController::class, 'details'])->name('search.data');

Route::get('admin/user/add', [UsersController::class, 'addUser'])->name('add.users');

Route::post('/admin/user/store', [UsersController::class, 'store'])->name('user.store');

Route::get('/admin/user/edit/{id}', [UsersController::class, 'edit'])->name('user.edit');

Route::post('/admin/user/update/{id}', [UsersController::class, 'update'])->name('user.update');

Route::get('/admin/user/delete/{id}', [UsersController::class, 'delete'])->name('user.delete');


/*
|--------------------------------------------------------------------------
|  User's profile route
|--------------------------------------------------------------------------

*/

Route::get('/admin/user/profile/{id}', [UsersController::class, 'profile'])->name('profile');

Route::post('/admin/user/profile/update/{id}', [UsersController::class, 'updateProfile'])->name('profile.update');


Route::get('/admin/user/profile/change/password/{id}', [UsersController::class, 'changePassword'])->name('change.password');

Route::post('/admin/user/profile/change/password/{id}', [UsersController::class, 'updatePassword'])->name('change.password');


/*
|--------------------------------------------------------------------------
|  All categories route
|--------------------------------------------------------------------------

*/

Route::get('/admin/category', [CategoryController::class, 'allCategory'])->name('all.categories');
Route::get('admin/category/search', [CategoryController::class, 'searchingData'])->name('searching.data');

// Route::post('/admin/category/', [CategoryController::class, 'allCategory'])->name('all.categories');

Route::get('admin/category/add', [CategoryController::class, 'addCategory'])->name('add.category');

Route::post('admin/category/store', [CategoryController::class, 'storeCategory'])->name('store.category');

Route::get('admin/category/edit/{id}', [CategoryController::class, 'editCategory'])->name('edit.category');

Route::post('admin/category/update/{id}', [CategoryController::class, 'updateCategory'])->name('edit.category');

Route::get('admin/category/delete/{id}', [CategoryController::class, 'deleteCategory'])->name('delete.category');


/*
|--------------------------------------------------------------------------
|  All products route
|--------------------------------------------------------------------------

*/




Route::get('admin/product', [ProductController::class, 'allProduct'])->name('all.product');
Route::get('admin/product/search', [ProductController::class, 'resultData'])->name('result.product');
Route::get('admin/product/add', [ProductController::class, 'addProduct'])->name('add.product');

Route::post('admin/product/store', [ProductController::class, 'storeProduct'])->name('store.product');

Route::get('admin/product/edit/{id}', [ProductController::class, 'editProduct'])->name('edit.product');

Route::post('admin/product/update/{id}', [ProductController::class, 'updateProduct'])->name('update.product');

Route::get('admin/product/delete/{id}', [ProductController::class, 'deleteProduct'])->name('delete.product');

/*
|--------------------------------------------------------------------------
|  All Orders route
|--------------------------------------------------------------------------

*/

Route::get('order/show', [OrderController::class, 'showOrder'])->name('all.orders');

route::get('add/order', [OrderController::class, 'addOrder'])->name('add.order');

route::get('process/order/{id}', [OrderController::class, 'processOrder'])->name('process.order');

route::post('process/update/order/{id}', [OrderController::class, 'updateProcess'])->name('update.process');

route::get('edit/order/{id}', [OrderController::class, 'editOrder'])->name('editOrder');

route::post('update/order/{id}', [OrderController::class, 'updateOrder'])->name('update.order');

route::get('delete/order/{id}', [OrderController::class, 'deleteOrder'])->name('delete.order');

route::get('search/order', [OrderController::class, 'searchOrder'])->name('search.order');
// route::post('/categoryDetails', [OrderController::class, 'productName']);

route::get('/categoryDetails', [OrderController::class, 'productName']);

route::post('/setPrice', [OrderController::class, 'setPrice'])->name('setPrice');

route::post('/confrim/order', [OrderController::class, 'confirmOder'])->name('confirm.order');




////....................Courier route.........................///

route::get('/show/courier', [CourierController::class, 'showCourier'])->name('all.courier');

route::get('edit/courier/{id}', [CourierController::class, 'editCourier'])->name('edit.courier');

route::post('update/courier/{id}', [CourierController::class, 'updateCourier'])->name('update.courier');

route::post('delete/courier/{id}', [CourierController::class, 'deleteCourier'])->name('delete.courier');

route::get('add/courier', [CourierController::class, 'addCourier'])->name('add.courier');


route::post('store/courier', [CourierController::class, 'storeCourier'])->name('store.courier');
