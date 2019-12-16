<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>View</title>
</head>
<body>
<form method="POST">
<select name="customer" size="10" multiple>

    <?php 
    require ('../Model/model.php');
    foreach ($customers as $customer => $name) {?>
        <option value="<?php echo $name-> name ?>"><?php echo $name-> name ?></option>
    <?php } ?>
    <select name="customer" size="10" multiple>
<select name="customer" size="10" multiple>
<?php foreach ($products as $product) { ?>
    <option value="<?php echo $product-> name ?>"><?php echo $product-> name ?></option>
    <?php } ?>
    <input type="submit" name="submit" value="Submit">
    </select>
</form>
</body>
</html>

