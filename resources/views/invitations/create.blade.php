@extends('master')

@section('title')
    Invite User
@endsection

@section('header')
    Invite User
@endsection

@section('body')
    {!! Form::open(['method' => 'POST','class' => 'form-horizontal','action' => ['InvitationsController@store']]) !!}
    <div class="form-group">
        <label class="col-md-4 control-label">First Name</label>

        <div class="col-md-3">
            {!! Form::text('first_name',null,['class' => 'form-control input-md']) !!}
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-4 control-label">Last Name</label>

        <div class="col-md-3">
            {!! Form::text('last_name',null,['class' => 'form-control input-md']) !!}
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-4 control-label">Email</label>

        <div class="col-md-3">
            {!! Form::email('email',null,['class' => 'form-control input-md']) !!}
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-4 control-label">Invite as</label>

        <div class="col-md-3">
            <label class="radio-inline">
                <input type="radio" name="role" value="Support Agent">Support Agent
            </label>

            <label class="radio-inline">
                <input type="radio" name="role" value="Support Supervisor">Support Supervisor
            </label>

            <label class="radio-inline">
                <input type="radio" name="role" value="Administrator">Administrator
            </label>

        </div>
    </div>

    <div class="form-group">
        <div class="col-lg-offset-5">
            <button type="submit" class="btn btn-primary">
                Submit
            </button>
        </div>
    </div>

    {!! Form::close() !!}



@endsection