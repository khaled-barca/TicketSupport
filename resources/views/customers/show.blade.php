@extends('master')
@section('title')
    {{$customer->screen_name}}
@endsection
@section('body')
    <div class="box box-success">
        <div class="panel-body">
            <div class="info-group">
                <label class="col-md-4 control-label">First Name</label>

                <div class="col-md-6">
                    <label class="col-md-4 control-label">{{ucfirst($customer->first_name)}}</label>
                </div>
            </div>

            <div class="info-group">
                <label class="col-md-4 control-label">Last Name</label>

                <div class="col-md-6">
                    <label class="col-md-4 control-label">{{ucfirst($customer->last_name)}}</label>
                </div>
            </div>

            <div class="info-group">
                <label class="col-md-4 control-label">Phone</label>

                <div class="col-md-6">
                    <label class="col-md-4 control-label">{{$customer->phone}}</label>
                </div>
            </div>

            <div class="info-group">
                <label class="col-md-4 control-label">Screen Name</label>

                <div class="col-md-6">
                    <label class="col-md-4 control-label">{{$customer->screen_name}}</label>
                </div>
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
    </div>
    @if(Auth::user()->isAdministrator())

        {{ Form::open(array('route' => array('customers.edit', $customer->id), 'method' => 'GET')) }}

        {{ Form::submit('Edit customer') }}

        {{ Form::close() }}
        {{ Form::open(array('route' => array('customers.destroy', $customer->id), 'method' => 'DELETE')) }}
        {{ method_field('DELETE') }}
        {{ Form::submit('Delete customer') }}

        {{ Form::close() }}
    @endif
@endsection