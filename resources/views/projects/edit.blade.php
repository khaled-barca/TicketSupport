<!-- resources/views/projects/edit.blade.php -->

@extends('master')

@section('body')

    <!-- Bootstrap Boilerplate... -->

    <div class="panel-body">
        <!-- Display Validation Errors -->

        <!-- New Task Form -->
        {{ Form::model($project, array('route' => array('projects.update', $project->id), 'method' => 'PUT')) }}

            {!! csrf_field() !!}
            {{ method_field('PUT') }}

            <!-- Task Name -->
            <div class="form-group">
                <label for="task-name" class="col-sm-3 control-label">Project name</label>

                <div class="col-sm-6">
                    <input type="text" name="name" id="task-name" class="form-control" value="{{$project->name}}">
                </div>
            </div>

            <!-- Add Task Button -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus"></i> Edit Project
                    </button>
                </div>
            </div>
        {{ Form::close() }}
    </div>

    <!-- TODO: Current Tasks -->
@endsection