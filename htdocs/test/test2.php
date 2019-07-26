<?php
session_start();

if ($_SESSION['identity'] != 'korol'){
    header('Location: index.php');
    $_SESSION['identity'] = null;
    exit;
}

error_reporting(0);

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$db = "hotel";

$conn = mysqli_connect ($dbhost, $dbuser, $dbpass, $db);

$mont = date('m');
$yer = date('Y');
$mont = $_POST['mont'];
$yer = $_POST['yer'];
$year = (int)$yer;
$sql2 = "SELECT SUM(total_pay) FROM archivetest";
$result = mysqli_query($conn, $sql2);
$total = mysqli_fetch_array($result);

$sql = "SELECT room, price_per_day, name_surname, organization, number_of_people, date_in, date_out, total_pay FROM archivetest WHERE MONTH(date_in) = '$mont' AND YEAR(date_in) = '$yer'";
?>
<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="dist/jquery-confirm.min.js"></script>
    <script src="dist/bootstrap.min.js"></script>
    <link rel="stylesheet" href="dist/jquery-confirm.min.css">
    <link rel="stylesheet" href="dist/bootstrap.min.css">
    <Title>L'Mira</Title>
    <style>
        body{
            background-color: #cd7f55;
        }
        header{
            text-transform: uppercase;
            width: 100%;
            border-bottom: 5px solid #000;
        }
        table{
            margin-top: 10px;
            text-align: center;
            margin-left: auto;
            margin-right: auto;
        }
        .bongo{
            margin-top: 10px;
        }
        #pukupk{
            text-align: right;
        }
    </style>
</head>
</html>
<?php
echo "<header class='text-center container'>";
echo "<h1 id='hotel'>L'Mira Hotel</h1>";
echo "<a href='test.php'><h3 class='btn btn-info'>Room Service</h3></a>";
echo "</header>";
echo "<form method='POST' class='text-center container bongo'>";
echo "<input name='mont' type='number' min='1' max='12' placeholder='month'>";
echo "<input name='yer' id='yup' type='text' placeholder='year'>";
echo "<input type='submit' name='submit' value='Search'>";
echo "</form>";
if ($res = mysqli_query($conn, $sql)){
    if(mysqli_num_rows($res)>0){
        echo "<table class='table-bordered table-striped table-responsive-sm table-responsive-lg table-responsive-md table-responsive-xl'>";
        echo "<tr id='headuk'>";
        echo "<th id='number'>Room number</th>";
        echo "<th id='price'>Price per day</th>";
        echo "<th id='name'>Name & Surname</th>";
        echo "<th id='org'>Name of organization</th>";
        echo "<th id='persons'>Number of persons</th>";
        echo "<th id='date_in'>Arrival Date</th>";
        echo "<th id='exp_date'>Expiration Date</th>";
        echo "<th id='total_pay'>Total Pay</th>";
        echo "</tr>";
        $sum = 0;
        while($row = mysqli_fetch_array($res)){
                echo "<tr>";
                echo "<td>".$row['room']."</td>"; 
                echo "<td>".$row['price_per_day']."</td>";
                echo "<td>".$row['name_surname']."</td>";
                echo "<td>".$row['organization']."</td>";
                echo "<td>".$row['number_of_people']."</td>";
                echo "<td>".$row['date_in']."</td>";
                echo "<td>".$row['date_out']."</td>";
                echo "<td>".$row['total_pay']."</td>";
                echo "</tr>";
                $sum = $sum + $row['total_pay'];
        }
        echo "<tr>";
        echo "<td id='pukupk' colspan='7'>Total for month:</td>";
        echo "<td>".$sum."</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td id='pukupk' colspan='7'>Total:</td>";
        echo "<td>".$total['SUM(total_pay)']."</td>";
        echo "</tr>";
    }
}
else{
    echo "Error: " . $sql . "<br>" . $conn->error;
}
?>