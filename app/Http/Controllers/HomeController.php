<?php

/*
 * Taken from
 * https://github.com/laravel/framework/blob/5.3/src/Illuminate/Auth/Console/stubs/make/controllers/HomeController.stub
 */

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Caffeinated\Shinobi\Traits\ShinobiTrait;
use App\Tenant;

/**
 * Class HomeController
 * @package App\Http\Controllers
 */
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return Response
     */
    public function index()
    {
          //validamos si el usuario viene de ser registrado y hay que setear su bd
        $user = Auth::user();
        //el nombre de la bd está formado por zwinny_ + el id del tenant al que pertenece
        $name_db = "zwinny_".$user->tenant_id;
        //$name_cnx = "tenant".$user->id;
        if ($user->isRole('admin-zwinny')) {
            //Administrador General Zwinny, va a la bd general
            session(['name_bd' => 'crm_zwinny']);
            //dd('if');
            return view('adminlte::home');
        } else {

            if ($user->tenant_id!=NULL){
                //dd('if else');
                session(['name_bd' => $name_db]);
                $user->selectSchemaTnt($name_db);
            } else {
                 //Creamos el registro de Inquilino y asignamos su id al usuario
                $today = date('Y-m-d');
                $nuevafecha = strtotime ( '+1 month' , strtotime ( $today ) ) ;
                $nuevafecha = date ( 'Y-m-d' , $nuevafecha );
                $tenant = Tenant::create(['name'=>$user->name,'num_users'=>1, 'date_start'=>$today, 'date_end'=>$nuevafecha]);
                $name_db = "zwinny_".$tenant->id;
                $tenant->name_bd = $name_db;
                $tenant->save();
                $user->asignaTenantId($tenant->id);
                $user->createProfile();

                //asignamos el rol
                $user->assignRole(2);
                
                //creamos la bd para este usuario
                $user->createSchema($name_db,$user->id);
            }
            return view('adminlte::home');
        }
    }
}
