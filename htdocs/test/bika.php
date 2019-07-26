<?php
    session_start();
    if ($_SESSION['identity'] != 'korol'){
        header('Location: index.php');
        $_SESSION['identity'] = null;
        exit;
    }
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $db = "hotel";
    $conn = mysqli_connect ($dbhost, $dbuser, $dbpass, $db);
    $status = "SELECT status FROM test";
    $result_status = mysqli_query($conn, $status);
    $sql = "SELECT days_num FROM test";
    $result = mysqli_query($conn, $sql);
    $i = 0;
    while($room = mysqli_fetch_array($result_status)){
        $row = mysqli_fetch_array($result);
        $date_in[$i] = date('Y-m-j', strtotime(date('Y-m-j') . ' + ' .$row[0] . ' days'));
        $status[$i] = $room[0];
        $i++;
    }
    ?>
    <html>
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
    <script>
        $(document).ready(function(){
            $('.room').click(function(){
                if($(this).data("room-status")=="0"){
                    if(confirm('Are you sure?')){
                        // $(this).find('.kolko').text('Settle');
                        // $(this).data('room-status', '1').removeClass("room-closed").addClass("room-open");;
                        // $(this).find('.status').text('OPEN');
                        var room = $(this).data("room");
                        $.ajax({
                            url:'update-move-out.php',
                            method:'POST',
                            data:{
                                'num':room
                            }
                        });
                        location.reload();
                    }
                } else{
                    var days = prompt('For how many days someone will be in this room?');
                    if (days > 0){
                        // $(this).find('.kolko').text('Move out');
                        // $(this).data('room-status', '0').removeClass("room-open").addClass("room-closed");
                        // $(this).find('.status').text('CLOSED');
                        var room = $(this).data("room");
                        $.ajax({
                            url:'update-settle.php',
                            method:'POST',
                            data:{
                                'num':room,
                                'days':days
                            }
                        });
                        location.reload();
                    }
                }
            });
        });
    </script>
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
            margin-left: auto;
            margin-right: auto;
            width: 27%;
        }
        header h1:hover{
            cursor: default;
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
        .rooms_table{
            margin-top: 10px;
            margin-left: auto;
            margin-right: auto;
            text-align: center;
        }
        th, td{
            border: 1px #000 solid;
            border-radius: 5px;
            height: 20px;
        }
        #change{
            border: none;
        }
        th, td:hover{
            cursor: default;
        }
        .room-closed{
            background-color: red;
        }
        .room-open{
            background-color: green;
        }
        .row1, .row6{
            background-color: #cd7f55;
            pointer-events: none;
        }
        .row3{
            background-color: #cd7f55;
            pointer-events: none;
            width: 65px;
        }
        .row4, .row5{
            background-color: #cd7f55;
            pointer-events: none;
            width: 200px;
        }
        .row9, .row10, .row11{
            width: 95px;
            background-color: #cd7f55;
            pointer-events: none;
        }
        .row7, .row8{
            width: 115px;
            background-color: #cd7f55;
            pointer-events: none;
        }
        .row12{
            background-color: #cd7f55;
            font: bold Arial;
            color: #333333;
            border-top: 1px solid #CCCCCC;
            border-right: 1px solid #333333;
            border-bottom: 1px solid #333333;
            border-left: 1px solid #CCCCCC;
        }
        .row12:hover{
            background: rgba(245,245,220,0.2);
            color: #000;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
    <form action='update-update.php'>
        
    </form>
</body>
</html>
<?php
    $i=0;
    echo "<header>";
    echo "<h1 id='hotel'>L'Mira Hotel</h1>";
    echo "<a href='bika2.php'>Archieve</a>";
    echo "</header>";
    echo "<table class='rooms_table'>";
    echo "<tr>";
    echo "<th id='number'>№</th>";
    echo "<th id='status'>Status</th>";
    echo "<th id='price'>Price</th>";
    echo "<th id='name'>Name & Surname</th>";
    echo "<th id='org'>Name of organization</th>";
    echo "<th id='persons'>Number of persons</th>";
    echo "<th id='date_in'>Arrival Date</th>";
    echo "<th id='exp_date'>Expiration Date</th>";
    echo "<th id='cur_paid'>Current Paid</th>";
    echo "<th id='total_pay'>Total Pay</th>";
    echo "<th id='remain_pay'>Left to pay</th>";
    echo "<th id='change'></th>";
    echo "</tr>";
    while($i<18){
        $j=$i+1;
        if($status[$i]==1){
            echo "<tr class='room room-open' data-room='$j' data-room-status='1'>";
            echo "<td class='row1'>№$j</td>";
            echo "<td class='row2'>OPEN</td>";
            echo "<td class='row3'></td>";
            echo "<td class='row4'></td>";
            echo "<td class='row5'></td>";
            echo "<td class='row6'></td>";
            echo "<td class='row7'></td>";
            echo "<td class='row8'></td>";
            echo "<td class='row9'></td>";
            echo "<td class='row10'></td>";
            echo "<td class='row11'></td>";
            echo "<td class='row12'>Settle</td>";
            echo "</tr>";
        } else if($status[$i]==0){
            echo "<tr class='room room-closed' data-room='$j' data-room-status='0'>";
            echo "<td class='row1'>№$j</td>";
            echo "<td class='status'>CLOSED</td>";
            echo "<td class='row2'>$date_in[$i]</td>";
            echo "<td class='kolko'>Move out</td>";
            echo "</tr>";
        }
        $i++;
    }
    echo "</table>";
?>