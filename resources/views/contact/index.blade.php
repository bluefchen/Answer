@extends('layouts.app')

@section('content')
<div class="full">
    <ul id="messages"></ul>
    <form action="">
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