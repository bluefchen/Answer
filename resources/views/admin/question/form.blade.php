
<div class="form-group">
    {!! Form::label('Question','Question',['class'=>'col-lg-2 control-label lead'])!!}
    <div class="col-lg-10">
        {!! Form::textarea('title',null,['class'=>'form-control col-lg-10','required'=>'required','rows'=>'3']) !!}
    </div>
</div>
<div class="form-group">
        {!! Form::label('optionA','A',['class'=>'col-lg-2 control-label lead'])!!}
    <div class="col-lg-10">
        {!! Form::text('optionA',null,['class'=>'form-control','required'=>'required']) !!}
    </div>
</div>


<div class="form-group">
    <div class="col-lg-2">
        {!! Form::label('optionB','B',['class'=>'col-lg-2 control-label lead'])!!}
    </div>

    <div class="col-lg-10">
        {!! Form::text('optionB',null,['class'=>'form-control','required'=>'required']) !!}
    </div>
</div>


<div class="form-group">
    {!! Form::label('optionC','C',['class'=>'col-lg-2 control-label lead'])!!}
    <div class="col-lg-10">
        {!! Form::text('optionC',null,['class'=>'form-control','required'=>'required']) !!}
    </div>
</div>
<div class="form-group">
    {!!!Form::label('optionD','D',['class'=>'col-lg-2 control-label lead'])!!}
    <div class="col-lg-10">
        {!! Form::text('optionD',null,['class'=>'form-control','required'=>'required']) !!}
    </div>
</div>
<div class="form-group">
    <label class="col-lg-2 control-label lead">答案</label>
    <div class="col-lg-10">
        {!! Form::text('text',null,['class'=>'form-control','required'=>'required']) !!}
    </div>
</div>
<div class="form-group">
    <label class="col-lg-2 control-label lead">Tag</label>
    <div class="col-lg-10">
        {!! Form::select('tag_list[]', $tag_list, null, ['id'=>'tag_list','class' => ' form-control  bg-primary', 'multiple','required'=>'required']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::submit('$submitButton', ['class' => 'btn btn-primary form-control']) !!}
</div>