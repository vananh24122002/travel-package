<?php
include("../../../Modul/pdo.php");
include('../../../Modul/tourdm.php');
if(isset($_POST['nameDMTour'])){
    $nameDMTour = $_POST['nameDMTour'];
    $gioiThieu = $_POST['gioiThieu'];
    $check_dmtour = check_dmtour($nameDMTour);
    if($check_dmtour){
        echo 2;
    }else{
        insert_tourdm($nameDMTour,$gioiThieu);
        echo 1;
    }
}
if(isset($_POST['nameDMTour_update'])){
    $id_DMTour = $_POST['id_DMTour'];
    $nameDMTour = $_POST['nameDMTour_update'];
    $gioiThieu = $_POST['gioiThieu'];
    capnhat_tourdm($id_DMTour,$nameDMTour,$gioiThieu);
    echo 1;
}
// xóa danh mục tour
if(isset($_POST['id_xoa'])){
    $id_DMTour = $_POST['id_xoa'];
    del_tourdm($id_DMTour);
    echo 1;
  }
?>