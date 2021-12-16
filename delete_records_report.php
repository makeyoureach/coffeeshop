<?php
    
    $con=mysqli_connect('34.93.221.231','root','root123','srikaappi');
    if(!$con){
        die("Connection error ".mysqli_connect_error());
    }
    $sql = "TRUNCATE TABLE sri_recepit";
    $result = mysqli_query($con, $sql);
    mysqli_close($con); 
?>