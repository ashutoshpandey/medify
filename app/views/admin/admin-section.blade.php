<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Administration | Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    @include('includes.admin.common_css')

    {{HTML::style(asset("/public/css/AdminLTE.css"))}}
    {{HTML::style(asset("/public/css/admin-skins/_all-skins.min.css"))}}

    @include('includes.common_js_top')
</head>
<body class="skin-blue sidebar-mini">
<div class="wrapper">

<header class="main-header">
<!-- Logo -->
<a href="{{$root}}/admin-section" class="logo">
    <span class="logo-lg"><b>Admin</b></span>
</a>
<!-- Header Navbar: style can be found in header.less -->
<nav class="navbar navbar-static-top" role="navigation">
<!-- Sidebar toggle button-->
<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
    <span class="sr-only">Toggle navigation</span>
</a>

<div class="navbar-custom-menu">
<ul class="nav navbar-nav">
<!-- User Account: style can be found in dropdown.less -->
<li class="dropdown user user-menu">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <span class="hidden-xs">{{$name}}</span>
    </a>
</li>
</ul>
</div>
</nav>
</header>
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    @include('includes.admin.menu')
    <!-- /.sidebar -->
</aside>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Dashboard
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->

        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3>{{$appointmentCount}}</h3>

                    <p>Booked Appointments</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
                <div class="inner">
                    <h3>{{$expertCount}}</h3>

                    <p>Expert Count</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3>{{$userCount}}</h3>

                    <p>User Count</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
            </div>
        </div>
        <div class='clear'></div>
    </section><!-- /.content -->

</div><!-- /.content-wrapper -->

</div><!-- ./wrapper -->

@include('includes.admin.common_js_bottom')
<script type="text/javascript">
    $(function(){
        $(".dashboard").addClass('active');
    });
</script>
</body>
</html>
