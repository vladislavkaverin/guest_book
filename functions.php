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

    function printArray($arr){
        foreach ($arr as $k => $v){
            //echo "<p>" . $v['User'] . "; " . $v['Text'] . "; ". $v['Date']  . "</p>";

            //variables can be returned!
            $user = $v['User'];
            $text = $v['Text'];
            $date = $v['Date'];

            echo "<p>User : {$user}<br>
                     Text : {$text}<br>
                     Date : {$date}<br>
                  </p>";
        }
    }