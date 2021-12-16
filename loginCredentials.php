<?php
    
    $con=mysqli_connect('localhost','root','','sricoffee');
    if(!$con){
        die("Connection error ".mysqli_connect_error());
    }
    $sql="Insert into sri_login (username,password) values('srikaappi','srikaappi')";
    if(mysqli_query($con,$sql)){
        $message='success';
    } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    mysqli_close($con); 
?>