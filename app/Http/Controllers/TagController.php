<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Tag;

class TagController extends Controller
{


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
        //
        return view('admin.tag.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, ['name' => 'required|unique:tags']);
        Tag::create($request->all());
        flash()->success("Tag新建成功");
        return redirect('admin');

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
        $tag = Tag::find($id);
        return view('admin.tag.edit', compact('tag'));
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
        //
        $this->validate($request, ['name' => 'required|unique:tags|max:15']);
        $tag = Tag::find($id);
        $tag->name = $request->get("name");

        if ($tag->save()) {
            flash()->success("Tag更新成功");
            return redirect('/admin');//编辑成功返回article页面
        } else
            return redirect()->back()->withInput()->withErrors('更新失败！');//失败则返回上一个页面，保留用户信息
    }

    /**
     * @param Request $request
     * @return $this
     */
    public function delete(Request $request)
    {
        $tagids = $request->get("tag_id");
        foreach ($tagids as $id) {
            Tag::find($id)->delete();
        }
        flash()->success("Tag删除成功");
        return redirect()->back()->withInput()->withErrors('删除成功！');
    }
}
