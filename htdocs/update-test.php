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

$stat = $_POST['stat'];
$num = $_POST['num'];

$resultmode = MYSQLI_STORE_RESULT;
$days_num = $_POST['days'];
$date = date('Y-m-j');
$price_stat = "SELECT price FROM pricelist";
$result_status = mysqli_query($conn, $price_stat, $resultmode);
$i = 0;
while($price_ar = mysqli_fetch_array($result_status)){
    $price[$i] = $price_ar[0];
    $i++;
}
$price_num = $price[$num-1];
$sql = "INSERT INTO money (room, date_in, days_num, days_left, allin) VALUES($num, CAST('".$date."' AS DATE), $days_num, $days_num, $price_num*$days_num)";
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$sql1 = "UPDATE rooms SET status='$stat' WHERE room='$num'";
if($conn->query($sql1)===TRUE){
    echo "DATA updated";
}
else {
    echo "Error: " .$sql1 . "<br>" . $conn->error;
}
?>