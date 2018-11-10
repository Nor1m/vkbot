<?php

use App\base\Config;
use App\base\Message;
use App\Log;
use App\ServerHandler;
use VK\Client\VKApiClient;

if (!isset($_REQUEST)) {
    return;
}

require_once "app/config/env.php";
require_once "vendor/autoload.php";

Log::init(ROOT_PATH . 'storage/logs/log.txt');

Log::write("Загрузка проекта");

$vk = new VKApiClient();

Message::init($vk);
Config::init(ROOT_PATH . 'app/config/');

$handler = new ServerHandler($vk);

$data = json_decode(file_get_contents('php://input'));

$handler->parse($data);

Log::close();