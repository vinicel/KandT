<?php
/**
 * Created by PhpStorm.
 * User: guillaume
 * Date: 01/05/2018
 * Time: 18:08
 */

require_once "connection.php";

$request = 'SELECT
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
            `id`= :id
;';
$stmt = $connection->prepare($request);
$stmt->bindParam(':id', $_GET['id']);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<body>
        <h1><strong>Supprimez</strong></h1>
        <form action="doDelete.php" method="post">
            <input type="hidden" name="id" value="<?=$row['id']?>" placeholder="">
            <input type="submit" name="envoy" value="supprimer">
        </form>
</body>
