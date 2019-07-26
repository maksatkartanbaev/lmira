<?php
session_start();

if ($_SESSION['identity'] != 'korol'){
    header('Location: index.php');
    exit;
    $_SESSION['identity'] = null;
}

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$db = "hotel";

$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $db);

if (!$conn){
    die("Connection failed: " . mysqli_connect_error());
}

$room = $_POST['room'];
$days_num = $_POST['days_num'];
$price = $_POST['price'];
$number_of_people = $_POST['number_of_people'];
$initial_payment = $_POST['initial_payment'];
$name = $_POST['name'];
$organization = $_POST['organization'];
$date_in = date('Y-m-j');
$date_out = date('Y-m-j', strtotime($date_in . ' + ' .$days_num . ' days'));
$total_pay = $days_num*$price;
$remain_pay = $total_pay - $initial_payment;

$sql = "UPDATE test SET status='0', price_per_day=$price, name_surname='$name', organization='$organization', number_of_people=$number_of_people, date_in='$date_in', date_out='$date_out', current_paid=$initial_payment, total_pay=$total_pay, remain_pay=$remain_pay, days_left=$days_num WHERE room=$room";

if ($conn->query($sql) === TRUE) {
    echo "Updated successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

mysqli_close($conn);
?>