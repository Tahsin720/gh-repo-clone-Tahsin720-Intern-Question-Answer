<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Curd_operation;
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

Route::get('/', [Curd_operation::class, 'usertable']);
Route::get('registration/', [Curd_operation::class, 'registration']);
Route::post('/register_user', [Curd_operation::class, 'registerUser'])->name('register_user');
Route::post('/edit_page', [Curd_operation::class, 'editpage'])->name('edit_page');
Route::post('/edit_user', [Curd_operation::class, 'editUser'])->name('edit_user');
Route::post('/delete_func', [Curd_operation::class, 'deletefunc'])->name('delete_func');
