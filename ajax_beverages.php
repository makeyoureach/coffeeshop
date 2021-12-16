<?php
    
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, X-Requested-With");
    header("Content-Type: application/json; charset=UTF-8");
    
    if(isset($_POST['name'])){
    $name=$_POST['name'];
    $quantity=$_POST['qty'];
    
    $con=mysqli_connect('34.93.221.231','root','root123','srikaappi');
    
    if(!$con){
        die("Connection error ".mysqli_connect_error());
    }
    $sql = "SELECT id, beverage, quantity, amount FROM sri_beverages";
    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) > 0) {
       
        $count=0;
        $id=0;
        $quantity=1;
        $calAmount=0;

        while($row = mysqli_fetch_assoc($result)) {
            if($row["beverage"]==$name){
                $count=1;
                $id=$row["id"];
                $quantity=$row["quantity"];
                $amount=$row["amount"];
            }
        //   echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
        }
        if($count==1 && $id>0){
           $calAmount=($amount/$quantity);
           $quantity++;
           $calAmount=$calAmount*$quantity;
           $sql ="UPDATE sri_beverages SET quantity='$quantity',amount='$calAmount' WHERE id=$id";
           if(mysqli_query($con,$sql)){
                // echo "update record successfully";
            } else {
                // echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        }else{
            $amount=$_POST['amt'];
            $sql="Insert into sri_beverages (beverage,quantity,amount) values('$name','$quantity','$amount')";
            if(mysqli_query($con,$sql)){
                echo "success";
                // echo "New record created successfully";
            } else {
            //   echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        }
      } else{
        $amount=$_POST['amt'];
        $sql="Insert into sri_beverages (beverage,quantity,amount) values('$name','$quantity','$amount')";
        if(mysqli_query($con,$sql)){
            echo "success";
            // echo "New record created successfully";
        } else {
        //   echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
    mysqli_close($con);
    }else{
        // echo "Record is empty";
    }

?>