<?php

include './layout/header.php';


$pizzaQty = $_POST['Pizza'];
$pastaQty = $_POST['Pasta'];
$minestroneQty = $_POST['Minestrone'];
$address = preg_replace('/\t | \R/', ' ', $_POST['address']);
$document_root = $_SERVER['DOCUMENT_ROOT'];
$date = date('H:i, jS F Y');

//order amount

$totalQty = 0;
$totalAmount =  0.00;
//definite prize

define('PIZZA', 58.00);
define('PASTA', 35.00);
define('MINESTRONE', 28.00);


//TOTAL QT and AMOUNT

$totalQty = $pizzaQty + $pastaQty + $minestroneQty;

//GUARD

$pasta_filtered = $pizza_filtered = $minestrone_filtered = '';

if ($totalQty == 0) {
    echo "You did not order anything on the previous page!<br />";
} else {
    if ($pizzaQty > 0) {
        $pizza_filtered = htmlspecialchars($pizzaQty);
    }
    if ($pastaQty > 0) {
        $pasta_filtered = htmlspecialchars($pastaQty);
    }
    if ($minestroneQty > 0) {
        $minestrone_filtered = htmlspecialchars($minestroneQty);
    }
};


$totalAmount = ($pizzaQty * PIZZA)
    + ($pastaQty * PASTA)
    +  ($minestroneQty *MINESTRONE);

$subTotal = "<p > <span class='font-semibold'>Subtotal:</span> $ ". number_format($totalAmount, 2) . "</p>";

$taxRate = 0.10; //tax 10%;
// $totalAmount = $totalAmount * (1 + $taxRate);
$totalAmount = $totalAmount + ($totalAmount *  $taxRate);

$total = "</p> <span class='font-semibold'>Total</span> (Tax included):  $". number_format($totalAmount, 2). "</p>";

//PUT THE ORDER INTO A TEXT

$orderTxt = <<<ORDERTEXT
    $date\t$pizzaQty\t$pastaQty\t$minestroneQty\t
    $totalAmount\t$address
ORDERTEXT;

//OPEN A FILE TO APPEND

$txtFile = fopen("$document_root/../orders/orders.txt", 'ab');



if(!$txtFile) {
    echo "<p class='font-bold text-gray-600'> Aweful! Something went wrong. Please try again later.</p>";
    exit;
}

flock($txtFile, LOCK_EX);

fwrite($txtFile, LOCK_UN);
fclose($txtFile);

//KITCHEN WILL READ THE ORDERS


//TEST

echo "<p class='font-bold text-gray-600'>Order succesfully written for the kitchen.</p>"


?>




<h1 class="header-1 italic">Php Cafe</h1>

<h2 class="header-2 ">Ordered items</h2>

<?php

  

        echo "<p>Order processed at <span class='font-bold text-gray-600'> {$date} </span> as following.</p>";

//HEREDOC SYTNAX


$pizzaQty = htmlspecialchars($pizzaQty);
$minestroneQty = htmlspecialchars($minestroneQty);

echo <<<order
    <h2>Order with Heredoc syntax</h2><br>
    <p>{$pastaQty} Pasta</p>
    <p>{$pizzaQty} Pizza</p>
    <p>{$minestroneQty} Minestrone</p><br>
    <p>To deliver: {$address}</p><br>

    {$subTotal}
    {$total}

order;

include './layout/footer.php';

?>
