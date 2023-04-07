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

// echo PIZZA;

//TOTAL AMOUNT
$totalAmount = ($pizzaQty * PIZZA)
    + ($pastaQty * PASTA)
    +  ($minestroneQty *MINESTRONE);

$subTotal = "<p > <span class='font-semibold'>Subtotal:</span> $ ". number_format($totalAmount, 2) . "</p>";

$taxRate = 0.10; //tax 10%;
// $totalAmount = $totalAmount * (1 + $taxRate);
$totalAmount = $totalAmount + ($totalAmount *  $taxRate);

$total = "</p> <span class='font-semibold'>Total</span> (Tax included):  $". number_format($totalAmount, 2). "</p>"

?>




<h1 class="header-1 italic">Php Cafe</h1>

<h2 class="header-2 ">Ordered items</h2>

<?php
        echo "<p>Order processed at <span class='font-bold text-gray-600'> {$date} </span> as following.</p>";

// echo htmlspecialchars($pastaQty) . ' Pasta <br>';
// echo htmlspecialchars($pizzaQty) . ' Pizza <br>';
// echo htmlspecialchars($minestroneQty) . ' Minestrone <br>';

//HEREDOC SYTNAX

$pastaQty = htmlspecialchars($pastaQty);
$pizzaQty = htmlspecialchars($pizzaQty);
$minestroneQty = htmlspecialchars($minestroneQty);

echo <<<order
    <h2>Order with Heredoc syntax</h2><br>
    <p>{$pastaQty} Pasta</p>
    <p>{$pizzaQty} Pizza</p>
    <p>{$minestroneQty} Minestrone</p><br>

    {$subTotal}
    {$total}

order;

include './layout/footer.php';

?>
