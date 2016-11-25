<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Question;
use App\Tag;

class AdminController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $questions=Question::all();
        $tags=Tag::all();

        return view('admin.index',compact('questions','tags'));
    }
}
