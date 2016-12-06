@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="jumbotron">

            <div class="progress progress-striped active" style="height: 25px" >
                <div class="progress-bar " role="progressbar"
                    aria-valuemin="0" aria-valuemax="100"
                     style="width: {{round(($question_id-1)/$total*100).'%'}};">
                    <span class="sr-only"></span>
                </div>
            </div>

            <h1>第{{$question_id}}题</h1>
            <p>{!! $parsedown->text($title)!!}</p>


            {!! Form::open(['url' => "/test/$test_id/next/$question_id"]) !!}

                <div class="form-group">
                    @foreach(explode("\r\n",$options) as $option)
                        <label class="radio ">
                            <input type="radio" data-toggle="radio" name="answer"  value={{substr($option,0,1)}} data-radiocheck-toggle="radio" >
                            <p class="lead">{!! $option!!}</p>
                        </label>
                    @endforeach

                </div>
                <button type="submit" class="btn btn-sm btn-primary" name="submit" >
                    @if($question_id!=$total)
                        NEXT
                        @else
                        SUBMIT
                        @endif
                </button>
            {!! Form::close() !!}



        </div>
    </div>
@endsection