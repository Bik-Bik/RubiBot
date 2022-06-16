<?php

use GuzzleHttp\Client;

require __DIR__."/../vendor/autoload.php";
$config = json_decode(file_get_contents(__DIR__ . "/../config.json"));

$boturl = "https://api.telegram.org/bot$config->bottoken/";


$client = new Client();
$params = [
    'query' => [
        'chat_id' => $config->ChatID,
        'text' => 'Danke Marco'
    ]
];
//$client->get($boturl."sendMessage",$params);
$response=$client->get($boturl."getUpdates");

$updates=json_decode($response->getBody()->getContents());
var_dump($updates);