<?php
include_once './layout/header.php';
?>

<form action="./processfeedback.php" method="post">

    <label class="textStyle font-semibold" for="name">Name: </label>
    <input type='text' name='' id='name' placeholder="Your name" class='border w-full h-8 border-slate-400 px-1 my-2' />
    <label class="textStyle font-semibold" for="name">email: </label>
    <input type='email' name='' id='name' placeholder="e.g. email@mail.com"
        class='border w-full h-8 border-slate-400 px-1 my-2' />
    <label class="textStyle font-semibold" for="name">Feedback: </label>
    <textarea name="feedback" id="feedback" cols="30" rows="10" placeholder="feedback"
        class='px-1 border w-full h-20 rounded-sm  border-slate-400'></textarea>
    <!-- <input type='text' name='feedback' id='feedback' placeholder="Feedback"
        class='px-1 border w-full h-20 rounded-sm  border-slate-400' /> -->


    <button type="submit" value="submit"
        class="w-24 px-4 py-1 rounded-sm mt-4 bg-blue-600 text-white hover:bg-blue-700 font-semibold">
        Submit
    </button>
</form>


<?php
include_once './layout/footer.php';

?>
