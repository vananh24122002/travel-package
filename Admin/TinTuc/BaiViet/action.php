<?php
include("../../../Modul/pdo.php");
include('../../../Modul/tintuc.php');
if(isset($_POST['tieuDe'])){
        $tieuDe = $_POST['tieuDe'];
        $hinhAnh = $_FILES['hinhAnh']['name'];
        $chuThich = $_POST['chuThich'];
        $tomTat = $_POST['tomTat'];
        $noiDung = $_POST['noiDung'];
        $id_DMTT = $_POST['id_DMTT'];
        $keyWord = $_POST['keyWord'];
        $tacGia = $_POST['tacGia'];
        $tinhTrang = $_POST['tinhTrang'];
        $target_dir = "../../../upload/";
        $target_file = $target_dir . basename($_FILES["hinhAnh"]["name"]);
        if (move_uploaded_file($_FILES["hinhAnh"]["tmp_name"], $target_file)) {
        //echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
        } else {
        //echo "Sorry, there was an error uploading your file.";
        }
        $checktintuc = checktintuc($tieuDe);
        $length = strlen($noiDung);
        if($checktintuc){
            echo 2;
        }else if ($length<100) {  
            echo 3; 
        }else{
        insert_tintuc($tieuDe,$hinhAnh,$chuThich,$tomTat,$noiDung,$id_DMTT,$keyWord,$tacGia,$tinhTrang);
            echo 1;
        }
}
if(isset($_POST['tieuDe_update'])){
    $id_bai = $_POST['id_bai'];
    $tieuDe = $_POST['tieuDe_update'];
    $hinhAnh = $_FILES['hinhAnh']['name'];

    $chuThich = $_POST['chuThich'];
    $tomTat = $_POST['tomTat'];
    $noiDung = $_POST['noiDung'];
    $id_DMTT = $_POST['id_DMTT'];
    $keyWord = $_POST['keyWord'];
    $tacGia = $_POST['tacGia'];
    $tinhTrang = $_POST['tinhTrang'];
    $target_dir = "../../../upload/";
            $target_file = $target_dir . basename($_FILES["hinhAnh"]["name"]);
            if (move_uploaded_file($_FILES["hinhAnh"]["tmp_name"], $target_file)) {
               //echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
              } else {
                //echo "Sorry, there was an error uploading your file.";
              } 
              $length = strlen($noiDung);
              if ($length<100) {  
                echo 2; 
            }else{
                capnhat_tintuc($id_bai,$tieuDe,$hinhAnh,$chuThich,$tomTat,$noiDung,$id_DMTT,$keyWord,$tacGia,$tinhTrang);
                echo 1;
            }
}
?>
