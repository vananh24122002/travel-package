<div class="nav">
    <a href="index.php?action=main.php"><img src="../img/logon.png" id="logo"></a>
            <div class="icon-nav">
                <a href="#" class="dd-a">
                    <div class="wrap1">
                        <span class="icon"><i class="fa fa-user-circle" aria-hidden="true"></i></span></div>
                    </a>
                    <div class="dd-menu-nav">
                        <ul>
                            <li>
                                <a href="#"  class="dd_menu_a">
                                    <div class="wrap">
                                    <span class="icon">
                                        <i class="fa fa-home" aria-hidden="true"></i></i>
                                    </span>
                                    <span class="text"><a href="../index.php">Trang chủ</a></span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#"  class="dd_menu_a">
                                    <div class="wrap">
                                    <span class="icon">
                                        <i class="fa fa-sign-out" aria-hidden="true"></i>
                                    </span>
                                    <span class="text"><a href="../User/TaiKhoan/dangxuat.php">Thoát</a></span>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div> 
                </div> 
            </div>
        <script>
            
         $('a.dd-a').click(function(){
          $('.dd-menu-nav').toggleClass("show");
          });
          $('a.dd-a').click(function(e){
            e.preventDefault();
          });
        </script>