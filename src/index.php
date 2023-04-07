<?php

include './layout/header.php';



//items
$items = [['name' => 'Pizza', 'icon' => '🍕'], ['name' => 'Pasta', 'icon' => '🍝'], ['name' => 'Minestrone', 'icon' => '🍜']];

?>



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

	<div class="flex justify-between bg-slate-200 px-1 mb-2 ">
		<h6 class="text-gray-700">Delivery Address: </h6>

	</div>
	<div class='py-1 flex justify-between'>


		<input type='text' name='address' id='address' class='p-2 border w-full h-20 rounded-sm  border-slate-400' />
	</div>





	<button type="submit" value="submit"
		class="w-24 px-4 py-1 rounded-sm mt-4 bg-blue-600 text-white hover:bg-blue-700 font-semibold">
		Order
	</button>
</form>


<?php
     include './layout/footer.php';
?>
