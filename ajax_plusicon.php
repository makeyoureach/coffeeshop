<?php

  $output='';
  $message='';
  $amount='';
  $total=0;

    if(isset($_POST['id'])&&isset($_POST['qty'])){
       
    $uid=$_POST['id'];
    $uqty=$_POST['qty'];

    $con=mysqli_connect('34.93.221.231','root','root123','srikaappi');
    if(!$con){
        die("Connection error ".mysqli_connect_error());
    }

       $sql="select * from sri_beverages WHERE id=$uid";
        $res=$con->query($sql);
        while($row=$res->fetch_assoc()){
             $amount=$row["amount"];
        }
    $calAmount=($amount/$uqty);
    $uqty++;
    $calAmount=$calAmount*$uqty;
    $sql ="UPDATE sri_beverages SET quantity='$uqty',amount='$calAmount' WHERE id=$uid";
    $result=mysqli_query($con,$sql);

    if($result){
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

    } else {
        
    }
    mysqli_close($con);
    
    } else{
        $output="fasil";
    }
$data["output"]=$output;
    $data["total"]=$total;

  echo json_encode($data);    
  ?>