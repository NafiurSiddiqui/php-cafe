<?php

include_once "./layout/header.php";

//create short variable names
$name=trim($_POST['name']);
$email=trim($_POST['email']);
$feedback=trim($_POST['feedback']);
//set up some static information

$toaddress = "feedback@example.com";
$subject = "Feedback from web site";

// $mailcontent = "Customer name: ".filter_var($name)."\n".
// "Customer email: ".$email."\n".
// "Customer comments:\n".$feedback."\n";

$mailcontent = "Customer name: ".str_replace("\r\n", "", $name)."\n". //To strip down any special chars. Since we will need this data internally htmlspecialchars is not something we are looking for here.

"Customer email: ".str_replace("\r\n", "", $email)."\n".
"Customer comments:\n".str_replace("\r\n", "", $feedback)."\n";


$fromaddress = "From: webserver@example.com";
$additional_headers="From: webserver@example.com\r\n "
."Reply-To: bob@example.com";


//Check if big customer or regular

// $email_array = explode('@', $email);


// if (strtolower($email_array[1]) == "bigcustomer.com") {
//     $toaddress = "bob@example.com";
// } else {
//     $toaddress = "feedback@example.com";
// }




// $token = strtok($feedback, " ");
// while ($token != "") {
//     echo $token."<br />";
//     $token = strtok(" ");
// }



if (preg_match(
    '/^[a-zA-Z0-9_\-\.]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/',
    $email
) === 0) {
    echo "<p>That is not a valid email address.</p>".
    "<p>Please return to the previous page and try again.</p>";
    exit;
}

$toaddress = 'feedback@example.com'; // the default value
if (preg_match('/shop|customer service|retail/', $feedback)) {
    $toaddress = 'retail@example.com';

} elseif (preg_match('/deliver|fulfill/', $feedback)) {
    $toaddress = 'fulfillment@example.com';
} elseif (preg_match('/bill|account/', $feedback)) {
    $toaddress = 'accounts@example.com';
}
if (preg_match('/bigcustomer\.com/', $email)) {
    $toaddress = 'bob@example.com';
}


//invoke mail() function to send mail
mail($toaddress, $subject, $mailcontent, $fromaddress);


?>

<h1>Feedback submitted</h1>
<p>Your feedback (shown below) has been sent.</p>
<p><?php echo nl2br(htmlspecialchars($feedback)); ?> </p>

<?php
    include_once "./layout/footer.php";
?>
