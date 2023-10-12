<?php
require_once './lib/bootstrap.php';

$city = new City;
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php include './components/alerts.php' ?>
    <form action="insert.php" method="post">
        <!-- display the form prefilled with entity data -->
        Name:<br>
        <input type="text" name="name" value="<?= htmlspecialchars((string) old('name', $city->name)) ?>"><br>
        <br>
        District:<br>
        <input type="text" name="district" value="<?= htmlspecialchars((string) old('district', $city->district)) ?>"><br>
        <br>
        Population:<br>
        <input type="text" name="population" value="<?= htmlspecialchars((int) old('population', $city->population)) ?>"> <br>
        <br>
        <button type="submit">Save</button>

    </form>

</body>

</html>