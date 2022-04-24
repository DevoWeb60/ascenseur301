<?php 

class Tool {
    public $name;
    public $URL;
    public $toCopy;

    function __construct($name){
        $this->name = $name;
        $this->URL = "projects/outils/$name";
        $this->toCopy = $this->getContent(); 
    }

    function getContent(){
        return file_get_contents($this->URL, true);
    }
}