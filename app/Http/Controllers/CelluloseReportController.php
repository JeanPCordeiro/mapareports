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
        $targetrate = json_encode(array(5,5,5,5,5,5,5,5,5,5,5,5));
        $data = DB::table('collectes')->where([['factory', '=', $factory],['line', '=', $line]])->limit(12)->orderByRaw('date ASC')->pluck('rate');
        $work = DB::table('collectes')->where([['factory', '=', $factory],['line', '=', $line]])->limit(12)->orderByRaw('date ASC')->pluck('work');
        $break = DB::table('collectes')->where([['factory', '=', $factory],['line', '=', $line]])->limit(12)->orderByRaw('date ASC')->pluck('break');
        $month = DB::table('collectes')->where([['factory', '=', $factory],['line', '=', $line]])->limit(12)->orderByRaw('date ASC')->pluck('date');
        $dataYTD = DB::table('collectes')->where([['factory', '=', $factory],['line', '=', $line]])->limit(12)->orderByRaw('date ASC')->pluck('ytd');
        return view('cellulose-report',compact('factory','line','targetrate','data','dataYTD','month','work','break'));
    }
}
