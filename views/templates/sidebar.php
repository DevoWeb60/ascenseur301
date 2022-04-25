<div class="sidebar">
    <h1>Thibault <br><span>Berthelin</span></h1>
    <span class="search <?= isset($_GET['search']) ? "active" : "" ?>">
        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify iconify--healthicons" width="32" height="32" preserveAspectRatio="xMidYMid meet" viewBox="0 0 48 48"><g fill="currentColor"><path fill-rule="evenodd" d="m18.207 31.379l-6.914 6.914l-1.414-1.414l6.914-6.915l1.414 1.415Z" clip-rule="evenodd"></path><path d="m6 39.172l6.927-6.927l2.573-.18l.5.5l-.288 2.551L8.828 42L6 39.172Z"></path><path fill-rule="evenodd" d="M27 34c7.18 0 13-5.82 13-13S34.18 8 27 8s-13 5.82-13 13s5.82 13 13 13Zm0 2c8.284 0 15-6.716 15-15c0-8.284-6.716-15-15-15c-8.284 0-15 6.716-15 15c0 8.284 6.716 15 15 15Z" clip-rule="evenodd"></path></g></svg>
        <input type="text">
    </span>
    <div class="btn-container">
        <a href="index.php" class="link">Accueil</a>
        <a class="countProject" href="index.php?search=active">
            <?= $Category->projectCount ?>
        </a>
    </div>
    <ul>
        <?php foreach($Category->allCategories as $categorie){ ?>
            <li>
                <a class="<?= strtolower($categorie) ?> <?= $Category->countProjectOfCategory($categorie) === 0 ? "disabled" : "" ?> <?= isset($_GET['categorie']) && $_GET['categorie'] === $categorie ? "active" : "" ?>" 
                href="index.php?categorie=<?= $categorie ?>" 
                data-name="<?= isset($_GET['categorie']) && $_GET['categorie'] === $categorie ? formatNameFolder($categorie) : "Projet : ".$Category->countProjectOfCategory($categorie) ?>">
                    <?= formatNameFolder($categorie) ?>
                </a>
            </li>
        <?php } ?>
    </ul>
    <div class="page-container">
        <a href="index.php?page=favoris" class="link favories">Favoris</a>
        <a href="index.php?page=extensions" class="link extensions">Extensions</a>
    </div>
</div>