<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class CelluloseReportController extends Controller
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
    public function index($factory,$line)
    {
        //$month = array('Jan', 'Feb', 'Mar', 'Apr', 'May');
        //$data  = array(1, 2, 3, 4, 5);
        //$dataCV = DB::table('collectes')->where('factory', 'BEAUVAIS')->where('line', 'CV')->orderByRaw('date ASC')->pluck('rate');
        //$monthCV = DB::table('collectes')->where('factory', 'BEAUVAIS')->where('line', 'CV')->orderByRaw('date ASC')->pluck('date');
        //$targetrate = json_encode(array(5,5,5,5,5,5,5,5,5,5,5,5));

        $target = DB::table('lines')->where([['factory', '=', $factory],['line', '=', $line]])->pluck('rate')->values();
        //$targetrate = collect(array_fill(1,12,$target));
        $targetrate = json_encode(array($target,$target,$target,$target,$target,$target,$target,$target,$target,$target,$target,$target));

        $data = DB::table('collectes')->where([['factory', '=', $factory],['line', '=', $line]])->limit(12)->orderByRaw('date DESC')->pluck('rate')->reverse()->values();
        $work = DB::table('collectes')->where([['factory', '=', $factory],['line', '=', $line]])->limit(12)->orderByRaw('date DESC')->pluck('work')->reverse()->values();
        $break = DB::table('collectes')->where([['factory', '=', $factory],['line', '=', $line]])->limit(12)->orderByRaw('date DESC')->pluck('break')->reverse()->values();
        $month = DB::table('collectes')->where([['factory', '=', $factory],['line', '=', $line]])->limit(12)->orderByRaw('date DESC')->pluck('date')->reverse()->values();
        $dataYTD = DB::table('collectes')->where([['factory', '=', $factory],['line', '=', $line]])->limit(12)->orderByRaw('date DESC')->pluck('ytd')->reverse()->values();
        return view('cellulose-report',compact('factory','line','targetrate','data','dataYTD','month','work','break','target'));
    }
}
