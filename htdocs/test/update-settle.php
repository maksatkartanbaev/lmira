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

$room = $_POST['num'];
$days_num = $_POST['days'];

$date_in = date('Y-m-j');

$price_stat = "SELECT price FROM test";
$result_status = mysqli_query($conn, $price_stat);
$i = 1;
while($price_ar = mysqli_fetch_array($result_status)){
    $price[$i] = $price_ar[0];
    $i++;
}

$sql = "UPDATE test SET status='0', date_in='$date_in', days_num=$days_num, days_left=$days_num, cash=$price[$room]*$days_num WHERE room=$room";

if ($conn->query($sql) === TRUE) {
    echo "Updated successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
mysqli_close($conn);
?>