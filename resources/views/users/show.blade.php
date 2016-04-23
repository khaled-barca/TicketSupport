@extends('master')
@section('title')
    {{$user->fullName()}}
@endsection
@section('header')
    {{$user->fullName()}}
@endsection
@section('body')
    <div class="box box-success">
        <div class="panel-body">
            <div class="info-group">
                <label class="col-md-4 control-label">First Name</label>

                <div class="col-md-6">
                    <label class="col-md-4 control-label">{{ucfirst($user->first_name)}}</label>
                </div>
            </div>

            <div class="info-group">
                <label class="col-md-4 control-label">Last Name</label>

                <div class="col-md-6">
                    <label class="col-md-4 control-label">{{ucfirst($user->last_name)}}</label>
                </div>
            </div>

            <div class="info-group">
                <label class="col-md-4 control-label">E-Mail Address</label>

                <div class="col-md-6">
                    <label class="col-md-4 control-label">{{$user->email}}</label>
                </div>
            </div>

            <div class="info-group">
                <label class="col-md-4 control-label">Gender</label>

                <div class="col-md-6">
                    <label class="col-md-4 control-label">{{$user->gender}}</label>
                </div>
            </div>

            <div class="info-group">
                <label class="col-md-4 control-label">Age</label>

                <div class="col-md-6">
                    <label class="col-md-4 control-label">{{Carbon\Carbon::now()->diffInYears($user->date_of_birth)}}</label>
                </div>
            </div>

            <div class="info-group">
                <label class="col-md-4 control-label">Role</label>

                <div class="col-md-6">
                    <label class="col-md-4 control-label">{{$user->role}}</label>
                </div>
            </div>


            @if($user->id == Auth::user()->id)
                <div class="info-group col-md-4 col-lg-offset-4">
                    <a href="{{route('users.edit',$user)}}">
                        <button type="button" class="btn btn-primary">
                            Edit Info
                        </button>
                    </a>
                </div>
            @endif

            @if(Auth::user()->isAdministrator() && Auth::user()->id != $user->id && !($user->isAdministrator()))
                <div class="info-group col-md-4 col-lg-offset-4">
                    {!! Form::open(['class' => 'form-horizontal', 'method' => 'DELETE', 'route' =>
                    ['users.destroy',$user]])!!}
                    {!! Form::submit('Delete User', ['class'=>'btn btn-danger btn-mini']) !!}
                    {!! Form::close() !!}
                </div>
            @endif
        </div>
    </div>
    <h3>Tickets</h3>
    <div class="box box-success">
        @forelse($tickets as $ticket)
            @include('partials.ticket')
        @empty
            <h2>No tickets assigned</h2>
        @endforelse
    </div>
@endsection