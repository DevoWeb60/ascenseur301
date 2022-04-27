<div class="browser-container">
        <div class="category">
            <h2>Extension VS Code</h2>
        <?php foreach($Browser->allVSCode as $vscode){ 
            $vscode = $Browser->parseVSCode($vscode) ?>
            <a href="<?= $vscode[2] ?>" class="item" target="_blank">
                <div class="header">
                        <h3><?= $vscode[0] ?></h3>
                </div>
                <p>
                    <?= $vscode[1]; ?>
                </p>
            </a>
            <?php } ?> 
        </div>
</div>