<div class="final">
    <h2>Bien joué ! <?= $_SESSION['score'] > 10 ? "Non je rigole..." : null ?></h2>
    <p>Ton score est de <strong><?= $_SESSION['score'] ?></strong> points pour <strong><?= count($questions) ?></strong></p>
    <p>Le meilleur score peut être de <strong><?= count($questions) ?></p>

    <a href="<?= $rootPage . "&amp;newgame=true" ?>" class="back-home"><span>Nouvelle partie</span> <i class="fas fa-arrow-alt-circle-right"></i></a>
</div>