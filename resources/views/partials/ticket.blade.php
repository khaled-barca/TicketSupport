<?php $project = $ticket->project()->get()->first() ?>
<?php $support = $ticket->support()->get()->first() ?>
<?php $customer = $ticket->customer()->get()->first() ?>
<?php $show = strstr(Request::path(), 'tickets/') ?>
<div class="box-body chat">
    <div class="item">
        <img src="{{asset('/bower_components/AdminLTE/dist/img/default-avatar.jpg')}}" class="img-circle"
             alt="User Image">

        <div class="message">
            @if($customer)
                <a href="{{route('customers.show',[$customer])}}" class="name">{{$customer->fullName()}}</a>
            @else <p class="name">Guest</p>
            @endif
            @if($show)
                <span>{{$ticket->body}}</span>
            @else
                <a href="{{route('tickets.show',[$ticket->id])}}">{{$ticket->body}}</a>
            @endif
            <span class="pull-right">Status : {{$ticket->status}}</span>
            <br/>
                <span class="pull-right">Project : <a
                            href="{{route('projects.show',[$project->id])}}">{{$project->name}}</a> </span>
            <br/>
            @if($support)
                <span class="pull-right">Progress date : 12 Oct, 2016</span>
                <br/>
                @if($support->id == Auth::user()->id)
                    <span class="pull-right">Assigned to : You</span>
                @else
                    <span class="pull-right">Assigned to : <a
                                href="{{route('users.show',$support)}}">{{$support->fullName()}}</a> </span>
                @endif
            @else
            
            
              
            @endif
            
            
                

        </div>
    </div>
</div>

