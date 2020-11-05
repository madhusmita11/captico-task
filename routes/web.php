<?php

use Illuminate\Support\Facades\Route;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('reverse', function () {
    return view('reverse');
});
Route::get('login', function () {
    return view('login');
});

Route::post('adminlogin', [AdminController::class, 'adminlogin']);

Route::get('/logout', function () {
    session()->flush('session-data');
    return redirect('login');
});
Route::group(['middleware' => ['auth']], function () {

Route::get('dashboard', [AdminController::class, 'renederDashboard']);

Route::get('cat', function () {
    return view('cat');
});
Route::post('catadd', [AdminController::class, 'insert_category']);

Route::post('subcat_data', [AdminController::class, 'insert_subcategory']);

Route::get('insertSubcat',  [AdminController::class, 'subcat_add']);
Route::get('subdashboard',  [AdminController::class, 'subcat_show']);

Route::get('edit/{id}', [AdminController::class, 'edit']);
Route::post('edit/{id}', [AdminController::class, 'update_category']);

Route::get('subedit/{id}', [AdminController::class, 'subedit']);
Route::post('subedit/{id}', [AdminController::class, 'subupdate']);
});