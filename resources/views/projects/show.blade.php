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
                              @if (count($tickets) > 0)
                                 @for($i = 0; $i < count($tickets); $i++)
                            <div class="item">
                                <img src="{{asset('/bower_components/AdminLTE/dist/img/user2-160x160.jpg')}}" alt="user image" class="offline">
                                <p class="message">
                                    <a href="#" class="name">
                                        {{$users[$i]->first_name}} {{$users[$i]->last_name}}
                                    </a>
                                    <a href="ticket.html">Ticket {{$tickets[$i]->id}}</a>
                                    <span class = "pull-right">{{$tickets[$i]->status}}</span>
                                    <br/>
                                    <span class = "pull-right">progress date : {{$tickets[$i]->updated_at}}</span>
                                    <br/>
                                    <a class = "pull-right" href="#">Claim Ticket</a>
                                    <br/>

                                </p>  
                            </div>
                            <hr>
                            @endfor
                            @endif
                <h3 class="box-title">No Tickets yet</h3>

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
            {{ Form::open(array('route' => array('projects.edit', $project->id), 'method' => 'GET')) }}

                {{ Form::submit('Edit project') }}

            {{ Form::close() }}
            {{ Form::open(array('route' => array('projects.destroy', $project->id), 'method' => 'DELETE')) }}
                {{ method_field('DELETE') }}
                {{ Form::submit('Delete project') }}

            {{ Form::close() }}
        </section>
        @endsection