<h1>Get ton char de malheur</h1>
<ul>
    <?php foreach ($cars as $carName => $models) : ?>
        <li><?= $carName ?> <a href="<?= $pages['Modèle'] . $carName ?>"><i class="fas fa-arrow-right"></i></a></li>
    <?php endforeach; ?>
</ul>