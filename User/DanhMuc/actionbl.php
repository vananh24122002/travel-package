<?php
include("../../Modul/pdo.php");
include("../../Modul/blnews.php");
include('../../Modul/taikhoan.php');
session_start();
//load cmt
if(isset($_POST['name_bv_id'])){
    $id_bai = $_POST['name_bv_id'];
    $loadblnews = loadall_blnews($id_bai);
    foreach ($loadblnews as $loadbl) {
        extract($loadbl);
    //load danh sách tk dựa trên username
    $listtk = tk_Query_One($username);
        if($listtk['hinhAnh']==""){
            $hinh ="<img src=../../img/anhdz.jpg" ;                              
           }else{
            $hinh = "<img src=../../upload/".$listtk['hinhAnh']." "; }?>
            <div class="hienthi-bl">
          <img id="photo" src="<?=$hinh?>">
          <div class="username"> <?=$listtk['fullname']?></div>
          <div class="noidung"> <?=$loadbl['binhluan_news']?></div>
          <div class="thoigian">
          <a  href=""  id="color">Phản hồi</a>    
          ngày <?=$loadbl['ngayBinhLuan']?>
          <?php
           if(isset($_SESSION['username'])){
            if($listtk['maTK']==$_SESSION['username']['maTK']){
          ?>
            <button id="none"  type="button" data-id_xoa="<?=$loadbl['id_bl'];?>" class="del-cmt" value=""><i class="fa fa-trash-o" aria-hidden="true"></i></button>
         <?php }else{} } ?>
          </div></div>
           <!-- reply cmt -->
           <?php $load_reply = load_reply($id_bl,$id_bai); 
                foreach ($load_reply as $replycmt) {
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
        
<?php } } ?>
<?php }
//insert cmt
if(isset($_POST['binhluan_news'])){
    $binhluan_news = $_POST['binhluan_news'];
    $id_bai = $_POST['id_bai'];
    $username = $_POST['username'];
    if($binhluan_news != ""){
        echo 1;
        insert_blnews($id_bai,$username,$binhluan_news);
    }else{
        echo 0;
    }
}
//xóa bình luận
if(isset($_POST['del_id_bl'])){
    $id_bl = $_POST['del_id_bl'];
    del_cmt($id_bl);
    echo 1;
    }
//xóa reply bình luận
if(isset($_POST['del_id_reply'])){
    $id_reply = $_POST['del_id_reply'];
    del_reply_cmt($id_reply);
    echo 1;
    }
?>
