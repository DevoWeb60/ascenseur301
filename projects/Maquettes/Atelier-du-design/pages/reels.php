<div id="reels">
    <div class="container">
        <h2 class="t-center c-dark title">nos réalisations</h2>

        <div class="reels-filter">
            <div class="filter c-dark">
                <h3>Filtre</h3>
                <ul>
                    <li><a href="#" data-category="0">Tout</a></li>
                    <?php foreach ($categories as $category) : ?>
                        <li><a href="#" data-category="<?= $category->id ?>"><?= $category->name ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="galery">
                <?php foreach ($reels as $reel) : ?>
                    <a href="#" class="reel" data-category="<?= $reel->category ?>" data-id="<?= $reel->id ?>">
                        <img src="./src/img/<?= $reel->picture ?>" alt="<?= $reel->title ?>">
                    </a>
                    <div class="overlay" data-id="<?= $reel->id ?>">
                        <div class="modal-content">
                            <div class="close">&#9587;</div>
                            <h2><?= $reel->title ?></h2>
                            <p class="bdd"><?= $reel->description ?></p>
                            <p>Réalisé par <strong><?= $reel->author ?></strong></p>
                            <img class="modal-img" src="./src/Logo.svg" alt="<?= $reel->title ?>">
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <section class="cta invert">
        <h2>contactez-nous</h2>
        <a href=" <?= $pages['contact'] ?>" class="btn">Nous contacter</a>
    </section>
</div>