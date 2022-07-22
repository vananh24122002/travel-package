<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Quên mật khẩu</title>
  <link rel="icon" type="image/x-icon" href="../../img/favicon.png">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
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
      left:32%;
      top:10%;
    }
    .col-md-4 h3{
      padding-top:3vw;
      padding-bottom:1vw;
      color:white;
      font-family: 'Nunito', sans-serif;
      text-align:center;
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
    span#left{
        margin-top:1vw;
        color:white;
    }
    span#left a{
        color:#339900;
    }
    span#right{
       
        float:right;
        color:white;
    }
    span#right a{
        color:#339900;
    }
    input[type=button]{
        margin-left:40%;
        height:2vw;
        text-transform:uppercase;
        border-radius:0;
        border:none;
    }
    span#dangnhap{
      float:right;
      font-size:2vw;
      margin-top:-0.5vw;
      width:40px;
      height:40px;
      line-height:40px;
      border-radius:50%;
    }
    span#dangnhap a{
      color:white;
      margin-left:0.5vw;
    }
    span#dangnhap:hover{
     background-color:#C0C0C0;
    }
    span#hoac{
        color:white;
        margin-top:2vw;
        display:block;
        padding-bottom:4vw;
    }
  </style>
  </head>
<body>
    <div class="container">
      <div class="col-md-4">
        <h3>Quên mật khẩu</h3>
        <form method="post" id="form-dangky">
            <span id="icon"><i class="fa fa-user" aria-hidden="true"></i></span>
            <input type="text" class="form-control" id="usernamemk"  placeholder="Tên đăng nhập"><br>
            <span id="icon"><i class="fa fa-envelope-o" aria-hidden="true"></i></span>
            <input type="text" class="form-control" id="email" placeholder="Email"><br><br>
            <input type="button" name="insert-data" id="dangnhap" value="Xác nhận" name="dangnhap"><span id="dangnhap"><a href="dangnhap.php"><i class="fa fa-arrow-right" aria-hidden="true"></i></a></span><br>
            <span id="hoac"></span>
      </form>   
      </div>
    </div>
    <script type="text/javascript">
    $(document).ready(function(){
      $('#dangnhap').on('click',function(){
        var usernamemk = $('#usernamemk').val();
        var email = $('#email').val();
        
        var dataString = 'usernamemk='+ usernamemk + '&email='+ email;
        if(usernamemk==''|| email==''){
          alert('Hãy nhập đầy đủ các mục !')
        }else{
          $.ajax({
          type: "POST",
          url: "action.php",
          data: dataString,
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