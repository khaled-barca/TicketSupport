<?php $project = $ticket->project()->get()->first() ?>
<?php $support = $ticket->support()->get()->first() ?>
<?php $customer = $ticket->customer()->get()->first() ?>
<div class="item">
    <img src="{{asset('/bower_components/AdminLTE/dist/img/user2-160x160.jpg')}}" alt="user image" class="offline">

    <div class="message">
        @if($customer)
            <a href="{{route('customers.show',[$customer])}}" class="name">{{$customer->fullName()}}</a>
        @else <p class="name">Guest</p>
        @endif
        <a href="ticket.html">{{$ticket->body}}</a>
        <span class="pull-right">Status : {{$ticket->status}}</span>
        <br/>
        <span class="pull-right">Project : <a
                    href="{{route('projects.show',[$project->id])}}">{{$project->name}}</a> </span>
        <br/>
        @if($support)
            <span class="pull-right">progress date : 12 Oct, 2016</span>
            <br/>
            <span class="pull-right">Assigned to : <a
                        href="{{route('users.show',[$support->id])}}">{{$support->fullName()}}</a> </span>
            <br/>
        @else
            <a class="pull-right" href="#">Claim Ticket</a>
        @endif

    </div>
</div>