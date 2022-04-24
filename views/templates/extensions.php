<div class="browser-container">
        <div class="category">
            <h2>Extensions</h2>
        <?php foreach($Browser->allExtensions as $extension){ 
            if(strlen($extension) > 1){
            $extension = $Browser->parseElement($extension, "extensions")?>
            <a href="<?= $extension[1] ?>" class="item" target="_blank">
                <div class="header">
                        <h3><?= $extension[0] ?></h3>
                </div>
                <p>
                    <?= $extension[2]; ?>
                </p>
            </a>
            <?php }
    } ?> 
    </div>
</div>