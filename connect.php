<?php 

    $conn = new mysqli('localhost','root','','php_crud01');

    if($conn->connect_errno){
        die("Connection failed".$conn->connect_error);
    }
?>