<?php
include("../../../Modul/pdo.php");
include('../../../Modul/tintucdm.php');
// thêm danh mục bài viết
if(isset($_POST['nameDMTT'])){
        $nameDMTT = $_POST['nameDMTT'];
        $banner1 = $_FILES['banner1']['name'];
        $banner2 = $_FILES['banner2']['name'];
        $gioiThieu = $_POST['gioiThieu'];
        $target_dir = "../../../upload/";
        $target_file = $target_dir . basename($_FILES["banner1"]["name"]);
        if (move_uploaded_file($_FILES["banner1"]["tmp_name"], $target_file)) {
          } else {
        }
        $target_file1 = $target_dir . basename($_FILES["banner2"]["name"]);
        if (move_uploaded_file($_FILES["banner2"]["tmp_name"], $target_file1)) {
        } else {}
        $checkdmtt = checkdmtt($nameDMTT);
        if($checkdmtt){
            echo 2;
        }else{
        insert_dmtintuc($nameDMTT,$banner1,$banner2,$gioiThieu);
            echo 1;
        }
}
// cập nhật danh mục tin tức
if(isset($_POST['name_DMTT_edit'])){
        $id_DMTT = $_POST['id_DMTT'];
        $nameDMTT = $_POST['name_DMTT_edit'];
        $banner1 = $_FILES['banner1']['name'];
        $banner2 = $_FILES['banner2']['name'];
        $gioiThieu = $_POST['gioiThieu'];
        $target_dir = "../../../upload/";
        $target_file = $target_dir . basename($_FILES["banner1"]["name"]);
        if (move_uploaded_file($_FILES["banner1"]["tmp_name"], $target_file)) {
          } else {
        }
        $target_file1 = $target_dir . basename($_FILES["banner2"]["name"]);
        if (move_uploaded_file($_FILES["banner2"]["tmp_name"], $target_file1)) {
          } else {
        }
            update_dmtintuc($id_DMTT,$nameDMTT,$banner1,$banner2,$gioiThieu);
            echo 1;
}
// xóa danh mục tin viết
if(isset($_POST['id_xoa'])){
  $id_DMTT = $_POST['id_xoa'];
  del_dmtintuc($id_DMTT);
  echo 1;
}
?>