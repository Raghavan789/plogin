<?php

    $sname="localhost";
    $uname="root";
    $password="";

    $dbname="test_db";

    $conn = mysqli_connect($name,$uname.$password,$db_name);

     if(!$conn){
        echo "connection Failed";
     }
?>