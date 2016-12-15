<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PHP之路 Admin</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- bootstrap 3.0.2 -->
    <link href="{{URL::asset('assets/dist/css/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- font Awesome -->
    <link href="{{URL::asset('assets/AdminLTE/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="{{URL::asset('assets/AdminLTE/ionicons.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="{{URL::asset('assets/dist/js/flat-ui.min.js')}}"></script>
    <!-- Theme style -->
    <link href="{{URL::asset('assets/AdminLTE/AdminLTE.css')}}" rel="stylesheet" type="text/css" />


    <!--导入代码高亮：highlight.css-->
    <link href="{{URL::asset('assets/dist/styles/solarized-light.css')}}" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<!-- 头部设计 -->
<header class="header">
    <!--左侧admin-->
    <a href="/" class="logo">
        <!-- Add the class icon to your logo image or logo icon to add the margining -->
        Home
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- 右侧管理员信息，显示信息和头像-->
        <div class="navbar-right">
            <ul class="nav navbar-nav">
                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="glyphicon glyphicon-user"></i>
                        <span>Silu Zhou <i class="caret"></i></span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header bg-light-blue">
                            <img src="img/avatar3.png" class="img-circle" alt="User Image" />
                            <p>
                                Silu Zhou - Web Developer
                                <small>siluzhou_pku@163.com</small>
                            </p>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-right">
                                <a href="/logout" class="btn btn-default btn-flat">Sign out</a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>

<div class="wrapper row-offcanvas row-offcanvas-left">
    <!-- 左侧的side column，包括sidebar -->
    <aside class="left-side sidebar-offcanvas">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- search form -->
            <form action="#" method="get" class="sidebar-form">
                <div class="input-group">
                    <input type="text" name="q" class="form-control" placeholder="Search..."/>
                            <span class="input-group-btn">
                                <button type='submit' name='seach' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                            </span>
                </div>
            </form>
            <!-- /.search form -->
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu">
                <li @if($sidearr[0][0]==1)class="active"@endif>
                    <a href="/admin">
                        <i class="fa fa-dashboard"></i> <span>Admin</span>
                    </a>
                </li>
                <li @if($sidearr[1][0]==1)class="treeview active" @else class="treeview" @endif>
                    <a >
                        <i class="fa fa-bar-chart-o"></i>
                        <span>题库管理</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li @if($sidearr[1][1][0]==1) class="active" @endif><a href="/admin/question"><i class="fa fa-angle-double-right"></i> 问题</a></li>
                        <li  @if($sidearr[1][1][1]==1) class="active" @endif><a href="/admin/tag"><i class="fa fa-angle-double-right"></i> Tag</a></li>
                    </ul>
                </li>

            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- Right side column. Contains the navbar and content of the page -->
    <aside class="right-side">
        @yield('content')
    </aside><!-- /.right-side -->
</div><!-- ./wrapper -->








<!-- jQuery 2.0.2 -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="{{URL::asset('assets/AdminLTE/bootstrap.min.js')}}" type="text/javascript"></script>
<!-- AdminLTE App -->
<script src="{{URL::asset('assets/AdminLTE/app.js')}}" type="text/javascript"></script>

<!-- AdminLTE for demo purposes -->
<script src="{{URL::asset('assets/AdminLTE/demo.js')}}" type="text/javascript"></script>


<!--代码高亮-->
<script src="{{URL::asset('assets/dist/js/highlight.pack.js')}}"></script>
<script>hljs.initHighlightingOnLoad();</script>
<!--select2效果-->
<script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>


@yield('footer')
</body>
</html>
