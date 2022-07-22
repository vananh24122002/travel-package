<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="CSS/dmtour.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@100&family=Roboto+Mono:wght@100&family=Zen+Kaku+Gothic+Antique:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200&display=swap" rel="stylesheet">
</head>
<body>
<div class="header-dmtour">
<?php  $load_dmbooktrip = load_dmbooktrip(); ?>
<img id="banner-dmtour" src="upload/<?=$load_dmbooktrip['banner2']?>">
<div class="inset">
    <?php include("User/header.php"); 
    ?>
    <h1>TRAVEL PACKAGE<h1>
    <h2>GO</h2>
    <h3>Đăng kí ngay hôm nay để nhận ưu đãi của chúng tôi!!</h3>
</div>
</div>
<!-- content-giữa -->
<div class="content-mid">
Travel Package GO giúp mang lại cảm hứng cho cuộc sống của bạn với quyền truy cập vào tất cả các nhu cầu du lịch của bạn: khách sạn, chuyến bay, cho thuê xe hơi, hoạt động và hơn thế nữa. Đây là nơi tốt nhất của cuộc sống du lịch - vì vậy phi thường có thể bắt đầu.
</div>
<div class="content-dmtour">
<div class="content-right">
    <h1><a href="index.php?view=danhmuctour">Tất cả Tour</a></h1>
    <h3><?=count($loadbooktour);?> Tour</h3>
    <ul>
        <li id="big">
            <a href="#" class="big">HÀNH TRÌNH
            <span class="first"><i class="fa fa-angle-down" aria-hidden="true"></i></span></a>
            <div class="content-menu">
            <ul class="small">
                <?php foreach ($tourdm as $dm) {
                    extract($dm);
                    $linkhanhtrinh = "index.php?view=danhmuctour&id_DMTour=".$id_DMTour;
                ?>
                    <li><a href="<?=$linkhanhtrinh?>"class="sm"><?=$nameDMTour?></a></li>
                <?php } ?>
            </ul>
            </div>
        </li>
        <li id="big">
            <a href="#" class="big1">MỨC ĐỘ HOẠT ĐỘNG
            <span class="first1"><i class="fa fa-angle-down" aria-hidden="true"></i></span></a>
            <div class="content-menu">
            <ul class="small1">
                <?php foreach ($tourdmhd as $dmhd) {
                    extract($dmhd);
                    $linkmucdo = "index.php?view=danhmuctour&id_mucdo=".$id_mucdo;
                ?>
                    <li><a href="<?=$linkmucdo?>" class="sm"><?=$namemucdo?></a></li>
                <?php } ?>
            </ul>
            </div>
        </li>
        <li id="big">
            <a href="#" class="big2">CHUYẾN ĐI
            <span class="first2"><i class="fa fa-angle-down" aria-hidden="true"></i></span></a>
            <div class="content-menu">
            <ul class="small2">
                <?php foreach ($tourdmcd as $dmcd) {
                    extract($dmcd);
                    $linkchuyendi = "index.php?view=danhmuctour&id_chuyendi=".$id_chuyendi;
                ?>
                    <li><a href="<?=$linkchuyendi?>" class="sm"><?=$namechuyendi?></a></li>
                <?php } ?>
            </ul>
            </div>
        </li>
        <li id="big">
            <a href="#" class="big3">CHIỀU DÀI CHUYẾN ĐI
            <span class="first3"><i class="fa fa-angle-down" aria-hidden="true"></i></span></a>
            <div class="content-menu">
            <ul class="small3">
                <?php foreach ($tourdmcdcd as $dmcdcd) {
                    extract($dmcdcd);
                    $linkchieudai = "index.php?view=danhmuctour&id_chieudai=".$id_chieudai;
                ?>
                    <li><a href="<?=$linkchieudai?>" class="sm"><?=$namechieudai?></a></li>
                <?php } ?>   
            </ul>
            </div>
        </li>
        <li id="big">
            <a href="#" class="big4">GIÁ
            <span class="first4"><i class="fa fa-angle-down" aria-hidden="true"></i></span></a>
            <div class="content-menu">
            <ul class="small4">
                 <?php foreach ($tourdmg as $dmg) {
                    extract($dmg);
                    $linkgia = "index.php?view=danhmuctour&id_gia=".$id_gia;
                ?>
                    <li><a href="<?=$linkgia?>" class="sm"><?=$namegia?></a></li>
                <?php } ?>
            </ul>
            </div>
        </li>
    </ul>
</div>
<div class="content-left">
<!-- <p id="demo"></p> -->
<div class="content-left-tour">
     <?php foreach ($loadbooktour as $booktour) {
        extract($booktour);
        $linktour = "index.php?view=booktour&id_Tour=".$id_Tour;
    ?> 
<div class="content-tour">
    <a href="<?=$linktour?>"><img src="upload/<?=$banner?>"></a>
    <div class="content-titletour">
        <h4><?=$days?> ngày với giá $<?php echo number_format("$donGia")."<br>";?></a>
        <h3><a href="<?=$linktour?>"><?=$nameTour?></a><h3>
        <?php $Query_chuyendi = Query_chuyendi($id_chuyendi); ?>
        <h5><a href="index.php?view=danhmuctour&id_chuyendi=<?=$id_chuyendi?>">Loại chuyến đi :<span id="padding"><?=$Query_chuyendi['namechuyendi']?></span></h5>
        <!-- phân loại img chuyến đi -->
            <?php if($id_chuyendi == 1){ ?>
            <img src="img/3m.svg">
            <?php } else if($id_chuyendi == 2){?>
            <img src="img/1m.svg">
            <?php }else { ?>
            <img src="img/2m.svg"> 
            <?php } ?>
        <!--  -->
        <?php $Query_mucdo = Query_mucdo($id_mucdo); ?>
        <h5><a href="index.php?view=danhmuctour&id_mucdo=<?=$id_mucdo?>">Mức độ hoạt động : <span><?=$Query_mucdo['namemucdo']?></span></a></h5>
        <h5><a href="<?=$linktour?>">Ngày xuất phát: <span><?=$time?></span></a></h5> 
        <h5>Lượt đặt: <span><?=$soLuotDat?></span></h5>         
    </div>
</div>
     <?php } ?> 

</div>
</div>
</div>

<script>
      $('.big').click(function(){
          $('ul .small').toggleClass("show");
          $('ul .first').toggleClass("rotate");
      });
      $('.big1').click(function(){
          $('ul .small1').toggleClass("show1");
          $('ul .first1').toggleClass("rotate");
      });
      $('.big2').click(function(){
          $('ul .small2').toggleClass("show2");
          $('ul .first2').toggleClass("rotate");
      });
      $('.big3').click(function(){
          $('ul .small3').toggleClass("show3");
          $('ul .first3').toggleClass("rotate");
      });
      $('.big4').click(function(){
          $('ul .small4').toggleClass("show4");
          $('ul .first4').toggleClass("rotate");
      });
      $('ul li').click(function(){
          $(this).addClass("active").siblings().removeClass("active");
      });
      $('a.big').click(function(e)
    {
    e.preventDefault();
    });
    $('a.big1').click(function(e)
    {
    e.preventDefault();
    });
    $('a.big2').click(function(e)
    {
    e.preventDefault();
    });
    $('a.big3').click(function(e)
    {
    e.preventDefault();
    });
    $('a.big4').click(function(e)
    {
    e.preventDefault();
    });
    
</script>
<script>
// Set the date we're counting down to
var countDownDate = new Date("Jan 5, 2023 15:37:25").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();
    
  // Find the distance between now and the count down date
  var distance = countDownDate - now;
    
  // Time calculations for days, hours, minutes and seconds
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
  // Output the result in an element with id="demo"
  document.getElementById("demo").innerHTML =  hours + " : "
  + minutes + " : " + seconds + "  ";
    
  // If the count down is over, write some text 
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("demo").innerHTML = "EXPIRED";
  }
}, 1000);
</script>
</body>
</html>