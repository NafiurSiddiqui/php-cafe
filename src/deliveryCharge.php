<?php
include './layout/header.php';

$distance = (int)50;

while ($distance <= 250) {
    echo "
    <p > <span class='font-semibold'>Delivery Charge:</span> $ ". ($distance/ 10) . "</p>    
    ";

    $distance += 50;
}


include './layout/footer.php';
