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
        $name_db = "zwinny_".$user->id;
        if ($user->id==1) {
            $user->selectSchemaGral();
        } else if ($user->tenant_id!=NULL){
            //dd('ya registrado');
            //seleccionamos la bd que le corresponde
            $user->selectSchemaTnt($name_db);
            $flag=0;
        } else {
            $tenant = Tenant::create(['nombre'=>$user->name, 'nom_bd'=>$name_db]);
            $user->tenant_id = $tenant->id;
            $user->save();
            //dd('insertamos tenant');
            //creamos la bd para este usuario
            $user->createSchema($name_db,$user->id);
            
            //dd('salimos de schema');
        }
        return view('adminlte::home');
    }
}
