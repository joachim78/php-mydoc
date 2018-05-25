<?php
require_once 'MysqliAdapter.php';
require_once 'PDOAdapter.php';

$config = [
    'host' => 'localhost',
    'user' => 'root',
    'password' => '',
    'database' => 'media'
];

$dbMysqli = new db\MysqliAdapter($config);
$dbMysqli->connect();
$result = $dbMysqli->query("SELECT * FROM geoblock LIMIT 2");
while ($row = $dbMysqli->fetchObject($result)) {
    echo "<pre>" . print_r($row, true) . "</pre>";
}

/*$pdo = new \db\PDOAdapter($config);
$pdo->connect();*/
