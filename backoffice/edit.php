<?php
/**
 * Created by PhpStorm.
 * User: guillaume
 * Date: 01/05/2018
 * Time: 18:09
 */

require_once "connection.php";

$request = 'SELECT
                `id`,
                `title`,
                `h1`,
                `p`,
                `span-class`,
                `span-text`,
                `img-alt`,
                `img-src`,
                `nav-title`,
                `slug`
                FROM
                `page`
                WHERE
                `id` = :id
                ;';

$stmt = $connection->prepare($request);
$stmt->bindParam(':id', $_GET['id']);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="../bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <div class="row">
        <h1><strong>Modifier</strong></h1>
        <form action="doedit.php" method="post">
            <input type="hidden" name="id" value="<?=$_GET['id']?>" placeholder="id">
            <input placeholder="title" value="<?=$row['title']?>" type="text" name="title">
            <input placeholder="h1" value="<?=$row['h1']?>" type="text" name="h1">
            <input placeholder="p" value="<?=$row['p']?>" type="text" name="p">
            <input placeholder="span-class" value="<?=$row['span-class']?>" type="text" name="span-class">
            <input placeholder="span-text" value="<?=$row['span-text']?>" type="text" name="span-text">
            <input placeholder="img-alt" value="<?=$row['img-alt']?>" type="text" name="img-alt">
            <input placeholder="img-src" value="<?=$row['img-src']?>" type="text" name="img-src">
            <input placeholder="nav-title" value="<?=$row['nav-title']?>" type="text" name="nav-title">
            <input placeholder="slug" value="<?=$row['slug']?>" type="text" name="slug">
            <input placeholder="title" type="submit" value="Modifier">
        </form>
    </div>
</body>
</html>
