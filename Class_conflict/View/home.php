<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Class conflict</title>
</head>
<body>
<form>
    <input type="submit" name="action" value="New game">
<?php if($_SESSION["game_on"]==true){ ?>
    <input type="submit" name="action" value="Attack">
    <input type="submit" name="action" value="Stand">
    <input type="submit" name="action" value="Heal">
    <input type="submit" name="action" value="Auto fight">
    
<?php } ?>
</form>
<div><?php echo $_SESSION["output"]; ?></div>
<table>
    <tr>
        <td>Name</td>
        <td>Health</td>
        <td>Strength</td>
        <td>Speed</td>
        <td>Armor</td>
    </tr>
    <tr>
        <td><?php echo $_SESSION["player"]->name ?></td>
        <td><?php echo $_SESSION["player"]->health ?></td>
        <td><?php echo $_SESSION["player"]->strength ?></td>
        <td><?php echo $_SESSION["player"]->speed ?></td>
        <td><?php echo $_SESSION["player"]->armor ?></td>
    </tr>
    <tr>
        <td><?php echo $_SESSION["enemy"]->name ?></td>
        <td><?php echo $_SESSION["enemy"]->health ?></td>
        <td><?php echo $_SESSION["enemy"]->strength ?></td>
        <td><?php echo $_SESSION["enemy"]->speed ?></td>
        <td><?php echo $_SESSION["enemy"]->armor ?></td>
    </tr>

</table>
</body>
</html>