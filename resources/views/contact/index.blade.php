@extends('layouts.app')

@section('content')


    <div class="row" style="height:inherit;">
        <div class="col-md-8 col-md-offset-2" style="position:absolute;height:90%; background:#f0eded ">

            <div class="col-md-12" style="height:85%;">
                <h4 class="blue">Contact Room</h4>

                <div class="bubbleItem">     <!--左侧的泡泡-->
                    <span class="bubble leftBubble">
                        欢迎来到Contact界面！<br />
                        输入以下内容：<br/>
                        1:发表意见<br/>
                        2:题目答疑<br/>
                    <span class="bottomLevel"></span>
                    <span class="topLevel"></span>
                    </span>
                </div>


                <div id="messages2"></div>

            </div>

            <div>
                <form action="" class="form">
                    <div class="form-group">
                        <textarea class="form-control " id="m" rows="3"
                                  style="border: 2px solid #57e6ca ;border-radius:15px"></textarea>
                    </div>
                    <div class="form-group text-right" style="position:relative;top:-70px; right:10px">
                        <input type="submit" class="btn  btn-lg btn-primary" value="   send    ">
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

            var rightbutton = "<div class=\"bubbleItem clearfix\"><span style=\"font-family: Arial, Helvetica, sans-serif;\"></span> <span class=\"bubble rightBubble\">" + msg + "<span class=\"bottomLevel\"></span><span class=\"topLevel\"></span> </span></div>";
            $('#messages2').before(rightbutton);
        });

        leftbubbon
    </script>
@endsection