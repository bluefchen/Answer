<?php

namespace App\Http\Controllers;

use App\Question;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Tag;

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
        $tag_list = Tag::lists('name', 'id');
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
       // if (count($question->tags) != 0)
        $question->tags()->sync($request->input('tag_list'));
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
        $question = Question::find($id);
        $tags = $question->tags->lists('name');
        return view('admin.question.show', compact('question', 'tags'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $question = Question::findOrFail($id);
        $tag_list = Tag::lists('name', 'id');
        return view('admin.question.edit', compact('question', 'tag_list'));
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
        $question->tags()->sync($request->input('tag_list'));
        flash()->overlay("问题修改成功");
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

}
