@extends('admin.layout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">

                <h2>

                    ID:
                    @if($next!=null)
                        <a class="btn btn-lg" href="{{url("/admin/question/".$next)}}"
                           style="padding:0px 4px;font-size:40px">
                        <span class="glyphicon glyphicon-arrow-left text-info"
                              style="position: relative; left: 10px;"></span>
                        </a>
                    @endif

                    &nbsp;
                    {{$question->id}}
                    @if($previous!=null)
                        <a class="btn btn-lg" href="{{url("/admin/question/".$previous)}}"
                           style="padding:0px 4px;font-size:40px">
                        <span class="glyphicon glyphicon-arrow-right text-warning"
                              style="position: relative; left: 20px"></span>
                        </a>
                    @endif


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
                            <p class="lead" style="position: absolute;OVERFLOW: auto; CURSOR: default;top:50px;">
                                @foreach($tags as $tag)
                                    {{$tag}}.
                                    &nbsp;
                                @endforeach
                            </p>
                        </div>
                    </div>
                @endif
                <div class="row" >
                    <div class="col-md-4">
                        <h2 class="text-center">Title:</h2>
                    </div>
                    <div class="col-md-8 " >
                        <p class="lead ">
                            {!! $parsedown->text($question->title) !!}
                        </p>

                    </div>

                </div>
                <p></p>
                @foreach(explode("\r\n",$question->options) as $option)
                    <div class="row">
                        <div class="col-md-4">
                            <h3 class="text-center">{{substr($option,0,2)}}</h3>
                        </div>
                        <div class="col-md-8">
                            <p class="lead" style="position: absolute;OVERFLOW: auto; CURSOR: default;top:30px;">
                                {{substr($option,2)}}
                            </p>
                        </div>
                    </div>

                @endforeach

                <div class="row">
                    <div class="col-md-4">
                        <h3 class="text-center">答案:</h3>
                    </div>
                    <div class="col-md-8">
                        <p class="lead" style="position: absolute;OVERFLOW: auto; CURSOR: default;top:30px;">
                            @if($question->qtype_id==2)
                                {{implode(", ",json_decode($question->answer))}}
                            @elseif($question->qtype_id==3)
                                @if($question->answer=='0')
                                    错
                                @else
                                    对
                                @endif
                            @elseif($question->qtype_id==4||$question->qtype_id==5)
                                {!! $parsedown->text($question->answer)!!}
                            @else
                            {{$question->answer}}
                            @endif
                        </p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <h3 class="text-center">解析:</h3>
                    </div>
                    <div class="col-md-8">
                        <p class="lead" style="position: absolute;OVERFLOW: auto; CURSOR: default;top:30px;">
                            {!! $parsedown->text($question->parse) !!}
                        </p>
                    </div>
                </div>




            </div>
        </div>
    </div>

@endsection