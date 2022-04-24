<a href="<?= $currentProject->URL ?>" class="card-project" target="_blank">
    <h3><?= formatNameFolder($currentProject->name) ?></h3>
        <?php if(isset($currentProject->thumbnail)){ ?> 
            <div class="img-container">
                <img src="<?= $currentProject->URL."/".$currentProject->thumbnail ?>" alt="<?= formatNameFolder($currentProject->name) ?>">
                <?php if(!empty($currentProject->description)){ ?>
                <p class="overlay-description">
                    <?= trim($currentProject->description) ?>
                </p>
                <?php } ?>
            </div>
        <?php } ?>
        <div class="badge-container">
            <?php  if(!empty($currentProject->badges)){ 
                    foreach($currentProject->badges as $badge){ ?> 
                        <span class="badge <?= strtolower($badge) ?>"><?= $badge ?></span>
            <?php } ?>
        </div>
    <?php } ?>
</a>