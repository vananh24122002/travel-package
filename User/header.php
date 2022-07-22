 <!-- header -->
 <div class="header">
            <a href="index.php" title="Travel Package Home"><img src="img/logon.png"></a>
            <div class="header-left">
                <ul class=left>
                    <li id="li-border"><a href="index.php?view=searchbv"><i class="fa fa-search" aria-hidden="true"></i></a></li>
                    
                    <?php if(isset($_SESSION['username'])){ 
                        extract($_SESSION['username']);
                        if($_SESSION['username']['hinhAnh']==""){
                            $hinh ="<img id='logo-user' src=img/anhdz.jpg>";
                        }else{
                            $hinh = "<img  id='logo-user' src=upload/".$_SESSION['username']['hinhAnh'].">";
                        }
                    ?>
                       <li id="logo-hinh">
                           <a href="" class="hinhanh"><?=$hinh?></a>
                           <div class="item-hinh">
                           <ul id="item-hinh">
                               <h4>Tài khoản<h4>
                                <h5 class="username"><?=$username?></h5>
                               <li><a href="index.php?view=ttcanhan"><i class="fa fa-address-card" aria-hidden="true"></i> Hồ sơ của tôi</a></li>
                               <?php if($_SESSION['username']['role']==1 || $_SESSION['username']['role']==2){ ?>
                                <li><a href="Admin/index.php"><i class="fa fa-audio-description" aria-hidden="true"></i> Trang quản trị</a></li>
                                <?php  }else{} ?>
                               <li><a href=""><i class="fa fa-bell" aria-hidden="true"></i> Nhận thông báo</a></li>
                               <li><a href="index.php?view=mybill"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Đơn đặt tour </a></li>
                               <li><a href="User/TaiKhoan/dangxuat.php"><i class="fa fa-power-off" aria-hidden="true"></i> Đăng xuất</a></li>
                           </ul>
                         </div>

                       </li>
                    <?php }else{ ?>
                    <li id="li-border"><a href="user/taikhoan/dangki.php">THAM GIA NGAY</a></li>
                    <li><a href="user/taikhoan/dangnhap.php">ĐĂNG NHẬP</a></li>
                    <?php } ?>
                </ul>
            </div>
        </div>
        <script>
          // chuyendi
          $('a.hinhanh').click(function(){
          $('ul #item-hinh').toggleClass("show");
          });
          $('a.hinhanh').click(function(e){
            e.preventDefault();
          });
        </script>