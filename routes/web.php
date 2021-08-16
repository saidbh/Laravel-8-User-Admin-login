<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
Auth::routes();

Route::get('/', function () {
    return view('welcome');
});
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| These routes are for returning and getting data , views ONLY.
|
*/
Route::get('/home', [HomeController::class, 'index'])->name('home');

/*This route is for registration ONLY*/
Route::post('/register', [registerController::class,'register'])->name('register');
/*This route is for registration ONLY*/


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| These routes are for client controller ONLY .
|
*/
Route::post('/client/{id}', [ClientController::class, 'updateClient'] )->name('client');
Route::get('/cltDel/{id}', [ClientController::class, 'destroyClient'] )->name('clientDel');


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| These routes are for developer controller ONLY .
|
*/
Route::post('/developer/{id}', [DeveloperController::class, 'updateDeveloper'] )->name('dev');
Route::get('/developerDel/{id}', [DeveloperController::class, 'destroyDeveloper'] )->name('devDel');

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| These routes are for Project controller ONLY .
|
*/
//
Route::post('/project', [ProjectController::class, 'store'] )->name('addproject');
Route::post('/projectup/{id}', [ProjectController::class, 'updateProject'] )->name('projectupdate');
Route::get('/projectdel/{id}', [ProjectController::class, 'destroyProject'] )->name('projectdel');

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|These routes are protected by a middleware to redirect users ONLY.
|
*/
Route::get('admin/home', [HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');
Route::get('developer/home', [HomeController::class, 'devHome'])->name('developer')->middleware('is_Developer');

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|These routes are reserved for axios request ONLY .
|
*/

Route::get('client/project', [ProjectController::class, 'getClientProject'])->name('cltProject');
Route::get('developer/project', [ProjectController::class, 'getDevelopersProject'])->name('devsProject');

