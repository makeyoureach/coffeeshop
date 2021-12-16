<?php
    
    $con=mysqli_connect('localhost','root','','sricoffee');
    if(!$con){
        die("Connection error ".mysqli_connect_error());
    }
    $sql = "TRUNCATE TABLE sri_login";
    $result = mysqli_query($con, $sql);
    mysqli_close($con); 
?>