<header>
    <div>
        <h1>
            <a href="<?= $pages['accueil'] ?>">
                <img src="./src/img/<?= $siteInfo->logo ?>" alt="<?= $siteInfo->title ?>">
            </a>
        </h1>
        <nav>
            <i id="hamburger" class="fa-solid fa-bars"></i>
            <i id="close-menu" class="fas fa-times"></i>
            <ul>
                <li><a class="link" href="<?= $pages['agence'] ?>">L'agence</a></li>
                <li><a class="link" href="<?= $pages['equipe'] ?>">L'équipe</a></li>
                <li><a class="link" href="<?= $pages['realisations'] ?>">Nos réalisations</a></li>
                <li><a class="btn" href="<?= $pages['contact'] ?>">Contact</a></li>
            </ul>
        </nav>
    </div>
    <div class="container">
        <?php if (!empty($siteInfo->slogan)) : ?>
            <h2 class="bdd"><?= $siteInfo->slogan ?></h2>
        <?php endif; ?>
    </div>
</header>