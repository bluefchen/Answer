@extends('layouts.app')

@section('content')

    <div class="container">
        <h1>管理员权限</h1>
        <div class="row">
            <div class="col-md-7 ">
                <div class="row">
                    <h2>
                        <a href="/admin/article/create" class="btn btn-lg" style="padding:0px 4px;font-size:40px">
                            <span class="glyphicon glyphicon-plus "></span>
                        </a>
                        &nbsp
                        题目列表
                    </h2>
                </div>
                <div class="container col-md-12">
                    <form role="form">
                        <div class="form-group">
                            @foreach($questions as $question)
                                <label class="checkbox ">
                                    <input type="checkbox" data-toggle="checkbox" value={{$question->id}}>
                                    <h4>
                                        <a href="/admin/article/{{$question->id}}">
                                            <strong>{{$question->id}}</strong>
                                            &nbsp;
                                            {{substr($question->title,0,50)}}
                                            @if(strlen($question->title)>50)
                                                ...
                                            @endif
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
                        <a href="/admin/tag/create" class="btn btn-lg" style="padding:0px 4px;font-size:40px">
                            <span class="glyphicon glyphicon-plus "></span>
                        </a>
                        &nbsp
                        Tag列表
                    </h2>
                </div>

                <div class="col-md-12 ">
                    <form role="form">
                        <div class="form-group">
                            @foreach($tags as $tag)
                                <label class="checkbox ">
                                    <input type="checkbox" data-toggle="checkbox" value={{$tag->id}}>
                                    <h4>
                                        {{$tag->name}}
                                        @for($i=0;$i<10-strlen($tag->name);$i++)
                                            &emsp;
                                        @endfor
                                        <a href="/admin/tag/{{$tag->id}}/edit" class="btn btn-sm"
                                           style="padding:0px 4px;font-size:20px">
                                            <span class="glyphicon glyphicon-pencil "></span>
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