<body>
            <h1><strong>Liste des pages</strong></h1>
            <table>
                <thead>
                <tr>
                    <th>Id</th>
                    <th>title</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                require_once "connection.php";
                $request = 'SELECT
                        `id`,
                        `title`
                        FROM
                        `page`
                        ;';
                $stmt = $connection->prepare($request);
                $stmt->execute();
                while (false !== $row = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
                <td><?=$row["id"]?></td>
                <td><?=$row["title"]?></td>
                <td><a href="show.php?id=<?=$row['id']?>">Voir</td>
                </tbody>
                <?php endwhile;?>
            </table>

            <h1><strong>Ajouter un article</strong></h1>
            <form action="doadd.php" method="post">
                <input placeholder="title" type="text" name="title">
                <input placeholder="h1" type="text" name="h1">
                <input placeholder="p" type="text" name="p">
                <input placeholder="span-class" type="text" name="span-class">
                <input placeholder="span-text" type="text" name="span-text">
                <input placeholder="img-alt" type="text" name="img-alt">
                <input placeholder="img-src" type="file" name="img-src">
                <input placeholder="nav-title" type="text" name="nav-title">
                <input placeholder="slug" type="text" name="slug">
                <input placeholder="title" type="submit" value="Ajouter">
            </form>
</body>