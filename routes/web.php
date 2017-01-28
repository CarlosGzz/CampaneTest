<?php

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

Auth::routes();

Route::get('/home', 'HomeController@index');

/*
* Routes para Web Admin...
*/
Route::get('/webadmin', function()
{
    return View::make('webadmin/webadmin');
})->middleware('auth');


/*
* Routes para CampamentoController...
*/
Route::resource('/campamento','CampamentoController');
Route::get('campamento/edit/{id}',[
		'uses' => 'CampamentoController@edit',
		'as' => 'campamento.edit'
		]);
Route::get('campamento/destroy/{id}',[
		'uses' => 'CampamentoController@destroy',
		'as' => 'campamento.destroy'
		]);

/*
* Routes para GaiaController...
*/
Route::resource('/gaia','GaiaController');
Route::get('gaia/edit/{id}',[
		'uses' => 'GaiaController@edit',
		'as' => 'gaia.edit'
		]);
Route::get('gaia/destroy/{id}',[
		'uses' => 'GaiaController@destroy',
		'as' => 'gaia.destroy'
		]);

/*
* Routes para PuestoController...
*/
Route::resource('/puesto','PuestoController');
Route::get('puesto/edit/{id}',[
		'uses' => 'PuestoController@edit',
		'as' => 'puesto.edit'
		]);
Route::get('puesto/destroy/{id}',[
		'uses' => 'PuestoController@destroy',
		'as' => 'puesto.destroy'
		]);
/*
* Routes para  Staff...
*/
Route::resource('/staff','StaffController');

/*
* Routes para encuesta Staff...
*/
Route::get('encuestaStaff',function(){
    return View::make('public/midviewEncuestaStaff');
	});
Route::get('encuestaStaffNuevo',function(){
    return View::make('public/encuestaStaff');
	});
Route::get('encuestaStaffViejo',function($staff){
    return View::make('public/encuestaStaff',array('staff' => $staff));
	});
Route::get('staff/edit/{id?}',[
		'uses' => 'StaffController@edit',
		'as' => 'staff.edit'
		]);
Route::get('gracias',function(){
    return View::make('public/gracias');
	});
Route::get('graciasStaff',function(){
    return View::make('public/graciasStaff');
	});
/*
* Routes para Viviente...
*/
Route::resource('/vivientes','VivienteController');
/*
* Routes para encuesta Viviente...
*/
Route::post('vivientesEncuestaSend', 'VivienteController@store');

Route::get('encuestaVivientes',function(){
    return View::make('public/encuestaVivientes');
	});
