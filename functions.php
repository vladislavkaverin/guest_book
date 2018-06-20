<?php
/**
 * Created by PhpStorm.
 * User: ladik
 * Date: 20.06.18
 * Time: 0:39
 */

    function writeInFile($path){
        $user = htmlspecialchars($_POST["user"]);
        $text = htmlspecialchars($_POST["text"]);
        $date = date("F j, Y, g:i a"); // March 10, 2001, 5:16 pm

        $query = "{$user}|\n{$text}|\n{$date}|\n***\n";

        file_put_contents($path, $query, FILE_APPEND);

        /*$fp = fopen($path,"a+");
        fwrite($fp, $query);
        fclose($fp);*/
    }

    function readWithFile($path){
        $logs = file_get_contents($path);
        $data = explode("***", $logs);
        return $data;
    }