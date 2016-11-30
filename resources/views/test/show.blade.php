@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="jumbotron">
            <h1>第{{$question_id}}题</h1>
            <p>{!! nl2br($title)!!}</p>


            {!! Form::open(['url' => "/test/$test_id/next/$question_id"]) !!}

                <div class="form-group">
                    <label class="radio ">
                        <input type="radio" data-toggle="radio" name="answer"  value="A" data-radiocheck-toggle="radio" >
                        {{$optionA}}
                    </label>
                    <label class="radio">
                        <input type="radio" data-toggle="radio" name="answer"  value="B" data-radiocheck-toggle="radio">
                        {{$optionB}}
                    </label>
                    <label class="radio ">
                        <input type="radio" data-toggle="radio" name="answer"  value="C" data-radiocheck-toggle="radio">
                        {{$optionC}}
                    </label>
                    <label class="radio ">
                        <input type="radio" data-toggle="radio" name="answer"  value="D" data-radiocheck-toggle="radio">
                        {{$optionD}}
                    </label>

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