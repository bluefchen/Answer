@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <h1>Wirte a New Question</h1>
                <hr/>
                {{Form::open(['url'=>"/admin/question",'class'=>'form-horizontal'])}}
                @include('admin.question.form',['submitButton'=>'Add Question'])
                {{Form::close()}}
                @include('errors.list')
            </div>
        </div>
    </div>
@endsection

@section('footer')
    <script type="text/javascript">
        $('#tag_list').select2();
    </script>
@endsection