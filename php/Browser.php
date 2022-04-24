<?php 

class Browser {
    public $allCategoriesOfFavories;
    public $allFavoriesByCategory;
    public $allExtensions; 
    private $URL = "browsers";

    function __construct(){
        $this->allExtensions = $this->getAllExtensions();
        $this->getAllCategoriesOfFavories();
    }

    function getAllExtensions(){
        $extensionsContent = file_get_contents($this->URL."/extensions.txt", true);
        return $this->getElements($extensionsContent);
    }
    

    function getAllCategoriesOfFavories(){
        $favories = file_get_contents($this->URL."/listefav.txt", true);
        $favories = explode('Cat:', $favories);
        $categories = [];
        $favoriesByCategory = [];

        for($i = 1; $i < count($favories); $i++) {
            $fav = explode(';;', $favories[$i]);
            if($fav[0] !== ""){
                array_push($categories, $fav[0]);
            }
            if($fav[1]){
                array_push($favoriesByCategory ,$fav[1]);
            }
        }

        $this->allFavoriesByCategory = $favoriesByCategory;
        $this->allCategoriesOfFavories = $categories;
    }

    function getElements($elementsString){
        return explode('<a', $elementsString);
    }

    function parseElement($element, $type){
        $parsedElement = [];
        $element = explode('"', $element);

        if($type === "favori"){
            $title = explode(">", $element[6])[1];
            $image = $element[3];
            $link = $element[1];
            $description = $element[5];
            
            array_push($parsedElement, $title);
            array_push($parsedElement, $image);
            array_push($parsedElement, $link);
            array_push($parsedElement, $description);
            
            return $parsedElement;
        }else if($type === "extensions"){
            $title = explode(">", $element[4])[1];
            $link = $element[1];
            $description = $element[3];
            
            array_push($parsedElement, $title);
            array_push($parsedElement, $link);
            array_push($parsedElement, $description);
            
            return $parsedElement;
        }
    }
};
