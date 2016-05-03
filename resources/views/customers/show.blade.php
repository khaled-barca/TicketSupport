@extends('master')
@section('title')
    {{$customer->screen_name}}
@endsection
@section('header')
    {{$customer->screen_name . ' Tickets'}}
@endsection

@section('body')
 
        <!-- chat item -->
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