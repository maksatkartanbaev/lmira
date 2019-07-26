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
$amount = $_POST['amount'];

$sql = "SELECT * FROM test WHERE room=$room";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0){
    $row2 = mysqli_fetch_assoc($result);
} else{
    print ("0 results in test");
}

$current_paid = $row2['current_paid'] + $amount;
$remain_pay = $row2['total_pay'] - $current_paid;

$sql = "UPDATE test SET current_paid=$current_paid, remain_pay=$remain_pay WHERE room=$room";

if ($conn->query($sql) === TRUE) {
echo "Updated successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

mysqli_close($conn);
?>