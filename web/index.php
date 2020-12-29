<?php

require __DIR__ . '/../vendor/autoload.php';
use Roloffice\Core\App;
App::run();

/*
// old index bafore App::run();
require __DIR__ . '/../vendor/autoload.php';

use Roloffice\Core\Config;
use Roloffice\Core\Logger;

$LOG_PATH = Config::get('LOG_PATH', '');
echo "[LOG_PATH]: $LOG_PATH";

Logger::enableSystemLogs();
$logger = Logger::getInstance();
$logger->info('Hello World');
*/