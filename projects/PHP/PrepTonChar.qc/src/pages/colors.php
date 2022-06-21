<h1>Choose ta color pour ta <?= $carSelect . ' ' . $carModelSelect ?> de malheur</h1>
<ul>
    <?php foreach ($randomHexaColors as $frColor => $color) : ?>
        <li>
            <div class="rect" style='background:<?= $randomHexaColors[$frColor] ?>'>
                <?= $frColor ?>
            </div>
            <a href="<?= $pages['Récapitulatif'] . $frColor ?>"><i class="fas fa-arrow-right"></i></a>
        </li>
    <?php endforeach; ?>
</ul>
<div class="btn-container">
    <a href="<?= $pages['Modèle'] . $carSelect ?>" class="outline">Changer de modèle</a>
</div>