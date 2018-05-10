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

Route::group(['middleware' => 'auth'], function () {
    //    Route::get('/link1', function ()    {
//        // Uses Auth Middleware
//    });

    //Please do not remove this if you want adminlte:route and adminlte:link commands to works correctly.
    #adminlte_routes
	Route::get('home', 'HomeController@index');
    //Route::get('/list_users', 'UsersController@list_users');
    Route::post('roles/store', 'RoleController@store')->name('roles.store')
		->middleware('has.permission:roles.create');
	Route::get('roles', 'RoleController@index')->name('roles.index')
		->middleware('has.permission:roles.index');
	Route::get('roles/create', 'RoleController@create')->name('roles.create')
		->middleware('has.permission:roles.create');
	Route::put('roles/{role}', 'RoleController@update')->name('roles.update')
		->middleware('has.permission:roles.edit');
	Route::get('roles/{role}', 'RoleController@show')->name('roles.show')
		->middleware('has.permission:roles.show');
	Route::delete('roles/{role}', 'RoleController@destroy')->name('roles.destroy')
		->middleware('has.permission:roles.destroy');
	Route::get('roles/{role}/edit', 'RoleController@edit')->name('roles.edit')
		->middleware('has.permission:roles.edit');

	//Users
	Route::get('users', 'UserController@index')->name('users.index')
		->middleware('has.permission:users.index');
	Route::put('users/{user}', 'UserController@update')->name('users.update')
		->middleware('has.permission:users.edit');
	Route::get('users/{user}', 'UserController@show')->name('users.show')
		->middleware('has.permission:users.show');
	Route::delete('users/{user}', 'UserController@destroy')->name('users.destroy')
		->middleware('has.permission:users.destroy');
	Route::get('users/{user}/edit', 'UserController@edit')->name('users.edit')
		->middleware('has.permission:users.edit');
	//Tenants
	Route::post('tenants/store', 'TenantController@store')->name('tenants.store')
		->middleware('has.permission:tenants.create');
	Route::get('tenants', 'TenantController@index')->name('tenants.index')
		->middleware('has.permission:tenants.index');
	Route::get('tenants/create', 'TenantController@create')->name('tenants.create')
		->middleware('has.permission:tenants.create');
	Route::put('tenants/{tenant}', 'TenantController@update')->name('tenants.update')
		->middleware('has.permission:tenants.edit');
	Route::get('tenants/{tenant}', 'TenantController@show')->name('tenants.show')
		->middleware('has.permission:tenants.show');
	Route::delete('tenants/{tenant}', 'TenantController@destroy')->name('tenants.destroy')
		->middleware('has.permission:tenants.destroy');
	Route::get('tenants/{tenant}/edit', 'TenantController@edit')->name('tenants.edit')
		->middleware('has.permission:tenants.edit');
	//Leads
	Route::post('leads/store', 'LeadController@store')->name('leads.store')
		->middleware('has.permission:leads.create');
	Route::get('leads', 'LeadController@index')->name('leads.index')
		->middleware('has.permission:leads.index');
	Route::get('leads/create', 'LeadController@create')->name('leads.create')
		->middleware('has.permission:leads.create');
	Route::put('leads/{lead}', 'LeadController@update')->name('leads.update')
		->middleware('has.permission:leads.edit');
	Route::get('leads/{lead}', 'LeadController@show')->name('leads.show')
		->middleware('has.permission:leads.show');
	Route::delete('leads/{lead}', 'LeadController@destroy')->name('leads.destroy')
		->middleware('has.permission:leads.destroy');
	Route::get('leads/{lead}/edit', 'LeadController@edit')->name('leads.edit')
		->middleware('has.permission:leads.edit');
});


