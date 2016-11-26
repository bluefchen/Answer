@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <h2>

                    ID: {{$question->id}}
                    <a class="btn btn-lg" href="/admin/question/{{$question->id}}/edit"
                       style="padding:0px 4px;font-size:40px">
                        <span class="glyphicon glyphicon-pencil"
                              style="position: absolute;top:40px; right: 0px;"></span>
                    </a>
                </h2>
                @if(count($tags)!=0)
                    <div class="row">
                        <div class="col-md-4">
                            <h2 class="text-center">Tags:</h2>
                        </div>
                        <div class="col-md-8">
                            <p class="lead" style="position: absolute;OVERFLOW: auto; CURSOR: default;top:30px;">
                                @foreach($tags as $tag)
                                    {{$tag}}.
                                    &nbsp;
                                @endforeach
                            </p>
                        </div>
                    </div>
                @endif
                <div class="row">
                    <div class="col-md-4">
                        <h2 class="text-center">Title:</h2>
                    </div>
                    <div class="col-md-8">
                        <p class="lead " style="position: absolute;OVERFLOW: auto; CURSOR: default;top:42px;">
                            {{$question->title}}
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <h3 class="text-center">A:</h3>
                    </div>
                    <div class="col-md-8">
                        <p class="lead" style="position: absolute;OVERFLOW: auto; CURSOR: default;top:30px;">
                            {{$question->optionA}}
                        </p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <h3 class="text-center">B:</h3>
                    </div>
                    <div class="col-md-8">
                        <p class="lead" style="position: absolute;OVERFLOW: auto; CURSOR: default;top:30px;">
                            {{$question->optionB}}
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <h3 class="text-center">C:</h3>
                    </div>
                    <div class="col-md-8">
                        <p class="lead" style="position: absolute;OVERFLOW: auto; CURSOR: default;top:30px;">
                            {{$question->optionC}}
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <h3 class="text-center">D:</h3>
                    </div>
                    <div class="col-md-8">
                        <p class="lead" style="position: absolute;OVERFLOW: auto; CURSOR: default;top:30px;">
                            {{$question->optionD}}
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <h3 class="text-center">答案:</h3>
                    </div>
                    <div class="col-md-8">
                        <p class="lead" style="position: absolute;OVERFLOW: auto; CURSOR: default;top:30px;">
                            {{$question->answer}}
                        </p>
                    </div>
                </div>


            </div>
        </div>
    </div>

@endsection