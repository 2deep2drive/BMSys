<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ModsController;
use App\Http\Controllers\TagsController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\RatingsController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\ProfilesController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\CatagoriesController;

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

/*
|   ----------------------------------
|   Social/Google logIn with socialite
|   ----------------------------------
 */
Route::get('login/google/redirect', [App\Http\Controllers\Auth\LoginController::class, 'redirectToGoogle'])->name('login.google');
Route::get('login/google/callback', [App\Http\Controllers\Auth\LoginController::class, 'handleGoogleCallback']);

/*
|   ----------------------------------
|   Social/Github logIn with socialite
|   ----------------------------------
 */
Route::get('auth/github/redirect', [App\Http\Controllers\Auth\LoginController::class, 'redirectToGithub'])->name('login.github');
Route::get('login/github/callback', [App\Http\Controllers\Auth\LoginController::class, 'handleGithubCallback']);

/*
|   -------------------------
|   Routes for Authentication
|   -------------------------
 */
Auth::routes();
// Auth::routes(['verify' => true]);

/*
|   -----------------
|   Routes Under Auth
|   -----------------
 */
Route::group(['middleware' => 'auth'], function () {

    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    //--------------------------
    /*      App Devolopment
    |   ------------------------------------------------------------------------------------------------------------
    |   Routes for Single-Post,Single-Post-Like,Single-Post-Dislike,Single-Post-Comment inside Single-Post.blade.php
    |   ------------------------------------------------------------------------------------------------------------
     */
    Route::group(['prefix' => 'post'], function () {
        Route::get('/byCatagory/{id}', [App\Http\Controllers\HomeController::class, 'byCatagory'])->name('byCatagory');
        Route::get('/byTag/{id}', [App\Http\Controllers\HomeController::class, 'byTag'])->name('byTag');
        Route::get('/recentPost', [App\Http\Controllers\HomeController::class, 'recentPost'])->name('recentPost');
        Route::get('/oldestPost', [App\Http\Controllers\HomeController::class, 'oldestPost'])->name('oldestPost');
        Route::get('/{id}', [App\Http\Controllers\HomeController::class, 'singlePost'])->name('singlePost');
        Route::post('/add-bookmark/{id}', [App\Http\Controllers\HomeController::class, 'addBookmark'])->name('addBookmark');
        Route::post('/remove-bookmark/{id}', [App\Http\Controllers\HomeController::class, 'removeBookmark'])->name('removeBookmark');
        Route::post('/rating/like', [App\Http\Controllers\RatingsController::class, 'like'])->name('rating.like');
        Route::post('/rating/dislike', [App\Http\Controllers\RatingsController::class, 'dislike'])->name('rating.dislike');
        Route::post('/{id}/getData', [App\Http\Controllers\CommentsController::class, 'getData'])->name('comment.getData');
    });
    Route::resource('/comment', CommentsController::class)->only(['store']);

    /*
    |   ----------------------------------------------------------------------------------------------------
    |   Routes for Post-Like,Post-Dislike inside Home or Index
    |   ----------------------------------------------------------------------------------------------------
     */
    Route::group(['prefix' => 'rating'], function () {
        Route::post('/like', [App\Http\Controllers\RatingsController::class, 'like'])->name('rating.like');
        Route::post('/dislike', [App\Http\Controllers\RatingsController::class, 'dislike'])->name('rating.dislike');

    });
    Route::resource('/rating', RatingsController::class);

    /*
    |   ----------------------
    |   Routes Under Dashboard
    |   ----------------------
     */
    Route::group(['prefix' => 'dashboard'], function () {

        /*
        |   --------------------
        |   Routes for dashboard
        |   --------------------
         */
        Route::get('/', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

        /*
        |   ---------------
        |   Routes for Post
        |   ---------------
         */
        Route::group(['prefix' => 'post'], function () {
            Route::get('/getData', [App\Http\Controllers\PostsController::class, 'getData'])->name('post.getData');
            Route::get('/getDataExceptUser', [App\Http\Controllers\PostsController::class, 'getDataExceptUser'])->name('post.getDataExceptUser');
            Route::get('/{id}/info', [App\Http\Controllers\PostsController::class, 'info'])->name('post.info');
            Route::get('/published/{post}', [App\Http\Controllers\PostsController::class, 'publish'])->name('post.publish');
        });
        Route::resource('/post', PostsController::class)->except('show');

        /*
        |   --------------
        |   Routes for Tag
        |   --------------
         */
        Route::group(['prefix' => 'tag'], function () {
            Route::get('/getData', [App\Http\Controllers\TagsController::class, 'getData'])->name('tag.getData');
            Route::post('/info/{tag}', [App\Http\Controllers\TagsController::class, 'info'])->name('tag.info');
            Route::post('/deleteAll', [App\Http\Controllers\TagsController::class, 'deleteAll'])->name('tag.deleteAll');

        });
        Route::resource('/tag', TagsController::class)->except(['create', 'show', 'edit']);

        /*
        |   -------------------
        |   Routes for Catagory
        |   -------------------
         */
        Route::group(['prefix' => 'catagory'], function () {
            Route::get('/getData', [App\Http\Controllers\CatagoriesController::class, 'getData'])->name('catagory.getData');
            Route::post('/info/{catagory}', [App\Http\Controllers\CatagoriesController::class, 'info'])->name('catagory.info');
            Route::post('/deleteAll', [App\Http\Controllers\CatagoriesController::class, 'deleteAll'])->name('catagory.deleteAll');
        });
        Route::resource('/catagory', CatagoriesController::class)->except(['create', 'show', 'edit']);

        /*
        |   --------------------
        |   Routes for Moderator
        |   --------------------
         */
        Route::group(['prefix' => 'mod'], function () {
            Route::get('/getData', [App\Http\Controllers\ModsController::class, 'getData'])->name('mod.getData');
            // Route::post('/deleteAll', [App\Http\Controllers\ModsController::class,'deleteAll'])->name('mod.deleteAll');
        });
        Route::resource('/mod', ModsController::class)->except(['update', 'show', 'edit']);

        /*
        |   ------------------
        |   Routes for Profile
        |   ------------------
         */
        Route::group(['prefix' => 'profile'], function () {
            Route::post('/{id}/upload', [App\Http\Controllers\ProfilesController::class, 'profieImageUpload'])->name('profile.profileImageUpload');
            Route::post('/{id}/remove', [App\Http\Controllers\ProfilesController::class, 'profieImageRemove'])->name('profile.profieImageRemove');
        });
        Route::resource('/profile', ProfilesController::class)->only(['index']);

        /*
        |   ------------------
        |   Routes for Setting
        |   ------------------
        */
        Route::resource('/setting', SettingsController::class)->only(['index']);
    });
});
