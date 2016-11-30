<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Question;
use App\Test;

class TestController extends Controller
{

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
     * 点击确认答题后的操作，确定试卷上的题目，模型链接等。
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function prepare(Request $request)
    {
        //获取表单中提交的答题数目以及测试方式。
        $testType=$request->get('testtype');
        $totalNumber=$request->get('totalnumber');
        //得到所有要答的题目的id号。
        $questionids=Test::generateQuestion($testType,$totalNumber);

        $test=new Test;
        $test->user_id=$request->user()->id;
        $test->testtype=$testType;
        $test->totalnumber=$totalNumber;
        $test->save();
        foreach($questionids as $q_id)
        {
            $question=Question::find($q_id);
            $test->questions()->attach($question);
        }
        $test->questionids=json_encode($questionids);
        $test->save();
        return redirect("/test/$test->id/1");
    }


    /**
     * 显示每一道题
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Request $request,$test_id,$id)
    {
        $test=Test::find($test_id);
        $question_ids=json_decode($test->questionids,true);

        $question = Question::find($question_ids[$id]);
        return view('test.show', array_merge($question->toArray(), ['total' => ($test->totalnumber),'question_id'=>$id,'test_id'=>$test_id]));
    }

    /**
     * 点击next，保存当前结果，显示下一题
     *
     * @param Request $request
     * @param $test_id
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function next(Request $request, $test_id,$id)
    {

        $test=Test::find($test_id);
        $questionids=json_decode($test->questionids,true);
        $totalNumber=$test->totalnumber;
        $useranswer=json_decode($test->useranswer,true);

        $useranswer[$questionids[$id]]=$request->get('answer');
        $test->useranswer=json_encode($useranswer);
        $test->save();
        if ($id == $totalNumber)   //达到最后一条了
            return redirect("test/$test_id/judge"); // 转到判断页面
        else {
            $id = $id + 1;
            return redirect("test/$test_id/$id");
        }
    }

    /**
     * 判断答题结果，计算分数并储存
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function judge(Request $request,$test_id)
    {
        $test=Test::find($test_id);
        $total = $test->totalnumber;
        $referanswer=$test->questions()->lists('answer','id')->toArray();
        $useranswer=json_decode($test->useranswer,true);
        $questionids=json_decode($test->questionids,true);

        $num = 0;
        foreach ($questionids as $q_id) {

            if ($useranswer[$q_id] == $referanswer[$q_id]) {
                $num++;
                $answer[] = 1;

            } else if ($useranswer[$q_id] == null)
                $answer[] = -1;
            else
                $answer[] = 0;
        }
        $point=(100/$total)*$num;
        $test->point=$point;
        $test->save();
        return view('test.judge', compact('num', 'total', 'answer','point','test_id'));
    }


    /**
     * 用于显示所有的错题
     *
     * @param Request $request
     * @param $test_id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function detail(Request $request,$test_id)
    {
        $test=Test::find($test_id);
        $total=$test->totalnumber;
        $questions=$test->questions->toArray();
        $useranswer=json_decode($test->useranswer,true);
        $questionids=json_decode($test->questionids,true);
        return view('test.detail',compact('total','questions','useranswer','questionids','test_id'));
        
    }


    /**
     * 用于显示所有的题目，包括正确的题目与错误的题目
     *
     * @param Request $request
     * @param $test_id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function allDetail(Request $request,$test_id)
    {
        $test=Test::find($test_id);
        $total=$test->totalnumber;
        $questions=$test->questions->toArray();
        $useranswer=json_decode($test->useranswer,true);
        $questionids=json_decode($test->questionids,true);
        return view('test.alldetail',compact('total','questions','useranswer','questionids','test_id'));

    }


}
