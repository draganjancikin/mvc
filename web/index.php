<?php
require __DIR__ . '/../vendor/autoload.php';

use Roloffice\Core\App;
use Roloffice\Core\Router;
use Roloffice\Core\Request;
use Roloffice\Core\Response;

Router::get('/', function () {
    echo 'Hello World';
});

Router::get('/post/([0-9]*)', function (Request $req, Response $res) {
    $res->toJSON([
        'post' =>  ['id' => $req->params[0]],
        'status' => 'ok'
    ]);
});

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