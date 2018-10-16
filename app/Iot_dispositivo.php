<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Iot_subtipo_dispositivo;
use App\Iot_tipo_dispositivo;
use App\Iot_dispositivos_tenant;

class Iot_dispositivo extends Model
{
    protected $connection = 'mysql';

    //
    protected $fillable = [
        'name','id_tipo','id_subtipo','id_kontaktTag','UUID', 'date_up','date_down','created_at','updated_at',
    ];

    /**
 	* Get the tenants ids que están relacionados al dispositivo.
 	*/
	public function haveTenants()
	{
    	return $this->belongsToMany('App\Iot_dispositivos_tenant', 'Iot_dispositivos_tenants', 'id_dispositivo');
    }

	public function tenants()
	{
    	return $this->belongsToMany('App\Tenant', 'Iot_dispositivos_tenants', 'id_dispositivo', 'id_tenant');
	}
    
}
