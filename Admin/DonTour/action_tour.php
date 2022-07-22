<?php
include("../../Modul/pdo.php");
include('../../Modul/hoadondattour.php');
//xác nhận đơn
if(isset($_POST['id_hoa_don_xac_nhan'])){
    $id_hoadon = $_POST['id_hoa_don_xac_nhan'];
    xac_nhan_hoadon($id_hoadon);
    echo 1;
  }
  //hủy đơn
if(isset($_POST['id_hoa_don_huy'])){
    $id_hoadon = $_POST['id_hoa_don_huy'];
    huy_xac_nhan_hoadon($id_hoadon);
    echo 1;
  }
?>