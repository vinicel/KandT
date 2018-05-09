<?php
/**
 * Created by PhpStorm.
 * User: guillaume
 * Date: 01/05/2018
 * Time: 18:08
 */

require_once "connection.php";
if (empty($_POST['slug']) || empty($_POST['title']) || empty($_POST['h1']) || empty($_POST['p']) || empty($_POST['span-class'])||
    empty($_POST['span-text']) || empty($_POST['img-alt']) || empty($_POST['img-src']) ||
    empty($_POST['nav-title'])) {
    header('Location: error.php');
    exit;
}

$request = 'UPDATE
            `page`
            SET
            `slug`= :slug,
            `title` = :title,
            `h1`= :h1,
            `p` = :p,
            `span-class` = :spanclass ,
            `span-text` = :spantext,
            `img-alt` = :imgalt,
            `img-src` = :imgsrc,
            `nav-title` = :navtitle
            WHERE
            `id`= :id
;';
$stmt = $connection->prepare($request);
$stmt->bindParam(':id', htmlentities($_POST['id']));
$stmt->bindParam(':slug', htmlentities($_POST['slug']));
$stmt->bindParam(':title', htmlentities($_POST['title']));
$stmt->bindParam(':h1', htmlentities($_POST['h1']));
$stmt->bindParam(':p', htmlentities($_POST['p']));
$stmt->bindParam(':spanclass', htmlentities($_POST['span-class']));
$stmt->bindParam(':spantext', htmlentities($_POST['span-text']));
$stmt->bindParam(':imgalt', htmlentities($_POST['img-alt']));
$stmt->bindParam(':imgsrc', htmlentities($_POST['img-src']));
$stmt->bindParam(':navtitle', htmlentities($_POST['nav-title']));
$stmt->execute();
header('Location: admin.php');