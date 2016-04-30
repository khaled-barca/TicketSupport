<!-- resources/views/ticket_replies/create.blade.php -->

@extends('master')

@section('body')

    <!-- Bootstrap Boilerplate... -->

    <div class="panel-body">
        <!-- Display Validation Errors -->

        <!-- New Task Form -->
        {{ Form::open(array('action' => 'TwitterController@storeSettings', 'method' => 'POST')) }}
            {!! csrf_field() !!}
            <!-- Task Name -->

             <div class="form-group">
                <label for="body" class="col-sm-6 control-label">CONSUMER KEY</label>
                
                 <div class="col-sm-6">
                    <input type="text" name="consumer_key" id="body" class="form-control">
                </div>
            </div>
                <div class="form-group">
                <label for="status" class="col-sm-6 control-label">CONSUMER_SECRET</label>
                <div class="col-sm-6">
                <input type="text" name="consumer_secret" id="body" class="form-control">
            </div>
                <label for="urgency" class="col-sm-6 control-label">ACCESS_TOKEN</label>
                <div class="col-sm-6">
                <input type="text" name="access_token" id="body" class="form-control">
                </div>
            <div class="form-group"> 
            <label for="project_id" class="col-sm-6 control-label">ACCESS_TOKEN_SECRET</label>  
            <div class="col-sm-6">
               <input type="text" name="access_token_secret" id="body" class="form-control">
                    
                </div>
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