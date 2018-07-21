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
        'name', 'email', 'password','user_temp','tenant_id'
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
        //$state = 'INSERT INTO role_user (role_id,user_id) VALUES(2,'.$idUser.')';
        //DB::statement($state);

        //creamos la bd y seleccionamos la conexión
        DB::statement('CREATE DATABASE IF NOT EXISTS '.$schemaName);
        
        Config::set('database.connections.tenant', array(
            'driver'    => 'mysql',
            'host'      => 'localhost',
            'database'  => $schemaName,
            'username'  => 'crm_zwinny',
            'password'  => '2018gdl',
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => '',
        ));

        DB::setDefaultConnection('tenant');
        //creamos tabla tipo de direccion
        DB::statement('CREATE TABLE IF NOT EXISTS `t01m03_typesadresses` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci');
        //llenamos la tabla tipo de direccion
        DB::statement("INSERT INTO `t01m03_typesadresses` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
    (1, 'Principal', 'Dirección Principal', '2018-04-22 12:29:06', NULL),
    (2, 'Oficina Ppal', 'Oficina Principal', '2018-04-22 12:29:26', NULL),
    (3, 'Oficina sucursal', 'Oficina Secundario o Sucursal', '2018-04-22 12:29:57', NULL)");

        //creamos tabla tipo de redes
        DB::statement('CREATE TABLE IF NOT EXISTS `t01m05_typesnetworks` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci');
        //llenamos la tabla tipo de redes
        DB::statement("INSERT INTO `t01m05_typesnetworks` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
    (1, 'Facebook', 'Facebook', NULL, NULL),
    (2, 'Twitter', 'Twitter', NULL, NULL),
    (3, 'Instagram', 'Instagram', NULL, NULL),
    (4, 'Linkedin', 'Linkedin', NULL, NULL)");

        //creamos la tabla de tipos de vivienda
        
        DB::statement('CREATE TABLE IF NOT EXISTS `t01_m04_typeslivplaces` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci');
        //llenamos la tabla tipos de vivienda
        DB::statement("INSERT INTO `t01_m04_typeslivplaces` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
    (1, 'Casa', 'Casa', NULL, NULL),
    (2, 'Apartamento', 'Apartamento', NULL, NULL),
    (3, 'Galpón', 'Galpón', NULL, NULL),
    (4, 'Bodega', 'Bodega', NULL, NULL);");


        //creamos la tabla de ramas o industrias
        
        DB::statement('CREATE TABLE IF NOT EXISTS `t01m01_branchesleads` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci');
        //llenamos la tabla ramas o tipo industrias
        DB::statement("INSERT INTO `t01m01_branchesleads` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
    (1, 'Industrias del Plástico', 'Industrias del Plástico', '2018-05-21 12:23:24', NULL),
    (2, 'Tecnología', 'Tecnología', '2018-05-21 12:23:55', NULL)");

        //creamos la tabla de origen del prospecto
        
        DB::statement('CREATE TABLE IF NOT EXISTS `t01m02_sourcesleads` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci');
        //llenamos la tabla origen del prospecto
        DB::statement("INSERT INTO `t01m02_sourcesleads` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
    (1, 'Bd Externa', 'Bd Externa', '2018-04-22 12:26:03', NULL),
    (2, 'Web', 'Sitio Web', '2018-04-22 12:26:23', NULL),
    (3, 'Llamada Entrante', 'Llamada Entrante', '2018-04-22 12:26:51', NULL),
    (4, 'Recomendación', 'Recomendación de otro lead/cliente', '2018-04-22 12:27:23', NULL),
    (5, 'Google', 'Contacto Google', '2018-04-22 12:27:47', NULL),
    (6, 'Facebook', 'Contacto Facebook', '2018-04-22 12:28:09', NULL),
    (7, 'Twitter', 'Contacto Twitter', '2018-04-22 12:28:28', NULL)");

        //creamos la tabla status de prospecto
        DB::statement("CREATE TABLE IF NOT EXISTS `t01m10_statusleads` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci");

        //llenamos la tabla status de prospecto
        DB::statement("INSERT INTO `t01m10_statusleads` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
    (1, 'Nueva Oportunidad', 'Ingresado en BD', '2018-06-10 12:22:24', '2018-06-10 12:22:26'),
    (2, 'Contacto', 'Contactado', '2018-06-10 12:23:13', '2018-06-10 12:23:14'),
    (3, 'Seguimiento', 'En seguimiento', '2018-06-10 12:23:39', '2018-06-10 12:23:40'),
    (4, 'Calificado', 'Paso a cliente', '2018-06-10 12:24:26', '2018-06-10 12:24:27'),
    (5, 'Cerrado', 'No aprovechable', '2018-06-10 12:25:23', '2018-06-10 12:25:23')");

        //creamos la tabla de prospectos
        DB::statement("CREATE TABLE IF NOT EXISTS `t01_leads` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_entity` int(11) DEFAULT NULL,
  `id_condicion_pago` int(11) DEFAULT NULL,
  `id_employee` int(11) DEFAULT NULL,
  `id_branch` int(11) unsigned DEFAULT NULL,
  `code_lead` varchar(25) DEFAULT NULL,
  `name_lead` varchar(250) DEFAULT NULL,
  `lastname_lead` varchar(250) DEFAULT NULL,
  `email_lead` varchar(250) DEFAULT NULL,
  `date_birth_lead` timestamp NULL DEFAULT NULL,
  `company` varchar(250) DEFAULT NULL,
  `rfc` varchar(15) DEFAULT NULL,
  `contact_lead` varchar(15) DEFAULT NULL,
  `phone_fix` varchar(20) DEFAULT NULL,
  `phone_movil` varchar(20) DEFAULT NULL,
  `adress_txt` text,
  `obs_lead` text,
  `id_status` int(11) unsigned zerofill DEFAULT '1',
  `id_source` int(11) unsigned DEFAULT '0',
  `flag_owner` varchar(1) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_leads_statusleads` (`id_status`),
  KEY `FK_leads_branchesleads` (`id_branch`),
  KEY `FK_leads_sourcesleads` (`id_source`),
  CONSTRAINT `FK_leads_branchesleads` FOREIGN KEY (`id_branch`) REFERENCES `t01m01_branchesleads` (`id`),
  CONSTRAINT `FK_leads_statusleads` FOREIGN KEY (`id_status`) REFERENCES `t01m10_statusleads` (`id`),
  CONSTRAINT `FK_leads_sourcesleads` FOREIGN KEY (`id_source`) REFERENCES `t01m02_sourcesleads` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci");

        //llenamos la tabla de prospectos con datos de ejemplo
        $lead = App\T01_lead::create([
          'name_lead' => '']);
        
        /*Schema::connection('tenant')->create('leads', function($table)
        {
            $table->increments('id');
            $table->string('type');
            $table->string('name');
        });*/



    }

    function selectSchemaTnt($schemaName)
    {
       //configuramos la conexión
        Config::set('database.connections.tenant', array(
            'driver'    => 'mysql',
            'host'      => 'localhost',
            'database'  => $schemaName,
            'username'  => 'crm_zwinny',
            'password'  => '2018gdl',
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
            'username'  => 'crm_zwinny',
            'password'  => '2018gdl',
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => '',
        ));
       DB::setDefaultConnection('crm_zwinny');
    }

    function asignaTenantId($idTenant)
    {
        $this->tenant_id = $idTenant;
        $this->save();
    }

    function createProfile()
    {
        $profile = new Profile;
        $profile->user_id= $this->id;
        $profile->name = $this->name;
        $profile->created_at=$this->created_at;
        $profile->save();
    }

    function desencriptar($texto){
      $decrypted = base64_decode($texto);
      return $decrypted;
    }

    function encriptar($texto){
      $encrypted = base64_encode($texto);
      return $encrypted;
    }
}
