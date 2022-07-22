<?php
include("../../../Modul/pdo.php");
include('../../../Modul/tintucdm.php');
$listdmtintuc = loadall_dmtintuc();
?>
 <?php
                  foreach ($listdmtintuc as $dmtintuc) {
                    extract($dmtintuc);  
                    $suatintucdm ="index.php?action=suatintucdm&id_DMTT=".$id_DMTT;
                   
                  ?>
                  <tr>
                    <th><input type="checkbox"></th>
                    <td><?=$id_DMTT ?></td>
                    <td><a href="../index.php?view=danhmuc1&id_DMTT=<?=$id_DMTT?>"><?=$nameDMTT ?></a></td>
                    <td><img src="../upload/<?=$dmtintuc['banner1']?>" style="width:100px; height:100px;"></td>
                    <td><img src="../upload/<?=$dmtintuc['banner2']?>" style="width:100px; height:100px;"></td>
                    <td style="width:40%"><?=$gioiThieu ?></td>
                    <td>
                    <?php
                    echo'<a href="'.$suatintucdm.'">' ;?><button id="none" type="button" value=""><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>
                    <button type="button" id="none" data-id_xoa="<?=$dmtintuc['id_DMTT'];?>" class="btn btn-secondary-one" data-toggle="modal" data-target="#modal-del">
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