<?php include 'functions.php' ?>
<?php
    session_start();
    session_destroy();
    redirect('index.php');
?>