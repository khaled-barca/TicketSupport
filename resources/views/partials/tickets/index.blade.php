<div class="box box-success" id = {{$id}}>

    @forelse($tickets as $ticket)
        @include('partials.ticket')
        @unless($tickets->last()->id == $ticket->id)
            <hr>
        @endunless
    @empty
        <h2>No Tickets to display.</h2>
    @endforelse
</div>