<?php
include("../../Modul/pdo.php");
include("../../Modul/taikhoan.php");
session_start();
if(isset($_POST['usernamelg'])){
$usernamelg=$_POST['usernamelg'];
$fullname=$_POST['fullname'];
$email=$_POST['email'];
$soDT=$_POST['soDT'];
$password=$_POST['password'];
$repassword=$_POST['repassword'];
$sql = "SELECT username FROM taikhoan where username='".$usernamelg."' ";
$checkuser1=pdo_query_one($sql);
$sql = "SELECT email FROM taikhoan where email='".$email."' ";
$checkuser2=pdo_query_one($sql);
$sql = "SELECT soDT FROM taikhoan where soDT='".$soDT."' ";
$checkuser3=pdo_query_one($sql);
if ($checkuser1){
    echo "1";
}elseif($checkuser2){
    echo "2";
}elseif($checkuser3){
    echo "3";
}elseif($repassword!=$password){
    echo "4";
}else{insert_taikhoan($usernamelg,$fullname,$email,$soDT,$password);
    echo "0";
}
}
//dangnhap
if(isset($_POST['username'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    //làm sạch thông tin, xóa bỏ các tag html, ký tự đặc biệt 
    //mà người dùng cố tình thêm vào để tấn công theo phương thức sql injection
    $username = strip_tags($username);
    $username = addslashes($username);
    $password = strip_tags($password);
    $password = addslashes($password);
    $checkuser=checkuser($username,$password);
    if(is_array($checkuser)){
        $_SESSION['username'] = $checkuser;
        $_SESSION['password'] = $checkuser;
        extract($checkuser);
        echo "0";
    }else{
        echo "1";
    }
}
//quenmk
if(isset($_POST['usernamemk'])){
    $usernamemk =$_POST['usernamemk'];
    $email = $_POST['email'];
    $checkmk = checkmk($usernamemk,$email);
    if(is_array($checkmk)){
        echo "Mật khẩu của bạn là: ".$checkmk['password'];
    }else{
        echo "Username hoặc email này không tồn tại !";
    }
}
// capnhattk
if(isset($_POST['maTK'])){
    $maTK = $_POST['maTK'];
    $usernamettcn = $_POST['usernamettcn'];
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $soDT = $_POST['soDT'];
    $diaChi = $_POST['diaChi'];
    $chuThich = $_POST['chuThich'];

    $checkuser =checkuserttcn($usernamettcn);
    if($checkuser){
    capnhat_taikhoan($maTK,$usernamettcn,$fullname,$email,$soDT,$diaChi,$chuThich);
    echo "Cập nhật thành công!";
    }else{
        echo" Vui lòng kiểm tra lại tên đăng nhập của bạn !";
    }
    
}
//doimk
if(isset($_POST['passwordlast'])){
    $passwordlast = $_POST['passwordlast'];
    $checkpass=checkpass($passwordlast);
    extract($checkpass);
    if(is_array($checkpass)){
    
         $npassword = $_POST['npassword'];
         $repassword = $_POST['repassword'];
         if (!$npassword){
          echo "Vui lòng nhập đầy đủ thông tin! ";
         }
         if ($npassword!=$repassword){
             echo "Mật khẩu nhập lại không chính xác!";
         }else{
        
        $sql="UPDATE taikhoan SET password='".$npassword."' WHERE maTK = '".$checkpass['maTK']."' ";
        pdo_execute($sql);
        echo  "Thay đổi mật khẩu thành công";
            } 
    }else{
         echo "Mật khẩu không chính xác !";
    }          
}
?>
