<?php

    $output="";
    $message='';
    $total=0.0;
    $con=mysqli_connect('34.93.221.231','root','root123','srikaappi');
    if(!$con){
        die("Connection error ".mysqli_connect_error()); 
    }
    $sql = "TRUNCATE TABLE sri_beverages";
    $message='success';
    $result=mysqli_query($con,$sql);
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
    }

    $data["output"]=$output;
    $data["total"]=$total;

  echo json_encode($data);

?>