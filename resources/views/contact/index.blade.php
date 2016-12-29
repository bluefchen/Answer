@extends('layouts.app')

@section('content')
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font: 13px Helvetica, Arial; }

        #messages { list-style-type: none; margin: 0; padding: 0; }
        #messages li { padding: 5px 10px; }
        #messages li:nth-child(odd) { background: #eee; }
    </style>

<div class="col-md-10 col-md-offset-1" style="border:1px dashed #000 ;background:#394; ">

    <ul id="messages"></ul>
    <form action="" style=" background: #000; padding: 3px; position: fixed; bottom: 0; width: 100%;">
        <input id="m" autocomplete="off" />
        <input type="submit" value="send">
    </form>
</div>

<script src="https://cdn.socket.io/socket.io-1.2.0.js"></script>
<script src="http://code.jquery.com/jquery-1.11.1.js"></script>
<script>
    var socket = io('http://localhost:3000');
    $('form').submit(function(){
        socket.emit('chat message', $('#m').val());
        $('#m').val('');
        return false;
    });
    socket.on('chat message', function(msg){
        $('#messages').append($('<li>').text(msg));
    });
</script>
@endsection