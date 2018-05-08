<?php
/**
 * Created by PhpStorm.
 * User: guillaume
 * Date: 05/05/2018
 * Time: 17:39
 */

require_once "connection.php";

$request = "SELECT 
          `id`,
          `slug`,
          `title`,
          `h1`,
          `p`,
          `span-class`,
          `span-text`,
          `img-alt`,
          `img-src`,
          `nav-title`
        FROM
        `page`
        WHERE 
        `id` = :id
        ;";

$stmt = $connection->prepare($request);
$stmt->bindParam(':id', $_GET['id']);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
if ($row === false) {
    header("Location: index.php?error=nodatatodetails");
    exit;
}
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="../public/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="../public/bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">
    <title>Info</title>
</head>
<body>
<div class="container admin">
    <div class="row">
    <div class="rightContainer">
        <div>
            <a style="font-size: 50px;" href="admin.php">Retour vers l'admin</a>
        </div>
        <?php if(!empty($row['id'])) {?>
            <div class="">
                <h2 class="">ID de la l'article</h2>
                <p id="" class=""><?=$row['id']?></p>
            </div>
        <?php } ?>
        <?php if(!empty($row['title'])) {?>
            <div class="">
                <h2 class="">Title</h2>
                <p id="" class=""><?=$row['title']?></p>
            </div>
        <?php } ?>
        <?php if(!empty($row['h1'])) {?>
            <div class="">
                <h2 class="">H1</h2>
                <p id="" class=""><?=$row['h1']?></p>
            </div>
        <?php } ?>
        <?php if(!empty($row['p'])) {?>
            <div class="-">
                <h2 class="">Paragraphe</h2>
                <p id="" class=""><?=$row['p']?></p>
            </div>
        <?php } ?>
        <?php if(!empty($row['span-class'])) {?>
            <div class="">
                <h2 class="">Class</h2>
                <p id="" class=""><?=$row['span-class']?></p>
            </div>
        <?php } ?>
        <?php if(!empty($row['span-text'])) {?>
            <div class="">
                <h2 class="">texte</h2>
                <p id="" class=""><?=$row['span-text']?></p>
            </div>
        <?php } ?>
        <?php if(!empty($row['img-alt'])) {?>
            <div class="">
                <h2 class="">Image alt</h2>
                <p id="" class=""><?=$row['img-alt']?></p>
            </div>
        <?php } ?>
        <?php if(!empty($row['img-src'])) {?>
            <div class="">
                <h2 class="">Lien de l'image</h2>
                <p id="" class=""><?=$row['img-src']?></p>
            </div>
        <?php } ?>
        <?php if(!empty($row['nav-title'])) {?>
            <div class="">
                <h2 class="">Nom dans la navbar</h2>
                <p id="" class=""><?=$row['nav-title']?></p>
            </div>
        <?php } ?>
        <?php if(!empty($row['slug'])) {?>
            <div class="">
                <h2 class="">Slug</h2>
                <p id="" class=""><?=$row['slug']?></p>
            </div>
        <?php } ?>
        <a href="edit.php?id=<?=$row['id']?>">Modifier</a>
        <a href="delete.php?id=<?=$row['id']?>">Supprimer</a>
    </div>
</div>
</body>
</html>
