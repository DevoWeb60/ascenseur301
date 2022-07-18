<div id="team-section">
    <div class="container">
        <div class="image-container">
            <?php foreach ($teams as $mate) : ?>
                <div class="thumbnail">
                    <img src="./src/img/equipe/<?= $mate->picture ?>" alt="Architecture">
                </div>
            <?php endforeach; ?>
        </div>
        <ul>
            <?php foreach ($teams as $mate) : ?>
                <li>
                    <h2><?= $mate->name ?> - <?= $mate->role ?></h2>
                </li>
            <?php endforeach; ?>
        </ul>
        <a href="<?= $pages['equipe'] ?>" class="btn-red">Découvrez l'équipe</a>
    </div>
</div>

<section id="about">
    <div class="container">
        <h2><?= $valuePart->title ?></h2>
        <p class="bdd"><?= $valuePart->content ?></p>
        <a href="<?= $pages['agence'] ?>" class="btn">Découvrez l'agence</a>
    </div>
</section>

<?php foreach ($homeList as $element) : ?>
    <?php if (!empty($element->picture)) : ?>
        <section class="realize">
            <div class="picture">
                <img src="./src/img/<?= $element->picture ?>" alt="<?= $element->title ?>">
            </div>
            <div class="content">
                <h2><?= $element->title ?></h2>
                <p class="bdd"><?= $element->content ?></p>
                <a href="<?= $pages['realisations'] ?>" class="btn">Découvrez nos réalisations</a>
            </div>
        </section>
    <?php endif; ?>
<?php endforeach; ?>

<section class="cta">
    <h2 class="lower">Vous avez un projet ?</h2>
    <a href="<?= $pages['contact'] ?>" class="btn">Contactez nous</a>
</section>