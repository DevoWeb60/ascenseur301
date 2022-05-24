<?php 
   include_once './class/Functions.php';

   // FORCE TO GET PAGE VALUE
   if(!isset($_GET['page'])){
      $_GET['page'] = "accueil";
   }

   // INCLUDE HEAD AND DOCTYPE
   include_once "./pages/layout/head.php";

   // HEADER
   include './pages/layout/header.php'; 

   // ROUTING
   switch($_GET['page']){
      case "accueil": 
         include './pages/home.php';
         break;
      case "agence": 
         include './pages/agency.php';
         break;
      case "equipe": 
         include './pages/team.php';
         break;
      case "realisation": 
         include './pages/reels.php';
         break;
      case "contact": 
         include './pages/contact.php';
         break;
      default:
         include './pages/404.php';
         break;
      
   }

   // INCLUDE FOOTER, JAVASCRIPT AND END OF DOCTYPE
   include_once "./pages/layout/footer.php";