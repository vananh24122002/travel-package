<?php
if (isset($_POST['themgiohang'])) { //nếu có click vào button addcart
        
    $maHangHoa = $_GET['maHangHoa'];
    $soLuong = 1; //ban đầu tất cả sp đều 1
    if(isset($_GET['maHangHoa'])&&($_GET['maHangHoa']>0)){
    $row=sua_sp($maHangHoa);
    extract($row);
    }
    if ($row) {
        $new_product = array(array('tenHangHoa' => $row['tenHangHoa'], 'maHangHoa' => $maHangHoa, 'soLuong' => $soLuong, 'donGia' => $row['donGia'],
         'hinhAnh' => $row['hinhAnh']));
        //kiểm tra sesstion , giỏ hàng tồn tại chưa
        if (isset($_SESSION['cart'])) {
            //đã tồn tại sess
            $found = false;
            //bây giờ sesstion cart là 1 mảng lớn
            foreach ($_SESSION['cart'] as $cart_items) { //cart_items mảng con 
                if ($cart_items['maHangHoa'] == $maHangHoa) { //khi click addcart nó đã có trong cart rồi thì
                    //tăng số lượng
                    $product[] = array('tenHangHoa' => $cart_items['tenHangHoa'], 'maHangHoa' => $cart_items['maHangHoa'], 'soLuong' => $soLuong + 1,
                     'donGia' => $cart_items['donGia'], 'hinhAnh' => $cart_items['hinhAnh']);
                    $found = true;
                } else {
                    //dữ liệu ko trùng . ko có sap này trong sesstion giỏ hàng
                    $product[] = array('tenHangHoa' => $cart_items['tenHangHoa'], 'maHangHoa' => $cart_items['maHangHoa'], 'soLuong' => $cart_items['soLuong'],
                     'donGia' => $cart_items['donGia'], 'hinhAnh' => $cart_items['hinhAnh']);
                }
            }
            //nếu chưa tồn tại sesstion
            if ($found == false) {
                //nêu dữ liệu ko tìm thấy
                $_SESSION['cart'] = array_merge($product, $new_product);
                //liên kết 2 mảng
            } else {
                $_SESSION['cart'] = $product;
            }
        } else {
            // nếu mà chưa có sesstion thì tạo sesstion để lưu 
            $_SESSION['cart'] = $new_product;
        }
    }
    header('Location:../../index.php?view=viewcart');
   
}
?>