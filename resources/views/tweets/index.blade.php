@extends('master')

@section('body')
    <!-- Create Task Form... -->

    <!-- Current Tasks -->
    @if (count($tweets) > 0)
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
                        @for ($i = 0; $i < count($tweets); $i++)
                            <tr>
                                <!-- Task Name -->
                                <td class="table-text">
                                    <div>{{ $tweets[$i]['user']['name'] }}</div>
                                </td>

                                <td>
                                    <div>{{ $tweets[$i]['text'] }}</div>
                                </td>                                          
                                @for($j = 0;$j < count($result);$j++)
                                <td><p>{{$result[$j]['user']['name']}}</p>
                                    <p>{{$result[$j]['text']}}</p>
                                </td>
                                @endfor       
                            {{ Form::open(array('route' => array('customers.store'), 'method' => 'POST')) }}
                                {!! csrf_field() !!}
                               
                                <!-- Task Name -->

                                 <div class="form-group">
                                    
                                     <div class="col-sm-6">
                                        <input type="hidden" name="first_name" id="body" class="form-control" value ={{ $tweets[$i]['user']['name']}} >
                                    </div>
                                </div>

                                 <div class="form-group">
                                    
                                     <div class="col-sm-6">
                                        <input type="hidden" name="body" id="body" class="form-control" value ={{ $tweets[$i]['text'] }} >
                                    </div>
                                </div>
                                <div class="form-group">
                                    
                                     <div class="col-sm-6">
                                        <input type="hidden" name="status_id" id="body" class="form-control" value ={{ $tweets[$i]['id'] }} >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-3 col-sm-6">
                                        <button type="submit" class="btn btn-default">
                                            <i class="fa fa-plus"></i> Mark As ticket
                                        </button>
                                    </div>
                                </div>

                               



                                </td>
                            </tr>
                        @endfor
                         {{ Form::close() }}
                    </tbody>
                </table>
            </div>
        </div>
    @endif
@endsection
