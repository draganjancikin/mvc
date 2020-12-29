<?php
require __DIR__ . '/../vendor/autoload.php';

use Roloffice\Core\App;
use Roloffice\Core\Router;
use Roloffice\Core\Request;
use Roloffice\Core\Response;

use Roloffice\Controller\HomeController;

use Roloffice\Model\ClientsModel;

ClientsModel::load();

Router::get('/', function () {
    (new HomeController())->indexAction();
});

Router::get('/clients', function (Request $req, Response $res) {
    $res->toJSON(ClientsModel::all());
});

Router::post('/client', function (Request $req, Response $res) {
    $client = ClientsModel::add($req->getJSON());
    $res->status(201)->toJSON($client);
});

Router::get('/client/([0-9]*)', function (Request $req, Response $res) {
    $client = ClientsModel::findById($req->params[0]);
    if ($client) {
        $res->toJSON($client);
    } else {
        $res->status(404)->toJSON(['error' => "Not Found"]);
    }
});

App::run();

/*
// old index bafore App::run();

use Roloffice\Core\Config;
use Roloffice\Core\Logger;

$LOG_PATH = Config::get('LOG_PATH', '');
echo "[LOG_PATH]: $LOG_PATH";

Logger::enableSystemLogs();
$logger = Logger::getInstance();
$logger->info('Hello World');
*/