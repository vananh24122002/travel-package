<?php
// thêm bình luận tour
function insert_bltour($id_tour,$username,$content_bl,$rating_bl){
    $sql="insert into binhluan_tour(id_tour,username,content_bl,rating_bl) values('$id_tour','$username','$content_bl','$rating_bl')";
    pdo_execute($sql);
}
// load bình luận rating sao
function load_rating($id_tour){
    $sql = "SELECT * FROM binhluan_tour WHERE id_tour = ?";
    $load_rating = pdo_query($sql,$id_tour);
    return $load_rating;
}
// load bình luận tour phân trang
function load_rating_pages($id_tour){
  $sql = "SELECT * FROM binhluan_tour WHERE id_tour = ? LIMIT 0,5";
  $load_rating_pages = pdo_query($sql,$id_tour);
  return $load_rating_pages;
}
// đếm bình luận & dánh giá
function count_rating_content($id_tour){
    $sql = "SELECT COUNT(content_bl) as count_content , COUNT(rating_bl) as count_rating FROM binhluan_tour WHERE id_tour = ?";
    $count_rating_content = pdo_query_one($sql,$id_tour);
    return $count_rating_content;
}
// xóa bình luận trang chủ
function del_cmt_rating($id_bl){
    $sql = "DELETE FROM binhluan_tour  WHERE id_bl = ?";
    $del_cmt_rating = pdo_execute($sql,$id_bl);
    return $del_cmt_rating;
}
// load bình luận tour home
function load_binh_luan_tour(){
    if(isset($_GET['pages'])){
        $pages = $_GET['pages'];
      }else{
        $pages = 1;
      }
      $row = 10;  // số bản ghi trên trang
      $from = ($pages - 1) * $row;// vị trí bắt đầu lấy ra các bản ghi
    $sql=" SELECT  binhluan_tour.id_tour as id_tour , tour.id_Tour as id_Tour , tour.nametour as nametour , tour.banner as hinhanh , COUNT(binhluan_tour.id_Tour) as soluong , AVG(binhluan_tour.rating_bl) as rating
  FROM binhluan_tour left join tour ON tour.id_tour = binhluan_tour.id_tour GROUP BY tour.id_Tour  ORDER BY tour.id_Tour ASC LIMIT $from , $row ";
    $load_binh_luan_tour = pdo_query($sql);
    return $load_binh_luan_tour;
}
// count phân trang 
function count_binh_luan_tour(){
    $sql = "SELECT COUNT(binhluan_tour.id_Tour) as count_array FROM binhluan_tour  ";
    $count_binh_luan_tour = pdo_query_one($sql);
    return $count_binh_luan_tour;
}
//tim id bai
function load_idtour($id_tour){
    $id_tour = $_GET['id_tour'];
    $sql=" SELECT * FROM binhluan_tour WHERE id_tour = ?";
    $load_idtour =pdo_query_one($sql,$id_tour);
    return $load_idtour;
}
//load bình luận chi tiết
function loadbl_tour_chitiet($id_tour){
    $sql = "SELECT * FROM binhluan_tour , taikhoan WHERE binhluan_tour.username = taikhoan.username  AND binhluan_tour.id_tour = ?
    GROUP BY binhluan_tour.id_bl  ";
    $loadbl_tour_chitiet =pdo_query($sql,$id_tour);
    return $loadbl_tour_chitiet;
}
//xóa bình luận chi tiết
function del_tour_cmt($id_bl){
  $sql="DELETE FROM binhluan_tour WHERE id_bl=?";
  pdo_execute($sql,$id_bl);
}
//reply bình luận
function insert_replytour($username,$reply,$id_bl,$id_tour){
  $sql="insert into reply_tour (username,reply,id_bl,id_tour) values('$username','$reply','$id_bl','$id_tour')";
  pdo_execute($sql);
}
//load bình luận reply
function load_reply_tour($id_bl,$id_tour){
  $sql = "SELECT * FROM reply_tour , taikhoan WHERE reply_tour.username = taikhoan.username AND reply_tour.id_bl = ?   AND reply_tour.id_tour = ?  ";
  $load_reply_tour =pdo_query($sql,$id_bl,$id_tour);
  return $load_reply_tour;
} 
//xóa bình luận reply
function del_cmt_reply_tour($id_reply){
  $sql="DELETE FROM reply_tour WHERE id_reply = ?   ";
  pdo_execute($sql,$id_reply);
}
//xóa tổng bình luận 
function del_sum_tour_bl($id_tour){
  $sql="DELETE FROM binhluan_tour WHERE id_tour=?";
  pdo_execute($sql,$id_tour);
}
?>