<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\CreateProjectRequest;
use App\Project;
use App\Ticket;
use App\User;
use \Twitter;
use File;
use App\Http\Requests\CreateSettingsRequest;
class TwitterController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
        public function receive(){
            Twitter::getMentionsTimeline(['count' => 20, 'format' => 'json', 'contributor_details' => true]);
            $tweets = json_decode(Twitter::getMentionsTimeline(['count' => 20, 'format' => 'json']), true);  
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
    public function editSettings(){
        return view('twitter.edit');
    }   
      public function storeSettings(CreateSettingsRequest $request){
        $path = base_path('config/twitter.php');
        $contents = File::get($path);
        $contents = str_replace('%CONSUMER_KEY%', $request->consumer_key, $contents);
        $contents = str_replace('%CONSUMER_SECRET%', $request->consumer_secret, $contents);
        $contents = str_replace('%ACCESS_TOKEN%', $request->access_token, $contents);
        $contents = str_replace('%ACCESS_TOKEN_SECRET%', $request->access_token_secret, $contents);
        $path2 = base_path('config/ttwitter.php');
        File::put($path2, $contents);
        return redirect(action('HomeController@index'));
    }   
    
}
