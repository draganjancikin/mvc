<?php
require __DIR__ . '/../vendor/autoload.php';

use Roloffice\Core\Config;

$LOG_PATH = Config::get('LOG_PATH', '');
echo "[LOG_PATH]: $LOG_PATH";