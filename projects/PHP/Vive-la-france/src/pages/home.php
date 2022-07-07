<?php if ($title === "Home") : ?>
    <div class="regions">
        <h2>Régions</h2>
        <h3><?= count($regions) ?> régions</h3>
        <ul>
            <?php foreach ($regions as $region) : ?>
                <li><span><?= $region->code ?></span><a href="<?= $pages['departement'] . "&id=" . $region->id ?>"><?= $region->name ?></a></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>
<?php if ($title === "departement") : ?>
    <div class="departements">
        <a href="<?= $pages['Home'] ?>" id="back">Retour</a>
        <h2>Départements de <?= $currentRegion->name ?></h2>
        <h3><?= count($departements) ?> départements</h3>
        <ul>
            <?php foreach ($departements as $departement) : ?>
                <li><span><?= $departement->code ?></span><a href="<?= $pages['villes'] . "&id=" . $departement->id ?>"><?= $departement->name ?></a></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>
<?php if ($title === "villes") : ?>
    <div class="villes">
        <a href="<?= $pages['departement'] . "&amp;id=" . $currentRegion->id ?>" id="back">Retour</a>
        <h2>
            <?= $currentRegion->name . " > " . $departmentName->name ?>
        </h2>
        <h3><?= number_format(count($villes), 0, ' ', ' ') ?> villes </h3>
        <ul>
            <?php foreach ($villes as $ville) :
                if (strpos($ville->code_postal, '-') !== false) :
                    $postalCodes = explode('-', $ville->code_postal); ?>
                    <li><span class="multiple-cp">
                            <?php foreach ($postalCodes as $postalCode) : ?>
                                <span>
                                    <?= number_format($postalCode, 0, ' ', ' ') ?>
                                </span>
                            <?php endforeach; ?>
                        </span>
                        <?php if (strpos($postalCodes[0], '60') === 0) : ?>
                            <a href="<?php $pages['entreprise'] . $postalCodes[0] ?>"><?= $ville->nom_reel ?></a>
                        <?php else : ?>
                            <span><?= $ville->nom_reel ?></span>
                        <?php endif; ?>
                    </li>
                <?php
                else : ?>
                    <li><span><?= number_format($ville->code_postal, 0, ' ', ' ') ?></span>
                        <?php if (strpos($ville->code_postal, '60') === 0) : ?>
                            <a href="<?= $pages['entreprise'] . $ville->code_postal ?>"><?= $ville->nom_reel ?></a>
                        <?php else : ?>
                            <span><?= $ville->nom_reel ?></span>
                        <?php endif; ?>
                    </li>
            <?php endif;
            endforeach; ?>
        </ul>
    </div>
<?php endif; ?>
<?php if ($title === "entreprise") : ?>
    <div class="entreprises">
        <a href="<?= $pages['villes'] . "&amp;id=" . $department->id ?>" id="back">Retour</a>
        <h2>
            Entreprise de <?= $department->name ?>
        </h2>
        <h3><?= number_format(count($entreprises), 0, ' ', ' ') ?> entreprises </h3>
        <ul>
            <?php foreach ($entreprises as $entreprise) : ?>
                <li><span><?= $entreprise->commune ?></span>
                    <span><?= $entreprise->libelleape ?></span>
                    <span><?= $entreprise->denomination ?></span>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>