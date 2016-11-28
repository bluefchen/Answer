@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="jumbotron">
            <h1>第{{$id}}题</h1>
            <p>{!! nl2br($title)!!}</p>

            <form role="form" method="post" action={{ url('/test/next') }}/{{$id}}>
            {!! csrf_field() !!}
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
                    @if($id!=$total)
                        NEXT
                        @else
                        SUBMIT
                        @endif
                </button>
            </form>



        </div>
    </div>
@endsection