<?php
include("../../Modul/pdo.php");
include("../../Modul/bltour.php");
include('../../Modul/taikhoan.php');
session_start();
//load cmt SL 
if(isset($_POST['id_tour'])){
  $id_tour = $_POST['id_tour'];
$loadbl_tour_chitiet = loadbl_tour_chitiet($id_tour);
?>
<thead>
                  <tr>
                    <th scope="col"></th>
                    <th scope="col">Mã bình luận</th>
                    <th scope="col">Tour</th>
                    <th scope="col">Tên người dùng</th>
                    <th scope="col">Nội dung</th>
                    <th scope="col">Ngày bình luận</th>
                    <th scope="col">Đánh giá</th>
                    <th scope="col">Quản lý</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $i = 1;
                  foreach ($loadbl_tour_chitiet as $load_blct) {
                    extract($load_blct); 
                    
                  ?> 
                  <tr>
                    <td><input type="checkbox"></td>
                    <td><?=$load_blct['id_bl']?></td>
                    <td><a href="../index.php?view=booktour&id_Tour=<?php echo $load_blct['id_tour']; ?>" target="_blank"><?=$load_blct['id_tour']?></a></td>
                    <td><?=$load_blct['fullname']?></td>
                    
                    <td style="width:30%;"><div id="bold">Bình luận:</div> <div id="cmt"><?=$load_blct['content_bl'] ?></div>
                    <!-- reply-cmt -->
                    <ul class='reply'>
                    <div id="bold">Trả lời :</div>
                    <?php $load_reply_tour = load_reply_tour($id_bl,$id_tour);
                      foreach ($load_reply_tour as $replycmt) {
                        
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
                        <button type="button" id="none" data-id_xoa="<?=$load_blct['id_bl'];?>" class="btn del-reply-tour" data-toggle="modal" data-target="#delete-reply" data-id_reply="<?=$replycmt['id_reply']?>" data-id_reply_bl="<?=$replycmt['id_bl']?>" data-bv_reply="<?=$load_blct['id_tour'];?>">
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
                    <button class="btn-reply-cmt" data-id_bv="<?=$load_blct['id_tour']?>" data-id_cmt="<?=$load_blct['id_bl'];?>">Trả lời </button>
                    </td>
                    <td><?=$load_blct['ngaybinhluan']?></td>
                    <td>
                        <?php for($i=1;$i<=5;$i++){
                            if($rating_bl<$i){ ?>
                                    <i class="fa fa-star" aria-hidden="true" style="color:#99a2aa"></i>
                                <?php }else{ ?>
                                    <i class="fa fa-star" aria-hidden="true" style="color:#ea9d02"></i> 
                        <?php }
                        } ?>
                    </td>
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
        del_tour_cmt($id_bl);
        echo 1;
}
//admin-reply
if(isset($_POST['id_bl'])){
  $id_bl = $_POST['id_bl'];
  $username = $_POST['username'];
  $reply = $_POST['reply'];
  $id_tour = $_POST['id_bv'];
  if($reply!=""){
  insert_replytour($username,$reply,$id_bl,$id_tour);
  echo 1; 
}
}
//xóa reply
    if(isset($_POST['reply_id'])){
        $id_reply = $_POST['reply_id'];
        
        del_cmt_reply_tour($id_reply);
        echo 1;
}
// xóa tổng bình luận theo id_tour
if(isset($_POST['id_tour_dm'])){
  $id_tour = $_POST['id_tour_dm'];
  
  del_sum_tour_bl($id_tour);
  echo 1;
}
?> 

