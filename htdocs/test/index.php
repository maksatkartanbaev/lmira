<?php
    session_start();
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $db = "hotel";
    $conn = mysqli_connect ($dbhost, $dbuser, $dbpass, $db);
    $sql2 = "SELECT login, password FROM admin";
    $result2 = mysqli_query($conn , $sql2);
    $admin = mysqli_fetch_row($result2);
    $submitted = false;
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $submitted = true;
        $login = $_POST['login'];
        $password = $_POST['password'];
        $authenticated = false;
        if (strtolower($login) == strtolower($admin[0]) && $password == $admin[1]){
            $authenticated = true;
            $_SESSION['identity'] = $login;
            header("Location: check.php");
        }
    }
    $sql = "SELECT status FROM test";
    $result = mysqli_query($conn, $sql);
    $i=0;
    while($room = mysqli_fetch_array($result)){
        $status[$i] = $room[0];
        $i++;
    }
    mysqli_close($conn);
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
            margin-left: auto;
            margin-right: auto;
        }
    </style>
</head>
<body>
    <header>
        <h1 class="text-center" id="hotel">L'Mira Hotel</h1>
        <div class="container">
        <form method="post" class="bongo form-group text-center">
            <div class="">
            <label class="" for="login">Login: </label>
            <input type="text" class="" id="login" name="login" placeholder="Login" value = "">
            <label class="" for="password">Password: </label>
            <input type="password" id="password" name="password" placeholder="Password">
            <input type="submit" value="Sign in">
            </div>
        </form>
        </div>
    </header>
    <div class="container">
    <table id="rooms_table" class="table-bordered">
        <tr>
            <th scope="col">№</th>
            <th scope="col">Status</th>
        </tr>
        <?php $i=1; ?>
        <?php $j=0; ?>
        <?php while($i<19): ?>
            <?php $j = $i - 1; ?>
            <tr>
                <?php echo"<td>№$i</td>" ?>
                <?php if($status[$i-1]==1): ?>
                <td class='bg-success'>OPEN</td>
                <?php else: ?>
                <td class='bg-danger'>CLOSED</td>
                <?php endif; ?>
            </tr>
        <?php $i++; ?>
        <?php endwhile; ?>
    </table>
    </div>
</body>
</html>