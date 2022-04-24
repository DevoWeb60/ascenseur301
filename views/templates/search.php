<div class="project-container">
    <?php foreach($Category->allCategories as $category){  ?>
        <?php foreach($Category->getProjects($category) as $project){ ?>
            <?php $currentProject = new Project($project, $category); ?> 
            <?php include 'views/templates/card-project.php' ?>
        <?php } ?>
    <?php } ?>
</div>