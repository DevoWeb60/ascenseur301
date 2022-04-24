<?php 

class Category {
    public $allProjects; 
    public $allCategories;
    public $projectCount; 
    public $toolsList; 
    private $URL = "projects/";

    function __construct(){
        $this->allCategories = filterFolder($this->getAllCategories());
        $this->allProjects = filterFolder($this->getAllProjects());
        $this->toolsList = filterFolder($this->getToolsList());
        $this->projectCount = count($this->allProjects);
    }

    function getProjects($category){     
        if(is_dir($this->URL.$category)){
            return filterFolder(scandir($this->URL.$category)) ;          
        } 
        return false;
    }

    function getAllCategories(){
        $scan = scandir($this->URL);
        $withoutTools = [];
        foreach($scan as $category){
            if($category !== "outils"){
                array_push($withoutTools, $category);
            }
        }

        return $withoutTools;
    }

    function getAllProjects(){
        $projectsArray = [];
        foreach($this->allCategories as $category){

            $projects = scandir("projects/$category");
            foreach($projects as $project){
                array_push($projectsArray, $project);
            }
        }

        return $projectsArray;
    }  

    function countProjectOfCategory($category){
        return count($this->getProjects($category));
    }

    function randomProjectByCategory($category){
        $projectByCategory = $this->getProjects($category);
        $projectArray = [];
        
        if(count($projectByCategory) <= 3){
            return $projectByCategory;
        }

        for($i = 0; $i <= count($projectByCategory) * 3; $i++){
            $randomProjectSelect = random_int(0, $this->countProjectOfCategory($category) -1);

            if(count($projectArray) < 3){
                if(count($projectArray) === 0){
                    array_push($projectArray, $projectByCategory[$randomProjectSelect]);
                }else{
                    if(!in_array($projectByCategory[$randomProjectSelect], $projectArray)){
                        array_push($projectArray, $projectByCategory[$randomProjectSelect]);
                    }
                }
            }else if(count($projectArray) === 3){
                return $projectArray;
            }

        }

    }

    function getToolsList(){
        return scandir($this->URL."/outils");
    }
};
