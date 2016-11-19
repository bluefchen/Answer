@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="jumbotron">
            <h3>测试结果</h3>
            <h4>一共{{$total}}道题，您答对了{{$num}}道</h4>
            <h4>详情：</h4>
            <ul>
                @for($i=0;$i<$total;$i++)
                    <li>
                        第{{$i+1}}题：
                        @if($answer[$i]==1)
                            正确
                        @elseif($answer[$i]==-1)
                            未答
                        @else
                            错误
                        @endif

                    </li>
                @endfor
            </ul>
        </div>
    </div>
@endsection