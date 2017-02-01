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
Route::get('/webadmin', function(){
    return View::make('webadmin/webadmin');
})->middleware('auth');

/*
* Routes para User...
*/
Route::resource('/user','UserController');
Route::get('user/edit/{id}',[
		'uses' => 'UserController@edit',
		'as' => 'user.edit'
		]);
Route::get('user/destroy/{id}',[
		'uses' => 'UserController@destroy',
		'as' => 'user.destroy'
		]);
/*
* Routes para Campamento...
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
* Routes para Vivientes...
*/
Route::group(['prefix'=>'vivientes'],function(){
	// Routes of Dashboards
    Route::get('vivientes', function(){
	    return View::make('vivientes/vivientesDashboard');
	})->middleware('auth');

	Route::resource('/','VivienteController');
	Route::get('vivientes/edit/{id}',[
		'uses' => 'VivienteController@edit',
		'as' => 'vivientes.edit'
		]);
	Route::get('vivientes/destroy/{id}',[
		'uses' => 'VivienteController@destroy',
		'as' => 'vivientes.destroy'
		]);

	Route::get('familiares', function(){
	    return View::make('familiares/familiaresDashboard');
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
});

/*
* Routes para Familiares...
*/
Route::resource('/familiares','FamiliarController');
Route::get('familiares/edit/{id}',[
		'uses' => 'FamiliarController@edit',
		'as' => 'familiares.edit'
		]);
Route::get('familiares/destroy/{id}',[
		'uses' => 'FamiliarController@destroy',
		'as' => 'familiares.destroy'
		]);

/*
* Routes para  Staff...
*/
Route::resource('/staff','StaffController');
Route::get('staff/destroy/{id}',[
		'uses' => 'StaffController@destroy',
		'as' => 'staff.destroy'
		]);


/*
* Routes para Staff...
*/

Route::group(['prefix'=>'stafers'],function(){
	Route::get('staff', function(){
	    return View::make('staff/staffDashboard');
	})->middleware('auth');

	Route::get('campamento-actual', function(){
	    return View::make('staff/campamentoActual');
	})->middleware('auth');

	// Routes for Datatables
	Route::get('staffRegistrados',[
		'uses' => 'StaffController@staffRegistrados',
		'as' => 'staff.registrados'
	]);
	Route::get('staffAsistentes',[
		'uses' => 'StaffController@staffAsistentes',
		'as' => 'staff.asistentes'
	]);
	Route::get('staffPagados',[
		'uses' => 'StaffController@staffPagados',
		'as' => 'staff.registradosPagados'
	]);

	// Routes for Staff Charts 
	Route::get('edit/{id}',[
		'uses' => 'StaffController@edit2',
		'as' => 'staff.edit2'
	]);

	// Routes for Staff Charts 
	Route::get('dropdown',[
		'uses' => 'StaffController@dropdown',
		'as' => 'staff.dropdown'
	]);

});


/*
* Routes para Dashboard de Staff...
*/
Route::get('staffDashboard',function(){
     	return View::make('public/staffHome');
	});
Route::post('staffDashboard',[
		'uses' => 'StaffDashboardController@dashboard',
		'as' => 'staff.dashboard',
		]);
/*
* Routes para fastInsights...
*/
Route::group(['prefix'=>'fastInsights'],function(){
	// Routes for Vivientes Tiles 
	Route::get('vivientesContador',[
		'uses' => 'StaffDashboardController@vivientesRegistradosContador',
		'as' => 'staffDashboard.vivientesRegistradosContador'
	]);
	Route::get('vivientesContadorPagados',[
		'uses' => 'StaffDashboardController@vivientesPagadosContador',
		'as' => 'staffDashboard.vivientesPagadosContador'
	]);
	Route::get('vivientesContadorPagadosParciales',[
		'uses' => 'StaffDashboardController@vivientesPagadosParcialesContador',
		'as' => 'staffDashboard.vivientesPagadosParcialesContador'
	]);

	// Routes for Vivientes Charts 
	Route::get('vivientesEdades',[
		'uses' => 'StaffDashboardController@edadesChartData',
		'as' => 'staffDashboard.edadesChartData'
	]);
	Route::get('vivientesGenero',[
		'uses' => 'StaffDashboardController@generoChartData',
		'as' => 'staffDashboard.generoChartData'
	]);

	// Routes for Staff Tiles 
	Route::get('staffContador',[
		'uses' => 'StaffDashboardController@staffRegistradosContador',
		'as' => 'staffDashboard.staffRegistradosContador'
	]);
	Route::get('staffContadorPagados',[
		'uses' => 'StaffDashboardController@staffPagadosContador',
		'as' => 'staffDashboard.staffPagadosContador'
	]);
	Route::get('staffContadorAsistentes',[
		'uses' => 'StaffDashboardController@staffAsistentesContador',
		'as' => 'staffDashboard.staffAsistentesContador'
	]);

	// Routes for Staff Charts 
	Route::get('staffViejosNuevos',[
		'uses' => 'StaffDashboardController@staffViejosNuevosContador',
		'as' => 'staffDashboard.viejosNuevos'
	]);
});

/*
* Routes para encuesta de Staff viejo/nuevo...
*/
Route::get('encuestaStaff',function(){
    return View::make('public/midviewEncuestaStaff');
	});

Route::get('staffDropdown',[
		'uses' => 'EncuestaController@staffDropdown',
		'as' => 'staffDropdown',
		]);

Route::post('encuestaStaffViejo',[
		'uses' => 'EncuestaController@encuestaStaffViejo',
		'as' => 'encuestaStaffViejo',
		]);

Route::put('updateStaff/{id}',[
		'uses' => 'EncuestaController@updateStaff',
		'as' => 'updateStaff',
		]);

Route::get('encuestaStaffNuevo',function(){
    return View::make('public/encuestaStaff');
	});

Route::post('encuestaStaffNuevo',[
		'uses' => 'EncuestaController@storeStaff',
		'as' => 'storeStaff',
		]);
Route::get('graciasStaff',function(){
    return View::make('public/graciasStaff');
	});

/*
* Routes para encuesta de Viviente...
*/
Route::get('encuestaVivientes',function(){
    return View::make('public/encuestaVivientes');
	});

Route::post('vivientesEncuestaSend', 'EncuestaController@storeViviente');

Route::get('gracias',function(){
    return View::make('public/gracias');
	});