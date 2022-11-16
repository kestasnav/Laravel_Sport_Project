<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BasketballController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\FootballController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PostController;
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


Route::get('/',[PostController::class, 'index'])->name('home');

Route::resource('posts', PostController::class);
Route::resource('basketball', BasketballController::class);
Route::resource('football', FootballController::class);
Route::resource('comments', CommentController::class);

Route::get('euroleague',[PostController::class, 'euroleague'])->name('euroleague');
Route::get('nba',[PostController::class, 'nba'])->name('nba');
Route::get('lkl',[PostController::class, 'lkl'])->name('lkl');
Route::get('basketball',[PostController::class, 'basketball'])->name('basketball');

Route::get('football',[PostController::class, 'football'])->name('football');
Route::get('premierleague',[PostController::class, 'premier'])->name('premier');
Route::get('alyga',[PostController::class, 'alyga'])->name('alyga');
Route::get('championsleague',[PostController::class, 'champions'])->name('champions');
Route::get('wc2022',[PostController::class, 'wc2022'])->name('wc2022');

Route::get('/profilis/{name}',[UserController::class, 'profileEdit'])
    ->name('profileEdit');

Route::put('/profilis/{name}',[UserController::class, 'profileUpdate'])
    ->name('profileUpdate');

Route::get('language/{lang}', [LanguageController::class, 'setLanguage'])->name('setLanguage');

Route::post('posts/search',[PostController::class, 'findPost'])->name('find.post');

Route::put('like/{comment}', [LikeController::class, 'like'])->name('like');
Route::delete('unlike/{comment}', [LikeController::class, 'unlike'])->name('unlike');

Route::get('admin', [AdminController::class, 'posts'])->name('admin')->middleware('can:admin_user');

Route::get('admin/posts', [AdminController::class, 'posts'])->name('admin.posts')->middleware('can:admin_user');
Route::get('admin/users', [AdminController::class, 'users'])->name('admin.users')->middleware('can:admin_user');
Route::get('admin/comments', [AdminController::class, 'comments'])->name('admin.comments')->middleware('can:admin_user');

Route::delete('destroy/{id}', [AdminController::class, 'destroyUser'])->name('users.destroy')->middleware('can:admin_user');

Route::put('role/{id}', [AdminController::class, 'role'])->name('users.role')->middleware('can:admin_user');

Route::put('hide/{id}', [AdminController::class, 'hide'])->name('hide.post')->middleware('can:admin_user');

Auth::routes();

Route::get('/image/{name}',[PostController::class, 'display'])
    ->name('images');
