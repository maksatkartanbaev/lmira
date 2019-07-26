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
$conn = mysqli_connect ($dbhost, $dbuser, $dbpass, $db);
$num = $_POST['num'];
$stat = $_POST['stat'];
$days_num = $_POST['days'];
$resultmode = MYSQLI_STORE_RESULT;
$day = date('j');
$year = date('Y');
$month = date('n');
$price_stat = "SELECT price FROM pricelist";
$result_status = mysqli_query($conn, $price_stat, $resultmode);
$i = 0;
while($price_ar = mysqli_fetch_array($result_status)){
    $price[0][$i] = $price_ar[0];
    $i++;
}
$price_num = $price[0][$num-1];
$sql = "INSERT INTO example (room, year_in, month_in, day_in, days_num, days_left, allin) VALUES($num, $year, $month, $day, $days_num, $days_num, $price_num*$days_num)";
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$sql1 = "UPDATE rooms SET status='$stat' WHERE room='$num'";
if($conn->query($sql1)===TRUE){
    echo "DATA updated";
}
?>