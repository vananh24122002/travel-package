<?php
// thêm bài viết mới
function insert_tintuc($tieuDe,$hinhAnh,$chuThich,$tomTat,$noiDung,$id_DMTT,$keyWord,$tacGia,$tinhTrang){
    $sql="insert into baiviet(tieuDe,hinhAnh,chuThich,tomTat,noiDung,id_DMTT,keyWord,tacGia,tinhTrang)
     values('$tieuDe','$hinhAnh','$chuThich','$tomTat','$noiDung','$id_DMTT','$keyWord','$tacGia',$tinhTrang)";
    pdo_execute($sql);
  }
// check tiêu đề bài viết
function checktintuc($tieuDe){
  $sql = "SELECT * FROM baiviet WHERE tieuDe = '".$tieuDe."'";
  $checktintuc = pdo_query_one($sql);
  return $checktintuc;
}
// load all tin tức ( bài viết )
function loadall_tintuc($key,$id_DMTT){
    if(isset($_GET['pages'])){
      $pages = $_GET['pages'];
    }else{
      $pages = 1;
    }
    $row = 10;  // số bản ghi trên trang
    $from = ($pages - 1) * $row;// vị trí bắt đầu lấy ra các bản ghi
    $sql =" SELECT * FROM baiviet WHERE 1 ";
    if($key!=""){
        $sql.=" and tieuDe like '%".$key."%' ";
    }
    if($id_DMTT>0){
        $sql.=" and id_DMTT = '".$id_DMTT."'";
    }
    $sql .=" ORDER BY id_bai DESC LIMIT $from , $row ";
    $tintuc =pdo_query($sql);
    return $tintuc;
}
function count_tintuc(){
  $sql = "SELECT COUNT(id_bai) as count_array FROM baiviet ";
  $count_tintuc = pdo_query_one($sql);
  return $count_tintuc;
}
//search bài viết
function search_bv($search){
  $sql = "SELECT * FROM baiviet WHERE tieuDe like '%".$search."%' ";
  $search_bv = pdo_query($sql);
  return $search_bv;
}
  // load 1 bv moi nhat
function loadone_bvmoinhat(){
  $sql = "SELECT * FROM  baiviet,dmtintuc WHERE baiviet.id_DMTT = dmtintuc.id_DMTT ORDER BY id_bai DESC LIMIT 0,1";
  $onebv_moi = pdo_query($sql);
  return $onebv_moi;
}
//load 4 bv moi nhat
function loadfour_bvmoinhat(){
  $sql = "SELECT * FROM  baiviet,dmtintuc WHERE baiviet.id_DMTT = dmtintuc.id_DMTT ORDER BY id_bai DESC LIMIT 1,4";
  $fourbv_moi = pdo_query($sql);
  return $fourbv_moi;
}
//load 1 bv Max soluotxem
function loadone_luotxem(){
  $sql = "SELECT * FROM  baiviet,dmtintuc WHERE baiviet.id_DMTT = dmtintuc.id_DMTT  ORDER BY soLuotXem DESC LIMIT 0,1 ";
  $onebv_luotxem = pdo_query($sql);
  return $onebv_luotxem;
}
//load 2 bv max soluotxem
function loadtwo_luotxem(){
  $sql = "SELECT * FROM  baiviet,dmtintuc WHERE baiviet.id_DMTT = dmtintuc.id_DMTT AND 1 ORDER BY soLuotXem DESC LIMIT 1,2";
  $twobv_luotxem = pdo_query($sql);
  return $twobv_luotxem;
}
//load 5 bv max soluotxem
function loadfive_luotxem(){
  $sql = "SELECT * FROM  baiviet,dmtintuc WHERE baiviet.id_DMTT = dmtintuc.id_DMTT AND 1 ORDER BY soLuotXem DESC LIMIT 3,6";
  $fivebv_luotxem = pdo_query($sql);
  return $fivebv_luotxem;
}
//load bv cùng loại chuyến đi 
function loadbv_cungloai(){
  $sql = "SELECT * FROM baiviet  WHERE id_DMTT= 6  ORDER BY id_bai DESC LIMIT 0,4 ";
  $loadbv_cungloai = pdo_query($sql);
  return $loadbv_cungloai;
}
//load bv cùng loại chuyến đi part2
function loadbv_cungloaip2(){
  $sql = "SELECT * FROM baiviet  WHERE id_DMTT= 6  ORDER BY id_bai DESC LIMIT 4,6 ";
  $loadbv_cungloaip2 = pdo_query($sql);
  return $loadbv_cungloaip2;
}
//load 3bv dau cung loai
function loadthree_cungloai($id_DMTT){
  $sql = "SELECT * FROM baiviet  WHERE id_DMTT= '".$id_DMTT."'  ORDER BY id_bai DESC LIMIT 0,3 ";
  $loadthree_cungloai = pdo_query($sql);
  return $loadthree_cungloai;
}
//load 1bv dau top5 thu1
function loadone_top51($id_DMTT){
  $sql = "SELECT * FROM baiviet  WHERE id_DMTT= '".$id_DMTT."'  ORDER BY id_bai DESC LIMIT 3,1 ";
  $loadone_top51 = pdo_query($sql);
  return $loadone_top51;
}
//load 1bv dau top5 thu2
function loadone_top52($id_DMTT){
  $sql = "SELECT * FROM baiviet  WHERE id_DMTT= '".$id_DMTT."'  ORDER BY id_bai DESC LIMIT 4,1 ";
  $loadone_top52 = pdo_query($sql);
  return $loadone_top52;
}
//load 3bv dau top5 thu3
function loadthree_top5($id_DMTT){
  $sql = "SELECT * FROM baiviet  WHERE id_DMTT= '".$id_DMTT."'  ORDER BY id_bai DESC LIMIT 5,3 ";
  $loadthree_top5 = pdo_query($sql);
  return $loadthree_top5;
}
//load 1 bv goi nho 1
function loadone_goinho1($id_DMTT){
  $sql = "SELECT * FROM baiviet  WHERE id_DMTT= '".$id_DMTT."'  ORDER BY id_bai DESC LIMIT 8,1 ";
  $loadone_goinho1 = pdo_query($sql);
  return $loadone_goinho1;
}
//load 1 bv goi nho 1
function loadone_goinho2($id_DMTT){
  $sql = "SELECT * FROM baiviet  WHERE id_DMTT= '".$id_DMTT."'  ORDER BY id_bai DESC LIMIT 9,1 ";
  $loadone_goinho2 = pdo_query($sql);
  return $loadone_goinho2;
}
//load bv cùng dm 
function loadall_bvcungloai($id_bai,$id_DMTT){
 $sql = "SELECT * FROM baiviet WHERE id_DMTT = '".$id_DMTT."' AND id_bai = '".$id_bai."' ";
 $loadall_bvcungloai=pdo_query($sql);
 return $loadall_bvcungloai;
}
//load bv nằm dưới 
function loadall_khacnhau(){
  $sql = "SELECT * FROM  baiviet,dmtintuc WHERE baiviet.id_DMTT = dmtintuc.id_DMTT ORDER BY id_bai ASC LIMIT 0,10";
  $loadall_khacnhau = pdo_query($sql);
  return $loadall_khacnhau;
}
  function del_tintuc($id_bai){
    $sql="DELETE FROM baiviet WHERE id_bai=".$id_bai;
    pdo_execute($sql);
  }
  function sua_tintuc($id_bai){
    $sql="SELECT * FROM baiviet WHERE id_bai=".$id_bai;
    $suatintuc=pdo_query_one($sql);
    return($suatintuc);
  }
  function load_baiviet($id_bai){
    $sql="SELECT * FROM baiviet, dmtintuc WHERE baiviet.id_DMTT = dmtintuc.id_DMTT AND id_bai=".$id_bai;
    $loadbaiviet=pdo_query_one($sql);
    return($loadbaiviet);
  }
  function capnhat_tintuc($id_bai,$tieuDe,$hinhAnh,$chuThich,$tomTat,$noiDung,$id_DMTT,$keyWord,$tacGia,$tinhTrang){
    if($hinhAnh!=""){
    $sql="UPDATE baiviet SET tieuDe= '".$tieuDe."',hinhAnh= '".$hinhAnh."',chuThich= '".$chuThich."',tomTat= '".$tomTat."',noiDung= '".$noiDung."',id_DMTT= '".$id_DMTT."',
    keyWord= '".$keyWord."',tacGia= '".$tacGia."',tinhTrang= '".$tinhTrang."' WHERE id_bai=".$id_bai;
    }else{
    $sql="UPDATE baiviet SET tieuDe= '".$tieuDe."',chuThich= '".$chuThich."',tomTat= '".$tomTat."',noiDung= '".$noiDung."',id_DMTT= '".$id_DMTT."',
    keyWord= '".$keyWord."',tacGia= '".$tacGia."',tinhTrang= '".$tinhTrang."' WHERE id_bai=".$id_bai;
    }
    pdo_execute($sql);
  }
?>