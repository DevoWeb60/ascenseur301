<?php if ($title === "Home") : ?>
    <div class="regions">
        <h2>Régions</h2>
        <ul>
            <?php foreach ($regions as $region) : ?>
                <li><span><?= $region->id ?></span><a href="<?= $pages['departement'] . "&id=" . $region->id ?>"><?= $region->name ?></a></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>
<?php if ($title === "departement") : ?>
    <div class="departements">
        <h2>Départements de <?= $currentRegion->name ?></h2>
        <ul>
            <?php foreach ($departements as $departement) : ?>
                <li><span><?= $departement->id ?></span><a href="<?= $pages['villes'] . "&id=" . $departement->code ?>"><?= $departement->name ?></a></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>
<?php if ($title === "villes") : ?>
    <div class="villes">
        <h2>Villes de <?= $currentRegion->name ?></h2>
        <ul>
            <?php foreach ($villes as $ville) : ?>
                <li><span><?= $ville->id ?></span><span><?= $ville->name ?></span></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>