<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blackjack</title>
</head>
<body>
    <form>
    <input type="submit" name="action" value="New game">
    </form>
    <?php
    if ($_SESSION["game"]==true){?>
    <form >
    <input type="submit" name="action" value="Hit"/>
    <input type="submit" name="action" value="Stand"/>
    <input type="submit" name="action" value="Surrender"/>

    </form>
    <div>Your score is <?php $_SESSION["player"] ?></div>
    <?php }?>
</body>
</html>