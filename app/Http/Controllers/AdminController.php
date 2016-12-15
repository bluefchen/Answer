<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Question;
use App\Tag;

class AdminController extends Controller
{
    /**
     * AdminController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
        
    }

    /**
     * 
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {



        $sidearr=[['1'],['0',['0','0']]];
        return view('admin.layout2',compact('sidearr'));
    }
}
