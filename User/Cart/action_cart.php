<?php
include("../../Modul/pdo.php");
include('../../Modul/taikhoan.php');
include("../../Modul/tourguide.php");
include("../../Modul/hoadondattour.php");
session_start();
if(isset($_POST['id_cart_tour'])){
    $id_Tour = ($_POST['id_cart_tour']);
    $maTK = $_POST['id_user'];
    $nguoilon = 1;
    $treem = 1;
    $row = sua_tour($id_Tour);
    extract($row);
    $sql="UPDATE tour SET soLuotDat = soLuotDat + 1 WHERE id_Tour=$id_Tour";
    $dattour=pdo_execute($sql);
    if($row){
        if ($row) {
            $new_product = array(array('nameTour' => $row['nameTour'], 'id_Tour' => $id_Tour, 'nguoilon' => $nguoilon, 'treem' => $treem ,'donGia' => $row['donGia'], 
             'banner' => $row['banner'], 'id_chuyendi' => $row['id_chuyendi'], 'maTK' => $maTK, 'days' => $row['days'] , 'time' => $row['time']));
            //kiểm tra sesstion , giỏ hàng tồn tại chưa
            if (isset($_SESSION['cart'])) {
                //đã tồn tại sess
                $found = false;
                //bây giờ sesstion cart là 1 mảng lớn
                foreach ($_SESSION['cart'] as $cart_items) { //cart_items mảng con 
                    if ($cart_items['id_Tour'] == $id_Tour) { //khi click addcart nó đã có trong cart rồi thì
                        //tăng số lượng
                        //dữ liệu ko trùng . ko có sap này trong sesstion giỏ hàng
                        $product[] = array('nameTour' => $cart_items['nameTour'], 'id_Tour' => $cart_items['id_Tour'], 'nguoilon' =>  $cart_items['nguoilon'], 'treem' => $cart_items['treem'],
                         'donGia' => $cart_items['donGia'], 'banner' => $cart_items['banner'], 'id_chuyendi' => $cart_items['id_chuyendi'], 'maTK' => $cart_items['maTK'],'days' => $cart_items['days'], 'time' => $cart_items['time']);
                        $found = true;
                    } else {
                        //dữ liệu ko trùng . ko có sap này trong sesstion giỏ hàng
                         unset($_SESSION['cart']);
                    }
                    
                }
                //nếu chưa tồn tại sesstion
                if ($found == false) {
                    //nêu dữ liệu ko tìm thấy
                    $_SESSION['cart'] = $new_product;
                    //liên kết 2 mảng
                } else {
                    $_SESSION['cart'] = $product;
                }
            } else {
                // nếu mà chưa có sesstion thì tạo sesstion để lưu 
                $_SESSION['cart'] = $new_product;
            }
        }
       
    }
    
    echo 1;
}
if(isset($_POST['id_cart_cong'])){
    $id_Tour = $_POST['id_cart_cong'];
    foreach ($_SESSION['cart'] as $cart_items) {
        if ($cart_items['id_Tour'] != $id_Tour) {
            $product[] = array('nameTour' => $cart_items['nameTour'], 'id_Tour' => $cart_items['id_Tour'], 'nguoilon' =>  $cart_items['nguoilon'], 'treem' => $cart_items['treem'],
            'donGia' => $cart_items['donGia'], 'banner' => $cart_items['banner'], 'id_chuyendi' => $cart_items['id_chuyendi'], 'maTK' => $cart_items['maTK'],'days' => $cart_items['days'], 'time' => $cart_items['time']);
            $_SESSION['cart'] = $product;
        } else {
            $tangnguoilon = $cart_items['nguoilon'] + 1;
            if ($cart_items['nguoilon'] <= 3) {
                $product[] = array('nameTour' => $cart_items['nameTour'], 'id_Tour' => $cart_items['id_Tour'], 'nguoilon' =>  $tangnguoilon, 'treem' => $cart_items['treem'],
                'donGia' => $cart_items['donGia'], 'banner' => $cart_items['banner'], 'id_chuyendi' => $cart_items['id_chuyendi'], 'maTK' => $cart_items['maTK'],'days' => $cart_items['days'], 'time' => $cart_items['time']);
                echo 1;
            } else {
                $product[] = array('nameTour' => $cart_items['nameTour'], 'id_Tour' => $cart_items['id_Tour'], 'nguoilon' =>  $cart_items['nguoilon'], 'treem' => $cart_items['treem'],
                         'donGia' => $cart_items['donGia'], 'banner' => $cart_items['banner'], 'id_chuyendi' => $cart_items['id_chuyendi'], 'maTK' => $cart_items['maTK'],'days' => $cart_items['days'], 'time' => $cart_items['time']);
                echo 2;
            }
            $_SESSION['cart'] = $product;
        }
    }
    // var_dump($product);
// end cong
}
if(isset($_POST['id_cart_tru'])){
    $id_Tour = $_POST['id_cart_tru'];
    foreach ($_SESSION['cart'] as $cart_items) {
        if ($cart_items['id_Tour'] != $id_Tour) {
            $product[] = array('nameTour' => $cart_items['nameTour'], 'id_Tour' => $cart_items['id_Tour'], 'nguoilon' =>  $cart_items['nguoilon'], 'treem' => $cart_items['treem'],
                         'donGia' => $cart_items['donGia'], 'banner' => $cart_items['banner'], 'id_chuyendi' => $cart_items['id_chuyendi'], 'maTK' => $cart_items['maTK'],'days' => $cart_items['days'], 'time' => $cart_items['time']);
            $_SESSION['cart'] = $product;
        } else {
            $giamnguoilon = $cart_items['nguoilon'] - 1;
            if ($cart_items['nguoilon'] > 1) {
                $product[] = array('nameTour' => $cart_items['nameTour'], 'id_Tour' => $cart_items['id_Tour'], 'nguoilon' =>  $giamnguoilon, 'treem' => $cart_items['treem'],
                         'donGia' => $cart_items['donGia'], 'banner' => $cart_items['banner'], 'id_chuyendi' => $cart_items['id_chuyendi'], 'maTK' => $cart_items['maTK'],'days' => $cart_items['days'], 'time' => $cart_items['time']);
                echo 1;
            } else {
                $product[] = array('nameTour' => $cart_items['nameTour'], 'id_Tour' => $cart_items['id_Tour'], 'nguoilon' =>  $cart_items['nguoilon'], 'treem' => $cart_items['treem'],
                         'donGia' => $cart_items['donGia'], 'banner' => $cart_items['banner'], 'id_chuyendi' => $cart_items['id_chuyendi'], 'maTK' => $cart_items['maTK'],'days' => $cart_items['days'], 'time' => $cart_items['time']);
                echo 2;
            }
            $_SESSION['cart'] = $product;
        }
    }
    // var_dump($product);
}
// cộng số trẻ em
if(isset($_POST['id_cart_cong_tre_em'])){
    $id_Tour = $_POST['id_cart_cong_tre_em'];
    foreach ($_SESSION['cart'] as $cart_items) {
        if ($cart_items['id_Tour'] != $id_Tour) {
            $product[] = array('nameTour' => $cart_items['nameTour'], 'id_Tour' => $cart_items['id_Tour'], 'nguoilon' =>  $cart_items['nguoilon'], 'treem' => $cart_items['treem'],
            'donGia' => $cart_items['donGia'], 'banner' => $cart_items['banner'], 'id_chuyendi' => $cart_items['id_chuyendi'], 'maTK' => $cart_items['maTK'],'days' => $cart_items['days'], 'time' => $cart_items['time']);
            $_SESSION['cart'] = $product;
        } else {
            $tangtreem = $cart_items['treem'] + 1;
            if ($cart_items['treem'] <= 1) {
                $product[] = array('nameTour' => $cart_items['nameTour'], 'id_Tour' => $cart_items['id_Tour'], 'nguoilon' =>  $cart_items['nguoilon'], 'treem' => $tangtreem,
                'donGia' => $cart_items['donGia'], 'banner' => $cart_items['banner'], 'id_chuyendi' => $cart_items['id_chuyendi'], 'maTK' => $cart_items['maTK'],'days' => $cart_items['days'], 'time' => $cart_items['time']);
                echo 1;
            } else {
                $product[] = array('nameTour' => $cart_items['nameTour'], 'id_Tour' => $cart_items['id_Tour'], 'nguoilon' =>  $cart_items['nguoilon'], 'treem' => $cart_items['treem'],
                         'donGia' => $cart_items['donGia'], 'banner' => $cart_items['banner'], 'id_chuyendi' => $cart_items['id_chuyendi'], 'maTK' => $cart_items['maTK'],'days' => $cart_items['days'], 'time' => $cart_items['time']);
                echo 2;
            }
            $_SESSION['cart'] = $product;
        }
    }
    // var_dump($product);
// end cong
}
// trừ số trẻ em
if(isset($_POST['id_cart_tru_tre_em'])){
    $id_Tour = $_POST['id_cart_tru_tre_em'];
    foreach ($_SESSION['cart'] as $cart_items) {
        if ($cart_items['id_Tour'] != $id_Tour) {
            $product[] = array('nameTour' => $cart_items['nameTour'], 'id_Tour' => $cart_items['id_Tour'], 'nguoilon' =>  $cart_items['nguoilon'], 'treem' => $cart_items['treem'],
                         'donGia' => $cart_items['donGia'], 'banner' => $cart_items['banner'], 'id_chuyendi' => $cart_items['id_chuyendi'], 'maTK' => $cart_items['maTK'],'days' => $cart_items['days'], 'time' => $cart_items['time']);
            $_SESSION['cart'] = $product;
        } else {
            $giamtreem = $cart_items['treem'] - 1;
            if ($cart_items['treem'] > 1) {
                $product[] = array('nameTour' => $cart_items['nameTour'], 'id_Tour' => $cart_items['id_Tour'], 'nguoilon' =>   $cart_items['nguoilon'], 'treem' => $giamtreem,
                         'donGia' => $cart_items['donGia'], 'banner' => $cart_items['banner'], 'id_chuyendi' => $cart_items['id_chuyendi'], 'maTK' => $cart_items['maTK'],'days' => $cart_items['days'], 'time' => $cart_items['time']);
                echo 1;
            } else {
                $product[] = array('nameTour' => $cart_items['nameTour'], 'id_Tour' => $cart_items['id_Tour'], 'nguoilon' =>  $cart_items['nguoilon'], 'treem' => $cart_items['treem'],
                         'donGia' => $cart_items['donGia'], 'banner' => $cart_items['banner'], 'id_chuyendi' => $cart_items['id_chuyendi'], 'maTK' => $cart_items['maTK'],'days' => $cart_items['days'], 'time' => $cart_items['time']);
                echo 2;
            }
            $_SESSION['cart'] = $product;
        }
    }
    // var_dump($product);
}
if(isset($_POST['idtour'])){
    $idtour = $_POST['idtour'];
    $tenkh = $_POST['fullname'];
    $id_kh = $_POST['id_kh'];
    $email = $_POST['email'];
    $sodt = $_POST['sodt'];
    $diachi = $_POST['diachi'];
    $songuoi = $_POST['songuoi'];
    $htthanhtoan = $_POST['banking'];
    $tongtien = $_POST['tongtien'];
    $radom = rand(0,999);
    $hoadon = insert_hoadon($idtour,$tenkh,$id_kh,$email,$sodt,$diachi,$songuoi,$htthanhtoan,$tongtien,$radom);
    $_SESSION['radom'] = $radom;
    echo 1;
}
?>