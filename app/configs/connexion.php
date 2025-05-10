<?php
require_once __DIR__ . '/../../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../../');
$dotenv->load();

define('DB_SERVEUR', $_ENV['DB_SERVEUR']);
define('DB_NOM', $_ENV['DB_NOM']);
define('DB_DSN', 'pgsql:host=' . DB_SERVEUR . ';dbname=' . DB_NOM . ';port=5432');
define('DB_LOGIN', $_ENV['DB_LOGIN']);
define('DB_PASSWORD', $_ENV['DB_PASSWORD']);

global $oPDO;

$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_EMULATE_PREPARES => false
];

$oPDO = new PDO(DB_DSN, DB_LOGIN, DB_PASSWORD, $options);
