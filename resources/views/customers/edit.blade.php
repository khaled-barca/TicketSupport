<!-- resources/views/customers/edit.blade.php -->

@extends('master')

@section('body')

    <!-- Bootstrap Boilerplate... -->

    <div class="panel-body">
        <!-- Display Validation Errors -->

        <!-- New Task Form -->
        {{ Form::model($customer, array('route' => array('customers.update', $customer->id), 'method' => 'PUT')) }}

            {!! csrf_field() !!}
            {{ method_field('PUT') }}

            <!-- Task Name -->
            <div class="form-group">
                <label for="task-name" class="col-sm-3 control-label">Customer name</label>

                <div class="col-sm-6">
                    <input type="text" name="first_name" id="task-name" class="form-control" value="{{$customer->first_name}}">
                </div>
            </div>
            
            <div class="form-group">
                <label for="task-name" class="col-sm-3 control-label">screen name</label>

                <div class="col-sm-6">
                    <input type="text" name="screen_name" id="task-name" class="form-control" value="{{$customer->screen_name}}">
                </div>
            </div>

            <!-- Add Task Button -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus"></i> Edit Customer
                    </button>
                </div>
            </div>
        {{ Form::close() }}
    </div>

    <!-- TODO: Current Tasks -->
@endsection