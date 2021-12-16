
    $(document).ready(function(){
       
      

         //// Pic Calculation //////

      $("body").on("click",".card_image",function(event){
        
        var name=$(this).closest("div").find("input[id='beveragesName']").val();
        var amt=$(this).closest("div").find("input[id='beverageAmount']").val();
        // var tamilName=$(this).closest("div").find("input[id='tamilName']").val();
        var qty=1;
        // console.log(name,amt,tamilName);
        $.ajax({
          url:"ajax_content.php",
          type:"post",
          data:{
            name:name,
            amt:amt,
            qty:qty
          },
          dataType:"JSON",
          success:function(res){
            if(res){
              $("#display").html(res.output);
              $("#amount").html(res.total);
            }else{
              alert("Failed Try Again");
            }
          }
        });
      });

      //// Plus icon Calculation //////
         
      $("body").on("click",".plus_qty",function(event){

        var id=$(this).closest("div").find("input:eq(0)").val();
        var qty=$(this).closest("div").find("input:eq(1)").val();
        
        $.ajax({
          url:"ajax_plusicon.php",
          type:"post",
          data:{
            id:id,
            qty:qty
          },
          dataType:"JSON",
          success:function(res){
            if(res){
              $("#display").html(res.output);
              $("#amount").html(res.total);
            }else{
              alert("Failed Try Again "+res);
            }
          }
        });
      });

       //// Sub icon Calculation //////
         
       $("body").on("click",".sub_qty",function(event){

        var id=$(this).closest("div").find("input:eq(0)").val();
        var qty=$(this).closest("div").find("input:eq(1)").val();
        
        $.ajax({
          url:"ajax_subicon.php",
          type:"post",
          data:{
            id:id,
            qty:qty
          },
          dataType:"JSON",
          success:function(res){
            if(res){
              $("#display").html(res.output);
              $("#amount").html(res.total);
            }else{
              alert("Failed Try Again "+res);
            }
          }
        });
      });
        
      //// recepit bill //////

      $("#print_bill").click(function(){

        $.ajax({
          url:"ajax_recepit.php",
          type:"post",
          success:function(res){
            if(res){
              $("#cur_bill").html(res);
              // window.location.href='recepit.php';
              window.location.href='billpdf.php';
            }else{
              // $("#print_bill").click(function(){
              //   $("#staticBackdrop").modal();
              // });
            }
          }
        });

     });

         //// new-bill //////

      $("#new_bill").click(function(){

          $.ajax({
            url:"ajax_newbill.php",
            type:"post",
            dataType:"JSON",
            success:function(res){
              if(res){
                $("#display").html(res.output);
              $("#amount").html(res.total);
              }else{
                $("#display").html(res.output);
              $("#amount").html(res.total);
              }
            }
          });

       });


       ///Total Amount Calculation////

      //  $("body").on("click","#card-pic",function(event){
        
      //   $.ajax({
      //     url:"ajax_totalAmount.php",
      //     type:"post",
      //     success:function(res){
      //       if(res){
             
      //       }else{
      //         alert("Failed Try Again");
      //       }
      //     }
      //   });
      // });


         //// beverages //////
         
      $("#beverages").click(function(){

        $('#container-control1').addClass('card-container');

        $('#container-control2').removeClass('card-container');
        $('#container-control3').removeClass('card-container');
        $('#container-control4').removeClass('card-container');
        $('#container-control5').removeClass('card-container');
        
        $('#container-control2').addClass('view-content');
        $('#container-control3').addClass('view-content');
        $('#container-control4').addClass('view-content');
        $('#container-control5').addClass('view-content');

       });

         //// beverages-without //////
         
      $("#beverages-without").click(function(){

        $('#container-control2').addClass('card-container');

        $('#container-control1').removeClass('card-container');
        $('#container-control3').removeClass('card-container');
        $('#container-control4').removeClass('card-container');
        $('#container-control5').removeClass('card-container');
        
        $('#container-control1').addClass('view-content');
        $('#container-control3').addClass('view-content');
        $('#container-control4').addClass('view-content');
        $('#container-control5').addClass('view-content');
       });

         //// bites //////
         
       $("#bites").click(function(){

        $('#container-control3').addClass('card-container');

        $('#container-control1').removeClass('card-container');
        $('#container-control2').removeClass('card-container');
        $('#container-control4').removeClass('card-container');
        $('#container-control5').removeClass('card-container');
        
        $('#container-control1').addClass('view-content');
        $('#container-control2').addClass('view-content');
        $('#container-control4').addClass('view-content');
        $('#container-control5').addClass('view-content');
       });

         //// juices //////

       $("#juices").click(function(){

        $('#container-control4').addClass('card-container');

        $('#container-control1').removeClass('card-container');
        $('#container-control3').removeClass('card-container');
        $('#container-control2').removeClass('card-container');
        $('#container-control5').removeClass('card-container');
        
        $('#container-control1').addClass('view-content');
        $('#container-control3').addClass('view-content');
        $('#container-control2').addClass('view-content');
        $('#container-control5').addClass('view-content');
        
       });

       //// parcel //////

       $("#parcel").click(function(){

        $('#container-control5').addClass('card-container');

        $('#container-control1').removeClass('card-container');
        $('#container-control3').removeClass('card-container');
        $('#container-control2').removeClass('card-container');
        $('#container-control4').removeClass('card-container');
        
        $('#container-control1').addClass('view-content');
        $('#container-control3').addClass('view-content');
        $('#container-control2').addClass('view-content');
        $('#container-control4').addClass('view-content');
       });

     //// beverages button //////
         
     $("#beverages").click(function(){

      $('#beverages').addClass('side-button-active');
      $('#beverages').removeClass('b1');
      $('#beverages-without').removeClass('side-button-active');
      $('#bites').removeClass('side-button-active');
      $('#juices').removeClass('side-button-active');
      $('#parcel').removeClass('side-button-active');

     });
     
     //// beverages - without  button //////

     $("#beverages-without").click(function(){

      $('#beverages-without').addClass('side-button-active');
      $('#beverages').removeClass('b1');
      $('#beverages').removeClass('side-button-active');
      $('#bites').removeClass('side-button-active');
      $('#juices').removeClass('side-button-active');
      $('#parcel').removeClass('side-button-active');

     });
     
     //// bites button //////

     $("#bites").click(function(){

      $('#bites').addClass('side-button-active');
      $('#beverages').removeClass('b1');
      $('#beverages').removeClass('side-button-active');
      $('#beverages-without').removeClass('side-button-active');
      $('#juices').removeClass('side-button-active');
      $('#parcel').removeClass('side-button-active');

     });
     
     //// juices button //////

     $("#juices").click(function(){

      $('#juices').addClass('side-button-active');
      $('#beverages').removeClass('b1');
      $('#beverages').removeClass('side-button-active');
      $('#bites').removeClass('side-button-active');
      $('#beverages-without').removeClass('side-button-active');
      $('#parcel').removeClass('side-button-active');
     });

    //// parcel button //////

    $("#parcel").click(function(){

      $('#parcel').addClass('side-button-active');
      $('#beverages').removeClass('b1');
      $('#beverages').removeClass('side-button-active');
      $('#bites').removeClass('side-button-active');
      $('#beverages-without').removeClass('side-button-active');
      $('#juices').removeClass('side-button-active');
     });
    
    
  });
      