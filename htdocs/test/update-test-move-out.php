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

$sql = "SELECT * FROM test WHERE room=$room";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0){
    $row2 = mysqli_fetch_assoc($result);
} else{
    print ("0 results in test");
}
$price = $row2['price_per_day'];
$name = $row2['name_surname'];
$organization = $row2['organization'];
$number_of_people = $row2['number_of_people'];
$days_left = $row2['days_left'];
$date_in = $row2['date_in'];
$date_out = date('Y-m-j', strtotime($date_in . ' + ' .$days_left . ' days'));
$total_pay = $days_left*$price;
$current_paid = $row2['current_paid'];
$remain_pay = $total_pay - $current_paid;

$sql1 = "INSERT INTO archivetest (room, price_per_day, name_surname, organization, number_of_people, date_in, date_out, total_pay, remain_pay) VALUES ($room, $price, '$name', '$organization', $number_of_people, CAST('".$date_in."' AS DATE), CAST('".$date_out."' AS DATE), $total_pay, $remain_pay)";

if($conn->query($sql1)===TRUE){
    echo "DATA updated";
}
else{
    echo "Error: " .$sql1 . "<br>" . $conn->error;
}

$sql2 = "UPDATE test SET status='1', price_per_day=NULL, name_surname=NULL, organization=NULL, number_of_people=NULL, date_in=NULL, date_out=NULL, current_paid=NULL, total_pay=NULL, remain_pay=NULL, days_left=NULL WHERE room=$room";

if ($conn->query($sql2) === TRUE) {
    echo "Updated successfully";
} else {
    echo "Error: " . $sql2 . "<br>" . $conn->error;
}

mysqli_close($conn);
?>