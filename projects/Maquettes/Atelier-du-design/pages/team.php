<div id="team-page">
    <section class="container">
        <h2>L'équipe</h2>
        <div class="team-mates">
            <?php foreach ($teams as $mate) : ?>
                <div class="card">
                    <div class="image-container">
                        <img class="thumbnail" src="./src/img/equipe/<?= $mate->picture ?>" alt="<?= $mate->name ?>">
                    </div>
                    <div class="content">
                        <h2><?= ucfirst($mate->name) ?></h2>
                        <p class="bdd"><?= $mate->description ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>
    <div id="methods">
        <section class="container">
            <h2>Nos méthodes</h2>
            <?php $i = 1; ?>
            <?php foreach ($methods as $method) : ?>
                <div class="method <?= $i % 2 === 0 ? "invert" : null ?>">
                    <h3><span class="number"><?= $i ?></span><?= $method->title ?></h3>
                    <p>
                        <?= $method->content ?>
                    </p>
                </div>
                <?php $i++ ?>
            <?php endforeach; ?>
        </section>
    </div>
    <section class="cta">
        <h2 class="lower">Découvrez nos réalisations</h2>
        <a href=" <?= $pages['realisations'] ?>" class="btn">Découvrir maintentant</a>
    </section>
</div>