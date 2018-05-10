<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Artisan;

class Tenant extends Model
{
	protected $connection = 'mysql';

    //
    protected $fillable = [
        'nombre','contacto','nom_bd','id_status','fecha_activacion','fecha_suspension','created_at',
        'updated_at',
    ];

    function configureConnectionByName($tenantName)
	{
	    // Just get access to the config. 
	    $config = App::make('config');

	    // Will contain the array of connections that appear in our database config file.
	    $connections = $config->get('database.connections');

	    //dd($connections);

	    // This line pulls out the default connection by key (by default it's `mysql`)
	    $defaultConnection = $connections[$config->get('database.default')];

	    // Now we simply copy the default connection information to our new connection.
	    $newConnection = $defaultConnection;
	    // Override the database name.
	    $newConnection['database'] = $tenantName;

	    // This will add our new connection to the run-time configuration for the duration of the request.
	    return App::make('config')->set('database.connections.'.$tenantName, $newConnection);

	}
	function executeMigrationTenant()
	{
		return Artisan::call('migrate', array('database' => 'tenant', 'path' => '../database/migrations/tenants/'));
	}

	function searchNomDBTenantById($id)
	{
		return DB::table('tenants')->select('nom_bd')->where('id','=',$id)-first();
	}
}
