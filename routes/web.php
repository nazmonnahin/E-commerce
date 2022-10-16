<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

route::get('/',[HomeController::class, 'index']); 


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


route::get('/redirect',[HomeController::class, 'redirect']);

route::get('/category',[AdminController::class, 'category']);

route::post('/add_category',[AdminController::class, 'add_category']);

route::get('/delete_category/{id}',[AdminController::class, 'delete_category']);

route::get('/add_product',[AdminController::class, 'add_product']);

route::post('/submit_product',[AdminController::class, 'submit_product']);

route::get('/product_list',[AdminController::class, 'product_list']);

route::get('/delete_product/{id}',[AdminController::class, 'delete_product']);

route::get('/edit_product/{id}',[AdminController::class, 'edit_product']);

route::post('/update_product/{id}',[AdminController::class, 'update_product']);

route::get('/product_details/{id}',[HomeController::class, 'product_details']);

route::post('/add_cart/{id}',[HomeController::class, 'add_cart']);

route::get('/show_cart',[HomeController::class, 'show_cart']);

route::get('/remove_cart/{id}',[HomeController::class, 'remove_cart']);

route::get('/cash_order',[HomeController::class, 'cash_order']);

route::get('/stripe/{totalprice}',[HomeController::class, 'stripe']);

Route::post('stripe/{totalprice}',[HomeController::class, 'stripePost'])->name('stripe.post');

route::get('/order',[AdminController::class, 'order']);
