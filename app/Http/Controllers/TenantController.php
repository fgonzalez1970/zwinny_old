<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tenant;

class TenantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tenants = Tenant::paginate();
        return view('tenants.index', compact('tenants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tenants.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $lead = Tenant::create($request->all());

        return redirect()->route('tenants.edit', $tenant->id)
            ->with('info', 'Inquilino guardado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Lead  $tenant
     * @return \Illuminate\Http\Response
     */
    public function show(Tenant $tenant)
    {
         return view('tenants.show', compact('tenant'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\tenant  $tenant
     * @return \Illuminate\Http\Response
     */
    public function edit(Tenant $tenant)
    {
        return view('tenants.edit', compact('tenant'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\tenant  $tenant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tenant $tenant)
    {
        $tenant->update($request->all());

        return redirect()->route('tenants.edit', $tenant->id)
            ->with('info', 'Inquilino actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\tenant  $tenant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tenant $tenant)
    {
        $tenant->delete();

        return back()->with('info','Inquilino eliminado con éxito');
    }
}
