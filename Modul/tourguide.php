<?php
// thêm tour mới
function insert_tour($nameTour,$banner,$days,$id_DMTour,$id_mucdo,$id_chuyendi,$id_chieudai,$id_gia,$tongQuan,$hanhTrinh,$banDo,$mongDoi,$donGia,$time){
    $sql="insert into tour(nameTour,banner,days,id_DMTour,id_mucdo,id_chuyendi,id_chieudai,id_gia,tongQuan,hanhTrinh,banDo,mongDoi,donGia,time)
     values('$nameTour','$banner','$days','$id_DMTour','$id_mucdo','$id_chuyendi','$id_chieudai','$id_gia','$tongQuan','$hanhTrinh','$banDo','$mongDoi','$donGia',$time)";
    pdo_execute($sql);
}
// load all tour
function loadall_tour($key,$id_DMTour){
    if(isset($_GET['pages'])){
      $pages = $_GET['pages'];
    }else{
      $pages =1;
    }
      $row = 10;
      $from = ($pages-1) * $row;
    $sql="SELECT * FROM tour WHERE 1 ";
    if($key!=""){
      $sql .= " AND nameTour like '%".$key."%' OR days like '%".$key."%' OR id_mucdo like '%".$key."%' OR tongQuan like '%".$key."%' OR hanhTrinh like '%".$key."%' OR mongDoi like '%".$key."%'
      OR donGia like '%".$key."%' OR time like '%".$key."%' ";
    }
    if($id_DMTour>0){
      $sql .= " AND id_DMTour = '".$id_DMTour."'";
    }
    $sql.=" ORDER BY id_Tour DESC LIMIT $from , $row ";
    $tour = pdo_query($sql);
    return $tour;
}
function count_booktour(){
  $sql = "SELECT COUNT(id_Tour) as count_array FROM tour ";
  $count_booktour = pdo_query_one($sql);
  return $count_booktour;
}
//load tour home
function loadall_tourhome(){
  $sql = "SELECT * FROM tour, chuyendi WHERE tour.id_chuyendi = chuyendi.id_chuyendi ORDER BY soLuotDat DESC LIMIT 0,10";
  $loadtourhome = pdo_query($sql);
  return $loadtourhome;
}
//load all book tour
function loadall_booktour($id_DMTour,$id_mucdo,$id_chuyendi,$id_chieudai,$id_gia){
  $sql = "SELECT * FROM tour  WHERE 1 ";

  if($id_DMTour>0){
    $sql .= " AND id_DMTour = '".$id_DMTour."'";
  }
  if($id_mucdo>0){
    $sql .= " AND id_mucdo = '".$id_mucdo."'";
  }
  if($id_chuyendi>0){
    $sql .= " AND id_chuyendi = '".$id_chuyendi."'";
  }
  if($id_chieudai>0){
    $sql .= " AND id_chieudai = '".$id_chieudai."'";
  }
  if($id_gia>0){
    $sql .= " AND id_gia = '".$id_gia."'";
  }
  $sql .=" ORDER BY soLuotDat DESC";
  $loadbooktour = pdo_query($sql);
  return $loadbooktour;
}
function loadall_booktoursp(){
  $sql = "SELECT * FROM tour  WHERE 1 ";
  $sql .=" ORDER BY soLuotDat DESC ";
  $loadbooktoursp = pdo_query($sql);
  return $loadbooktoursp;
}
function del_tour($id_Tour){
    $sql="DELETE FROM tour WHERE id_Tour=".$id_Tour;
    pdo_execute($sql);
}
//loadtour
function load_tour($id_Tour){
  $sql="SELECT * FROM tour INNER JOIN chuyendi ON tour.id_chuyendi = chuyendi.id_chuyendi INNER JOIN mucdohd ON tour.id_mucdo = mucdohd.id_mucdo 
  INNER JOIN chieudaichuyendi ON tour.id_chieudai = chieudaichuyendi.id_chieudai INNER JOIN gia ON tour.id_gia = gia.id_gia JOIN dmtour ON tour.id_DMTour = dmtour.id_DMTour
   WHERE id_Tour=".$id_Tour ;
  $loadtour=pdo_query_one($sql);
  return $loadtour;
}
// load titleday
function load_titleday($id_Tour){
  $sql="SELECT * FROM titleday WHERE id_tour = '".$id_Tour."' ORDER BY id_titleday";
  $load_titleday=pdo_query_one($sql);
  return $load_titleday;
}
// load day
function load_day($id_Tour){
  $sql="SELECT * FROM day WHERE id_tour = '".$id_Tour."' ORDER BY id_day";
  $load_day=pdo_query_one($sql);
  return $load_day;
}
// load image
function load_image($id_Tour){
  $sql="SELECT * FROM image WHERE id_tour = '".$id_Tour."' ORDER BY id_image";
  $load_image=pdo_query_one($sql);
  return $load_image;
}
//load tour cùng loại
function load_tourcungloai($id_Tour,$id_DMTour){
  $sql="SELECT * FROM tour INNER JOIN chuyendi ON tour.id_chuyendi = chuyendi.id_chuyendi INNER JOIN mucdohd ON tour.id_mucdo = mucdohd.id_mucdo  WHERE id_Tour<>'".$id_Tour."' AND id_DMTour ='".$id_DMTour."' ORDER BY soLuotDat DESC LIMIT 0,3";
  $load_tourcungloai=pdo_query($sql);
  return $load_tourcungloai;
}
function sua_tour($id_Tour){
  $sql="SELECT * FROM tour WHERE id_Tour=".$id_Tour;
  $suatour=pdo_query_one($sql);
  return $suatour;
}
function capnhat_tour($id_Tour,$nameTour,$banner,$days,$id_DMTour,$id_mucdo,$id_chuyendi,$id_chieudai,$id_gia,$tongQuan,$hanhTrinh,$banDo,$mongDoi,$donGia,$time){
  if($banner!=""){
  $sql="UPDATE tour SET nameTour= '".$nameTour."',banner= '".$banner."',days= '".$days."',id_DMTour= '".$id_DMTour."', id_mucdo= '".$id_mucdo."',id_chuyendi= '".$id_chuyendi."',id_chieudai= '".$id_chieudai."',
  id_gia= '".$id_gia."',tongQuan= '".$tongQuan."',hanhTrinh= '".$hanhTrinh."',banDo= '".$banDo."', mongDoi= '".$mongDoi."',donGia= '".$donGia."',time= '".$time."' WHERE id_Tour=".$id_Tour;
  }else{
    $sql="UPDATE tour SET nameTour= '".$nameTour."',days= '".$days."',id_DMTour= '".$id_DMTour."', id_mucdo= '".$id_mucdo."',id_chuyendi= '".$id_chuyendi."',id_chieudai= '".$id_chieudai."',
  id_gia= '".$id_gia."',tongQuan= '".$tongQuan."',hanhTrinh= '".$hanhTrinh."',banDo= '".$banDo."', mongDoi= '".$mongDoi."',donGia= '".$donGia."',time= '".$time."' WHERE id_Tour=".$id_Tour;
  }
  pdo_execute($sql);
}
?>