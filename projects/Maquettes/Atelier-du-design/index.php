<?php 
   include_once './class/Functions.php';
   $Functions = new Functions();
?>
<!DOCTYPE html>
<html lang="fr">
   <head>
      <meta charset="UTF-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <link rel="shortcut icon" href="../../../views/assets/favicon.png" type="image/x-icon">
      <link rel="stylesheet" href="./src/style/css/styles.min.css" />
      <title>Ol'Project</title>
   </head>
   <body>
      <?php 
         include './pages/layout/header.php'; 
         if(!isset($_GET['page'])){
            include_once './pages/home.php';
         }else{

         }
      ?>

      <script src="main.js" type="module"></script>
   </body>
</html>
