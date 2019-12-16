<?php
function findCustomer ($needle, $haystack){
    foreach ($haystack as $hay) {
        
    }
}


$json=file_get_contents("../customers.json");
$customers=json_decode($json);
$products=json_decode(file_get_contents("../products.json"));
$groups=json_decode(file_get_contents("../groups.json"));
require ('../View/view.php');
require ('../Controller/controller.php');

