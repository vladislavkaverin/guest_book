<?php
/**
 * Created by PhpStorm.
 * User: ladik
 * Date: 15.06.18
 * Time: 13:31
 */

    require_once ('infoDB.php');

    $db = mysqli_connect($host, $admin, $password, "$db") or die("Error connection!");
    mysqli_set_charset($db, "utf8") or die("Error install charset!");

    if(isset($_POST["user"]) && isset($_POST["text"])){
        $user = mysqli_real_escape_string($db, htmlspecialchars($_POST["user"]));
        $text = mysqli_real_escape_string($db, htmlspecialchars($_POST["text"]));

        $queryInsert = "INSERT INTO `users` (`user`, `text`) VALUES ('$user', '$text')";
        mysqli_query($db, $queryInsert) or die(mysqli_error($db));

        header("Location: {$_SERVER['PHP_SELF']}");
        exit();
    }

    $querySelect = "SELECT `user`, `text`, `date` FROM `users` ORDER BY `date` DESC";
    $res = mysqli_query($db, $querySelect);

    $arrField = mysqli_fetch_all($res, MYSQLI_ASSOC);
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
        <?php foreach($arrField as $index): ?>
            <div class="field">
                <p>Author: <?=$index['user']?> | Date: <?=$index['date']?></p>
                <div><?=$index['text']?></div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>

</body>
</html>