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
                        <th>Issues</th>
                        <th>&nbsp;</th>
                    </thead>

                    <!-- Table Body -->
                    <tbody>
                        @for ($i = 0; $i < count($tweets); $i++)
                            <tr>
                                <!-- Task Name -->
                                <td>
                                    <p>{{ $tweets[$i]['user']['name'] }}</p>
                                </td>

                                <td>
                                    <p>{{ $tweets[$i]['text'] }}</p>
                                </td>                                   
                            </tr>      
     
                         <tr>
                            {{ Form::open(array('route' => array('customers.store'), 'method' => 'POST')) }}
                                {!! csrf_field() !!}
                               
                                <!-- Task Name -->
                                <td>
                                 <div class="form-group">
                                    
                                     <div class="col-sm-6">
                                        <input type="hidden" name="name" id="body" class="form-control" value ="<?php echo $tweets[$i]['user']['name']; ?>" >
                                    </div>
                                </div>
                                 <div class="form-group">
                                    
                                     <div class="col-sm-6">
                                        <input type="hidden" name="screen_name" id="body" class="form-control" value ="<?php echo $tweets[$i]['user']['screen_name']; ?>" >
                                    </div>
                                </div>

                                 <div class="form-group">
                                    
                                     <div class="col-sm-6">
                                        <input type="hidden" name="body" id="body" class="form-control" value ="<?php echo $tweets[$i]['text']; ?>">
                                    </div>
                                </div>

                                <div class="form-group">
                                    
                                     <div class="col-sm-6">
                                        <input type="hidden" name="status_id" id="body" class="form-control" value ={{ $tweets[$i]['id'] }} >
                                    </div>
                                </div>
                                <?php $list = \App\Ticket::where('body', '=', $tweets[$i]['text'])->first() ?>
                                @if(!$list)
                                <div class="form-group">
                                    <div class="col-sm-offset-3 col-sm-6">
                                        <button type="submit" class="btn btn-default">
                                            <i class="fa fa-plus"></i> Mark As ticket
                                        </button>
                                    </div>
                                </div>
                                @endif
                               


                                </td>
                                        {{ Form::close() }}
                            </tr>
                 


                    </tbody>
                </table>
                <table>
                                        <!-- Table Headings -->
                    <thead>
                        <th>Replies</th>
                        <th>&nbsp;</th>
                    </thead>
                    <tdbody>
                           @for($j = 0;$j < count($result);$j++)
                                <tr>
                                    <td>
                                    <p>{{$result[$j]['user']['name']}}</p>
                                    </td>
                                    <td>
                                    <p>{{$result[$j]['text']}}</p>
                                    </td>
                                </tr>
                                @endfor  
                    </tbody>
                </table>
                @endfor
            </div>
        </div>
    @endif
@endsection
