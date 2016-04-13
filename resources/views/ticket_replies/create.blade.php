<!-- resources/views/ticket_replies/create.blade.php -->

@extends('master')

@section('body')

    <!-- Bootstrap Boilerplate... -->

    <div class="panel-body">
        <!-- Display Validation Errors -->

        <!-- New Task Form -->
        {{ Form::open(array('route' => array('tickets.ticket_replies.store', $ticket->id), 'method' => 'POST')) }}
            {!! csrf_field() !!}

            <!-- Task Name -->
            <div class="form-group">
                <label for="task-reply" class="col-sm-3 control-label">Reply</label>

                <div class="col-sm-6">
                    <input type="text" name="reply" id="task-reply" class="form-control">
                </div>
            </div>

            <!-- Add Task Button -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus"></i> Reply
                    </button>
                </div>
            </div>
        {{ Form::close() }}
    </div>

    <!-- TODO: Current Tasks -->
@endsection
