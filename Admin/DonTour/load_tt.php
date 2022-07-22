<?php
include("../../Modul/pdo.php");
include('../../Modul/hoadondattour.php');
if(isset($_POST['id_hoadon_chi_tiet'])){
    $id_hoadon = $_POST['id_hoadon_chi_tiet'];
    $load_hoadon_chitiet = load_hoadon_chitiet($id_hoadon); 
    $endtime = strtotime ( '+'. $load_hoadon_chitiet['days'] .'day' , strtotime ( $load_hoadon_chitiet['time'] ) ) ;
    $endtime = date ( 'Y-m-j' , $endtime );
    ?>
                            
                                <div class="modal-header">
                                    <div class="modal-title" id="exampleModalLabel">
                                      <img src="../img/logon.png">
                                      <div class="title-header">Thông tin đơn đặt tour</div>
                                    </div>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <img src="../upload/<?=$load_hoadon_chitiet['banner']?>" style='width:50% ; height:12vw;'>
                                    <div class="infomation-body">
                                      <ul id="ul-control">
                                        <li><span id="bold-bold">Hành khách chính:</span> <?=$load_hoadon_chitiet['tenkh']?></li>
                                        <li><span id="bold-bold">Email:</span> <?=$load_hoadon_chitiet['email']?></li>
                                        <li><span id="bold-bold">Địa chỉ:</span> <?=$load_hoadon_chitiet['diachi']?></li>
                                        <li><span id="bold-bold">Số hành khách:</span> 0<?=$load_hoadon_chitiet['songuoi']?> người</li>
                                        <li><span id="bold-bold">Số ngày:</span> <?=$load_hoadon_chitiet['days']?> ngày <?=$load_hoadon_chitiet['days'] - 1?> đêm</li>
                                        <li><span id="bold-bold">Khách sạn:</span> Max So Hotel</li>
                                        <li><span id="bold-bold">Tổng tiền:</span> $<?=$load_hoadon_chitiet['tongtien']?></li>
                                        <li><span id="bold-bold">Sân bay:</span> Đồng Hới</li>
                                      </ul> 
                                    </div>
                                    <h4 id="title-body"><?=$load_hoadon_chitiet['nameTour']?></h4> 
                                    <span id="xuat-phat"><i class="fa fa-calendar-check-o" aria-hidden="true"></i> Khởi hành : <?=$load_hoadon_chitiet['time']?></span>
                                    <span style="margin-left:2vw"><i class="fa fa-long-arrow-down" aria-hidden="true"></i></span><br>
                                    <span><i class="fa fa-calendar-check-o" aria-hidden="true"></i> Kết thúc : <?=$endtime?></span>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">OK</button>
                                    </div>
                               
<?php } ?>