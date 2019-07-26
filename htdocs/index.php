<?php
session_start();
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$db = "hotel";
$conn = mysqli_connect ($dbhost, $dbuser, $dbpass, $db);
$admin = "SELECT login, password FROM admin";
$resultmode = MYSQLI_STORE_RESULT;
$result_admin = mysqli_query($conn , $admin, $resultmode);
$row = mysqli_fetch_row($result_admin);
$status = "SELECT status FROM rooms";
$result_status = mysqli_query($conn, $status, $resultmode);
$submitted = false;
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $submitted = true;
    $login = $_POST['login'];
    $password = $_POST['password'];
    $authenticated = false;
    if ($login == $row[0] && $password == $row[1]){
        $authenticated = true;
        $_SESSION['identity'] = $login;
        header("Location: check.php");
    }
}
$i = 0;
while($room = mysqli_fetch_array($result_status)){
    $bong[0][$i] = $room[0];
    $i++;
}
?>
<html>
    <head>
        <Title>L'Mira</Title>
        <style>
            header{
                text-align: center;
                text-transform: uppercase;
                font-size: 32;
                width: 100%;
                border-bottom: 5px solid #000;
            }
            #rooms1-6{
                margin-left: 10%;
                margin-right: 10%;
                margin-top: 50px;
                width: 80%;
                height: 110px;
            }
            #room-num13-18{
                width:80%;
                display: inline-block;
                margin-left: 9.25%;
            }
            #room-num{
                width: 80%;
                display: inline-block;
                margin-left: 10%;
            }
            .number{
                font-weight: bold;
                display: inline-block;
            }
            .number:not(#rm1){
                margin-left: 14.2%;
            }
            #rm1{
                margin-left: 2.5%;
            }
            #rooms7-12{
                margin-left: 10%;
                margin-right: 10%;
                margin-top: 100px;
                width: 80%;
                height: 110px;
            }
            #room1{
                display: inline-block;
                text-align: center;
                width: 8%;
                height: 100px;
                color: #000;
                <?php if ($bong[0][0] == 1): ?>
                    border: 0px solid green;
                    background: green;
                <?php else: ?>
                    border: 0px solid red;
                    background: red;
                <?php endif; ?>
            }
            #room2{
                margin-left: 10%;
                display: inline-block;
                text-align: center;
                width: 8%;
                height: 100px;
                color: #000;
                <?php if ($bong[0][1] == 1): ?>
                    border: 0px solid green;
                    background: green;
                <?php else: ?>
                    border: 0px solid red;
                    background: red;
                <?php endif; ?>
            }
            #room3{
                margin-left: 10%;
                display: inline-block;
                text-align: center;
                width: 8%;
                height: 100px;
                color: #000;
                <?php if ($bong[0][2] == 1): ?>
                    border: 0px solid green;
                    background: green;
                <?php else: ?>
                    border: 0px solid red;
                    background: red;
                <?php endif; ?>
            }
            #room4{
                margin-left: 10%;
                display: inline-block;
                text-align: center;
                width: 8%;
                height: 100px;
                color: #000;
                <?php if ($bong[0][3] == 1): ?>
                    border: 0px solid green;
                    background: green;
                <?php else: ?>
                    border: 0px solid red;
                    background: red;
                <?php endif; ?>
            }
            #room5{
                margin-left: 10%;
                display: inline-block;
                text-align: center;
                width: 8%;
                height: 100px;
                color: #000;
                <?php if ($bong[0][4] == 1): ?>
                    border: 0px solid green;
                    background: green;
                <?php else: ?>
                    border: 0px solid red;
                    background: red;
                <?php endif; ?>
            }
            #room6{
                margin-left: 10%;
                display: inline-block;
                text-align: center;
                width: 8%;
                height: 100px;
                color: #000;
                <?php if ($bong[0][5] == 1): ?>
                    border: 0px solid green;
                    background: green;
                <?php else: ?>
                    border: 0px solid red;
                    background: red;
                <?php endif; ?>
            }
            #room7{
                display: inline-block;
                text-align: center;
                width: 8%;
                height: 100px;
                color: #000;
                <?php if ($bong[0][6] == 1): ?>
                    border: 0px solid green;
                    background: green;
                <?php else: ?>
                    border: 0px solid red;
                    background: red;
                <?php endif; ?>
            }
            #room8{
                margin-left: 10%;
                display: inline-block;
                text-align: center;
                width: 8%;
                height: 100px;
                color: #000;
                <?php if ($bong[0][7] == 1): ?>
                    border: 0px solid green;
                    background: green;
                <?php else: ?>
                    border: 0px solid red;
                    background: red;
                <?php endif; ?>
            }
            #room9{
                margin-left: 10%;
                display: inline-block;
                text-align: center;
                width: 8%;
                height: 100px;
                color: #000;
                <?php if ($bong[0][8] == 1): ?>
                    border: 0px solid green;
                    background: green;
                <?php else: ?>
                    border: 0px solid red;
                    background: red;
                <?php endif; ?>
            }
            #room10{
                margin-left: 10%;
                display: inline-block;
                text-align: center;
                width: 8%;
                height: 100px;
                color: #000;
                <?php if ($bong[0][9] == 1): ?>
                    border: 0px solid green;
                    background: green;
                <?php else: ?>
                    border: 0px solid red;
                    background: red;
                <?php endif; ?>
            }
            #room11{
                margin-left: 10%;
                display: inline-block;
                text-align: center;
                width: 8%;
                height: 100px;
                color: #000;
                <?php if ($bong[0][10] == 1): ?>
                    border: 0px solid green;
                    background: green;
                <?php else: ?>
                    border: 0px solid red;
                    background: red;
                <?php endif; ?>
            }
            #room12{
                margin-left: 10%;
                display: inline-block;
                text-align: center;
                width: 8%;
                height: 100px;
                color: #000;
                <?php if ($bong[0][11] == 1): ?>
                    border: 0px solid green;
                    background: green;
                <?php else: ?>
                    border: 0px solid red;
                    background: red;
                <?php endif; ?>
            }
            #room13{
                display: inline-block;
                text-align: center;
                width: 8%;
                height: 100px;
                color: #000;
                <?php if ($bong[0][12] == 1): ?>
                    border: 0px solid green;
                    background: green;
                <?php else: ?>
                    border: 0px solid red;
                    background: red;
                <?php endif; ?>
            }
            #room14{
                margin-left: 10%;
                display: inline-block;
                text-align: center;
                width: 8%;
                height: 100px;
                color: #000;
                <?php if ($bong[0][13] == 1): ?>
                    border: 0px solid green;
                    background: green;
                <?php else: ?>
                    border: 0px solid red;
                    background: red;
                <?php endif; ?>
            }
            #room15{
                margin-left: 10%;
                display: inline-block;
                text-align: center;
                width: 8%;
                height: 100px;
                color: #000;
                <?php if ($bong[0][14] == 1): ?>
                    border: 0px solid green;
                    background: green;
                <?php else: ?>
                    border: 0px solid red;
                    background: red;
                <?php endif; ?>
            }
            #room16{
                margin-left: 10%;
                display: inline-block;
                text-align: center;
                width: 8%;
                height: 100px;
                color: #000;
                <?php if ($bong[0][15] == 1): ?>
                    border: 0px solid green;
                    background: green;
                <?php else: ?>
                    border: 0px solid red;
                    background: red;
                <?php endif; ?>
            }
            #room17{
                margin-left: 10%;
                display: inline-block;
                text-align: center;
                width: 8%;
                height: 100px;
                color: #000;
                <?php if ($bong[0][16] == 1): ?>
                    border: 0px solid green;
                    background: green;
                <?php else: ?>
                    border: 0px solid red;
                    background: red;
                <?php endif; ?>
            }
            #room18{
                margin-left: 10%;
                display: inline-block;
                text-align: center;
                width: 8%;
                height: 100px;
                color: #000;
                <?php if ($bong[0][17] == 1): ?>
                    border: 0px solid green;
                    background: green;
                <?php else: ?>
                    border: 0px solid red;
                    background: red;
                <?php endif; ?>
            }
        </style>
    </head>
    <body>
        <header>
            <h1 id="hotel">L'Mira Hotel</h1>
            <form method="post">
                Login: <input type="text" name="login" value = "">
                Password: <input type="password" name="password">
                <input type="submit" value="Sign in">
            </form>
        </header>
        <div id="rooms">
            <div id="rooms1-6">
                <div id="room1">
                    <p></p>
                </div>
                <div id="room2">
                    <p></p>
                </div>
                <div id="room3">
                    <p></p>
                </div>
                <div id="room4">
                    <p></p>
                </div>
                <div id="room5">
                    <p></p>
                </div>
                <div id="room6">
                    <p></p>
                </div>
            </div>
            <div id="room-num">
            <p id="rm1" class="number">Room 1</p>
            <p class="number">Room 2</p>
            <p class="number">Room 3</p>
            <p class="number">Room 4</p>
            <p class="number">Room 5</p>
            <p class="number">Room 6</p>
        </div>
            <div id="rooms7-12">
                <div id="room7">
                    <p></p>
                </div>
                <div id="room8">
                    <p></p>
                </div>
                <div id="room9">
                    <p></p>
                </div>
                <div id="room10">
                    <p></p>
                </div>
                <div id="room11">
                    <p></p>
                </div>
                <div id="room12">
                    <p></p>
                </div>
            </div>
            <div id="room-num">
            <p id="rm1" class="number">Room 7</p>
            <p class="number">Room 8</p>
            <p class="number">Room 9</p>
            <p class="number">Room 10</p>
            <p class="number">Room 11</p>
            <p class="number">Room 12</p>
        </div>
            <div id="rooms7-12">
                <div id="room13">
                    <p></p>
                </div>
                <div id="room14">
                    <p></p>
                </div>
                <div id="room15">
                    <p></p>
                </div>
                <div id="room16">
                    <p></p>
                </div>
                <div id="room17">
                    <p></p>
                </div>
                <div id="room18">
                    <p></p>
                </div>
            </div>
            <div id="room-num13-18">
            <p id="rm1" class="number">Room 13</p>
            <p class="number">Room 14</p>
            <p class="number">Room 15</p>
            <p class="number">Room 16</p>
            <p class="number">Room 17</p>
            <p class="number">Room 18</p>
        </div>
    </div>
    </body>
</html>