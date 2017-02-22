<?php 
  $output = NULL;

  if(isset($_POST['submit'])){
    $mysqli = mysqli_connect("localhost","root","","a_store") or die('Unable to Connect');
    $search = $mysqli->real_escape_string($_POST['search']);

    // $resultSet = $mysqli->query("SELECT * FROM `product_code` WHRER `Product_code` = `%".$search."%`");


$sql = "SELECT * FROM product_code WHERE Product_code LIKE '%".$search."%' ";
$resultSet = mysqli_query($mysqli,$sql);


    if($resultSet->num_rows > 0){
      while($rows = $resultSet->fetch_assoc())
      {
        
        $Product_number = $rows['Product_number'];
        $Product_price = $rows['Product_price'];
        $Product_status = $rows['Product_status'];

        $output .= "คำสั่งซื้อที่ $Product_number <br/>";
        $output .= "ราคาสินค้า $Product_price<br/>";
        $output .= "สถานะ $Product_status<br/>";


      }
    }else{
      $output = "No Result";
    }
  }
 ?>


<html>
<head>
  <title></title>

  <link rel="stylesheet" type="text/css" href="css/style.css">
  <script src="//code.jquery.com/jquery-2.1.4.min.js"></script> 

<link rel="stylesheet" href="css/index.css" />
    
    <link rel="stylesheet" href="css/sidebar.css" />
    <link rel="stylesheet" href="css/lib/fontello.css" />
    <link rel="stylesheet" href="css/lib/normalize.css" />

<link rel="stylesheet" type="text/css" href="boxstyle.css"/>
<script src="js/incrementing.js"></script>


</head>
<body>


<div class='wrapper'>
  <div class='sidebar'>
    <div class='title'>
      A STORE
    </div>
    <ul class='nav'>
     
     <li>
        <a href="index.php">หน้าแรก</a>
      </li>
      <li>
        <a>รถเข็นของฉัน</a>
      </li>
      <li>
        <a href="check_status.php">ตรวจสอบสถานะ</a>
      </li>
      <li>
        <a>ประวัติการสั่งซื้อ</a>
      </li>
      <li>
        <a>ออกจากระบบ</a>
      </li>
    </ul>
  </div>


  <div class='content isOpen'>
    <a class='button' style="color: #d49f31;"></a>

<ul >
  <li>ขนม</li>
  <li>อาหารแห้ง</li>
  <li>เครื่องอุปโภค</li>
  <li class="slider"></li>
</ul>

<div class="bg_index">
  <div class="bg_index2"></div>

  <div class="list_product2">
    <div class="pr_img"><img src="../file/img/01.png" style="width:70px; height:80px; margin-left:13px; margin-top:10px;"></div>
    <div class="text5">เลย์ (ใหญ่) รสมันฝรั่งแท้<br>(20 บาท/ชิ้น)</div>  <br/>
     
        <form method="post" action="" class="select_value" style="margin-top: 50px;">
          <input type="text" name="partridge" id="partridge" value="1">
        </form> 



        <!-- <div class="dec button2" style="color: white; margin-top:-27px;margin-left: 140px;">-</div> -->
     <div class="inc button2" style="color: white; margin-top:-27px; margin-left: 263px;">+</div>
     <div class="inc button2" style="color: white; margin-top:-27px; margin-left: 140px;">-</div>
  </div>

  <div class="list_product">
    <div class="pr_img"><img src="../file/img/03.png" style="width:70px; height:80px; margin-left:13px; margin-top:10px;"></div>
    <div class="text5">เลย์ (ใหญ่) รสเอ็กซ์ตราบาร์บีคิว<br>(20 บาท/ชิ้น)</div>  <br>
     
        <form method="post" action="" class="select_value" style="margin-top: 50px;">
          <input type="text" name="partridge" id="partridge" value="1">
        </form> 
       <div class="inc button2" style="color: white; margin-top:-27px; margin-left: 263px;">+</div>
     <div class="inc button2" style="color: white; margin-top:-27px; margin-left: 140px;">-</div>
  </div>

  <div class="list_product">
    <div class="pr_img"><img src="../file/img/02.jpg" style="width:70px; height:80px; margin-left:13px; margin-top:10px;"></div>
    <div class="text5">ปาร์ตี้ (เล็ก) <br>(5 บาท/ชิ้น)</div>  <br>
     
        <form method="post" action="" class="select_value" style="margin-top: 50px;">
          <input type="text" name="partridge" id="partridge" value="1">
        </form> 
        <div class="inc button2" style="color: white; margin-top:-27px; margin-left: 263px;">+</div>
     <div class="inc button2" style="color: white; margin-top:-27px; margin-left: 140px;">-</div>
  </div>
</div>
<div class="bg_index3"></div>
  </div>

  



</div>

<script type="text/javascript">
$(".button2").on("click", function() {

  var $button = $(this);
  var oldValue = $button.parent().find("input").val();

  if ($button.text() == "+") {
    var newVal = parseFloat(oldValue) + 1;
  } else {
   // Don't allow decrementing below zero
    if (oldValue > 0) {
      var newVal = parseFloat(oldValue) - 1;
    } else {
      newVal = 0;
    }
  }

  $button.parent().find("input").val(newVal);

});
</script>




<script src="js/classie.js"></script>
    <script src="js/uisearch.js"></script>
    <script>
      new UISearch( document.getElementById( 'sb-search' ) );
    </script>

<script type="text/javascript">
$(document).ready(function() {
  $('.button').on('click', function() {
    $('.content').toggleClass('isOpen');
  });
});
</script>

<script type="text/javascript">
  $("ul li").click(function(e) {

  if ($(this).hasClass('slider')) {
    return;
  }



  var whatTab = $(this).index();

  var howFar = 117 * whatTab;

  $(".slider").css({
    left: howFar + "px"
  });

  $(".ripple").remove();

  var posX = $(this).offset().left,
      posY = $(this).offset().top,
      buttonWidth = $(this).width(),
      buttonHeight = $(this).height();

  $(this).prepend("<span class='ripple'></span>");

  if (buttonWidth >= buttonHeight) {
    buttonHeight = buttonWidth;
  } else {
    buttonWidth = buttonHeight;
  }

  var x = e.pageX - posX - buttonWidth / 2;
  var y = e.pageY - posY - buttonHeight / 2;

  $(".ripple").css({
    width: buttonWidth,
    height: buttonHeight,
    top: y + 'px',
    left: x + 'px'
  }).addClass("rippleEffect");
  
});

  </script>
 


  
</body>
</html>

