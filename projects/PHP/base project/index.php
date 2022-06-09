<?php
$arianes = ["Accueil", "Séries", "Humour", "Le Flambeau", "Phillipe Machette"];

$hour = date('H') + 2;
$min = date('i');
$sec = date('s');

$rayon = 28;

$nbCroissant = 5;
$prixCroissant = 0.95;
$nbPain = 1;
$prixPain = 0.80;
$nbCroissantChoco = 3;
$prixCroissantChoco = 1.15;

$croissant = $nbCroissant * $prixCroissant;
$pain = $nbPain * $prixPain;
$croissantChoco = $nbCroissantChoco * $prixCroissantChoco;

$totalDej = $croissant + $pain + $croissantChoco;

$a = 25;


?>

<!DOCTYPE html>
<html lang="fr">

<head>
   <meta charset="UTF-8" />
   <meta http-equiv="X-UA-Compatible" content="IE=edge" />
   <meta name="viewport" content="width=device-width, initial-scale=1.0" />
   <link rel="shortcut icon" href="../../../views/assets/favicon.png" type="image/x-icon" />
   <script src="https://kit.fontawesome.com/8ce2cffc6a.js" crossorigin="anonymous"></script>
   <link rel="stylesheet" href="./src/style/css/styles.min.css" />
   <title>Ol'Project</title>
</head>

<body class="<?= $sec % 2 === 0 ? "salmon" : null ?>">

   <!-- !FIL D'ARIANE -->
   <p class="ariane <?= $sec % 2 === 0 ? "salmon" : null ?>">
      <?php for ($i = 0; $i < count($arianes); $i++) {
         if ($i !== count($arianes) - 1) { ?>
            <a href="./pages/getPage.php?title=<?= urlencode(strtolower($arianes[$i])) ?>" target="_blank"><?= $arianes[$i] ?></a>
            &gt;
         <?php } else { ?>
            <a href="./pages/getPage.php?title=<?= urlencode(strtolower($arianes[$i])) ?>" target="_blank"><?= $arianes[$i] ?></a>
      <?php }
      }
      ?>
   </p>

   <!-- !PROBLEME -->
   <h1><?= $hour . ":" . $min . ":" . $sec ?></h1>
   <h3>Périmètre Cercle 28m : <?= round(2 * pi() * $rayon, 2) ?> mètres.</h3>
   <h3>Le petit Dej de Valentin coûte <?= $totalDej ?>€.</h3>
   <h3>Nathan avait <?= 19 + 48 ?>€ avant de se faire racketter par sa mère.</h3>

   <!-- !EXERCICE VARIABLES -->
   <div class="card <?= $sec % 2 === 0 ? "salmon" : null ?> ">
      <h2>Exercice de variables</h2>
      <p>A <strong><?= $a ?></strong></p>
      <p>A += 15 <strong><?= $a += 15 ?></strong></p>
      <p>A = A--
         <strong>
            <?php $a--;
            echo $a ?>
         </strong>
      </p>
      <p>B = A - 10 <strong><?= $b = $a - 10 ?></strong></p>
      <p>A % B <strong><?= $a % $b ?></strong></p>
   </div>

   <!-- !SELECT -->
   <select name="years" id="years" class="<?= $sec % 2 === 0 ? "salmon" : null ?>">
      <option value="" disabled>Choisir une années</option>
      <?php for ($i = date('Y'); $i >= 1900; $i--) : ?>
         <option value="<?= $i ?>" <?= $i === 1996 ? "selected" : null ?>><?= $i ?> <?= $i === 1996 ? "les bgs" : null ?></option>
      <?php endfor; ?>
   </select>

   <!-- !TABLES -->
   <div class="container">
      <?php for ($j = 1; $j <= 10; $j++) : ?>
         <table class="<?= $sec % 2 === 0 ? "salmon" : null ?>">
            <tr>
               <th colspan="5">
                  Table de <?= $j ?>
               </th>
            </tr>
            <?php for ($i = 1; $i <= 10; $i++) : ?>
               <tr>
                  <td><?= $j ?></td>
                  <td>x</td>
                  <td><?= $i ?></td>
                  <td>=</td>
                  <td class="result"><?= $j * $i ?></td>
               </tr>
            <?php endfor; ?>
         </table>
      <?php endfor; ?>
   </div>

   <script src="main.js" type="module"></script>
</body>

</html>