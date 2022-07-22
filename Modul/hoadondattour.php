<?php
// chèn hóa đơn từ người mua
function insert_hoadon($idtour,$tenkh,$id_kh,$email,$sodt,$diachi,$songuoi,$htthanhtoan,$tongtien,$radom){
    $sql="insert into hoadondattour (idtour,tenkh,id_kh,email,sodt,diachi,songuoi,htthanhtoan,tongtien,radom)
     values('$idtour','$tenkh','$id_kh','$email','$sodt','$diachi','$songuoi','$htthanhtoan','$tongtien','$radom')";
    pdo_execute($sql);
}
// load hóa đơn
function load_hoadon(){
    $sql = " SELECT * FROM hoadondattour , tour WHERE hoadondattour.idtour = tour.id_Tour ORDER BY id_hoadon DESC ";
    $load_hoadon = pdo_query($sql);
    return $load_hoadon;
}
// load hóa đơn theo id kh
function load_hoadon_kh($id_kh){
    $sql = " SELECT * FROM hoadondattour , tour WHERE hoadondattour.idtour = tour.id_Tour AND id_kh = ? ORDER BY id_hoadon DESC ";
    $load_hoadon_kh = pdo_query($sql,$id_kh);
    return $load_hoadon_kh;
}
// load hóa đơn chi tiết người
function load_hoadon_chitiet($id_hoadon){
    $sql = " SELECT * FROM hoadondattour , tour WHERE hoadondattour.idtour = tour.id_Tour AND id_hoadon = ? ORDER BY id_hoadon DESC ";
    $load_hoadon_chitiet = pdo_query_one($sql,$id_hoadon);
    return $load_hoadon_chitiet;
}
// count hóa đơn
function count_hoadon(){
    $sql = "SELECT COUNT(id_hoadon) as count_array FROM  hoadondattour";
    $count_hoadon = pdo_query_one($sql);
    return $count_hoadon;
}
// xác nhận hóa đơn
function xac_nhan_hoadon($id_hoadon){
    $sql = "UPDATE hoadondattour SET tinhtrang = 1 WHERE id_hoadon = ? ";
    pdo_execute($sql,$id_hoadon);
}
// hủy xác nhận hóa đơn
function huy_xac_nhan_hoadon($id_hoadon){
  $sql = "UPDATE hoadondattour SET tinhtrang = 0 WHERE id_hoadon = ? ";
  pdo_execute($sql,$id_hoadon);
}
// hủy  đơn đặt
function huy_hoadon($id_hoadon){
    $sql = "UPDATE hoadondattour SET tinhtrang = 2 WHERE id_hoadon = ? ";
    pdo_execute($sql,$id_hoadon);
  }
?>