<?php
include("../../Modul/pdo.php");
include("../../Modul/bltour.php");
include('../../Modul/taikhoan.php');
session_start();
if(isset($_POST['rating_data'])){
    $rating_bl = $_POST['rating_data'];
    $id_tour = $_POST['id_tour'];
    $username = $_POST['username'];
    $content_bl = $_POST['content_bl'];
    if($rating_bl==0){
        echo 2;
    }elseif((strlen($content_bl))<=3){
        echo 3;
    }else{
       $insert = insert_bltour($id_tour,$username,$content_bl,$rating_bl);
       echo 1;
    }
}
// load rating
if(isset($_POST['id_tour_rating'])){
    $id_tour = $_POST['id_tour_rating'];
    $avg_rating = 0;
    $total_rating = 0;
    $five_star = 0;
    $four_star = 0;
    $three_star = 0;
    $two_star = 0;
    $one_star = 0;
    $total_rating_bl =0;
    $load_rating = load_rating($id_tour);
    // var_dump($load_rating);
    foreach ($load_rating as $rating) {
        if($rating['rating_bl']=='5'){
            $five_star++;
        }
        if($rating['rating_bl']=='4'){
            $four_star++;
        }
        if($rating['rating_bl']=='3'){
            $three_star++;
        }
        if($rating['rating_bl']=='2'){
            $two_star++;
        }
        if($rating['rating_bl']=='1'){
            $one_star++;
        }
        $total_rating++;
        $total_rating_bl +=$rating['rating_bl'];

    }
    if($total_rating != 0){
         $avg_rating = $total_rating_bl / $total_rating;
    }else{
        $avg_rating = 0;
    } ?>
    <div class="danh-gia-trung-binh">
                            <h3>Đánh Giá Trung Bình</h3>
                            <h2><?php echo ceil($avg_rating)?>/5</h2>
                            <div id="rating-icon">
                                <?php for($i=1;$i<=5;$i++){
                                    if(ceil($avg_rating)<$i){ ?>
                                         <i class="fa fa-star" aria-hidden="true" style="color:#99a2aa"></i>
                                <?php }else{ ?>
                                        <i class="fa fa-star" aria-hidden="true" style="color:#ea9d02"></i> 
                               <?php }
                                } ?>
                            </div>
                            <?php $count_rating_content = count_rating_content($id_tour); ?>
                            <span id="danh-gia-nhan-xet-reivew"><?=$count_rating_content['count_content']?> đánh giá & <?=$count_rating_content['count_rating']?> nhận xét</span>
                       </div>
                       <div class="rating-trung-binh">
                           <div class="rating-trung-binh-count">
                                 5 <i class="fa fa-star" aria-hidden="true"></i>
                                 <?php if($five_star>0){
                                            $width = ($five_star/ $total_rating)*100;
                                        }else{
                                            $width =0;
                                 }
                                 ?>
                                 <div class="rating-count" id="five-star">
                                     <p style="width:<?=$width?>%;background-color:#00CC00"></p>
                                 </div>
                                 <span class="number-rating">(<?=$five_star?>)</span>
                           </div>
                           <div class="rating-trung-binh-count">
                                 4 <i class="fa fa-star" aria-hidden="true"></i>
                                 <?php if($four_star>0){
                                            $width = ($four_star/ $total_rating)*100;
                                        }else{
                                            $width =0;
                                 }?>
                                 <div class="rating-count" id="five-star">
                                     <p style="width:<?=$width?>%;background-color:#00CC00"></p>
                                 </div>
                                 <span class="number-rating">(<?=$four_star?>)</span>
                           </div>
                           <div class="rating-trung-binh-count">
                                 3 <i class="fa fa-star" aria-hidden="true"></i>
                                 <?php if($three_star>0){
                                            $width = ($three_star/ $total_rating)*100;
                                        }else{
                                            $width =0;
                                 }?>
                                  <div class="rating-count" id="five-star">
                                     <p style="width:<?=$width?>%;background-color:#00CC00"></p>
                                 </div>
                                 <span class="number-rating">(<?=$three_star?>)</span>
                           </div>
                           <div class="rating-trung-binh-count">
                                 2 <i class="fa fa-star" aria-hidden="true"></i>
                                 <?php if($two_star>0){
                                            $width = ($two_star/ $total_rating)*100;
                                        }else{
                                            $width =0;
                                 }?>
                                 <div class="rating-count" id="five-star">
                                     <p style="width:<?=$width?>%;background-color:#00CC00"></p>
                                 </div>
                                 <span class="number-rating">(<?=$two_star?>)</span>
                           </div>
                           <div class="rating-trung-binh-count">
                                 1 <i class="fa fa-star" aria-hidden="true"></i>
                                 <?php if($one_star>0){
                                            $width = ($one_star/ $total_rating)*100;
                                        }else{
                                            $width =0;
                                 }?>
                                  <div class="rating-count" id="five-star">
                                     <p style="width:<?=$width?>%;background-color:#00CC00"></p>
                                 </div>
                                 <span class="number-rating">(<?=$one_star?>)</span>
                           </div>
<?php } 
if(isset($_POST['id_tour_content'])){
    $id_tour = $_POST['id_tour_content'];
    $load_rating_pages = load_rating_pages($id_tour);
    foreach ($load_rating_pages as $content) { 
        extract($content);
?>
      <div class="binhluan-review-content">
          
    <?php $listtk = tk_Query_One($username);
        if($listtk['hinhAnh']==""){
            $hinh ="<img src=img/anhdz.jpg" ;                              
           }else{
            $hinh = "<img src=upload/".$listtk['hinhAnh']." "; }?>
                          <div id="photo"><?=$hinh?></div>
                          <div class="binhluan-review-content-list">
                             <h4 class="fullname"><?=$listtk['fullname']?></h4>
                             <span id="binhluan-review-content-list-sao">
                             <?php for($i=1;$i<=5;$i++){
                                    if($content['rating_bl']<$i){ ?>
                                         <i class="fa fa-star" aria-hidden="true" style="color:#99a2aa"></i>
                                <?php }else{ ?>
                                        <i class="fa fa-star" aria-hidden="true" style="color:#ea9d02"></i> 
                               <?php }
                                } ?>
                             </span>
                             <h4><?=$content['content_bl']?></h4>
                            <div class="phan-hoi">
                                <span style="color:cornflowerblue">Phản hồi</span>
                                <span style="color:#C0C0C0 ; padding-left:1vw;"> vào <?=$content['ngaybinhluan']?> <span>
                                <!-- kiểm tra có trùng id không để xóa -->
                                <?php
                                if(isset($_SESSION['username'])){
                                    if($listtk['maTK']==$_SESSION['username']['maTK']){
                                ?>
                                <button id="none"  type="button" data-id_xoa="<?=$content['id_bl'];?>" class="del-cmt" value=""><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                <?php }else{} } ?>
                                <!-- ... -->
                            </div>
                            </div>
                      </div>   
                      <!-- reply cmt -->
                                <?php $load_reply_tour = load_reply_tour($id_bl,$id_tour); 
                                        foreach ($load_reply_tour as $replycmt) {
                                ?>
                                <div id="reply-cmt"> 
                                                <div class="username"><?=$replycmt['fullname']?> <span id="role"><?php if($replycmt['role']==1){
                                                echo('Quản trị viên  ');
                                                }else if($replycmt['role']==2){
                                                echo('Admin');
                                                }else{
                                                echo('Thành viên ');
                                                }
                                                ?></span></div>
                                                <div class="noidung"><?=$replycmt['reply']?></div>
                                                <div class="thoigian">
                                                <a  href=""  id="color">Phản hồi</a>    
                                                ngày <?=$replycmt['time_reply']?> </div>
                                                <?php
                                                if(isset($_SESSION['username'])){
                                                    if($replycmt['maTK']==$_SESSION['username']['maTK']){
                                                ?>
                                                <button id="none"  type="button" data-id_reply="<?=$replycmt['id_reply'];?>" class="del-reply" value=""><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                                <?php }else{} } ?>
                                </div>
                        <!-- .... -->
    
<?php }   }  ?>

<?php }
//xóa bình luận
if(isset($_POST['del_id_tour'])){
    $id_tour = $_POST['del_id_tour'];
    del_cmt_rating($id_tour);
    echo 1;
}
//xóa reply bình luận
if(isset($_POST['del_id_reply'])){
    $id_reply = $_POST['del_id_reply'];
    del_cmt_reply_tour($id_reply);
    echo 1;
}
?>