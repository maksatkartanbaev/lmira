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

$sql = "SELECT * FROM test";
$result = mysqli_query($conn, $sql);

$i = 0;
while($room = mysqli_fetch_array($result)){
    $status[$i] = $room['status'];
    $price[$i] = $room['price_per_day'];
    $name[$i] = $room['name_surname'];
    $organization[$i] = $room['organization'];
    $number_of_people[$i] = $room['number_of_people'];
    $date_in[$i] = $room['date_in'];
    $date_out[$i] = $room['date_out'];
    $current_paid[$i] = $room['current_paid'];
    $total_pay[$i] = $room['total_pay'];
    $remain_pay[$i] = $room['remain_pay'];
    $i++;
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="dist/jquery-confirm.min.js"></script>
    <script src="dist/bootstrap.min.js"></script>
    <script>
        $(document).ready(function(){
            $('.room').click(function(){
                var room = $(this).data("room");
                if($(this).data("room-status")=="0"){
                    $.confirm({
                        useBootstrap: false,
                        title: '',
                        content: 'Do you want to move them out or did they pay something?',
                        buttons: {
                            confirm: {
                                text: 'Add money',
                                btnClass: 'btn-primary',
                                action: function(){
                                    $.confirm({
                                        useBootstrap: false,
                                        title: '',
                                        content: '' +
                                        '<form action="" class="container">' +
                                        '<label>How much more did they pay?</label>' +
                                        '<input type="text" placeholder="Amount of money" class="amount form-control" required />' +
                                        '</div>' +
                                        '</form',
                                        buttons: {
                                            formSubmit: {
                                                text: 'Submit',
                                                btnClass: 'btn-success',
                                                action: function(){
                                                    var amount = this.$content.find('.amount').val();
                                                    if(!amount){
                                                        $.alert('provide a valid amount');
                                                        return false;
                                                    }
                                                    location.reload();
                                                    return $.ajax({
                                                        url: 'update-test-add.php',
                                                        method: 'POST',
                                                        data:{
                                                            'room':room,
                                                            'amount':amount
                                                        }
                                                    })
                                                }
                                            },
                                            cancel: {
                                                btnClass: 'btn-danger',
                                                action: function(){
                                                }
                                            },
                                        }
                                    })
                                }
                            },
                            moveOut: {
                                text: 'Move out',
                                btnClass: 'btn-danger',
                                action: function(){
                                    $.confirm({
                                        title: 'Confirm!',
                                        content: 'Are you sure?',
                                        buttons:{
                                            confirm: {
                                                btnClass: 'btn-success',
                                                action: function(){
                                                    location.reload();
                                                    $.alert('Moved out!');
                                                    return $.ajax({
                                                        url: 'update-test-move-out.php',
                                                        method: 'POST',
                                                        data:{
                                                            'room': room
                                                        }
                                                    })
                                                }
                                            },
                                            cancel: {
                                                btnClass: 'btn-danger',
                                                action: function(){
                                                }
                                            },
                                        }
                                    });
                                }
                            },
                            cancel: {
                                btnClass: 'btn-success',
                                action: function(){
                                }
                            },
                        },
                    });
                } else{
                    $.confirm({
                        useBootstrap: false,
                        title: '',
                        content: '' +
                        '<form action="" class="container">' +
                        '<div class="form-row">' +
                        '<div class="form-group col-md-3">' +
                        '<label>Enter number of days</label>' +
                        '<input type="text" placeholder="Days" class="days form-control" required />' +
                        '</div>' +
                        '<div class="form-group col-md-3">' +
                        '<label>Enter price per day</label>' +
                        '<input type="text" placeholder="Price" class="price form-control" required />' +
                        '</div>' +
                        '<div class="form-group col-md-3">' +
                        '<label>Enter number of people</label>' +
                        '<input type="text" placeholder="Number of people" class="number_of_people form-control" required />' +
                        '</div>' +
                        '<div class="form-group col-md-3">' +
                        '<label>Enter initial payment</label>' +
                        '<input type="text" placeholder="Initial payment" class="initial_payment form-control" required />' +
                        '</div>' +
                        '</div>' +
                        '<div class="form-row">' +
                        '<div class="form-group col-md-6">' +
                        '<label>Enter Name</label>' +
                        '<input type="text" placeholder="Name & Surname" class="name form-control" required />' +
                        '</div>' +
                        '<div class="form-group col-md-6">' +
                        '<label>Enter Organization</label>' +
                        '<input type="text" placeholder="Name of organization" class="organization form-control" required />' +
                        '</div>' +
                        '</div>' +
                        '</form>',
                        buttons: {
                            formSubmit: {
                                text: 'Submit',
                                btnClass: 'btn-success',
                                action: function(){
                                    var days_num = this.$content.find('.days').val();
                                    if(!days_num){
                                        $.alert('provide a valid number of days');
                                        return false;
                                    }
                                    var price = this.$content.find('.price').val();
                                    if(!price){
                                        $.alert('provide valid price');
                                        return false;
                                    }
                                    var number_of_people = this.$content.find('.number_of_people').val();
                                    if(!number_of_people){
                                        $.alert('provide a valid number of people');
                                        return false;
                                    }
                                    var initial_payment = this.$content.find('.initial_payment').val();
                                    if(!initial_payment){
                                        $.alert('provide valid payment');
                                        return false;
                                    }
                                    var name = this.$content.find('.name').val();
                                    if(!name){
                                        $.alert('provide a valid name');
                                        return false;
                                    }
                                    var organization = this.$content.find('.organization').val();
                                    if(!organization){
                                        $.alert('provide a valid organization name');
                                        return false;
                                    }
                                    location.reload();
                                    return $.ajax({
                                        url: 'update-test-settle.php',
                                        method: 'POST',
                                        data:{
                                            'room': room,
                                            'days_num': days_num,
                                            'price': price,
                                            'number_of_people': number_of_people,
                                            'initial_payment': initial_payment,
                                            'name': name,
                                            'organization': organization,
                                        }
                                    })
                                    
                                }
                            },
                            cancel: {
                                btnClass: 'btn-danger',
                                action: function(){
                                }
                            },
                        },
                    });
                }
            });
        });
    </script>
    <link rel="stylesheet" href="dist/jquery-confirm.min.css">
    <link rel="stylesheet" href="dist/bootstrap.min.css">
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
        }
        header h1:hover{
            cursor: default;
        }
        #change{
            border:none;
        }
        #headuk:hover{
            cursor: default;
        }
        #row:hover{
            cursor: default;
        }
        #row{
            pointer-events: none;
        }
        #btn:hover{
            cursor: pointer;
        }
        #pukupk{
            text-align: right;
        }
    </style>
</head>
</html>
<?php
    $i=0;
    echo "<header class='container text-center'>";
    echo "<h1>L'Mira Hotel</h1>";
    echo "<a href='test2.php'><h3 class='btn btn-info' role='button'>Archieve</h3></a>";
    echo "</header>";
    echo "<div class='container'>";
    echo "<table class='table-bordered table-striped table-responsive-sm table-responsive-lg table-responsive-md table-responsive-xl'>";
    echo "<tr id='headuk'>";
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
    echo "</tr>";
    $sum = 0;
    while($i<18){
        $j=$i+1;
        if($status[$i]==1){
            echo "<tr class='room' data-room='$j' data-room-status='1'>";
            echo "<td id='row' class=''>№$j</td>";
            echo "<td id='row' class='bg-success'>OPEN</td>";
            echo "<td id='row' class=''>---</td>";
            echo "<td id='row' class=''>---</td>";
            echo "<td id='row' class=''>---</td>";
            echo "<td id='row' class=''>---</td>";
            echo "<td id='row' class=''>---</td>";
            echo "<td id='row' class=''>---</td>";
            echo "<td id='row' class=''>---</td>";
            echo "<td id='row' class=''>---</td>";
            echo "<td id='row' class=''>---</td>";
            echo "<td id='btn'class='btn-success'>Settle</td>";
            echo "</tr>";
        } else if($status[$i]==0){
            echo "<tr class='room' data-room='$j' data-room-status='0'>";
                    echo "<td id='row' class=''>№$j</td>";
                    echo "<td id='row' class='bg-danger'>CLOSED</td>";
                    echo "<td id='row' class=''>$price[$i]</td>";
                    echo "<td id='row' class=''>$name[$i]</td>";
                    echo "<td id='row' class=''>$organization[$i]</td>";
                    echo "<td id='row' class=''>$number_of_people[$i]</td>";
                    echo "<td id='row' class=''>$date_in[$i]</td>";
                    echo "<td id='row' class=''>$date_out[$i]</td>";
                    echo "<td id='row' class=''>$current_paid[$i]</td>";
                    echo "<td id='row' class=''>$total_pay[$i]</td>";
                    echo "<td id='row' class=''>$remain_pay[$i]</td>";
                    echo "<td id='btn' class='btn-danger'>Edit</td>";
            echo "</tr>";
            $sum = $sum + $total_pay[$i];
        }
        $i++;
    }
    echo "<tr>";
    echo "<td id='pukupk' colspan='11'>Total for month:</td>";
    echo "<td>".$sum."</td>";
    echo "</tr>";
    echo "</table>";
    echo "</div>";
    mysqli_close($conn);
?>