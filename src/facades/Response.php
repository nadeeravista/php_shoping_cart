<?php

namespace Nadeera\Facades;

class Response
{
    public static function view($file, $data)
    {
        $fileLocationParts = explode(".",$file);
        $fileLocationParts [] = array_pop($fileLocationParts).".php";
        $filePath = implode("/", $fileLocationParts);
        
        if(is_array($data)){
            foreach($data as $key=>$item){
                $$key = $item;
            }
        } else {
            $data = $data;
        }
        include "./config.php";
        include $filePath;
    }
}
