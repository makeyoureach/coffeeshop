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
    <link rel="icon" href="./photos/logopng.png" type="image/jpg">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Serif&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="content.css">
    <link rel="stylesheet" href="cache.css">
    <link rel="stylesheet" href="newstyle.css">
    <link rel="stylesheet" href="adding.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <script src='script.js'></script>   
    <script src='jquery.min.js'></script>   
<title>Sri Kaappi</title>

</head>
    <body>
        <section>
        <nav class="navbar navbar_custom shadow-lg">
            <a class="navbar-brand" href="#">
            <img src="./photos/logopng.png" width="40" class="d-inline-block align-top logo" alt="" />
            <h3>SRI KAAPPI</h3>
            </a>
            <div>
            <div class="btn-group dropleft">
            <button type="button" class="btn btn-secondary btn-sm dropdown-toggle more-btn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                More
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                <button class="dropdown-item" type="button" onclick="window.location.href='home.php'">Home</button>
                <button class="dropdown-item" type="button" onclick="window.location.href='logout.php'">Log Out</button>
            </div>
            </div>
               
            </div>
        </nav>
            <div class="container-fluid report-container">
                <div class="row">
                    <div class="col recepit-heading">
                        <div>

                            <form>
                                <div class="report_details">

                                </div>
                                <div class="form-row align-items-center">
                                <div class="col-auto">
                                    <label class="sr-only" for="inlineFormInput">Date From</label>
                                    <label>Date From</label>
                                    <input type="date" class="form-control mb-2" id="datefrom">
                                </div>
                                <div class="col-auto">
                                    <label class="sr-only" for="inlineFormInput">Date To</label>
                                    <label>Date To</label>
                                    <input type="date" class="form-control mb-2" id="dateto">
                                </div>
                                <div class="col-auto">
                                    <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" id="autoSizingCheck">
                                    <label class="form-check-label" for="autoSizingCheck">
                                    Descending based on bill number
                                    </label>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <button type="submit" class="btn btn-secondary mb-2" id="showreport">Filter</button>
                                </div>
                                <div class="col-auto">
                                    <button type="submit" class="btn btn-warning mb-2" onclick="reset()">Reset</button>
                                </div>
                                </div>
                            </form>
                            
                        </div>
                        <div id='emptydate'>
                            
                        </div>
                        <div class="table-responsive-md">
                    <table class="table recepit-table">
                        <thead class="receipt_thead1">
                            <tr>
                            <th scope="col">S.No</th>
                            <th scope="col">Bill number</th>
                            <th scope="col">Date</th>
                            <th scope="col">Time</th>
                            <th scope="col">Total Amount</th>
                            </tr>
                        </thead>
                        <tbody id='receipttable'>
                            <?php
                                $con=mysqli_connect('34.93.221.231','root','root123','srikaappi');
                                if(!$con){
                                    die("Connection error ".mysqli_connect_error());
                                }
                                $sql="select * from sri_recepit order by billnumber desc";
                                $res=$con->query($sql);
                                $count=1;
                                while($row=$res->fetch_assoc()){
                                    echo "<tr>
                                    <td>{$count}</td>
                                    <td>{$row["billnumber"]}</td>
                                    <td>{$row["date"]}</td>
                                    <td>{$row["time"]}</td>
                                    <td>{$row["totalamount"]}</td>
                                    </tr>";
                                    $count++;
                                }
                            ?>
                            </tr>
                        </tbody>
                        <thead class="">
                            <tr>
                            <th scope="col"></th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                            <th scope="col" >Total:</th>
                            <?php
                                $con=mysqli_connect('34.93.221.231','root','root123','srikaappi');
                                if(!$con){
                                    die("Connection error ".mysqli_connect_error());
                                }
                                $sql="select * from sri_recepit order by billnumber desc";
                                $res=$con->query($sql);
                                $total=0;
                                while($row=$res->fetch_assoc()){
                                    $total=$total+$row["totalamount"];
                                }
                                echo "<th scope='col' id='receipttabletotal'>$total</th>";
                            ?>
                            
                            </tr>
                        </thead>
                        </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </body>
    <script>
        function reset(event){
               event.preventDefault();
               window.location.href='receiptreport.php';
        }
         $("#showreport").click(function(event){
             event.preventDefault();
        var datefrom=$('#datefrom').val();
        var dateto=$('#dateto').val();
        var check='asc';
        if($('#autoSizingCheck').prop("checked")==true){
              check='desc'
        }
        console.log(check);
        if(datefrom && dateto){
            $("#emptydate").html("");
            $.ajax({
            url:"ajax_filterreport.php",
            type:"post",
            data:{
              datefrom:datefrom,
              dateto:dateto,
              check:check
            },
            dataType:"JSON",
            success:function(res){
              if(res){
                  $("#receipttable").html(res.output);
                  $("#receipttabletotal").html(res.total);
              }else{

              }
            }
          });

        }else{
            $("#emptydate").html("Please select the from and to date");
        }
      });
    </script>
</html>