<?php
//  check danh mục
 function checkdmtt($nameDMTT){
    $sql = "SELECT * FROM dmtintuc WHERE nameDMTT = '".$nameDMTT."'";
    $checkdmtt = pdo_query_one($sql);
    return $checkdmtt; 
  }
// thêm mới danh mục tin tức
 function insert_dmtintuc($nameDMTT,$banner1,$banner2,$gioiThieu){
    $sql="insert into dmtintuc(nameDMTT,banner1,banner2,gioiThieu) values('$nameDMTT','$banner1','$banner2','$gioiThieu')";
    pdo_execute($sql);
  }
// load danh mục tin tức
  function loadall_dmtintuc(){
    if(isset($_GET['pages'])){
      $pages = $_GET['pages'];
    }else{
      $pages = 1;
    }
    $row = 10;
    $from = ($pages-1) * $row ; 
    $sql="SELECT * FROM dmtintuc LIMIT $from , $row ";
    $listdmtintuc = pdo_query($sql);
    return $listdmtintuc;
  }
  // load danh mục tin tức trang chủ
  function loadall_dmtintuchome(){
    $sql="SELECT * FROM dmtintuc  ORDER BY id_DMTT LIMIT 0,5 ";
    $listdmtintuc = pdo_query($sql);
    return $listdmtintuc;
  }
  function count_dmtintuc(){
    $sql = "SELECT COUNT(id_DMTT) as count_array FROM dmtintuc";
    $count_dmtintuc = pdo_query_one($sql);
    return $count_dmtintuc;
  }
  // load danh chuyen di
  function loadall_dmchuyendi(){
    $sql="SELECT * FROM dmtintuc  WHERE id_DMTT = 6 ";
    $loadall_dmchuyendi = pdo_query($sql);
    return $loadall_dmchuyendi;
  }
  function del_dmtintuc($id_DMTT){
    $sql="DELETE FROM dmtintuc WHERE id_DMTT=".$id_DMTT ;
    pdo_execute($sql);
  }
  function sua_dmtintuc($id_DMTT){
    $sql="SELECT * FROM dmtintuc  WHERE id_DMTT=".$id_DMTT;
    $dm = pdo_query_one($sql);
    return $dm;
  }
  // load danh mục món ăn
  function load_dmmonan(){
    $sql="SELECT * FROM dmtintuc  WHERE id_DMTT=5 ";
    $load_dmmonan = pdo_query_one($sql);
    return $load_dmmonan;
  }
  // load danh mục chuyến đi
  function load_dmchuyendi(){
    $sql="SELECT * FROM dmtintuc  WHERE id_DMTT=6 ";
    $load_dmchuyendi = pdo_query_one($sql);
    return $load_dmchuyendi;
  }
  // load danh mục book trip
  function load_dmbooktrip(){
    $sql="SELECT * FROM dmtintuc  WHERE id_DMTT=7 ";
    $load_dmbooktrip = pdo_query_one($sql);
    return $load_dmbooktrip;
  }
  function update_dmtintuc($id_DMTT,$nameDMTT,$banner1,$banner2,$gioiThieu){
    if($banner1!="" && $banner2!="" ){
    $sql = " UPDATE dmtintuc SET nameDMTT = '".$nameDMTT."', banner1 = '".$banner1."', banner2 = '".$banner2."',
    gioiThieu = '".$gioiThieu."'  WHERE id_DMTT=".$id_DMTT;
    }else if($banner1 ==""){
      $sql = " UPDATE dmtintuc SET nameDMTT = '".$nameDMTT."', banner2 = '".$banner2."',
      gioiThieu = '".$gioiThieu."'  WHERE id_DMTT=".$id_DMTT;
    }else if($banner2==""){
      $sql = " UPDATE dmtintuc SET nameDMTT = '".$nameDMTT."', banner1 = '".$banner1."', 
      gioiThieu = '".$gioiThieu."'  WHERE id_DMTT=".$id_DMTT;
    }else{
      $sql = " UPDATE dmtintuc SET nameDMTT = '".$nameDMTT."', 
      gioiThieu = '".$gioiThieu."'  WHERE id_DMTT=".$id_DMTT;
    }
    pdo_execute($sql);
  }
  
?>