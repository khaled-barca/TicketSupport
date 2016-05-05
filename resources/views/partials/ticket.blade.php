<?php $project = $ticket->project()->get()->first() ?>
<?php $support = $ticket->support()->get()->first() ?>
<?php $customer = $ticket->customer()->get()->first() ?>
<?php $agents = App\User::where('role', 'Support Agent')->lists('first_name', 'id'); ?>
<?php $show = strstr(Request::path(), 'tickets/') ?>
@if($ticket->progress_date)
    <?php $diff = $ticket->progress_date->diffForHumans(Carbon\Carbon::now()); ?>
    <?php $diff = str_replace("before", "ago", $diff); ?>
@endif
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
                <span class="pull-right">Progress date : {{$diff}}</span>
                <br/>
                @if($support->id == Auth::user()->id)
                    <span class="pull-right">Assigned to : You</span>
                @else
                    <span class="pull-right">Assigned to : <a
                                href="{{route('users.show',$support)}}">{{$support->fullName()}}</a> </span>
                @endif
            @elseif(!$show)
                {{ Form::open(array('url' => array('tickets/claimTicket', $ticket->id), 'method' => 'GET','class'=>'pull-right')) }}

                {{ Form::submit('claim ticket') }}
                {{Form::close()}}
                <br/>
                <br/>

                @if(Auth::user()->isSupportSupervisor() || Auth::user()->isAdministrator())


                    {{ Form::open(array('url' => array('tickets/claimTicket2', $ticket->id), 'method' => 'GET','class'=>'pull-right')) }}
                    {{ Form::submit('Assign Ticket') }}
                    {{ Form::select('agent', $agents) }}
                    {{Form::close()}}



                @endif
            @endif

        </div>
    </div>
</div>