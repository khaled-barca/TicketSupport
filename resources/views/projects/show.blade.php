@extends('master')
@section('title')
    {{$project->name}}
@endsection
@section('header')
    {{$project->name . ' Tickets'}}
@endsection

@section('body')
    @forelse($tickets as $ticket)
        <div class="box box-success">
            @include('partials.ticket')
            @unless($tickets->last()->id == $ticket->id)
                <hr>
            @endunless
            @empty
                <h2>No Tickets to display.</h2>
            @endforelse
        </div>
        <!-- chat item -->
        @if(Auth::user()->isAdministrator())

            {{ Form::open(array('route' => array('projects.edit', $project->id), 'method' => 'GET')) }}

            {{ Form::submit('Edit project') }}

            {{ Form::close() }}
            {{ Form::open(array('route' => array('projects.destroy', $project->id), 'method' => 'DELETE')) }}
            {{ method_field('DELETE') }}
            {{ Form::submit('Delete project') }}

            {{ Form::close() }}
        @endif
@endsection