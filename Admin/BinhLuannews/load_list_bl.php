<?php
include("../../Modul/pdo.php");
include('../../Modul/blnews.php');
include('../../Modul/tintuc.php');
$loadbl_bv = loadbl_bv();
?>

                  <?php
                  $i=1;
                  foreach ($loadbl_bv as $load_bldm) {
                    extract($load_bldm);
            
                   
                  ?> 
                  <tr>
                    <th><input type="checkbox"></th>
                    <td><?=$i++?></td>
                    <td><?=$id_bai?></td>
                    <td><a href="../index.php?view=baivietchitiet&id_bai=<?php echo $load_bldm['id_bai']; ?>" target="_blank"><?=substr($tieude,0,100,)?></a></td>
                    <td> <img src="../upload/<?=$load_bldm['hinhanh']?>" style="width:100px; height:100px;"></td>
                    <td><?=$soluong?></td>
                    <td><a href="index.php?action=blchitiet&id_bai=<?php echo $load_bldm['id_bai']; ?>">Xem bình luận</a></td>
                    <td>
                    <button type="button" id="none" data-id_del="<?=$load_bldm['id_bai'];?>" class="btn btn-secondary-one" data-toggle="modal" data-target="#modal-del">
                          <i class="fa fa-trash-o" aria-hidden="true"></i>
                    </button>
                    <!-- Modal -->
                      <div class="modal fade" id="modal-del" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h3 class="modal-title" id="exampleModalLongTitle">Bạn có muốn xóa các bình luận này không?</h3>
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
               