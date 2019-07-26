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
$resultmode = MYSQLI_STORE_RESULT;
$status = "SELECT status FROM rooms";
$result_status = mysqli_query($conn, $status, $resultmode);
$i = 0;
while($room = mysqli_fetch_array($result_status)){
    $bong[0][$i] = $room[0];
    $i++;
}
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
            header h1{
                margin-left: 35%;
                width: 30%;
                border: 10px solid #000;
            }
            .room-open{
                border: 10px solid green;
                background: white;
                opacity: 1;
            }
            .room-closed{
                border: 10px solid red;
                background: white;
                opacity: .9;
            }
            .room:not(#room1){
                margin-left: 10.25%;
                display: inline-block;
                text-align: center;
                width: 8%;
                height: 100px;
                color: #000;
            }
            #room1{
                display: inline-block;
                text-align: center;
                width: 8%;
                height: 100px;
                color: #000;
            }
            #rooms1-6{
                margin-left: 10%;
                margin-right: 10%;
                margin-top: 50px;
                width: 80%;
                height: 110px;
            }
            #rooms7-12{
                margin-left: 10%;
                margin-right: 10%;
                margin-top: 100px;
                width: 80%;
                height: 110px;
            }
            #room-num{
                width: 80%;
                display: inline-block;
                margin-left: 10%;
            }
            #room-num13-18{
                width: 80%;
                display: inline-block;
                margin-left:9.25%;
            }
            .number{
                font-weight: bold;
                display: inline-block;
                /* background-color: #fedbc5; */
                color: white;
            }
            .number3{
                font-weight: bold;
                display: inline-block;
                margin-left: 14.075%;
                color: white;
            }
            .number1{
                font-weight: bold;
                display: inline-block;
                color: black;
            }
            .number1:not(#rm1){
                margin-left: 14.4%;
            }
            .number:not(#rm1){
                margin-left: 14.2%;
            }
            #rm1{
                margin-left: 2.5%;
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
            body{
                /* background-image: url(hotel3.jpg);
                background-repeat: no-repeat; */
                background-color: #cd7f55;
            }
        </style>
        <script>    
                    $(document).ready(function(){
                        $(".room").click(function(x){
                            if($(this).data("room-status")=="0"){
                                alert('This room has someone inside.')
                            }
                            else{
                                var days = prompt('For how many days someone will be in this room?');
                                if (days > 0){
                                var status = $(this).data("room-status");
                                if(status == 1){
                                    $(this).removeClass("room-open").addClass("room-closed").data("room-status", "0");
                                }
                                else{
                                    $(this).removeClass("room-closed").addClass("room-open").data("room-status", "1");
                                }
                                var room = $(this).data("room"); 
                                $.ajax({
                                    url:'update.php',
                                    method:'POST',
                                    data:{
                                        'stat':$(this).data("room-status"),
                                        'num':room,
                                        'days':days
                                    },
                                });}
                            }
                        });
                        
                    });
                
        </script>
</head>
<body>
    <header>
        <h1 id="hotel">L'Mira Hotel</h1>
        <a href="bada2.php">Archieve</a>
    </header>
    <div id="rooms">
        <div id="rooms1-6">
                <?php if ($bong[0][0] == 1): ?>
                    <button id="room1" class="room room-open" data-room="1" data-room-status="1">
                <?php else: ?>
                    <button id="room1" class="room room-closed" data-room="1" data-room-status="0">
                <?php endif; ?>
                <?php if ($bong[0][1] == 1): ?>
                    <button id="room2" class="room room-open" data-room="2" data-room-status="1">
                <?php else: ?>
                    <button id="room2" class="room room-closed" data-room="2" data-room-status="0">
                <?php endif; ?>
                <?php if ($bong[0][2] == 1): ?>
                    <button id="room3" class="room room-open" data-room="3" data-room-status="1">
                <?php else: ?>
                    <button id="room3" class="room room-closed" data-room="3" data-room-status="0">
                <?php endif; ?>
                <?php if ($bong[0][3] == 1): ?>
                    <button id="room4" class="room room-open" data-room="4" data-room-status="1">
                <?php else: ?>
                    <button id="room4" class="room room-closed" data-room="4" data-room-status="0">
                <?php endif; ?>
                <?php if ($bong[0][4] == 1): ?>
                    <button id="room5" class="room room-open" data-room="5" data-room-status="1">
                <?php else: ?>
                    <button id="room5" class="room room-closed" data-room="5" data-room-status="0">
                <?php endif; ?>
                <?php if ($bong[0][5] == 1): ?>
                    <button id="room6" class="room room-open" data-room="6" data-room-status="1">
                <?php else: ?>
                    <button id="room6" class="room room-closed" data-room="6" data-room-status="0">
                <?php endif; ?>
        </div>
        <div id="room-num">
            <p id="rm1" class="number1">Room 1</p>
            <p class="number1">Room 2</p>
            <p class="number1">Room 3</p>
            <p class="number1">Room 4</p>
            <p class="number1">Room 5</p>
            <p class="number1">Room 6</p>
        </div>
        <div id="rooms7-12">
                <?php if ($bong[0][6] == 1): ?>
                    <button id="room1" class="room room-open" data-room="7" data-room-status="1">
                <?php else: ?>
                    <button id="room1" class="room room-closed" data-room="7" data-room-status="0">
                <?php endif; ?>
                <?php if ($bong[0][7] == 1): ?>
                    <button id="room8" class="room room-open" data-room="8" data-room-status="1">
                <?php else: ?>
                    <button id="room8" class="room room-closed" data-room="8" data-room-status="0">
                <?php endif; ?>
                <?php if ($bong[0][8] == 1): ?>
                    <button id="room9" class="room room-open" data-room="9" data-room-status="1">
                <?php else: ?>
                    <button id="room9" class="room room-closed" data-room="9" data-room-status="0">
                <?php endif; ?>
                <?php if ($bong[0][9] == 1): ?>
                    <button id="room10" class="room room-open" data-room="10" data-room-status="1">
                <?php else: ?>
                    <button id="room10" class="room room-closed" data-room="10" data-room-status="0">
                <?php endif; ?>
                <?php if ($bong[0][10] == 1): ?>
                    <button id="room11" class="room room-open" data-room="11" data-room-status="1">
                <?php else: ?>
                    <button id="room11" class="room room-closed" data-room="11" data-room-status="0">
                <?php endif; ?>
                <?php if ($bong[0][11] == 1): ?>
                    <button id="room12" class="room room-open" data-room="12" data-room-status="1">
                <?php else: ?>
                    <button id="room12" class="room room-closed" data-room="12" data-room-status="0">
                <?php endif; ?>
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
                <?php if ($bong[0][12] == 1): ?>
                    <button id="room1" class="room room-open" data-room="13" data-room-status="1">
                <?php else: ?>
                    <button id="room1" class="room room-closed" data-room="13" data-room-status="0">
                <?php endif; ?>
                <?php if ($bong[0][13] == 1): ?>
                    <button id="room14" class="room room-open" data-room="14" data-room-status="1">
                <?php else: ?>
                    <button id="room14" class="room room-closed" data-room="14" data-room-status="0">
                <?php endif; ?>
                <?php if ($bong[0][14] == 1): ?>
                    <button id="room15" class="room room-open" data-room="15" data-room-status="1">
                <?php else: ?>
                    <button id="room15" class="room room-closed" data-room="15" data-room-status="0">
                <?php endif; ?>
                <?php if ($bong[0][15] == 1): ?>
                    <button id="room16" class="room room-open" data-room="16" data-room-status="1">
                <?php else: ?>
                    <button id="room16" class="room room-closed" data-room="16" data-room-status="0">
                <?php endif; ?>
                <?php if ($bong[0][16] == 1): ?>
                    <button id="room17" class="room room-open" data-room="17" data-room-status="1">
                <?php else: ?>
                    <button id="room17" class="room room-closed" data-room="17" data-room-status="0">
                <?php endif; ?>
                <?php if ($bong[0][17] == 1): ?>
                    <button id="room18" class="room room-open" data-room="18" data-room-status="1">
                <?php else: ?>
                    <button id="room18" class="room room-closed" data-room="18" data-room-status="0">
                <?php endif; ?>
        </div>
        <div id="room-num13-18">
            <p id="rm1" class="number">Room 13</p>
            <p class="number3">Room 14</p>
            <p class="number3">Room 15</p>
            <p class="number3">Room 16</p>
            <p class="number3">Room 17</p>
            <p class="number3">Room 18</p>
        </div>
    </div>
</body>
</html>