<h2><?= count($_SESSION['questionCount']) . " / " . count($questions) ?></h2>

<?php if (isset($questionSelect) && isset($answerSelect)) : ?>

    <div class="question" style="background-image: linear-gradient(to top, rgba(0,0,0,0.7), rgba(0,0,0,0.9)), url('<?= $questions[$questionSelect]['picture'] ?>')">
        <h1><?= $questions[$questionSelect]['name'] ?></h1>
    </div>
    <div class="btn-container">
        <?php foreach ($questions[$questionSelect]['answers'] as $answer) :
            $result = $answerSelect === $questions[$questionSelect]['correct'] ? true : false;
        ?>
            <a href="<?= !$result ? $rootPage . "&amp;question=" . $questionSelect . "&amp;answer=" . urlencode($answer) : "#" ?>"><?= $answer ?></a>
        <?php endforeach; ?>
    </div>
    <p class="<?= $result ? "success" : "error" ?>"><?= $result ? "Bonne réponse !" : "Mauvaise réponse !" ?></p>
    <?php if ($result) : ?>
        <a href="<?= $rootPage ?>" class="back-home"><span>Nouvelle question</span> <i class="fas fa-arrow-alt-circle-right"></i></a>
    <?php endif; ?>


<?php else : ?>


    <div class="question" style="background-image: linear-gradient(to top, rgba(0,0,0,0.7), rgba(0,0,0,0.9)), url('<?= $questions[$randomQuestions]['picture'] ?>')">
        <h1><?= $questions[$randomQuestions]['name'] ?></h1>
    </div>
    <div class="btn-container">
        <?php foreach ($questions[$randomQuestions]['answers'] as $answer) : ?>
            <a href="<?= $rootPage . "&amp;question=" . $randomQuestions . "&amp;answer=" . $answer ?>"><?= $answer ?></a>
        <?php endforeach; ?>
    </div>

<?php endif;
?>