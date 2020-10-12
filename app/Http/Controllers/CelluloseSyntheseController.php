<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class CelluloseSyntheseController extends Controller
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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //$month = array('Jan', 'Feb', 'Mar', 'Apr', 'May');
        //$data  = array(1, 2, 3, 4, 5);
        //$dataCV = DB::table('collectes')->where('factory', 'BEAUVAIS')->where('line', 'CV')->orderByRaw('date ASC')->pluck('rate');
        //$monthCV = DB::table('collectes')->where('factory', 'BEAUVAIS')->where('line', 'CV')->orderByRaw('date ASC')->pluck('date');
        //$targetrate = json_encode(array(5,5,5,5,5,5,5,5,5,5,5,5));

        $months = DB::table('breakdowns')->where([['site', '=', 'BVS'],['line', '=', 'CE']])->limit(12)->orderByRaw('date DESC')->pluck('date')->reverse()->values();

        $workBVS = collect();
        $breakBVS = collect();
        $rateBVS = collect();
        foreach ($months as $month) {
            $work = DB::table('breakdowns')->where([['site', '=', 'BVS'],['date', '=', $month]])->sum('work');
            $break = DB::table('breakdowns')->where([['site', '=', 'BVS'],['date', '=', $month]])->sum('break');
            $rate = ($work == 0) ? 0 : $break/$work*100;
            $workBVS->push($work);
            $breakBVS->push($break);
            $rateBVS->push($rate);
        }
        $workSHL = collect();
        $breakSHL = collect();
        $rateSHL = collect();
        foreach ($months as $month) {
            $work = DB::table('breakdowns')->where([['site', '=', 'SHL'],['date', '=', $month]])->sum('work');
            $break = DB::table('breakdowns')->where([['site', '=', 'SHL'],['date', '=', $month]])->sum('break');
            $rate = ($work == 0) ? 0 : $break/$work*100;          
            $workSHL->push($work);
            $breakSHL->push($break);
            $rateSHL->push($rate);
        }
        $workMLG = collect();
        $breakMLG = collect();
        $rateMLG = collect();
        foreach ($months as $month) {
            $work = DB::table('breakdowns')->where([['site', '=', 'MLG'],['date', '=', $month]])->sum('work');
            $break = DB::table('breakdowns')->where([['site', '=', 'MLG'],['date', '=', $month]])->sum('break');
            $rate = ($work == 0) ? 0 : $break/$work*100;
            $workMLG->push($work);
            $breakMLG->push($break);
            $rateMLG->push($rate);
        }

        return view('synthcellulose',compact('months','workBVS','workSHL','workMLG','breakBVS','breakSHL','breakMLG','rateBVS','rateSHL','rateMLG'));



    }
}
