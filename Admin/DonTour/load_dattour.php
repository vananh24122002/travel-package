<?php
include("../../Modul/pdo.php");
include('../../Modul/hoadondattour.php');
$load_hoadon = load_hoadon();
?>
 <thead>
                  <tr>
                    <th scope="col"></th>
                    <th scope="col">Mã đơn</th>
                    <th scope="col">Khách hàng</th>
                    <th scope="col">Tour</th>
                    <th scope="col">Số lượng</th>
                    <th scope="col">Tổng tiền</th>
                    <th scope="col">Xem chi tiết</th>
                    <th scope="col">Tình trạng</th>
                    <th scope="col">Quản lý</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  foreach ($load_hoadon as $hoadon) {
                    extract($hoadon);
                    $xoabooktour = "index.php?action=xoabooktour&id_hoadon=".$id_hoadon;
                  ?>
                  <tr>
                    <th><input type="checkbox"></th>
                    <td><?=$id_hoadon ?></td>
                    <td><?=$tenkh?></td>
                    <td style="width:20%;"><?=substr($nameTour,0,70) ?></td>
                    <td><?=$songuoi?></td>
                    <td><?php echo '$ '.  number_format($hoadon['tongtien']) . ''; ?></td>
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
                          <div class="hoat-dong">Đơn mới</div>
                      <?php  }else if($tinhtrang==1){ ?>
                          <div class="hoat-dong" style="background-color:#55BEC0;">Đã xác nhận</div>
                      <?php  }else{ ?>
                          <div class="hoat-dong" style="background-color:#C0C0C0;">Đã hủy</div>
                      <?php  } ?>
                    </td>
                    <td>
                        <?php if($tinhtrang==0){?>
                               <button type="button" id="xac-nhan"  data-id_hoa_don_xac_nhan="<?=$hoadon['id_hoadon']?>" class="dieu-khien" data-toggle="modal" data-target="#modal-xac-nhan">
                                    Xác nhận
                              </button>
                                <!-- Modal xác nhận -->
                            <div class="modal fade" id="modal-xac-nhan" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h3 class="modal-title" id="exampleModalLongTitle">Bạn có muốn xác nhận đơn này không ?</h3>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-secondary-two">OK</button>
                                  </div>
                                </div>
                              </div>
                            </div>
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
                                    <h3 class="modal-title" id="exampleModalLongTitle">Bạn có muốn hủy xác nhận đơn này không?</h3>
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
                  <?php } ?>
                </tbody>  
<script type="text/javascript">
  $(document).ready(function(){
  //load đơn đặt tour
  $(document).on('click','.btn-chi-tiet',function(e){
    var id_hoadon_chi_tiet = $(this).data("id_hoadon_chi_tiet");
          $.ajax({
            type: "POST",
            url: "DonTour/load_tt.php",
            data:{id_hoadon_chi_tiet:id_hoadon_chi_tiet},
            success: function(data){
                    $('#load-modal-chitiet').html(data);
                   
                },
          });

          });

 });
</script>
