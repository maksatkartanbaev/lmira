<?php
session_start();
if (isset($_SESSION['identity'])){
    $_SESSION['identity'] = 'korol';
    header('Location: bada.php');
}
else{
    header('Location: index.php');
}
?>