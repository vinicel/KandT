<?php
/**
 * Created by PhpStorm.
 * User: guillaume
 * Date: 21/03/2018
 * Time: 14:47
 */

if (empty($_POST['titre']) || empty($_POST['para']) || empty($_POST['span']) || empty($_FILES['image']['name'])) {
    header('Location: index.php?error');
    exit;
}
$requests = "INSERT INTO 
`kandt`
(`titre`, `para`, `span`, `image`)
VALUES
(:titre, :para, :span, :image)
;";
$uploadfile = 'img/'.$_FILES['image']['name'];
move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile);
$stmt = $connection->prepare($request);
$stmt->bindValue(':slug', htmlentities($_POST['slug']));
$stmt->bindValue(':nav-title', htmlentities($_POST['nav-title']));
$stmt->bindValue(':title', htmlentities($_POST['title']));
$stmt->bindValue(':h1', htmlentities($_POST['h1']));
$stmt->bindValue(':p', htmlentities($_POST['p']));
$stmt->bindValue(':span-class', htmlentities($_POST['span-class']));
$stmt->bindValue(':span-text', htmlentities($_POST['span-text']));
$stmt->bindValue(':img-alt', htmlentities($_POST['img-alt']));
$stmt->bindValue(':img-src', htmlentities($_FILES['img-src']['name']));
$stmt->execute();
header('location: index.php');