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
});


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
/*Route::group(['prefix'=>'campamento'],function(){
	Route::resource('campamento','EdicionesController');
	Route::get('ediciones/{id}/destroy',[
		'uses' => 'EdicionesController@destroy',
		'as' => 'edicion.ediciones.destroy'
		]);
	Route::get('editando',[
		'uses' => 'EdicionesController@edicionEditando',
		'as' => 'edicion.ediciones.editando'
		]);
});*/
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

Route::resource('/vivientes','VivienteController');
Route::post('vivientesEncuestaSend', 'VivienteController@store');

Route::get('encuestaVivientes',function(){
    return View::make('public/encuestaVivientes');
	});
