<?php

$pizzaQt = $_POST['pizza'];
$pastaQt = $_POST['pasta'];

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

<body class="borderTest h-screen flex justify-center pt-8">
    <section class="border-2 border-slate-300 p-4 align-top max-h-[60%] w-[60%]">

        <h1 class="header-1 italic">Php Cafe</h1>

        <h2 class="header-2 ">Ordered items</h2>

        <?php
        echo '<p>Order processed at <span class="font-bold text-gray-600"> '
            . date('H:i, jS F Y') . '</span> </p>';
        ?>
    </section>
</body>

</html>