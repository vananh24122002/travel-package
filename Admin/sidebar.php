<div class="sidebar">
   <?php
     extract($_SESSION['username']);
     if($_SESSION['username']['hinhAnh']==""){
        $hinhbanner ="<img id='img' src=img/anhdz.jpg>";
    }else{
        $hinhbanner = "<img  id='img' src=../upload/".$_SESSION['username']['hinhAnh'].">";
    }
     ?>
            <?=$hinhbanner?><br><br>
            <h2><?php if($_SESSION['username']['role']==0){
                            echo'Thành viên';
                        }else if($_SESSION['username']['role']==2){
                            echo'Admin';
                        }else{
                            echo'Quản trị viên';
                        
            }?></h2>
            <ul>
                <li><a href="index.php?action=main.php">
                        <span class="icon"><i class="fa fa-home" aria-hidden="true"></i></span>
                        <span class="text">Home</span>    
                    </a>
                </li>
                <li><a href="#" class="dd-dm">
                        <span class="icon"><i class="fa fa-bars" aria-hidden="true"></i></span>
                        <span class="text">Tin tức</span> 
                        <span class="icon-r"><i class="fa fa-angle-down" aria-hidden="true"></i></span>
                    </a>
                    <div class="dd-menu">
                        <ul>
                            <li>
                                <a href="index.php?action=listtintucdm"  class="dd_menu_a">
                                    <span class="icon">
                                    <i class="far fa-futbol" aria-hidden="true"></i>
                                    </span>
                                    <span class="text">Danh mục bài viết</span>
                                </a>
                            </li>
                            <li>
                                <a href="index.php?action=listtintucbv"  class="dd_menu_a">  
                                    <span class="icon">
                                    <i class="fas fa-swimmer" aria-hidden="true"></i>
                                    </span>
                                    <span class="text">Bài viết</span>  
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li><a href="#" class="dd-dm1">                   
                        <span class="icon"><i class="fa fa-bars" aria-hidden="true"></i></span>
                        <span class="text"> Tour</span>
                        <span class="icon-r1"><i class="fa fa-angle-down" aria-hidden="true"></i></span>    
                    </a>
                    <div class="dd-menu1">
                        <ul>
                            <li>
                                <a href="index.php?action=listtourdm"  class="dd_menu_a">
                                    <span class="icon">
                                    <i class="far fa-futbol" aria-hidden="true"></i>
                                    </span>
                                    <span class="text">Danh mục tour</span>
                                </a>
                            </li>
                            <li>
                                <a href="index.php?action=listtour"  class="dd_menu_a"> 
                                    <span class="icon">
                                    <i class="fas fa-swimmer" aria-hidden="true"></i>
                                    </span>
                                    <span class="text">Tour</span> 
                                </a>
                            </li>
                            <li>
                                <a href="index.php?action=listdays"  class="dd_menu_a">   
                                    <span class="icon">
                                    <i class="fas fa-swimmer" aria-hidden="true"></i>
                                    </span>
                                    <span class="text">Days</span>  
                                </a>
                            </li>
                            <li>
                                <a href="index.php?action=listtitleday"  class="dd_menu_a">
                                    <span class="icon">
                                    <i class="fas fa-swimmer" aria-hidden="true"></i>
                                    </span>
                                    <span class="text">Title Day</span>
                                </a>
                            </li>
                            <li>
                                <a href="index.php?action=listimage"  class="dd_menu_a">
                                    <span class="icon">
                                    <i class="fas fa-swimmer" aria-hidden="true"></i>
                                    </span>
                                    <span class="text">Image</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li><a href="index.php?action=listtk">
                    <span class="icon"><i class="fa fa-user" aria-hidden="true"></i></span>
                    <span class="text"> Tài khoản</span>
                    </a></li> 
                <li><a href="index.php?action=listqc">
                    <span class="icon"><i class="fa fa-gift" aria-hidden="true"></i></span>
                    <span class="text"> Quảng cáo</span>
                    </a></li> 
                <li><a href="" class="dd-dm2"> 
                    <span class="icon"><i class="fa fa-comment-o" aria-hidden="true"></i></span>
                    <span class="text">Bình luận</span>
                    <span class="icon-r2"><i class="fa fa-angle-down" aria-hidden="true"></i></span>
                    </a>
                    <div class="dd-menu2">
                        <ul>
                            <li>
                                <a href="index.php?action=listblnews"  class="dd_menu_a">
                                    <span class="text">Bình luận tin tức</span>
                                </a>
                            </li>
                            <li>
                                <a href="index.php?action=listbltour"  class="dd_menu_a">  
                                    <span class="text">Bình luận tour</span>  
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li><a href="index.php?action=listbooktour"> 
                    <span class="icon"><i class="fa fa-shopping-cart" aria-hidden="true"></i></span>
                    <span class="text">Đơn đặt tour</span>
                </a></li>
                <li><a href="">
                    <span class="icon"><i class="fa fa-clock-o" aria-hidden="true"></i></span>
                    <span class="text"> Thống kê</span>
                    </a></li>
            </ul>
        </div>
        <script>
          $('ul li').click(function(){
          $(this).addClass("active").siblings().removeClass("active");
         })
         //tintuc
         $('a.dd-dm').click(function(){
          $('.dd-menu').toggleClass("show");
          $('.icon-r').toggleClass("rotate");
          });
          $('a.dd-dm').click(function(e){
            e.preventDefault();
          });
          //tour
          $('a.dd-dm1').click(function(){
          $('.dd-menu1').toggleClass("show");
          $('.icon-r1').toggleClass("rotate");
          });
          $('a.dd-dm1').click(function(e){
            e.preventDefault();
          });
          //binhluan
          $('a.dd-dm2').click(function(){
          $('.dd-menu2').toggleClass("show");
          $('.icon-r2').toggleClass("rotate");
          });
          $('a.dd-dm2').click(function(e){
            e.preventDefault();
          });
      
     
      </script>