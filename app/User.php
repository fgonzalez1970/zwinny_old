<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Caffeinated\Shinobi\Traits\ShinobiTrait;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Schema;
use Illuminate\Foundation\Artisan;
use App\Tenant;

class User extends Authenticatable
{
    use Notifiable, ShinobiTrait;

    protected $connection = 'mysql';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    function createSchema($schemaName,$idUser)
    {
        // Creamos la bd
        //return 
         //primero asignamos el role
        $state = 'INSERT INTO role_user (role_id,user_id) VALUES(2,'.$idUser.')';
        DB::statement($state);

        //creamos la bd y seleccionamos la conexión
        DB::statement('CREATE DATABASE IF NOT EXISTS '.$schemaName);
        
        Config::set('database.connections.tenant', array(
            'driver'    => 'mysql',
            'host'      => 'localhost',
            'database'  => $schemaName,
            'username'  => 'root',
            'password'  => '',
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => '',
        ));

        DB::setDefaultConnection('tenant');

        DB::statement('CREATE TABLE leads (id INT NOT NULL PRIMARY KEY AUTO_INCREMENT, id_entity INT NULL, id_condicion_pago INT NULL, id_empleado INT NULL, id_giro INT NULL, codigo_lead VARCHAR(25), nombre_lead VARCHAR(250) NULL, apellido_lead VARCHAR(250) NULL, email_lead VARCHAR(250) NULL, fecha_nac_lead TIMESTAMP NULL, razon_social VARCHAR(250) NULL, rfc VARCHAR(15) NULL, contacto VARCHAR(15) NULL, tel_lead VARCHAR(20) NULL, obs_lead TEXT NULL, id_status INT NULL default 0, created_at TIMESTAMP NULL, updated_at TIMESTAMP NULL)');

    }

    function selectSchemaTnt($schemaName)
    {
       //configuramos la conexión
        Config::set('database.connections.tenant', array(
            'driver'    => 'mysql',
            'host'      => 'localhost',
            'database'  => $schemaName,
            'username'  => 'root',
            'password'  => '',
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => '',
        ));

        DB::setDefaultConnection('tenant');
    }

    function selectSchemaGral()
    {
       //configuramos la conexión
         Config::set('database.connections.crm_zwinny', array(
            'driver'    => 'mysql',
            'host'      => 'localhost',
            'database'  => 'crm_zwinny',
            'username'  => 'root',
            'password'  => '',
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => '',
        ));
       DB::setDefaultConnection('crm_zwinny');
    }
}
