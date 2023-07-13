<?php

$name = $_POST['name'];
$email = $_POST['email'];
$number = $_POST['number'];
$branch = $_POST['branch'];
$address = $_POST['address'];

require 'Predis/autoload.php';
Predis\Autoloader::register();

$client = new Predis\Client([
    'scheme' => 'tcp',
    'host' => '127.0.0.1',
    'port' => 6379,
]);


// $client -> set("name",$name);
// $client -> set("email",$email);
// $client -> set("number",$number);
// $client -> set("branch",$branch);
// $client -> set("address",$address);

$client -> lpush("name",$name);
$client -> lpush("email",$email);
$client -> lpush("number",$number);
$client -> lpush("branch",$branch);
$client -> lpush("address",$address);


$client -> hmset("bangalore", array("name" => $name ,"email"=> $email ,"number" => $number ,"branch"=> $branch ,"address" => $address));
echo "<script>alert('Successfully Booked your Ticket');</script>";
    echo "<script type='text/javascript'> document.location = 'home.html'; </script>";
?>