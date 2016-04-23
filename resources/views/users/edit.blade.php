@extends("master")
@section("title")
    {{$user->fullName()}}
@endsection

@section("header")
    Edit Info
@endsection

@section("body")
    {!! Form::Model($user,['method' => 'PATCH','class' => 'form-horizontal','route' => ['users.show',$user->id]]) !!}
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
        <label class="col-md-4 control-label">Date Of Birth</label>

        <div class="col-md-3">
            {!! Form::input('date','date_of_birth',$user->date_of_birth->format('Y-m-d'),['class' => 'form-control
            input-md']) !!}
        </div>
    </div>
    
    <div class="form-group">
        <div class="col-lg-offset-5">
            <button type="submit" class="btn btn-primary">
                Update Info
            </button>
        </div>
    </div>
    {!! Form::close() !!}
@endsection