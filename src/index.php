<?php
//items
$items = [['name' => 'Pizza', 'icon' => '🍕'], ['name' => 'Pasta', 'icon' => '🍝'], ['name' => 'Minestrone', 'icon' => '🍜']];

?>
<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link href="../dist/output.css" rel="stylesheet" />
		<title>Php Cafe - order</title>
	</head>

	<body class="borderTest h-screen flex justify-center pt-8">
		<section class="border-2 border-slate-300 p-4 align-top max-h-[60%] w-[60%]">
			<h1 class="header-1 text-center">Order item</h1>
			<form action="./processorder.php" method="post" class="divide-y-2">
				<div class="flex justify-between bg-slate-200 px-1 mb-2">
					<h6 class="text-gray-700">Item</h6>
					<h6 class="text-gray-700">Qty</h6>
				</div>

				<?php

            foreach ($items as $item) : ?>

				<div class='py-1 flex justify-between'>
					<label for='<?php
                                echo $item['name']
                ?>' class='font-semibold text-gray-700'>
						<?php

                        echo $item['icon'] . $item['name']
                ?>
					</label>

					<input type='number' name='<?php
                                        echo $item['name']
                ?>' id='<?php
                        echo $item['name']
                ?>' min='0' class='border w-16 h-8 border-slate-400' />
				</div>


				<?php
                
            endforeach;
?>


				<button type="submit" value="submit"
					class="w-24 px-4 py-1 rounded-sm mt-4 bg-blue-600 text-white hover:bg-blue-700 font-semibold">
					Order
				</button>
			</form>
		</section>
	</body>

</html>
