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

Route::get('/welcome', function () {
	return view('test');
});

Route::get('', function() {
	return view('pages.home');
});

Route::get('price-list', function() {
	return view('pages.price-list');
});
Route::get('news', 'PostController@allPost');
Route::get('news/{id}', 'PostController@show');
Route::get('vaccine', 'VaccineController@getVaccine');
Route::post('/upload', 'VaccineController@uploadImg');
Route::get('vaccine-register', 'CustomerController@registerView');
Route::post('post-register', 'CustomerController@registerPost');
Route::get('get-register', 'CustomerController@registerGet');
Auth::routes();

Route::group(['middleware'=>'auth'], function(){
	Route::prefix('admin')->group(function(){
		Route::get('/', function(){
			return view('admin.dashboard');
		});
		Route::prefix('vaccine')->group(function(){
			Route::get('', 'VaccineController@allVaccine');
			Route::get('create', 'VaccineController@create');
			Route::post('store', 'VaccineController@store');
			Route::get('/edit/{id}', 'VaccineController@edit');
			Route::post('/update/{id}', 'VaccineController@update');
		});
		Route::prefix('post')->group(function(){
			Route::get('', 'PostController@getPost');
			Route::get('create', 'PostController@create');
			Route::post('store', 'PostController@store');
			Route::get('/edit/{id}', 'PostController@edit');
			Route::post('/update/{id}', 'PostController@update');
			Route::delete('/delete/{id}', 'PostController@delete');
		});
	});
});
