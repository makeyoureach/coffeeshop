<?php
    session_start();

    if(isset($_SESSION['uname'])){
        // echo "<a"
    }else{
        echo "<script>location.href='login.php'</script>";
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head> 
<meta charset="UTF-8">
    <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="recepit.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <script src='script.js'></script>   
    <script src='jquery.min.js'></script>   
<title>Sri coffee</title>

</head>
    <body>
         <section class="recepit-container">
            <div class="recepit-bill-details">
                <div class="recepit-header">
                <p class="rh1">SRI KAAPPI</p>
                <p class="rh2">THE ROYAL TASTE OF KOVAI</p>
                <p class="rh3">JAI COMPLEX, 307-A, KAMARAJAR RD, PERIYAR NAGAR, LAKSHMI AMMAL Layout, LAKSHMIPURAM, COIMBATORE, TAMILNADU 641015</p>
                <p class="rh4">CASH BILL</p>
                </div>
                
                <hr class="line1"/>
                
                <div>
                <div class="recepit-address">
                    <div class="rd1">Bill No: <?php
                             $con=mysqli_connect('localhost','root','','sricoffee');
                             if(!$con){
                                 die("Connection error ".mysqli_connect_error());
                             }
                             $sql="select * from sri_recepit";
                             $res=$con->query($sql);
                             $bill= 0;
                             while($row=$res->fetch_assoc()){
                                $bill=$row["billnumber"];
                             }
                             echo $bill;
                        ?></div>
                    <div class='rd2'>
                        <div ><?php date_default_timezone_set('Asia/Kolkata');
                         echo 'Date: '.date("Y/m/d")?></div>
                        <div>Time: <?php echo date("h:i a")?></div>
                    </div>
                </div>

                <div>
                <table class="table recepit-table">
                    <thead>
                        <tr>
                        <th scope="col">Particulars</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                             $con=mysqli_connect('localhost','root','','sricoffee');
                             if(!$con){
                                 die("Connection error ".mysqli_connect_error());
                             }
                             $sql="select * from sri_beverages";
                             $res=$con->query($sql);

                             while($row=$res->fetch_assoc()){
                                echo "<tr>
                                <td>{$row["beverage"]}</td>
                                <td>{$row["quantity"]}</td>
                                <td>{$row["amount"]}</td>
                                </tr>";
                             }
                        ?>

                        <tr>
                        <?php
                             $con=mysqli_connect('localhost','root','','sricoffee');
                             if(!$con){
                                 die("Connection error ".mysqli_connect_error());
                             }
                             $sql="select * from sri_beverages";
                             $res=$con->query($sql);
                             $total=0;
                             $count=0;
                             while($row=$res->fetch_assoc()){
                                $total=$total+$row["amount"];
                                $count++;
                             }
                             echo "<th scope='row'>Total Items: ".$count."</th>
                             <td></td>
                             <th scope='row'>Tot Amt: ".$total."</th>";
                        ?>
                        
                        </tr>
                    </tbody>
                </table>
                <hr class="line1"/>
                <hr class="line1"/>
                </div>
                </div>
            </div>
         </section>
    </body>

    <script>
        myFunction();
        function myFunction(){
            window.print();
        }
        // window.onafterprint=function(e){
        //     closePrintView();
        // }
        // function closePrintView(){
        //     window.location.href='home.php';
        // }
    </script>
</html>