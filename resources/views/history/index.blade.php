@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <br/>
                <table class="table table-hover table-bordered">
                    <tr>
                        <th>测试ID</th>
                        <th>答题时间</th>
                        <th>题量</th>
                        <th>答题类型</th>
                        <th>分数</th>
                        <th>详情</th>
                    </tr>
                    @foreach ($tests as $test)
                        <tr>
                            <th> {{$test['id']}}</th>
                            <th>{{$test['created_at']}}</th>
                            <th>{{$test['totalnumber']}}</th>

                            <th>
                                @if($test['testtype']==0)
                                    随机
                                @else
                                    顺序
                                @endif

                            </th>
                            <th>{{$test['point']}}</th>
                            <th><a class="text-muted" href={{"/test/".$test['id']."/alldetails"}} >查看答题详情</a></th>
                        </tr>
                    @endforeach
                </table>


            </div>
        </div>
    </div>
@endsection