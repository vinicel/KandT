<?php
/**
 * Created by PhpStorm.
 * User: guillaume
 * Date: 05/03/2018
 * Time: 14:58
 */

$host = '127.0.0.1';
$dbname = 'kandt';
$username = 'root';
$password = '';

/* connexion à la db, on catch une eventuelle erreur de connexion*/
try {
    $connection = new PDO('mysql:host='.$host.';dbname='.$dbname.';', $username, $password);

} catch (PDOException $exception){
    die($exception -> getMessage());
}
