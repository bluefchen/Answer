@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="jumbotron">
            <h1>测试</h1>
            <p>准备好了么~开始答题吧！</p>
            <p>
                <a class="btn btn-lg btn-primary" href={{ url('/test/1') }} role="button">START</a>
            </p>

        </div>
    </div>
@endsection