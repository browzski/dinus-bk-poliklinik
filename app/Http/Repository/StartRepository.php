<?php

namespace App\Http\Repository;

use App\Models\ChatIDSModel;
use App\Models\GitlabDataModel;
use App\Models\GitlabMessagesModel;
use Illuminate\Support\Str;
class StartRepository
{
    public static function start($chat_id){

        $data = GitlabDataModel::create([
            'token' => Str::uuid(),
        ]);
        ChatIDSModel::create([
            'gitlab_token' => $data->token,
            'chat_id' => $chat_id
        ]);
        GitlabMessagesModel::create([
            'token' => $data->token,
            'type' => 'push',
            'message_id' => 1
        ]);

        return $data;
      


    }
}
