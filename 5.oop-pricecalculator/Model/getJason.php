<?php
$json=file_get_contents("../customers.json");
$customers=json_decode($json);
$products=json_decode(file_get_contents("../products.json"));
$groups=json_decode(file_get_contents("../groups.json"));