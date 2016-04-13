@extends('app')

@section('content')
    <!-- Create Task Form... -->

    <!-- Current Tasks -->
    @if (count($ticket_replies) > 0)
        <div class="panel panel-default">
            <div class="panel-heading">
                Ticket
            </div>

            <div class="panel-body">
                <table class="table table-striped task-table">

                    <!-- Table Headings -->
                    <thead>
                        <th>Replies</th>
                        <th>&nbsp;</th>
                    </thead>

                    <!-- Table Body -->
                    <tbody>
                        @foreach ($ticket_replies as $ticket_reply)
                            <tr>
                                <!-- Task Name -->
                                <td class="table-text">
                                    <div>{{ $ticket_reply->reply }}</div>
                                </td>

                                <td>
                                    <!-- TODO: Delete Button -->
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
@endsection
