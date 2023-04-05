<?php

$pizzaQty = $_POST['Pizza'];
$pastaQty = $_POST['Pasta'];
$minestroneQty = $_POST['Minestrone'];

//order amount

$totalQty =(int) 0;
$totalAmount = (float) 0.00;
//definite prize

define('PIZZA', 58.00);
define('PASTA', 35.00);
define('MINESTRONE', 28.00);

// echo PIZZA;

//TOTAL AMOUNT
$totalAmount = $pizzaQty * PIZZA
    + $pastaQty * PASTA
    +  $minestroneQty *MINESTRONE;

$subTotal = "<p > <span class='font-semibold'>Subtotal:</span> $ ". number_format($totalAmount, 2) . "</p>";

$taxRate = 0.10; //tax 10%;
// $totalAmount = $totalAmount * (1 + $taxRate);
$totalAmount = $totalAmount + ($totalAmount *  $taxRate);

$total = "</p> <span class='font-semibold'>Total</span> (Tax included):  $". number_format($totalAmount, 2). "</p>"

?>


<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="../dist/output.css" rel="stylesheet" />
        <title>Php-cafe - Order processor</title>
    </head>

    <body class=" h-screen flex justify-center pt-8  items-center">
        <section class="border-2 border-slate-300 p-4 align-top max-h-[60%] w-[60%]">

            <h1 class="header-1 italic">Php Cafe</h1>

            <h2 class="header-2 ">Ordered items</h2>

            <?php
        echo '<p>Order processed at <span class="font-bold text-gray-600"> '
            . date('H:i, jS F Y') . '</span> as following.</p>';

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

?>
        </section>
    </body>

</html>
