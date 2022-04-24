<div class="tools">
    <div class="tools-container">
        <?php foreach($Category->toolsList as $tool){ 
            $currentTool = new Tool($tool); ?>
            <div class="tool" data-clipboard-action="copy" data-clipboard-text='<?= $currentTool->getContent() ?>'>
                <h3><?= formatNameFolder($currentTool->name) ?></h3>
            </div>
       <?php } ?>
    </div>
</div>


<?php foreach($Category->allCategories as $category){ 
    if($Category->countProjectOfCategory($category) !== 0){ ?>
        <div class="category-container">
            <h2 class="<?= strtolower($category) ?>"><?= $category ?></h2>
            <div class="project-container">
                <?php foreach($Category->randomProjectByCategory($category) as $project){
                    $currentProject = new Project($project, $category); ?>
                    <?php include 'views/templates/card-project.php'; ?>
               <?php } ?>
            </div>
        </div>
<?php }
} ?>