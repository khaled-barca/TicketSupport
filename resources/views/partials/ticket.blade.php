@foreach ($tickets as $ticket)



<div class="item">
    <img src="{{asset('/bower_components/AdminLTE/dist/img/user2-160x160.jpg')}}" alt="user image" class="offline">
    <p class="message">
        <a href="#" class="name">
            khaled
        </a>
        <a href="#">Ticket {{ $ticket->id }}</a>
        <span class = "pull-right">{{ $ticket->status }}</span>
        <br/>
        <span class = "pull-right">progress date : {{ $ticket->progress_date }}</span>
        <br/>
        @if ($ticket->support_id === 0)

        <a  class="btn btn-success pull-right" role="button" href="Users/claimTicket/{{ $ticket->id }}">Claim Ticket</a>
        <br/>
        @else
          <a  class="btn btn-success pull-right" role="button" href="Users/claimTicket/{{ $ticket->id }}">Claim Ticket</a>
        <br/>
        <div class="user-block pull-right">

                    <span class="description">Claimed by {{ $ticket->support->first_name }} {{ $ticket->support->last_name }}.</span>
                  </div>
    
    
        <br/>
        @endif

    </p>
</div>
@endforeach
