<?php

    $output='';
    $from=$_POST['datefrom'];
    $to=$_POST['dateto'];
    $check=$_POST['check'];
    $total=0;

    // if($from<$to){
        $output='Invalid Date';

        if(!empty($_POST['datefrom']) && !empty($_POST['dateto'])){

            if($from>$to){
                $from=$_POST['datefrom'];
                $to=$_POST['dateto'];
            }
            
            $con=mysqli_connect('34.93.221.231','root','root123','srikaappi');
            
            if(!$con){
                die("Connection error ".mysqli_connect_error());
            }
            $sql="select * from sri_recepit where date BETWEEN '$from' AND '$to'";
            if($check=='desc'){
                $sql="select * from sri_recepit where date BETWEEN '$from' AND '$to' order by billnumber desc";
            }
            $res=$con->query($sql);
            $count=1;
            $output='';
            if(mysqli_num_rows($res)>0){
                while($row=$res->fetch_assoc()){
                    $output.="<tr>
                    <td>{$count}</td>
                    <td>{$row["billnumber"]}</td>
                    <td>{$row["date"]}</td>
                    <td>{$row["time"]}</td>
                    <td>{$row["totalamount"]}</td>
                    </tr>";
                    $total=$total+$row["totalamount"];
                    $count++;
                }
            } else{
                $output='<tr class="report_details" ><td colspan="5">No any recepit found, kindly check the above dates</td></tr>';
            }
        }else{
            $output='<div class="report_details">Please select the from and to date</div>';
        }
    // }
    $data["output"]=$output;
    $data["total"]=$total;

  echo json_encode($data);
?>