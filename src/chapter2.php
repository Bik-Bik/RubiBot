<?php
$config = json_decode(file_get_contents(__DIR__."/../config.json"));
var_dump($config->bottoken);
