<h1>Get ton modèle d'<?= $carSelect ?> de malheur</h1>
<ul>
    <?php foreach ($cars as $carName => $models) :
        if ($carName === $carSelect) :
            foreach ($models['models'] as $model) :

    ?>
                <li>
                    <?= $model ?>
                    <a href="<?= $pages['Couleur'] . $model ?>">
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </li>
    <?php
            endforeach;
        endif;
    endforeach; ?>
</ul>
<div class="btn-container">
    <a href="<?= $pages['Home'] ?>" class="outline">Changer de marque</a>
</div>