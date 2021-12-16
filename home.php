<?php
    session_start();
    $con=mysqli_connect('34.93.221.231','root','root123','srikaappi');
    if(!$con){
        die("Connection error ".mysqli_connect_error()); 
    }
    $sql = "TRUNCATE TABLE sri_beverages";
    $result=mysqli_query($con,$sql);
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
    <section class="main-container">
            <!-- Navigation Bar -->
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
                <button class="dropdown-item" type="button" onclick="window.location.href='receiptreport.php'">Receipt History</button>
                <button class="dropdown-item" type="button" onclick="window.location.href='logout.php'">Log Out</button>
            </div>
            </div>
               
            </div>
        </nav>
        
        <!-- Bootstrap Container 
        <div class='item-types '>
             <a id='beverages' class="types-btn side-button-active"><img src='photos/herbal-tea.png' width="40" /><p>Milk</p></a>
            <a id='beverages-without' class="types-btn"><img src='photos/green-tea.png' width="40" /><p>Non-milk</p></a>
            <a id='bites' class="types-btn"><img src='photos/donut.png' width="40" /><p>Bites</p></a>
            <a id='juices' class="types-btn"><img src='photos/orange-juice.png' width="40" /><p>Juices</p></a>
            <a id='parcel' class="types-btn"><img src='photos/coffee.png' width="40" /><p>Parcel</p></a>
        </div> -->

        <section class="container-fluid container-fixed">
            <div class="row">
            
            <div class="col-md-1 col-lg-1 side-bar">
                <div class='sidebar-buttons'>
                <a id='beverages' class="side-btn side-button-active"><img id='side-img' src='photos/herbal-tea.png' width="40" /><p class="side-name">Beverages</p></a>
                <a id='beverages-without' class="side-btn"><img id='side-img' src='photos/green-tea.png' width="40" /><p class="side-name">Non-milk</p></a>
                <a id='bites' class="side-btn"><img id='side-img' src='photos/donut.png' width="40" /><p class="side-name">Bites</p></a>
                <a id='juices' class="side-btn"><img id='side-img' src='photos/orange-juice.png' width="40" /><p class="side-name">Juices</p></a>
                <a id='parcel' class="side-btn"><img id='side-img' src='photos/coffee.png' width="40" /><p class="side-name">Parcel</p></a>
        
                </div>
            </div>
                <div class="col-md-6 col-lg-7 center-content">
                   
                 <!-- Beverages -->
                 
                <div class="card-container " id='container-control1'>
                    
                    <?php
                            $beveragesName=array('Filter Coffee','Tea','Ginger Tea','Sukku Coffee','Sukku Tea','Boost','Horlicks','Milk','Honey Milk','Ginger Milk','Sukku Milk','Gulkand Milk','Kova Milk','Palm candy Milk');
                            $tamilName=array('ஃபில்டர் காபி','டீ','இஞ்சி டீ','சுக்கு காபி','சுக்கு டீ','பூஸ்ட்','ஹார்லிக்ஸ்','பால்','தேன் பால்','இஞ்சிப் பால்','சுக்குப் பால்','குல்கந்துப் பால்','பால்கோவா பால்','பனங்கற்கண்டுப்
                            பால்');
                            $beveragesAmount=array(20,10,15,25,20,20,20,15,20,20,20,25,30,30);
                            $img=1;
                            $index=1;
                            for($c = 0; $c < count($beveragesName); $c++)
	                        {
                                echo "<div class='card card-custom shadow rounded'>
                                <div class=''>
                                <a type='button' class='pic-btn card_image' id='card-pic'><img src='items/beverage/".$index.".jpg' class='card-img-top'></a>
                                 <div>
                                     <input type='hidden' id='beverageAmount' value='".$beveragesAmount[$c]."' />
                                     <input type='hidden' id='beveragesName' value='".$beveragesName[$c]."' />
                                     <input type='hidden' id='tamilName' value='".$tamilName[$c]."' />
                                     <h5 class='card-title'>".$beveragesName[$c]."<br/><small>(".$tamilName[$c].")</small></h5>
                                 </div>
                                </div>
                                 
                             </div>";
                             $index++;
                            $img++;
                            }
                        ?>
                </div>
                   
                    <!--Beverages without milk-->

                <div class="view-content without-beverage" id='container-control2'>
                    
                    <?php
                            $beveragesName=array('Filter Coffee','Tea','Ginger Tea','Sukku Coffee','Sukku Tea','Honey Lemon Tea','Ginger Lemon Tea','Green Tea');
                            $beveragesAmount=array(15,10,15,25,20,20,20,20);
                            $tamilName=array('ஃபில்டர் காபி','டீ','இஞ்சி டீ','சுக்கு காபி','சுக்கு டீ','ஹனி லெமன் டீ','இஞ்சி லெமன் டீ','கிரீன் டீ');
                            $img=1;
                            $index=1;
                            for($c = 0; $c < count($beveragesName); $c++)
	                        {
                                echo "<div class='card card-custom shadow rounded'>
                                <div class='card_image'>
                                <a type='button' class='pic-btn' id='card-pic'><img src='items/withoutmilk/".$index.".jpg' class='card-img-top'></a>
                                 <div>
                                 <input type='hidden' id='beverageAmount' value='".$beveragesAmount[$c]."' />
                                 <input type='hidden' id='beveragesName' value='".$beveragesName[$c]."' />
                                 <input type='hidden' id='tamilName' value='".$tamilName[$c]."' />
                                     <h5 class='card-title'>".$beveragesName[$c]."<br/><small>(".$tamilName[$c].")</small></h5>
                                 </div>
                                </div>
                                 
                             </div>";
                             $index++;
                            $img++;
                            }
                        ?>
                </div>

                    <!-- Bites -->

                <div class="view-content bites" id='container-control3'>
                    
                    <?php
                            $beveragesName=array('Butter Cookies','Onion Samosa','Methu Vadai','Paruppu Vadai','Masala Bonda','Bajji','Spinach Vadai','Vazhaipoo Vadai','Pazham Pori','Suyyam','Coconut Ball','Kara Kozhukattai','Thattu Vadai','Kappa Bonda','Pakkoda','Kappa Fry','Finger Millet Sprouted','Bajra Sprouted','Peanut','Channa','Channa Sprouted','Green Gram Sprouted','Navadhaniya Sundal','Maothagam','Banana Leaf Adai','Paal Kozhukattai','Milk Kova','Sambar Vadai','Curd Vadai','Rasa Vadai','Kara Paniyaram','Sweet Paniyaram','Fore Milk');
                            $beveragesAmount=array(5,10,8,8,8,8,10,10,10,10,12,12,10,10,15,15,15,15,15,15,20,20,20,15,20,20,20,20,20,20,25,30,30);
                            $tamilName=array('பிஸ்கட்','ஆனியன் சமோசா','உளுந்து வடை','பருப்பு வடை','உருளைக்கிழங்கு போண்டா','பஜ்ஜி','கீரை வடை','வாழைப்பூ வடை','பழம் பொரி','சுய்யம்','தேங்காய் உருண்டை','காரக் கொழுக்கட்டை','தட்டு வடை','கப்ப போண்டா','பக்கோடா','கப்பக்கிழங்கு ஃப்ரை','முளைக்கட்டிய ராகி','முளைக்கட்டிய கம்பு','நிலக்கடலை','சுண்டல்','முளைகட்டிய சுண்டல்','முளைகட்டிய பச்சை   பயறு','இனிப்பு கொழுக்கட்டை','இலை அடை','பால் கொழுக்கட்டை','பால் கோவா','சாம்பார் வடை','சாம்பார் வடை','தயிர் வடை','ரசவடை','காரப்பணியாரம்','இனிப்புப் பணியாரம்','சீம்பால்');
                            $img=1;
                            $index=1;
                            for($c = 0; $c < count($beveragesName); $c++)
	                        {
                                echo "<div class='card card-custom shadow rounded'>
                                <div class='card_image'>
                                <a type='button' class='pic-btn shadow' id='card-pic'><img src='items/bites/".$index.".jpg' class='card-img-top'></a>
                                 <div>
                                 <input type='hidden' id='beverageAmount' value='".$beveragesAmount[$c]."' />
                                 <input type='hidden' id='beveragesName' value='".$beveragesName[$c]."' />
                                 <input type='hidden' id='tamilName' value='".$tamilName[$c]."' />
                                 <h5 class='card-title'>".$beveragesName[$c]."<br/><small>(".$tamilName[$c].")</small></h5>
                                 </div>
                                </div>
                                 
                             </div>";
                            $img++;
                            $index++;
                            }
                        ?>
                </div>

                <!-- Juice -->

                <div class="view-content juice" id='container-control4'>
                    
                    <?php
                            $beveragesName=array('Ice Apple Milk','Avil Milk','Red Guava','Italian Grape','ABC Juice','Dates Milk','Rose Milk','Lassi');
                            $beveragesAmount=array(40,40,40,40,40,40,35,30);
                            $img=1;
                            $tamilName=array('நுங்குப் பால்','அவுல் பால்','சிவப்பு கொய்யா','இத்தாலிய திராட்சை','Abc ஜூஸ்','பேரீச்சைப் பால்','ரோஸ் மில்க்','லெஸி');
                            $index=1;
                            for($c = 0; $c < count($beveragesName); $c++)
	                        {
                                echo "<div class='card card-custom shadow rounded'>
                                <div class='card_image'>
                                <a type='button' class='pic-btn' id='card-pic'><img src='items/juices/".$index.".jpg' class='card-img-top'></a>
                                 <div>
                                 <input type='hidden' id='beverageAmount' value='".$beveragesAmount[$c]."' />
                                 <input type='hidden' id='beveragesName' value='".$beveragesName[$c]."' />
                                 <input type='hidden' id='tamilName' value='".$tamilName[$c]."' />
                                 <h5 class='card-title'>".$beveragesName[$c]."<br/><small>(".$tamilName[$c].")</small></h5>
                                 </div>
                                </div>
                                 
                             </div>"; 
                            $img++;
                            $index++;
                            }
                        ?>
                </div>
                
                 <!-- Parcel -->

                <div class="view-content parcel" id='container-control5'>
                    
                    <?php
                            $beveragesName=array('Filter Coffee','Tea','Ginger Tea','Sukku Coffee','Sukku Tea','Milk','Honey Milk','Ginger Milk','Sukku Milk','Gulkand Milk','Kova Milk','Palam Candy Milk','Honey Lemon Tea','Ginger Lemon Tea','Green Tea','Kappa Fry','Green Gram Sprouted','Channa Sprouted','Peanet','Channa','Finger Millet Sprouted','Bajra Sprouted','Navadhaniya Sundal','Sambar Vadai','Curd Vadi','Rasa Vadi','Coconut Sprouted','Kara Paniyaram','Sweet Paniyaram','Fore Milk');
                            $beveragesAmount=array(25,15,20,30,25,15,25,25,25,30,35,35,25,25,20,20,25,25,20,20,20,20,25,25,25,25,50,30,35,35);
                            $img=1;
                            $tamilName=array('ஃபில்டர் காபி','டீ','இஞ்சி டீ','சுக்கு காபி','சுக்கு டீ','பால்','தேன் பால்','இஞ்சிப் பால்','சுக்குப் பால்','குல்கந்துப் பால்','பால்கோவா பால்','பனங்கற்கண்டுப் பால்','ஹனி லெமன் டீ','இஞ்சி லெமன் டீ','கிரீன் டீ','கப்ப ஃப்ரை','முளைக்கட்டிய பச்சை பயறு','முளைகட்டிய சுண்டல்','நிலக்கடலை','சுண்டல்','முளைக்கட்டிய ராகி','முளைக்கட்டிய கம்பு','நவதானிய சுண்டல்','சாம்பார் வடை','தயிர் வடை','ரச வடை','தேங்காய் சீம்பு','காரப்பணியாரம்','இனிப்புப் பணியாரம்','சீம்பால்');
                            $index=1;
                            for($c = 0; $c < count($beveragesName); $c++)
	                        {
                                echo "<div class='card card-custom shadow rounded'>
                                <div class='card_image'>
                                <a type='button' class='pic-btn' id='card-pic'><img src='items/parcel/".$index.".jpg' class='card-img-top'></a>
                                 <div>
                                 <input type='hidden' id='beverageAmount' value='".$beveragesAmount[$c]."' />
                                 <input type='hidden' id='beveragesName' value='".$beveragesName[$c]."(p)' />
                                 <input type='hidden' id='tamilName' value='".$tamilName[$c]."' />
                                 <h5 class='card-title'>".$beveragesName[$c]."(p)<br/><small>(".$tamilName[$c].")</small></h5>
                                 </div>
                                </div>
                                 
                             </div>";
                             $index++;
                            $img++;
                            }
                        ?>
                </div>

                </div>
                
   
                <!--Bill bar-->
                <div class="col-md-5 col-lg-4 bill-bar-main">
                        
                        <div class="bill-container">
                             <div class="bill-bar table-responsive table-sm">
                                 <table class="table">
                                <thead>
                                    <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col" class="items-table">Items</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Amount</th>
                                    </tr>
                                </thead>
                                <tbody id="display">
                                </tbody>
                                </table>
                             </div>
                             <hr class="hr-bill"/>
                             <div class="total-amount">
                                <div class='t1'>
                                    <button type="button" id='print_bill' class="btn">Print</button>
                                </div>
                                <div class='t2'>
                                    <button type="button" class="btn" id='new_bill'>New</button>
                                </div>
                                <div class="t3">
                                <p id='amount1'>Total-<p id='amount'>0</p>
                                </div>   
                                </div>
                        </div>

                          
                        <!--<div class="bill-bar">
                            <div>
                            <div class="table-responsive table-sm">
                            <table class="table">
                            <caption>List of users</caption>
                                <thead>
                                    <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">Items</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Amount</th>
                                    </tr>
                                </thead>
                                <tbody id="display">
                                </tbody>
                            </table>
                            </div>
                            <table class="table table-striped bill-table table-sm">
                                
                                <thead>
                                    <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">Items</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Amount</th>
                                    </tr>
                                </thead>
                                <tbody id="display">
                                </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="total-amount">
                                      
                        </div>-->
                        
                </div> 

            <!-- Modal -->
            <!-- <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog" #modal-custom>
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">No any item selected</h5>
                </div>
                </div>
            </div>
            </div> -->
                
        </section>
        
    </section>
</body>

</html>