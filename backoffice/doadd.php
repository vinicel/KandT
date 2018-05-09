<?php
/**
 * Created by PhpStorm.
 * User: guillaume
 * Date: 19/04/2018
 * Time: 19:14
 */

require_once "connection.php";

if (empty($_POST['title']) || empty($_POST['h1']) || empty($_POST['p']) || empty($_POST['span-class'])||
    empty($_POST['span-text']) || empty($_POST['img-alt']) || empty($_POST['img-src']) ||
    empty($_POST['nav-title']) || empty($_POST['slug'])) {
    header('Location: error.php');
    exit;
}
$request = 'INSERT INTO
          `page` 
          ( `title`, `h1` ,`p` ,`span-class` ,`span-text` ,`img-alt` ,`img-src` ,`nav-title` ,`slug`)
        VALUES
          ( :title ,:h1 ,:p ,:spanclass ,:spantext ,:imgalt ,:imgsrc ,:navtitle ,:slug)
;';
$stmt = $connection->prepare($request);
$stmt->bindParam(':title', htmlentities($_POST['title']));
$stmt->bindParam(':h1', htmlentities($_POST['h1']));
$stmt->bindParam(':p', htmlentities($_POST['p']));
$stmt->bindParam(':spanclass', htmlentities($_POST['span-class']));
$stmt->bindParam(':spantext', htmlentities($_POST['span-text']));
$stmt->bindParam(':imgalt', htmlentities($_POST['img-alt']));
$stmt->bindParam(':imgsrc', htmlentities($_POST['img-src']));
$stmt->bindParam(':navtitle', htmlentities($_POST['nav-title']));
$stmt->bindParam(':slug', htmlentities($_POST['slug']));
$stmt->execute();
header('Location: admin.php');
