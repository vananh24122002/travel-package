<?php
// thêm mới tài khoản ở client
function insert_taikhoan($usernamelg,$fullname,$email,$soDT,$password){
$sql="insert into taikhoan(username,fullname,email,soDT,password) values('$usernamelg','$fullname','$email','$soDT','$password')";
pdo_execute($sql);
}
// thêm mới tài khoản ở admin
function insert_tk_admin($username,$fullname,$hinhAnh,$email,$password){
    $sql="insert into taikhoan(username,fullname,hinhAnh,email,password) values('$username','$fullname','$hinhAnh','$email','$password')";
    pdo_execute($sql);
}
function loadall_taikhoan(){
    $sql="SELECT * FROM taikhoan  ORDER BY maTK ";
    $loadtk = pdo_query($sql);
    return $loadtk;
}

//check tài khoản mk
function checkuser($username,$password){
    $sql = "SELECT *FROM taikhoan where username='".$username."' and password='".$password."' ";
    $checkuser = pdo_query_one($sql);
    return $checkuser;
}
function checkmk($usernamemk,$email){
    $sql = "SELECT * FROM taikhoan WHERE username='".$usernamemk."' AND email='".$email."' ";
    $checkmk = pdo_query_one($sql);
    return $checkmk;
}
function checkuserttcn($usernamettcn){
    $sql = "SELECT * FROM taikhoan WHERE username=? ";
    $checkuser = pdo_query_one($sql,$usernamettcn);
    return $checkuser;
}
function checkpass($passwordlast){
    $sql = "SELECT *FROM taikhoan where password='".$passwordlast."' ";
    $checkpass=pdo_query_one($sql);
    return $checkpass;
}
function tk_Query_One($username){
    $sql="SELECT * FROM taikhoan where username =?";
    return pdo_query_one($sql,$username);
}
function del_tk($maTK){
    $sql = "DELETE FROM taikhoan WHERE maTK = ?";
    pdo_execute($sql,$maTK);
}
// load tttk
function Query_one_tk($maTK){
    $maTK = $_GET['maTK'];
    $sql = "SELECT * FROM taikhoan WHERE maTK = ?";
    $Query_one_tk = pdo_query_one($sql,$maTK);
    return $Query_one_tk;
}
function Query_one_tttk($maTK){
    $sql = "SELECT * FROM taikhoan WHERE maTK = ?";
    $Query_one_tttk = pdo_query_one($sql,$maTK);
    return $Query_one_tttk;
}
function capnhat_taikhoan($maTK,$usernamettcn,$fullname,$email,$soDT,$diaChi,$chuThich){
    $sql = "UPDATE taikhoan SET username = '".$usernamettcn."' , fullname = '".$fullname."', email = '".$email."',
    soDT = '".$soDT."' , diaChi = '".$diaChi."', chuThich = '".$chuThich."' WHERE maTK=? ";
    pdo_execute($sql,$maTK);
    }
function capnhat_tk_home($maTK,$username,$fullname,$hinhAnh,$email,$password){
    if($hinhAnh !=""){
    $sql = "UPDATE taikhoan SET username = '".$username."' , fullname = '".$fullname."', hinhAnh = '".$hinhAnh."' ,
     email = '".$email."',password = '".$password."' WHERE maTK= '".$maTK."' ";
    }else{
      $sql = "UPDATE taikhoan SET username = '".$username."' , fullname = '".$fullname."', 
      email = '".$email."',password = '".$password."' WHERE maTK= '".$maTK."' ";
    }
    pdo_execute($sql);
    } 
function count_tk(){
    $sql = "SELECT COUNT(maTK) as count_array FROM taikhoan ";
    $coun_tk = pdo_query_one($sql);
    return $coun_tk;
}  
?>