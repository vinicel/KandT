<?php
try {
    $connection = new PDO('mysql:host=127.0.0.1;dbname=kandt', 'root','');
} catch (PDOException $exception) {
    die($exception->getMessage());
}
$connection->exec('SET NAMES UTF8');
