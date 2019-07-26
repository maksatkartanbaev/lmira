<?php
session_start();
if ($_SESSION['identity'] != 'korol'){
    header('Location: index.php');
    exit;
    $_SESSION['identity'] = null;
}
error_reporting(0);
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$db = "hotel";
$conn = mysqli_connect ($dbhost, $dbuser, $dbpass, $db);
$resultmode = MYSQLI_STORE_RESULT;
$mont = $_POST['mont'];
$yer = $_POST['yer'];
$year = (int)$yer;
$sql = "SELECT room, date_in, days_num, allin from archeve WHERE MONTH(date_in) = $mont AND YEAR(date_in) = $yer";
?>
<html>
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <Title>L'Mira</Title>
    <style>
        header{
            text-align: center;
            text-transform: uppercase;
            font-size: 32;
            width: 100%;
            border-bottom: 5px solid #000;
        }
        header a{
                padding: 5px;
                text-decoration: none;
                color: black;
                border: 1px solid black;
                display: inline-block;
                margin-bottom: 10px;
            }
        header a:hover{
            background-color: black;
            color: white;
        }
        form{
            margin-top: 20px;
            text-align: center;
        }
        #yup{
            width: 80px;
        }
        table{
            margin-left: auto;
            margin-right: auto;
        }
        th{
            color: #fff;
            background-color: #000;
        }
        table, th, td{
            border: 1px solid #000;
            text-align: center;
        }
        tr:nth-child(odd) {
            background-color: #aaa;
        }
        body{
            
        }
    </style>
</head>
<body>
<header>
    <h1 id="hotel">L'Mira Hotel</h1>
    <a href="example.php">Room Service</a>
</header>
<form method="POST">
    Which month and year do you want to see?
    <input name="mont" type="number" min="1" max="12" placeholder="month">
    <input name="yer" id="yup" type="text" placeholder="year">
    <input type="submit" value="Search">
</form>
<div id='table'>
<?php
if ($res = mysqli_query($conn, $sql)){
    if(mysqli_num_rows($res)>0){
        echo "<table>";
        echo "<tr>";
        echo "<th>Room number</th>"; 
        echo "<th>Date of arriving</th>"; 
        echo "<th>Number of days inside</th>"; 
        echo "<th>Total pay</th>"; 
        echo "</tr>";
        $odd = 0;
        while($row = mysqli_fetch_array($res)){
                echo "<tr>";
                echo "<td>".$row['room']."</td>"; 
                echo "<td>".$row['date_in']."</td>";
                echo "<td>".$row['days_num']."</td>";
                echo "<td>".$row['allin']."</td>";
                echo "</tr>";
                $odd = 1;
        }
    }
}
?>
</div>
</html>