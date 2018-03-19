<?php
/**
 * Created by PhpStorm.
 * User: guillaume
 * Date: 05/03/2018
 * Time: 14:24
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
$stmt->bindValue(':titre', htmlentities($_POST['titre']));
$stmt->bindValue(':para', htmlentities($_POST['para']));
$stmt->bindValue(':span', htmlentities($_POST['span']));
$stmt->bindValue(':image', htmlentities($_FILES['image']['name']));
$stmt->execute();

header('location: index.php');