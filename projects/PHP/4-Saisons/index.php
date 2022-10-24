<?php
$saisons = array(
   0 => array('nom' => 'Été', 'image' => 'ete.jpg'),
   1 => array('nom' => 'Automne', 'image' => 'automne.jpg'),
   2 => array('nom' => 'Hiver', 'image' => 'hiver.jpg'),
   3 => array('nom' => 'Printemps', 'image' => 'printemps.jpg'),
);

$saisons = json_encode($saisons);
$saisons = json_decode($saisons);

?>

<!DOCTYPE html>
<html lang="fr">

<head>
   <meta charset="UTF-8" />
   <meta http-equiv="X-UA-Compatible" content="IE=edge" />
   <meta name="viewport" content="width=device-width, initial-scale=1.0" />
   <base href="/projects/PHP/4-Saisons/" />
   <link rel="shortcut icon" href="../../../views/assets/favicon.png" type="image/x-icon" />
   <script src="https://kit.fontawesome.com/8ce2cffc6a.js" crossorigin="anonymous"></script>
   <link rel="stylesheet" href="./src/style/css/styles.min.css" />
   <title>Ol'Project</title>
</head>

<body>
   <header>
      <h1>Les 4 saisons</h1>
   </header>

   <div class="container">
      <?php foreach ($saisons as $saison) : ?>
         <div class="season" style="background-image: url(./src/img/<?= $saison->image ?>)">
            <h2><?= $saison->nom ?></h2>
         </div>
      <?php endforeach; ?>
   </div>

   <div class="modal">
      <img src="" alt="">
   </div>

   <script src="main.js" type="module"></script>
</body>

</html>