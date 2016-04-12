@extends('master')

@section('body')

    <div class="box box-success">
        <div class="box-header">
            <i class="fa fa-comments-o"></i>

            <h3 class="box-title">Tickets</h3>

            <div class="box-tools pull-right" data-toggle="tooltip" title="Tickets">
                <div class="btn-group" data-toggle="btn-toggle">
                    <button type="button" class="btn btn-default btn-sm active">My tickets</button>
                    <button type="button" class="btn btn-default btn-sm">All tickets</button>
                </div>
            </div>
        </div>
        <div class="box-body chat">

            @forelse($tickets as $ticket)
                @include('partials.ticket')
                @unless($tickets->last()->id == $ticket->id)
                    <hr>
                    @endif
                    @empty
                            <p>No Tickets to display.</p>
                    @endforelse
                            <!-- chat item -->

        </div>
        <!-- /.chat -->
    </div>

@endsection

@section('title')
    Home
@endsection

@section('header')
    NewsFeed
@endsection