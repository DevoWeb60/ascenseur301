<?php
$arianes = ["Accueil", "Séries", "Humour", "Le Flambeau", "Phillipe Machette"];

$hour = date('H') + 2;
$min = date('i');
$sec = date('s');
$year = date('Y');
$month = date('m');
$date = date('d');
$day = date('l');

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

$years = array_combine(range(1900, date('Y')), range(1900, date('Y')));
$dateNumbers = array_combine(range(1, 31), range(1, 31));
$monthsInFrench = [
   "01" => "Janvier",
   "02" => "Février",
   "03" => "Mars",
   "04" => "Avril",
   "05" => "Mai",
   "06" => "Juin",
   "07" => "Juillet",
   "08" => "Août",
   "09" => "Septembre",
   "10" => "Octobre",
   "11" => "Novembre",
   "12" => "Décembre"
];
$daysInFrench = [
   "Monday" => "Lundi",
   "Tuesday" => "Mardi",
   "Wednesday" => "Mercredi",
   "Thursday" => "Jeudi",
   "Friday" => "Vendredi",
   "Saturday" => "Samedi",
   "Sunday" => "Dimanche"
];

function debug($var)
{
   echo '<pre>';
   var_dump($var);
   echo '</pre>';
}

function addSelect($arr, $autocomplete, $name)
{
   echo '<select name="' . $name . '" id="' . $name . '">';
   foreach ($arr as $key => $value) {
      if ($autocomplete == $key) {
         echo '<option value="' . $key . '" selected>' . $value . '</option>';
      } else {
         echo '<option value="' . $key . '">' . $value . '</option>';
      }
      echo  $value;
      echo '</option>';
   }
   echo  '</select>';
}

$users = [
   "phillipe" => [
      "name" => "Phillipe",
      "firstname" => "Machette",
      "age" => "25",
   ],
   "jean" => [
      "name" => "Jean",
      "firstname" => "Dupont",
      "age" => "35",
   ],
];


?>

<!DOCTYPE html>
<html lang="fr">

<head>
   <meta charset="UTF-8" />
   <meta http-equiv="X-UA-Compatible" content="IE=edge" />
   <meta name="viewport" content="width=device-width, initial-scale=1.0" />
   <link rel="shortcut icon" href="../../../views/assets/favicon.png" type="image/x-icon" />
   <base href="/projects/PHP/Introduction/" />
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

   <h1><?= $hour . ":" . $min . ":" . $sec ?></h1>
   <!-- !SELECT -->
   <div class="select <?= $sec % 2 === 0 ? "salmon" : null ?>">
      <?php addSelect($daysInFrench, $day, "day"); ?>
      <?php addSelect($dateNumbers, $date, "date"); ?>
      <?php addSelect($monthsInFrench, $month, "month"); ?>
      <?php addSelect($years, $year, "year"); ?>
   </div>

   <!-- !PROBLEME -->
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

   <?php
   echo '<ul>';
   foreach ($users as $lastname => $user) {
      echo "<li style=\"text-transform:uppercase\">$lastname</li>";
      echo "<li><ul>";
      foreach ($user as $key => $value) {
         echo "<li>$value</li>";
      }
      echo "</ul></li>";
   }
   echo '</ul>';

   ?>

   <script src="main.js" type="module"></script>
</body>

</html>