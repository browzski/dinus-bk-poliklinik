<?php

namespace App\Http\Controllers;

use App\Command\StartCommand;
use App\Http\Repository\BotRepository;
use App\Models\GitlabDataModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Telegram\Bot\Api;
use Telegram\Bot\Laravel\Facades\Telegram;

class BotController extends Controller
{
    
    public function index(){

    }
    public function getUpdates(){
        while(true){
            Telegram::commandsHandler(false);
            $response = Telegram::getUpdates();
        }
    }

    public function webhook($token){
        $url = 'public/webhook/'.$token."/push/2023-12-25_11-10-26.json";
        $gitlab_data = GitlabDataModel::where('token',$token)->first();
        $json = Storage::get($url);
        $json = json_decode($json);
        $event = $json->event_name;
        if($event == "push"){
            BotRepository::handlePush($gitlab_data,$json);
        }
        // TODO : Other Event

        
    }
}
