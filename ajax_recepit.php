<?php
 
  $output='';
  $message='';
  $billno=0;
       
  $con=mysqli_connect('34.93.221.231','root','root123','srikaappi');
    if(!$con){
        die("Connection error ".mysqli_connect_error());
    }
    $sql = "SELECT id, beverage, quantity, amount FROM sri_beverages";
    $result = mysqli_query($con, $sql);
    

        if (mysqli_num_rows($result) > 0) {
            $count=0;
            $total=0;

            $sql="select * from sri_beverages";
            $res=$con->query($sql);

            while($row=$res->fetch_assoc()){
    
                $total=$total+$row["amount"];
            }
             
            $sql="select * from sri_recepit";
            $res=$con->query($sql);
            $recepit=0;
            
            while($row=$res->fetch_assoc()){
                $billno=$row["billnumber"];
            }
            $billno++;
            
            date_default_timezone_set('Asia/Kolkata');
            $date = date('Y-m-d H:i:s');
            $time="".date("h:i a");

                    $sql="Insert into sri_recepit (billnumber,date,time,totalamount) values('$billno','$date','$time','$total')";
                    if(mysqli_query($con,$sql)){
                        $output=$billno;
                    } else {
                        $output=$billno;
                }
        }

  echo $output;       
  ?>