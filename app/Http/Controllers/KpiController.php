<?php

namespace App\Http\Controllers;

use App\Models\Kpi;
use Illuminate\Http\Request;

class KpiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $kpis = Kpi::all();
    
        return view('kpis.index',compact('kpis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('kpis.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'scope' => 'required',
            'item' => 'required',
            'unit' => 'required',
            'domain' => 'required',
            'site' => 'required',
        ]);
    
        Kpi::create($request->all());

        return redirect()->route('kpis.index')
                        ->with('success','Product created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kpi  $kpi
     * @return \Illuminate\Http\Response
     */
    public function show(Kpi $kpi)
    {
        //
        return view('kpis.show',compact('kpi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kpi  $kpi
     * @return \Illuminate\Http\Response
     */
    public function edit(Kpi $kpi)
    {
        //
        return view('kpis.edit',compact('kpi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kpi  $kpi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kpi $kpi)
    {
        //
        $request->validate([
            'scope' => 'required',
            'item' => 'required',
            'unit' => 'required',
            'domain' => 'required',
            'site' => 'required',
        ]);
    
        $kpi->update($request->all());
    
        return redirect()->route('kpis.index')
                        ->with('success','Kpi updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kpi  $kpi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kpi $kpi)
    {
        //
        $kpi->delete();
    
        return redirect()->route('kpis.index')
                        ->with('success','Kpi deleted successfully');
    }
}
