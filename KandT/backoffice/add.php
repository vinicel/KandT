<?php include "includes/header.php"?>

<form class="formulaire" action="doadd.php" method="post">
    <input name="titre" placeholder="h1" type="text">
    <input name="para" placeholder="P" type="text">
    <input name="span" placeholder="span" type="text">
    <input name="image" placeholder="Image" type="file">
    <input class="submitInput" type="submit" value="Ajouter">
</form>
<?php include "includes/footer.php"?>