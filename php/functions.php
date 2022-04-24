<?php
    define('ROOT_PROJECTS', __DIR__."/projects");

    function debug($var){
        echo '<pre>';
        var_dump($var);
        echo '</pre>';
    }

    function formatNameFolder($name){
        $formatted = str_replace('_', ' ', $name);
        $formatted = str_replace('-', ' ', $formatted);
        $formatted = str_replace('.txt', '', $formatted);
        $formatted = ucfirst($formatted);

        echo $formatted;
    }

    function filterFolder($folders){
        if($folders){
            $folderArray = [];
            foreach($folders as $folder){
                if($folder !== "." && $folder !== ".." && $folder !== ".DS_Store"){
                    array_push($folderArray, $folder);
                }
            }
            return $folderArray;
        }
        return false;
    }

    