<?php 
session_start();
include "db_conn.php";

if((isset($_POST['uname'])) && isset($_POST['password'])){

    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return data;
    }
}

$uname= validate($_POST['uname']);
$pass = validate($_POST['password']);

if(empty($uname)){
    header("Location:index.php?error=User nameis required");
    exit();
}
else if(empty($pass)){
    header("Location:index.php?error=Password is required");
    exit();
}

$sql="SELECT * FROM users WHERE user_name='$uname' AND password='$pass ";

$result = mysqli_query($conn,$sql);

if(my_sqli_num_rows($result) === 1 ){
    $row=mysqli_fetch_assoc($result);
    if($row['user_name'] === $uname && $row['password'] === $pass ){
        echo "Logbged in ";
        $_SESSION['user_name'] = $row['user_name'];
        $_SESSION['name'] = $row['name'];
        $_SESSION['id'] = $row['id'];
        header("Location:home.php");
        exit();
    }
    else{
        header("Location :index.php?error=Incorrect User name or Password ");
        exit();
    }
}
else{
    header("Location index.php");
    exit();
}
?>