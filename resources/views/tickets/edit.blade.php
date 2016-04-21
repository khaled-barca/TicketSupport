<!-- resources/views/ticket_replies/create.blade.php -->

@extends('master')

@section('body')

    <!-- Bootstrap Boilerplate... -->

    <div class="panel-body">
        <!-- Display Validation Errors -->

        <!-- New Task Form -->
        {{ Form::open(array('route' => array('tickets.update', $ticket->id), 'method' => 'PUT')) }}
            {!! csrf_field() !!}
            {{ method_field('PUT')}}
            <!-- Task Name -->
            <div class="form-group">
                <label for="task-reply" class="col-sm-6 control-label">Support Agent</label>

                <div class="col-sm-6">
                <select name="support_id" class="form-control">
                    @foreach($agents as $agent)
                  <option name="support_id" value ={{$agent->id}}>{{$agent->first_name}} {{$agent->last_name}}</option>
                    @endforeach
                </select>
                    
                </div>
            </div>
             <div class="form-group">
                <label for="body" class="col-sm-6 control-label">Body</label>
                
                 <div class="col-sm-6">
                    <input type="text" name="body" id="body" class="form-control" value="<?php echo $ticket->body; ?>">
                </div>
            </div>
                <div class="form-group">
                <label for="status" class="col-sm-6 control-label">Status</label>
                <div class="col-sm-6">
                <select name="status" class="form-control">
                  <option name= "status" id="status">1</option>
                  <option name= "status" id="status">2</option>
                  <option name= "status" id="status">3</option>
                </select>
                </div>
            </div>
                <label for="urgency" class="col-sm-6 control-label">Urgency</label>
                <div class="col-sm-6">
                <select name="urgency" class="form-control">
                  <option name= "urgency" id="urgency">1</option>
                  <option name= "urgency" id="urgency">2</option>
                </select>
                </div>


            <!-- Add Task Button -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus"></i> Confirm
                    </button>
                </div>
            </div>
        {{ Form::close() }}
    </div>
@endsection
    <!-- TODO: Current