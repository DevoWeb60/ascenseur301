   <footer>
      <div class="container">
         <div class="about">
            <h3>A propos</h3>
            <h4>Personnes, culture et lumiere</h4>
            <p>Les gens, la culture et la lumière sont nos préoccupations. La bonne architecture / le bon design se mesure par son adaptabilité et sa réponse à l’environnement, à la vie sociale, aux personnes qui l’utilisent et à la lumière qui la remplit.</p>
            <a href="<?= $pages['agence'] ?>" class="btn">En savoir plus sur notre philosophie</a>
         </div>
         <ul class="links">
            <li><a href="<?= $pages['agence'] ?>" class="link">L'agence</a></li>
            <li><a href="<?= $pages['equipe'] ?>" class="link">L'équipe</a></li>
            <li><a href="<?= $pages['realisations'] ?>" class="link">Nos réalisations</a></li>
            <li><a href="#" class="link">Mentions légales</a></li>
            <li><a href="<?= $pages['contact'] ?>" class="btn">Contactez nous</a></li>
         </ul>
         <div class="info">
            <img src="./src/img/<?= $siteInfo->logo ?>" alt="<?= $siteInfo->title ?>">
            <ul class="coords">
               <li class="text">
                  <a href="<?= $siteInfo->address_map ?>" target="_blank"><?= $siteInfo->address ?></a>
               </li>
               <li class="text">Tél :<a href="tel:+33<?= phoneForLink($siteInfo->phone) ?>"><?= $siteInfo->phone ?></a></li>
               <li class="text"><a href="mailto:<?= $siteInfo->email ?>"><?= $siteInfo->email ?></a></li>
            </ul>
            <ul class="rs">
               <?php foreach ($socials as $social) : ?>
                  <li><a href="<?= $social->link ?>" target="_blank"><i class="<?= $social->icon ?>"></i></a></li>
               <?php endforeach; ?>
            </ul>
         </div>
      </div>
      <div class="bottom-bar">
         <p>@copyright <?= date('Y'); ?> - <?= $siteInfo->title ?></p>
      </div>
   </footer>
   <script src="main.js" type="module"></script>
   </body>

   </html>