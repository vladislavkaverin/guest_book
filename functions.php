<?php
/**
 * Created by PhpStorm.
 * User: ladik
 * Date: 20.06.18
 * Time: 0:39
 */

    function writeInFile($path, $text){
        $file = fopen($path, "a+");
        fwrite($file, $text);
    }

    function readWithFile($path){
        $logs = file_get_contents($path);
        $data = explode("***", $logs);
        return $data;
    }