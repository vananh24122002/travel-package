<?php
// thêm danh mục tour mới
function insert_tourdm($nameDMTour,$gioiThieu){
    $sql="insert into dmtour(nameDMTour,gioiThieu)
     values('$nameDMTour','$gioiThieu')";
    pdo_execute($sql);
}
// load all danh mục tour
function loadall_tourdm(){
    if(isset($_GET['pages'])){
      $pages = $_GET['pages'];
    }else{
      $pages =1;
    }
    $row = 5;
    $from = ($pages-1) * $row;
    $sql=" SELECT * FROM dmtour ORDER BY id_DMTour ASC LIMIT $from , $row";
    $tourdm =pdo_query($sql);
    return $tourdm;
}
// Count danh mục tour
function count_tourdm(){
    $sql = "SELECT  COUNT(id_DMTour) as count_array FROM dmtour";
    $count_tourdm = pdo_query_one($sql);
    return $count_tourdm;
}
function check_dmtour($nameDMTour){
  $sql = "SELECT nameDMTour FROM dmtour  where nameDMTour = ?";
  $check_dmtour = pdo_query($sql,$nameDMTour);
  return $check_dmtour;
}
  // dm muc do hoat dong
  function loadall_tourdmhd(){
    $sql=" SELECT * FROM mucdohd ORDER BY id_mucdo ASC";
    $tourdmhd =pdo_query($sql);
    return $tourdmhd;
  }
  // dm chuyen di
  function loadall_tourdmcd(){
    $sql=" SELECT * FROM chuyendi ORDER BY id_chuyendi ASC";
    $tourdmcd =pdo_query($sql);
    return $tourdmcd;
  }
 // dm chieu dai chuyen di
 function loadall_tourdmcdcd(){
  $sql=" SELECT * FROM chieudaichuyendi ORDER BY id_chieudai ASC";
  $tourdmcdcd =pdo_query($sql);
  return $tourdmcdcd;
}
 // dm gia
 function loadall_tourdmg(){
  $sql=" SELECT * FROM gia ORDER BY id_gia ASC";
  $tourdmg =pdo_query($sql);
  return $tourdmg;
}
function del_tourdm($id_DMTour){
    $sql="DELETE FROM dmtour WHERE id_DMTour=".$id_DMTour;
    pdo_execute($sql);
} 
// Query danh mục tour
function Query_chuyendi($id_chuyendi){
  $sql=" SELECT * FROM chuyendi WHERE id_chuyendi= ? ";
  $Query_chuyendi =pdo_query_one($sql,$id_chuyendi);
  return $Query_chuyendi;
}
function Query_mucdo($id_mucdo){
  $sql=" SELECT * FROM mucdohd WHERE id_mucdo= ? ";
  $Query_mucdo =pdo_query_one($sql,$id_mucdo);
  return $Query_mucdo;
}
// sửa danh mục tour
function sua_tourdm($id_DMTour){
    $sql=" SELECT * FROM dmtour WHERE id_DMTour=".$id_DMTour;
    $sua_tourdm =pdo_query_one($sql);
    return $sua_tourdm;
} 
function capnhat_tourdm($id_DMTour,$nameDMTour,$gioiThieu){
    $sql = "UPDATE dmtour SET nameDMTour = '".$nameDMTour."' , gioiThieu = '".$gioiThieu."' WHERE id_DMTour =".$id_DMTour;
    pdo_execute($sql);
}
?>