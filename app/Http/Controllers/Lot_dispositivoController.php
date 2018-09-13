<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lot_dispositivo;
use App\Lot_tipo_dispositivo;
use App\Lot_subtipo_dispositivo;
use App\Lot_dispositivos_tenant;

class Lot_dispositivoController extends Controller
{
    protected $rules =
    [
        'id_name' => 'bail|required|min:2|max:250',
        'id_tipo' => 'bail|required',
        'id_subtipo' => 'bail|required',
        'date_up' => 'nullable|date',
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
        $devices = Lot_dispositivo::paginate();
        //dd($leads);
        //traemos los count por status
        $counts[0] = count($devices);
        //asignados
        $hoy = date('Y-m-d');
        $counts[1] = Lot_dispositivos_tenant::where('date_down','>', $hoy)->count();
        //$counts[1] = Lot_dispositivo::where('id_status', 1)->count();
        
        
        return view('devices.index', compact('devices', 'counts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //buscar los tipos de dispositivos
        $listTypes = Lot_tipo_dispositivo::all();
        return view('devices.create', compact('listTypes'));

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
        //$input = Input::all();
        //$validator = Validator::make(Input::all(), $this->rules);
       
        $dispo = Lot_dispositivo::create($data);
        
        return redirect()->route('devices.index')->with('success','Registro creado satisfactoriamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        //buscamos el dispositivo a editar
        $device = Lot_dispositivo::findOrFail($id);
        
        return view('devices.show', compact('device'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //buscamos el dispositivo a editar
        $device = Lot_dispositivo::findOrFail($id);
        //buscamos los tipos de disp
        $listTypes = Lot_tipo_dispositivo::all();
        //buscamos los subtipos de disp segun el id
        $listSubtypes = Lot_subtipo_dispositivo::where('id_tipo','=',$device->id_tipo)
        ->orderBy('name', 'asc')
               ->get();
        
        return view('devices.edit', compact('device', 'listTypes', 'listSubtypes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        
        
        //buscamos el dispositivo a editar
        $device = Lot_dispositivo::findOrFail($id)->update($data);
        
        return redirect()->route('devices.index')->with('success','Registro actualizado satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $device = Lot_dispositivo::findOrFail($id);
        //verificamos si está vigente en algún inquilino
        $disp_tenants = Lot_dispositivos_tenant::where('id_dispositivo', $id)->get();
        //$disp_tenants = $device->haveTenants()->get();
        //dd($disp_tenants);
        if (count($disp_tenants)>0){
            //dd("tiene");
            return redirect()->route('devices.index')->with('error','El dispositivo está relacionado al menos a un inquilino');
        } else {
            $device->delete();
            return redirect()->route('devices.index')->with('success','Registro eliminado satisfactoriamente');
        }
        
    }

    /**
     * Display the specified resource: list of subtypes for an type
     *
     * @param  $id_type
     * @return \Illuminate\Http\Response
     */
    public function listSubtypes($id_type)
    {
        $listSubtypes = lot_subtipo_dispositivo::where('id_tipo','=',$id_type)
        ->orderBy('name', 'asc')
               ->get();
        //dd($listResults);
        return response()->json($listSubtypes);
    }

    public function showTypeName($id)
    {
        $type = Lot_tipo_dispositivo::findOrFail($id)->name;
        return $type;
    }

    public function showSubtypeName($id)
    {
        $subtype = Lot_subtipo_dispositivo::findOrFail($id)->name;
        return $subtype;
    }

    public function import(Request $request)
    {
        
        $data = $request->all();
        $input = Input::all();
        $filename = $_FILES['file_import']['name'];
        $uploadedFile = '';
        $id_tipo = $_POST['id_tipo'];
        $id_subtipo = $_POST['id_subtipo'];      
        

        if(isset($_FILES['file_import']['name'])) {
            //return Response::json($filename);
            $arr_file = explode('.', $_FILES['file_import']['name']);
            $extension = end($arr_file);
            if('csv' == $extension) {
                $reader = new Csv();
            } else {
                $reader = new Xlsx();
            }
            $spreadsheet = $reader->load($_FILES['file_import']['tmp_name']);

            $sheetData = $spreadsheet->getActiveSheet()->toArray();
            //iniciamos transacción para ver que no ocurre ningún error en la insersión
            DB::beginTransaction();
            try {
                //recorremos las filas
                for ($i=1;$i<count($sheetData);$i++){
                //colocamos cada registro en un arreglo
                $dispo = [
                    'name' => $sheetData[$i][0],
                    'id_tipo' => $id_tipo,
                    'id_subtipo' => $id_subtipo,
                    'id_kontaktTag'    => $sheetData[$i][1],
                    'UUDD' => $sheetData[$i][2],
                    'date_up'       => $sheetData[$i][4],
                    'date_down'           => $sheetData[$i][4],
                    ];

                    //insertamos el registro en la bd
                    $result = Lot_dispositivo::insert($dispo); 
                }//for
                
                DB::commit();
                $success = true;
            } catch (\Exception $e) {
                $success = false;
                $error = $e->getMessage();
                DB::rollback();
                return Response::json(array('errors' => [$error]));
            }

            if ($success) {
                $mensaje="Importación realizada con éxito";
                return response()->json(array('mnsj' => ['Archivo importado con éxito.']));
            } 
            //print_r($sheetData);
        }//if file
            
    }//function import
}//fin clase
