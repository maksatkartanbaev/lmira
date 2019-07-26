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

$num = $_POST['num'];
$stat = $_POST['stat'];

$sql1 = "SELECT price FROM pricelist WHERE room='$num'";
$result1 = mysqli_query($conn, $sql1);

if(mysqli_num_rows($result1) > 0){
    $row1 = mysqli_fetch_assoc($result1);
    $price = $row1['price'];
} else {
    print ("0 results in price");
}

$sql2 = "SELECT * FROM money WHERE room='$num'";
$result2 = mysqli_query($conn, $sql2);

if (mysqli_num_rows($result2) > 0){
    $row2 = mysqli_fetch_assoc($result2);
    $date_in = $row2['date_in'];
} else{
    print ("0 results in money");
}

$days_num = $row2['days_num'] - $row2['days_left'];
$allin = $days_num * $price;

$sql3 = "INSERT INTO archeve (room, date_in, days_num, allin) VALUES ($num, CAST('".$date_in."' AS DATE), $days_num, $allin)";

if($conn->query($sql3)===TRUE){
    echo "DATA updated";
}
else{
    echo "Error: " .$sql3 . "<br>" . $conn->error;
}

$sql5 = "UPDATE rooms SET status='$stat' WHERE room='$num'";

if($conn->query($sql5)===TRUE){
    echo "DATA updated";
}
else {
    echo "Error: " .$sql5 . "<br>" . $conn->error;
}

$sql4 = "DELETE FROM MONEY WHERE room='$num'";

if($conn->query($sql4)===TRUE){
    echo "DATA updated";
}
else {
    echo "Error: " .$sql4 . "<br>" . $conn->error;
}

mysqli_close($conn);
?>