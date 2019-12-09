<?php 
    setcookie("MoneySpend");
    $_COOKIE["MoneySpend"]+=$price;
    setcookie("MoneySpend");

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" type="text/css"
          rel="stylesheet"/>
    <link rel="stylesheet" href="style.css">
    <title>Order food & drinks</title>
</head>
<body>
<div class="container">
    <h1>Order food in the restaurant "the Personal Ham Processors"</h1>
    <nav>
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link active" href="?drinks=0">Order food</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?drinks=1">Order drinks</a>
            </li>
        </ul>
    </nav>
    <form method="post">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="email">E-mail:</label>
                <input type="text" id="email" name="email" value="<?php echo $_SESSION["email"]?>"class="form-control"/>
                <?php
                if (!empty($emailError)){
                    echo $emailError;
                } 
                ?>
            </div>
            <div></div>
        </div>

        <fieldset>
            <legend>Address</legend>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="street">Street:</label>
                    <input type="text" name="street" id="street" value="<?php echo $_SESSION["street"]?>"class="form-control">
                    <?php
                if (!empty($streetError)){
                    echo $streetError;
                } 
                ?>                
                </div>
                <div class="form-group col-md-6">
                    <label for="streetnumber">Street number:</label>
                    <input type="text" id="streetnumber" name="streetnumber" value="<?php echo $_SESSION["streetnumber"]?>"class="form-control">
                    <?php
                if (!empty($streetnumberError)){
                    echo $streetnumberError;
                } 
                ?>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="city">City:</label>
                    <input type="text" id="city" name="city" value="<?php echo $_SESSION["city"]?>"class="form-control">
                    <?php
                if (!empty($cityError)){
                    echo $cityError;
                } 
                ?>
                </div>
                <div class="form-group col-md-6">
                    <label for="zipcode">Zipcode</label>
                    <input type="text" id="zipcode" name="zipcode" value="<?php echo $_SESSION["zipcode"]?>"class="form-control">
                    <?php
                if (!empty($zipcodeError)){
                    echo $zipcodeError;
                } 
                ?>
                </div>
            </div>
        </fieldset>

        <fieldset>
            <legend>Products</legend>
            <?php foreach ($products AS $i => $product): ?>
                <label>
                    <input type="checkbox" value="1" name="products[<?php echo $i ?>]"/> <?php echo $product['name'] ?> -
                    &euro; <?php echo number_format($product['price'], 2) ?></label><br />
            <?php endforeach; ?>
        </fieldset>

        <button type="submit" class="btn btn-primary">Order!</button>
    </form>

    <p><?php 
        echo "It's now ".date("H")."-".date("i").".";
        echo  " Estimated time of delivery is ".(date("H")+2).":".date("i");    
    ?> </p>

    <footer>You already ordered <strong>&euro; <?php echo $_COOKIE["MoneySpend"] ?></strong> in food and drinks.</footer>
</div>

<style>
    footer {
        text-align: center;
    }
</style>
</body>
</html>