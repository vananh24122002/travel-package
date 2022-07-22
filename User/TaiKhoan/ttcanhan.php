<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Thông tin cá nhân</title>
  <link rel="icon" type="image/x-icon" href="../../img/icon.png">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.0/jquery.min.js"></script>
    <link rel="stylesheet" href="../../font-awesome/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="CSS/ttcanhan.css">
</head>
<body>
    <div class="container main-ttcn">
        <?php if(isset($_SESSION['username'])){
            extract($_SESSION['username']);
            if($_SESSION['username']['hinhAnh']==""){
              $hinh ="<img id='logo-ttcn' src=img/anhdz.jpg>";
          }else{
              $hinh = "<img  id='logo-ttcn' src=upload/".$_SESSION['username']['hinhAnh'].">";
          }
            if($_SESSION['username']['hinhAnh']==""){
                $hinhpath ="no photo";
            }else{
                $hinhpath = "<img  id='logo-ttcn-big' src=../upload/.'".$hinhAnh."'>";
            }
        } ?>
        <div class="sidebar-ttcn">
            <ul class="ttcn">
                <li><?=$hinh?><div class="xinchao-ttcn">Xin chào , <?=$username?></div></li>
                <li id="ttcn"><a href="index.php?view=ttcanhan&maTK=<?=$_SESSION['username']['maTK']?>">Thông tin cá nhân</a></li>
                <li id="ttcn"><a href="">Cập nhật hình đại diện</a></li> 
                <li id="ttcn"><a href="index.php?view=doimk&maTK=<?=$_SESSION['username']['maTK']?>">Thay đổi mật khẩu</a></li>
            </ul>
        </div>
        <div class="article-ttcn">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="h1-button"><h1>Thông tin cá nhân</h1>
                <button id="thaydoi" type="button">Lưu thay đổi</button>
                </div>
                <h3>Những chi tiết này sẽ được sử dụng cho tất cả các hồ sơ Meredith liên quan đến địa chỉ email của bạn. Bằng cách điền thông tin này, bạn sẽ nhận được trải nghiệm cá nhân hóa hơn trên tất cả các trang web của Meredith.</h3>
                <h4><span><i class="fa fa-lock" aria-hidden="true"></i><span> Chỉ có bạn mới có thể xem thông tin trên trang này. Nó sẽ không được hiển thị cho những người dùng khác xem.</h4>
                <div class="form-border">
                <h2 class="ttcb">Thông tin cơ bản của tôi </h2>

                <input type="hidden" id= "maTK" name="maTK" value="<?=$_SESSION['username']['maTK']?>">
                <div class="col-md-6">
                      <div class="form-info">
                        <label class="form-label" for="form3Examplev3">Username</label>
                        <input type="text" id="usernamettcn" name="usernamettcn" class="form-control " value="<?=$username?>"/>
                      </div>
                 </div>

                 <div class="col-md-6 ">
                      <div class="form-info">
                        <label class="form-label" for="form3Examplev2">Tên đầy đủ</label>
                        <input type="text" id="fullname" name="fullname" class="form-control" value="<?=$_SESSION['username']['fullname']?>" />
                      </div>
                 </div>


                 <div class="mb-4 pb-2 file">
                 <div class="form-info">
                        <label class="form-label" for="">Email</label>
                        <input type="email" id="email" name="email" class="form-control" value="<?=$_SESSION['username']['email']?>" /><br>
                      </div>
                  </div>

                  <div class="mb-4 pb-2 file">
                 <div class="form-info">
                        <label class="form-label" for="">Số điện thoại</label>
                        <input type="tel" id="soDT" name="soDT" class="form-control" value="<?=$_SESSION['username']['soDT']?>" /><br>
                      </div>
                  </div>

                  <div class="col-md-6 mb-4 pb-2">
                      <div class="form-info">
                        <label class="form-label" for="form3Examplev3">Chức vụ</label>
                        <input type="text" id="role" name="role" class="form-control " value="<?php
                       if($_SESSION['username']['role']==0){
                        echo'Thành viên';
                      }else if($_SESSION['username']['role']==2){
                          echo'Admin';
                      }else{
                        echo'Quản trị viên';
                        }?>" disabled/>
                      </div>
                 </div>

                 <div class="col-md-6 mb-4 pb-2">
                      <div class="form-info">
                        <label class="form-label" for="form3Examplev2">Địa chỉ</label>
                        <input type="text" id="diaChi" name="diaChi" class="form-control" value="<?=$_SESSION['username']['diaChi']?>" />
                      </div>
                 </div>

                 <div class="mb-4 pb-2 file">
                 <div class="form-info">
                        <label class="form-label" for="">Ghi chú</label>
                        <textarea  id="chuThich" name="chuThich" class="form-control" rows=5 style="resize:none"><?=$_SESSION['username']['chuThich']?></textarea><br>
                      </div>
                  </div>
               
                </div>
            </form>
        </div>
    </div>
    <script type="text/javascript">
    $(document).ready(function(){
      //load
      // function fetch_data(){
      //   $.ajax({
      //     type: "POST",
      //     url: "ttcanhan.php",
      //     success: function(data){
      //     $('#thaydoi').html(data); 
      //     fetch_data();  
      //     }
      //   });
      // }
      // fetch_data();
      //update
      $('#thaydoi').on('click',function(){
        var maTK = $('#maTK').val(); 
        var usernamettcn = $('#usernamettcn').val();
        var fullname = $('#fullname').val();    
        var email = $('#email').val();
        var soDT = $('#soDT').val();
        var diaChi = $('#diaChi').val();
        var chuThich = $('#chuThich').val();
        
        var dataString = '&maTK='+ maTK + '&usernamettcn='+ usernamettcn + '&fullname='+ fullname + '&email='+ email + '&soDT='+ soDT  + '&diaChi='+ diaChi + '&chuThich='+ chuThich ;
        if(usernamettcn==''|| email==''){
          alert('Mục này không được trống!')
        }else{
          $.ajax({
          type: "POST",
          url: "User/TaiKhoan/action.php",
          data:  dataString,
          cache: false,
          success: function(data){
          alert(data);  
          $('#thaydoi')[0].reset();    
         }
        });

        }
        return false;
      });
    });
    </script>
</body>
</html>