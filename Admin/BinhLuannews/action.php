<?php
include("../../Modul/pdo.php");
include("../../Modul/blnews.php");
include('../../Modul/taikhoan.php');
session_start();
//load cmt SL 
if(isset($_POST['id_bai'])){
  $id_bai = $_POST['id_bai'];
$loadbl_chitiet = loadbl_chitiet($id_bai);
?>
<thead>
                  <tr>
                    <th scope="col"></th>
                    <th scope="col">Mã bình luận</th>
                    <th scope="col">Mã bài viết</th>
                    <th scope="col">Tên người dùng</th>
                    <th scope="col">Nội dung</th>
                    <th scope="col">Ngày bình luận</th>
                    <th scope="col">Trạng thái</th>
                    <th scope="col">Quản lý</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $i = 1;
                  foreach ($loadbl_chitiet as $load_blct) {
                    extract($load_blct);
            
                  ?> 
                  <tr>
                    <th><input type="checkbox"></th>
                    <td><?=$load_blct['id_bl']?></td>
                    <td><a href="../index.php?view=baivietchitiet&id_bai=<?php echo $load_blct['id_bai']; ?>" target="_blank"><?=$load_blct['id_bai']?></a></td>
                    <td><?=$load_blct['fullname']?></td>
                    
                    <td style="width:40%;"><div id="bold">Bình luận:</div> <div id="cmt"><?=$load_blct['binhluan_news'] ?></div>
                    <ul class='reply'>
                    <div id="bold">Trả lời :</div>
                    <?php $load_reply = load_reply($id_bl,$id_bai);
                      foreach ($load_reply as $replycmt) {
                        
                    ?>
                      <li><?php if($replycmt['role']==1){
                          echo('Quản trị viên: ');
                        }else if($replycmt['role']==2){
                          echo('Admin: ');
                        }else{
                          echo('Thành viên: ');
                        }
                        ?><p style="color:black"><?=$replycmt['reply']?>
                      <!-- kiểm tra id trùng  để xóa -->
                      <?php if(($_SESSION['username']['maTK'])==$replycmt['maTK']){ ?>
                        <button type="button" id="none" data-id_xoa="<?=$load_blct['id_bl'];?>" class="btn del-reply-tour" data-toggle="modal" data-target="#delete-reply" data-id_reply="<?=$replycmt['id_reply']?>" data-id_reply_bl="<?=$replycmt['id_bl']?>" data-bv_reply="<?=$load_blct['id_bai'];?>">
                          <i class="fa fa-trash-o" aria-hidden="true"></i>
                        </button>
                            <!-- Modal -->
                            <div class="modal fade" id="delete-reply" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h3 class="modal-title" id="exampleModalLongTitle">Bạn có muốn xóa bình luận này không ?</h3>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn  del-reply-tour-two">OK</button>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <!-- end modal -->
                        <?php } ?>
                      </li>
                      
                    <?php } ?>
                    </ul>
                    <br><textarea rows=5 class="reply-cmt_<?=$load_blct['id_bl'];?>"></textarea>
                    <button class="btn-reply-cmt" data-id_bv="<?=$load_blct['id_bai']?>" data-id_cmt="<?=$load_blct['id_bl'];?>">Trả lời </button>
                    </td>
                    <td><?=$load_blct['ngayBinhLuan']?></td>
                    <td><?php  ?></td>
                    <td>      
                    <button type="button" id="none" data-id_xoa="<?=$load_blct['id_bl'];?>" class="btn btn-secondary-one" data-toggle="modal" data-target="#modal-del">
                          <i class="fa fa-trash-o" aria-hidden="true"></i>
                    </button>
                            <!-- Modal -->
                            <div class="modal fade" id="modal-del" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h3 class="modal-title" id="exampleModalLongTitle">Bạn có muốn xóa bình luận này không ?</h3>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-secondary-two">OK</button>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <!-- end modal -->
                  </td>
                  </tr>
                  <?php } ?> 
                </tbody>
<?php } 
//xóa bình luận
    if(isset($_POST['del_id_bl'])){
        $id_bl = $_POST['del_id_bl'];
        del_cmt($id_bl);
        echo 1;
        }
//admin-reply
if(isset($_POST['id_bl'])){
  $id_bl = $_POST['id_bl'];
  $username = $_POST['username'];
  $reply = $_POST['reply'];
  $id_bv = $_POST['id_bv'];
  if($reply!=""){
  insert_replynews($username,$reply,$id_bl,$id_bv);
  echo 1; 
}
}
//xóa reply
    if(isset($_POST['reply_id'])){
        $id_reply = $_POST['reply_id'];
        
        del_cmt_reply($id_reply);
        echo 1;
      }
// xóa tổng bình luận
if(isset($_POST['id_del'])){
  $id_bai = $_POST['id_del'];
  
  del_all_cmt($id_bai);
  echo 1;
}
?>


