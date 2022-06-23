<?php
require_once './src/utils/functions.php';
require_once './src/utils/database.php';

session_start();

if (isset($_GET['newgame'])) {
   $_SESSION['questionCount'] = [];
   $_SESSION['score'] = 0;
}


$title = "Home";

if (isset($_GET['page'])) {
   $title = htmlspecialchars(trim($_GET['page']));
}

$answerSelect = getGetParams('answer');
$questionSelect = getGetParams('question');
$getResult = getGetParams('result');

$rootPage = "index.php?page=Home";

$pages = [
   'Home' => $rootPage,
   'Fin de partie' => "index.php?page=Fin de partie",
];

if (!isset($_SESSION['score'])) {
   $_SESSION['score'] = 0;
} else {
   if ($title !== "Fin de partie" && isset($questionSelect)) {
      $_SESSION['score'] += 1;
   }
}

if (!isset($_SESSION['questionCount'])) {
   $_SESSION['questionCount'] = [];
} else {
   if (count($_SESSION['questionCount']) === count($questions)) {
      if ($title !== "Fin de partie") {
         redirectTo($pages['Fin de partie']);
      }
   }
}

$randomQuestions = 0;
if (!isset($questionSelect)) {
   for ($i = 0; $i < count($questions) * 5; $i++) {
      $randomQuestions = rand(0, count($questions) - 1);
      if (!in_array($randomQuestions, $_SESSION['questionCount'])) {
         array_push($_SESSION['questionCount'], $randomQuestions);
         break;
      }
   }
}


if ($questionSelect < 0 || $questionSelect > count($questions) - 1) {
   redirectTo($rootPage);
}

if (isset($questionSelect) && isset($answerSelect)) {
   getSecure($answerSelect, in_array($answerSelect, $questions[$questionSelect]['answers']), function () use ($rootPage) {
      redirectTo($rootPage);
   });
}


include './src/layout/head.php';

switch ($title) {
   case 'Home':
      include './src/pages/home.php';
      break;
   case "Fin de partie":
      include './src/pages/end.php';
      break;
   default:
      include './src/pages/home.php';
      break;
}

include './src/layout/foot.php';
