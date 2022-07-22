<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="CSS/booktour1.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@300&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <form id="form-add">
    <div class="header-tour">
        <div class="title-header">
            <a href="index.php?view=danhmuctour">Travel Package Go</a><span id="icon-title"><i class="fa fa-angle-right" aria-hidden="true"></i></span>
            <a href="index.php?view=danhmuctour&id_chuyendi=<?=$id_chuyendi?>"><?=$namechuyendi?></a><span id="icon-title"><i class="fa fa-angle-right" aria-hidden="true"></i></span>
            <a href=""><?=$nameTour?></a>
        </div>
        <img id="bannertour" src="upload/<?=$banner?>" >
        <h1><?=$nameTour?></h1>
        <div class="nav-header">
            <ul>
               <li><h5 id="normal"><?=$days?> N G À Y</h5> G I Á T Ừ $ <?php echo number_format("$donGia")."<br>";?></li>
               <li>
                   <h5>Chuyến Đi </h5> 
                    <!-- phân loại chuyến đi -->
                         <?php if($id_chuyendi == 1){ ?>
                        <img id="icon-img" src="img/3m.svg">
                        <?php } else if($id_chuyendi == 2){?>
                            <img id="icon-img" src="img/1m.svg">
                        <?php }else { ?>
                            <img id="icon-img" src="img/2m.svg">
                        <?php } ?>
                    <!--  -->
                    <?=$namechuyendi?>
                   <a href="" class="text">
                       <span id="text"><i class="fa fa-question" aria-hidden="true"></i><span>
                    </a>
                   <div class="chuthich">
                        <ul class="ready">
                            <li>Travel Package Go là những hành trình được chế tác đặc biệt được thiết kế cho khách du lịch độc lập kết hợp các chuyến du ngoạn có hướng dẫn, những hiểu biết hấp dẫn về văn hóa và động vật hoang dã, và chỗ ở hàng đầu.</li>
                        </ul>
                   </div>
               </li>
               <li>
                   <h5>Mức Độ Hoạt Động </h5>
                   <!-- phân loại mức độ -->
                   <?php if($id_mucdo == 1){ ?>
                            <img id="icon-img-md" src="img/nhe.svg"> 
                        <?php } else if($id_mucdo == 2){?>
                            <img id="icon-img-md" src="img/nang.svg"> 
                        <?php }else { ?>
                            <img id="icon-img-md" src="img/vua.svg"> 
                        <?php } ?>
                        <!--  -->
                    <?=$namemucdo?>
                   <a href="" class="text1">
                       <span id="text"><i class="fa fa-question" aria-hidden="true"></i><span>
                    </a>
                    <div class="chuthich">
                        <ul class="ready1">
                            <li >Du khách nên có sức khỏe tốt và đi bộ thoải mái hoặc đứng trong thời gian dài. Các hoạt động hàng ngày có thể bao gồm các tour đi bộ, thăm các địa điểm, lái xe safari và đi bộ đường dài dễ dàng; và một số ngày sẽ có nhiều hoạt động thể chất hơn như đi bộ dài hơn, chèo thuyền kayak, lặn với ống thở hoặc đi xe đạp.</li>
                        </ul>
                   </div>
                </li>
               <li>
                   <h5>Dịch Vụ </h5> Sẵn Sàng 
                   <a href=""  class="text2">
                       <span id="text"><i class="fa fa-question" aria-hidden="true"></i><span>
                    </a>
                    <div class="chuthich">
                        <ul class="ready2">
                            <li >Các cuộc thám hiểm cao cấp được dẫn dắt bởi một chuyên gia Địa lý Quốc gia, một nhóm thám hiểm hoặc hướng dẫn viên hàng đầu, và khai thác các nguồn tài nguyên trên toàn thế giới của Travel Package để cho phép khám phá chuyên sâu và truy cập đặc biệt vào các địa điểm và chuyên gia trong lĩnh vực này. Hành trình được lên kế hoạch đầy đủ, với thời gian rảnh. Chỗ ở cao cấp hoặc tốt nhất có sẵn.</li>
                        </ul>
                   </div>
                </li>
                <?php if(isset($_SESSION['username'])){?>
                    <li id="no-border"><div class="none"><a href="index.php?view=viewcart" data-id_user =<?=$_SESSION['username']['maTK']?> data-id_cart_tour="<?=$id_Tour?>" id="them_gio_hang">Thêm Giỏ Hàng</a></div><h6>Hoặc liên hệ : 0815-116-733</h6></li>
                <?php }else{ ?>
                    <li id="no-border"><div class="none"><a href="index.php?view=viewcart" data-id_user=0 data-id_cart_tour="<?=$id_Tour?>" id="them_gio_hang">Thêm Giỏ Hàng</a></div><h6>Hoặc liên hệ : 0815-116-733</h6></li>
                <?php } ?>
                </ul>
        </div>
    </div>
    <div class="main-tour">
        <div class="aside-tour">
            <h1>Nội dung cho bạn</h1>
            <ul>
                <li>Tổng quan về chuyến đi</li>
                <li>Hành trình</li>
                <li>Bản đồ</li>
                <li>Những gì mong đợi</li>
                <li>Đơn giá và ngày</li><br>
            </ul>
            <div class="none1"><a href="" data-id_cart_tour="<?=$id_Tour?>" id="them_gio_hang">Thêm Giỏ Hàng</a></div>
            <h5>Hoặc liên hệ : 0815-116-733</h5>
        </div>
        <div class="article-tour">
            <div class="article-content1">
                <!-- tổng quan -->
                <h1>TỔNG QUAN VỀ HÀNH TRÌNH</h1>
                <h4><?=$tongQuan?></h4>
            </div>

            <div class="article-content2">
                <!-- hành trình -->
                <h1>HÀNH TRÌNH</h1>
                <h4>
                <?=$hanhTrinh?>
                </h4>
                <div class="day-tour">
                    <ul>
                        <li>
                            <?php
                            if($image1==""){//hình1
                                $hinh1 = "";
                            }else{
                                $hinh1 = "<img src='".$image1."' height='80' width='80'>"; 
                            }
                            if($image2==""){//hình2
                              $hinh2 = "";
                            }else{
                              $hinh2 = "<img src='".$image2."' height='80' width='80'>"; 
                            }
                            if($image3==""){//hình3
                              $hinh3 = "";
                            }else{
                              $hinh3 = "<img src='".$image3."' height='80' width='80'>"; 
                            }
                            if($image4==""){//hình4
                                $hinh4 = "";
                            }else{
                              $hinh4 = "<img src='".$image4."' height='80' width='80'>"; 
                            }
                            if($image5==""){//hình5
                                $hinh5 = "";
                            }else{
                                $hinh5 = "<img src='".$image5."' height='80' width='80'>"; 
                            }
                            if($image6==""){//hình6
                                $hinh6 = "";
                            }else{
                                $hinh6 = "<img src='".$image6."' height='80' width='80'>"; 
                            }
                            if($image7==""){//hình7
                              $hinh7 = "";
                            }else{
                              $hinh7 = "<img src='".$image7."' height='80' width='80'>"; 
                          }
                            ?>
                            <!-- day1 -->
                            <a href="#" class="day1"><h5><?=$muc1?></h5>
                            <span class="icon-day1"><i class="fa fa-angle-down" aria-hidden="true"></i></span>
                            </a>
                            <div class="content-day1">
                                <ul>
                                <div class="content-day-left">
                                <?=$day1?>
                                </div>
                                <div class="content-img">
                                <?=$hinh1?>
                                </div>
                                </ul>
                            </div>
                        </li>
                        <li>
                            <!-- day2 -->
                            <a href="" class="day2"><h5><?=$muc2?></h5>
                            <span class="icon-day2"><i class="fa fa-angle-down" aria-hidden="true"></i></span>
                            </a>
                            <div class="content-day2">
                                <ul>
                                <div class="content-day-left">
                                <?=$day2?>
                                </div>
                                <div class="content-img">
                                <?=$hinh2?>
                                </div>
                                </ul>
                            </div>
                        </li>
                        <li>
                            <!-- day3 -->
                            <a href="" class="day3"><h5><?=$muc3?></h5>
                            <span class="icon-day3"><i class="fa fa-angle-down" aria-hidden="true"></i></span>
                            </a>
                            <div class="content-day3">
                                <ul>
                                <div class="content-day-left">
                                <?=$day3?>
                                </div>
                                <div class="content-img">
                                <?=$hinh3?>
                                </div>
                                </ul>
                            </div>
                        </li>
                        <li>
                            <!-- day4 -->
                            <a href="" class="day4"><h5><?=$muc4?></h5>
                            <span class="icon-day4"><i class="fa fa-angle-down" aria-hidden="true"></i></span>
                            </a>
                            <div class="content-day4">
                                <ul>
                                <div class="content-day-left">
                                <?=$day4?>
                                </div>
                                <div class="content-img">
                                <?=$hinh4?>
                                </div>
                                </ul>
                            </div>
                        </li>
                        <li>
                            <!-- day5 -->
                            <a href="" class="day5"><h5><?=$muc5?></h5>
                            <span class="icon-day5"><i class="fa fa-angle-down" aria-hidden="true"></i></span>
                            </a>
                            <div class="content-day5">
                                <ul>
                                <div class="content-day-left">
                                <?=$day5?>
                                </div>
                                <div class="content-img">
                                <?=$hinh5?>
                                </div>
                                </ul>
                            </div>
                        </li>
                        <li>
                            <!-- day6 -->
                            <a href="" class="day6"><h5><?=$muc6?></h5>
                            <span class="icon-day6"><i class="fa fa-angle-down" aria-hidden="true"></i></span>
                            </a>
                            <div class="content-day6">
                                <ul>
                                <div class="content-day-left">
                                <?=$day6?>
                                </div>
                                <div class="content-img">
                                <?=$hinh6?>
                                </div>
                                </ul>
                            </div>
                        </li>
                       <?php if($muc7 !=""){ ?>
                        <li>
                            <!-- day6 -->
                            <a href="" class="day7"><h5><?=$muc7?></h5>
                            <span class="icon-day7"><i class="fa fa-angle-down" aria-hidden="true"></i></span>
                            </a>
                            <div class="content-day7">
                                <ul>
                                <div class="content-day-left">
                                <?=$day7?>
                                </div>
                                <div class="content-img">
                                <?=$hinh7?>
                                </div>
                                </ul>
                            </div>
                        </li>
                        <?php }else {} ?>
                    </ul>
                </div>
            </div>
            
            <div class="article-content3">
                <!-- Bản đồ -->
                <h1>BẢN ĐỒ</h1>
                <iframe src="<?=$banDo?>" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>

            <div class="article-content4">
                <!-- Mong đợi -->
                <h1>NHỮNG GÌ MONG ĐỢI</h1>
                <h4><?=$mongDoi?></h4>
            </div>
            <div class="article-content5">
                <!-- ngày và giá -->
                <h1>NGÀY VÀ GIÁ</h1>
            </div>
            <div class="ngay-title">
                <div class="ngay-gia">
                    Ngày khởi hành và Giá
                </div>
                <div class="no-content"></div>
            </div>
            <table>
            <tr>
                <th>Ngày xuất phát</th>
                <th>Ngày kết thúc</th>
                <th>Giá / Người</th>
            </tr>
            <?php
            $endtime = strtotime ( '+'. $days .'day' , strtotime ( $time ) ) ;
            $endtime = date ( 'Y-m-j' , $endtime );
            ?>
            <tr>
                <td><?=$time?></td>
                <td><?=$endtime?></td>
                <td>$<?php echo number_format("$donGia")."<br>";?></td>
               
            </tr>
            </table>

            <div class="article-content6">
                <!-- binh luan -->
                <h1>ĐÁNH GIÁ & BÌNH LUẬN CHO TOUR </h1> 
                <input type="hidden" id="id_tour" name="id_tour" class="id_tour" value="<?=$loadtour['id_Tour']?>">
                  <div class="rating-review">
                        <!-- load rating  -->
                  </div>       
                  <div class="binhluan-review">
                        <!-- load bình luận -->
                  </div>
                  
                <div class="form-bl">
                    <form class="send-cmt" action="#" method="post">
                        <h3>Trả lời </h3>
                        <h4>Đánh giá và bình luận của bạn sẽ  được hiển thị công khai. Những người khác sẽ đọc được.</h4>
                       <div class="title-bl"> Bình luận</div>
                       Tour này được bao nhiêu sao ?<br>
                       <div class="rating-user">
                            <li class="submit_star" id="submit_star_1" data-rating="1"><i class="fa fa-star" aria-hidden="true"></i></li>
                            <li class="submit_star" id="submit_star_2" data-rating="2"><i class="fa fa-star" aria-hidden="true"></i></li>
                            <li class="submit_star" id="submit_star_3" data-rating="3"><i class="fa fa-star" aria-hidden="true"></i></li>
                            <li class="submit_star" id="submit_star_4" data-rating="4"><i class="fa fa-star" aria-hidden="true"></i></li>
                            <li class="submit_star" id="submit_star_5" data-rating="5"><i class="fa fa-star" aria-hidden="true"></i></li>
                       </div>
                       <input type="hidden" id="id_tour" name="id_tour" class="id_tour" value="<?=$loadtour['id_Tour']?>">
                       <input type="hidden" id="username" name="username" class="username" value="<?=$_SESSION['username']['username']?>">
                        <textarea rows=5 id="content_bl" name="content_bl" style="resize:none" placeholder="Nhập để bình luận "></textarea>
                        <?php if(isset($_SESSION['username'])){?>
                            <input id="submit" type="submit" value="GỬI">
                        <?php }else{ ?>
                            <input  type="submit" value="Mời bạn đăng nhập để bình luận !" disabled>   
                        <?php } ?>
                    </form>
                </div>
            </div>

            <div class="article-content7">
                <!-- cung loai -->
                    <h1>CHUYẾN ĐI LIÊN QUAN </h1>
                        <div class="content-left-tour">
                            <?php foreach ($load_tourcungloai as $tourcungloai) {
                                extract($tourcungloai);
                                $linktour = "index.php?view=booktour&id_Tour=".$id_Tour;
                            ?>
                            <div class="content-tour">
                                <a href="<?=$linktour?>"><img id="banner-tour" src="upload/<?=$tourcungloai['banner']?>"></a>
                                <div class="content-titletour">
                                    <h3><a href="<?=$linktour?>"><?=$tourcungloai['nameTour']?></a><h3>
                                    <h5><a href="">Loại chuyến đi :<span id="padding"><?=$tourcungloai['namechuyendi']?></span></h5>
                                    <a href=""><img id="icon-tour" src="img/1m.svg"></a>
                                    <h5><a href="">Mức độ hoạt động : <span><?=$tourcungloai['namemucdo']?></span></a></h5>
                                    <h5><a href="">Số ngày : <span><?=$tourcungloai['days']?> ngày</span></a></h5> 
                                </div>
                            </div>
                            <?php } ?>
                            
                    </div>
                </div>
        </div>   
    </div>
</form>
    <script>
        // chuyendi
          $('a.text').mouseover(function(){
          $('ul .ready').toggleClass("show");
          });
          $('a.text').click(function(){
          $('ul .ready').toggleClass("show");
          });
          $('a.text').click(function(e){
            e.preventDefault();
          });
        // mucdohoatdong
          $('a.text1').mouseover(function(){
          $('ul .ready1').toggleClass("show1");
          });
          $('a.text1').click(function(){
          $('ul .ready1').toggleClass("show1");
          });
          $('a.text1').click(function(e){
            e.preventDefault();
          });
        //   dichvu
          $('a.text2').mouseover(function(){
          $('ul .ready2').toggleClass("show2");
          });
          $('a.text2').click(function(){
          $('ul .ready2').toggleClass("show2");
          });
          $('a.text2').click(function(e){
            e.preventDefault();
          });
        // day1
          $('a.day1').click(function(){
          $('.content-day1').toggleClass("active1");
          $('.icon-day1').toggleClass("rotate");
          });
          $('a.day1').click(function(e){
            e.preventDefault();
          });
          // day2
          $('a.day2').click(function(){
          $('.content-day2').toggleClass("active2");
          $('.icon-day2').toggleClass("rotate");
          });
          $('a.day2').click(function(e){
            e.preventDefault();
          });
          // day3
          $('a.day3').click(function(){
          $('.content-day3').toggleClass("active3");
          $('.icon-day3').toggleClass("rotate");
          });
          $('a.day3').click(function(e){
            e.preventDefault();
          });
          // day4
          $('a.day4').click(function(){
          $('.content-day4').toggleClass("active4");
          $('.icon-day4').toggleClass("rotate");
          });
          $('a.day4').click(function(e){
            e.preventDefault();
          });
          // day5
          $('a.day5').click(function(){
          $('.content-day5').toggleClass("active5");
          $('.icon-day5').toggleClass("rotate");
          });
          $('a.day5').click(function(e){
            e.preventDefault();
          });
          // day6
          $('a.day6').click(function(){
          $('.content-day6').toggleClass("active6");
          $('.icon-day6').toggleClass("rotate");
          });
          $('a.day6').click(function(e){
            e.preventDefault();
          });
          // day7
          $('a.day7').click(function(){
          $('.content-day7').toggleClass("active7");
          $('.icon-day7').toggleClass("rotate");
          });
          $('a.day7').click(function(e){
            e.preventDefault();
          });
    </script>
    <script type="text/javascript">
  $(document).ready(function(){
// thêm giỏ hàng
        $('#them_gio_hang').click(function(e){

                e.preventDefault();
                var id_cart_tour = $(this).data("id_cart_tour");
                var id_user = $(this).data("id_user");
                // alert(id_cart_tour);
                // alert(id_user);
                    $.ajax({
                    type: "POST",
                    url: "User/Cart/action_cart.php",
                    data : {id_cart_tour:id_cart_tour,id_user:id_user},
                    cache: false,
                    success: function(data){
                        console.log(data);
                    if(data==1){
                        alert('Thêm vào giỏ hàng thành công !');
                        location.href='User/Cart/viewcart.php';
                    }else{
                        alert('Thêm thất bại !')
                    }
                },
            });


        });
//  đánh giá tour
    function load_rating_data(){
        var id_tour_rating = $('[name*="id_tour"]').val();
        $.ajax({
          type: "POST",
          url:"User/BookTour/action_bl_tour.php",
          data: {id_tour_rating:id_tour_rating},
          cache: false,
          success: function(data){
                $('.rating-review').html(data);

            },
        });

      };
      setTimeout(function () {
        load_rating_data();
        load_content_data();
          }, 500);

//  bình luận tour
function load_content_data(){
        var id_tour_content = $('[name*="id_tour"]').val();
        $.ajax({
          type: "POST",
          url:"User/BookTour/action_bl_tour.php",
          data: {id_tour_content:id_tour_content},
          cache: false,
          success: function(data){
                $('.binhluan-review').html(data);

            },
        });

      };
      setTimeout(function () {
        load_rating_data();
        load_content_data();
          }, 500)
// rating tour
var rating_data = 0;

$(document).on('mouseover', '.submit_star', function(){
	var rating = $(this).data('rating');
	reset_background();
	for(var count = 1; count <= rating; count++){
		$('#submit_star_'+count).addClass('text-warning');
	}
    });

function reset_background(){
        for(var count = 1; count <= 5; count++){
             $('#submit_star_'+count).addClass('star-light');
             $('#submit_star_'+count).removeClass('text-warning');
        }
    }
$(document).on('mouseleave', '.submit_star', function(){
	reset_background();
	for(var count = 1; count <= rating_data; count++){
		$('#submit_star_'+count).removeClass('star-light');     
		$('#submit_star_'+count).addClass('text-warning');
	    }
    });

$(document).on('click', '.submit_star', function(){
        rating_data = $(this).data('rating');
});

$(document).on('click','#submit',function(e){
    e.preventDefault();
    var id_tour = $('#id_tour').val();
	var username = $('#username').val();
    var content_bl = $('#content_bl').val();
	if(content_bl == ''){
		alert("Vui lòng nhập bình luận !");
		return false;
	}
	else{
		$.ajax({
			url:"User/BookTour/action_bl_tour.php",
			method:"POST",
			data:{rating_data:rating_data, id_tour:id_tour, username:username,content_bl:content_bl},
			success:function(data){
                console.log(data);
				if(data==1){
                    alert("Gửi bình luận thành công !");
                    setTimeout(function () {
                    reset_background()
                    load_rating_data();
                    load_content_data();
                    }, 400);  
                    // 
                }else if(data==2){
                    alert("Bạn chưa chọn sao !");
                }else{
                    alert("Bình luận quá ngắn !");
                }
			}
		})
	}

        
});
 // xóa cmt
 $(document).on('click','.del-cmt',function(){
           var delete_cmt = confirm("Bạn có muốn xóa bình luận này không !");
            if(!delete_cmt){
              //không ok 
            }else{
              var del_id_tour = $(this).data("id_xoa");
              $.ajax({
                type: "POST",
                url:"User/BookTour/action_bl_tour.php",
                data:{del_id_tour:del_id_tour},
                cache: false,
                success: function(data){
                if(data==1){
                    alert('Xóa bình luận thành công !'),
                    setTimeout(function () {
                        load_rating_data();
                        load_content_data();
                      }, 500);   
                }
                }
              });
            }
            // end xoa
});
 //xóa reply-cmt
 $(document).on('click','.del-reply',function(){
           var delete_cmt = confirm("Bạn có muốn xóa bình luận này không !");
            if(!delete_cmt){
              //không ok 
            }else{
              var del_id_reply = $(this).data("id_reply");
              $.ajax({
                type: "POST",
                url:"User/BookTour/action_bl_tour.php",
                data:{del_id_reply:del_id_reply},
                cache: false,
                success: function(data){
                if(data==1){
                    alert('Xóa bình luận thành công !'),
                    setTimeout(function () {
                        load_rating_data();
                        load_content_data();
                      }, 500);    
                }
                }
              });
            }
            // end xoa
          });
        // end function
    });
</script>
</body>
</html>