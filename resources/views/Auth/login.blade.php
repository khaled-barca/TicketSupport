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
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            LogIn
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
                    <br/>
                    <br/>

                    <div>
                        {!! Form::open(['class' => 'form-horizontal', 'method' => 'POST', 'url' =>
                        ['auth/login']])!!}
                        <div class="form-group">

                            <label class="col-md-4 control-label">Email</label>

                            <div class="col-md-2">
                                <input type="email" class="form-control input-md" name="email">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Password</label>

                            <div class="col-md-2">
                                <input type="password" class="form-control" name="password">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-lg-offset-5">
                                <button type="submit" class="btn btn-primary">
                                    Sign In
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- Menu Body -->
                    <!-- Menu Footer-->

                    {!! Form::close() !!}
                    <br/>
                    <br/>
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
@include('partials.js')
</body>
</html>