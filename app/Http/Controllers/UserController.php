<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Tenant;
use Caffeinated\Shinobi\Models\Role;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    protected $rules =
    [
        'name' => 'required',
        'email' => 'required|email',
        'tenant_id' => 'required|integer|not_in:0',
        'user_temp' => 'required',
        'password' => 'required',
    ];

    public function index()
    {
        $users = User::paginate();
        return view('users.index', compact('users'));
    }

   
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $User
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::get();
        $tenants = Tenant::all();
        $array_ten = array();
        foreach ($tenants as $tenant) {
            $array_ten[$tenant->id]=$tenant->id."-".$tenant->name;
        }
        return view('users.create', compact('roles','array_ten','tenants'));
    }

    /**
     * Store the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param    $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = Input::all();
        //validar datos
        //dd($this->rules);
        $this->validate($request,$this->rules);
        $this->validate($request,['email' => 'unique:users,email']);
        $validator = Validator::make(Input::all(), $this->rules);
        //encriptar la contraseña
        $data = $request->all();
        if ($request->roles){
            //dd($data);
            $data['password'] = bcrypt($data['password']);
            //actuallizar usuario
            $user = User::create($data);

            //actualizar roles
            $user->roles()->sync($request->get('roles'));
            return redirect()->route('users.index')
            ->with('success', 'Registro creado satisfactoriamente');
        } else {
            $validator->errors()->add('Roles', 'El Usuario debe tener al menos 1 rol asignado');
            Input::flash();
            return redirect()->back()->withErrors($validator->errors());
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $User
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $roles = Role::get();
        $tenant = Tenant::find($user->tenant_id);
        //dd($name);
        return view('users.show', compact('user','tenant','roles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $User
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $roles = Role::get();
        $tenants = Tenant::all();
        $array_ten = array();
        foreach ($tenants as $tenant) {
            $array_ten[$tenant->id]=$tenant->id."-".$tenant->name;
        }

        //buscamos el tenant
        //$tenant = Tenant::find($user->tenant_id);
        //dd($user);
        return view('users.edit', compact('user','roles','array_ten','tenants'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $User
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $input = Input::all();
        //validar datos
        //dd($this->rules);
        $this->validate($request,$this->rules);
        $this->validate($request,['email' => 'unique:users,email,'.$user->id]);
        $validator = Validator::make(Input::all(), $this->rules);
        //encriptar la contraseña
        $data = $request->all();
        if ($request->roles){
            //dd($data);
            $data['password'] = bcrypt($data['password']);
            //actuallizar usuario
            $user->update($data);

            //actualizar roles
            $user->roles()->sync($request->get('roles'));
            return redirect()->route('users.index')
            ->with('success', 'Registro actualizado satisfactoriamente');
        } else {
            $validator->errors()->add('Roles', 'El Usuario debe tener al menos 1 rol asignado');
            Input::flash();
            return redirect()->back()->withErrors($validator->errors());
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $User
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return back()->with('success','User eliminado con éxito');
    }

    public function verificaClaveExterna($email, $clave){
        //recibimos el email y la clave encriptada
        //buscamos el usuario por su  mail
        $userExt = new User;
        //$claveEncr = $userExt->encriptar($clave);
        //$emailEncr = $userExt->encriptar($email);
        try{
            $emailDes=$userExt->desencriptar($email);
            $userExt = User::where('email', $emailDes)->first();
            if ($userExt){
                $claveDes = $userExt->desencriptar($clave);
                if (Hash::check($claveDes, $userExt->password)) {
                    // The passwords match...
                    $resp['respuesta']= $userExt->encriptar('ok');
                } else {
                    $resp['respuesta'] = $userExt->encriptar('nok2');
                }
            } else {
                 $userExt = new User;
                $resp['respuesta'] = $userExt->encriptar('nok1');
            }
        }catch (Exception $e){
            $resp['respuesta'] = $userExt->encriptar('error');
        }
        return response()->json($resp);
    }
}
