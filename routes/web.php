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
* Routes para Vivientes...
*/
Route::group(['prefix'=>'vivientes'],function(){
    Route::get('vivientes', function(){
	    return View::make('vivientes/vivientesDashboard');
	})->middleware('auth');

	// Routes for Datatables
	Route::get('vivientesRegistrados',[
		'uses' => 'VivienteController@vivientesEnCampamentoRegistrados',
		'as' => 'vivientes.registrados'
	]);
	Route::get('vivientesParciales',[
		'uses' => 'VivienteController@vivientesEnCampamentoPagadosParciales',
		'as' => 'vivientes.registradosParciales'
	]);
	Route::get('vivientesPagados',[
		'uses' => 'VivienteController@vivientesEnCampamentoPagados',
		'as' => 'vivientes.registradosPagados'
	]);
	// Routes for Vivientes Tiles 
	Route::get('vivientesContador',[
		'uses' => 'VivienteController@vivientesRegistradosContador',
		'as' => 'vivientes.registradosContador'
	]);
	Route::get('vivientesContadorPagados',[
		'uses' => 'VivienteController@vivientesPagadosContador',
		'as' => 'vivientes.pagadosContador'
	]);
	Route::get('vivientesContadorPagadosParciales',[
		'uses' => 'VivienteController@vivientesPagadosParcialesContador',
		'as' => 'vivientes.pagadosParcialesContador'
	]);

	// Routes for Vivientes Charts 
	Route::get('vivientesEdades',[
		'uses' => 'VivienteController@edadesChartData',
		'as' => 'vivientes.edadesChartData'
	]);
	Route::get('vivientesGenero',[
		'uses' => 'VivienteController@generoChartData',
		'as' => 'vivientes.generoChartData'
	]);

	Route::get('edit/{id}',[
		'uses' => 'VivienteController@edit',
		'as' => 'vivientes.edit'
		]);
	Route::get('destroy/{id}',[
		'uses' => 'VivienteController@destroy',
		'as' => 'vivientes.destroy'
		]);

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
Route::get('staffDashboard',function(){
     	return View::make('public/staffHome');
	});
Route::post('staffDashboard',[
		'uses' => 'StaffController@dashboard',
		'as' => 'staff.dashboard',
		]);

/*
* Routes para Vivientes...
*/
Route::group(['prefix'=>'stafers'],function(){
    Route::get('staff', function(){
	    return View::make('staff/staffDashboard');
	})->middleware('auth');

	// Routes for Datatables
	Route::get('staffRegistrados',[
		'uses' => 'StaffController@staffRegistrados',
		'as' => 'staff.registrados'
	]);
	Route::get('staffPagados',[
		'uses' => 'StaffController@staffPagados',
		'as' => 'staff.registradosPagados'
	]);
	
	// Routes for Staff Tiles 
	Route::get('staffContador',[
		'uses' => 'StaffController@staffRegistradosContador',
		'as' => 'staff.registradosContador'
	]);
	Route::get('staffContadorPagados',[
		'uses' => 'StaffController@staffPagadosContador',
		'as' => 'staff.pagadosContador'
	]);
	Route::get('staffContadorAsistentes',[
		'uses' => 'StaffController@staffAsistentesContador',
		'as' => 'staff.asistentesContador'
	]);

	// Routes for Staff Charts 
	Route::get('staffViejosNuevos',[
		'uses' => 'StaffController@staffViejosNuevosContador',
		'as' => 'staff.viejosNuevos'
	]);

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

