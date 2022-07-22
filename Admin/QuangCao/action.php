<?php
include("../../Modul/pdo.php");
include('../../Modul/quangcao.php');
if(isset($_POST['layout'])){
 $layout = $_POST['layout'];
 $nameqc = $_POST['nameqc'];
 $banner = $_FILES['banner']['name'];
 $link = $_POST['link'];
 $trangthai = $_POST['trangthai'];
 $target_dir = "../../upload/";
 $target_file = $target_dir . basename($_FILES["banner"]["name"]);
 if (move_uploaded_file($_FILES["banner"]["tmp_name"], $target_file)) {
  } else {}

  insert_qc($nameqc,$banner,$layout,$link,$trangthai);
echo 1 ;
}
// update quảng cáo
if(isset($_POST['id_update'])){
    $id_qc = $_POST['id_update'];
    $layout = $_POST['layout_update'];
    $nameqc = $_POST['nameqc'];
    $banner = $_FILES['banner']['name'];
    $link = $_POST['link'];
    $trangthai = $_POST['trangthai'];
    $target_dir = "../../upload/";
    $target_file = $target_dir . basename($_FILES["banner"]["name"]);
    if (move_uploaded_file($_FILES["banner"]["tmp_name"], $target_file)) {
     } else {}
   
     update_qc($id_qc,$nameqc,$banner,$layout,$link,$trangthai);
   echo 1 ;
   }
?>
