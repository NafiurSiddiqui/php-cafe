<?php

include './layout/header.php';

//create a short variable

$document_root = $_SERVER['DOCUMENT_ROOT'];



echo '<h1 class="header-1 text-center">Customer Order</h1>';

$orderFile = fopen("$document_root/../orders/orders.txt", 'rb');

flock($orderFile, LOCK_SH);

if (!$orderFile) {
    echo "<p class='text-bold text-gray-400' >No orders pending.</p>";
    exit;
}

while(!feof($orderFile)) {
    $order = fgets($orderFile);
    echo htmlspecialchars($order). "<br/>";

}

flock($orderFile, LOCK_UN);
fclose($orderFle);





include './layout/footer.php';
