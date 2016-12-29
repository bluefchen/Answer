@extends('layouts.app')

@section('content')


    <div class="row" style="height:inherit;">
        <div class="col-md-8 col-md-offset-2" style="position:absolute;height:90%; background:#f0eded ">

            <div class="col-md-12"  style="height:85%;" >
                <h4 class="blue">Contact Room</h4>
                <ul id="messages"></ul>
            </div>

            <div>
                <form action="" class="form" >
                    <div class="form-group">
                        <textarea class="form-control " id="m"  rows="3" style="border: 3px solid #fceeca ;border-radius:20px"></textarea>
                    </div>
                    <div class="form-group text-right" style="position:relative;top:-70px; right:10px">
                        <input type="submit" style="background:#fceeca ;color:#ff2f54"  class="btn  btn-lg " value="   send    ">
                    </div>

                </form>
            </div>



        </div>
    </div>


    <script src="https://cdn.socket.io/socket.io-1.2.0.js"></script>
    <script src="http://code.jquery.com/jquery-1.11.1.js"></script>
    <script>
        var socket = io('http://localhost:3000');
        $('form').submit(function () {
            socket.emit('chat message', $('#m').val());
            $('#m').val('');
            return false;
        });
        socket.on('chat message', function (msg) {
            $('#messages').append($('<li>').text(msg));
        });

    </script>
@endsection