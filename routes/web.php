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

// products routs
Route::resource('product',\App\Http\Controllers\ProductController::class)->parameters(['product'=>'id']);
Route::get('/product/singleProduct/{id}',[\App\Http\Controllers\ProductController::class,'Product'])->name('product.singleProduct');
// comments route
Route::resource('comment',\App\Http\Controllers\CommentController::class)->parameters(['comment'=>'id']);
Route::get('/comment/addComment/{id}',[\App\Http\Controllers\CommentController::class,'addComment'])->name('comment.addComment');
Route::post('/comment/storeComment/{id}',[\App\Http\Controllers\CommentController::class,'storeComment'])->name('comment.storeComment');

Auth::routes();
// main page
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// subcomment route
Route::post('/addsubcomment/storeComment/{id}',[\App\Http\Controllers\subCommentController::class,'addSubComment'])->name('add-sub-comment');
Route::delete('/deletesubcomment/destroyComment/{id}',[\App\Http\Controllers\subCommentController::class,'destroy'])->name('subcomment.destroy');


