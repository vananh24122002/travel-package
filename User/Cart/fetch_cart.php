<?php
include("../../Modul/pdo.php");
include('../../Modul/taikhoan.php');
include("../../Modul/tourguide.php");
session_start();
if(isset($_SESSION['cart'])){
        $i = 0;
        $tongtien = 0;
        foreach ($_SESSION['cart'] as $cart_items) {
        $donGiaTreEm =($cart_items['donGia'] - ($cart_items['donGia']*0.3));
        if($cart_items['id_chuyendi']==1){
            $cart_items['treem'] = $cart_items['treem'];
        }else if($cart_items['id_chuyendi']==2){
            $cart_items['treem'] = 0;
        }else{
            $cart_items['treem'] = 0;
            $cart_items['nguoilon'] =2;

        }
        $endtime = strtotime ( '+'. $cart_items['days'] .'day' , strtotime ( $cart_items['time'] ) ) ;
        $endtime = date ( 'Y-m-j' , $endtime );
        $count = ($cart_items['nguoilon'] + $cart_items['treem']);
        $thanhtien =  ($cart_items['nguoilon']* $cart_items['donGia'] +  $cart_items['treem']*$donGiaTreEm);
    if(isset($_SESSION['username'])){
        $giamgia = ($thanhtien*0.05);
    }else{
        $giamgia = ($thanhtien*0);
    }
       $tongtien += ($thanhtien - $giamgia);
       $tuongduong = $tongtien * 22.710;
    
?>
<!-- khởi tạo giỏ -->
        <div class="nav-cart">
            <h1>Thông tin chuyến đi</h1>
            <input type="hidden" name="idtour" id="idtour" value=<?=$cart_items['id_Tour']?>>
        </div>
            <div class="load-cart">
                <img src="../../upload/<?=$cart_items['banner']?>">
                <div class="content-load-cart">
                    <h2><?=$cart_items['nameTour']?></h2>
                     <ul>
                         <li>Ngày khởi hành: <?=$cart_items['time']?></li>
                         <li>Thời gian : <?=$cart_items['days']?> ngày</li>
                         <li>Khởi hành từ San José, Costa Rica</li>
                         <li>Ghế còn nhận: 6</li>
                         <li>Giá / Người : <?php echo'$'. number_format($cart_items['donGia']) . '<br>'; ?></li>
                     </ul>
                </div>
            </div>
        <div class="main-cart">
            <div class="article-cart">
            <!-- Những gì bạn cần -->
            <div class="nhung-gi-ban-can">
                <span id="nhung-gi-ban-can-span">Những gì bạn có thể cần</span> Có những tiện dụng này để đặt tour du lịch của bạn trong 5 phút hoặc ít hơn
                <span id="nhung-gi-ban-can-ul">
                    <ul>
                        <li> <span id="dk1">1</span> Thông tin hộ chiếu cho tất cả khách du lịch</li>
                        <li> <span id="dk1">2</span> Thẻ tín dụng</li>
                    </ul>
                </span>
            </div>

            <!-- Ai đang đi du lịch -->
            <div class="ai-dang-di-du-lich">
                <h3>Ai đang đi du lịch ?</h3>
                <span id="dang-nhap-duoc-giam-gia">Đăng nhập để được giảm 5% đơn giá ?
                <form>
                <button type="button" id="none" data-id_tour_dm="<?=$load_bldm['id_tour'];?>" class="btn btn-secondary-one" data-toggle="modal" data-target="#modal-login">
                     Đăng nhập
                </button>
                    <!-- Modal -->
                      <div class="modal fade" id="modal-login" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered" role="document" >
                                <div class="modal-content" style="border-radius: 0;background-color:gold">
                                
                                  <div class="modal-header">
                                    <img src="../../img/logon.png">
                                  </div>

                                  <div class="modal-body">
                                            <div class="form-modal">
                                                <span id="icon"><i class="fa fa-user" aria-hidden="true"></i></span>
                                                <input type="text"  id="username_login" name="username_login" class="form-control"  placeholder="Tên đăng nhập">
                                                <p></p>
                                                <small id="error-username_login" class="form-error"></small>
                                            </div>
                                            <div class="form-modal">
                                                <span id="icon"><i class="fa fa-unlock" aria-hidden="true"></i></span>
                                                <input type="password" class="form-control" name="password" id="password" placeholder="Mật khẩu">
                                                <p></p>
                                                <small id="error-password" class="form-error"></small>
                                            </div>
                                  </div>

                                  <div class="modal-footer">
                                    <button type="button" class="btn-secondary" data-dismiss="modal">Close</button>
                                    <input type="button" class="btn-secondary-two" id="dangnhap" value="Đăng nhập" name="dangnhap"><br>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <!-- end modal -->
                            </form>
                </span>

            <?php if($cart_items['id_chuyendi']==1){?>
                <div class="soluong">
                    <div class="col-md-6">
                        <ul class="so-luong-flex">
                            <li id="li-cong"><a href="" data-id_cart_cong=<?=$cart_items['id_Tour']?> id="cong_so_nguoi"><i class="fa fa-plus" aria-hidden="true"></i></a></li>
                            <li><?=$cart_items['nguoilon']?></li>
                            <li id="li-tru"><a href="" data-id_cart_tru=<?=$cart_items['id_Tour']?> id="tru_so_nguoi"><i class="fa fa-minus" aria-hidden="true"></i></a></li>
                            <li id="li-nguoi">người lớn (từ 13 tuổi trở lên)</li>
                        </ul>
                   </div>
                   <div class="col-md-6">
                    <ul class="so-luong-flex">
                        <li id="li-cong"><a href="" data-id_cart_cong_tre_em=<?=$cart_items['id_Tour']?> id="cong_so_tre_em"><i class="fa fa-plus" aria-hidden="true"></i></a></li>
                        <li><?=$cart_items['treem']?></li>
                        <li id="li-tru"><a href="" data-id_cart_tru_tre_em=<?=$cart_items['id_Tour']?> id="tru_so_tre_em"><i class="fa fa-minus" aria-hidden="true"></i></a></li>
                        <li id="li-nguoi">trẻ em (từ 7-12 tuổi)</li>
                    </ul>
               </div>
            <?php }else if($cart_items['id_chuyendi']==2){?>
                <div class="soluong">
                    <div class="col-md-6">
                        <ul class="so-luong-flex">
                            <li id="li-cong"><a href="" data-id_cart_cong=<?=$cart_items['id_Tour']?> id="cong_so_nguoi"></a></li>
                            <li><?=$cart_items['nguoilon']?></li>
                            <li id="li-tru"><a href="" data-id_cart_tru=<?=$cart_items['id_Tour']?> id="tru_so_nguoi"></a></li>
                            <li id="li-nguoi">người lớn (từ 13 tuổi trở lên)</li>
                        </ul>
                   </div>
                   <div class="col-md-6">
                    <ul class="so-luong-flex">
                        <li id="li-cong"><a href="" data-id_cart_cong_tre_em=<?=$cart_items['id_Tour']?> id="cong_so_tre_em"></a></li>
                        <li><?=$cart_items['treem']-$cart_items['treem']?></li>
                        <li id="li-tru"><a href="" data-id_cart_tru_tre_em=<?=$cart_items['id_Tour']?> id="tru_so_tre_em"></a></li>
                        <li id="li-nguoi">trẻ em (từ 7-12 tuổi)</li>
                    </ul>
               </div>
            <?php }else{?>
                <div class="soluong">
                    <div class="col-md-6">
                        <ul class="so-luong-flex">
                            <li id="li-cong"><a href="" data-id_cart_cong=<?=$cart_items['id_Tour']?> id="cong_so_nguoi"></a></li>
                            <li><?=$cart_items['nguoilon']?></li>
                            <li id="li-tru"><a href="" data-id_cart_tru=<?=$cart_items['id_Tour']?> id="tru_so_nguoi"></a></li>
                            <li id="li-nguoi">người lớn (từ 13 tuổi trở lên)</li>
                        </ul>
                   </div>
                   <div class="col-md-6">
                    <ul class="so-luong-flex">
                        <li id="li-cong"><a href="" data-id_cart_cong_tre_em=<?=$cart_items['id_Tour']?> id="cong_so_tre_em"></a></li>
                        <li><?=$cart_items['treem']-$cart_items['treem']?></li>
                        <li id="li-tru"><a href="" data-id_cart_tru_tre_em=<?=$cart_items['id_Tour']?> id="tru_so_tre_em"></a></li>
                        <li id="li-nguoi">trẻ em (từ 7-12 tuổi)</li>
                    </ul>
               </div>
            <?php } ?>
                </div>
                <!-- chú thích số lượng người  -->
               <div class="chu-thich-so-luong">
                <span id="chu-thich-so-luong"><i class="fa fa-exclamation-circle" aria-hidden="true"></i> Tour du lịch được chọn của bạn đòi hỏi ít nhất một khách du lịch gia đình trong nhóm của bạn phải có một đứa trẻ.</span>
               </div> 
               <!-- Thông tin khách du lịch chính đặt tour -->
               <div class="thong-tin-khach-du-lich">
                   <h2>Thông tin khách du lịch chính</h2>
                   <span style="color:red">*</span> Chỉ các trường bắt buộc
                   <div id="border-no-name"></div>
                     <div class="info-cart">
                         <!-- kiểm tra xem có tài khoản không -> nếu có -> thì lấy dữ liệu bỏ vào -->
                        <?php if(isset($_SESSION['username'])){ 
                            extract($_SESSION['username']);
                        ?>
                            <input type="hidden" id="id_kh" name="id_kh" value="<?=$_SESSION['username']['maTK']?>">
                            <div class="col-md-6 ">
                                <div class="form-info">
                                <input type="text" id="fullname" name="fullname" value="<?=$_SESSION['username']['fullname']?>" class="form-control" placeholder="Tên * " />
                                <small id="error-fullname" class="form-error" ></small>
                                <p id="chu-thich-form">Sao chép chính xác như được in trong Hộ chiếu</p>
                                </div>
                            </div>

                            <div class="col-md-6 ">
                                <div class="form-info">
                                <input type="text" id="email" name="email" value="<?=$_SESSION['username']['email']?>" class="form-control" placeholder="Email * " />
                                <small id="error-email" class="form-error" ></small>
                                <p id="chu-thich-form">Sao chép chính xác như được in trong Hộ chiếu</p>
                                </div>
                            </div>

                            <div class="col-md-6 ">
                                <div class="form-info">
                                <input type="text" id="sodt" name="sodt" value="<?=$_SESSION['username']['soDT']?>" class="form-control" placeholder="Số điện thoại * " />
                                <small id="error-sodt" class="form-error" ></small>
                                <p id="chu-thich-form">Sao chép chính xác như được in trong Hộ chiếu</p>
                                </div>
                            </div>

                            <div class="mb-4 ">
                                <div class="form-info" id="margin-left-2vw">
                                       <input type="text" id="diachi" name="diachi" value="<?=$_SESSION['username']['diaChi']?>" class="form-control" placeholder="Địa chỉ *"/>
                                       <small id="error-diachi" class="form-error" ></small>
                                       <p id="chu-thich-form">Nhập chính xác địa chỉ của bạn </p>
                                     </div>
                            </div>
                        <!-- ngược lại . Nếu có dữ liệu -> thì bắt nhập và kiểm lỗi.. -->
                        <?php }else{ ?>
                            <input type="hidden" id="id_kh" name="id_kh" value="0">
                            <div class="col-md-6 ">
                                <div class="form-info">
                                <input type="text" id="fullname" name="fullname" class="form-control" placeholder="Tên * " />
                                <small id="error-fullname" class="form-error" ></small>
                                <p id="chu-thich-form">Sao chép chính xác như được in trong Hộ chiếu</p>
                                </div>
                            </div>

                            <div class="col-md-6 ">
                                <div class="form-info">
                                <input type="text" id="email" name="email" class="form-control" placeholder="Email * " />
                                <small id="error-email" class="form-error" ></small>
                                <p id="chu-thich-form">Sao chép chính xác như được in trong Hộ chiếu</p>
                                </div>
                            </div>

                            <div class="col-md-6 ">
                                <div class="form-info">
                                <input type="text" id="sodt" name="sodt" class="form-control" placeholder="Số điện thoại * " />
                                <small id="error-sodt" class="form-error" ></small>
                                <p id="chu-thich-form">Sao chép chính xác như được in trong Hộ chiếu</p>
                                </div>
                            </div>

                            <div class="mb-4 ">
                                <div class="form-info" id="margin-left-2vw">
                                       <input type="text" id="diachi" name="diachi" class="form-control" placeholder="Địa chỉ *"/>
                                       <small id="error-diachi" class="form-error" ></small>
                                       <p id="chu-thich-form">Nhập chính xác địa chỉ của bạn </p>
                                     </div>
                            </div>
                        <?php } ?>
                        <!-- end - nhập thông tin -->
                            <div class="mb-4 ">
                                <div class="form-info" id="margin-left-2vw">
                                       <input type="checkbox" name="checkbox1" id="checkbox1" class="checkbox1" name="checkbox1">
                                       <label for="checkbox1">Đồng ý với điều khoản</label><br>
                                      
                                       Bằng cách kiểm tra hộp này, tôi đồng ý với <span style="border-bottom:2px solid gold ">Điều khoản sử dụng</span> và thừa nhận rằng tôi đã đọc Chính sách bảo mật và nếu có, thông báo Quyền riêng tư california <span style="border-bottom:2px solid gold ">của bạn</span>. Bằng cách đặt chuyến đi này, tôi hiểu rằng Travel Package có thể cung cấp tất cả thông tin cá nhân của khách du lịch cho bất kỳ hãng vận chuyển, khách sạn, nhà điều hành mặt đất, nhà hàng hoặc các nhà cung cấp dịch vụ khác được kết nối với chuyến đi, để sử dụng độc lập của họ để thực hiện đặt phòng. Tôi cũng đồng ý liên lạc với Travel Package và các công ty lữ hành của nó qua điện thoại liên quan đến đặt phòng của tôi. *
                                       <small id="error-checkbox1" class="form-error" ></small>
                                </div>

                            </div>

                            <div class="mb-4 ">
                                <div class="form-info" id="margin-left-2vw">
                                    <span style="font-weight:500">Hình thức thanh toán</span><br><br>
                                    <div class="thanh-toan">
                                        <input type="radio" id="banking" name="banking" value="Tiền mặt"  checked="checked"><span id="icon-banking"><i class="fa fa-money" aria-hidden="true"></i></span> Tiền mặt<br>
                                    </div>
                                    <div class="thanh-toan">
                                        <input type="radio" id="banking" name="banking" value="Chuyển khoản"><span id="icon-banking"><i class="fa fa-university" aria-hidden="true"></i></span> Chuyển khoản<br>
                                    </div>
                                    <div class="thanh-toan">    
                                        <input type="radio" id="banking" name="banking" value="ATM / Internet Banking"><span id="icon-banking"><i class="fa fa-trademark" aria-hidden="true"></i></span>  ATM / Internet Banking<br>
                                    </div> 
                                    <div class="thanh-toan">    
                                        <input type="radio" id="banking" name="banking" value="Thanh toán bằng mã QRCode"><span id="icon-banking"><i class="fa fa-qrcode" aria-hidden="true"></i></span>  Thanh toán bằng mã QRCode<br>
                                    </div> 
                                        <small id="error-banking" class="form-error" ></small>
                                   
                                </div>
                            </div>
                    </div>
               </div>
        </div>
    </div>
        <!-- sider-bar -->
        <div class="sider-bar-cart">
            <h2>Tóm tắt chuyến đi</h2>
            <h4>Tour trọn gói (<?=$count?> khách )</h4>
            <input type="hidden" name="songuoi" id="songuoi" value=<?=$count?>>
            <img src="../../upload/<?=$cart_items['banner']?>">
            <div id="title-cart-sider-bar"><?=$cart_items['nameTour']?></div><br>
            <div id="ngay-khoi-hanh"><span style="padding: 0 1vw"><i class="fa fa-calendar-o" aria-hidden="true"></i></span> Ngày khởi hành: <span style="font-weight:500"><?=$cart_items['time']?></span></div>
            <div id="ngay-khoi-hanh"><span style="padding: 0 1vw"><i class="fa fa-calendar-o" aria-hidden="true"></i></span> Ngày kết thúc: <span style="font-weight:500"><?=$endtime?></span></div>
            <div class="thong-ke">
                <ul id="thong-ke-ten">
                    <li>Người lớn</li>
                    <li>Trẻ em</li>
                    <li>Tạm tính</li>
                    <li>Giảm giá</li>
                </ul>

                <ul id="thong-ke-so-lieu">
                    <li><?=$cart_items['nguoilon']?> x <?php echo'$ '. number_format($cart_items['donGia']) . '<br>'; ?></li>
                    <li><?=$cart_items['treem']?> x <?php echo '$ '. number_format($donGiaTreEm) . '<br>'; ?></li>
                    <li><?php echo '$ '. number_format($thanhtien) . '<br>'; ?></li>
                    <li><?php echo '$ '. number_format($giamgia) . '<br>'; ?></li>
                </ul>
            </div>

            <div class="tong-cong">
                <ul id="tong-cong-ten">
                     <li style="font-size:1.4vw;">TỔNG : </li>
                </ul>

                <ul id="tong-cong-so-lieu">
                    <li style="font-size:1.5vw; color:red;"> <?php echo '$ '. number_format($tongtien) . ''; ?></li>
                    <input type="hidden" id="tongtien" name="tongtien" value="<?=$tongtien?>">
                    <li style="font-size:1.4vw; color:red;"><i class="fa fa-exchange" aria-hidden="true"></i> <?php echo number_format($tuongduong) . '.000 VND'; ?></li><br>
               </ul>
            </div>
            <input type="submit" value="ĐẶT NGAY">
        </div>
<?php } ?>
<?php } ?>
