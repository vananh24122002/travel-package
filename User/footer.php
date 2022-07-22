<div class="footer">
            <img class="logo-footer" src="img/logon.png">
            <div class="title-footer">
            <div class="menu-footer">
                <ul>
                    <h4>Tạp chí và hơn thế nữa</h4>
                    <?php foreach ($dmtintuc as $dmtt) {
                        extract($dmtt);
                        $linkdmtt = "index.php?view=danhmuc1&id_DMTT=".$id_DMTT;
                    ?>
                    <li><a href="<?=$linkdmtt?>"><?=$nameDMTT?></a></li>
                    <?php } ?>
                </ul>
            </div>

            <div class="menu-footer" id="t1">
                <ul>
                    <h4>Tìm hiểu thêm</h4>
                    <li><a href="">Đặt mua</a></li>
                    <li><a href="">Liên hệ với chúng tôi</a></li>
                    <li><a href="">Quảng cáo</a></li>
                    <li><a href="">Giấy phép nội dung</a></li>
                </ul>
            </div>

            <div class="menu-footer" id="t2">
                <ul>
                    <h4>Liên kết</h4>
                    <li>Theo chúng tôi</li>
                    <li  class="iconfooter">
                        <a href=""><i class="fa fa-facebook-official" aria-hidden="true"></i></a>
                        <a href=""><i class="fa fa-pinterest-p" aria-hidden="true"></i></a>
                        <a href=""><i class="fa fa-twitter" aria-hidden="true"></i></a>
                        <a href=""><i class="fa fa-instagram" aria-hidden="true"></i></a>
                    </li>
                    <li><i class="fa fa-map-marker" aria-hidden="true"></i> Địa chỉ: 137 Nguyễn Thị Thập , Hòa Minh, Liên Chiêu , Đà Nẵng</li>
                    <li id="no-load"><i class="fa fa-envelope-o" aria-hidden="true"></i> Email: anhhvpd05219@fpt.edu.vn </li>
                    <li> <i class="fa fa-phone" aria-hidden="true"></i> Hotline: 0815 116 773</li>
                    <li> Đăng kí nhận ưu đãi</li>
                    <li class="dangkifooter"><a href="User/TaiKhoan/dangki.php">Đăng kí</a></li>
                </ul>
            </div>
            </div>
            <div class="coppyright">
                Bản quyền © 1996-2015 Bản quyền xã hội địa lý quốc gia © 2015-2021 National Geographic Partners, LLC. Thiết kế bởi anhhvpd05219.</div>
        </div>