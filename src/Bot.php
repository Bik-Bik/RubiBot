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

    public function sendMessage(string $message)
    {
        $params = [
            'query' => [
                'chat_id' => $this->chatId,
                'text' => $message
            ]
        ];
        $this->client->get( "sendMessage", $params);
    }

    public function getUpdates()
    {

        $response = $this->client->get("getUpdates");

        $updates = json_decode($response->getBody()->getContents());

        foreach ($updates->result as $result){
            $user=$result->message->from->username;
            $text=$result->message->text;
            print "Nachricht von $user: $text\n";
        }

    }
}