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

        $points=array_column($tests,'point');//由于图表解析的特殊性，必须要转为整型
        foreach ($points as $point)         //todo :直接将数据库中的point转为整型，会让操作非常方便。查看migrate有没有改变字段类型的方法
            $p[]=intval($point);
        $points=json_encode($p);
        return view('history.index',compact('tests','points'));
        
    }

}
