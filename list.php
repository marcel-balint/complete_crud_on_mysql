<?php

require_once './lib/bootstrap.php';

$cities  = DB::select('
SELECT *
FROM `cities`
ORDER BY `name` ASC
LIMIT 0, 20
', [], 'City');

// var_dump($cities->name);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP CRUD on MySql</title>
</head>

<body>
    <?php include './components/alerts.php' ?>

    <a href="create.php">Create a new city</a>
    <ul>
        <?php foreach ($cities as $city) : ?>
            <li>

                <p>City name: <?= $city->name ?></p>
                <p>City district: <?= $city->district ?></p>
                <p>City population: <?= $city->population ?></p>
                <p>Edit <a href="edit.php?id=<?= $city->id ?>">here</a>
                    Delete <a href="delete.php?id=<?= $city->id ?>">here</a>
                </p>
            </li>
        <?php endforeach; ?>
    </ul>

</body>

</html>