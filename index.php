<?php
/**
 * Created by PhpStorm.
 * User: ladik
 * Date: 15.06.18
 * Time: 13:31
 */

    require_once ('html.php');

    define("pathFile", "file.txt");

    if(isset($_POST["user"]) && isset($_POST["text"])){
        $user = htmlspecialchars($_POST["user"]);
        $text = htmlspecialchars($_POST["text"]);
        $date = date("F j, Y, g:i a"); // March 10, 2001, 5:16 pm

        $file = fopen(pathFile, "a+");
        fwrite($file, "User: {$user};\nText: {$text};\nDate: {$date}\n***\n");

        $logs = file_get_contents(pathFile);
        $data = explode("***", $logs);
        array_pop($data); //delete last "clear area" in file after '***'

        foreach ($data as $value){
            $username = explode(";", $value);
            $arrField[] = [
                'User' => $username[0],
                'Text' => $username[1],
                'Date' => $username[2]
            ];
        }

        if (!empty($arrField)){
            foreach ($arrField as $k => $v){
                echo "<p>" . $v['User'] . "; " . $v['Text'] . "; ". $v['Date']  . "</p>";
            }
        }

    };

?>