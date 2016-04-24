<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sign Up</title>
    <!-- Tell the browser to be responsive to screen width -->
    @include('partials.css')
    <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Sign Up
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <!-- Main row -->
        @include('partials.flash')

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
                        ['/auth/register']])!!}

                        <div class="form-group">
                            <label class="col-md-4 control-label">First Name</label>

                            <div class="col-md-3">
                                <input type="text" class="form-control" name="first_name">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Last Name</label>

                            <div class="col-md-3">
                                <input type="text" class="form-control" name="last_name">
                            </div>
                        </div>

                        <div class="info-group">
                            <label class="col-md-4 control-label">Role</label>

                            <div class="col-md-6">
                                <label class="col-md-4 control-label">{{$invitation->role}}</label>
                            </div>
                            <input type="hidden" value="{{$invitation->role}}" name="role">
                        </div>

                        <div class="info-group">
                            <label class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <label class="col-md-4 control-label">{{$invitation->email}}</label>
                            </div>
                            <input type="hidden" value="{{$invitation->email}}" name="email">
                        </div>

                        <div class="form-group">
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Password</label>

                            <div class="col-md-3">
                                <input type="password" class="form-control" name="password">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-3">
                                <input type="password" class="form-control" name="password_confirmation">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Date Of Birth</label>

                            <div class="col-md-3">
                                {!! Form::input('date','date_of_birth',date('Y-m-d'),['class' => 'form-control
                                input-md']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Gender</label>

                            <div class="col-md-3">
                                <label class="radio-inline">

                                    <input type="radio" name="gender" value="Male">Male

                                </label>
                                <label class="radio-inline">

                                    <input type="radio" name="gender" value="Female">Female

                                </label>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-lg-offset-5">
                                <button type="submit" class="btn btn-primary">
                                    Sign Up
                                </button>
                            </div>
                        </div>

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