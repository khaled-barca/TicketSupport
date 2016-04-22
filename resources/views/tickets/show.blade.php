@extends('master')
@section('title')
    {{$ticket->body}}
@endsection

@section('header')
    Ticket
@endsection
@section('body')
    <div class="box box-success">
        @include('partials.ticket')
        @foreach($ticket_replies as $ticket_reply)
            @include('partials.ticket_reply')
        @endforeach
    </div>



    <div class="box-footer">
        {{ Form::open(array('route' => array('tickets.ticket_replies.store', $ticket->id), 'method' => 'POST')) }}
        {!! csrf_field() !!}
        <div class="input-group">
            <input class="form-control" placeholder="Reply ..." type="text" name="reply" id="task-reply" s>

            <div class="input-group-btn">
                <button class="btn btn-success"><i class="fa fa-plus"></i></button>
            </div>
        </div>
        {{ Form::close() }}

    </div>
    </div>
    {{ Form::open(array('route' => array('tickets.edit', $ticket->id), 'method' => 'GET')) }}

    {{ Form::submit('Edit ticket') }}

    {{ Form::close() }}
    {{ Form::open(array('route' => array('tickets.destroy', $ticket->id), 'method' => 'DELETE')) }}
    {{ method_field('DELETE') }}
    {{ Form::submit('Delete ticket') }}

    {{ Form::close() }}
@endsection
