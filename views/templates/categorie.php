<div class="project-container">
    <?php if(!$Category->getProjects($getCategorie)){ 
        include_once 'views/templates/404.php';
    } else { 
            foreach($Category->getProjects($getCategorie) as $project){ 
                $currentProject = new Project($project, $getCategorie);?>
                <?php include 'views/templates/card-project.php'; ?>
        <?php }
    } ?>
</ul>