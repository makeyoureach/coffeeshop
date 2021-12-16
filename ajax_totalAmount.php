<?php

  $output=0.0;
  $message='';
  $con=mysqli_connect('34.93.221.231','root','root123','srikaappi');
    if(!$con){
        die("Connection error ".mysqli_connect_error());
    }
    $sql = "SELECT id, beverage, quantity, amount FROM sri_beverages";
    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) > 0) {

        while($row = mysqli_fetch_assoc($result)) {
            $output=$output+$row["amount"];
        }
    }

  echo $output;       
  ?>