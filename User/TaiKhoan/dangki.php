<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Đăng kí</title>
  <link rel="icon" type="image/x-icon" href="../../img/favicon.png">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../font-awesome/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
  <style>
    .container{
      background:url('../../img/bannerdk.jpg');
      width:100%;
      height:49vw;
    }
    .col-md-4{
      background-color:rgba(0,0,0,0.9);
      margin-top:2vw;
      border-radius:5px 5px;
      left:32%;
      top:10%;
    }
    .col-md-4 h3{
      padding:1vw 0;
      color:white;
      font-family: 'Nunito', sans-serif;
    }
     input[type=text],input[type=password],input[type=email]{
      padding-bottom:0.4vw;
      height:3vw; 
      background-color:rgba(0,0,0,0.9);
      color:white;
      border-radius:0;
      font-family: 'Nunito', sans-serif;
      font-size:1.1vw;
    }
    input[type=text]:hover,input[type=password]:hover,input[type=email]:hover{
      border-color:deepskyblue;
    }
    form{
      padding-bottom:1vw;
    }
    span#icon{
      
      margin-left:88%;
      position:absolute;
      margin-top:0.7vw;
      color:white;
      font-size:1.2vw;
    }
  </style>
  </head>
<body>
    <div class="container">
      <div class="col-md-4">
        <h3>Đăng ký tài khoản</h3>
        <form method="post" id="form-dangky">
            <span id="icon"><i class="fa fa-user" aria-hidden="true"></i></span>
            <input type="text" class="form-control" id="usernamelg"  placeholder="Tên đăng nhập"><br>

            <span id="icon"><i class="fa fa-address-card" aria-hidden="true"></i></span>
            <input type="text" class="form-control" id="fullname" placeholder="Tên đầy đủ"><br>

            <span id="icon"><i class="fa fa-envelope-o" aria-hidden="true"></i></span>
            <input type="email" class="form-control" id="email" placeholder="Email"><br>

            <span id="icon"><i class="fa fa-phone" aria-hidden="true"></i></span>
            <input type="text" class="form-control" id="soDT" placeholder="Số điện thoại"><br>

            <span id="icon"><i class="fa fa-unlock" aria-hidden="true"></i></span>
            <input type="password" class="form-control" id="password" placeholder="Mật khẩu"><br>

            <span id="icon"><i class="fa fa-repeat" aria-hidden="true"></i></span>
            <input type="password" class="form-control" id="repassword" placeholder="Nhập lại mật khẩu"><br>
            
            <input type="button" name="insert-data" id="button-insert" value="Đăng ký" class="btn btn-success">
      </form>   
      </div>
    </div>
    <script type="text/javascript">
    $(document).ready(function(){
      $('#button-insert').on('click',function(){
        var usernamelg = $('#usernamelg').val();
        var fullname = $('#fullname').val();
        var email = $('#email').val();
        var soDT = $('#soDT').val();
        var password = $('#password').val();
        var repassword = $('#repassword').val();
        // var repassword = $('#repassword').val();
        var dataString = 'usernamelg='+ usernamelg + '&fullname='+ fullname + '&password='+ password + '&email='+ email +'&soDT='+ soDT +'&password='+ password +'&repassword='+ repassword;
        if(usernamelg=='' || fullname=='' || email=='' || soDT=='' || password=='' || repassword==''){
          alert('Hãy nhập đầy đủ các mục !')
        }else{
          $.ajax({
          type: "POST",
          url: "action.php",
          data: dataString,
          cache: false,
          success: function(data){
          if(data==0){
          alert('Đăng ký thành công!!');
          location.href='dangnhap.php';
          }else if(data==1){
            alert('Tên đăng nhập này đã có người dùng. Vui lòng chọn tên đăng nhập khác.');
          }else if(data==2){
            alert('Email này đã có người dùng. Vui lòng nhập email khác.');
          }else if(data==3){
            alert('Số điện thoại này đã có người dùng. Vui lòng nhập số khác.');
          }else{
            alert('Mật khẩu nhập lại không khớp!!');
          }
        }
        
        });
        }
        return false;
      });
    });
    </script>
</body>
</html>