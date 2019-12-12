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
    <div>Your score is <?php echo $_SESSION["player"]->score; ?></div>
    <?php }?>
    <div>You have &euro;<?php echo $_SESSION["money"]; 
    if ($_SESSION["money"]<=0){
         echo " Get the f*ck outa here!";
    } ?></div>
</body>
</html>