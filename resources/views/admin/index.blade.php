@extends('layouts.app')

@section('content')

    <div class="container">
        <h1>管理员权限</h1>
        <div class="row">
            <div class="col-md-7 ">
                <div class="row">
                    <h2>题目列表 &nbsp <button type="submit" class="btn btn-lg btn-info">Add</button></h2>

                </div>


                <div class="container col-md-12">
                    <form role="form">
                        <div class="form-group">
                            @foreach($questions as $question)
                                <label class="checkbox ">
                                    <input type="checkbox" data-toggle="checkbox" value={{$question->id}}>
                                    <h4>
                                        <a href="/admin/articles/{{$question->id}}">
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
                <h2>Tag列表 <button type="submit" class="btn btn-lg btn-info">Add</button></h2>
                <div class="col-md-12 ">
                    <form role="form">
                        <div class="form-group">
                            @foreach($tags as $tag)
                                <label class="checkbox ">
                                    <input type="checkbox" data-toggle="checkbox" value={{$tag->id}}>
                                    <h4>
                                        <a href="/admin/tags/{{$tag->id}}">
                                            {{$tag->name}}
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