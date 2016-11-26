@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>管理员权限</h1>
        <div class="row">
            <div class="col-md-7 ">
                <div class="row">
                    <h2>
                        &nbsp;
                        题目列表
                        <a href="/admin/question/create" class="btn btn-lg" style="padding:0px 4px;font-size:40px">
                            <span class="glyphicon glyphicon-plus"
                                  style="position: absolute;top:40px; left: 260px;right: 0px;"></span>
                        </a>
                    </h2>
                </div>
                <div class="container col-md-12">
                    <form method="POST" action="/admin/question/delete" accept-charset="UTF-8" class="form-horizontal">
                        {!! csrf_field() !!}
                        <div class="form-group">
                            @foreach($questions as $question)
                                <label class="checkbox ">
                                    <input type="checkbox" data-toggle="checkbox" value={{$question->id}} name="question_id[]">
                                    <h4>
                                        <a href="/admin/question/{{$question->id}}">
                                            <strong>{{$question->id}}</strong>
                                            &nbsp;
                                            {{substr($question->title,0,30)}}
                                            @if(strlen($question->title)>50)
                                                ...
                                            @endif
                                            <a href="/admin/question/{{$question->id}}/edit" class="btn btn-sm"
                                               style="padding:0px 4px;font-size:20px;">
                                                <span class="glyphicon glyphicon-pencil "
                                                      style="position: absolute;OVERFLOW: auto; CURSOR: default;left: 260px;right: 0px;"></span>
                                            </a>
                                        </a>
                                    </h4>

                                </label>

                            @endforeach
                        </div>
                        <button type="submit" class="btn btn-lg btn-primary">Delete</button>
                    </form>
                </div>

            </div>


            <div class="col-md-4">
                <div class="row">
                    <h2>
                        &nbsp;
                        Tag列表
                        <a href="/admin/tag/create" class="btn btn-lg" style="padding:0px 4px;font-size:40px">
                            <span class="glyphicon glyphicon-plus "
                                  style="position: absolute;top:40px; left: 300px;right: 0px;"></span>
                        </a>
                    </h2>
                </div>

                <div class="col-md-12 ">
                    <form method="POST" action="/admin/tag/delete" accept-charset="UTF-8" class="form-horizontal">
                        {!! csrf_field() !!}
                        <div class="form-group">
                            @foreach($tags as $tag)
                                <label class="checkbox ">
                                    <input type="checkbox" data-toggle="checkbox" name="tag_id[]" value={{$tag->id}}>
                                    <h4>
                                        {{$tag->name}}

                                        <a href="/admin/tag/{{$tag->id}}/edit" class="btn btn-sm"
                                           style="padding:0px 4px;font-size:20px;">
                                            <span class="glyphicon glyphicon-pencil "
                                                  style="position: absolute;OVERFLOW: auto; CURSOR: default;left: 300px;right: 0px;"></span>
                                        </a>
                                    </h4>
                                </label>
                            @endforeach
                        </div>
                        <button type="submit" class="btn btn-lg btn-primary">Delete</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection