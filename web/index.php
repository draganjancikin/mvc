<?php
require __DIR__ . '/../vendor/autoload.php';

use Roloffice\Core\App;
use Roloffice\Core\Router;
use Roloffice\Core\Request;
use Roloffice\Core\Response;

use Roloffice\Controller\HomeController;

Router::get('/', function () {
    (new HomeController())->indexAction();
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