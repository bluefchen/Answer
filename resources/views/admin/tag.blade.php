@extends('admin.layout')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            管理员界面
            <small>题库</small>
        </h1>

    </section>

    <!-- Main content -->
    <section class="content">

        <div class="col-lg-12">
            <h2>
                &nbsp;
                Tag列表
                <a href="/admin/tag/create" class="btn btn-lg" >
                            <span class="glyphicon glyphicon-plus "
                                  style="position: absolute;top:40px; left: 200px;right: 60px;"></span>
                </a>
            </h2>
        </div>

        <div class="container col-md-12 ">
            <form method="POST" action="/admin/tag/delete" accept-charset="UTF-8" class="form-horizontal">
                {!! csrf_field() !!}
                <div class="form-group" style="height: 500px;overflow: auto">
                    @foreach($tags as $tag)
                        <label class="checkbox ">
                            <input type="checkbox" data-toggle="checkbox" name="tag_id[]" value={{$tag->id}}>
                            <h4>
                                <a href="/admin/tag/{{$tag->id}}">
                                    {{$tag->name}}
                                </a>

                                <a href="/admin/tag/{{$tag->id}}/edit" class="btn btn-sm"
                                   style="padding:0px 4px;font-size:20px;">
                                            <span class="glyphicon glyphicon-pencil "
                                                  style="position: absolute;OVERFLOW: auto; CURSOR: default;left: 300px;right: 0px;"></span>
                                </a>
                            </h4>
                        </label>
                    @endforeach
                </div>
                <button type="submit" class="btn btn-lg btn-primary">Delete</button>
            </form>

        </div>
    </section><!-- /.content -->
@endsection


@section('footer')
    <script>
        $("#add1").hide();
        $("#add2").hide();
        $("#add3").hide();
        $("#add4").hide();
        $("#add5").hide();
        $("#add").click(function(){
            var t;
            t=50;
            $("#add1").fadeToggle(t);
            $("#add2").delay(t).fadeToggle(t);
            $("#add3").delay(2*t).fadeToggle(t);
            $("#add4").delay(3*t).fadeToggle(t);
            $("#add5").delay(4*t).fadeToggle(t);
        });
    </script>
@endsection