<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class InputController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $campaigndate = date("Y"); 
        $user = auth()->user();
        $factory = $user->factory;

        if ($user->level == 3) $campaigndate ="%";

        $mycollectes = DB::table('collectes')->where([['factory', 'like', $factory],['date', 'like', $campaigndate.'%']])->orderByRaw('date DESC')->get(); 
        return view('input',compact('mycollectes'));
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $mycollectes = DB::table('collectes')->where('id', '=', $id)->get();
        return view('edit',compact('id','mycollectes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $work = $_POST['work'];
        $break = $_POST['break'];
        $id = $_POST['id'];

        $rate = $break/$work*100;

        $affected = DB::table('collectes')
              ->where('id',$id)
              ->update(['break' => $break]);
        $affected = DB::table('collectes')
              ->where('id',$id)
              ->update(['work' => $work]);
        $affected = DB::table('collectes')
              ->where('id',$id)
              ->update(['rate' => $rate]);
              $affected = DB::table('collectes')
              ->where('id',$id)
              ->update(['state' => 1]);

        $campaigndate = date("Y"); 
        $user = auth()->user();
        $factory = $user->factory;
        if ($user->level == 3) $campaigndate ="%";
        
        $mycollectes = DB::table('collectes')->where([['factory', 'like', $factory],['date', 'like', $campaigndate.'%']])->orderByRaw('date DESC')->get(); 
        return view('input',compact('mycollectes'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
