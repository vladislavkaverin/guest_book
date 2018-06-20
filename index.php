<?php
/**
 * Created by PhpStorm.
 * User: ladik
 * Date: 15.06.18
 * Time: 13:31
 */

    require_once ('functions.php');

    define("pathFile", "file.txt");

    if(isset($_POST["user"]) && isset($_POST["text"])){
        $user = htmlspecialchars($_POST["user"]);
        $text = htmlspecialchars($_POST["text"]);
        $date = date("F j, Y, g:i a"); // March 10, 2001, 5:16 pm
        $query = "{$user}|\n{$text}|\n{$date}|\n***\n";

        writeInFile(pathFile, $query);
        header("Location: index.php");
    }

    $data = readWithFile(pathFile);

    array_pop($data); //delete last "clear area" in file after '***'

    foreach ($data as $value){
        $username = explode("|", $value);
        $arrField[] = [
            'User' => $username[0],
            'Text' => $username[1],
            'Date' => $username[2]
        ];
    }

    $arrField = array_reverse($arrField);

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Guest Book</title>

    <link rel="stylesheet" type="text/css" href="style.css">

</head>
<body>

<div class="form">
    <form method="post">
        <p><input placeholder="Name" name="user" required></b></p>
        <p><textarea placeholder="Text" cols="60" rows="15" name="text" required></textarea></p>
        <p><input type="submit" value="Send"></p>
    </form>
</div>

<hr>
    <?php if (!empty($arrField)): ?>
        <?php foreach($arrField as $index => $values): ?>
            <div class="field">
                <p>Author: <?=$values['User']?> | Date: <?=$values['Date']?></p>
                <div><?=$values['Text']?></div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>

</body>
</html>

