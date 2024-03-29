<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Homecontroller;
use App\Http\Controllers\Admincontroller;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
Route::get('/redirect', [Homecontroller::class,'redirect']);
Route::get('/', [Homecontroller::class,'index']);
Route::get('/product', [Admincontroller::class,'product']);
Route::post('/uploadproduct', [Admincontroller::class,'uploadproduct']);
Route::get('/showproduct', [Admincontroller::class,'showproduct']);
Route::get('/deleteproduct/{id}', [Admincontroller::class,'deleteproduct']);
Route::get('/updateproduct/{id}', [Admincontroller::class,'updateproduct']);
Route::post('/updateoldproduct/{id}', [Admincontroller::class,'updateoldproduct']);
Route::get('/search', [Homecontroller::class,'search']);
Route::post('/addtocart/{id}', [Homecontroller::class,'addtocart']);
Route::get('/showcart', [Homecontroller::class,'showcart']);
Route::get('/deleteitem/{id}', [Homecontroller::class,'deletecartitem']);
Route::post('/order', [Homecontroller::class,'confirmorder']);
Route::get('/showorders', [Admincontroller::class,'showorders']);
Route::get('/updatestatus/{id}', [Admincontroller::class,'updatestatus']);
Route::get('/about', [Homecontroller::class,'aboutpage']);
Route::get('/home', [Homecontroller::class,'index']);
Route::get('/blog', [Homecontroller::class,'blogpage']);
Route::get('/addblogs', [Admincontroller::class,'Addblogs']);
Route::post('/uploadblog', [Admincontroller::class,'uploadblog']);
Route::get('/showblogs', [Admincontroller::class,'showblogs']);

