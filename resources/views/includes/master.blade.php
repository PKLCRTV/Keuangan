<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Keuangan CRTV</title>

    <!-- Bootstrap Core CSS -->
    {!! Html::style('sb-admin-2/css/bootstrap.min.css') !!}

    <!-- MetisMenu CSS -->
    {!! Html::style('sb-admin-2/css/plugins/metisMenu/metisMenu.min.css') !!}

    <!-- Timeline CSS -->
    {!! Html::style('sb-admin-2/css/plugins/timeline.css') !!}

    <!-- Custom CSS -->
    {!! Html::style('sb-admin-2/css/sb-admin-2.css') !!}

    <!-- Morris Charts CSS -->
    {!! Html::style('sb-admin-2/css/plugins/morris.css') !!}

    <!-- Custom Fonts -->
    {!! Html::style('sb-admin-2/font-awesome-4.1.0/css/font-awesome.min.css') !!}

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Keuangan CRTV</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        Amiq (admin)
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="#"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        @include('includes.menu')
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
             @yield('content')
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery Version 1.11.0 -->
    {!! Html::script('sb-admin-2/js/jquery-1.11.0.js') !!}

    <!-- Bootstrap Core JavaScript -->
    {!! Html::script('sb-admin-2/js/bootstrap.min.js') !!}

    <!-- Metis Menu Plugin JavaScript -->
    {!! Html::script('sb-admin-2/js/plugins/metisMenu/metisMenu.min.js') !!}

    <!-- DataTables JavaScript -->
    {!! Html::script('sb-admin-2/js/plugins/dataTables/jquery.dataTables.js') !!}
    {!! Html::script('sb-admin-2/js/plugins/dataTables/dataTables.bootstrap.js') !!}

    <!-- Custom Theme JavaScript -->
    {!! Html::script('sb-admin-2/js/sb-admin-2.js') !!}

<script>
$(document).ready(function() {
    $('#dataTables').dataTable();
});
</script>

</body>

</html>
