
@extends('master')

@section('body')

    <!-- Bootstrap Boilerplate... -->

    <div class="panel-body">
        <!-- Display Validation Errors -->

        <!-- New Task Form -->
        <form action="{{ action('CustomersController@store2') }}" method="POST" class="form-horizontal">
            {!! csrf_field() !!}

            <!-- Task Name -->
            <div class="form-group">
                <div class="col-sm-6">
                <label for="task-name" class="col-sm-3 control-label">First name</label>

                
                    <input type="text" name="first_name" id="task-name" class="form-control">
                </div>
                <div class="col-sm-6">  
                <label for="task-name" class="col-sm-3 control-label">Last name</label>

                
                    <input type="text" name="last_name" id="task-name" class="form-control">
                </div>
                <div class="col-sm-6">  
                <label for="task-name" class="col-sm-3 control-label">Number</label>
                    <input type="number" name="phone" id="task-name" class="form-control">
                </div>
                <div class="col-sm-6">  
                <label for="task-name" class="col-sm-3 control-label">Screen name</label>
                    <input type="text" name="screen_name" id="task-name" class="form-control">
                </div>
 
                
            </div>

            <!-- Add Task Button -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus"></i> Add Customer
                    </button>
                </div>
            </div>
        </form>
    </div>

    <!-- TODO: Current Tasks -->
@endsection