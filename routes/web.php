<?php

use Illuminate\Support\Facades\Route;
// use Illuminate\Http\Request;
use App\Http\Controllers\AnswerController;
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


Route::get('/users', '\App\Http\Controllers\TicketController@show')->name('login');
Route::get('/admin', '\App\Http\Controllers\AnswerController@index')->name('admin_login');
Route::get('/insert_tittle', function () {
    return view('user' ,['which'=>false]);
});
Route::get('/create', '\App\Http\Controllers\TicketController@store');
Route::get('/answer', function (/*Request $request*/) {
    // $data = $request->input();
    return view('admin' ,['id' => $_POST['id_tittle'],'which'=>false]);
});
Route::get('/update', '\App\Http\Controllers\AnswerController@update');
Route::get('/show', '\App\Http\Controllers\AnswerController@show');