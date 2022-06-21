<h1>Tarbanak le char que t'as !</h1>
<div class="info">
    <h2><?= $carSelect ?> <?= $carModelSelect ?></h2>
    <h4><span class="square" style="background: <?= $randomHexaColors[$carColorSelect] ?>"><?= $carColorSelect ?></span></h4>
</div>
<div class="btn-container">
    <a href="<?= $pages['Modèle'] . $carSelect ?>" class="outline">Changer de modèle</a>
    <a href="<?= $pages['Couleur'] . $carModelSelect ?>">Changer de couleur</a>
</div>