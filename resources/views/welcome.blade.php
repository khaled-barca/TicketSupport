<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 2 | Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    @include('partials.css')
    <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    @include('partials.home.header')
    <!-- Left side column. contains the logo and sidebar -->
    @include('partials.home.sidebar')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Dashboard
                <small>Control panel</small>
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <!-- Small boxes (Stat box) -->
            <!-- Main row -->

            <div class="row">
                <!-- Left col -->
                <section class="col-lg-12 connectedSortable">
                    <!-- Custom tabs (Charts with tabs)-->

                    <!-- Chat box -->
                    <div class="box box-success">
                        <div class="box-header">
                            <i class="fa fa-comments-o"></i>

                            <h3 class="box-title">Tickets</h3>

                            <div class="box-tools pull-right" data-toggle="tooltip" title="Tickets">
                                <div class="btn-group" data-toggle="btn-toggle">
                                    <button type="button" class="btn btn-default btn-sm active">My tickets</button>
                                    <button type="button" class="btn btn-default btn-sm">All tickets</button>
                                </div>
                            </div>
                        </div>
                        <div class="box-body chat">
                            <!-- chat item -->
                            @include('partials.ticket')

                            <hr>
                            <!-- chat item -->
                            @include('partials.ticket')

                            <hr>
                            <!-- chat item -->
                            @include('partials.ticket')

                            <hr>

                            @include('partials.ticket')


                        </div>
                        <!-- /.chat -->
                    </div>
                    <!-- /.box (chat box) -->

                    <!-- quick email widget -->

                </section>
                <!-- /.Left col -->
                <!-- right col (We are only adding the ID to make the widgets sortable)-->
            </div>
            <!-- /.row (main row) -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    @include('partials.home.footer')

    <!-- Control Sidebar -->
    @include('partials.home.darkSidebar')<!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.1.4 -->
@include('partials.js')
</body>
</html>
