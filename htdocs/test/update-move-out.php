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

$sql2 = "SELECT * FROM test WHERE room=$room";
$result2 = mysqli_query($conn, $sql2);

if (mysqli_num_rows($result2) > 0){
    $row2 = mysqli_fetch_assoc($result2);
    $date_in = $row2['date_in'];
} else{
    print ("0 results in test");
}

$days_num = $row2['days_num'] - $row2['days_left'];
$cash = $days_num * $row2['price'];

$sql = "INSERT INTO archivetest (room, date_in, days_num, cash) VALUES ($room, CAST('".$date_in."' AS DATE), $days_num, $cash)";

if($conn->query($sql)===TRUE){
    echo "DATA updated";
}
else{
    echo "Error: " .$sql . "<br>" . $conn->error;
}

$sql3 = "UPDATE test SET status='1', date_in=NULL, days_num=NULL, days_left=NULL, cash=NULL WHERE room=$room";

if($conn->query($sql3)===TRUE){
    echo "DATA deleted";
}
else{
    echo "Error: " .$sql3 . "<br>" . $conn->error;
}
?>