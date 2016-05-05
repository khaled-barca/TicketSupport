@extends("master")
@section("title")
    {{$user->fullName()}}
@endsection

@section("header")
    Edit {{$user->fullName()}} Role
@endsection

@section("body")
    {!! Form::Model($user,['method' => 'POST','class' => 'form-horizontal','action' => ['UsersController@updateRole',$user]]) !!}
    <div class="form-group">
        <label class="col-md-4 control-label">Role</label>

        <div class="col-md-3">
            <label class="radio-inline">
                <input type="radio" name="role" value="{{App\Enums\UserRoles::SupportAgent}}">Support Agent
            </label>

            <label class="radio-inline">
                <input type="radio" name="role" value="{{App\Enums\UserRoles::SupportSupervisor}}">Support Supervisor
            </label>

            <label class="radio-inline">
                <input type="radio" name="role" value="{{App\Enums\UserRoles::Administrator}}">Administrator
            </label>

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