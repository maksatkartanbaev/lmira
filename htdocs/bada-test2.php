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
$sql = "SELECT days_num FROM money";
$result = mysqli_query($conn, $sql, $resultmode);
while($room = mysqli_fetch_array($result_status)){
    $row = mysqli_fetch_array($result);
    $date_in[$i] = date('Y-m-d', strtotime(date('Y-m-d') . ' + ' .$row[0] . ' days'));
    $bong[$i] = $room[0];
    $i++;
}


?>
<html>
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<Title>L'Mira</Title>
        <style>
            body{
                /* background-image: url(hotel3.jpg);
                background-repeat: no-repeat; */
                background-color: #cd7f55;
            }
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
            #rooms_table{
                margin-left: auto;
                margin-right: auto;
                text-align: center;
            }
            th, td{
                border: 1px #000 solid;
                height: 20px;
            }
            button{
                background-color: #cd7f55;
            }
            #puk{
                border: 1px solid #cd7f55;
            }
            .room-closed{
                background-color: red;
            }
            .room-open{
                background-color: green;
            }
            #indicator{
                border:none;
            }
            #cc{
                width: 80px;
            }
            #dd{
                font: bold Arial;
                color: #333333;
                border-top: 1px solid #CCCCCC;
                border-right: 1px solid #333333;
                border-bottom: 1px solid #333333;
                border-left: 1px solid #CCCCCC;
                cursor: pointer;
            }
            #dd:hover{
                background: rgba(245,245,220,0.2);
                color: #000;
            }
        </style>
        <script>
            $(document).ready(function(){
                $(".room1").click(function(){
                    if($(this).data("room-status")=="0"){
                        if (confirm('Are you sure?')){
                            $(this).text("Settle").data("room-status", "1");
                            $(".room1_status").text("OPEN").removeClass("room-closed").addClass("room-open");
                            var room = $(this).data("room");
                            $.ajax({
                                url:'update-test2.php',
                                method:'POST',
                                data:{
                                    'stat':$(this).data("room-status"),
                                    'num':room
                                }
                            })
                        }
                    }
                    else{
                        var days = prompt('For how many days someone will be in this room?');
                        if (days > 0){
                            $(this).text("Move out").data("room-status", "0");
                            $(".room1_status").text("CLOSED").removeClass("room-open").addClass("room-closed");
                            var room = $(this).data("room");
                            $.ajax({
                                url:'update-test.php',
                                method:'POST',
                                data:{
                                    'stat':$(this).data("room-status"),
                                    'num':room,
                                    'days':days
                                }
                            });
                        }
                    }
                });
                $(".room2").click(function(){
                    if($(this).data("room-status")=="0"){
                        if (confirm('Are you sure?')){
                            $(this).text("Settle").data("room-status", "1");
                            $(".room2_status").text("OPEN").removeClass("room-closed").addClass("room-open");
                            var room = $(this).data("room");
                            $.ajax({
                                url:'update-test2.php',
                                method:'POST',
                                data:{
                                    'stat':$(this).data("room-status"),
                                    'num':room
                                }
                            })
                        }
                    }
                    else{
                        var days = prompt('For how many days someone will be in this room?');
                        if (days > 0){
                            $(this).text("Move out").data("room-status", "0");
                            $(".room2_status").text("CLOSED").removeClass("room-open").addClass("room-closed");
                            var room = $(this).data("room");
                            $.ajax({
                                url:'update-test.php',
                                method:'POST',
                                data:{
                                    'stat':$(this).data("room-status"),
                                    'num':room,
                                    'days':days
                                }
                            });
                        }
                    }
                });
                $(".room3").click(function(){
                    if($(this).data("room-status")=="0"){
                        if (confirm('Are you sure?')){
                            $(this).text("Settle").data("room-status", "1");
                            $(".room3_status").text("OPEN").removeClass("room-closed").addClass("room-open");
                            var room = $(this).data("room");
                            $.ajax({
                                url:'update-test2.php',
                                method:'POST',
                                data:{
                                    'stat':$(this).data("room-status"),
                                    'num':room
                                }
                            })
                        }
                    }
                    else{
                        var days = prompt('For how many days someone will be in this room?');
                        if (days > 0){
                            $(this).text("Move out").data("room-status", "0");
                            $(".room3_status").text("CLOSED").removeClass("room-open").addClass("room-closed");
                            var room = $(this).data("room");
                            $.ajax({
                                url:'update-test.php',
                                method:'POST',
                                data:{
                                    'stat':$(this).data("room-status"),
                                    'num':room,
                                    'days':days
                                }
                            });
                        }
                    }
                });
                $(".room4").click(function(){
                    if($(this).data("room-status")=="0"){
                        if (confirm('Are you sure?')){
                            $(this).text("Settle").data("room-status", "1");
                            $(".room4_status").text("OPEN").removeClass("room-closed").addClass("room-open");
                            var room = $(this).data("room");
                            $.ajax({
                                url:'update-test2.php',
                                method:'POST',
                                data:{
                                    'stat':$(this).data("room-status"),
                                    'num':room
                                }
                            });
                        }
                    }
                    else{
                        var days = prompt('For how many days someone will be in this room?');
                        if (days > 0){
                            $(this).text("Move out").data("room-status", "0");
                            $(".room4_status").text("CLOSED").removeClass("room-open").addClass("room-closed");
                            var room = $(this).data("room");
                            $.ajax({
                                url:'update-test.php',
                                method:'POST',
                                data:{
                                    'stat':$(this).data("room-status"),
                                    'num':room,
                                    'days':days
                                }
                            });
                        }
                    }
                });
                $(".room5").click(function(){
                    if($(this).data("room-status")=="0"){
                        if (confirm('Are you sure?')){
                            $(this).text("Settle").data("room-status", "1");
                            $(".room5_status").text("OPEN").removeClass("room-closed").addClass("room-open");
                            var room = $(this).data("room");
                            $.ajax({
                                url:'update-test2.php',
                                method:'POST',
                                data:{
                                    'stat':$(this).data("room-status"),
                                    'num':room
                                }
                            })
                        }
                    }
                    else{
                        var days = prompt('For how many days someone will be in this room?');
                        if (days > 0){
                            $(this).text("Move out").data("room-status", "0");
                            $(".room5_status").text("CLOSED").removeClass("room-open").addClass("room-closed");
                            var room = $(this).data("room");
                            $.ajax({
                                url:'update-test.php',
                                method:'POST',
                                data:{
                                    'stat':$(this).data("room-status"),
                                    'num':room,
                                    'days':days
                                }
                            });
                        }
                    }
                });
                $(".room6").click(function(){
                    if($(this).data("room-status")=="0"){
                        if (confirm('Are you sure?')){
                            $(this).text("Settle").data("room-status", "1");
                            $(".room6_status").text("OPEN").removeClass("room-closed").addClass("room-open");
                            var room = $(this).data("room");
                            $.ajax({
                                url:'update-test2.php',
                                method:'POST',
                                data:{
                                    'stat':$(this).data("room-status"),
                                    'num':room
                                }
                            })
                        }
                    }
                    else{
                        var days = prompt('For how many days someone will be in this room?');
                        if (days > 0){
                            $(this).text("Move out").data("room-status", "0");
                            $(".room6_status").text("CLOSED").removeClass("room-open").addClass("room-closed");
                            var room = $(this).data("room");
                            $.ajax({
                                url:'update-test.php',
                                method:'POST',
                                data:{
                                    'stat':$(this).data("room-status"),
                                    'num':room,
                                    'days':days
                                }
                            });
                        }
                    }
                });
                $(".room7").click(function(){
                    if($(this).data("room-status")=="0"){
                        if (confirm('Are you sure?')){
                            $(this).text("Settle").data("room-status", "1");
                            $(".room7_status").text("OPEN").removeClass("room-closed").addClass("room-open");
                            var room = $(this).data("room");
                            $.ajax({
                                url:'update-test2.php',
                                method:'POST',
                                data:{
                                    'stat':$(this).data("room-status"),
                                    'num':room
                                }
                            })
                        }
                    }
                    else{
                        var days = prompt('For how many days someone will be in this room?');
                        if (days > 0){
                            $(this).text("Move out").data("room-status", "0");
                            $(".room7_status").text("CLOSED").removeClass("room-open").addClass("room-closed");
                            var room = $(this).data("room");
                            $.ajax({
                                url:'update-test.php',
                                method:'POST',
                                data:{
                                    'stat':$(this).data("room-status"),
                                    'num':room,
                                    'days':days
                                }
                            });
                        }
                    }
                });
                $(".room8").click(function(){
                    if($(this).data("room-status")=="0"){
                        if (confirm('Are you sure?')){
                            $(this).text("Settle").data("room-status", "1");
                            $(".room8_status").text("OPEN").removeClass("room-closed").addClass("room-open");
                            var room = $(this).data("room");
                            $.ajax({
                                url:'update-test2.php',
                                method:'POST',
                                data:{
                                    'stat':$(this).data("room-status"),
                                    'num':room
                                }
                            })
                        }
                    }
                    else{
                        var days = prompt('For how many days someone will be in this room?');
                        if (days > 0){
                            $(this).text("Move out").data("room-status", "0");
                            $(".room8_status").text("CLOSED").removeClass("room-open").addClass("room-closed");
                            var room = $(this).data("room");
                            $.ajax({
                                url:'update-test.php',
                                method:'POST',
                                data:{
                                    'stat':$(this).data("room-status"),
                                    'num':room,
                                    'days':days
                                }
                            });
                        }
                    }
                });
                $(".room9").click(function(){
                    if($(this).data("room-status")=="0"){
                        if (confirm('Are you sure?')){
                            $(this).text("Settle").data("room-status", "1");
                            $(".room9_status").text("OPEN").removeClass("room-closed").addClass("room-open");
                            var room = $(this).data("room");
                            $.ajax({
                                url:'update-test2.php',
                                method:'POST',
                                data:{
                                    'stat':$(this).data("room-status"),
                                    'num':room
                                }
                            })
                        }
                    }
                    else{
                        var days = prompt('For how many days someone will be in this room?');
                        if (days > 0){
                            $(this).text("Move out").data("room-status", "0");
                            $(".room9_status").text("CLOSED").removeClass("room-open").addClass("room-closed");
                            var room = $(this).data("room");
                            $.ajax({
                                url:'update-test.php',
                                method:'POST',
                                data:{
                                    'stat':$(this).data("room-status"),
                                    'num':room,
                                    'days':days
                                }
                            });
                        }
                    }
                });
                $(".room10").click(function(){
                    if($(this).data("room-status")=="0"){
                        if (confirm('Are you sure?')){
                            $(this).text("Settle").data("room-status", "1");
                            $(".room10_status").text("OPEN").removeClass("room-closed").addClass("room-open");
                            var room = $(this).data("room");
                            $.ajax({
                                url:'update-test2.php',
                                method:'POST',
                                data:{
                                    'stat':$(this).data("room-status"),
                                    'num':room
                                }
                            })
                        }
                    }
                    else{
                        var days = prompt('For how many days someone will be in this room?');
                        if (days > 0){
                            $(this).text("Move out").data("room-status", "0");
                            $(".room10_status").text("CLOSED").removeClass("room-open").addClass("room-closed");
                            var room = $(this).data("room");
                            $.ajax({
                                url:'update-test.php',
                                method:'POST',
                                data:{
                                    'stat':$(this).data("room-status"),
                                    'num':room,
                                    'days':days
                                }
                            });
                        }
                    }
                });
                $(".room11").click(function(){
                    if($(this).data("room-status")=="0"){
                        if (confirm('Are you sure?')){
                            $(this).text("Settle").data("room-status", "1");
                            $(".room11_status").text("OPEN").removeClass("room-closed").addClass("room-open");
                            var room = $(this).data("room");
                            $.ajax({
                                url:'update-test2.php',
                                method:'POST',
                                data:{
                                    'stat':$(this).data("room-status"),
                                    'num':room
                                }
                            })
                        }
                    }
                    else{
                        var days = prompt('For how many days someone will be in this room?');
                        if (days > 0){
                            $(this).text("Move out").data("room-status", "0");
                            $(".room11_status").text("CLOSED").removeClass("room-open").addClass("room-closed");
                            var room = $(this).data("room");
                            $.ajax({
                                url:'update-test.php',
                                method:'POST',
                                data:{
                                    'stat':$(this).data("room-status"),
                                    'num':room,
                                    'days':days
                                }
                            });
                        }
                    }
                });
                $(".room12").click(function(){
                    if($(this).data("room-status")=="0"){
                        if (confirm('Are you sure?')){
                            $(this).text("Settle").data("room-status", "1");
                            $(".room12_status").text("OPEN").removeClass("room-closed").addClass("room-open");
                            var room = $(this).data("room");
                            $.ajax({
                                url:'update-test2.php',
                                method:'POST',
                                data:{
                                    'stat':$(this).data("room-status"),
                                    'num':room
                                }
                            })
                        }
                    }
                    else{
                        var days = prompt('For how many days someone will be in this room?');
                        if (days > 0){
                            $(this).text("Move out").data("room-status", "0");
                            $(".room12_status").text("CLOSED").removeClass("room-open").addClass("room-closed");
                            var room = $(this).data("room");
                            $.ajax({
                                url:'update-test.php',
                                method:'POST',
                                data:{
                                    'stat':$(this).data("room-status"),
                                    'num':room,
                                    'days':days
                                }
                            });
                        }
                    }
                });
                $(".room13").click(function(){
                    if($(this).data("room-status")=="0"){
                        if (confirm('Are you sure?')){
                            $(this).text("Settle").data("room-status", "1");
                            $(".room13_status").text("OPEN").removeClass("room-closed").addClass("room-open");
                            var room = $(this).data("room");
                            $.ajax({
                                url:'update-test2.php',
                                method:'POST',
                                data:{
                                    'stat':$(this).data("room-status"),
                                    'num':room
                                }
                            })
                        }
                    }
                    else{
                        var days = prompt('For how many days someone will be in this room?');
                        if (days > 0){
                            $(this).text("Move out").data("room-status", "0");
                            $(".room13_status").text("CLOSED").removeClass("room-open").addClass("room-closed");
                            var room = $(this).data("room");
                            $.ajax({
                                url:'update-test.php',
                                method:'POST',
                                data:{
                                    'stat':$(this).data("room-status"),
                                    'num':room,
                                    'days':days
                                }
                            });
                        }
                    }
                });
                $(".room14").click(function(){
                    if($(this).data("room-status")=="0"){
                        if (confirm('Are you sure?')){
                            $(this).text("Settle").data("room-status", "1");
                            $(".room14_status").text("OPEN").removeClass("room-closed").addClass("room-open");
                            var room = $(this).data("room");
                            $.ajax({
                                url:'update-test2.php',
                                method:'POST',
                                data:{
                                    'stat':$(this).data("room-status"),
                                    'num':room
                                }
                            })
                        }
                    }
                    else{
                        var days = prompt('For how many days someone will be in this room?');
                        if (days > 0){
                            $(this).text("Move out").data("room-status", "0");
                            $(".room14_status").text("CLOSED").removeClass("room-open").addClass("room-closed");
                            var room = $(this).data("room");
                            $.ajax({
                                url:'update-test.php',
                                method:'POST',
                                data:{
                                    'stat':$(this).data("room-status"),
                                    'num':room,
                                    'days':days
                                }
                            });
                        }
                    }
                });
                $(".room15").click(function(){
                    if($(this).data("room-status")=="0"){
                        if (confirm('Are you sure?')){
                            $(this).text("Settle").data("room-status", "1");
                            $(".room15_status").text("OPEN").removeClass("room-closed").addClass("room-open");
                            var room = $(this).data("room");
                            $.ajax({
                                url:'update-test2.php',
                                method:'POST',
                                data:{
                                    'stat':$(this).data("room-status"),
                                    'num':room
                                }
                            })
                        }
                    }
                    else{
                        var days = prompt('For how many days someone will be in this room?');
                        if (days > 0){
                            $(this).text("Move out").data("room-status", "0");
                            $(".room15_status").text("CLOSED").removeClass("room-open").addClass("room-closed");
                            var room = $(this).data("room");
                            $.ajax({
                                url:'update-test.php',
                                method:'POST',
                                data:{
                                    'stat':$(this).data("room-status"),
                                    'num':room,
                                    'days':days
                                }
                            });
                        }
                    }
                });
                $(".room16").click(function(){
                    if($(this).data("room-status")=="0"){
                        if (confirm('Are you sure?')){
                            $(this).text("Settle").data("room-status", "1");
                            $(".room16_status").text("OPEN").removeClass("room-closed").addClass("room-open");
                            var room = $(this).data("room");
                            $.ajax({
                                url:'update-test2.php',
                                method:'POST',
                                data:{
                                    'stat':$(this).data("room-status"),
                                    'num':room
                                }
                            })
                        }
                    }
                    else{
                        var days = prompt('For how many days someone will be in this room?');
                        if (days > 0){
                            $(this).text("Move out").data("room-status", "0");
                            $(".room16_status").text("CLOSED").removeClass("room-open").addClass("room-closed");
                            var room = $(this).data("room");
                            $.ajax({
                                url:'update-test.php',
                                method:'POST',
                                data:{
                                    'stat':$(this).data("room-status"),
                                    'num':room,
                                    'days':days
                                }
                            });
                        }
                    }
                });
                $(".room17").click(function(){
                    if($(this).data("room-status")=="0"){
                        if (confirm('Are you sure?')){
                            $(this).text("Settle").data("room-status", "1");
                            $(".room17_status").text("OPEN").removeClass("room-closed").addClass("room-open");
                            var room = $(this).data("room");
                            $.ajax({
                                url:'update-test2.php',
                                method:'POST',
                                data:{
                                    'stat':$(this).data("room-status"),
                                    'num':room
                                }
                            })
                        }
                    }
                    else{
                        var days = prompt('For how many days someone will be in this room?');
                        if (days > 0){
                            $(this).text("Move out").data("room-status", "0");
                            $(".room17_status").text("CLOSED").removeClass("room-open").addClass("room-closed");
                            var room = $(this).data("room");
                            $.ajax({
                                url:'update-test.php',
                                method:'POST',
                                data:{
                                    'stat':$(this).data("room-status"),
                                    'num':room,
                                    'days':days
                                }
                            });
                        }
                    }
                });
                $(".room18").click(function(){
                    if($(this).data("room-status")=="0"){
                        if (confirm('Are you sure?')){
                            $(this).text("Settle").data("room-status", "1");
                            $(".room18_status").text("OPEN").removeClass("room-closed").addClass("room-open");
                            var room = $(this).data("room");
                            $.ajax({
                                url:'update-test2.php',
                                method:'POST',
                                data:{
                                    'stat':$(this).data("room-status"),
                                    'num':room
                                }
                            })
                        }
                    }
                    else{
                        var days = prompt('For how many days someone will be in this room?');
                        if (days > 0){
                            $(this).text("Move out").data("room-status", "0");
                            $(".room18_status").text("CLOSED").removeClass("room-open").addClass("room-closed");
                            var room = $(this).data("room");
                            $.ajax({
                                url:'update-test.php',
                                method:'POST',
                                data:{
                                    'stat':$(this).data("room-status"),
                                    'num':room,
                                    'days':days
                                }
                            });
                        }
                    }
                });
            });
        </script>
</head>
<body>
    <header>
        <h1 id="hotel">L'Mira Hotel</h1>
        <a href="bada2-test.php">Archieve</a>
    </header>
    <table id="rooms_table">
        <tr>
            <th id="number">№</th>
            <th id="status">Status</th>
            <th id="exp_date">Expiration Date</th>
            <th id="change">Interaction</th>
        </tr>
        <?php if ($bong[0] == 1): ?>
        <tr>
            <td>№1</td>
            <td id="cc" class="room1_status room-open" data-room="1">OPEN</td>
            <td></td>
            <td id="dd" class="room1" data-room="1" data-room-status="1">Settle</td>
        </tr>
        <?php else: ?>
        <tr>
            <td>№1</td>
            <td id="cc" class="room1_status room-closed" data-room="1">CLOSED</td>
            <?php  echo "<td>$date_in[0]</td>" ?>
            <td id="dd" class="room1" data-room="1" data-room-status="0">Move out</td>
        </tr>
        <?php endif; ?>
        <?php if ($bong[1] == 1): ?>
        <tr>
            <td>№2</td>
            <td id="cc" class="room2_status room-open" data-room="2">OPEN</td>
            <td></td>
            <td id="dd" class="room2" data-room="2" data-room-status="1">Settle</td>
        </tr>
        <?php else: ?>
        <tr>
            <td>№2</td>
            <td id="cc" class="room2_status room-closed" data-room="2">CLOSED</td>
            <?php  echo "<td>$date_in[1]</td>" ?>
            <td id="dd" class="room2" data-room="2" data-room-status="0">Move out</td>
        </tr>
        <?php endif; ?>
        <?php if ($bong[2] == 1): ?>
        <tr>
            <td>№3</td>
            <td id="cc" class="room3_status room-open" data-room="3">OPEN</td>
            <td></td>
            <td id="dd" class="room3" data-room="3" data-room-status="1">Settle</td>
        </tr>
        <?php else: ?>
        <tr>
            <td>№3</td>
            <td id="cc" class="room3_status room-closed" data-room="3">CLOSED</td>
            <?php  echo "<td>$date_in[2]</td>" ?>
            <td id="dd" class="room3" data-room="3" data-room-status="0">Move out</td>
        </tr>
        <?php endif; ?>
        <?php if ($bong[3] == 1): ?>
        <tr>
            <td>№4</td>
            <td id="cc" class="room4_status room-open" data-room="4">OPEN</td>
            <td></td>
            <td id="dd" class="room4" data-room="4" data-room-status="1">Settle</td>
        </tr>
        <?php else: ?>
        <tr>
            <td>№4</td>
            <td id="cc" class="room4_status room-closed" data-room="4">CLOSED</td>
            <td></td>
            <td id="dd" class="room4" data-room="4" data-room-status="0">Move out</td>
        </tr>
        <?php endif; ?>
        <?php if ($bong[4] == 1): ?>
        <tr>
            <td>№5</td>
            <td id="cc" class="room5_status room-open" data-room="5">OPEN</td>
            <td></td>
            <td id="dd" class="room5" data-room="5" data-room-status="1">Settle</td>
        </tr>
        <?php else: ?>
        <tr>
            <td>№5</td>
            <td id="cc" class="room5_status room-closed" data-room="5">CLOSED</td>
            <td></td>
            <td id="dd" class="room5" data-room="5" data-room-status="0">Move out</td>
        </tr>
        <?php endif; ?>
        <?php if ($bong[5] == 1): ?>
        <tr>
            <td>№6</td>
            <td id="cc" class="room6_status room-open" data-room="6">OPEN</td>
            <td></td>
            <td id="dd" class="room6" data-room="6" data-room-status="1">Settle</td>
        </tr>
        <?php else: ?>
        <tr>
            <td>№6</td>
            <td id="cc" class="room6_status room-closed" data-room="6">CLOSED</td>
            <td></td>
            <td id="dd" class="room6" data-room="6" data-room-status="0">Move out</td>
        </tr>
        <?php endif; ?>
        <?php if ($bong[6] == 1): ?>
        <tr>
            <td>№7</td>
            <td id="cc" class="room7_status room-open" data-room="7">OPEN</td>
            <td></td>
            <td id="dd" class="room7" data-room="7" data-room-status="1">Settle</td>
        </tr>
        <?php else: ?>
        <tr>
            <td>№7</td>
            <td id="cc" class="room7_status room-closed" data-room="7">CLOSED</td>
            <td></td>
            <td id="dd" class="room7" data-room="7" data-room-status="0">Move out</td>
        </tr>
        <?php endif; ?>
        <?php if ($bong[7] == 1): ?>
        <tr>
            <td>№8</td>
            <td id="cc" class="room8_status room-open" data-room="8">OPEN</td>
            <td></td>
            <td id="dd" class="room8" data-room="8" data-room-status="1">Settle</td>
        </tr>
        <?php else: ?>
        <tr>
            <td>№8</td>
            <td id="cc" class="room8_status room-closed" data-room="8">CLOSED</td>
            <td></td>
            <td id="dd" class="room8" data-room="8" data-room-status="0">Move out</td>
        </tr>
        <?php endif; ?>
        <?php if ($bong[8] == 1): ?>
        <tr>
            <td>№9</td>
            <td id="cc" class="room9_status room-open" data-room="9">OPEN</td>
            <td></td>
            <td id="dd" class="room9" data-room="9" data-room-status="1">Settle</td>
        </tr>
        <?php else: ?>
        <tr>
            <td>№9</td>
            <td id="cc" class="room9_status room-closed" data-room="9">CLOSED</td>
            <td></td>
            <td id="dd" class="room9" data-room="9" data-room-status="0">Move out</td>
        </tr>
        <?php endif; ?>
        <?php if ($bong[9] == 1): ?>
        <tr>
            <td>№10</td>
            <td id="cc" class="room10_status room-open" data-room="10">OPEN</td>
            <td></td>
            <td id="dd" class="room10" data-room="10" data-room-status="1">Settle</td>
        </tr>
        <?php else: ?>
        <tr>
            <td>№10</td>
            <td id="cc" class="room10_status room-closed" data-room="10">CLOSED</td>
            <td></td>
            <td id="dd" class="room10" data-room="10" data-room-status="0">Move out</td>
        </tr>
        <?php endif; ?>
        <?php if ($bong[10] == 1): ?>
        <tr>
            <td>№11</td>
            <td id="cc" class="room11_status room-open" data-room="11">OPEN</td>
            <td></td>
            <td id="dd" class="room11" data-room="11" data-room-status="1">Settle</td>
        </tr>
        <?php else: ?>
        <tr>
            <td>№11</td>
            <td id="cc" class="room11_status room-closed" data-room="11">CLOSED</td>
            <td></td>
            <td id="dd" class="room11" data-room="11" data-room-status="0">Move out</td>
        </tr>
        <?php endif; ?>
        <?php if ($bong[11] == 1): ?>
        <tr>
            <td>№12</td>
            <td id="cc" class="room12_status room-open" data-room="12">OPEN</td>
            <td></td>
            <td id="dd" class="room12" data-room="12" data-room-status="1">Settle</td>
        </tr>
        <?php else: ?>
        <tr>
            <td>№12</td>
            <td id="cc" class="room12_status room-closed" data-room="12">CLOSED</td>
            <td></td>
            <td id="dd" class="room12" data-room="12" data-room-status="0">Move out</td>
        </tr>
        <?php endif; ?>
        <?php if ($bong[12] == 1): ?>
        <tr>
            <td>№13</td>
            <td id="cc" class="room13_status room-open" data-room="13">OPEN</td>
            <td></td>
            <td id="dd" class="room13" data-room="13" data-room-status="1">Settle</td>
        </tr>
        <?php else: ?>
        <tr>
            <td>№13</td>
            <td id="cc" class="room13_status room-closed" data-room="13">CLOSED</td>
            <td></td>
            <td id="dd" class="room13" data-room="13" data-room-status="0">Move out</td>
        </tr>
        <?php endif; ?>
        <?php if ($bong[13] == 1): ?>
        <tr>
            <td>№14</td>
            <td id="cc" class="room14_status room-open" data-room="14">OPEN</td>
            <td></td>
            <td id="dd" class="room14" data-room="14" data-room-status="1">Settle</td>
        </tr>
        <?php else: ?>
        <tr>
            <td>№14</td>
            <td id="cc" class="room14_status room-closed" data-room="14">CLOSED</td>
            <td></td>
            <td id="dd" class="room14" data-room="14" data-room-status="0">Move out</td>
        </tr>
        <?php endif; ?>
        <?php if ($bong[14] == 1): ?>
        <tr>
            <td>№15</td>
            <td id="cc" class="room15_status room-open" data-room="15">OPEN</td>
            <td></td>
            <td id="dd" class="room15" data-room="15" data-room-status="1">Settle</td>
        </tr>
        <?php else: ?>
        <tr>
            <td>№15</td>
            <td id="cc" class="room15_status room-closed" data-room="15">CLOSED</td>
            <td></td>
            <td id="dd" class="room15" data-room="15" data-room-status="0">Move out</td>
        </tr>
        <?php endif; ?>
        <?php if ($bong[15] == 1): ?>
        <tr>
            <td>№16</td>
            <td id="cc" class="room16_status room-open" data-room="16">OPEN</td>
            <td></td>
            <td id="dd" class="room16" data-room="16" data-room-status="1">Settle</td>
        </tr>
        <?php else: ?>
        <tr>
            <td>№16</td>
            <td id="cc" class="room16_status room-closed" data-room="16">CLOSED</td>
            <td></td>
            <td id="dd" class="room16" data-room="16" data-room-status="0">Move out</td>
        </tr>
        <?php endif; ?>
        <?php if ($bong[16] == 1): ?>
        <tr>
            <td>№17</td>
            <td id="cc" class="room17_status room-open" data-room="17">OPEN</td>
            <td></td>
            <td id="dd" class="room17" data-room="17" data-room-status="1">Settle</td>
        </tr>
        <?php else: ?>
        <tr>
            <td>№17</td>
            <td id="cc" class="room17_status room-closed" data-room="17">CLOSED</td>
            <td></td>
            <td id="dd" class="room17" data-room="17" data-room-status="0">Move out</td>
        </tr>
        <?php endif; ?>
        <?php if ($bong[17] == 1): ?>
        <tr>
            <td>№18</td>
            <td id="cc" class="room18_status room-open" data-room="18">OPEN</td>
            <td></td>
            <td id="dd" class="room18" data-room="18" data-room-status="1">Settle</td>
        </tr>
        <?php else: ?>
        <tr>
            <td>№18</td>
            <td id="cc" class="room18_status room-closed" data-room="18">CLOSED</td>
            <td></td>
            <td id="dd" class="room18" data-room="18" data-room-status="0">Move out</td>
        </tr>
        <?php endif; ?>
    </table>
</body>
</html>