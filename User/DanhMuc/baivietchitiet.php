<link rel="stylesheet" type="text/css" href="CSS/baivietchitiet1.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@100&family=Roboto+Mono:wght@100&family=Zen+Kaku+Gothic+Antique:wght@300&display=swap" rel="stylesheet">
<div class="main-bv">
     <?php extract($onebv);
     $sql="UPDATE baiviet SET soLuotXem = soLuotXem + 1 WHERE id_bai=$id_bai";
     $baiviet=pdo_execute($sql);
     $linkdm = 'index.php?view=danhmuc1&id_DMTT='.$id_DMTT;
     ?>
     <input type="hidden" id="id_bai" name="id_bai" class="id_bai" value="<?=$onebv['id_bai']?>">
    <img id="banner-bv" src="upload/<?=$hinhAnh?>">
    <div class="inset"></div>
    <div class="title-bv">
    <h5><a href="index.php">Home</a> <span style="color:dodgerblue; font-size:22px">+</span> <a href="<?=$linkdm?>"><?=$nameDMTT?></a><h5>
    <h1><?=$tieuDe?></h1>
    <?=$tomTat?>
    </div>
</div>
               
<div class="content-bv">
    <h5>Những bài viết này được những người đã từng trải nghiệm, hưởng thụ , thử thách để lại cho chúng ta những câu chuyện chân thật nhất cho người đọc có kinh nghiệm.</h5>
    <div class="writter">
        VIẾT BỞI <span><?=$tacGia?></span></div>
    <div class="luotxem">
        LƯỢT XEM : <span><?=$soLuotXem?></span></div>
     <div class="product">
        <span>XUẤT BẢN <?=$date?></span></div>
        <?=$noiDung?>
      <div class="tukhoabv">
        Từ khóa : <a href=""><?=$keyWord?></a>
      </div>
</div>
<!-- bình luận -->
<div class="binhluan-bv">
    <h2>Bình luận cho bài viết</h2>
<!-- load nội dung bình luận -->
    <div id="hienthi">    
    </div>
    
<!-- end nd bình luận -->
     <div class="form-bl">
                    <form id="send-cmt" action="" method="post">
                        <h3>Trả lời </h3>
                        <h4>Bình luận của bạn sẽ  được hiển thị công khai. Những người khác sẽ đọc được.</h4>
                       <div class="title-bl"> Bình luận</div>
                       <input type="hidden" id="id_bai" name="id_bai" class="id_bai" value="<?=$onebv['id_bai']?>">
                       <input type="hidden" id="username" name="username" class="username" value="<?=$_SESSION['username']['username']?>">
                        <textarea rows=5 name="binhluan_news" style="resize:none" placeholder="Nhập để bình luận "></textarea>
                        <!-- kiểm tra có tài khoản không gửi bình luận -->
                        <?php if(isset($_SESSION['username'])){?>
                            <input id="submit" type="submit" value="GỬI">
                        <?php }else{ ?>
                            <input  type="submit" value="Mời bạn đăng nhập để bình luận !" disabled>   
                        <?php } ?>
                    </form>
      </div>
</div>
<div class="bv-cungdm">
    <h1>LOẠI DANH MỤC</h1>
<script>
                $(document).ready(function(){
                $('.owl-carousel').owlCarousel({
                loop:true,
                margin:10,
                nav:true,
                navText:['<i class="fa fa-arrow-left" aria-hidden="true"></i>','<i class="fa fa-arrow-right" aria-hidden="true"></i>'],
                responsive:{
                    0:{
                        items:1
                    },
                    600:{
                        items:3
                    },
                    1000:{
                        items:4
                    }
                }
            })
            });

            </script>
            
</div>
<div class="danhmuc">
<div class="owl-carousel owl-theme1">
            <?php foreach ($dmtintuc as $dmtt) {
                    extract($dmtt);
                    $linkdm = 'index.php?view=danhmuc1&id_DMTT='.$id_DMTT;
             ?>
                <div class="item-dmc"> 
                  <a href="<?=$linkdm?>" class="danhmuc-dmc"><?=$nameDMTT?></a></div>     
            <?php } ?>
            </div>
</div>
<div class="bv-cungdm">
    <h1>GỢI Ý CHO BẠN</h1>
            <div class="owl-carousel owl-theme">
            <?php foreach ($loadall_khacnhau as $khacnhau) {
                    extract($khacnhau);
                    $linkbv = 'index.php?view=baivietchitiet&id_bai='.$id_bai;
             ?>
            <div class="item-bvc">
                  <a href="<?=$linkbv?>"><img src="upload/<?=$hinhAnh?>"></a>
                  <div class="padding-left">
                  <a href="<?=$linkbv?>" class="title-bvc"><h4><?php echo"<td>".substr($khacnhau['tieuDe'], 0 ,130,)." </td>";?></h4></a>
                  <a href="<?=$$linkdm?>" class="danhmuc-bvc" ><?=$nameDMTT?></a></div>
                </div>
                <?php } ?>
                
               
                
                
                </div>
            </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
    // load cmt 
      function load_comment(){
        var id_bai = $('[name*="id_bai"]').val();
        $.ajax({
          type: "POST",
          url: "User/DanhMuc/actionbl.php",
          data: {name_bv_id:id_bai},
          cache: false,
          success: function(data){
                $('#hienthi').html(data);

            },
        });

      };
      setTimeout(function () {
            load_comment();
          }, 500);

    //send cmt
    $('#send-cmt').submit(function(e){
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "User/DanhMuc/actionbl.php",
            data:  $(this).serializeArray(),
            cache: false,
            success: function(data){
                if(data==1){
                    alert("Gửi bình luận thành công !");
                    $("#send-cmt")[0].reset();
                    //load cmt
                    setTimeout(function () {
                    load_comment();
                    }, 500);   
                    // 
                }else{
                    alert("Xin mời bạn viết bình luận !");
                }

            },
        })
    });
    // xóa cmt
    $(document).on('click','.del-cmt',function(){
           var delete_cmt = confirm("Bạn có muốn xóa bình luận này không !");
            if(!delete_cmt){
              //không ok 
            }else{
              var del_id_bl = $(this).data("id_xoa");
              $.ajax({
                type: "POST",
                url: "User/DanhMuc/actionbl.php",
                data:{del_id_bl:del_id_bl},
                cache: false,
                success: function(data){
                if(data==1){
                    alert('Xóa bình luận thành công !'),
                    setTimeout(function () {
                        load_comment();
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
                url: "User/DanhMuc/actionbl.php",
                data:{del_id_reply:del_id_reply},
                cache: false,
                success: function(data){
                if(data==1){
                    alert('Xóa bình luận thành công !'),
                    setTimeout(function () {
                        load_comment();
                      }, 500);   
                }
                }
              });
            }
            // end xoa
          });


    });
    
    </script>