@extends('app')
@section('content')
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
        @endsection