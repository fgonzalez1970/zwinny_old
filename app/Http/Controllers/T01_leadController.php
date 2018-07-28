<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\T01_lead;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use App\Lead;
use App\Statuslead;
use App\lead_status;
use App\T01m01_brancheslead;
use App\T01m02_sourceslead;
use App\T01m10_statuslead;
use App\User;
use Maatwebsite\Excel\Facades\Excel;

class T01_leadController extends Controller
{

    protected $rules =
    [
        'id_source' => 'bail|required',
        'id_status' => 'bail|required',
        'id_branch' => 'bail|required',
        'name_lead' => 'bail|required|min:2|max:250',
        'lastname_lead' => 'bail|required|min:2|max:250',
        'email_lead' => 'bail|required|email',
        'birthdate_lead' => 'nullable|date_format:"d/m/Y"',
    ];

    protected $rulesImport =
    [
        'file_import' => 'bail|required',
        'id_source' => 'bail|required',
        'id_status' => 'bail|required',
        //'flag_owner' => 'bail|required',
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //busco el listado de usuarios pertenecientes al mismo tenant para la ventana modal
        $user = Auth::user();
        $listUsers = User::where('tenant_id',$user->tenant_id)->get();
        $lead = new T01_lead;
        $name_bd = session('name_bd');
        //dd($name_bd);
        Config::set('database.connections.bdcnxtemp', array(
            'driver'    => 'mysql',
            'host'      => 'localhost',
            'database'  => $name_bd,
            'username'  => 'crm_zwinny',
            'password'  => '2018gdl',
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => '',
        ));

        DB::setDefaultConnection('bdcnxtemp');
        $lead->setConnection('bdcnxtemp');
        //$lead->connection = 'tenant2';
        //dd($lead->getconnection());
        //DB::setDefaultConnection('tenant2');
        $leads = T01_lead::paginate();
        //dd($leads);
        return view('t01_leads.index', compact('leads', 'listUsers'));

        //Modelo::on(\Session::get('nombredb'))
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        $branche = new T01m01_brancheslead;
        $source = new T01m02_sourceslead;
        $status = new T01m10_statuslead;
        $name_bd = session('name_bd');
        //dd($name_bd);
        Config::set('database.connections.bdcnxtemp', array(
            'driver'    => 'mysql',
            'host'      => 'localhost',
            'database'  => $name_bd,
            'username'  => 'crm_zwinny',
            'password'  => '2018gdl',
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => '',
        ));

        DB::setDefaultConnection('bdcnxtemp');
        $branche->setConnection('bdcnxtemp');
        $source->setConnection('bdcnxtemp');
        $status->setConnection('bdcnxtemp');
        
        //buscamos los listados necesarios
        $listBranches = T01m01_brancheslead::all();
        $listSources = T01m02_sourceslead::all();
        $listStatus = T01m10_statuslead::all();
        //$listUsers = User::where('tenant_id',$user->tenant_id)
                        //->where('id','!=',$user->id)->get();
         $listUsers = User::where('tenant_id',$user->tenant_id)->get();
        //$statusList = T01m10_statuslead::pluck('name','id');
        //dd($listUsers);
        return view('t01_leads.create', compact('listStatus','listBranches','listSources','listUsers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $input = Input::all();
        $validator = Validator::make(Input::all(), $this->rules);
        //dd("pasé");
        $name_bd = session('name_bd');
        //dd($name_bd);
        $lead = new Lead;
        Config::set('database.connections.bdcnxtemp', array(
            'driver'    => 'mysql',
            'host'      => 'localhost',
            'database'  => $name_bd,
            'username'  => 'crm_zwinny',
            'password'  => '2018gdl',
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => '',
        ));

        DB::setDefaultConnection('bdcnxtemp');
        $lead->setConnection('bdcnxtemp');
        $lead = T01_lead::create($request->all());
        
        if ($request->flag_owner=='1'){
            //si no fué asignado a todos los usuarios
            if ($request->assigned_to){
                //dd('si tiene asignados');
                $lead->syncLeadsToUssers($request->assigned_to);
                //dd($request->assigned_to);
                
                //actualizamos sus permisos  
            } else {
                //lo borramos
                $lead->delete();
                $validator->errors()->add('assigned_to', 'El Prospecto debe estar asignado al menos a un usuario');
                Input::flash();
                return redirect()->back()->withErrors($validator->errors());
            }
        }
        return redirect()->route('t01_leads.index')->with('success','Registro creado satisfactoriamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Lead  $Lead
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //dd('aqui');
        $name_bd = session('name_bd');
        //dd($lead->nombre_lead);
        Config::set('database.connections.bdcnxtemp', array(
            'driver'    => 'mysql',
            'host'      => 'localhost',
            'database'  => $name_bd,
            'username'  => 'crm_zwinny',
            'password'  => '2018gdl',
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => '',
        ));
        $user = Auth::user();
        DB::setDefaultConnection('bdcnxtemp');
        $lead = new T01_lead;
        $lead->setConnection('bdcnxtemp');
        $lead = T01_lead::find($id);
        //$listUsers = User::where('tenant_id',$user->tenant_id)
        //                ->where('id','!=',$user->id)->get();
        $listUsers = User::where('tenant_id',$user->tenant_id)->get();
         return view('t01_leads.show', compact('lead', 'listUsers'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Lead  $lead
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Auth::user();
        $branche = new T01m01_brancheslead;
        $source = new T01m02_sourceslead;
        $status = new T01m10_statuslead;
        $name_bd = session('name_bd');
        //dd($lead->nombre_lead);
        Config::set('database.connections.bdcnxtemp', array(
            'driver'    => 'mysql',
            'host'      => 'localhost',
            'database'  => $name_bd,
            'username'  => 'crm_zwinny',
            'password'  => '2018gdl',
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => '',
        ));

        DB::setDefaultConnection('bdcnxtemp');
        $branche->setConnection('bdcnxtemp');
        $source->setConnection('bdcnxtemp');
        $status->setConnection('bdcnxtemp');
        
        //buscamos los listados necesarios
        $listBranches = T01m01_brancheslead::all();
        $listSources = T01m02_sourceslead::all();
        $listStatus = T01m10_statuslead::all();
        $listUsers = User::where('tenant_id',$user->tenant_id)
                        ->where('id','!=',$user->id)->get();

        $lead = new T01_lead;
        $lead->setConnection('bdcnxtemp');
        $lead = T01_lead::findOrFail($id);
        return view('t01_leads.edit', compact('lead', 'listStatus','listBranches','listSources','listUsers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Lead  $lead
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = Auth::user();
        $data = $request->all();
        $input = Input::all();
        $validator = Validator::make(Input::all(), $this->rules);
        $name_bd = session('name_bd');
        $lead = new Lead;
        Config::set('database.connections.bdcnxtemp', array(
            'driver'    => 'mysql',
            'host'      => 'localhost',
            'database'  => $name_bd,
            'username'  => 'crm_zwinny',
            'password'  => '2018gdl',
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => '',
        ));

        DB::setDefaultConnection('bdcnxtemp');
        $lead->setConnection('bdcnxtemp');
        $lead = T01_lead::findOrFail($id);
        $lead->update($request->all());

        //validamos a quién fué asignado o si cambió
        if ($request->flag_owner=='1'){
            //si no fué asignado a todos los usuarios
            if ($request->assigned_to){
                $lead->syncLeadsToUssers($request->assigned_to);
            } else {
                //lo borramos
                $lead->delete();
                $validator->errors()->add('assigned_to', 'El Prospecto debe estar asignado al menos a un usuario');
                Input::flash();
                return redirect()->back()->withErrors($validator->errors());
            }
        } else {
            $lead->deleteLeadsToUssers();
        }
        //validamos si hubo cambio de status
        if ($request->last_status!=$request->id_status){
            $hoy = date('Y-m-d H:i');
            $leadstatus = new lead_status;
            $leadstatus->id_lead =  $lead->id;
            $leadstatus->id_status =  $request->id_status;
            $leadstatus->date_change =  $hoy;
            $leadstatus->id_user =  $user->id;
            $leadstatus->save();       
        }
        return redirect()->route('t01_leads.index')->with('success','Registro actualizado satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Lead  $lead
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $name_bd = session('name_bd');
        Config::set('database.connections.bdcnxtemp', array(
            'driver'    => 'mysql',
            'host'      => 'localhost',
            'database'  => $name_bd,
            'username'  => 'crm_zwinny',
            'password'  => '2018gdl',
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => '',
        ));

        DB::setDefaultConnection('bdcnxtemp');
        $lead = new T01_lead;
        $lead = T01_lead::find($id);
        $lead->setConnection('bdcnxtemp');
        $lead->delete();

        return back()->with('info','Lead eliminado con éxito');
    }

     /**
     * Display the specified resource.
     *
     * @param  \App\Lead  $lead
     * @return \Illuminate\Http\Response
     */
    public function showBranchName($idBranche)
    {
        $branche = T01m01_brancheslead::findOrFail($idBranche)->name;
        return $branche;
    }

    public function showSourceName($idSource)
    {
        $source = T01m02_sourceslead::findOrFail($idSource)->name;
        return $source;
    }

    public function showStatusName($idStatus)
    {
        $status = T01m10_statuslead::findOrFail($idStatus)->name;
        return $status;
    }
    
    public function export()
    {
        $name_bd = session('name_bd');
        Config::set('database.connections.bdcnxtemp', array(
            'driver'    => 'mysql',
            'host'      => 'localhost',
            'database'  => $name_bd,
            'username'  => 'crm_zwinny',
            'password'  => '2018gdl',
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => '',
        ));

        DB::setDefaultConnection('bdcnxtemp');
        $lead = new T01_lead;
        $lead->setConnection('bdcnxtemp');
        /** Fuente de Datos Eloquent */
        $data = T01_lead::all();
        $fecha_hoy = date('dmY');
        $nombre = "crm_zwinny_leads_".$fecha_hoy;
        /** Creamos nuestro archivo Excel */
        Excel::create($nombre, function ($excel) use ($data) {

            /** Creamos una hoja */
            $excel->sheet('Leads', function ($sheet) use ($data) {
                /**
                 * Insertamos los datos en la hoja con el método with/fromArray
                 * Parametros: (
                 * Datos,
                 * Valores del encabezado de la columna,
                 * Celda de Inicio,
                 * Comparación estricta de los valores del encabezado
                 * Impresión de los encabezados
                 * )*/
                $sheet->with($data, null, 'A1', false, false);
            });

            /** Descargamos nuestro archivo pasandole la extensión deseada (xls, xlsx) */
        })->download('xlsx');
        
        return redirect()->route('t01_leads.index')->with('success','Exportación realizada satisfactoriamente');
    }

       
    public function import(Request $request)
    {
        $data = $request->all();
        $input = Input::all();
        $file = $_FILES['file_import']['name'];
         $uploadedFile = '';
    
        $fileName = time().'_'.$file;
        $sourcePath = $_FILES['file_import']['tmp_name'];
        $targetPath = "storage/".$fileName;
            if(move_uploaded_file($sourcePath,$targetPath)){
                $uploadedFile = $fileName;
            }
            return Response::json(array('errors' => 'listo'));
    }//function import

    /**
     * Display the specified resource.
     *
     * @param  \App\Tenant  $tenant
     * @return \Illuminate\Http\Response
     */
    public function listStatusLeads()
    {
        $name_bd = session('name_bd');
        Config::set('database.connections.bdcnxtemp', array(
            'driver'    => 'mysql',
            'host'      => 'localhost',
            'database'  => $name_bd,
            'username'  => 'crm_zwinny',
            'password'  => '2018gdl',
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => '',
        ));

        DB::setDefaultConnection('bdcnxtemp');
        $listStatus = T01m10_statuslead::all();
        return response()->json($listStatus);
    }//function listStatus

    /**
     * Display the specified resource.
     *
     * @param  \App\Tenant  $tenant
     * @return \Illuminate\Http\Response
     */
    public function listSourcesLeads()
    {
        $name_bd = session('name_bd');
        Config::set('database.connections.bdcnxtemp', array(
            'driver'    => 'mysql',
            'host'      => 'localhost',
            'database'  => $name_bd,
            'username'  => 'crm_zwinny',
            'password'  => '2018gdl',
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => '',
        ));

        DB::setDefaultConnection('bdcnxtemp');
        $listSources = T01m02_sourceslead::all();
        return response()->json($listSources);
    }//function listStatus
}
