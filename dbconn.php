<?php
    $server="localhost";
    $userdb="root";
    $passdb="";
    $dbname="registro";
    
    $conn = mysqli_connect($server,$userdb,$passdb,$dbname);

    if ($conn->connect_error){
        die("connection failed". $conn->connect_error);
    }
?>