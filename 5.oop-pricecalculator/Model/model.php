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
session_start();
//---------------------------------get posted customer and product
require('getJason.php');
require ('../Controller/controller.php');
$customer=findShitByProperty($customer,$customers,"name");
require ('Discount.php');//-------------------------load class Discount()
$product=findShitByProperty($product,$products,"name");
$price=$product ->price;
$discount=new Discount();
$group=findShitByProperty($customer->group_id,$groups,"id");
$discount=getDiscount($group,$groups,$discount);
$price-=$discount->fixed;
$price-=($price*$discount->variable/100);
if ($price<0){
    $price=0;
}
$_SESSION["output"]=$customer->name." has to pay ".round($price,2)." EUR for ".$product->name;
require ('../View/view.php');