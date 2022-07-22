<?php
include("../../Modul/pdo.php");
include('../../Modul/hoadondattour.php');
if(isset($_POST['id_user_hoadon'])){
$id_kh = $_POST['id_user_hoadon'];
$load_hoadon_kh = load_hoadon_kh($id_kh);
?>
 <thead>
                  <tr>
                    <th scope="col">Mã đơn</th>
                    <th scope="col">Hình ảnh</th>
                    <th scope="col">Tour</th>
                    <th scope="col">Hành khách</th>
                    <th scope="col">Tổng tiền</th>
                    <th scope="col">Ngày đặt</th>
                    <th scope="col">Xem chi tiết</th>
                    <th scope="col">Tình trạng</th>
                    <th scope="col">Quản lý</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  foreach ($load_hoadon_kh as $hoadon) {
                    extract($hoadon);
                    $xoabooktour = "index.php?action=xoabooktour&id_hoadon=".$id_hoadon;
                  ?>
                  <tr>
                    <td><?=$id_hoadon ?></td>
                    <td><img src="upload/<?=$banner?>" style="width:150px;height:120px;"></td>
                    <td style="width:20%;"><?=$nameTour?></td>
                    <td>0<?=$songuoi?></td>
                    <td>$<?=$tongtien?></td>
                    <td><?=$time_dat?></td>
                    <td>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn-chi-tiet" data-toggle="modal" data-target="#modal-chi-tiet" data-id_hoadon_chi_tiet="<?=$hoadon['id_hoadon']?>">
                                    Xem chi tiết
                            </button>
                            <!-- Modal chi tiết -->
                            <div class="modal fade" id="modal-chi-tiet" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content" style="width:650px;margin-left:-75px;" id="load-modal-chitiet">  

                              </div>
                            </div>
                            </div>
                    </td>
                    <td>
                      <?php if($tinhtrang==0){ ?>
                          <div class="hoat-dong">Đợi xử lý</div>
                      <?php  }else if($tinhtrang==1){ ?>
                          <div class="hoat-dong" style="background-color:#55BEC0;">Đã xác nhận</div>
                      <?php  }else{ ?>
                          <div class="hoat-dong" style="background-color:#C0C0C0;">Đã hủy</div>
                      <?php  } ?>
                    </td>
                    <td>
                        <?php if($tinhtrang==0){?>
                          <button type="button" id="huy"  data-id_hoa_don_huy="<?=$hoadon['id_hoadon']?>" class="dieu-khien" data-toggle="modal" data-target="#modal-huy">
                                   Hủy
                              </button>
                                <!-- Modal hủy xác nhận-->
                            <div class="modal fade" id="modal-huy" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content" style="margin-top:45%;">
                                  <div class="modal-header">
                                    <h3 class="modal-title" id="exampleModalLongTitle" style="text-align:center;padding-top:3vw;">Bạn có muốn hủy đơn này không?</h3>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-secondary-two">OK</button>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <!-- end modal -->
                            <!-- end modal -->
                        <?php }else if($tinhtrang==2){?>                                        
                        <?php }else{ ?>
                          <button type="button" id="huy"  data-id_hoa_don_huy="<?=$hoadon['id_hoadon']?>" class="dieu-khien" data-toggle="modal" data-target="#modal-huy">
                                   Hủy
                            </button>
                                <!-- Modal hủy xác nhận-->
                            <div class="modal fade" id="modal-huy" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h3 class="modal-title" id="exampleModalLongTitle">Bạn có muốn hủy đơn này không?</h3>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-secondary-two">OK</button>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <!-- end modal -->
                       <?php  }?>
                    </td>
                    <td>
                    <?php
                    echo'<a onclick="return Del('.$id_hoadon.')" href="'.$id_hoadon.'">';?><button id="none" type="button" value=""><i class="fa fa-trash-o" aria-hidden="true"></i></button></a>
                    </td>
                  </tr>
                  <?php } }?>
                </tbody>  
<script type="text/javascript">
  $(document).ready(function(){
  //load đơn đặt tour
  $(document).on('click','.btn-chi-tiet',function(e){
    var id_hoadon_chi_tiet = $(this).data("id_hoadon_chi_tiet");
          $.ajax({
            type: "POST",
            url: "User/Bill/load_ct_bill.php",
            data:{id_hoadon_chi_tiet:id_hoadon_chi_tiet},
            success: function(data){
                    $('#load-modal-chitiet').html(data);
                   
                },
          });

          });
 });
</script>
