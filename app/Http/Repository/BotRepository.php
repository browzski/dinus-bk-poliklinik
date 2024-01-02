<?php

namespace App\Http\Repository;

use App\Models\GitlabDataModel;
use Telegram\Bot\Laravel\Facades\Telegram;

class BotRepository
{
    public static function handlePush(GitlabDataModel $gitlab_data,Object $json){
        $message ="*Push! {$json->project->name}*".PHP_EOL.PHP_EOL;
        $message .= "*{$json->user_name}*  {$json->event_name} ke [{$json->ref}]({$json->project->web_url})".PHP_EOL;
        foreach($json->commits as $commit){
            $message .= "*{$commit->author->name}:* [{$commit->message}]({$commit->url})".PHP_EOL;
        }
        $message .= PHP_EOL."*Total :* {$json->total_commits_count} commits";

        foreach($gitlab_data->chatIds as $chatId){
            $telegram = Telegram::sendMessage([
                'chat_id' => $chatId->chat_id,
                'text' => $message,
                'parse_mode' => 'markdown'

            ]);

        }
       
        return $telegram;
    }
}
