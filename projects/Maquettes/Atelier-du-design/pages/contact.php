<div class="container" id="contact">
    <h2>Nous contacter</h2>
    <div class="flex-container">
        <form action="">
            <div class="input-group">
                <input type="text" name="lastname" id="lastname" placeholder="Nom">
                <label class="text" for="lastname">Nom</label>
            </div>
            <div class="input-group">
                <input type="text" name="firstname" id="firstname" placeholder="Prénom">
                <label class="text" for="firstname">Prénom</label>
            </div>
            <div class="input-group">
                <input type="email" name="email" id="email" placeholder="Adresse Mail">
                <label class="text" for="email">Adresse mail</label>
            </div>
            <div class="input-group">
                <input type="text" name="object" id="object" placeholder="Objet">
                <label class="text" for="object">Objet</label>
            </div>
            <div class="input-group">
                <textarea name="message" id="message" placeholder="Message"></textarea>
                <label class="text" for="message">Message</label>
            </div>
            <button type="submit" class="btn-red">Envoyer</button>
        </form>
        <ul class="info">
            <li><i class="fas fa-map-pin"></i> <a href="<?= $siteInfo->address_map ?>" target="_blank"><?= $siteInfo->address ?></a></li>
            <li><i class="fas fa-phone-alt"></i> <a href="tel:+33<?= phoneForLink($siteInfo->phone) ?>"><?= $siteInfo->phone ?></a></li>
            <li><i class="fas fa-at"></i> <a href="mailto:<?= $siteInfo->email ?>"><?= $siteInfo->email ?></a></li>
        </ul>
    </div>
    <iframe src="<?= $siteInfo->iframe ?>" * width="600" height="450" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</div>