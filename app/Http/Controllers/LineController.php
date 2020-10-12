<?php

namespace App\Http\Controllers;

use App\Models\Siteline;
use Illuminate\Http\Request;

class LineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $lines = Siteline::all();
    
        return view('lines.index',compact('lines'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('lines.create');
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
            'domain' => 'required',
            'site' => 'required',
            'line' => 'required',
            'rate' => 'required',
        ]);
    
        Siteline::create($request->all());
     
        return redirect()->route('lines.index')
                        ->with('success','Line created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Line  $line
     * @return \Illuminate\Http\Response
     */
    public function show(Siteline $line)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Line  $line
     * @return \Illuminate\Http\Response
     */
    public function edit(Siteline $line)
    {
        //
        return view('lines.edit',compact('line'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Line  $line
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Siteline $line)
    {
        //
        $request->validate([
            'domain' => 'required',
            'site' => 'required',
            'line' => 'required',
            'rate' => 'required',
        ]);
    
        $line->update($request->all());
    
        return redirect()->route('lines.index')
                        ->with('success','Line updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Line  $line
     * @return \Illuminate\Http\Response
     */
    public function destroy(Siteline $line)
    {
        //
        $line->delete();
    
        return redirect()->route('lines.index')
                        ->with('success','Line deleted successfully');
    }
}
