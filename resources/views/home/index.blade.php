@extends('master')

@section('body')

    <div class="box-header">
        <i class="fa fa-comments-o"></i>

        <h3 class="box-title">Tickets</h3>

        <div class="box-tools pull-right" data-toggle="tooltip" title="Tickets">
            <div class="btn-group" data-toggle="btn-toggle">
                <button type="button" class="btn btn-default btn-sm active" id="myTicketsButton">My tickets</button>
                <button type="button" class="btn btn-default btn-sm" id="allTicketsButton">All tickets</button>
            </div>
        </div>
    </div>

    @include('partials.tickets.index',['tickets' => $myTickets, 'id' => 'myTickets'])
    @include('partials.tickets.index',['tickets' => $allTickets, 'id' => 'allTickets'])
    <!-- chat item -->
    <!-- /.chat -->

@endsection

@section('title')
    Home
@endsection

@section('header')
    NewsFeed
@endsection