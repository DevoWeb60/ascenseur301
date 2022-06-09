<?php

if (isset($_GET['title'])) {
    $title = htmlspecialchars(trim($_GET['title']));
} else {
    $title = "Pas défaut";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../src/style/css/styles.min.css">
    <title><?= $title ?></title>
</head>

<body>
    <h1><?= ucfirst($title) ?></h1>
</body>

</html>