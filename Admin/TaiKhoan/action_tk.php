<?php
include("../../Modul/pdo.php");
include('../../Modul/taikhoan.php');
session_start();
// thêm tài khoản
if(isset($_POST['username'])){
  $username = $_POST['username'];
  $fullname = $_POST['fullname'];
  $hinhAnh = $_FILES['hinhAnh']['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $target_dir = "../../upload/";
    $target_file = $target_dir . basename($_FILES["hinhAnh"]["name"]);
    if (move_uploaded_file($_FILES["hinhAnh"]["tmp_name"], $target_file)) {
     } else {}
     $pattern = "^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^"; 
    //  kiểm tra tài khoản
     $sql = "SELECT username FROM taikhoan where username='".$username."' ";
     $checkuser1=pdo_query_one($sql);
    //  kiểm tra email
     $sql = "SELECT email FROM taikhoan where email='".$email."' ";
     $checkuser2=pdo_query_one($sql);
     if(strlen($username)<3){
          echo 2;
     }elseif($checkuser1){
          echo 3; 
     }elseif(strlen($fullname)<3){
          echo 4;
     }elseif($checkuser2){
          echo 5;
     }elseif(strlen($password)<5){
          echo 6; 
     }else{
          insert_tk_admin($username,$fullname,$hinhAnh,$email,$password);
        echo '1';
     }
}
//xóa tài khoản
if(isset($_POST['id_tk'])){
  $maTK = $_POST['id_tk'];
  del_tk($maTK);
  echo 1;
}
//thông tin tài khoản

// cập nhật tài khoản
if(isset($_POST['upusername'])){
  $maTK = $_POST['up_maTK'];
  $username = $_POST['upusername'];
  $fullname = $_POST['fullname'];
  $hinhAnh = $_FILES['hinhAnh']['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $target_dir = "../../upload/";
    $target_file = $target_dir . basename($_FILES["hinhAnh"]["name"]);
    if (move_uploaded_file($_FILES["hinhAnh"]["tmp_name"], $target_file)) {
     } else {}
    //  kiểm tra tài khoản
     $sql = "SELECT username , email FROM taikhoan where username = ? AND email = ? ";
     $checkuser1=pdo_query_one($sql,$username,$email);
     if(strlen($fullname)<3){
          echo 4;
    }elseif(strlen($password)<5){
          echo 6; 
    }elseif($checkuser1){
          capnhat_tk_home($maTK,$username,$fullname,$hinhAnh,$email,$password);
          echo 1;
    }else{
          echo 0;
    }
    
}
?>
