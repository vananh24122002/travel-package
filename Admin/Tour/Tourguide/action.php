<?php
include("../../../Modul/pdo.php");
include('../../../Modul/tourguide.php');

if(isset($_POST['nameTour'])){
    $nameTour = $_POST['nameTour'];
    $banner = $_FILES['banner']['name'];
    $days = $_POST['days'];
    $id_DMTour = $_POST['id_DMTour'];
    $id_mucdo = $_POST['id_mucdo'];
    $id_chuyendi = $_POST['id_chuyendi'];
    $id_chieudai = $_POST['id_chieudai'];
    $id_gia = $_POST['id_gia'];
    $tongQuan = $_POST['tongQuan'];
    $hanhTrinh = $_POST['hanhTrinh'];
    $banDo = $_POST['banDo'];
    $mongDoi = $_POST['mongDoi'];
    $donGia = $_POST['donGia'];
    $time = $_POST['time'];
    $target_dir = "../../../upload/";
    $target_file = $target_dir . basename($_FILES["banner"]["name"]);
    if (move_uploaded_file($_FILES["banner"]["tmp_name"], $target_file)) {
        //echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
       } else {
         //echo "Sorry, there was an error uploading your file.";
       }
      if(strlen($nameTour)<3) {  
            echo 3;           
       }elseif(!preg_match ("/^[0-9]*$/",$days)){
           echo 4;
       }elseif(strlen($tongQuan)<20){
           echo 5;
       }elseif(strlen($hanhTrinh)<20){
            echo 6;
       }elseif(strlen($mongDoi)<20){
            echo 7;
       }else{
           insert_tour($nameTour,$banner,$days,$id_DMTour,$id_mucdo,$id_chuyendi,$id_chieudai,$id_gia,$tongQuan,$hanhTrinh,$banDo,$mongDoi,$donGia,$time);
           echo 1;
       }

}
if(isset($_POST['nameTour_update'])){
    $id_Tour = $_POST['id_Tour'];
    $nameTour = $_POST['nameTour_update'];
    $banner = $_FILES['banner']['name'];
    $days = $_POST['days'];
    $id_DMTour = $_POST['id_DMTour'];
    $id_mucdo = $_POST['id_mucdo'];
    $id_chuyendi = $_POST['id_chuyendi'];
    $id_chieudai = $_POST['id_chieudai'];
    $id_gia = $_POST['id_gia'];
    $tongQuan = $_POST['tongQuan'];
    $hanhTrinh = $_POST['hanhTrinh'];
    $banDo = $_POST['banDo'];
    $mongDoi = $_POST['mongDoi'];
    $donGia = $_POST['donGia'];
    $time = $_POST['time'];
    $target_dir = "../upload/";
    $target_file = $target_dir . basename($_FILES["banner"]["name"]);
    if (move_uploaded_file($_FILES["banner"]["tmp_name"], $target_file)) {
       } else {   
       }
    if(strlen($nameTour)<3) {  
        echo 3;           
   }elseif(!preg_match ("/^[0-9]*$/",$days)){
       echo 4;
   }elseif(strlen($tongQuan)<20){
       echo 5;
   }elseif(strlen($hanhTrinh)<20){
        echo 6;
   }elseif(strlen($mongDoi)<20){
        echo 7;
   }else{
    capnhat_tour($id_Tour,$nameTour,$banner,$days,$id_DMTour,$id_mucdo,$id_chuyendi,$id_chieudai,$id_gia,$tongQuan,$hanhTrinh,$banDo,$mongDoi,$donGia,$time);
       echo 1;
   }
}
?>