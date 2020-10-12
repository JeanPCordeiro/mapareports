<?php

namespace App\Http\Controllers;

use App\Models\Siteline;
use Illuminate\Http\Request;
use DB;
use Log;

class GraphBreakController extends Controller
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
    
        return view('graphbreaks.index',compact('lines'));
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
     * @param  \App\Models\Siteline  $siteline
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

        $site = DB::table('sitelines')->where([['id', '=', $id]])->value('site');
        $line = DB::table('sitelines')->where([['id', '=', $id]])->value('line');

        $target = DB::table('sitelines')->where([['site', '=', $site],['line', '=', $line]])->pluck('rate')->values();
        $targetrate = json_encode(array($target,$target,$target,$target,$target,$target,$target,$target,$target,$target,$target,$target));

        $data = DB::table('breakdowns')->where([['site', '=', $site],['line', '=', $line]])->limit(12)->orderByRaw('date DESC')->pluck('rate')->reverse()->values();
        $work = DB::table('breakdowns')->where([['site', '=', $site],['line', '=', $line]])->limit(12)->orderByRaw('date DESC')->pluck('work')->reverse()->values();
        $break = DB::table('breakdowns')->where([['site', '=', $site],['line', '=', $line]])->limit(12)->orderByRaw('date DESC')->pluck('break')->reverse()->values();
        $month = DB::table('breakdowns')->where([['site', '=', $site],['line', '=', $line]])->limit(12)->orderByRaw('date DESC')->pluck('date')->reverse()->values();
        $dataYTD = DB::table('breakdowns')->where([['site', '=', $site],['line', '=', $line]])->limit(12)->orderByRaw('date DESC')->pluck('ytd')->reverse()->values();
        

        return view('graphbreaks.show',compact('site','line','targetrate','data','dataYTD','month','work','break','target'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Siteline  $siteline
     * @return \Illuminate\Http\Response
     */
    public function edit(Siteline $siteline)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Siteline  $siteline
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Siteline $siteline)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Siteline  $siteline
     * @return \Illuminate\Http\Response
     */
    public function destroy(Siteline $siteline)
    {
        //
    }
}
