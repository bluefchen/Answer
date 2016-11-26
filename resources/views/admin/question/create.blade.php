@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <h1>Wirte a New Question</h1>
                <hr/>

                <form class="form-horizontal" method="post" action="/admin/question" role="form">
                    {!! csrf_field() !!}
                    <div class="form-group">
                        <label class="col-lg-2 control-label lead">Question</label>
                        <div class="col-lg-10">
                            <textarea class="form-control" rows="3" name="title" required="required"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label lead">A</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" name="optionA" required="required">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label lead">B</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" name="optionB" required="required" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label lead">C</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" name="optionC" required="required">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label lead">D</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" name="optionD" required="required">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label lead">答案</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" name="answer" required="required">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label lead">Tag</label>
                        <div class="col-lg-10">
                            {!! Form::select('tag_list[]', $tag_list, 1, ['class' => 'form-control', 'multiple']) !!}

                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::submit('Add Question', ['class' => 'btn btn-primary form-control']) !!}
                    </div>
                </form>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>





@endsection
@section('footer')
    <script type="text/javascript">
        $('#tag_list').select2();
    </script>
@endsection