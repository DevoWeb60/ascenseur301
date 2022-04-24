<div class="browser-container">
    <a href="#" class="download" download="browsers/favoris.html">Télécharger</a>
    <?php for($i = 0; $i < count($Browser->allCategoriesOfFavories) ; $i++){ 
        $category = $Browser->allCategoriesOfFavories;
        $favories = $Browser->allFavoriesByCategory;
        $favories = $Browser->getElements($favories[$i], "favori"); 
    ?>
        <div class="category">
            <h2><?= $category[$i] ?></h2>
            <?php for($j = 1; $j < count($favories); $j++){ 
                    $favori = $Browser->ParseElement($favories[$j], "favori"); ?>
                
                <a href="<?= $favori[2] ?>" class="item" target="_blank">
                    <div class="header">
                        <img src="<?= $favori[1] ?>" alt="<?= $favori[0] ?>" /> 
                         <h3><?= $favori[0] ?></h3>
                    </div>
                    <p>
                        <?= $favori[3]; ?>
                    </p>
                </a>

            <?php } ?>

        </div>
    <?php } ?> 
</div>