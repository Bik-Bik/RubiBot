<?php

use GuzzleHttp\Client;
use Rubi\RubiBot\Bot;

require __DIR__."/../vendor/autoload.php";
$config = json_decode(file_get_contents(__DIR__ . "/../config.json"));
$bot=new Bot($config->bottoken);
$bot->chatId=$config->chatId2;
//$bot->sendMessage("Hallo! Ich wünsche dir einen wunderschönen Tag! Vergiss nicht, dankbar zu sein!!!\n",$config->chatId);

$bot->getUpdates();