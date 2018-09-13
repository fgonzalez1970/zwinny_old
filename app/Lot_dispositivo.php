<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Lot_subtipo_dispositivo;
use App\Lot_tipo_dispositivo;
use App\Lot_dispositivos_tenant;

class Lot_dispositivo extends Model
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
    	return $this->belongsToMany('App\Lot_dispositivos_tenant', 'lot_dispositivos_tenants', 'id_dispositivo');
    }

	public function tenants()
	{
    	return $this->belongsToMany('App\Tenant', 'lot_dispositivos_tenants', 'id_dispositivo', 'id_tenant');
	}
    
}
