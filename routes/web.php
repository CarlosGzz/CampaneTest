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
* Routes para AreaController...
*/
Route::resource('/area','AreaController');
Route::get('area/edit/{id}',[
		'uses' => 'AreaController@edit',
		'as' => 'area.edit'
		]);
Route::get('area/destroy/{id}',[
		'uses' => 'AreaController@destroy',
		'as' => 'area.destroy'
		]);

/*
* Routes para Vivientes...
*/
Route::resource('/viviente','VivienteController');
Route::get('viviente/edit/{id}',[
		'uses' => 'VivienteController@edit',
		'as' => 'vivientes.edit'
		]);
Route::get('viviente/edit2/{id}',[
		'uses' => 'VivienteController@edit2',
		'as' => 'vivientes.edit2'
		]);
Route::get('viviente/destroy/{id}',[
		'uses' => 'VivienteController@destroy',
		'as' => 'vivientes.destroy'
		]);
Route::group(['prefix'=>'vivientes'],function(){
	// Routes of Dashboards
    Route::get('', function(){
	    return View::make('vivientes/vivientesDashboard');
	})->middleware('auth');

	Route::get('familiares', function(){
	    return View::make('familiares/familiaresDashboard');
	})->middleware('auth');

	Route::get('encuestas', function(){
	    return View::make('encuestas/encuestasDashboard');
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
		'uses' => 'VivienteController@vivientesEnCampamentoPagadosTotales',
		'as' => 'vivientes.registradosPagados'
	]);

	//Tiles Gaias de Vivientes
	Route::get('gaias',[
		'uses' => 'VivienteController@distribucionDeGaiasDeVivientes',
		'as' => 'vivientes.gaias'
	]);

	// Routes for Vivientes Charts Pagados
	Route::get('vivientesEdades',[
		'uses' => 'VivienteController@edadesChartDataPagados',
		'as' => 'vivientes.edadesChartDataPagados'
	]);
	Route::get('vivientesGenero',[
		'uses' => 'VivienteController@generoChartDataPagados',
		'as' => 'vivientes.generoChartDataPagados'
	]);
	Route::get('vegetarianosVeganos',[
		'uses' => 'VivienteController@vegetarianosVeganosChart',
		'as' => 'vivientes.vegetarianosVeganos'
	]);

	//Tiles Gaias de Vivientes
	Route::get('encuestasTabla',[
		'uses' => 'VivienteController@encuestasDeVivientes',
		'as' => 'vivientes.encuestas'
	]);
});
Route::get('vivientesDropdown',[
	'uses' => 'VivienteController@vivientesDropdown',
	'as' => 'vivientesDropdown',
]);

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
Route::resource('/staffs','StaffController');
Route::get('staffs/destroy/{id}',[
		'uses' => 'StaffController@destroy',
		'as' => 'staff.destroy'
		]);

Route::group(['prefix'=>'staff'],function(){
	Route::get('miembros', function(){
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
		'uses' => 'StaffController@edit',
		'as' => 'staff.edit'
	]);

	// Routes for Staff Charts 
	Route::get('dropdown',[
		'uses' => 'StaffController@staffDropdownCampamentoActual',
		'as' => 'staff.dropdown'
	]);

	//Tiles Gaias de Staff
	Route::get('gaias',[
		'uses' => 'StaffController@distribucionDeGaiasDeStaff',
		'as' => 'staff.gaias'
	]);

	Route::get('gaiasRegistrados',[
		'uses' => 'StaffController@distribucionDeGaiasDeStaffRegistradosACampamento',
		'as' => 'staff.gaiasRegistrados'
	]);

	//Tiles Staff 
	Route::get('staffTiles',[
		'uses' => 'StaffController@staffTiles',
		'as' => 'staff.staffTiles'
	]);

});

/*
* Routes para Dashboard de Finanzas...
*/
Route::group(['prefix'=>'finanzas'],function(){
	Route::get('',function(){
     	return View::make('finanzas/finanzasDashboard');
    })->middleware('auth');

    //Tiles Finanzas 
	Route::get('TotalIngresos',[
		'uses' => 'IngresoController@totalIngresos',
		'as' => 'finanzas.totalIngresos',
	]);

	Route::resource('/ingreso','IngresoController');
	Route::resource('/egreso','EgresoController');

	Route::get('ingreso/edit/{id}',[
		'uses' => 'IngresoController@edit',
		'as' => 'ingreso.edit'
		]);
	Route::get('ingreso/destroy/{id}',[
		'uses' => 'IngresoController@destroy',
		'as' => 'ingreso.destroy'
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

Route::post('vivientesEncuestaStore',[
		'uses' => 'EncuestaController@storeViviente',
		'as' => 'encuestaVivientes.store',
		]);

Route::get('gracias',function(){
    return View::make('public/gracias');
	});