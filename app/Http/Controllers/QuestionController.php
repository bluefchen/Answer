<?php

namespace App\Http\Controllers;

use App\Question;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Tag;
use Parsedown;

class QuestionController extends Controller
{


    /**
     * QuestionController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tag_list = Tag::lists('name', 'id')->toArray();
        return view('admin.question.create', compact('tag_list'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $question = Question::create($request->except(['tag_list']));
        $tags=$request->input('tag_list');
        if(is_null($tags))
            $tags[]=1;
        $question->tags()->sync($tags);
        flash()->success("问题发布成功");
        return redirect('/admin');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

        $question = Question::findorFail($id);
        $options = $question->options;

        $parsedown = new Parsedown();
        $tags = $question->tags->lists('name');
        return view('admin.question.show', compact('question', 'tags', 'parsedown'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {




        $question = Question::findOrFail($id);
        $tag_list = Tag::lists('name', 'id')->toArray();
//
//        $tag_list2=;
//        dd($tag_list2);
        $tag = $question->tags()->lists('id')->toArray();
        return view('admin.question.edit', compact('question', 'tag_list', 'tag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {


        $question = Question::findOrFail($id);
        $question->update($request->except(['tags']));
        $tags=$request->input('tag_list');
        if(is_null($tags))
            $tags[]=1;
        $question->tags()->sync($tags);
        flash()->success("问题修改成功");
        return redirect('/admin');
    }


    /**
     * @param Request $request
     * @return $this
     */
    public function delete(Request $request)
    {

        $questionids = $request->get("question_id");
        foreach ($questionids as $id) {
            Question::find($id)->delete();
        }
        flash()->success("问题删除成功");
        return redirect()->back()->withInput()->withErrors('删除成功！');
    }


    public function prevshow($id)
    {

        $question_ids = Question::lists('id')->toArray();
        $key = array_search($id, $question_ids);
        if ($key != 0 && $key != false) {
            $key--;
            return redirect("/admin/question/$question_ids[$key]");
        } else {
            flash()->success("已经是第一题");
            return redirect()->back();
        }


    }

    public function nextshow($id)
    {


        $question_ids = Question::lists('id')->toArray();
        $len = count($question_ids);
        $key = array_search($id, $question_ids);

        if ($key != $len - 1 && $key !== false) {
            $key++;
            return redirect("/admin/question/$question_ids[$key]");
        } else {
            flash()->success("已经是最后一题");
            return redirect()->back();
        }

    }

}
