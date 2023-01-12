<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BasketballController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\FootballController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProductcategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StandingController;
use App\Http\Controllers\UserController;
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


Route::get('/',[HomeController::class, 'index'])->name('home');

Route::resource('posts', PostController::class);
Route::resource('basketball', BasketballController::class);
Route::resource('football', FootballController::class);
Route::resource('comments', CommentController::class)->middleware('verified');
Route::resource('products', ProductController::class);
Route::resource('orders', OrderController::class)->middleware('verified');;


Route::get('latest',[PostController::class, 'index'])->name('posts.newest');
Route::get('mostread', [PostController::class, 'mostReadPosts'])->name('posts.mostread');

Route::get('euroleague',[PostController::class, 'euroleague'])->name('euroleague');
Route::get('nba',[PostController::class, 'nba'])->name('nba');
Route::get('lkl',[PostController::class, 'lkl'])->name('lkl');
Route::get('basketball',[PostController::class, 'basketball'])->name('basketball');

Route::get('football',[PostController::class, 'football'])->name('football');
Route::get('premierleague',[PostController::class, 'premier'])->name('premier');
Route::get('lithuania',[PostController::class, 'lithuania'])->name('lithuania');
Route::get('championsleague',[PostController::class, 'champions'])->name('champions');
Route::get('wc2022',[PostController::class, 'wc2022'])->name('wc2022');

Route::get('/profilis/{name}',[UserController::class, 'profileEdit'])
    ->name('profileEdit')->middleware('verified');

Route::put('/profilis/{name}',[UserController::class, 'profileUpdate'])
    ->name('profileUpdate')->middleware('verified');

Route::get('language/{lang}', [LanguageController::class, 'setLanguage'])->name('setLanguage');

Route::post('posts/search',[PostController::class, 'findPost'])->name('find.post');

Route::put('like/{comment}', [LikeController::class, 'like'])->name('like')->middleware('verified');
Route::delete('unlike/{comment}', [LikeController::class, 'unlike'])->name('unlike')->middleware('verified');

Route::get('admin', [AdminController::class, 'posts'])->name('admin')->middleware('can:admin_user','verified');

Route::get('adminposts', [AdminController::class, 'posts'])->name('admin.posts')->middleware('can:admin_user');

Route::get('users', [AdminController::class, 'users'])->name('admin.users')->middleware('can:admin_user');
Route::get('admincomments', [AdminController::class, 'comments'])->name('admin.comments')->middleware('can:admin_user');

Route::delete('destroy/{id}', [AdminController::class, 'destroyUser'])->name('users.destroy')->middleware('can:admin_user');

Route::put('role/{id}', [AdminController::class, 'role'])->name('users.role')->middleware('can:edit_user_role');

Route::put('hide/{id}', [AdminController::class, 'hide'])->name('hide.post')->middleware('can:admin_user');

Route::resource('productcategories', ProductcategoryController::class)->middleware('can:admin_user');

Route::get('allproducts', [AdminController::class, 'products'])->name('products')->middleware('can:admin_user');

Route::get('cart', [CartController::class, 'cart'])->name('cart')->middleware('verified');;
Route::get('remove_item/{id}', [CartController::class, 'remove_item'])->name('remove_item');
Route::post('add_cart/{id}', [CartController::class, 'add_cart'])->name('add_cart');

Route::get('/stripe/{totalPriceDiscount}', [OrderController::class, 'stripe']);

Route::post('/stripez/{totalPriceDiscount}', [OrderController::class,'stripePost'])->name('stripe.post');

Route::get('/userorders', [OrderController::class, 'myOrders'])->name('user.orders')->middleware('verified');

Route::get('/send/{id}', [MailController::class, 'index']);

Route::post('/orderscompleted/{id}', [OrderController::class, 'complete'])->name('orders.complete');

Route::post('/ordersdelivery/{id}', [OrderController::class, 'delivery'])->name('orders.delivery');

Route::get('scraper', [BasketballController::class, 'scraper'])->name('scraper');

Route::get('minus/{id}', [CartController::class, 'minus'])->name('minus');

Route::get('plus/{id}', [CartController::class, 'plus'])->name('plus');

Route::get('upload', [StandingController::class, 'standings']);

Route::get('standings', [StandingController::class, 'index'])->name('nba.standings');


Auth::routes([
    'verify'=>true
]);

Route::get('/image/{name}',[PostController::class, 'display'])
    ->name('images');
