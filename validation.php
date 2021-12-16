<?php

    $uname=$_POST['username'];
    $pwd=$_POST['password'];
     
    
    session_start();

    if(isset($_SESSION['uname'])){
        echo "<script>location.href='home.php'</script>";
    }else{
        $count=0;
        $con=mysqli_connect('localhost','root','','sricoffee');
        if(!$con){
                die("Connection error ".mysqli_connect_error());
            }
            $sql="select * from sri_login";
            $res=$con->query($sql);

            while($row=$res->fetch_assoc()){
            if($row["username"]==$uname && $row["password"]==$pwd){
                $count=1;
            }
        }
        if($count==1){
            $_SESSION['uname']=$uname;
            echo "<script>location.href='home.php'</script>";
        }else{
            echo "<script>location.href='login.php'</script>";
        }
    }


?>