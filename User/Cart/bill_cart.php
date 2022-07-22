<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<style>
.bill{
    width:80%;
    margin-left:9vw;
    margin-top:3vw;
    padding-top:2vw;
}
.header-bill svg{
    float:left;
    margin-top:1vw;
}
.header-bill h3{
    padding-left:6vw;
    font-size:1.6vw;
    font-weight:500;
}
.header-bill h4{
    padding-left:6vw;
    font-size:1vw;
    font-weight:400;
    padding-top:1vw;
}
.main-bill{
    margin-top:2vw;
    width:100%;
    padding:1.5vw;
}
.title-main-bill img{
    width:40%;
    height:12vw;
}
.table-color{
    background-color:#f1f5f9;
}
thead{
    border-bottom:1px solid black;
}
span#font-bold{
    font-weight:700;
}
</style>
<?php
    require ('Modul/send_mail.php');
   if(isset($_SESSION['radom'])){
       $radom = $_SESSION['radom'];
    $sql = "SELECT * FROM hoadondattour , tour WHERE hoadondattour.idtour = tour.id_Tour AND radom = ?";
    $list_radom = pdo_query_one($sql,$radom);
    $tongcong = ($list_radom['songuoi']*$list_radom['donGia']);
    $giamgia = ($tongcong - $list_radom['tongtien']); 
    $tieude = " Đặt tour thành công !";
    $noidung = '<div class="bill">
    <div class="header-bill">
        <svg xmlns="http://www.w3.org/2000/svg" width="72px" height="72px">
            <g fill="none" stroke="#8EC343" stroke-width="2">
            <circle cx="36" cy="36" r="35" style="stroke-dasharray:240px, 240px; stroke-dashoffset: 480px;"></circle>
            <path d="M17.417,37.778l9.93,9.909l25.444-25.393" style="stroke-dasharray:50px, 50px; stroke-dashoffset: 0px;"></path>
            </g>
        </svg>
        <h3 id="title-tour">Đặt Tour thành công</h3>
        <h4>Một email xác nhận đã được gửi tới email '.$list_radom['email'].'<br>
        Xin hãy kiểm tra email của bạn </h4>
    </div>
    <div class="main-bill">
        <table class="table table-bordered">
            <thead class="table-color">
                <tr>
                <th scope="col">Thông tin tour</th>
                <th scope="col">Thông tin người đặt</th>
                </tr>
            </thead>
            <tbody>
                <tr>

                <td><span id="font-bold">Mã đặt tour:</span> '.$list_radom['radom'].'<br>
                <span id="font-bold">Ngày đặt:</span> '.$list_radom['time_dat'].'<br>
                <span id="font-bold">Phương thức thanh toán:</span> '.$list_radom['htthanhtoan'].'<br>
                </td>
                <td>
                <span id="font-bold">Tên khách đặt:</span> '.$list_radom['tenkh'].'<br>
                <span id="font-bold">Email :</span> '.$list_radom['email'].'<br>
                <span id="font-bold">Số điện thoại:</span> '.$list_radom['sodt'].'<br>
                <span id="font-bold">Địa chỉ:</span> '.$list_radom['diachi'].'<br>
                <span id="font-bold">Tình trạng:</span> chờ xác nhận
                </td>
                </tr>
            </tbody>
        </table>
        <br>
        <table class="table table-bordered">
            <thead class="table-color"> 
                <tr>
                <th scope="col">Hướng dẫn:</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        Bạn chờ xác nhận và có thể hủy đơn trong 7 ngày kể từ lúc đặt <br>                
                    </td>
                </tr>
            </tbody>
        </table>
        <br>
        <table class="table table-bordered">
            <thead class="table-color">
                <tr>
                <th scope="col" >Tour</th>
                <th scope="col" style="text-align:center;">Số người</th>
                <th scope="col"  style="text-align:right;">Đơn giá</th>
                <th scope="col" style="text-align:right;">Tổng cộng</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                <td>Châu Phi bằng máy bay riêng<br>
                   <div style="padding-left:1vw;">
                        - Vé: '.$list_radom['songuoi'].' người<br>
                        - '.$list_radom['days'].' ngày '.($list_radom['days'] - 1).' đêm<br> 
                        - Người khởi hành : '.$list_radom['time'].'<br>
                   </div>
                </td>
                <td style="text-align:center;">0'.$list_radom['songuoi'].'<br>
                </td>
                <td style="text-align:right;">$'. number_format($list_radom['donGia']) . '</td>
                <td style="text-align:right;">$'. number_format($tongcong) .'</td>
                </tr>
                <tr>
                    <td colspan="4" style="text-align:right;"><span id="font-bold">Giảm giá</span></td>
                    <td style="text-align:right;">$'. number_format($giamgia) . '</td>
                </tr>
                <tr>
                    <td colspan="4" style="text-align:right;"><span id="font-bold">Thành tiền</span></td>
                    <td style="text-align:right;">$ '. number_format($list_radom['tongtien']).'</td>
                </tr>
                <tr>
                    <td colspan="4" style="text-align:right;"><span id="font-bold">Điểm thưởng::()</span></td>
                    <td style="text-align:right;">$ 0</td>
                </tr>
                <tr>
                    <td colspan="4" style="text-align:right;"><span id="font-bold">Tổng tiền</span></td>
                    <td style="text-align:right;">$ '. number_format($list_radom['tongtien']).'</td>
                </tr>
            </tbody>
        </table>

    </div>
</div>';
    $tenkh = $list_radom['tenkh'];
    $email = $list_radom['email'];
    $camon = '<div class="bill">
    <div class="header-bill">
        <svg xmlns="http://www.w3.org/2000/svg" width="72px" height="72px">
            <g fill="none" stroke="#8EC343" stroke-width="2">
            <circle cx="36" cy="36" r="35" style="stroke-dasharray:240px, 240px; stroke-dashoffset: 480px;"></circle>
            <path d="M17.417,37.778l9.93,9.909l25.444-25.393" style="stroke-dasharray:50px, 50px; stroke-dashoffset: 0px;"></path>
            </g>
        </svg>
        <h3 id="title-tour">Đặt Tour thành công</h3>
        <h4>Một email xác nhận đã được gửi tới email '.$list_radom['email'].'<br>
        Xin hãy kiểm tra email của bạn </h4>
    </div>
    <div class="main-bill">
        <table class="table table-bordered">
            <thead class="table-color">
                <tr>
                <th scope="col">Thông tin tour</th>
                <th scope="col">Thông tin người đặt</th>
                </tr>
            </thead>
            <tbody>
                <tr>

                <td><span id="font-bold">Mã đặt tour:</span> '.$list_radom['radom'].'<br>
                <span id="font-bold">Ngày đặt:</span> '.$list_radom['time_dat'].'<br>
                <span id="font-bold">Phương thức thanh toán:</span> '.$list_radom['htthanhtoan'].'<br>
                </td>
                <td>
                <span id="font-bold">Tên khách đặt:</span> '.$list_radom['tenkh'].'<br>
                <span id="font-bold">Email :</span> '.$list_radom['email'].'<br>
                <span id="font-bold">Số điện thoại:</span> '.$list_radom['sodt'].'<br>
                <span id="font-bold">Địa chỉ:</span> '.$list_radom['diachi'].'<br>
                <span id="font-bold">Tình trạng:</span> chờ xác nhận
                </td>
                </tr>
            </tbody>
        </table>
        <br>
        <table class="table table-bordered">
            <thead class="table-color"> 
                <tr>
                <th scope="col">Hướng dẫn:</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        Bạn chờ xác nhận và có thể hủy đơn trong 7 ngày kể từ lúc đặt <br>                
                    </td>
                </tr>
            </tbody>
        </table>
        <br>
        <table class="table table-bordered">
            <thead class="table-color">
                <tr>
                <th scope="col" >Tour</th>
                <th scope="col">Hình minh họa</th>
                <th scope="col" style="text-align:center;">Số người</th>
                <th scope="col"  style="text-align:right;">Đơn giá</th>
                <th scope="col" style="text-align:right;">Tổng cộng</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                <td>Châu Phi bằng máy bay riêng<br>
                   <div style="padding-left:1vw;">
                        - Vé: '.$list_radom['songuoi'].' người<br>
                        - '.$list_radom['days'].' ngày '.($list_radom['time_dat'] - 1).' đêm<br> 
                        - Người khởi hành : '.$list_radom['time'].'<br>
                   </div>
                </td>
                <td>
                    <img src="upload/'.$list_radom['banner'].'" style="width:120px;height:90px;margin-left:1vw;">
                </td>
                <td style="text-align:center;">0'.$list_radom['songuoi'].'<br>
                </td>
                <td style="text-align:right;">$'. number_format($list_radom['donGia']) . '</td>
                <td style="text-align:right;">$'. number_format($tongcong) .'</td>
                </tr>
                <tr>
                    <td colspan="4" style="text-align:right;"><span id="font-bold">Giảm giá</span></td>
                    <td style="text-align:right;">$'. number_format($giamgia) . ' </td>
                </tr>
                <tr>
                    <td colspan="4" style="text-align:right;"><span id="font-bold">Thành tiền</span></td>
                    <td style="text-align:right;">$ '. number_format($list_radom['tongtien']).'</td>
                </tr>
                <tr>
                    <td colspan="4" style="text-align:right;"><span id="font-bold">Điểm thưởng::()</span></td>
                    <td style="text-align:right;">$ 0</td>
                </tr>
                <tr>
                    <td colspan="4" style="text-align:right;"><span id="font-bold">Tổng tiền</span></td>
                    <td style="text-align:right;">$ '. number_format($list_radom['tongtien']).'</td>
                </tr>
            </tbody>
        </table>

    </div>
</div>';
    $mail = new Mailer;
    $mail -> Mail_bill($tieude,$noidung,$tenkh,$email,$camon);
   }
?>
