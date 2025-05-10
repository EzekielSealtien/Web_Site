<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

define('DB_SERVEUR', getenv('DB_SERVEUR'));
define('DB_NOM', getenv('DB_NOM'));
define('DB_DSN', 'pgsql:host=' . DB_SERVEUR . ';dbname=' . DB_NOM . ';port=5432');
define('DB_LOGIN', getenv('DB_LOGIN'));
define('DB_PASSWORD', getenv('DB_PASSWORD'));

global $oPDO;

$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_EMULATE_PREPARES => false
];

$oPDO = new PDO(DB_DSN, DB_LOGIN, DB_PASSWORD, $options);
