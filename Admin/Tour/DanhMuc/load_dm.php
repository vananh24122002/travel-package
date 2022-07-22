<?php
include("../../../Modul/pdo.php");
include('../../../Modul/tourdm.php');
$tourdm=loadall_tourdm();
?>
 <?php
                  foreach ($tourdm as $tour) {
                    extract($tour);
    
                    $suatourdm ="index.php?action=suatourdm&id_DMTour=".$id_DMTour;
                  ?>
                  <tr>
                    <th><input type="checkbox"></th>
                    <td><?=$id_DMTour ?></td>
                    <td><?=$nameDMTour ?></td>
                    <?php echo"<td>".substr($tour['gioiThieu'], 0 ,170,)."... </td>"; 
                   ?>
                    <td>
                    <?php
                    echo'<a href="'.$suatourdm.'">' ;?><button id="none" type="button" value=""><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>
                     <button type="button" id="none" data-id_xoa="<?=$tour['id_DMTour'];?>" class="btn btn-secondary-one" data-toggle="modal" data-target="#modal-del">
                          <i class="fa fa-trash-o" aria-hidden="true"></i>
                    </button>
                    <!-- Modal -->
                      <div class="modal fade" id="modal-del" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h3 class="modal-title" id="exampleModalLongTitle">Bạn có muốn xóa danh mục này không?</h3>
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