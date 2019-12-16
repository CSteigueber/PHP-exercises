<?php
function findShitByProperty ($needle, $haystack, $property){
    foreach ($haystack as $hay) {
        if ($hay->$property==$needle){
            return $hay;
        }
    }
}
function getDiscount($group, $groups,$discount){

    if ((isset($group->variable_discount))&&($group->variable_discount>$discount->variable)){
        //echo "variable discount updated";
        $discount->variable=$group->variable_discount;
    }
    if (isset($group->fixed_discount)){
        //echo "fixed discount added";
        $discount->fixed+=$group->fixed_discount;
    }
    if (isset($group->group_id)){
       // var_dump($discount);
        $group=findShitByProperty($group->group_id, $groups, "id");
        //echo "entering next group with the id ".$group->id;
        $discount=getDiscount($group, $groups, $discount);
    }
    return $discount;

}


$json=file_get_contents("../customers.json");
$customers=json_decode($json);
$products=json_decode(file_get_contents("../products.json"));
$groups=json_decode(file_get_contents("../groups.json"));
require ('../View/view.php');
require ('../Controller/controller.php');
require ('Discount.php');
$customer=findShitByProperty($customer,$customers,"name");
$product=findShitByProperty($product,$products,"name");
$price=$product ->price;
$discount=new Discount();
$group=findShitByProperty($customer->group_id,$groups,"id");
$discount=getDiscount($group,$groups,$discount);
//var_dump($customer);
//var_dump($discount);
$price-=$discount->fixed;
$price-=($price*$discount->variable);
if ($price<0){
    $price=0;
}
$output=$customer->name." has to pay ".$price." EUR for ".$product->name;