<?php

namespace Rubi\RubiBot;

use GuzzleHttp\Client;

class Bot
{
    private Client $client;
    public int $chatId;

    public function __construct(string $token)
    {
        $this->client = new Client([
            'base_uri' => "https://api.telegram.org/bot$token/"
        ]);
    }

    private function botRequest(string $uri, array $query = [])
    {
        $params = [
            'query' => $query
        ];
        $response = $this->client->get($uri, $params);
        $json = json_decode($response->getBody()->getContents());

        return $json;
    }

    public function sendMessage(string $message)
    {
        $this->botRequest("sendMessage", [
            'chat_id' => $this->chatId,
            'text' => $message
        ]);
    }

    public function getUpdates()
    {

        $updates = $this->botRequest("getUpdates");
        $updateId = 0;
        foreach ($updates->result as $result) {
            $updateId = $result->update_id + 1;
            $user = $result->message->from->username;
            $text = $result->message->text;
            print "Nachricht von $user: $text\n";
            if(strpos($text,"Marco")!==false){
                $this->chatId= $result->message->chat->id;
                $this->sendMessage("Polo!\n");
            }

        }
        $this->botRequest("getUpdates", ["offset" => $updateId]);

    }
}