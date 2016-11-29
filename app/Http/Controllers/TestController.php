<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Question;

class TestController extends Controller
{
    //
    private $TotalNumber = 5;//设置答题总数

    /**
     * TestController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * show test.index
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('test.index');
    }

    /**
     * 显示每一道题
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $test = Question::find($id);
        return view('test.show', array_merge($test->toArray(), ['total' => ($this->TotalNumber)]));
    }

    /**
     * 点击next，保存当前结果，显示下一题
     *
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function next(Request $request, $id)
    {

        $test = Question::find($id);
        $test->useranswer = $request->get('answer');
        $test->save();
        if ($id == $this->TotalNumber)   //达到最后一条了
            return redirect('test/judge'); // 转到判断页面
        else {
            $id = $id + 1;
            return redirect("test/$id");
        }
    }

    /**
     * 判断答题结果
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function judge()
    {
        $total = $this->TotalNumber;
        $tests = Question::all();
        $num = 0;
        foreach ($tests as $test) {
            if ($test->answer == $test->useranswer) {
                $num++;
                $answer[] = 1;
                
            } else if ($test->useranswer == null)
                $answer[] = -1;
            else
                $answer[] = 0;

            $test->useranswer = null;
            $test->save();

        }
        return view('test.judge', compact('num', 'total', 'answer'));


    }


}
