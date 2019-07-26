<?php
session_start();
if (isset($_SESSION['identity'])){
    $_SESSION['identity'] = 'korol';
    header('Location: test.php');
}
else{
    header('Location: index.php');
}
?>