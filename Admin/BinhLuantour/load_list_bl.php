<?php
include("../../Modul/pdo.php");
include("../../Modul/bltour.php");
include('../../Modul/tourguide.php');
$load_binh_luan_tour = load_binh_luan_tour();
?>

                  <?php 
                   $i=1;
                  foreach ($load_binh_luan_tour as $load_bldm) {
                    extract($load_bldm); 
                  ?> 
                  <tr>
                    <th><input type="checkbox"></th>
                    <td><?=$i++?></td>
                    <td><?=$id_Tour?></td>
                    <td><a href="../index.php?view=booktour&id_Tour=<?php echo $load_bldm['id_Tour']; ?>" target="_blank"><?=substr($nametour,0,100,)?></a></td>
                    <td> <img src="../upload/<?=$load_bldm['hinhanh']?>" style="width:100px; height:100px;"></td>
                    <td><?=$soluong?></td>
                    <td>
                        <?php for($i=1;$i<=5;$i++){
                            if($rating<$i){ ?>
                                    <i class="fa fa-star" aria-hidden="true" style="color:#99a2aa"></i>
                                <?php }else{ ?>
                                    <i class="fa fa-star" aria-hidden="true" style="color:#ea9d02"></i> 
                        <?php }
                        } ?>
                    </td>
                    <td><a href="index.php?action=bltourchitiet&id_tour=<?php echo $load_bldm['id_tour']; ?>">Xem bình luận</a></td>
                    <td>  
                    <button type="button" id="none" data-id_tour_dm="<?=$load_bldm['id_tour'];?>" class="btn btn-secondary-one" data-toggle="modal" data-target="#modal-del">
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
               