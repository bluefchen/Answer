<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class HistoryController extends Controller
{
    //
    /**
     * HistoryController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index(Request $request)
    {
        $user=$request->user();
        $tests=$user->tests()->where('point','>',-1)->get()->toArray();//只选取完整的测试。
    
        return view('history.index',compact('tests'));
        
    }

}
