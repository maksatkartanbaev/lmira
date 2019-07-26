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
$mont = date('m');
$yer = date('Y');
$mont = $_POST['mont'];
$yer = $_POST['yer'];
$year = (int)$yer;
echo "$mont";

$sql = "SELECT room, date_in, days_num, cash from archivetest WHERE MONTH(date_in) = $mont AND YEAR(date_in) = $yer";
?>
<html>
    <head>
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
                    border-radius: 5px;
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
                margin-top: 10px;
                text-align: center;
            }
            th, td{
                border: 1px solid #000;
                border-radius: 5px;
            }
            th{
                background-color: #fff;
            }
            tr:nth-child(odd) {
                background-color: #aaa;
            }
            body{
                background-color: #cd7f55;
            }
        </style>
    </head>
</html>
<?php
echo "<header>";
echo "<h1 id='hotel'>L'Mira Hotel</h1>";
echo "<a href='bika.php'>Room Service</a>";
echo "</header>";
echo "<form method='POST'>";
echo "Which month and year do you want to see?";
echo "<input name='mont' type='number' min='1' max='12' placeholder='month'>";
echo "<input name='yer' id='yup' type='text' placeholder='year'>";
echo "<input type='submit' value='Search'>";
echo "</form>";
echo "<div id='table'>";
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
                echo "<td>".$row['cash']."</td>";
                echo "</tr>";
                $odd = 1;
        }
    }
}
echo "</div>";
?>
