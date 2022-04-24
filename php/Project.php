<?php 
    class Project {
        public $name;
        public $category;
        public $thumbnail;
        public $badges;
        public $description;
        public $URL;
        public $files;

        function __construct($name, $category){
            $this->name = $name;
            $this->category = $category;
            $this->URL = "projects/$category/$name";
            $this->files = filterFolder(scandir($this->URL));
            $this->thumbnail = $this->getThumbnail();;
            $this->parseMeta();
        }

        function getThumbnail(){
            foreach($this->files as $file){
                
                if(preg_match('/(.*).webp/', $file) === 1){
                    return $this->thumbnail = $file;
                }
            }
        }
        function parseMeta(){
            foreach($this->files as $file){
                if($file === "meta.txt"){
                    $content = file_get_contents($this->URL."/meta.txt", true);
                    $content = explode('|', $content);
                    
                    $badges = explode(';', $content[0]);
                    $this->badges = $badges;
                    $this->description = $content[1];
                }
            }
        }
};