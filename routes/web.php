<?php

use Illuminate\Support\Facades\Route;
use App\Vaccine;

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
	return view('pages.price-list', ['list' => Vaccine::get()]);
});
Route::get('news', 'PostController@allPost');
Route::get('news/{id}', 'PostController@show');
Route::get('vaccine', 'VaccineController@getVaccine')->name('vaccine');
Route::post('/upload', 'VaccineController@uploadImg');
Route::get('vaccine-register', 'CustomerController@registerView');
Route::post('post-register', 'CustomerController@registerPost');
Route::post('post-template', 'CustomerController@templatePost');
Route::get('get-register', 'CustomerController@registerGet');
Route::get('check-date-time', 'OrderController@checkDateTime');
// Auth::routes(['register' => false]);
// Auth::routes();
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

Route::group(['middleware'=>'auth'], function(){
	Route::prefix('admin')->group(function(){
		Route::get('', 'AdminController@index');
		Route::prefix('vaccine')->group(function(){
			Route::get('', 'VaccineController@allVaccine')->name('admin.vaccine');
			Route::get('create', 'VaccineController@create');
			Route::post('store', 'VaccineController@store');
			Route::get('/edit/{id}', 'VaccineController@edit');
			Route::post('/update/{id}', 'VaccineController@update');
		});
		Route::prefix('import-vaccine')->group(function(){
			Route::get('/', 'VaccineController@importVaccine')->name('admin.import');
			Route::post('/import', 'VaccineController@import')->name('admin.vaccine.import');
		});
		Route::prefix('post')->group(function(){
			Route::get('', 'PostController@getPost')->name('admin.post');
			Route::get('create', 'PostController@create');
			Route::post('store', 'PostController@store');
			Route::get('/edit/{id}', 'PostController@edit');
			Route::post('/update/{id}', 'PostController@update');
			Route::delete('/delete/{id}', 'PostController@delete');
		});
		Route::prefix('order')->group(function(){
			Route::get('', 'OrderController@getOrder')->name('admin.order');
			Route::get('/change/{id}', 'OrderController@changeState');
			Route::post('/change/update/{id}', 'OrderController@updateState');
			Route::get('create', 'OrderController@create');
			Route::post('store', 'OrderController@store');
			Route::get('/edit/{id}', 'OrderController@edit');
			Route::post('/update/{id}', 'OrderController@update');
		});
		Route::prefix('user')->group(function(){
			Route::get('', 'UserController@getUser');
			Route::get('/change/{id}', 'UserController@changeRole');
			Route::post('/change/update/{id}', 'UserController@updateRole');
			Route::get('create', 'UserController@create');
			Route::post('store', 'UserController@store');
			Route::get('/edit/{id}', 'UserController@edit');
			Route::post('/update/{id}', 'UserController@update');
			Route::delete('/delete/{id}', 'UserController@delete');
			Route::get('/change-password', 'UserController@changePassword')->name('changepassword');
			Route::post('/save-password', 'UserController@savePassword')->name('savepassword');
		});
		Route::prefix('template')->group(function(){
			Route::get('/', 'TemplateController@index')->name('admin.template');
			Route::get('/add', 'TemplateController@addTemplate')->name('admin.template.add');
			Route::post('/add-template', 'TemplateController@add')->name('admin.template.addnew');
			Route::post('/save-template', 'TemplateController@save')->name('admin.template.save');
			Route::get('/{id}/view', 'TemplateController@view')->name('admin.template.view');
			Route::get('/{id}/edit', 'TemplateController@edit')->name('admin.template.edit');
			Route::get('/{order_id}/answer-template-view', 'TemplateController@answerTemplateView')->name('admin.template.answerTemplate');
		});
	});
});
