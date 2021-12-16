<?php
 
  
  $output='';
  $message='';
  $total= 0;
    if(isset($_POST['name'])){
        
    $name=$_POST['name'];
    $quantity=$_POST['qty'];
    
    // $con=mysqli_connect('localhost','root','','sricoffee');
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
        }
        if($count==1 && $id>0){
           $calAmount=($amount/$quantity);
           $quantity++;
           $calAmount=$calAmount*$quantity;
           $sql ="UPDATE sri_beverages SET quantity='$quantity',amount='$calAmount' WHERE id=$id";
           if(mysqli_query($con,$sql)){
                $message='success';
            } else {
                // echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        }else{
            $amount=$_POST['amt'];
            $sql="Insert into sri_beverages (beverage,quantity,amount) values('$name','$quantity','$amount')";
            if(mysqli_query($con,$sql)){
                $message='success';
            } else {
            //   echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        }
      } else{
        $amount=$_POST['amt'];
        $sql="Insert into sri_beverages (beverage,quantity,amount) values('$name','$quantity','$amount')";
        if(mysqli_query($con,$sql)){
            $message='success';
        } else {
        //   echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
    mysqli_close($con);
    } else{
        
    }

    if($message=='success'){
        $con=mysqli_connect('34.93.221.231','root','root123','srikaappi');
        $sql="select * from sri_beverages";
        $res=$con->query($sql);
        $index=1;
        while($row=$res->fetch_assoc()){

            $output.="<tr>
            <th scope='row'>{$index}</th>
            <td>{$row["beverage"]}</td>
            <td><div class='qty_direction'><a class='btn-plus-icon sub_qty'>
            <div>
            <input type='hidden' id='uid' value='".$row["id"]."'/>
            <input type='hidden' id='uqty' value='".$row["quantity"]."'/>
            <input type='hidden' class='totalamount' id='totalamount' value='".$total."'/>
            <img src='photos/sub.png' width='25' id='plus-icon'/>
            </div></a> <p id='qty'>{$row["quantity"]}</p> 
            <a class='btn-sub-icon plus_qty'>
            <div>
            <input type='hidden' id='sid' value='".$row["id"]."'/>
            <input type='hidden' id='sqty' value='".$row["quantity"]."'/>
            <img src='photos/plus.png' width='25' id='sub-icon'/></div>
            </a></div></td>
            <td>{$row["amount"]}</td>
            </tr>";
            $index++;
        }

        $sql="select * from sri_beverages";
        $res=$con->query($sql);
        $index=1;
        while($row=$res->fetch_assoc()){

            $total=$total+$row["amount"];
        }

    }else{

    }
    $data["output"]=$output;
    $data["total"]=$total;

  echo json_encode($data);       
  ?>