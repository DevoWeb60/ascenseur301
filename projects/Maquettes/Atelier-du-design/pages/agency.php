<section id="agency-presentation">
    <div class="container">
        <div class="content">
            <h2><?= $agencyDescPart->title ?></h2>
            <p class="bdd"><?= $agencyDescPart->content ?></p>

        </div>
    </div>
</section>
<?php foreach ($agencyList as $element) : ?>
    <?php if (!empty($element->picture)) : ?>
        <section class="realize">
            <div class="picture">
                <img src="./src/img/<?= $element->picture ?>" alt="Atelier du design">
            </div>
            <div class="content">
                <?php if (!empty($element->title)) : ?>
                    <h2><?= $element->title ?></h2>
                <?php endif; ?>
                <p class="bdd"><?= $element->content ?></p>
            </div>
        </section>
    <?php endif; ?>
<?php endforeach; ?>

<section class="cta">
    <h2 class="lower">Découvrez nos réalisations </h2>
    <a href="index.php?page=realisation" class="btn">Découvrir maintenant</a>
</section>