<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Đổi mật khẩu</title>
  <link rel="icon" type="image/x-icon" href="../../img/favicon.png">
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
            if($_SESSION['hinhAnh']==""){
                $hinh ="<img id='logo-ttcn' src=img/anhdz.jpg>";
            }else{
                $hinh = "<img  id='logo-ttcn' src=upload/.'".$hinhAnh."'>";
            }
            if($_SESSION['hinhAnh']==""){
                $hinhpath ="no photo";
            }else{
                $hinhpath = "<img  id='logo-ttcn-big' src=upload/.'".$hinhAnh."'>";
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
                <div class="h1-button"><h1> Thay đổi mật khẩu</h1>
                <button id="thaydoi" type="button">Lưu thay đổi</button>
                </div>
                <h3>Nếu bạn muốn thay đổi mật khẩu, hãy bấm nút bên dưới và chúng tôi sẽ đặt lại mật khẩu mới cho bạn.</h3>
                <h4><span><i class="fa fa-lock" aria-hidden="true"></i><span>Mật khẩu của bạn sẽ được giữ kín</h4>
                <div class="mb-4 pb-2 file">
                 <div class="form-info">
                        <label class="form-label" for="">Mật khẩu</label>
                        <input type="password" id="passwordlast" class="form-control"/><br>
                      </div>
                  </div>
                  <div class="mb-4 pb-2 file">
                 <div class="form-info">
                        <label class="form-label" for="">Mật khẩu mới</label>
                        <input type="password" id="npassword" class="form-control"/><br>
                      </div>
                  </div>
                  <div class="mb-4 pb-2 file">
                 <div class="form-info">
                        <label class="form-label" for="">Nhập lại mật khẩu mới</label>
                        <input type="password" id="repassword" class="form-control"/><br>
                      </div>
                  </div>
        </form>
        </div>
    </div>
    <script type="text/javascript">
    $(document).ready(function(){
      $('#thaydoi').on('click',function(){
        var passwordlast = $('#passwordlast').val();
        var npassword = $('#npassword').val();
        var repassword = $('#repassword').val();
        
        var dataString = '&passwordlast='+ passwordlast + '&npassword='+ npassword + '&repassword='+ repassword ;
        if(passwordlast==''|| npassword=='' || repassword==''){
          alert('Hãy nhập đầy đủ các mục !');
        }else{
          $.ajax({
          type: "POST",
          url: "User/TaiKhoan/action.php",
          data:  dataString,
          cache: false,
          success: function(data){
          alert(data);      
        }
        });

        }
        return false;
      });
    });
    </script>
</body>
</html>