<?php

namespace App\Http\Controllers;

use App\Models\Breakdown;
use Illuminate\Http\Request;
use DB;

class BreakdownController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //$breakdowns = Breakdown::all();

        $campaigndate = date("Y"); 
        $user = auth()->user();
        $factory = $user->factory;
        if ($user->level == 3) $campaigndate ="%";

        $breakdowns = DB::table('breakdowns')->where([['factory', 'like', $factory],['date', 'like', $campaigndate.'%']])->orderByRaw('date DESC')->get(); 

        return view('breakdowns.index',compact('breakdowns'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Breakdown  $breakdown
     * @return \Illuminate\Http\Response
     */
    public function show(Breakdown $breakdown)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Breakdown  $breakdown
     * @return \Illuminate\Http\Response
     */
    public function edit(Breakdown $breakdown)
    {
        //
        return view('breakdowns.edit',compact('breakdown'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Breakdown  $breakdown
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Breakdown $breakdown)
    {
        //
        $request->validate([
            'work' => 'required',
            'break' => 'required',
        ]);
    
        $work = (double) $request->input('work');
        $break = (double) $request->input('break');
        ($work ==0) ? $rate = 0 : $rate = (double) $break/$work*100;

        $request->merge([
            'rate' => $rate,
            'state' => 1,
        ]);
    
        $breakdown->update($request->all());

        return redirect()->route('breakdowns.index')
                        ->with('success','Breakdown updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Breakdown  $breakdown
     * @return \Illuminate\Http\Response
     */
    public function destroy(Breakdown $breakdown)
    {
        //
    }
}
