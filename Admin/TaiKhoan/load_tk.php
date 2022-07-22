<?php
include("../../Modul/pdo.php");
include('../../Modul/taikhoan.php');
session_start();
$loadtk = loadall_taikhoan(); ?>
<thead>
                  <tr>
                    <th scope="col"></th>
                    <th scope="col">Mã TK</th>
                    <th scope="col">Tên đăng nhập</th>
                    <th scope="col">Tên đầy đủ</th>
                    <th scope="col">Hình ảnh</th>
                    <th scope="col">Email</th>
                    <th scope="col">Số điện thoại</th>
                    <th scope="col">Trạng thái</th>
                    <th scope="col">Chức vụ</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  foreach ($loadtk as $taikhoan) {
                    extract($taikhoan);
                    $hinhpath = "../upload/".$taikhoan['hinhAnh'];
                    if($taikhoan['hinhAnh']!=""){
                        $hinh = "<img src='".$hinhpath."' height='80' width='80'>";
                    }else{
                        $hinh = "no photo";
                    }
            
                    $suatk ="index.php?action=capnhattk&maTK=".$maTK;
                  ?> 
                  <tr>
                    <th><input type="checkbox"></th>
                    <td><?=$maTK?></td>
                    <td><?=$username?></td>
                    <td><?=$fullname?></td>
                    <td><?=$hinh ?></td>
                    <td><?=$email ?></td>
                    <td><?=$soDT ?></td>
                    <td><?php
                       if($kichHoat==1){
                        echo('Đang hoạt động');
                      }else{
                          echo'Chưa kích hoạt';
                      }
                    ?></td>
                    <td> <?php
                        if($role==1){
                          echo('Quản trị viên');
                        }else if($role==2){
                          echo('Admin');
                        }else{
                            echo'Thành viên';
                        }
                      ?></td>
                    <td>
                    <?php
                    echo'<a style="color:black" href="'.$suatk.'">';?><button id="none" type="button" value=""><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>
                     <?php if(($_SESSION['username']['maTK'])!=$taikhoan['maTK']){ ?>
                    <button type="button" id="none" data-id_tk="<?=$taikhoan['maTK'];?>" class="btn btn-secondary-one" data-toggle="modal" data-target="#modal-del">
                          <i class="fa fa-trash-o" aria-hidden="true"></i>
                    </button>
                    <!-- Modal -->
                      <div class="modal fade" id="modal-del" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h3 class="modal-title" id="exampleModalLongTitle">Bạn có muốn xóa tài khoản này không ?</h3>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-secondary-two">OK</button>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <!-- end modal -->
                    <?php }else{} ?>
                  </td>
                  </tr>
                  <?php } ?> 
                </tbody>
