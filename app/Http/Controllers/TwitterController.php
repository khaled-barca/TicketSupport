<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\CreateProjectRequest;
use App\Project;
use App\Ticket;
use App\User;
use \Twitter;
class TwitterController extends Controller
{
    //
        public function receive(){
            Twitter::getMentionsTimeline(['count' => 20, 'format' => 'json']);
            $tweets = json_decode(Twitter::getMentionsTimeline(['count' => 20, 'format' => 'json']), true);  
            #return Twitter::getMentionsTimeline(['count' => 20, 'format' => 'json']);
            $temp = array();
            $result = array();
            for($i = 0;$i<count($tweets);$i++){
                if($tweets[$i]['in_reply_to_status_id_str']==null){
                    array_push($temp, $tweets[$i]);
                }
            }
            for($i = 0;$i<count($temp);$i++){
                for($j =0;$j<count($tweets);$j++){
                if($tweets[$j]['in_reply_to_status_id_str']==$temp[$i]['id']){
                    array_push($result, $tweets[$j]);
                }    
                }
                
            }
        return view('tweets.index', [
        'tweets' => $temp,
        'result' => $result,
    ]);
    }
    
}
